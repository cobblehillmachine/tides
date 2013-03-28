<?php
// Helper functions for BackupBuddy.
// TODO: Eventually break out of a lot of these from BB core. Migrating from old framework to new resulted in this mid-way transition but it's a bit messy...

class pb_backupbuddy_core {
	
	
	
	/*	is_network_activated()
	 *	
	 *	Returns a boolean indicating whether a plugin is network activated or not.
	 *	
	 *	@return		boolean			True if plugin is network activated, else false.
	 */
	function is_network_activated() {
		
		if ( !function_exists( 'is_plugin_active_for_network' ) ) { // Function is not available on all WordPress pages for some reason according to codex.
			require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
		}
		if ( is_plugin_active_for_network( basename( pb_backupbuddy::plugin_path() ) . '/' . pb_backupbuddy::settings( 'init' ) ) ) { // Path relative to wp-content\plugins\ directory.
			return true;
		} else {
			return false;
		}
		
	} // End is_network_activated().
	
	
	
	/*	backup_integrity_check()
	 *	
	 *	Scans a backup file and saves the result in data structure. Checks for key files & that .zip can be read properly. Stores results with details in data structure.
	 *	
	 *	@param		string		$file		Full pathname & filename to backup file to check.
	 *	@return		boolean					True if integrity 100% passed, else false. ( Side note: Result details stored in pb_backupbuddy::$options['backups'][$serial]['integrity'] ).
	 */
	function backup_integrity_check( $file ) {
		
		$serial = $this->get_serial_from_file( $file );
		
		// User selected to rescan a file.
		if ( pb_backupbuddy::_GET( 'reset_integrity' ) == $serial ) {
			pb_backupbuddy::alert( 'Rescanning backup integrity for backup file `' . basename( $file ) . '`' );
		}
		
		if ( isset( pb_backupbuddy::$options['backups'][$serial]['integrity'] ) && ( count( pb_backupbuddy::$options['backups'][$serial]['integrity'] ) > 0 ) && ( pb_backupbuddy::_GET( 'reset_integrity' ) != $serial ) ) { // Already have integrity data and NOT resetting this one.
			pb_backupbuddy::status( 'details', 'Integrity data for backup `' . $serial . '` is cached; not scanning again.' );
			return;
		} elseif ( pb_backupbuddy::_GET( 'reset_integrity' ) == $serial ) { // Resetting this one.
			pb_backupbuddy::status( 'details', 'Resetting backup integrity stats for backup with serial `' . $serial . '`.' );
		}
		
		if ( pb_backupbuddy::$options['integrity_check'] == '0' ) { // Integrity checking disabled.
			$file_stats = @stat( $file );
			if ( $file_stats === false ) { // stat failure.
				pb_backupbuddy::alert( 'Error #4539774. Unable to get file details ( via stat() ) for file `' . $file . '`. The file may be corrupt or too large for the server.' );
				$file_size = 0;
				$file_modified = 0;
			} else { // stat success.
				$file_size = $file_stats['size'];
				$file_modified = $file_stats['mtime'];
			}
			unset( $file_stats );
			
			$integrity = array(
				'status'				=>		'Unknown',
				'status_details'		=>		__( 'Integrity checking disabled based on settings. This file has not been verified.', 'it-l10n-backupbuddy' ),
				'scan_time'				=>		0,
				'detected_type'			=>		'unknown',
				'size'					=>		$file_size,
				'modified'				=>		$file_modified,
				'file'					=>		basename( $file ),
				'comment'				=>		false,
			);
			pb_backupbuddy::$options['backups'][$serial]['integrity'] = array_merge( pb_backupbuddy::settings( 'backups_integrity_defaults' ), $integrity );
			pb_backupbuddy::save();
			
			return;
		}
		
		
		//***** BEGIN CALCULATING STATUS DETAILS.
		
		
		// Status defaults.
		$status_details = array(
			'found_dat'			=>	false,
			'found_sql'			=>	false,
			'found_wpconfig'	=>	false,
			'scan_log'			=>	'',
		);
		$backup_type = '';
		
		
		if ( !isset( pb_backupbuddy::$classes['zipbuddy'] ) ) {
			require_once( pb_backupbuddy::plugin_path() . '/lib/zipbuddy/zipbuddy.php' );
			pb_backupbuddy::$classes['zipbuddy'] = new pluginbuddy_zipbuddy( pb_backupbuddy::$options['backup_directory'] );
		}
		pb_backupbuddy::set_status_serial( 'zipbuddy_test' ); // Redirect logging output to a certain log file.
		
		
		// Look for comment.
		$comment = pb_backupbuddy::$classes['zipbuddy']->get_comment( $file );
		
		
		// Check for DAT file.
		if ( pb_backupbuddy::$classes['zipbuddy']->file_exists( $file, 'wp-content/uploads/backupbuddy_temp/' . $serial . '/backupbuddy_dat.php' ) === true ) { // Post 2.0 full backup
			$status_details['found_dat'] = true;
			$backup_type = 'full';
		}
		if ( pb_backupbuddy::$classes['zipbuddy']->file_exists( $file, 'wp-content/uploads/temp_' . $serial . '/backupbuddy_dat.php' ) === true ) { // Pre 2.0 full backup
			$status_details['found_dat'] = true;
			$backup_type = 'full';
		}
		if ( pb_backupbuddy::$classes['zipbuddy']->file_exists( $file, 'backupbuddy_dat.php' ) === true ) { // DB backup
			$status_details['found_dat'] = true;
			$backup_type = 'db';
		}
		
		
		// Check for DB SQL file.
		if ( pb_backupbuddy::$classes['zipbuddy']->file_exists( $file, 'wp-content/uploads/backupbuddy_temp/' . $serial . '/db_1.sql' ) === true ) { // post 2.0 full backup
			$status_details['found_sql'] = true;
			$backup_type = 'full';
		}
		if ( pb_backupbuddy::$classes['zipbuddy']->file_exists( $file, 'wp-content/uploads/temp_' . $serial . '/db.sql' ) === true ) { // pre 2.0 full backup
			$status_details['found_sql'] = true;
			$backup_type = 'full';
		}
		if ( pb_backupbuddy::$classes['zipbuddy']->file_exists( $file, 'db_1.sql' ) === true ) { // db only backup 2.0+
			$status_details['found_sql'] = true;
			$backup_type = 'db';
		}
		if ( pb_backupbuddy::$classes['zipbuddy']->file_exists( $file, 'db.sql' ) === true ) { // db only backup pre-2.0
			$status_details['found_sql'] = true;
			$backup_type = 'db';
		}
		
		
		// Check for WordPress config file.
		if ( pb_backupbuddy::$classes['zipbuddy']->file_exists( $file, 'wp-config.php' ) === true ) {
			$status_details['found_wpconfig'] = true;
			$backup_type = 'full';
		}
		if ( pb_backupbuddy::$classes['zipbuddy']->file_exists( $file, 'wp-content/uploads/backupbuddy_temp/' . $serial . '/wp-config.php' ) === true ) {
			$status_details['found_wpconfig'] = true;
			$backup_type = 'full';
		}
		
		
		// Get zip scan log details.
		$temp_details = pb_backupbuddy::get_status( 'zipbuddy_test' ); // Get zipbuddy scan log.
		foreach( $temp_details as $temp_detail ) {
			$status_details['scan_log'][] = $temp_detail[4];
		}
		pb_backupbuddy::set_status_serial( '' ); // Stop redirecting log to a specific file.
		
		
		// Calculate status descriptions.
		$integrity_status = 'pass'; // Default.
		if ( $status_details['found_dat'] !== true ) {
			$integrity_status = 'fail';
			$integrity_description .= __('Error #7843564: Missing DAT file.', 'it-l10n-backupbuddy' );
		}
		if ( $status_details['found_sql'] !== true ) {
			$integrity_status = 'fail';
			$integrity_description .= __('Error #4664236: Missing database SQL file.', 'it-l10n-backupbuddy' );
		}
		if ( ( $backup_type == 'full' ) && ( $status_details['found_wpconfig'] !== true ) ) {
			$integrity_status = 'fail';
			$integrity_description .= __('Error #47834674: Missing wp-config.php file.', 'it-l10n-backupbuddy' );
		}
		if ( $integrity_status == 'pass' ) { // All tests passed.
			$integrity_description = __( 'All tests passed.', 'it-l10n-backupbuddy' );
		}
		//$integrity_description .= '<br><br>' . __('Technical Details', 'it-l10n-backupbuddy' ) . ':<br />' . $integrity_zipresult_details;		
		
		
		//***** END CALCULATING STATUS DETAILS.
		
		
		// Get file information from file system.
		$file_stats = @stat( $file );
		if ( $file_stats === false ) { // stat failure.
			pb_backupbuddy::alert( 'Error #4539774b. Unable to get file details ( via stat() ) for file `' . $file . '`. The file may be corrupt or too large for the server.' );
			$file_size = 0;
			$file_modified = 0;
		} else { // stat success.
			$file_size = $file_stats['size'];
			$file_modified = $file_stats['ctime']; // Created time.
		}
		unset( $file_stats );
		
		
		// Compile array of results for saving into data structure.
		$integrity = array(
			'status'				=>		$integrity_status,
			'status_details'		=>		$status_details, // $integrity_description,
			'scan_time'				=>		time(),
			'detected_type'			=>		$backup_type,
			'size'					=>		$file_size,
			'modified'				=>		$file_modified,				// Actually created time now.
			'file'					=>		basename( $file ),
			'comment'				=>		$comment,					// boolean false if no comment. string if comment.
		);
		
		
		pb_backupbuddy::$options['backups'][$serial]['integrity'] = array_merge( pb_backupbuddy::settings( 'backups_integrity_defaults' ), $integrity );
		pb_backupbuddy::save();
		//pb_backupbuddy::$classes['zipbuddy']->clear_status();
		
		
		if ( $integrity_status == 'pass' ) { // 100% success
			return true;
		} else {
			return false;
		}
		
		
	} // End backup_integrity_check().
	
	
	
	/*	get_serial_from_file()
	 *	
	 *	Returns the backup serial based on the filename.
	 *	
	 *	@param		string		$file		Filename containing a serial to extract.
	 *	@return		string					Serial found.
	 */
	public function get_serial_from_file( $file ) {
		
		$serial = strrpos( $file, '-' ) + 1;
		$serial = substr( $file, $serial, ( strlen( $file ) - $serial - 4 ) );
		
		return $serial;
		
	} // End get_serial_from_file().
	
	
	
	/**
	 * versions_confirm()
	 *
	 * Check the version of an item and compare it to the minimum requirements BackupBuddy requires.
	 *
	 * @param		string		$type		Optional. If left blank '' then all tests will be performed. Valid values: wordpress, php, ''.
	 * @param		boolean		$notify		Optional. Whether or not to alert to the screen (and throw error to log) of a version issue.\
	 * @return		boolean					True if the selected type is a bad version
	 */
	function versions_confirm( $type = '', $notify = false ) {
		
		$bad_version = false;
		
		if ( ( $type == 'wordpress' ) || ( $type == '' ) ) {
			global $wp_version;
			if ( version_compare( $wp_version, pb_backupbuddy::settings( 'wp_minimum' ), '<=' ) ) {
				if ( $notify === true ) {
					pb_backupbuddy::alert( sprintf( __('ERROR: BackupBuddy requires WordPress version %1$s or higher. You may experience unexpected behavior or complete failure in this environment. Please consider upgrading WordPress.', 'it-l10n-backupbuddy' ), $this->_wp_minimum) );
					pb_backupbuddy::log( 'Unsupported WordPress Version: ' . $wp_version , 'error' );
				}
				$bad_version = true;
			}
		}
		if ( ( $type == 'php' ) || ( $type == '' ) ) {
			if ( version_compare( PHP_VERSION, pb_backupbuddy::settings( 'php_minimum' ), '<=' ) ) {
				if ( $notify === true ) {
					pb_backupbuddy::alert( sprintf( __('ERROR: BackupBuddy requires PHP version %1$s or higher. You may experience unexpected behavior or complete failure in this environment. Please consider upgrading PHP.', 'it-l10n-backupbuddy' ), PHP_VERSION ) );
					pb_backupbuddy::log( 'Unsupported PHP Version: ' . PHP_VERSION , 'error' );
				}
				$bad_version = true;
			}
		}
		
		return $bad_version;
		
	} // End versions_confirm().
	
	
	
	/*	get_directory_exclusions()
	 *	
	 *	Get sanitized directory exclusions. See important note below!
	 *	IMPORTANT NOTE: Cannot exclude the temp directory here as this is where SQL and DAT files are stored for inclusion in the backup archive.
	 *	
	 *	@return		array				Array of directories to exclude.
	 */
	public static function get_directory_exclusions() {
		
		// Get initial array.
		$exclusions = trim( pb_backupbuddy::$options['excludes'] ); // Trim string.
		$exclusions = preg_split('/\n|\r|\r\n/', $exclusions ); // Break into array on any type of line ending.
		
		// Add additional internal exclusions.
		$exclusions[] = str_replace( rtrim( ABSPATH, '\\\/' ), '', pb_backupbuddy::$options['backup_directory'] ); // Exclude backup directory.
		$exclusions[] = '/wp-content/uploads/pb_backupbuddy/'; // BackupBuddy logs and junk.
		$exclusions[] = '/importbuddy/'; // Exclude importbuddy directory in root.
		$exclusions[] = '/importbuddy.php'; // Exclude importbuddy.php script in root.
		
		// Clean up & sanitize array.
		array_walk( $exclusions, create_function( '&$val', '$val = rtrim( trim( $val ), \'/\' );' ) ); // Apply trim to all items within.
		$exclusions = array_filter( $exclusions, 'strlen' ); // Remove any empty / blank lines.
		
		// IMPORTANT NOTE: Cannot exclude the temp directory here as this is where SQL and DAT files are stored for inclusion in the backup archive.
		return $exclusions;
		
	} // End get_directory_exclusions().
	
	
	
	/*	mail_error()
	 *	
	 *	Sends an error email to the defined email address(es) on settings page.
	 *	
	 *	@param		string		$message	Message to be included in the body of the email.
	 *	@return		null
	 */
	function mail_error( $message ) {
		
		if ( !isset( pb_backupbuddy::$options ) ) {
			pb_backupbuddy::load();
		}
		
		$subject = pb_backupbuddy::$options['email_notify_error_subject'];
		$body = pb_backupbuddy::$options['email_notify_error_body'];
		
		$replacements = array(
			'{site_url}' => site_url(),
			'{backupbuddy_version}' => pb_backupbuddy::settings( 'version' ),
			'{current_datetime}' => date(DATE_RFC822),
			'{message}' => $message
		);
		
		foreach( $replacements as $replace_key => $replacement ) {
			$subject = str_replace( $replace_key, $replacement, $subject );
			$body = str_replace( $replace_key, $replacement, $body );
		}
		
		$email = pb_backupbuddy::$options['email_notify_error'];
		pb_backupbuddy::status( 'error', 'Sending email error notification. Subject: `' . $subject . '`; body: `' . $body . '`; recipient(s): `' . $email . '`.' );
		if ( !empty( $email ) ) {
			wp_mail( $email, $subject, $body, 'From: '.$email."\r\n".'Reply-To: '.get_option('admin_email')."\r\n");
		}
		
	} // End mail_error().
	
	
	
	/*	mail_notify_scheduled()
	 *	
	 *	Sends a message email to the defined email address(es) on settings page.
	 *	
	 *	@param		string		$start_or_complete	Whether this is the notifcation for starting or completing. Valid values: start, complete
	 *	@param		string		$message			Message to be included in the body of the email.
	 *	@return		null
	 */
	function mail_notify_scheduled( $serial, $start_or_complete, $message ) {
		
		if ( !isset( pb_backupbuddy::$options ) ) {
			pb_backupbuddy::load();
		}
		
		if ( $start_or_complete == 'start' ) {
			$email = pb_backupbuddy::$options['email_notify_scheduled_start'];
			
			$subject = pb_backupbuddy::$options['email_notify_scheduled_start_subject'];
			$body = pb_backupbuddy::$options['email_notify_scheduled_start_body'];
			
			$replacements = array(
				'{site_url}' => site_url(),
				'{backupbuddy_version}' => pb_backupbuddy::settings( 'version' ),
				'{current_datetime}' => date(DATE_RFC822),
				'{message}' => $message
			);
		} elseif ( $start_or_complete == 'complete' ) {
			$email = pb_backupbuddy::$options['email_notify_scheduled_complete'];
			
			$subject = pb_backupbuddy::$options['email_notify_scheduled_complete_subject'];
			$body = pb_backupbuddy::$options['email_notify_scheduled_complete_body'];
			
			$replacements = array(
				'{site_url}' => site_url(),
				'{backupbuddy_version}' => pb_backupbuddy::settings( 'version' ),
				'{current_datetime}' => date(DATE_RFC822),
				'{message}' => $message,
				
				'{backup_serial}' => $serial,
				'{download_link}' => pb_backupbuddy::ajax_url( 'download_archive' ) . '&backupbuddy_backup=' . basename( pb_backupbuddy::$options['backups'][$serial]['archive_file'] ),
				'{backup_file}' => basename( pb_backupbuddy::$options['backups'][$serial]['archive_file'] ),
				'{backup_size}' => pb_backupbuddy::$format->file_size( pb_backupbuddy::$options['backups'][$serial]['archive_size'] ),
				'{backup_type}' => pb_backupbuddy::$options['backups'][$serial]['type'],
			);
		} else {
			pb_backupbuddy::status( 'error', 'ERROR #54857845785: Fatally halted. Invalid schedule type. Expected `start` or `complete`. Got `' . $start_or_complete . '`.' );
		}
		
		
		foreach( $replacements as $replace_key => $replacement ) {
			$subject = str_replace( $replace_key, $replacement, $subject );
			$body = str_replace( $replace_key, $replacement, $body );
		}
		
		
		pb_backupbuddy::status( 'error', 'Sending email schedule notification. Subject: `' . $subject . '`; body: `' . $body . '`; recipient(s): `' . $email . '`.' );
		if ( !empty( $email ) ) {
			wp_mail( $email, $subject, $body, 'From: '.$email."\r\n".'Reply-To: '.get_option('admin_email')."\r\n");
		}
	} // End mail_notify_scheduled().
	
	
	
	/*	backup_prefix()
	 *	
	 *	Strips all non-file-friendly characters from the site URL. Used in making backup zip filename.
	 *	
	 *	@return		string		The filename friendly converted site URL.
	 */
	function backup_prefix() {
		
		$siteurl = site_url();
		$siteurl = str_replace( 'http://', '', $siteurl );
		$siteurl = str_replace( 'https://', '', $siteurl );
		$siteurl = str_replace( '/', '_', $siteurl );
		$siteurl = str_replace( '\\', '_', $siteurl );
		$siteurl = str_replace( '.', '_', $siteurl );
		$siteurl = str_replace( ':', '_', $siteurl ); // Alternative port from 80 is stored in the site url.
		$siteurl = str_replace( '~', '_', $siteurl ); // Strip ~.
		return $siteurl;
		
	} // End backup_prefix().
	
	
	
	/*	send_remote_destination()
	 *	
	 *	function description
	 *	
	 *	@param		int		$destination_id		ID number (index of the destinations array) to send it.
	 *	@param		string	$file				Full file path of file to send.
	 *	@param		string	$trigger			What triggered this backup. Valid values: scheduled, manual.
	 *	@param		bool	$send_importbuddy	Whether or not importbuddy.php should also be sent with the file to destination.
	 *	@return		bool						Send status. true success, false failed.
	 */
	function send_remote_destination( $destination_id, $file, $trigger = '', $send_importbuddy = false ) {
		
		pb_backupbuddy::status( 'details', 'Sending file `' . $file . '` to remote destination `' . $destination_id . '` triggered by `' . $trigger . '`.' );
		if ( defined( 'PB_DEMO_MODE' ) ) {
			return false;
		}
		
		
		// Record some statistics.
		$identifier = pb_backupbuddy::random_string( 12 );
		pb_backupbuddy::$options['remote_sends'][$identifier] = array(
			'destination'		=>	$destination_id,
			'file'				=>	$file,
			'file_size'			=>	filesize( $file ),
			'trigger'			=>	$trigger,						// What triggered this backup. Valid values: scheduled, manual.
			'send_importbuddy'	=>	$send_importbuddy,
			'start_time'		=>	time(),
			'finish_time'		=>	0,
			'status'			=>	'timeout',  // success, failure, timeout (default assumption if this is not updated in this PHP load)
		);
		pb_backupbuddy::save();
		
		
		// Prepare variables to pass to remote destination handler.
		$files = array( $file );
		$destination_settings = &pb_backupbuddy::$options['remote_destinations'][$destination_id];
		
		
		// For Stash we will check the quota prior to initiating send.
		if ( pb_backupbuddy::$options['remote_destinations'][$destination_id]['type'] == 'stash' ) {
			// Pass off to destination handler.
			require_once( pb_backupbuddy::plugin_path() . '/destinations/bootstrap.php' );
			$send_result = pb_backupbuddy_destinations::get_info( 'stash' ); // Used to kick the Stash destination into life.
			$stash_quota = pb_backupbuddy_destination_stash::get_quota( pb_backupbuddy::$options['remote_destinations'][$destination_id], true );
			
			if ( $file != '' ) {
				$backup_file_size = filesize( $file );
			} else {
				$backip_file_size = 50000;
			}
			if ( ( $backup_file_size + $stash_quota['quota_used'] ) > $stash_quota['quota_total'] ) {
				$message = '';
				$message .= "You do not have enough Stash storage space to send this file. Please upgrade your Stash storage at http://ithemes.com/member/stash.php or delete files to make space.\n\n";
				
				$message .= 'Attempting to send file of size ' . pb_backupbuddy::$format->file_size( $backup_file_size ) . ' but you only have ' . $stash_quota['quota_available_nice'] . ' available. ';
				$message .= 'Currently using ' . $stash_quota['quota_used_nice'] . ' of ' . $stash_quota['quota_total_nice'] . ' (' . $stash_quota['quota_used_percent'] . '%).';
				
				pb_backupbuddy::status( 'error', $message );
				pb_backupbuddy::$classes['core']->mail_error( $message );
				
				pb_backupbuddy::$options['remote_sends'][$identifier]['status'] = 'Failure. Insufficient destination space.';
				pb_backupbuddy::save();
				
				return false;
			} else {
				if ( isset( $stash_quota['quota_warning'] ) && ( $stash_quota['quota_warning'] != '' ) ) {
					
					// We log warning of usage but dont send error email.
					$message = '';
					$message .= 'WARNING: ' . $stash_quota['quota_warning'] . "\n\nPlease upgrade your Stash storage at http://ithemes.com/member/stash.php or delete files to make space.\n\n";
					$message .= 'Currently using ' . $stash_quota['quota_used_nice'] . ' of ' . $stash_quota['quota_total_nice'] . ' (' . $stash_quota['quota_used_percent'] . '%).';
					
					pb_backupbuddy::status( 'details', $message );
					//pb_backupbuddy::$classes['core']->mail_error( $message );
					
				}
			}
			
		}
		
		
		if ( $send_importbuddy === true ) {
			pb_backupbuddy::status( 'details', 'Generating temporary importbuddy.php file for remote send.' );
			$importbuddy_temp = pb_backupbuddy::$options['temp_directory'] . 'importbuddy.php'; // Full path & filename to temporary importbuddy
			$this->importbuddy( $importbuddy_temp ); // Create temporary importbuddy.
			pb_backupbuddy::status( 'details', 'Generated temporary importbuddy.' );
			$files[] = $importbuddy_temp; // Add importbuddy file to the list of files to send.
			$send_importbuddy = true; // Track to delete after finished.
		} else {
			pb_backupbuddy::status( 'details', 'Not sending importbuddy.' );
		}
		
		
		// Pass off to destination handler.
		require_once( pb_backupbuddy::plugin_path() . '/destinations/bootstrap.php' );
		$send_result = pb_backupbuddy_destinations::send( $destination_settings, $files );
		
		
		$this->kick_db(); // Kick the database to make sure it didn't go away, preventing options saving.
		
		
		// Update stats.
		pb_backupbuddy::$options['remote_sends'][$identifier]['finish_time'] = time();
		if ( $send_result === true ) { // succeeded.
			pb_backupbuddy::$options['remote_sends'][$identifier]['status'] = 'success';
			pb_backupbuddy::status( 'details', 'Remote send SUCCESS.' );
		} elseif ( $send_result === false ) { // failed.
			pb_backupbuddy::$options['remote_sends'][$identifier]['status'] = 'failure';
			pb_backupbuddy::status( 'details', 'Remote send FAILURE.' );
		} elseif ( is_array( $send_result ) ) { // Array so multipart.
			pb_backupbuddy::$options['remote_sends'][$identifier]['status'] = 'multipart';
			pb_backupbuddy::$options['remote_sends'][$identifier]['finish_time'] = 0;
			pb_backupbuddy::$options['remote_sends'][$identifier]['_multipart_id'] = $send_result[0];
			pb_backupbuddy::$options['remote_sends'][$identifier]['_multipart_status'] = $send_result[1];
			pb_backupbuddy::status( 'details', 'Multipart send in progress.' );
		} else {
			pb_backupbuddy::status( 'error', 'Error #5485785576463. Invalid status send result: `' . $send_result . '`.' );
		}
		pb_backupbuddy::save();
		
		
		// If we sent importbuddy then delete the local copy to clean up.
		if ( $send_importbuddy !== false ) {
			@unlink( $importbuddy_temp ); // Delete temporary importbuddy.
		}
		
		
		return $send_result;
		
	} // End send_remote_destination().
	
	
	
	/*	destination_send()
	 *	
	 *	Send file(s) to a destination. Pass full array of destination settings.
	 *	
	 *	@param		array		$destination_settings		All settings for this destination for this action.
	 *	@param		array		$files						Array of files to send (full path).
	 *	@return		bool|array								Bool true = success, bool false = fail, array = multipart transfer.
	 */
	public function destination_send( $destination_settings, $files ) {
		
		// Pass off to destination handler.
		require_once( pb_backupbuddy::plugin_path() . '/destinations/bootstrap.php' );
		$send_result = pb_backupbuddy_destinations::send( $destination_settings, $files );
		
		return $send_result;
		
	} // End destination_send().
	
	
	
	/*	backups_list()
	 *	
	 *	function description
	 *	
	 *	@param		string		$type			Valid options: default, migrate
	 *	@param		boolean		$subsite_mode	When in subsite mode only backups for that specific subsite will be listed.
	 *	@return		
	 */
	public function backups_list( $type = 'default', $subsite_mode = false ) {
		
		if ( pb_backupbuddy::_POST( 'bulk_action' ) == 'delete_backup' ) {
			$needs_save = false;
			pb_backupbuddy::verify_nonce( pb_backupbuddy::_POST( '_wpnonce' ) ); // Security check to prevent unauthorized deletions by posting from a remote place.
			$deleted_files = array();
			foreach( pb_backupbuddy::_POST( 'items' ) as $item ) {
				if ( file_exists( pb_backupbuddy::$options['backup_directory'] . $item ) ) {
					if ( @unlink( pb_backupbuddy::$options['backup_directory'] . $item ) === true ) {
						$deleted_files[] = $item;
						
						if ( count( pb_backupbuddy::$options['backups'] ) > 5 ) { // Keep a minimum number of backups in array for stats.
							$this_serial = $this->get_serial_from_file( $item );
							unset( pb_backupbuddy::$options['backups'][$this_serial] );
							$needs_save = true;
						}
					} else {
						pb_backupbuddy::alert( 'Error: Unable to delete backup file `' . $item . '`. Please verify permissions.', true );
					}
				} // End if file exists.
			} // End foreach.
			if ( $needs_save === true ) {
				pb_backupbuddy::save();
			}
			
			pb_backupbuddy::alert( __( 'Deleted backup(s):', 'it-l10n-backupbuddy' ) . ' ' . implode( ', ', $deleted_files ) );
		} // End if deleting backup(s).
		
		
		$backups = array();
		$backup_sort_dates = array();
		$files = glob( pb_backupbuddy::$options['backup_directory'] . 'backup*.zip' );
		if ( is_array( $files ) && !empty( $files ) ) { // For robustness. Without open_basedir the glob() function returns an empty array for no match. With open_basedir in effect the glob() function returns a boolean false for no match.
			
			$backup_prefix = $this->backup_prefix(); // Backup prefix for this site. Used for MS checking that this user can see this backup.
			foreach( $files as $file_id => $file ) {
				
				if ( ( $subsite_mode === true ) && is_multisite() ) { // If a Network and NOT the superadmin must make sure they can only see the specific subsite backups for security purposes.
					
					// Only allow viewing of their own backups.
					if ( !strstr( $file, $backup_prefix ) ) {
						unset( $files[$file_id] ); // Remove this backup from the list. This user does not have access to it.
						continue; // Skip processing to next file.
					}
				}
				
				$serial = pb_backupbuddy::$classes['core']->get_serial_from_file( $file );
				
				
				// Populate integrity data structure in options.
				pb_backupbuddy::$classes['core']->backup_integrity_check( $file );
				
				
				// Backup status.
				$pretty_status = array(
					'pass'	=>	'<span class="pb_label pb_label-success">Good</span>', //'Good',
					'fail'	=>	'<span class="pb_label pb_label-important">Bad</span>',
				);
				
				// Backup type.
				$pretty_type = array(
					'full'	=>	'Full',
					'db'	=>	'Database',
				);
				
				$step_times = array();
				if ( isset( pb_backupbuddy::$options['backups'][$serial]['steps'] ) ) {
					foreach( pb_backupbuddy::$options['backups'][$serial]['steps'] as $step ) {
						if ( isset( $step['finish_time'] ) && ( $step['finish_time'] != 0 ) ) {
							
							// Step time taken.
							$step_times[] = $step['finish_time'] - $step['start_time'];
							
						}
					} // End foreach.
				} else { // End if serial in array is set.
					$step_times[] = 'unknown';
				} // End if serial in array is NOT set.
				$step_times = implode( ', ', $step_times );
				
				// Calculate zipping step time to use later for calculating write speed.
				if ( isset( pb_backupbuddy::$options['backups'][$serial]['steps']['backup_zip_files'] ) ) {
					$zip_time = pb_backupbuddy::$options['backups'][$serial]['steps']['backup_zip_files'];
				} else {
					$zip_time = 0;
				}
				
				// Calculate write speed in MB/sec for this backup.
				if ( $zip_time == '0' ) { // Took approx 0 seconds to backup so report this speed.
					if ( !isset( $finish_time ) || ( $finish_time == '0' ) ) {
						$write_speed = 'unknown';
					} else {
						$write_speed = '> ' . pb_backupbuddy::$format->file_size( pb_backupbuddy::$options['backups'][$serial]['integrity']['size'] );
					}
				} else {
					$write_speed = pb_backupbuddy::$format->file_size( pb_backupbuddy::$options['backups'][$serial]['integrity']['size'] / $zip_time );
				}
				
				// Calculate start and finish.
				if ( isset( pb_backupbuddy::$options['backups'][$serial]['start_time'] ) && isset( pb_backupbuddy::$options['backups'][$serial]['finish_time'] ) && ( pb_backupbuddy::$options['backups'][$serial]['start_time'] >0 ) && ( pb_backupbuddy::$options['backups'][$serial]['finish_time'] > 0 ) ) {
					$start_time = pb_backupbuddy::$options['backups'][$serial]['start_time'];
					$finish_time = pb_backupbuddy::$options['backups'][$serial]['finish_time'];
					$total_time = $finish_time - $start_time;
				} else {
					$total_time = 'unknown';
				}
				
				
				
				// Figure out trigger.
				if ( isset( pb_backupbuddy::$options['backups'][$serial]['trigger'] ) ) {
					$trigger = pb_backupbuddy::$options['backups'][$serial]['trigger'];
				} else {
					$trigger = __( 'Unknown', 'it-l10n-backupbuddy' );
				}
				
				// HTML output for stats.
				$statistics = '';
				if ( $total_time != 'unknown' ) {
					$statistics .= "<span style='width: 80px; display: inline-block;'>Total time:</span>{$total_time} secs<br>";
				}
				if ( $step_times != 'unknown' ) {
					$statistics .= "<span style='width: 80px; display: inline-block;'>Step times:</span>{$step_times}<br>";
				}
				if ( $write_speed != 'unknown' ) {
					$statistics .= "<span style='width: 80px; display: inline-block;'>Write speed:</span>{$write_speed}/sec";
				}
				
				// Calculate time ago.
				$time_ago = '<span class="description">' . pb_backupbuddy::$format->time_ago( pb_backupbuddy::$options['backups'][$serial]['integrity']['modified'] ) . ' ago</span>';
				
				// Calculate main row string.
				if ( $type == 'default' ) { // Default backup listing.
					$main_string = '<a href="' . pb_backupbuddy::ajax_url( 'download_archive' ) . '&backupbuddy_backup=' . basename( $file ) . '">' . basename( $file ) . '</a>';
				} elseif ( $type == 'migrate' ) { // Migration backup listing.
					$main_string = '<a class="pb_backupbuddy_hoveraction_migrate" rel="' . basename( $file ) . '" href="' . pb_backupbuddy::page_url() . '&migrate=' . basename( $file ) . '&value=' . basename( $file ) . '">' . basename( $file ) . '</a>';
				} else {
					$main_string = '{Unknown type.}';
				}
				// Add comment to main row string if applicable.
				if ( isset( pb_backupbuddy::$options['backups'][$serial]['integrity']['comment'] ) && ( pb_backupbuddy::$options['backups'][$serial]['integrity']['comment'] !== false ) && ( pb_backupbuddy::$options['backups'][$serial]['integrity']['comment'] !== '' ) ) {
					$main_string .= '<br><span class="description">Note: <span class="pb_backupbuddy_notetext">' . pb_backupbuddy::$options['backups'][$serial]['integrity']['comment'] . '</span></span>';
				}
				
				if ( pb_backupbuddy::$options['backups'][$serial]['integrity']['status'] == 'pass' ) {
					$status_details = __( 'All tests passed.', 'it-l10n-backupbuddy' );
				} else {
					$status_details = pb_backupbuddy::$options['backups'][$serial]['integrity']['status_details'];
				}
				
				
				$backups[basename( $file )] = array(
					array( basename( $file ), $main_string ),
					pb_backupbuddy::$format->prettify( pb_backupbuddy::$options['backups'][$serial]['integrity']['detected_type'], $pretty_type ),
					pb_backupbuddy::$format->file_size( pb_backupbuddy::$options['backups'][$serial]['integrity']['size'] ),
					pb_backupbuddy::$format->date( pb_backupbuddy::$format->localize_time( pb_backupbuddy::$options['backups'][$serial]['integrity']['modified'] ) ) . '<br>' . $time_ago,
					$statistics,
					
					pb_backupbuddy::$format->prettify( pb_backupbuddy::$options['backups'][$serial]['integrity']['status'], $pretty_status ) .
						' <a href="' . pb_backupbuddy::page_url() . '&reset_integrity=' . $serial  . '" title="Rescan integrity. Last checked ' . pb_backupbuddy::$format->date( pb_backupbuddy::$options['backups'][$serial]['integrity']['scan_time'] ) . '."><img src="' . pb_backupbuddy::plugin_url() . '/images/refresh_gray.gif" style="vertical-align: -1px;"></a>' .
						'<div class="row-actions"><a title="' . __( 'Integrity Check Details', 'it-l10n-backupbuddy' ) . '" href="' . pb_backupbuddy::ajax_url( 'integrity_status' ) . '&serial=' . $serial . '&#038;TB_iframe=1&#038;width=640&#038;height=600" class="thickbox">' . __( 'View Details', 'it-l10n-backupbuddy' ) . '</a></div>',
				);
				
				$backup_sort_dates[basename( $file)] = pb_backupbuddy::$options['backups'][$serial]['integrity']['modified'];
				
			} // End foreach().
			
		} // End if.
		
		// Sort backup sizes.
		arsort( $backup_sort_dates );
		// Re-arrange backups based on sort dates.
		$sorted_backups = array();
		foreach( $backup_sort_dates as $backup_file => $backup_sort_date ) {
			$sorted_backups[$backup_file] = $backups[$backup_file];
			unset( $backups[$backup_file] );
		}
		unset( $backups );
		
		
		return $sorted_backups;
		
	} // End backups_list().
	
	
	
	// If output file not specified then outputs to browser as download.
	// IMPORTANT: If outputting to browser (no output file) must die() after outputting content if using AJAX. Do not output to browser anything after this function in this case.
	public static function importbuddy( $output_file = '', $importbuddy_pass_hash = '' ) {
		if ( defined( 'PB_DEMO_MODE' ) ) {
			echo 'Access denied in demo mode.';
			return;
		}
		
		pb_backupbuddy::set_greedy_script_limits(); // Some people run out of PHP memory.
		
		if ( $importbuddy_pass_hash == '' ) {
			if ( !isset( pb_backupbuddy::$options ) ) {
				pb_backupbuddy::load();
			}
			$importbuddy_pass_hash = pb_backupbuddy::$options['importbuddy_pass_hash'];
		}
		
		if ( $importbuddy_pass_hash == '' ) {
			$message = 'Error #9032: Warning only - You have not set a password to generate the ImportBuddy script yet on the BackupBuddy Settings page. If you are creating a backup, the importbuddy.php restore script will not be included in the backup. You can download it from the Restore page.  If you were trying to download ImportBuddy then you may have a plugin confict preventing the page from prompting you to enter a password.';
			pb_backupbuddy::status( 'warning', $message );
			return false;
		}
		
		$output = file_get_contents( pb_backupbuddy::plugin_path() . '/_importbuddy/_importbuddy.php' );
		if ( $importbuddy_pass_hash != '' ) {
			$output = preg_replace('/#PASSWORD#/', $importbuddy_pass_hash, $output, 1 ); // Only replaces first instance.
		}
		$output = preg_replace('/#VERSION#/', pb_backupbuddy::settings( 'version' ), $output, 1 ); // Only replaces first instance.
		
		// PACK IMPORTBUDDY
		$_packdata = array( // NO TRAILING OR PRECEEDING SLASHES!
			
			'_importbuddy/importbuddy'			=>		'importbuddy',
			'classes/_migrate_database.php'		=>		'importbuddy/classes/_migrate_database.php',
			'classes/core.php'					=>		'importbuddy/classes/core.php',
			'classes/import.php'				=>		'importbuddy/classes/import.php',
			
			
			'images/working.gif'				=>		'importbuddy/images/working.gif',
			'images/bullet_go.png'				=>		'importbuddy/images/bullet_go.png',
			'images/favicon.png'				=>		'importbuddy/images/favicon.png',
			'images/sort_down.png'				=>		'importbuddy/images/sort_down.png',
			
			
			'lib/dbreplace'						=>		'importbuddy/lib/dbreplace',
			'lib/dbimport'						=>		'importbuddy/lib/dbimport',
			'lib/commandbuddy'					=>		'importbuddy/lib/commandbuddy',
			'lib/zipbuddy'						=>		'importbuddy/lib/zipbuddy',
			'lib/mysqlbuddy'					=>		'importbuddy/lib/mysqlbuddy',
			'lib/textreplacebuddy'				=>		'importbuddy/lib/textreplacebuddy',
			'lib/cpanel'						=>		'importbuddy/lib/cpanel',
			
			'pluginbuddy'						=>		'importbuddy/pluginbuddy',
			
			
			'controllers/pages/server_info'		=>		'importbuddy/controllers/pages/server_info',
			'controllers/pages/server_info.php'	=>		'importbuddy/controllers/pages/server_info.php',
			//'classes/_get_backup_dat.php'		=>		'importbuddy/classes/_get_backup_dat.php',
			
			
			// Stash
			'destinations/stash/lib/class.itx_helper.php'		=>		'importbuddy/classes/class.itx_helper.php',
			'destinations/stash/lib/aws-sdk/lib/requestcore'	=>		'importbuddy/lib/requestcore',
			//'destinations/bootstrap.php'		=>		'importbuddy/destinations/bootstrap.php',
			//'destinations/stash'				=>		'importbuddy/destinations/stash',
			
		);
		
		$output .= "\n<?php /*\n###PACKDATA,BEGIN\n";
		foreach( $_packdata as $pack_source => $pack_destination ) {
			$pack_source = '/' . $pack_source;
			if ( is_dir( pb_backupbuddy::plugin_path() . $pack_source ) ) {
				$files = pb_backupbuddy::$filesystem->deepglob( pb_backupbuddy::plugin_path() . $pack_source );
			} else {
				$files = array( pb_backupbuddy::plugin_path() . $pack_source );
			}
			foreach( $files as $file ) {
				if ( is_file( $file ) ) {
					$source = str_replace( pb_backupbuddy::plugin_path(), '', $file );
					$destination = $pack_destination . substr( $source, strlen( $pack_source ) );
					$output .= "###PACKDATA,FILE_START,{$source},{$destination}\n";
					$output .= base64_encode( file_get_contents( $file ) );
					$output .= "\n";
					$output .= "###PACKDATA,FILE_END,{$source},{$destination}\n";
				}
			}
		}
		$output .= "###PACKDATA,END\n*/";
		$output .= "\n\n\n\n\n\n\n\n\n\n";
		
		if ( $output_file == '' ) { // No file so output to browser.
			header( 'Content-Description: File Transfer' );
			header( 'Content-Type: text/plain; name=importbuddy.php' );
			header( 'Content-Disposition: attachment; filename=importbuddy.php' );
			header( 'Expires: 0' );
			header( 'Content-Length: ' . strlen( $output ) );
			
			flush();
			echo $output;
			flush();
			
			// BE SURE TO die() AFTER THIS AND NOT OUTPUT TO BROWSER!
		} else { // Write to file.
			file_put_contents( $output_file, $output );
		}
				
	} // End importbuddy().
	
	
	
	// TODO: RepairBuddy is not yet converted into new framework so just using pre-BB3.0 version for now.
	public function repairbuddy( $output_file = '' ) {
		if ( defined( 'PB_DEMO_MODE' ) ) {
			echo 'Access denied in demo mode.';
			return;
		}
		
		if ( !isset( pb_backupbuddy::$options ) ) {
			pb_backupbuddy::load();
		}
		$output = file_get_contents( pb_backupbuddy::plugin_path() . '/_repairbuddy.php' );
		if ( pb_backupbuddy::$options['repairbuddy_pass_hash'] != '' ) {
			$output = preg_replace('/#PASSWORD#/', pb_backupbuddy::$options['repairbuddy_pass_hash'], $output, 1 ); // Only replaces first instance.
		}
		$output = preg_replace('/#VERSION#/', pb_backupbuddy::settings( 'version' ), $output, 1 ); // Only replaces first instance.
		
		
		if ( $output_file == '' ) { // No file so output to browser.
			header( 'Content-Description: File Transfer' );
			header( 'Content-Type: text/plain; name=repairbuddy.php' );
			header( 'Content-Disposition: attachment; filename=repairbuddy.php' );
			header( 'Expires: 0' );
			header( 'Content-Length: ' . strlen( $output ) );
			
			flush();
			echo $output;
			flush();
			
			// BE SURE TO die() AFTER THIS AND NOT OUTPUT TO BROWSER!
		} else { // Write to file.
			file_put_contents( $output_file, $output );
		}
				
	} // End repairbuddy().
	
	
	
	function pretty_destination_type( $type ) {
		if ( $type == 'rackspace' ) {
			return 'Rackspace';
		} elseif ( $type == 'email' ) {
			return 'Email';
		} elseif ( $type == 's3' ) {
			return 'Amazon S3';
		} elseif ( $type == 'ftp' ) {
			return 'FTP';
		} elseif ( $type == 'dropbox' ) {
			return 'Dropbox';
		} else {
			return $type;
		}
	} // End pretty_destination_type().
	
	
	
	// $max_depth	int		Maximum depth of tree to display.  Npte that deeper depths are still traversed for size calculations.
	function build_icicle( $dir, $base, $icicle_json, $max_depth = 10, $depth_count = 0, $is_root = true ) {
		$bg_color = '005282';
		
		$depth_count++;
		$bg_color = dechex( hexdec( $bg_color ) - ( $depth_count * 15 ) );
		
		$icicle_json = '{' . "\n";
		
		$dir_name = $dir;
		$dir_name = str_replace( ABSPATH, '', $dir );
		$dir_name = str_replace( '\\', '/', $dir_name );
		
		$dir_size = 0;
		$sub = opendir( $dir );
		$has_children = false;
		while( $file = readdir( $sub ) ) {
			if ( ( $file == '.' ) || ( $file == '..' ) ) {
				continue; // Next loop.
			} elseif ( is_dir( $dir . '/' . $file ) ) {
				
				$dir_array = '';
				$response = $this->build_icicle( $dir . '/' . $file, $base, $dir_array, $max_depth, $depth_count, false );
				if ( ( $max_depth-1 > 0 ) || ( $max_depth == -1 ) ) { // Only adds to the visual tree if depth isnt exceeded.
					if ( $max_depth > 0 ) {
						$max_depth = $max_depth - 1;
					}
					
					if ( $has_children === false ) { // first loop add children section
						$icicle_json .= '"children": [' . "\n";
					} else {
						$icicle_json .= ',';
					}
					$icicle_json .= $response[0];
					
					$has_children = true;
				}
				$dir_size += $response[1];
				unset( $response );
				unset( $file );
				
				
			} else {
				$stats = stat( $dir . '/' . $file );
				$dir_size += $stats['size'];
				unset( $file );
			}
		}
		closedir( $sub );
		unset( $sub );
		
		if ( $has_children === true ) {
			$icicle_json .= ' ]' . "\n";
		}
		
		if ( $has_children === true ) {
			$icicle_json .= ',';
		}
		
		$icicle_json .= '"id": "node_' . str_replace( '/', ':', $dir_name ) . ': ^' . str_replace( ' ', '~', pb_backupbuddy::$format->file_size( $dir_size ) ) . '"' . "\n";
		
		$dir_name = str_replace( '/', '', strrchr( $dir_name, '/' ) );
		if ( $dir_name == '' ) { // Set root to be /.
			$dir_name = '/';
		}
		$icicle_json .= ', "name": "' . $dir_name . ' (' . pb_backupbuddy::$format->file_size( $dir_size ) . ')"' . "\n";
		
		$icicle_json .= ',"data": { "$dim": ' . ( $dir_size + 10 ) . ', "$color": "#' . str_pad( $bg_color, 6, '0', STR_PAD_LEFT ) . '" }' . "\n";
		$icicle_json .= '}';
		
		if ( $is_root !== true ) {
			//$icicle_json .= ',x';
		}
		
		return array( $icicle_json, $dir_size );
	} // End build_icicle().
	
	
	// return array of tests and their results.
	public function preflight_check() {
		$tests = array();
		
		
		// MULTISITE BETA WARNING.
		if ( is_multisite() && pb_backupbuddy::$classes['core']->is_network_activated() && !defined( 'PB_DEMO_MODE' ) ) { // Multisite installation.
			$tests[] = array(
				'test'		=>	'multisite_beta',
				'success'	=>	false,
				'message'	=>	'BETA WARNING:
	Multisite functionality is in BETA and is not supported. It is for preview or experimental use only. It is not for use on live sites.
	Use of beta Multisite features on production sites is at your own risk.
	See the <a href="http://ithemes.com/codex/page/BackupBuddy_Multisite">Multisite Knowledge Base</a> for additional information.
	Multisite functionality does not receive official technical support due to the beta status.
	<br><br>
	
	Migrating entire Multisite Networks to a new URL is NOT supported.
	Networks cannot not be migrated to a new URL (especially in or out of a subdirectory) without advanced user assistance.
		As such, we do not officially support migrating a Network to a new URL.
		If you do migrate an entire Network to a new URL only the main site URLs will be migrated in the
		database. You may use the Server Information page Mass Database Text Replacement tool to manually
		migrate each subsite URL as needed. We recommend only advanced users attempt this. This is a technical
		limitation of Multisite Network migrations only, and only when the URL would change.
	'
			);
		}
		
		
		// LOOPBACKS TEST.
		if ( ( $loopback_response = $this->loopback_test() ) === true ) {
			$success = true;
			$message = '';
		} else { // failed
			$success = false;
			if ( defined( 'ALTERNATE_WP_CRON' ) && ( ALTERNATE_WP_CRON == true ) ) {
				$message = __('Running in Alternate WordPress Cron mode. HTTP Loopback Connections are not enabled on this server but you have overridden this in the wp-config.php file (this is a good thing).', 'it-l10n-backupbuddy' ) . ' <a href="http://ithemes.com/codex/page/BackupBuddy:_Frequent_Support_Issues#HTTP_Loopback_Connections_Disabled" target="_new">' . __('Additional Information Here', 'it-l10n-backupbuddy' ) . '</a>.';
			} else {
				$message = __('HTTP Loopback Connections are not enabled on this server. You may encounter stalled, significantly delayed backups, or other difficulties.', 'it-l10n-backupbuddy' ) . ' <a href="http://ithemes.com/codex/page/BackupBuddy:_Frequent_Support_Issues#HTTP_Loopback_Connections_Disabled" target="_new">' . __('Click for instructions on how to resolve this issue.', 'it-l10n-backupbuddy' ) . '</a>';
			}
		}
		$tests[] = array(
			'test'		=>	'loopbacks',
			'success'	=>	$success,
			'message'	=>	$message,
		);
		
		
		// Reminder if no schedules are set up yet.
		/* CURRENTLY MOVED TO SCHEDULES PAGE.
		if ( count( pb_backupbuddy::$options['schedules'] ) == 0 ) {
			$success = false;
			$message = __( 'Reminder: Creating a <a href="?page=pb_backupbuddy_scheduling">scheduled backup</a> keeps your site safe and backed up without requiring manual backups. Create a schedule or dismiss this alert (link to the right) to hide it.', 'it-l10n-backupbuddy' );
		} else {
			$success = true;
			$message = '';
		}
		$tests[] = array(
			'test'		=>	'no_schedule_reminder',
			'success'	=>	$success,
			'message'	=>	$message,
		);
		*/
		
		
		// WORDPRESS IN SUBDIRECTORIES TEST.
		$wordpress_locations = $this->get_wordpress_locations();
		if ( count( $wordpress_locations ) > 0 ) {
			$success = false;
			$message = __( 'WordPress may have been detected in one or more subdirectories. Backing up multiple instances of WordPress may result in server timeouts due to increased backup time. You may exclude WordPress directories via the Settings page. Detected non-excluded locations:', 'it-l10n-backupbuddy' ) . ' ' . implode( ', ', $wordpress_locations );
		} else {
			$success = true;
			$message = '';
		}
		$tests[] = array(
			'test'		=>	'wordpress_subdirectories',
			'success'	=>	$success,
			'message'	=>	$message,
		);
		
		
		// Log file directory writable for status logging.
		$status_directory = WP_CONTENT_DIR . '/uploads/pb_' . pb_backupbuddy::settings( 'slug' ) . '/';
		if ( ! is_writable( $status_directory ) ) {
			$success = false;
			$message = 'The status log file directory `' . $status_directory . '` is not writable. Please verify permissions before creating a backup. Backup status information will be unavailable until this is resolved.';
		} else {
			$success = true;
			$message = '';
		}
		$tests[] = array(
			'test'		=>	'status_directory_writable',
			'success'	=>	$success,
			'message'	=>	$message,
		);
		
		
		// CHECK ZIP AVAILABILITY.
		require_once( pb_backupbuddy::plugin_path() . '/lib/zipbuddy/zipbuddy.php' );
		
		if ( !isset( pb_backupbuddy::$classes['zipbuddy'] ) ) {
			pb_backupbuddy::$classes['zipbuddy'] = new pluginbuddy_zipbuddy( pb_backupbuddy::$options['backup_directory'] );
		}
		
		if ( !in_array( 'exec', pb_backupbuddy::$classes['zipbuddy']->_zip_methods ) ) {
			$success = false;
			$message =  __('Your server does not support command line ZIP which is a BackupBuddy server requirement. Backups will be performed in compatibility mode.', 'it-l10n-backupbuddy' ) 
						    . __('Directory/file exclusion is not available in this mode so even existing backups will be backed up.', 'it-l10n-backupbuddy' ) 
						    . ' '
						    . __('You may encounter stalled or significantly delayed backups.', 'it-l10n-backupbuddy' ) 
						    .  '<a href="http://ithemes.com/codex/page/BackupBuddy:_Frequent_Support_Issues#Compatibility_Mode" target="_new">' 
						    . ' ' . __('Click for instructions on how to resolve this issue.', 'it-l10n-backupbuddy' ) 
						    . '</a>';
		} else { // Success.
			$success = true;
			$message = '';
		}
		$tests[] = array(
			'test'		=>	'zip_methods',
			'success'	=>	$success,
			'message'	=>	$message,
		);
		
		// Show warning if recent backups reports it is not complete yet. (3min is recent)
		if ( isset( pb_backupbuddy::$options['backups'][pb_backupbuddy::$options['last_backup_serial']]['updated_time'] ) && ( time() - pb_backupbuddy::$options['backups'][pb_backupbuddy::$options['last_backup_serial']]['updated_time'] < 180 ) ) { // Been less than 3min since last backup.
			if ( !empty( pb_backupbuddy::$options['backups'][pb_backupbuddy::$options['last_backup_serial']]['steps'] ) ) {
				
				$found_unfinished = false;
				foreach( pb_backupbuddy::$options['backups'][pb_backupbuddy::$options['last_backup_serial']]['steps'] as $step ) {
					if ( $step['finish_time'] == '0' ) { // Found an unfinished step.
						$found_unfinished = true;
						break;
					}
				}
				
				if ( $found_unfinished === true ) {
					$tests[] = array(
						'test'		=>	'recent_backup',
						'success'	=>	false,
						'message'	=>	__('A backup was recently started and reports unfinished steps. You should wait unless you are sure the previous backup has completed or failed to avoid placing a heavy load on your server.', 'it-l10n-backupbuddy' ) .
										' Last updated: ' . pb_backupbuddy::$format->date( pb_backupbuddy::$options['backups'][pb_backupbuddy::$options['last_backup_serial']]['updated_time'] ) . '; '.
										' Serial: ' . pb_backupbuddy::$options['last_backup_serial']
						,
					);
				}
			}
		}
		
		// Check if any backups are in site root (ie from a recent restore).
		$files = glob( ABSPATH . 'backup-*.zip' );
		if ( !is_array( $files ) || empty( $files ) ) {
			$files = array();
		}
		foreach( $files as &$file ) {
			$file = basename( $file );
		}
		if ( count( $files ) > 0 ) {
			$files_string = implode( ', ', $files );
			$tests[] = array(
				'test'		=>	'root_backups-' . $files_string,
				'success'	=>	false,
				'message'	=>	'One or more backup files, `' . $files_string . '` was found in the root directory of this site. This may be leftover from a recent restore. You should usually remove backup files from the site root for security.',
			);
		}
		
		// Warn if any BackupBuddy ZIP files are found in root of directory (ie from an import).
				
		return $tests;
		
	} // End preflight_check().
	
	
	
	
	// returns true on success, error message otherwise.
	/*	loopback_test()
	 *	
	 *	Connects back to same site via AJAX call to an AJAX slug that has NOT been registered.
	 *	WordPress AJAX returns a -1 (or 0 in newer version?) for these. Also not logged into
	 *	admin when connecting back. Checks to see if body contains -1 / 0. If loopbacks are not
	 *	enabled then will fail connecting or do something else.
	 *	
	 *	
	 *	@param		
	 *	@return		boolean		True on success, string error message otherwise.
	 */
	function loopback_test() {
		$loopback_url = admin_url('admin-ajax.php');
		pb_backupbuddy::status( 'details', 'Testing loopback connections by connecting back to site at the URL: `' . $loopback_url . '`. It should display simply "0" or "-1" in the body.' );
		$response = wp_remote_get(
			$loopback_url,
			array(
				'method' => 'GET',
				'timeout' => 5, // 5 second delay. A loopback should be very fast.
				'redirection' => 5,
				'httpversion' => '1.0',
				'blocking' => true,
				'headers' => array(),
				'body' => null,
				'cookies' => array()
			)
		);
		
		if( is_wp_error( $response ) ) { // Loopback failed. Some kind of error.
			$error = $response->get_error_message();
			pb_backupbuddy::status( 'error', 'Loopback test error: `' . $error . '`.' );
			return 'Error: ' . $error;
		} else {
			if ( ( $response['body'] == '-1' ) || ( $response['body'] == '0' ) ) { // Loopback succeeded.
				pb_backupbuddy::status( 'details', 'HTTP Loopback test success. Returned `' . $response['body'] . '`.' );
				return true;
			} else { // Loopback failed.
				$error = 'A loopback seemed to occur but the value `' . $response['body'] . '` was not correct.';
				pb_backupbuddy::status( 'error', $error );
				return $error;
			}
		}
	}
	
	
	
	
	// Returns array of subdirectories that contain WordPress.
	function get_wordpress_locations() {
		$wordpress_locations = array();
		
		$files = glob( ABSPATH . '*/' );
		if ( !is_array( $files ) || empty( $files ) ) {
			$files = array();
		}
		
		foreach( $files as $file ) {
			if ( file_exists( $file . 'wp-config.php' ) ) {
				$wordpress_locations[]  = rtrim( '/' . str_replace( ABSPATH, '', $file ), '/\\' );
			}
		}
		
		// Remove any excluded directories from showing up in this.
		$directory_exclusions = $this->get_directory_exclusions();		
		$wordpress_locations = array_diff( $wordpress_locations, $directory_exclusions );
		
		return $wordpress_locations;
	}
	
	
	
	
		
	
	
	// TODO: coming soon.
	// Run through potential orphaned files, data structures, etc caused by failed backups and clean things up.
	// Also verifies anti-directory browsing files exists, etc.
	function periodic_cleanup( $backup_age_limit = 43200, $die_on_fail = true ) {
		
		pb_backupbuddy::status( 'message', 'Starting cleanup procedure for BackupBuddy v' . pb_backupbuddy::settings( 'version' ) . '.' );
		
		if ( !isset( pb_backupbuddy::$options ) ) {
			$this->load();
		}
		
		
		// TODO: Check for orphaned .gz files in root from PCLZip.
		
		
		// Cleanup backup itegrity portion of array.
		// (status logging info inside function)
		$this->trim_backups_integrity_stats();
		
		
		// Cleanup logs in pb_backupbuddy dirctory.
		pb_backupbuddy::status( 'details', 'Cleaning up old logs.' );
		$log_directory = WP_CONTENT_DIR . '/uploads/pb_' . pb_backupbuddy::settings( 'slug' ) . '/';
		$files = glob( $log_directory . '*.txt' );
		if ( is_array( $files ) && !empty( $files ) ) { // For robustness. Without open_basedir the glob() function returns an empty array for no match. With open_basedir in effect the glob() function returns a boolean false for no match.
			foreach( $files as $file ) {
				$file_stats = stat( $file );
				if ( ( time() - $file_stats['mtime'] ) > $backup_age_limit ) { // If older than 12 hours, delete the log.
					@unlink( $file );
				}
			}
		}
		
		
		// Cleanup excess backup stats.
		pb_backupbuddy::status( 'details', 'Cleaning up backup stats.' );
		if ( count( pb_backupbuddy::$options['backups'] ) > 3 ) { // Keep a minimum number of backups in array for stats.
			$number_backups = count( pb_backupbuddy::$options['backups'] );
			$kept_loop_count = 0;
			
			$needs_save = false;
			foreach( pb_backupbuddy::$options['backups'] as $backup_serial => $backup ) {
				if ( ( $number_backups - $kept_loop_count ) > 3 ) {
					if ( isset( $backup['archive_file'] ) && !file_exists( $backup['archive_file'] ) ) {
						unset( pb_backupbuddy::$options['backups'][$backup_serial] );
						$needs_save = true;
					} else {
						$kept_loop_count++;
					}
				}
			}
			if ( $needs_save === true ) {
				//echo 'saved';
				pb_backupbuddy::save();
			}
		}
		
		
		// Cleanup any temporary local destinations.
		pb_backupbuddy::status( 'details', 'Cleaning up any temporary local destinations.' );
		foreach( pb_backupbuddy::$options['remote_destinations'] as $destination_id => $destination ) {
			if ( ( $destination['type'] == 'local' ) && ( isset( $destination['temporary'] ) && ( $destination['temporary'] === true ) ) ) { // If local and temporary.
				if ( ( time() - $destination['created'] ) > $backup_age_limit ) { // Older than 12 hours; clear out!
					pb_backupbuddy::status( 'details', 'Cleaned up stale local destination `' . $destination_id . '`.' );
					unset( pb_backupbuddy::$options['remote_destinations'][$destination_id] );
					pb_backupbuddy::save();
				}
			}
		}
		
		
		// Cleanup excess remote sending stats.
		pb_backupbuddy::status( 'details', 'Cleaning up remote send stats.' );
		$this->trim_remote_send_stats();
		
		
		// Check for orphaned backups in the data structure that havent been updates in 12+ hours & cleanup after them.
		pb_backupbuddy::status( 'details', 'Cleaning up data structure.' );
		foreach( (array)pb_backupbuddy::$options['backups'] as $backup_serial => $backup ) {
			if ( isset( $backup['updated_time'] ) ) {
				if ( ( time() - $backup['updated_time'] ) > $backup_age_limit ) { // If more than 12 hours has passed...
					pb_backupbuddy::status( 'details', 'Cleaned up stale backup `' . $backup_serial . '`.' );
					$this->final_cleanup( $backup_serial );
				}
			}
		}
		
		
		// Verify existance of anti-directory browsing files in backup directory.
		pb_backupbuddy::status( 'details', 'Verifying anti-directory browsing security on backup directory.' );
		pb_backupbuddy::anti_directory_browsing( pb_backupbuddy::$options['backup_directory'], $die_on_fail );
		
		
		// Verify existance of anti-directory browsing files in status log directory.
		pb_backupbuddy::status( 'details', 'Verifying anti-directory browsing security on status log directory.' );
		$status_directory = WP_CONTENT_DIR . '/uploads/pb_' . pb_backupbuddy::settings( 'slug' ) . '/';
		pb_backupbuddy::anti_directory_browsing( $status_directory, $die_on_fail );
		
		
		// Handle high security mode archives directory .htaccess system. If high security backup directory mode: Make sure backup archives are NOT downloadable by default publicly. This is only lifted for ~8 seconds during a backup download for security. Overwrites any existing .htaccess in this location.
		if ( pb_backupbuddy::$options['lock_archives_directory'] == '0' ) { // Normal security mode. Put normal .htaccess.
			pb_backupbuddy::status( 'details', 'Removing .htaccess high security mode for backups directory. Normal mode .htaccess to be added next.' );
			// Remove high security .htaccess.
			if ( file_exists( pb_backupbuddy::$options['backup_directory'] . '.htaccess' ) ) {
				$unlink_status = @unlink( pb_backupbuddy::$options['backup_directory'] . '.htaccess' );
				if ( $unlink_status === false ) {
					pb_backupbuddy::alert( 'Error #844594. Unable to temporarily remove .htaccess security protection on archives directory to allow downloading. Please verify permissions of the BackupBuddy archives directory or manually download via FTP.' );
				}
			}
			
			// Place normal .htaccess.
			pb_backupbuddy::anti_directory_browsing( pb_backupbuddy::$options['backup_directory'], $die_on_fail );
		
		} else { // High security mode. Make sure high security .htaccess in place.
			pb_backupbuddy::status( 'details', 'Adding .htaccess high security mode for backups directory.' );
			$htaccess_creation_status = @file_put_contents( pb_backupbuddy::$options['backup_directory'] . '.htaccess', 'deny from all' );
			if ( $htaccess_creation_status === false ) {
				pb_backupbuddy::alert( 'Error #344894545. Security Warning! Unable to create security file (.htaccess) in backups archive directory. This file prevents unauthorized downloading of backups should someone be able to guess the backup location and filenames. This is unlikely but for best security should be in place. Please verify permissions on the backups directory.' );
			}
			
		}
		
		
		// Verify existance of anti-directory browsing files in temporary directory.
		pb_backupbuddy::status( 'details', 'Verifying anti-directory browsing security on temp directory.' );
		pb_backupbuddy::anti_directory_browsing( pb_backupbuddy::$options['temp_directory'], $die_on_fail );
		
		
		// Remove any copy of importbuddy.php in root.
		pb_backupbuddy::status( 'details', 'Cleaning up importbuddy.php script in site root if it exists.' );
		if ( file_exists( ABSPATH . 'importbuddy.php' ) ) {
			pb_backupbuddy::status( 'details', 'Unlinked importbuddy.php in root of site.' );
			unlink( ABSPATH . 'importbuddy.php' );
		}
		
		
		// Remove any copy of importbuddy directory in root.
		pb_backupbuddy::status( 'details', 'Cleaning up importbuddy directory in site root if it exists.' );
		if ( file_exists( ABSPATH . 'importbuddy/' ) ) {
			pb_backupbuddy::status( 'details', 'Unlinked importbuddy directory recursively in root of site.' );
			pb_backupbuddy::$filesystem->unlink_recursive( ABSPATH . 'importbuddy/' );
		}
		
		
		// Remove any old temporary directories in wp-content/uploads/backupbuddy_temp/. Logs any directories it cannot delete.
		pb_backupbuddy::status( 'details', 'Cleaning up any old temporary zip directories in: wp-content/uploads/backupbuddy_temp/' );
		$temp_directory = WP_CONTENT_DIR . '/uploads/backupbuddy_temp/';
		$files = glob( $temp_directory . '*' );
		if ( is_array( $files ) && !empty( $files ) ) { // For robustness. Without open_basedir the glob() function returns an empty array for no match. With open_basedir in effect the glob() function returns a boolean false for no match.
			foreach( $files as $file ) {
				if ( ( strpos( $file, 'index.' ) !== false ) || ( strpos( $file, '.htaccess' ) !== false ) ) { // Index file or htaccess dont get deleted so go to next file.
					continue;
				}
				$file_stats = stat( $file );
				if ( ( time() - $file_stats['mtime'] ) > $backup_age_limit ) { // If older than 12 hours, delete the log.
					if ( @pb_backupbuddy::$filesystem->unlink_recursive( $file ) === false ) {
						pb_backupbuddy::status( 'error', 'Unable to clean up (delete) temporary directory/file: `' . $file . '`. You should manually delete it or check permissions.' );
					}
				}
			}
		}
		
		
		// Remove any old temporary zip directories: wp-content/uploads/backupbuddy_backups/temp_zip_XXXX/. Logs any directories it cannot delete.
		pb_backupbuddy::status( 'details', 'Cleaning up any old temporary zip directories in backup directory temp location `' . pb_backupbuddy::$options['backup_directory'] . 'temp_zip_XXXX/`.' );
		// $temp_directory = WP_CONTENT_DIR . '/uploads/backupbuddy_backups/temp_zip_*';
		$temp_directory = pb_backupbuddy::$options['backup_directory'] . 'temp_zip_*';
		$files = glob( $temp_directory . '*' );
		if ( is_array( $files ) && !empty( $files ) ) { // For robustness. Without open_basedir the glob() function returns an empty array for no match. With open_basedir in effect the glob() function returns a boolean false for no match.
			foreach( $files as $file ) {
				if ( ( strpos( $file, 'index.' ) !== false ) || ( strpos( $file, '.htaccess' ) !== false ) ) { // Index file or htaccess dont get deleted so go to next file.
					continue;
				}
				$file_stats = stat( $file );
				if ( ( time() - $file_stats['mtime'] ) > $backup_age_limit ) { // If older than 12 hours, delete the log.
					if ( @pb_backupbuddy::$filesystem->unlink_recursive( $file ) === false ) {
						pb_backupbuddy::status( 'error', 'Unable to clean up (delete) temporary directory/file: `' . $file . '`. You should manually delete it or check permissions.' );
					}
				}
			}
		}
		
		
		pb_backupbuddy::status( 'message', 'Finished cleanup procedure.' );
		
	} // End periodic_cleanup().
	
	
	
	public function final_cleanup( $serial ) {
		
		if ( !isset( pb_backupbuddy::$options ) ) {
			pb_backupbuddy::load();
		}
		
		pb_backupbuddy::status( 'details', 'cron_final_cleanup started' );
		
		// Delete temporary data directory.
		if ( isset( pb_backupbuddy::$options['backups'][$serial]['temp_directory'] ) && file_exists( pb_backupbuddy::$options['backups'][$serial]['temp_directory'] ) ) {
			pb_backupbuddy::$filesystem->unlink_recursive( pb_backupbuddy::$options['backups'][$serial]['temp_directory'] );
		}
		
		// Delete temporary zip directory.
		if ( isset( pb_backupbuddy::$options['backups'][$serial]['temporary_zip_directory'] ) && file_exists( pb_backupbuddy::$options['backups'][$serial]['temporary_zip_directory'] ) ) {
			pb_backupbuddy::$filesystem->unlink_recursive( pb_backupbuddy::$options['backups'][$serial]['temporary_zip_directory'] );
		}
		
		// Delete status log text file.
		if ( file_exists( pb_backupbuddy::$options['backup_directory'] . 'temp_status_' . $serial . '.txt' ) ) {
			unlink( pb_backupbuddy::$options['backup_directory'] . 'temp_status_' . $serial. '.txt' );
		}
				
	} // End final_cleanup().
	
	
	
	/*	trim_remote_send_stats()
	 *	
	 *	Handles trimming the number of remote sends to the most recent ones.
	 *	
	 *	@return		null
	 */
	public function trim_remote_send_stats() {
		
		$limit = 5; // Maximum number of remote sends to keep track of.
		
		// Return if limit not yet met.
		if ( count( pb_backupbuddy::$options['remote_sends'] ) <= $limit ) {
			return;
		}
		
		// Uses the negative offset of array_slice() to grab the last X number of items from array.
		pb_backupbuddy::$options['remote_sends'] = array_slice( pb_backupbuddy::$options['remote_sends'], ( $limit * -1 ) );
		pb_backupbuddy::save();
		
	} // End trim_remote_send_stats().
	
	
	/*	trim_backups_integrity_stats()
	 *	
	 *	Handles trimming the number of backup integrity items in the data structure. Trims to all backups left or 10, whichever is more.
	 *	
	 *	@param		
	 *	@return		
	 */
	public function trim_backups_integrity_stats() {
		pb_backupbuddy::status( 'details', 'Trimming backup integrity stats.' );
		
		$minimum = 10; // Minimum number of backups' integrity to keep track of.
		
		if ( !isset( pb_backupbuddy::$options['backups'] ) ) { // No integrity checks yet.
			return;
		}
		
		// Put newest backups first.
		$existing_backups = array_reverse( pb_backupbuddy::$options['backups'] );
		
		// Remove any backup integrity stats for deleted backups. Will re-add from temp array if we drop under the minimum.
		foreach( $existing_backups as $backup_serial => $existing_backup ) {
			if ( !isset( $existing_backup['archive_file'] ) || ( !file_exists( $existing_backup['archive_file'] ) ) ) {
				unset( pb_backupbuddy::$options['backups'][$backup_serial] ); // File gone so erase from options. Will re-add if we go under our minimum.
			}
		} // End foreach.
		
		
		// Need to make sure the database connection is active. Sometimes it goes away during long bouts doing other things -- sigh.
		// This is not essential so use include and not require (suppress any warning)
		pb_backupbuddy::status( 'details', 'Loading DB kicker in case database has gone away.' );
		@include_once( pb_backupbuddy::plugin_path() . '/lib/wpdbutils/wpdbutils.php' );
		if ( class_exists( 'pluginbuddy_wpdbutils' ) ) {
			// This is the database object we want to use
			global $wpdb;
			
			// Get our helper object and let it use us to output status messages
			$dbhelper = new pluginbuddy_wpdbutils( $wpdb );
			
			// If we cannot kick the database into life then signal the error and return false which will stop the backup
			// Otherwise all is ok and we can just fall through and let the function return true
			if ( !$dbhelper->kick() ) {
				pb_backupbuddy::status( 'error', __('Database Server has gone away, unable to save remote transfer status.', 'it-l10n-backupbuddy' ) );
				return false;
			} else {
				pb_backupbuddy::status( 'details', 'Database seems to still be connected.' );
			}
		} else {
			// Utils not available so cannot verify database connection status - just notify
			pb_backupbuddy::status( 'details', __('Database Server connection status unverified.', 'it-l10n-backupbuddy' ) );
		}
		
			
		// If dropped under the minimum try to add back in some to get enough sample points.
		if ( count( pb_backupbuddy::$options['backups'] ) < $minimum ) {
			foreach( $existing_backups as $backup_serial => $existing_backup ) {
				if ( !isset( pb_backupbuddy::$options['backups'][$backup_serial] ) ) {
					pb_backupbuddy::$options['backups'][$backup_serial] = $existing_backup; // Add item.
				}
				// If hit minimum then stop looping to add.
				if ( count( pb_backupbuddy::$options['backups'] ) >= $minimum ) {
					break;
				}
			}
			// Put array back in normal order.
			pb_backupbuddy::$options['backups'] = array_reverse( pb_backupbuddy::$options['backups'] );
			pb_backupbuddy::save();
		} else { // Still have enough stats. Save.
			pb_backupbuddy::$options['backups'] = array_reverse( pb_backupbuddy::$options['backups'] );
			pb_backupbuddy::save();
		}
		
	} // End trim_backups_integrity_stats().
	
	
	
	/*	get_site_size()
	 *	
	 *	Returns an array with the site size and the site size sans exclusions. Saves updates stats in options.
	 *	
	 *	@return		array		Index 0: site size; Index 1: site size sans excluded files/dirs.
	 */
	public function get_site_size() {
		$exclusions = pb_backupbuddy_core::get_directory_exclusions();
		$dir_array = array();
		$result = pb_backupbuddy::$filesystem->dir_size_map( ABSPATH, ABSPATH, $exclusions, $dir_array );
		unset( $dir_array ); // Free this large chunk of memory.
		
		$total_size = pb_backupbuddy::$options['stats']['site_size'] = $result[0];
		$total_size_excluded = pb_backupbuddy::$options['stats']['site_size_excluded'] = $result[1];
		pb_backupbuddy::$options['stats']['site_size_updated'] = time();
		pb_backupbuddy::save();
		
		return array( $total_size, $total_size_excluded );
	} // End get_site_size().
	
	
	
	/*	get_database_size()
	 *	
	 *	Return array of database size, database sans exclusions.
	 *	
	 *	@return		array			Index 0: db size, Index 1: db size sans exclusions.
	 */
	public function get_database_size() {
		global $wpdb;
		$prefix = $wpdb->prefix;
		$prefix_length = strlen( $wpdb->prefix );
		
		$additional_includes = explode( "\n", pb_backupbuddy::$options['mysqldump_additional_includes'] );
		array_walk( $additional_includes, create_function('&$val', '$val = trim($val);')); 
		$additional_excludes = explode( "\n", pb_backupbuddy::$options['mysqldump_additional_excludes'] );
		array_walk( $additional_excludes, create_function('&$val', '$val = trim($val);')); 
		
		$total_size = 0;
		$total_size_with_exclusions = 0;
		$result = mysql_query("SHOW TABLE STATUS");
		while( $rs = mysql_fetch_array( $result ) ) {
			$excluded = true; // Default.
			
			// TABLE STATUS.
			$resultb = mysql_query("CHECK TABLE `{$rs['Name']}`");
			while( $rsb = mysql_fetch_array( $resultb ) ) {
				if ( $rsb['Msg_type'] == 'status' ) {
					$status = $rsb['Msg_text'];
				}
			}
			mysql_free_result( $resultb );
			
			// TABLE SIZE.
			$size = ( $rs['Data_length'] + $rs['Index_length'] );
			$total_size += $size;
			
			
			// HANDLE EXCLUSIONS.
			if ( pb_backupbuddy::$options['backup_nonwp_tables'] == 0 ) { // Only matching prefix.
				if ( ( substr( $rs['Name'], 0, $prefix_length ) == $prefix ) OR ( in_array( $rs['Name'], $additional_includes ) ) ) {
					if ( !in_array( $rs['Name'], $additional_excludes ) ) {
						$total_size_with_exclusions += $size;
						$excluded = false;
					}
				}
			} else { // All tables.
				if ( !in_array( $rs['Name'], $additional_excludes ) ) {
					$total_size_with_exclusions += $size;
					$excluded = false;
				}
			}
			
		}
		
		pb_backupbuddy::$options['stats']['db_size'] = $total_size;
		pb_backupbuddy::$options['stats']['db_size_excluded'] = $total_size_with_exclusions;
		pb_backupbuddy::$options['stats']['db_size_updated'] = time();
		pb_backupbuddy::save();
		
		mysql_free_result( $result );
		
		return array( $total_size, $total_size_with_exclusions );
	} // End get_database_size().
	
	
	
	/* Doesnt work?
	public function error_handler( $error_number, $error_string, $error_file, $error_line ) {
		pb_backupbuddy::status( 'error', "PHP error caught. Error #`{$error_number}`; Description: `{$error_string}`; File: `{$error_file}`; Line: `{$error_line}`."  );
		return true;
	}
	*/
	
	public function kick_db() {
		
		$kick_db = true; // Change true to false for debugging purposes to disable kicker.
		
		// Need to make sure the database connection is active. Sometimes it goes away during long bouts doing other things -- sigh.
		// This is not essential so use include and not require (suppress any warning)
		if ( $kick_db === true ) {
			pb_backupbuddy::status( 'details', 'kick_db()' );
			
			pb_backupbuddy::status( 'details', 'Loading DB kicker in case database has gone away.' );
			@include_once( pb_backupbuddy::plugin_path() . '/lib/wpdbutils/wpdbutils.php' );
			if ( class_exists( 'pluginbuddy_wpdbutils' ) ) {
				// This is the database object we want to use
				global $wpdb;
				
				// Get our helper object and let it use us to output status messages
				$dbhelper = new pluginbuddy_wpdbutils( $wpdb );
				
				// If we cannot kick the database into life then signal the error and return false which will stop the backup
				// Otherwise all is ok and we can just fall through and let the function return true
				if ( !$dbhelper->kick() ) {
					pb_backupbuddy::status( 'error', __('Database Server has gone away, unable to update remote destination transfer status. This is most often caused by mysql running out of memory or timing out far too early. Please contact your host.', 'it-l10n-backupbuddy' ) );
				} else {
					pb_backupbuddy::status( 'details', 'Database seems to still be connected.' );
				}
			} else {
				// Utils not available so cannot verify database connection status - just notify
				pb_backupbuddy::status( 'details', __('Database Server connection status unverified.', 'it-l10n-backupbuddy' ) );
			}
		}
		
	} // End kick_db().
	
	
	
	public function verify_directories() {
		
		// Keep backup directory up to date.
		//if ( pb_backupbuddy::$options['backup_directory'] != ( ABSPATH . 'wp-content/uploads/backupbuddy_backups/' ) ) {
		if ( ( pb_backupbuddy::$options['backup_directory'] == '' ) || ( ! @is_writable( pb_backupbuddy::$options['backup_directory'] ) ) ) {
			$default_backup_dir = ABSPATH . 'wp-content/uploads/backupbuddy_backups/';
			pb_backupbuddy::status( 'details', 'Backup directory invalid. Updating from `' . pb_backupbuddy::$options['backup_directory'] . '` to the default `' . $default_backup_dir . '`.' );
			pb_backupbuddy::$options['backup_directory'] = $default_backup_dir;
			pb_backupbuddy::save();
		}
		// Make backup directory if it does not exist yet.
		//pb_backupbuddy::status( 'details', 'Verifying backup directory `' . pb_backupbuddy::$options['backup_directory'] . '` exists.' );
		if ( !file_exists( pb_backupbuddy::$options['backup_directory'] ) ) {
			pb_backupbuddy::status( 'details', 'Backup directory does not exist. Attempting to create.' );
			if ( pb_backupbuddy::$filesystem->mkdir( pb_backupbuddy::$options['backup_directory'] ) === false ) {
				pb_backupbuddy::status( 'error', sprintf( __('Unable to create backup storage directory (%s)', 'it-l10n-backupbuddy' ) , pb_backupbuddy::$options['backup_directory'] ) );
				pb_backupbuddy::alert( sprintf( __('Unable to create backup storage directory (%s)', 'it-l10n-backupbuddy' ) , pb_backupbuddy::$options['backup_directory'] ), true, '9002' );
			}
		}

		// Keep temp directory up to date.
		if ( pb_backupbuddy::$options['temp_directory'] != ( ABSPATH . 'wp-content/uploads/backupbuddy_temp/' ) ) {
			pb_backupbuddy::status( 'details', 'Temporary directory has changed. Updating from `' . pb_backupbuddy::$options['temp_directory'] . '` to `' . ABSPATH . 'wp-content/uploads/backupbuddy_temp/' . '`.' );
			pb_backupbuddy::$options['temp_directory'] = ABSPATH . 'wp-content/uploads/backupbuddy_temp/';
			pb_backupbuddy::save();
		}
		// Make backup directory if it does not exist yet.
		if ( !file_exists( pb_backupbuddy::$options['temp_directory'] ) ) {
			pb_backupbuddy::status( 'details', 'Temporary directory does not exist. Attempting to create.' );
			if ( pb_backupbuddy::$filesystem->mkdir( pb_backupbuddy::$options['temp_directory'] ) === false ) {
				pb_backupbuddy::status( 'error', sprintf( __('Unable to create temporary storage directory (%s)', 'it-l10n-backupbuddy' ) , pb_backupbuddy::$options['temp_directory'] ) );
				pb_backupbuddy::alert( sprintf( __('Unable to create temporary storage directory (%s)', 'it-l10n-backupbuddy' ) , pb_backupbuddy::$options['temp_directory'] ), true, '9002' );
			}
		}
		
	} // End verify_directories().
}



?>
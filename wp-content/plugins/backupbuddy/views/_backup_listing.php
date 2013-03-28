<?php

// $listing_mode should be either:  default,  migrate

$hover_actions = array();

// If download URL is within site root then allow downloading via web.
if ( FALSE !== stristr( pb_backupbuddy::$options['backup_directory'], ABSPATH ) ) {
	$hover_actions[pb_backupbuddy::ajax_url( 'download_archive' ) . '&backupbuddy_backup='] = 'Download file';
}

if ( $listing_mode == 'default' ) {

	if ( pb_backupbuddy::$options['zip_viewer_enabled'] == '1' ) { // Viewer enabled.
		$hover_actions['zip_viewer'] = 'View zip contents';
		$hover_actions['hash'] = 'Get hash';
		$hover_actions['note'] = 'Note';
	} else { // Viewer disabled.
		$hover_actions['send'] = 'Send file';
		$hover_actions['hash'] = 'Get hash';
		$hover_actions['note'] = 'Note';
	}
}

if ( $listing_mode == 'migrate' ) {
	$hover_actions['migrate'] = 'Migrate this backup';
	$hover_actions[pb_backupbuddy::ajax_url( 'download_archive' ) . '&backupbuddy_backup='] = 'Download file';
	$hover_actions['hash'] = 'Get hash';
	$hover_actions['note'] = 'Note';
	
	foreach( $backups as $backup_id => $backup ) {
		if ( $backup[1] == 'Database' ) {
			unset( $backups[$backup_id] );
		}
	}
	
}


if ( count( $backups ) == 0 ) {
	_e( 'No backups have been created yet.', 'it-l10n-backupbuddy' );
	echo '<br>';
} else {
	
	$columns = array(
		__('Backup File', 'it-l10n-backupbuddy' ) . pb_backupbuddy::tip( __('Files include random characters in their name for increased security. Verify that write permissions are available for this directory. Backup files are stored in ', 'it-l10n-backupbuddy' ) . str_replace( '\\', '/', pb_backupbuddy::$options['backup_directory'] ), '', false ) . '<span class="pb_backupbuddy_backuplist_loading" style="display: none; margin-left: 10px;"><img src="' . pb_backupbuddy::plugin_url() . '/images/loading.gif" alt="' . __('Loading...', 'it-l10n-backupbuddy' ) . '" title="' . __('Loading...', 'it-l10n-backupbuddy' ) . '" width="16" height="16" style="vertical-align: -3px;" /></span>',
		__('Type', 'it-l10n-backupbuddy' ),
		__('File Size', 'it-l10n-backupbuddy' ),
		__('Created', 'it-l10n-backupbuddy' ) . ' <img src="' . pb_backupbuddy::plugin_url() . '/images/sort_down.png" style="vertical-align: 0px;" title="Sorted most recent first">',
		__('Statistics', 'it-l10n-backupbuddy' ) . pb_backupbuddy::tip( __('Various statistics collected during backup such as time taken. Hover over the question mark in the status column for additional detailed information about the backup.', 'it-l10n-backupbuddy' ), '', false ),
		__('Status', 'it-l10n-backupbuddy' ) . pb_backupbuddy::tip( __('Backups are checked to verify that they are valid BackupBuddy backups and contain all of the key backup components needed to restore. Backups may display as invalid until they are completed. Click the refresh icon to re-verify the archive.', 'it-l10n-backupbuddy' ), '', false ),
	);
	
	
	// Remove some columns for migration mode.
	if ( $listing_mode != 'default' ) {
		
		foreach( $backups as &$backup ) {
			unset( $backup[1] ); // Remove backup type (only full shows for migration).
			unset( $backup[4] ); // Remove stats
			$backup = array_values( $backup );
		}
		$backups = array_values( $backups );
		
		unset( $columns[1] );
		unset( $columns[4] );
		$columns = array_values( $columns );
		
		
	}
	
	
	pb_backupbuddy::$ui->list_table(
		$backups,
		array(
			'action'		=>	pb_backupbuddy::page_url(),
			'columns'		=>	$columns,
			'hover_actions'	=>	$hover_actions,
			'hover_action_column_key'	=>	'0',
			'bulk_actions'	=>	array( 'delete_backup' => 'Delete' ),
			'css'			=>		'width: 100%;',
		)
	);
}
?>
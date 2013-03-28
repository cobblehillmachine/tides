<?php
$page_title = 'Database Migration (Updating URLs, paths, etc)';
require_once( '_header.php' );
?>


<script type="text/javascript" src="importbuddy/js/jquery.leanModal.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('.leanModal').leanModal(
			{ top : 20, overlay : 0.4, closeButton: ".modal_close" }
		);
	});
</script>


<?php
echo '<div class="wrap">';


rename_htaccess_temp_back(); // Rename .htaccess.bb_temp back to .htaccess.


echo pb_backupbuddy::$classes['import']->status_box( 'Migrating database content with ImportBuddy v' . pb_backupbuddy::$options['bb_version'] . '... Powered by BackupBuddy.' );
echo '<div id="pb_importbuddy_working"><img src="' . pb_backupbuddy::plugin_url() . '/images/loading_large.gif" title="Working... Please wait as this may take a moment..."></div>';
flush();

$result = migrate_database();
verify_database();

echo '<script type="text/javascript">jQuery("#pb_importbuddy_working").hide();</script>';

if ( true === $result ) {
	$wpconfig_result = migrate_wp_config();
	if ( $wpconfig_result !== true ) {
		pb_backupbuddy::alert( 'Error: Unable to update wp-config.php file. Verify write permissions for the wp-config.php file then refresh this page. You may manually update your wp-config.php file by changing it to the following:<textarea readonly="readonly" style="width: 80%;">' . $wpconfig_result . '</textarea>' );
	}
	
	pb_backupbuddy::status( 'message', 'Import complete!' );
	echo '<h3>Import complete for site: <a href="' . pb_backupbuddy::$options['home'] . '" target="_new">' . pb_backupbuddy::$options['home'] . '</a></h3>';
	echo '<img src="' . pb_backupbuddy::plugin_url() . '/images/bullet_error.png" style="float: left;"><div style="margin-left: 20px;">Verify site functionality then delete the backup ZIP file and importbuddy.php from your site root (the next step will attempt to do this for you). Leaving these files is a security risk. Leaving the zip file and then subsequently running a BackupBuddy backup will result in excessively large backups as this zip file will be included.</div>';
	
	echo '<form action="?step=6" method=post>';
	echo '<input type="hidden" name="options" value="' . htmlspecialchars( serialize( pb_backupbuddy::$options ) ) . '" />';
	?>
	
	<br>
	<h3>Last step: File Cleanup</h3>
	<table><tr><td>
		<label for="delete_backup" style="width: auto; font-size: 12px;"><input type="checkbox" name="delete_backup" id="delete_backup" value="1" checked> Delete backup zip archive</label>
		<br>		
		<label for="delete_temp" style="width: auto; font-size: 12px;"><input type="checkbox" name="delete_temp" id="delete_temp" value="1" checked> Delete temporary import files</label>
	</td><td>
		<label for="delete_importbuddy" style="width: auto; font-size: 12px;"><input type="checkbox" name="delete_importbuddy" id="delete_importbuddy" value="1" checked> Delete ImportBuddy tool files</label>
		<br>
		<label for="delete_importbuddylog" style="width: auto; font-size: 12px;"><input type="checkbox" name="delete_importbuddylog" id="delete_importbuddylog" value="1" checked> Delete importbuddy.txt log file</label>
	</td></tr></table>
	
	<?php
	echo '</div><!-- /wrap -->';
	echo '<div class="main_box_foot">';
	echo '<a href="#pb_log_modal" class="button button-tertiary leanModal" style="float: left; font-size: 13px;">View Import Log</a>';
	echo '<input type="submit" name="submit" class="button" value="Clean up & remove temporary files &rarr;" />';
	echo '</div>';
	echo '</form>';
} else {
	pb_backupbuddy::alert( 'Error: Unable to migrate database content. Something went wrong with the database migration portion of the restore process.', true );
	echo '</div><!-- /wrap -->';
}
?>




<div id="pb_log_modal" style="display: none;">
	<div class="modal">
		<div class="modal_header">
			<a class="modal_close">X</a>
			<h2>Import Log</h2>
			Much of the Import process is logged for debugging or troubleshooting purposes.
			This log may be helpful when seeking technical support or assistance.
		</div>
		<div class="modal_content">
			
			<textarea style="width: 100%; height: 300px;" wrap="off"><?php echo file_get_contents( ABSPATH . 'importbuddy/status-' . pb_backupbuddy::$options['log_serial'] . '.txt' ); ?></textarea>
			
		</div>
	</div>
</div>




<?php
require_once( '_footer.php' );
?>
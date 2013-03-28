<?php


//print_r( pb_backupbuddy::_POST() );

$cpanel_user = pb_backupbuddy::_POST( 'cpanel_user' );
$cpanel_password = pb_backupbuddy::_POST( 'cpanel_pass' );
$cpanel_host = pb_backupbuddy::_POST( 'cpanel_url' );
$db_name = pb_backupbuddy::_POST( 'cpanel_dbname' );
$db_user = pb_backupbuddy::_POST( 'cpanel_dbuser' );
$db_pass = pb_backupbuddy::_POST( 'cpanel_dbpass' );

// Needed for HTTP requests.
$requestcore_file = pb_backupbuddy::plugin_path() . '/lib/requestcore/requestcore.class.php';
require_once( $requestcore_file );

require_once( pb_backupbuddy::plugin_path() . '/lib/cpanel/cpanel.php' );
$create_db_result = pb_backupbuddy_cpanel::create_db( $cpanel_user, $cpanel_password, $cpanel_host, $db_name, $db_user, $db_pass );

if ( $create_db_result === true ) {
	echo 'Success! Created database, user, and assigned user to database.';
} else {
	echo "Error(s):\n\n" . implode( "\n", $create_db_result);
}

die();
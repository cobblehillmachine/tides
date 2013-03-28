<?php
$page_title = 'URL & Database Settings';
require_once( '_header.php' );
echo '<div class="wrap">';

$database_defaults = get_database_defaults();
$database_previous = get_previous_database_settings();
$default_url = get_default_url();
$custom_home_tip = 'OPTIONAL. This is also known as the site address. This is the home address
	where your main site resides. This may differ from your WordPress URL. For example: http://foo.com';
?>

<script type="text/javascript" src="importbuddy/js/jquery.leanModal.min.js"></script>


<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#pb_backupbuddy_malwarescanloading').slideToggle();
		
		jQuery( '.db_setting' ).change( function() {
			jQuery('.pb_database_next_submit').addClass( 'button_disabled' );
		});
		
		jQuery('.pb_database_next_test').click( function() {
			jQuery('#ithemes_loading').slideDown();
			jQuery('#ithemes_loading').html( '<img src="importbuddy/images/loading.gif"> Loading ...' );
			
			jQuery.post('importbuddy.php', {
					ajax: "mysql_test",
					server: jQuery('#mysql_server').val(),
					name: jQuery('#mysql_name').val(),
					user: jQuery('#mysql_user').val(),
					pass: jQuery('#mysql_password').val(),
					wipe_database: jQuery('#wipe_database').val(),
					wipe_database_all: jQuery('#wipe_database_all').val(),
					prefix: jQuery('#mysql_prefix').val(),
					options: jQuery('#pb_options').val()
				 }, function(data) {
				 	data = jQuery.trim( data );
					jQuery('#ithemes_loading').html( data );
					if ( data.slice( -7 ) == 'Success' ) {
						jQuery('.pb_database_next_submit').removeClass( 'button_disabled' );
					} else {
						jQuery('.pb_database_next_submit').addClass( 'button_disabled' );
					}
			} );
			return false;
		});
		
		jQuery('.pb_database_next_submit').click( function() {
			if ( jQuery(this).hasClass( 'button_disabled' ) ) {
				alert( 'You must successfully verify database settings by clicking the button to the left after any changes to continue.' );
				return false;
			}
		});
		
		
		jQuery('.createdb_modal_link').click( function() {
			url = jQuery('#site_url').val();
			var hostname = jQuery('<a>').prop('href', url).prop('hostname');
			//alert( hostname );
			jQuery( '#cpanel_url' ).val( hostname );
			//jQuery( '.cpanel_url_full' ).html( 'http://' + hostname + ':2082/' );
			
		});
		jQuery( '#cpanel_url' ).change( function() {
			//jQuery( '.cpanel_url_full' ).html( 'http://' + jQuery(this).val() + ':2082/' );
		});
		jQuery('.leanModal').leanModal(
			{ top : 20, overlay : 0.4, closeButton: ".modal_close" }
		);
		
		jQuery( '.cpanel_user' ).change(function(){
			jQuery( '.cpanel_user_mirror' ).html( jQuery( '#cpanel_user' ).val() + '_' );
		});
		
		jQuery( '.cpanel_createdb_create' ).click( function() {
			//alert( 'do ajax here' );
			//return false;
			
			jQuery( '.cpanel_createdb_loading' ).show();
			
			jQuery.post('importbuddy.php?ajax=cpanel_createdb',
				jQuery( '#cpanel_createdb_form' ).serialize(), function(data) {
					jQuery( '.cpanel_createdb_loading' ).hide();
					
					data = jQuery.trim( data );
					jQuery('#ithemes_loading').html( data );
					jQuery( '.cpanel_createdb_loading' ).hide();
					
					//alert( 'slice: ' + data.slice( -7 ) );
					if ( data.slice( 0,7 ) == 'Success' ) {
						
						jQuery( '#mysql_name' ).val( jQuery( '#cpanel_user' ).val() + '_' + jQuery('#cpanel_dbname').val() );
						jQuery( '#mysql_user' ).val( jQuery( '#cpanel_user' ).val() + '_' + jQuery('#cpanel_dbuser').val() );
						jQuery( '#mysql_password' ).val( jQuery('#cpanel_dbpass').val() );
						
						alert( data + "\n\n" + 'Your database settings will now be set.' );
						jQuery('.modal_close').trigger('click');
						
					} else {
						alert( data );
						//jQuery('.pb_database_next_submit').addClass( 'button_disabled' );
					}
					
				}
			);
			
			return false;
		});
		
	});
</script>



<form action="?step=4" method=post>
	<input type="hidden" name="options" id="pb_options" value="<?php echo htmlspecialchars( serialize( pb_backupbuddy::$options ) ); ?>" />
	
	<h3>URL Settings</h3>
	<div style="margin-left: 20px;">
		
		<label>
			WordPress Address
			<?php pb_backupbuddy::tip( 'This is the address where you want the final WordPress site you are
				restoring / migrating to reside. Ex: http://foo.com/wp', '', true ); ?>
			<br>
			<span class="light">(Site URL)</span>
			<br><br>&nbsp;
		</label>
		<input type="text" name="siteurl" id="site_url" value="<?php echo $default_url; ?>" size="40" /><br>
		&nbsp;<span class="light" style="display: inline-block; width: 475px;">previously: <?php echo pb_backupbuddy::$options['dat_file']['siteurl']; ?></span>
		
		<?php if ( isset( pb_backupbuddy::$options['dat_file']['is_multisite'] ) && ( ( pb_backupbuddy::$options['dat_file']['is_multisite'] === true ) || ( pb_backupbuddy::$options['dat_file']['is_multisite'] == 'true' ) ) ) { // multisite ?>
			<br><br>Note: This URL above will also be the new Multisite Network URL.
			<br><br>
			<label>
				MultiSite Domain
				<?php pb_backupbuddy::tip( 'This is the MultiSite main domain. Ex: foo.com. WARNING: Changing this may result in URL problems. Use caution.', '', true ); ?><br>
				<br><br>&nbsp;
			</label>
			<input type="text" name="domain" value="<?php echo get_default_domain(); ?>" size="40" /><br>
			&nbsp;<span class="light" style="display: inline-block; width: 400px;">previously: <?php echo pb_backupbuddy::$options['dat_file']['domain']; ?></span>
			<br><br>
		<?php } else { ?>
		
		<label style="width: 420px; margin-left: 200px;">
			<input type="checkbox" name="custom_home" class="option_toggle" value="on" id="custom_home">
			Use optional custom site address (Home URL)?
			<?php pb_backupbuddy::tip( $custom_home_tip, '', true ); ?>
		</label>
		<br style="clear: both;">
		
		<div class="custom_home_toggle" style="display: none; width: 100%;">
			<label>
				Site Address
				<?php pb_backupbuddy::tip( $custom_home_tip, '', true ); ?>
				<br>
				<span class="light">(Home URL)</span>
				<br><br>&nbsp;
			</label>
			<input type="text" name="home" value="<?php echo $default_url; ?>" size="40" />			<br>
			&nbsp;<span class="light" style="display: inline-block; width: 475px;">previously: <?php echo pb_backupbuddy::$options['dat_file']['homeurl']; ?></span>
		</div>
		
		<?php } // end non-multisite ?>
		
	</div>
	
	<br style="clear: both;">
	<hr>
	
	<h3>Database Settings<?php
		pb_backupbuddy::tip( 'These settings control where your backed up database will be restored to.
		If you are restoring to the same server, the settings below will import the database
		to your existing WordPress database location, overwriting your existing WordPress database
		already on the server.  If you are moving to a new host you will need to create a database
		to import into. The database settings MUST be unique for each WordPress installation.  If
		you use the same settings for multiple WordPress installations then all blog content and
		settings will be shared, causing conflicts!', '', true );
	?></h3>
	<div style="margin-left: 20px;">
		
		
		<div>
			
			<table width="100%"><tr>
				<td>
					<a target="_new" href="http://pluginbuddy.com/tutorial-create-database-in-cpanel/">
						Use your host's control panel to create a database (if it doesn't exist yet) then enter its settings below
					</a>
				</td>
				<td style="width: 50px;" align="center">
					<b>OR</b>
				</td>
				<td align="right" style="white-space: nowrap;">
					<a href="#pb_createdb_modal" class="button leanModal createdb_modal_link" style="float: right; font-size: 13px;">Have cPanel? Click to create a database</a>
				</td>
				

			</tr></table>
			
		</div>
		<br><br>
		
		<label>
			MySQL Server
			<?php pb_backupbuddy::tip( 'This is the address to the mySQL server where your database will be stored.
					99% of the time this is localhost.  The location of your mySQL server will be provided
					to you by your host if it differs.', '', true ); ?>
		</label>
		<input class="db_setting" type="text" name="db_server" id="mysql_server" value="<?php echo $database_defaults['server']; ?>" style="width: 175px;" />
		<?php if ( $database_previous['server'] != '' ) { echo '<span class="light">previously: ' . $database_previous['server'] . '</span>'; } ?>
		<br>
		
		<label>
			Database Name
			<?php pb_backupbuddy::tip( 'This is the name of the database you want to import your blog into. The database
				user must have permissions to be able to access this database.  If you are migrating this blog
				to a new host you will need to create this database (ie using CPanel or phpmyadmin) and create
				a mysql database user with permissions.', '', true ); ?>
		</label>
		<input class="db_setting" type="text" name="db_name" id="mysql_name" value="<?php echo $database_defaults['database']; ?>" style="width: 175px;" />
		<?php if ( $database_previous['database'] != '' ) { echo '<span class="light">previously: ' . $database_previous['database'] . '</span>'; } ?>
		<br>
		
		<label>
			Database User
			<?php pb_backupbuddy::tip( 'This is the database user account that has permission to access the database name
				in the input above.  This user must be given permission to this database for the import to work.', '', true ); ?>
		</label>
		<input class="db_setting" type="text" name="db_user" id="mysql_user" value="<?php echo $database_defaults['user']; ?>" style="width: 175px;" />
		<?php if ( $database_previous['user'] != '' ) { echo '<span class="light">previously: ' . $database_previous['user'] . '</span>'; } ?>
		<br>
		
		<label>
			Database Pass
			<?php pb_backupbuddy::tip( 'This is the password for the database user.', '', true ); ?>
		</label>
		<input class="db_setting" type="text" name="db_password" id="mysql_password" value="<?php echo $database_defaults['password']; ?>" style="width: 175px;" />
		<?php if ( $database_previous['password'] != '' ) { echo '<span class="light">previously: ' . $database_previous['password'] . '</span>'; } ?>
		<br>
		
		<label>
			Database Prefix
			<?php pb_backupbuddy::tip( 'This is the prefix given to all tables in the database.  If you are cloning the site
				on the same server AND the same database name then you will want to change this or else the imported
				database will overwrite the existing tables.', '', true ); ?>
		</label>
		<input class="db_setting" type="text" name="db_prefix" id="mysql_prefix" id="mysql_prefix" value="<?php echo $database_defaults['prefix']; ?>" style="width: 175px;" />
		<?php if ( $database_previous['prefix'] != '' ) { echo '<span class="light">previously: ' . $database_previous['prefix'] . '</span>'; } ?>
		<br>
		
		
		
		<label>&nbsp;</label>
		
		<div style="margin-top: 12px;">
			<input type="hidden" name="wipe_database" id="wipe_database" value="<?php echo $database_defaults['wipe']; ?>">
			<input type="hidden" name="wipe_database_all" id="wipe_database_all" value="<?php echo $database_defaults['wipe_all']; ?>">
			<!-- span class="toggle button-secondary" id="ithemes_mysql_test">Test database settings...</span -->
			<?php
			/*
			<span class="toggle button-secondary" id="advanced">Advanced Configuration Options</span>
			<div id="toggle-advanced" class="toggled" style="margin-top: 12px; margin-left: 135px;">
				<?php
				//pb_backupbuddy::alert( 'WARNING: These are advanced configuration options.', 'Use caution as improper use could result in data loss or other difficulties.' );
				?>
				<b>WARNING:</b> Improper use of Advanced Options could result in data loss.
				<br><br>
				
				<input type="checkbox" name="wipe_database" onclick="
					if ( !confirm( 'WARNING! WARNING! WARNING! WARNING! WARNING! \n\nThis will clear any existing WordPress installation or other content in this database. This could result in loss of posts, comments, pages, settings, and other software data loss. Verify you are using the exact database settings you want to be using. PluginBuddy & all related persons hold no responsibility for any loss of data caused by using this option. \n\n Are you sure you want to do this and potentially wipe existing data? \n\n WARNING! WARNING! WARNING! WARNING! WARNING!' ) ) {
						return false;
					}
				" <?php if ( pb_backupbuddy::$options['wipe_database'] == '1' ) echo 'checked'; ?>> Wipe database on import. Use with caution. <?php pb_backupbuddy::tip( 'WARNING: Checking this box will have this script clear ALL existing data from your database prior to import, including non-WordPress data. This is useful if you are restoring over an existing site or for repaired a failed migration. Use caution when using this option.' ); ?><br>
				<input type="checkbox" name="skip_database_import" <?php if ( pb_backupbuddy::$options['skip_database_import'] == '1' ) echo 'checked'; ?>> Skip import of database. <br>
				<input type="checkbox" name="skip_database_migration" <?php if ( pb_backupbuddy::$options['skip_database_migration'] == '1' ) echo 'checked'; ?>> Skip migration of database. <br>
				<br>
				<b>After importing, skip data migration on these tables:</b><?php pb_backupbuddy::tip( 'Database tables to exclude from migration. These tables will still be imported into the database but URLs and paths will not be modified. This is useful if the migration is timing out.' ); ?><br><textarea name="exclude_tables" style="width: 300px; height: 75px;"></textarea>
			</div>
			*/
			?>
			<div style="clear: both; display: none; background-color: #F1EDED; -moz-border-radius:4px 4px 4px 4px; border:1px solid #DFDFDF; margin-right:10px; padding:3px;" id="ithemes_loading">
				<img src="importbuddy/images/loading.gif">Loading ...</div>
			</div>
		
		<?php if ( ( pb_backupbuddy::$options['force_high_security'] != false ) || ( isset( pb_backupbuddy::$options['dat_file']['high_security'] ) && ( pb_backupbuddy::$options['dat_file']['high_security'] === true ) ) ) { ?>
			<label>&nbsp;</label><br>
			<h3>Create Administrator Account <?php pb_backupbuddy::tip( 'Your backup was created either with High Security Mode enabled or from a WordPress Multisite installation. For security your must provide a WordPress username and password to grant administrator privileges to.', '', true ); ?></h3>
			<label>
				New admin username
			</label>
			<input type="text" name="admin_user" id="admin_user" value="" style="width: 175px;" />
			<span class="light">(if user exists, it will be overwritten)</span>
			<br>
			<label>
				Password
			</label>
			<input type="text" name="admin_pass" id="admin_pass" value="" style="width: 175px;" />
			<br>
		<?php } // end high security. ?>
		
		
	</div>
	
	<input type="hidden" name="file" value="<?php echo htmlentities( pb_backupbuddy::$options['file'] ); ?>" />
	</div><!-- /wrap -->
	<div class="main_box_foot">
		<input type="submit" name="submit" value="Test Database Settings" class="button pb_database_next_test">
		&nbsp;&nbsp;&nbsp;
		<input type="submit" name="submit" value="Next Step &rarr;" class="button button_disabled pb_database_next_submit">
	</div>
</form>



<div id="pb_createdb_modal" style="display: none;">
	<div class="modal">
		<div class="modal_header">
			<a class="modal_close">X</a>
			<h2>Automatically Create Database via cPanel</h2>
			A new database will be created along with a new database user with permissions. cPanel with the default theme required.
		</div>
		<div class="modal_content">
			
			<form id="cpanel_createdb_form">
				
				<label>
					cPanel URL
					<?php pb_backupbuddy::tip( '[Ex: mydomain.com] Enter the cPanel domain to complete the URL you go to to access cPanel.  For instance if your cPanel login is at http://mydomain.com:2082/ then your domain is mydomain.com.', '', true ); ?>
				</label>
				<div style="text-align: right; margin-left: 200px; margin-bottom: 3px;">
					http://<input type="text" name="cpanel_url" id="cpanel_url" style="width: 130px;">:2082/<br>
					<span class="description cpanel_url_full"></span>
				</div>
				
				<label>
					cPanel username
					<?php pb_backupbuddy::tip( '[Ex: buddy] This is the username you use to log into your cPanel.', '', true ); ?>
				</label>
				<span style="text-align: right; width: 300px; display: inline-block;">
					<input type="text" name="cpanel_user" class="cpanel_user" id="cpanel_user" style="width: 175px;">
				</span>
				<br>
				
				<label>
					cPanel password
					<?php pb_backupbuddy::tip( '[Ex: i498hDsifH487hsS] This is the password you use to log into your cPanel.', '', true ); ?>
				</label>
				<span style="text-align: right; width: 300px; display: inline-block;">
					<input type="text" name="cpanel_pass" id="cpanel_pass" style="width: 175px;" />
				</span>
				<br>
				
				<hr style="margin: 8px;">
				
				<label>
					New database name
					<?php pb_backupbuddy::tip( '[Ex: bobsblog] The database name you want to create. Note: cPanel automatically prefixes databases with the cPanel account username and an underscore. ex if your cPanel username is "buddy": buddy_bobsblog', '', true ); ?>
				</label>
				<span style="text-align: right; width: 300px; display: inline-block;">
					<span class="cpanel_user_mirror"></span><input type="text" name="cpanel_dbname" id="cpanel_dbname" style="width: 175px;" maxlength="56">
				</span>
				<br>
				
				<label>
					New database username
					<?php pb_backupbuddy::tip( '[Ex: bob] The username you want to add to grant access to this database you want to create. Note: cPanel automatically prefixes database usernames with the cPanel account username and an underscore. ex if your cPanel username is "buddy": buddy_bob', '', true ); ?>
				</label>
				<span style="text-align: right; width: 300px; display: inline-block;">
					<span class="cpanel_user_mirror"></span><input type="text" name="cpanel_dbuser" id="cpanel_dbuser" style="width: 175px;" maxlength="7">
				</span>
				<br>
				
				<label>
					New database user password
					<?php pb_backupbuddy::tip( 'The password you would like to assign to the database user created.', '', true ); ?>
				</label>
				<span style="text-align: right; width: 300px; display: inline-block;">
					<input type="text" name="cpanel_dbpass" id="cpanel_dbpass" style="width: 175px;" value="<?php echo substr(md5(microtime()),rand(0,13),16);?>">
				</span>
				<br>
				
				<br>
				<center>
					<input type="submit" name="submit" value="Create Database" class="button button-primary cpanel_createdb_create">
					<span style="display: inline-block; width: 20px;">
						<span class="cpanel_createdb_loading" style="display: none; margin-left: 10px;"><img src="<?php echo pb_backupbuddy::plugin_url(); ?>/images/loading.gif" alt="' . __('Loading...', 'it-l10n-backupbuddy' ) . '" title="' . __('Loading...', 'it-l10n-backupbuddy' ) . '" width="16" height="16" style="vertical-align: -3px;" /></span>
					</span>
				</center>
				
			</form>
		</div>
	</div>
</div>


<?php require_once( '_footer.php' ); ?>
<?php
if ( !is_admin() ) { die( 'Access Denied.' ); }
?>
<script type="text/javascript">
	jQuery(document).ready(function() {
		
		jQuery( '.pb_backupbuddy_customize_email_scheduled_start' ).click( function() {
			jQuery( '.pb_backupbuddy_customize_email_scheduled_start_row' ).slideToggle();
			return false;
		});
		jQuery( '.pb_backupbuddy_customize_email_scheduled_complete' ).click( function() {
			jQuery( '.pb_backupbuddy_customize_email_scheduled_complete_row' ).slideToggle();
			return false;
		});
		jQuery( '.pb_backupbuddy_customize_email_error' ).click( function() {
			jQuery( '.pb_backupbuddy_customize_email_error_row' ).slideToggle();
			return false;
		});
		
		jQuery( '#pb_backupbuddy_email_error_test' ).click( function() {
			jQuery.post( '<?php echo pb_backupbuddy::ajax_url( 'email_error_test' ); ?>', { email: jQuery( '#pb_backupbuddy_email_notify_error' ).val() }, 
				function(data) {
					data = jQuery.trim( data );
					if ( data.charAt(0) != '1' ) {
						alert( '<?php _e('Error testing', 'it-l10n-backupbuddy' ); ?>:' + "\n\n" + data );
					} else {
						alert( "<?php _e('Email has been sent. If you do not receive it check your WordPress & server settings.', 'it-l10n-backupbuddy' ); ?>" + "\n\n" + data.slice(1) );
					}
				}
			);
			return false;
		});
		
		
	});
	
	function pb_backupbuddy_selectdestination( destination_id, destination_title, callback_data ) {
		window.location.href = '<?php echo pb_backupbuddy::page_url(); ?>&custom=remoteclient&destination_id=' + destination_id;
	}
</script>
<?php
echo '<br>';
/* BEGIN CONFIGURING PLUGIN SETTINGS FORM */

$settings_form = new pb_backupbuddy_settings( 'settings', '', 'tab=0', 320 );


$settings_form->add_setting( array(
		'type'		=>		'title',
		'name'		=>		'title_general',
		'title'		=>		__( 'General', 'it-l10n-backupbuddy' ),
	) );
$settings_form->add_setting( array(
	'type'		=>		'password',
	'name'		=>		'importbuddy_pass_hash',
	'title'		=>		__('ImportBuddy & RepairBuddy password', 'it-l10n-backupbuddy' ),
	'tip'		=>		__('[Example: myp@ssw0rD] - Required password for running the ImportBuddy import/migration script. This prevents unauthorized access when using this tool. You should not use your WordPress password here.', 'it-l10n-backupbuddy' ),
	'value'		=>		$importbuddy_pass_dummy_text,
	'after'		=>		'&nbsp;&nbsp; Confirm: <input type="password" name="pb_backupbuddy_importbuddy_pass_hash_confirm" value="' . $importbuddy_pass_dummy_text . '">',
	//'classes'	=>		'regular-text code',
) );

$settings_form->add_setting( array(
	'type'		=>		'text',
	'name'		=>		'backup_directory',
	'title'		=>		__('Local storage directory for backups', 'it-l10n-backupbuddy' ),
	'tip'		=>		__('Local directory where all backup ZIP files will be saved to. This directory must have proper write and read permissions. Upon changing, any backups in the existing directory will be moved to the new directory. Note: This is only where local backups will be, not remotely stored backups. Remote storage is configured on the Remote Destinations page.', 'it-l10n-backupbuddy' ),
	'rules'		=>		'required',
	'css'		=>		'width: 325px;',
	'after'		=>		' <a style="cursor: pointer;" onClick="jQuery(\'#pb_backupbuddy_backup_directory\').val(\'' . str_replace( '\\', '/', ABSPATH ) . 'wp-content/uploads/backupbuddy_backups/\');">Reset Default</a>',
) );

$settings_form->add_setting( array(
	'type'		=>		'select',
	'name'		=>		'role_access',
	'title'		=>		__('BackupBuddy access permission', 'it-l10n-backupbuddy' ),
	'options'	=>		array(
								'administrator'			=> __( 'Administrator (default)', 'it-l10n-backupbuddy' ),
								'moderate_comments'		=> __( 'Editor (moderate_comments)', 'it-l10n-backupbuddy' ),
								'edit_published_posts'	=> __( 'Author (edit_published_posts)', 'it-l10n-backupbuddy' ),
								'edit_posts'			=> __( 'Contributor (edit_posts)', 'it-l10n-backupbuddy' ),
							),
	'tip'		=>		__('[Default: Administrator] - Allow other user levels to access BackupBuddy. Use extreme caution as users granted access will have FULL access to BackupBuddy and your backups, including remote destinations. This is a potential security hole if used improperly. Use caution when selecting any other user roles or giving users in such roles access. Not applicable to Multisite installations.', 'it-l10n-backupbuddy' ),
	'after'		=>		' <span class="description">Use caution changing from "administrator".</span>',
	'rules'		=>		'required',
) );

$settings_form->add_setting( array(
	'type'		=>		'checkbox',
	'name'		=>		'archive_name_format',
	'options'	=>		array( 'unchecked' => 'date', 'checked' => 'datetime' ),
	'title'		=>		__( 'Add time in backup file name', 'it-l10n-backupbuddy' ),
	'tip'		=>		__( '[Default: disabled (date only)] - When enabled your backup filename will display the time the backup was created in addition to the default date. This is useful when making multiple backups in a one day period.', 'it-l10n-backupbuddy' ),
	'css'		=>		'',
	'rules'		=>		'required',
) );

$settings_form->add_setting( array(
	'type'		=>		'checkbox',
	'name'		=>		'backup_reminders',
	'options'	=>		array( 'unchecked' => '0', 'checked' => '1' ),
	'title'		=>		__( 'Enable backup reminders for edits', 'it-l10n-backupbuddy' ),
	'tip'		=>		__( '[Default: enabled] - When enabled links will be displayed upon post or page edits and during WordPress upgrades to remind and allow rapid backing up after modifications or before upgrading.', 'it-l10n-backupbuddy' ),
	'css'		=>		'',
	'after'		=>		'',
	'rules'		=>		'required',
) );


require_once( '_email.php' );



$settings_form->add_setting( array(
	'type'		=>		'title',
	'name'		=>		'title_archivestoragelimits',
	'title'		=>		__( 'Local Archive Storage Limits', 'it-l10n-backupbuddy' ) . ' ' . pb_backupbuddy::video( 'PmXLw_tS42Q#45', __('Archive Storage Limits Tutorial', 'it-l10n-backupbuddy' ), false ),
) );
$settings_form->add_setting( array(
	'type'		=>		'text',
	'name'		=>		'archive_limit',
	'title'		=>		__('Maximum number of local backups to keep', 'it-l10n-backupbuddy' ),
	'tip'		=>		__('[Example: 10] - Maximum number of local archived backups to store (remote archive limits are configured per destination on their respective settings pages). Any new backups created after this limit is met will result in your oldest backup(s) being deleted to make room for the newer ones. Changes to this setting take place once a new backup is made. Set to zero (0) for no limit.', 'it-l10n-backupbuddy' ),
	'rules'		=>		'required|string[0-500]',
	'css'		=>		'width: 50px;',
	'after'		=>		' backups',
) );
$settings_form->add_setting( array(
	'type'		=>		'text',
	'name'		=>		'archive_limit_size',
	'title'		=>		__('Maximum size of all local backups combined', 'it-l10n-backupbuddy' ),
	'tip'		=>		__('[Example: 350] - Maximum size (in MB) to allow your total local archives to reach (remote archive limits are configured per destination on their respective settings pages). Any new backups created after this limit is met will result in your oldest backup(s) being deleted to make room for the newer ones. Changes to this setting take place once a new backup is made. Set to zero (0) for no limit.', 'it-l10n-backupbuddy' ),
	'rules'		=>		'required|string[0-500]',
	'css'		=>		'width: 50px;',
	'after'		=>		' MB',
) );
$settings_form->add_setting( array(
	'type'		=>		'text',
	'name'		=>		'archive_limit_age',
	'title'		=>		__('Maximum age of local backups', 'it-l10n-backupbuddy' ),
	'tip'		=>		__('[Example: 90] - Maximum age (in days) to allow your local archives to reach (remote archive limits are configured per destination on their respective settings pages). Any backups exceeding this age will be deleted as new backups are created. Changes to this setting take place once a new backup is made. Set to zero (0) for no limit.', 'it-l10n-backupbuddy' ),
	'rules'		=>		'required|string[0-99999]',
	'css'		=>		'width: 50px;',
	'after'		=>		' days',
) );



if ( is_multisite() ) {
	$settings_form->add_setting( array(
		'type'		=>		'title',
		'name'		=>		'title_multisite',
		'title'		=>		__( 'Multisite', 'it-l10n-backupbuddy' ),
	) );
	$settings_form->add_setting( array(
		'type'		=>		'checkbox',
		'name'		=>		'multisite_export',
		'title'		=>		__( 'Allow individual site exports by administrators?', 'it-l10n-backupbuddy' ) . ' ' . pb_backupbuddy::video( '_oKGIzzuVzw', __('Multisite export', 'it-l10n-backupbuddy' ), false ),
		'options'	=>		array( 'unchecked' => '0', 'checked' => '1' ),
		'tip'		=>		__('[Default: disabled] - When enabled individual sites may be exported by Administrators of the individual site. Network Administrators always see this menu (notes with the words SuperAdmin in parentheses in the menu when only SuperAdmins have access to the feature).', 'it-l10n-backupbuddy' ),
		'rules'		=>		'required',
		'after'		=>		'<span class="description"> ' . __( 'Check to extend Site Exporting functionality to subsite Administrators.', 'it-l10n-backupbuddy' ) . '</span>',
	) );
}





$profile = 0; // Defaults index.
$settings_form->add_setting( array(
		'type'		=>		'title',
		'name'		=>		'title_database',
		'title'		=>		__( 'Database Defaults', 'it-l10n-backupbuddy' ),
	) );
require_once( pb_backupbuddy::plugin_path() . '/views/settings/_database.php' );
$settings_form->add_setting( array(
		'type'		=>		'title',
		'name'		=>		'title_files',
		'title'		=>		__( 'File & Directory Defaults', 'it-l10n-backupbuddy' ),
	) );
require_once( pb_backupbuddy::plugin_path() . '/views/settings/_files.php' );




$settings_form->process(); // Handles processing the submitted form (if applicable).
$settings_form->set_value( 'importbuddy_pass_hash', $importbuddy_pass_dummy_text );
//$data['settings_form'] = &$settings_form; // For use in view.

/* END CONFIGURING PLUGIN SETTINGS FORM */



$settings_form->display_settings( 'Save General Settings' );


?>
<br><br><br>
<div style="float: right; margin-top: -20px;">
	<div style="float: right;">
		<form method="post" action="<?php echo pb_backupbuddy::page_url(); ?>">
			<input type="hidden" name="reset_defaults" value="<?php echo pb_backupbuddy::settings( 'slug' ); ?>" />
			<input type="submit" name="submit" value="Reset Plugin Settings to Defaults" id="reset_defaults" class="button secondary-button" onclick="if ( !confirm('WARNING: This will reset all settings associated with this plugin to their defaults. Are you sure you want to do this?') ) { return false; }" />
		</form>
	</div>
	<div style="float: right; margin-right: 8px;">
		<a href="<?php echo pb_backupbuddy::ajax_url( 'importexport_settings' ); ?>&#038;TB_iframe=1&#038;width=640&#038;height=600" class="thickbox button secondary-button">Import/Export Plugin Settings</a>
	</div>
</div>
<br style="clear: both;"><br>



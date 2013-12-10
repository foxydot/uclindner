<?php
/**
 * New User Administration Screen.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** WordPress Administration Bootstrap */
require_once('./admin.php');
if ( isset($_REQUEST['action']) && 'createuser' == $_REQUEST['action'] ) {

}

?>
<div class="wrap">
	<?php screen_icon(); ?>
	<h2 id="add-new-user"> <?php
	if ( current_user_can( 'create_users' ) ) {
		echo _x( 'Add New User', 'user' );
	} elseif ( current_user_can( 'promote_users' ) ) {
		echo _x( 'Add Existing User', 'user' );
	} ?>
	</h2>
	
<p><?php _e('Create a brand new user and add it to this site.'); ?></p>
<form action="" method="post" name="createuser" id="createuser" class="validate"<?php do_action('user_new_form_tag');?>>
<input name="action" type="hidden" value="createuser" />
	
<table class="form-table">
	<tr class="form-field form-required">
		<th scope="row"><label for="user_login"><?php _e('Username'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input name="user_login" type="text" id="user_login" value="<?php echo esc_attr($new_user_login); ?>" aria-required="true" /></td>
	</tr>
	<tr class="form-field form-required">
		<th scope="row"><label for="email"><?php _e('E-mail'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input name="email" type="text" id="email" value="<?php echo esc_attr($new_user_email); ?>" /></td>
	</tr>
<?php if ( !is_multisite() ) { ?>
	<tr class="form-field">
		<th scope="row"><label for="first_name"><?php _e('First Name') ?> </label></th>
		<td><input name="first_name" type="text" id="first_name" value="<?php echo esc_attr($new_user_firstname); ?>" /></td>
	</tr>
	<tr class="form-field">
		<th scope="row"><label for="last_name"><?php _e('Last Name') ?> </label></th>
		<td><input name="last_name" type="text" id="last_name" value="<?php echo esc_attr($new_user_lastname); ?>" /></td>
	</tr>
<?php if ( apply_filters('show_password_fields', true) ) : ?>
	<tr class="form-field form-required">
		<th scope="row"><label for="pass1"><?php _e('Password'); ?> <span class="description"><?php /* translators: password input field */_e('(required)'); ?></span></label></th>
		<td>
			<input class="hidden" value=" " /><!-- #24364 workaround -->
			<input name="pass1" type="password" id="pass1" autocomplete="off" />
		</td>
	</tr>
	<tr class="form-field form-required">
		<th scope="row"><label for="pass2"><?php _e('Repeat Password'); ?> <span class="description"><?php /* translators: password input field */_e('(required)'); ?></span></label></th>
		<td>
		<input name="pass2" type="password" id="pass2" autocomplete="off" />
		<br />
		<div id="pass-strength-result"><?php _e('Strength indicator'); ?></div>
		<p class="description indicator-hint"><?php _e('Hint: The password should be at least seven characters long. To make it stronger, use upper and lower case letters, numbers and symbols like ! " ? $ % ^ &amp; ).'); ?></p>
		</td>
	</tr>
<?php endif; ?>
<?php } // !is_multisite ?>

	<tr class="form-field form-required">
		<th scope="row"><label for="user_login"><?php _e('MEETING DATE/TIME/LOCATION'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input name="metting_loc" type="text" id="metting_loc" value="" aria-required="true" /></td>
	</tr>
	<tr class="form-field form-required">
		<th scope="row"><label for="user_login"><?php _e('WHO CAN JOIN'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input name="who_can_join" type="text" id="who_can_join" value="" aria-required="true" /></td>
	</tr>
	<tr class="form-field form-required">
		<th scope="row"><label for="user_login"><?php _e('FACULTY ADVISORS'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input name="faculty_adv" type="text" id="faculty_adv" value="" aria-required="true" /></td>
	</tr>
	<tr class="form-field form-required">
		<th scope="row"><label for="user_login"><?php _e('PRESIDENT'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input name="president" type="text" id="president" value="" aria-required="true" /></td>
	</tr>
	<tr class="form-field form-required">
		<th scope="row"><label for="user_login"><?php _e('VICE PRESIDENT OF ADMINISTRATION'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input name="vice_admin" type="text" id="vice_admin" value="" aria-required="true" /></td>
	</tr>
	<tr class="form-field form-required">
		<th scope="row"><label for="user_login"><?php _e('VICE PRESIDENT OF MEMBERSHIP'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input name="vice_member" type="text" id="vice_member" value="" aria-required="true" /></td>
	</tr>

	<tr class="form-field form-required">
		<th scope="row"><label for="user_login"><?php _e('VICE PRESIDENT OF COMMUNICATIONS'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input name="vice_comm" type="text" id="vice_comm" value="" aria-required="true" /></td>
	</tr>
	<tr class="form-field form-required">
		<th scope="row"><label for="user_login"><?php _e('VICE PRESIDENT OF ALUMNI DEVELOPMENT'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input name="vice_dev" type="text" id="vice_dev" value="" aria-required="true" /></td>
	</tr>
	<tr class="form-field form-required">
		<th scope="row"><label for="user_login"><?php _e('MASTER OF RITUALS'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input name="master_rituals" type="text" id="master_rituals" value="" aria-required="true" /></td>
	</tr>
	<tr class="form-field form-required">
		<th scope="row"><label for="user_login"><?php _e('FACEBOOK'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input name="facebook" type="text" id="facebook" value="" aria-required="true" /></td>
	</tr>
	<tr class="form-field form-required">
		<th scope="row"><label for="user_login"><?php _e('TWITTER'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input name="twitter" type="text" id="twitter" value="" aria-required="true" /></td>
	</tr>
</table>
	
<?php submit_button( __( 'Add New User '), 'primary', 'createuser', true, array( 'id' => 'createusersub' ) ); ?>

</form>	
</div>
<?php

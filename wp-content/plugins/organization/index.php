<?php
/*
Plugin Name: Organization
Plugin URI: http://mecontact.wordpress.com/user-dashboard/
Description: User-Dashboard include the option with login, registration and forget password from front-end also provide you the option to logged out profile editing and image uploading for profile . it provides you proper dashboard from front end user to add more options and edit html easily without any coding problem.<strong>Use full width page for best view and to use this plugin please add [user-dashboard] in your page editor from backend</strong>
Version: 1.0.0
Author: Dinesh
Author URI: http://about.me/dinesh
License: GPLv2 or later
*/

add_action('admin_menu', 'my_users_menu');

function my_users_menu() {
	add_users_page('users.php', 'Organization', 'read', 'user-form', 'my_plugin_function');
}

function my_plugin_function()
{
	include('user_form.php');
}


?>

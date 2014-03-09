<?php
/*
Plugin Name: BracketPress Login / Register Widget
Plugin URI: http://www.bracketpress.com/
Description: Login and Register for BracketPress
Version: 1.0.2
Author: Nick Temple
Author URI: http://www.bracketpress.com/

Based on "Tabbed Login Widget" by Vivek Marakana
*/

if (@constant('BRACKETPRESS_DEBUG')) {
    error_reporting(E_ALL &~ E_NOTICE &~ E_STRICT);
    ini_set("display_errors", 1);
    if (!defined('WP_DEBUG')) {
        define('WP_DEBUG', true);
    }
}


define( 'BRACKETPRESS_LOGIN_URL',  plugin_dir_url( __FILE__ ) );

add_action( 'bracketpress_init', 'bracketpress_load_login_widget', 1);

function bracketpress_load_login_widget() {

	$plugin_url = (is_ssl()) ? str_replace('http://','https://', BRACKETPRESS_LOGIN_URL) : BRACKETPRESS_LOGIN_URL;

    wp_register_style('bracketpress_login_css_styles', BRACKETPRESS_LOGIN_URL . 'login.css');
    wp_enqueue_style('bracketpress_login_css_styles');

	wp_enqueue_script('jquery');
	wp_enqueue_script('tabbed-jQuery');
    
    wp_register_script('bracketpress-login', BRACKETPRESS_LOGIN_URL . 'login.js' );
    wp_enqueue_script('bracketpress-login');

	register_widget( 'bracketpress_login_Widget' );
}

class bracketpress_login_Widget extends WP_Widget {

    /** @var permalink link to the "My Brackets" page */
    var $edit_page = null;

	/**
	 * Widget setup.
	 */
	function __construct() {

        $edit_page = bracketpress()->get_option('edit_id');
        if ($edit_page) {
            $this->edit_page = get_permalink($edit_page);
        }


        /* Widget settings. */
        $widget_ops = array( 'classname' => 'widget-login bracketpress-login-widget', 'description' => __('Display BracketPress Login in sidebar.','bracketpress-login') );

        /* Widget control settings. */
        $control_ops = array( 'id_base' => 'bracketpress-login-widget' );

        add_action(/* 'bracketpress_' .*/  'user_register', array($this, 'bracketpress_login_register'), 10, 2);

        /* Create the widget. */
        $this->WP_Widget( 'bracketpress-login-widget', 'BracketPress Login Widget', $widget_ops, $control_ops );
    }

    function bracketpress_login_register($userid) {
        $userdata = get_userdata( $userid );

        if (isset($_POST['first_name'])) {
            update_user_meta($userid, 'first_name', $_POST['first_name']);
            update_user_meta($userid, 'last_name',  $_POST['last_name']);
        }
    }

    function do_action($instance, $action, $subaction = '') {
        if ('1' == $instance['global'] ) { // Global Widget
          do_action( $action, $subaction);
        }
        do_action('bracketpress_' . $action, $subaction);
    }

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance) {
        $before_widget = $after_widget = $registration_enabled = '';

		extract( $args );
        extract( $instance);

		/* Before widget (defined by themes). */
		echo $before_widget;
?>
    <div id="login-register-password">

	<?php global $user_ID, $user_identity,$current_url;
		$current_url='http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        if(strpos($current_url, '?') > 0) {
            $_reg = '&amp;register=true';
            $_reset = '&amp;reset=true';
        } else {
            $_reg = '?register=true';
            $_reset = '?reset=true';

        }
        if (isset($_GET['register'])) {
            $_reg = '';
        }
        if (isset($_GET['reset'])) {
            $_reset = '';
        }
	    get_currentuserinfo();

        if (!$user_ID) { ?>

	<ul class="tabs_login">
		<li class="active_login"><a href="#login" ><?php _e('Login', 'bracketpress-login'); ?></a></li>
		<?php  if(get_option('users_can_register') && $registration_enabled) { ?>
		<li><a href="#register"><?php _e('Register', 'bracketpress-login') ?></a></li>
		<?php }; ?>
		<li><a href="#forgot_password"><?php _e('Forgot', 'bracketpress-login'); ?></a></li>
	</ul>
	<div class="tab_container_login">
		<div id="login" class="tab_content_login">

			<?php $register = $_GET['register']; $reset = $_GET['reset']; if ($register == true) { ?>

			<h3><?php _e('Success!', 'bracketpress-login'); ?></h3>
			<p><?php _e('Check your email for the password and then return to log in.', 'bracketpress-login'); ?></p>

			<?php } elseif ($reset == true) { ?>
			
			<h3><?php _e('Success!', 'bracketpress-login'); ?></h3>
			<p><?php _e('Check your email to reset your password.', 'bracketpress-login'); ?></p>

			<?php } else { ?>

			<h3><?php _e('Have an account?', 'bracketpress-login'); ?></h3>

			<?php } ?>

			<form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form">
				<div class="username">
					<label for="user_login"><?php _e('Username', 'bracketpress-login'); ?>: </label>
					<input type="text" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="11" />
				</div>
				<div class="password">
					<label for="user_pass"><?php _e('Password', 'bracketpress-login'); ?>: </label>
					<input type="password" name="pwd" value="" size="20" id="user_pass" tabindex="12" />
				</div>				
				<div class="login_fields">
					<div class="rememberme">
						<label for="rememberme">
							<input type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" tabindex="13" /><?php _e(' Remember me', 'bracketpress-login'); ?>
						</label>
					</div>
					<?php $this->do_action($instance, 'login_form'); ?>
					<input type="submit" name="user-submit" value="<?php _e('Login', 'bracketpress-login'); ?>" tabindex="14" class="user-submit" />
					<input type="hidden" name="redirect_to" value="<?php echo $current_url; ?>" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form>
		</div>
		
		<?php  if(get_option('users_can_register')  && $registration_enabled) { ?>
		
		<div id="register" class="tab_content_login" style="display:none;">
			<h3><?php _e('Register for this site!', 'bracketpress-login'); ?></h3>
			<p><?php _e('Sign up now for the good stuff.', 'bracketpress-login'); ?></p>
			<form method="post" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" class="wp-user-form">
				<div class="username">
					<label for="register_user_login"><?php _e('Username', 'bracketpress-login'); ?>: </label>
					<input type="text" name="user_login" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="register_user_login" tabindex="101" />
				</div>
                <div class="username">
                    <label for="first_name"><?php _e('First Name', 'bracketpress-login'); ?>: </label>
                    <input type="text" name="first_name" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="first_name" tabindex="101" />
                </div>
                <div class="username">
                    <label for="last_name"><?php _e('Last Name', 'bracketpress-login'); ?>: </label>
                    <input type="text" name="last_name" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="last_name" tabindex="101" />
                </div>
                <div class="password">
					<label for="user_email"><?php _e('Your Email', 'bracketpress-login'); ?>: </label>
					<input type="text" name="user_email" value="<?php echo esc_attr(stripslashes($user_email)); ?>" size="25" id="user_email" tabindex="102" />
				</div>
				<div class="login_fields">
					<?php $this->do_action($instance, 'register_form'); ?>
					<input type="submit" name="user-submit" value="<?php _e('Sign up!', 'bracketpress-login'); ?>" class="user-submit" tabindex="103" />
					<?php $register = $_GET['register']; if($register == 'true') { echo '<p>Check your email for the password!</p>'; } ?>
					<input type="hidden" name="redirect_to" value="<?php echo $current_url . $_reg ?>" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form>
		</div>
		
		<?php }; ?>
		
		<div id="forgot_password" class="tab_content_login" style="display:none;">
			<h3><?php _e('Lost Your Password?', 'bracketpress-login'); ?></h3>
			<p><?php _e('Enter your username or email to reset your password.', 'bracketpress-login'); ?></p>
			<form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
				<div class="username">
					<label for="user_login" class="hide"><?php _e('Username or Email', 'bracketpress-login'); ?>: </label>
					<input type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" />
				</div>
				<div class="login_fields">
					<?php $this->do_action($instance, 'login_form', 'resetpass'); ?>
					<input type="submit" name="user-submit" value="<?php _e('Reset my password', 'bracketpress-login'); ?>" class="user-submit" tabindex="1002" />
					<?php $reset = $_GET['reset']; if($reset == true) { echo '<p>'.__('A message was sent to your email address.','bracketpress-login').'</p>'; } ?>
                    <?php

                    ?>
					<input type="hidden" name="redirect_to" value="<?php echo $current_url . $_reset; ?>" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form>
		</div>
	</div>

	<?php } else { // is logged in ?>

	<div class="sidebox">
		<h3><?php _e('Welcome, ', 'bracketpress-login'); ?> <?php echo $user_identity; ?></h3>
		<?php if (version_compare($GLOBALS['wp_version'], '2.5', '>=')){
			if (get_option('show_avatars')){
		?>
		<div class="usericon">
			<?php global $userdata; get_currentuserinfo(); echo get_avatar($userdata->ID, 50); ?>
		</div>
		<?php  }else{?>		
		<style type="text/css">.userinfo p{margin-left: 0px !important;text-align:center;}.userinfo{width:100%;}</style>
		<?php }}?>	
		<div class="userinfo">
			<p><?php _e('You are logged in as ', 'bracketpress-login'); ?> <strong><?php echo $user_identity; ?></strong></p>
			<p>
				<a href="<?php echo wp_logout_url($current_url); ?>"><?php _e('Log out', 'bracketpress-login'); ?></a> |
                <?php if($this->edit_page) { ?>
                <a href="<?php echo $this->edit_page ?>"><?php _e('My Brackets', 'bracketpress-login'); ?></a> |
                <?php } ?>
				<?php if (current_user_can('manage_options')) { 
					echo '<a href="' . admin_url() . '">' . __('Admin', 'bracketpress-login') . '</a>'; } else { 
					echo '<a href="' . admin_url() . 'profile.php">' . __('Profile', 'bracketpress-login') . '</a>'; } ?>

			</p>
		</div>
	</div>

	<?php } ?>

</div>

<?php
		echo $after_widget;
	}
	
	function form( $instance ) {
        $defaults = array( 'title' => '', 'global' => '0', 'registration_enabled' => 1 );
        $instance = wp_parse_args( (array) $instance, $defaults );

    ?>
     <p>
        Run all registration plugins, or just for BracketPress?
     </p>
     <p>
        <label for="<?php echo $this->get_field_id( 'global' ); ?>">Plugins:</label>
        <select id="<?php echo $this->get_field_id( 'global' ); ?>" name="<?php echo $this->get_field_name( 'global' ); ?>" class="widefat" style="width:100%;">
            <option <?php if ( '0' == $instance['global'] ) echo 'selected="selected"'; ?> value="0">BracketPress Only</option>
            <option <?php if ( '1' == $instance['global'] ) echo 'selected="selected"'; ?> value="1">All Registration Plugins</option>
        </select>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'registration_enabled' ); ?>">Registration Tab:</label>
        <select id="<?php echo $this->get_field_id( 'registration_enabled' ); ?>" name="<?php echo $this->get_field_name( 'registration_enabled' ); ?>" class="widefat" style="width:100%;">
            <option <?php if ( '0' == $instance['registration_enabled'] ) echo 'selected="selected"'; ?> value="0">Tab Disabled</option>
            <option <?php if ( '1' == $instance['registration_enabled'] ) echo 'selected="selected"'; ?> value="1">Tab Enabled</option>
        </select>
    </p>
    <p>
			<br/><strong><?php _e('Note : Do not put the same widget twice in a page.', 'bracketpress-login'); ?></strong>
	</p>

	<?php
	}
}

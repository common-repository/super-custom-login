<?php
/*
Plugin Name: Super Custom Login
Plugin URI: http://middleearmedia.com/labs/plugins/super-custom-login/
Description: This plugin enables users to personalize their WordPress login screen by replacing the default WordPress logo with their own custom logo, and customizing colors of login page elements.
Version: 1.1
Author: Obadiah Metivier
Author URI: http://middleearmedia.com/
License: GPLv2 or later
*/

// Abort if this file is called directly 
if ( ! defined( 'WPINC' ) ) {
     die;
}

// Change the login logo URL
function custom_login_logo_url() {
  return home_url();
}
add_filter('login_headerurl', 'custom_login_logo_url');

// Change the title attribute for the login logo link
function custom_login_logo_url_title() {
  return get_bloginfo('name');
}
add_filter('login_headertitle', 'custom_login_logo_url_title');

// Hide error messages on the login page
function super_custom_login_hide_login_errors() {
  return null;
}
add_filter('login_errors', 'super_custom_login_hide_login_errors');

// Add a link to the settings page in the plugin list
function super_custom_login_settings_link($links) {
  $settings_link = '<a href="options-general.php?page=super-custom-login">Settings</a>';
  array_unshift($links, $settings_link);
  return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'super_custom_login_settings_link');

// Add the settings page to the settings menu
function super_custom_login_settings_menu() {
  add_options_page('Super Custom Login', 'Super Custom Login', 'manage_options', 'super-custom-login', 'super_custom_login_settings_page');
}
add_action('admin_menu', 'super_custom_login_settings_menu');

// Define the settings page
function super_custom_login_settings_page() {
  ?>
  <div class="wrap">
    <h1>Super Custom Login Settings</h1>
	<h3>Do you find this plugin useful? <a href="http://middleearmedia.com/labs/plugins/super-custom-login/">Donate</a> to help support further development.</h3>
	<form method="post" action="options.php">
	  <?php submit_button(); ?>
      <?php settings_fields('scl_settings'); ?>
      <?php do_settings_sections('scl_settings'); ?>
      <table class="form-table">
        <tr valign="top">
          <th scope="row" class="sclsubheadings">CUSTOMIZE LOGO</th>
        </tr>
		<tr valign="top">
          <th scope="row">Logo URL</th>
          <td><input type="url" name="scl_logo_url" value="<?php echo esc_attr(get_option('scl_logo_url')); ?>" /> Enter the URL of your Logo.</td>
        </tr>
        <tr valign="top">
          <th scope="row">Logo Width</th>
          <td><input type="number" name="scl_logo_width" value="<?php echo esc_attr(get_option('scl_logo_width', 328)); ?>" /> Enter the width of your Logo, if different from default of 328px.</td>
		</tr>
        <tr valign="top">
          <th scope="row">Logo Height</th>
          <td><input type="number" name="scl_logo_height" value="<?php echo esc_attr(get_option('scl_logo_height', 84)); ?>" /> Enter the height of your Logo, if different from default of 84px.</td>
        </tr>
        <tr valign="top">
          <th scope="row" class="sclsubheadings">CUSTOMIZE BACKGROUND</th>
        </tr>		
        <tr valign="top">
          <th scope="row">Background</th>
          <td><input type="color" name="scl_background_color" value="<?php echo esc_attr(get_option('scl_background_color', '#f0f0f1')); ?>" /> Select Background Color for login page. Default is #f0f0f1</td>
        </tr>
        <tr valign="top">
          <th scope="row">Back to Blog Link</th>
          <td><input type="color" name="scl_backtoblog_color" value="<?php echo esc_attr(get_option('scl_backtoblog_color', '#50575e')); ?>" />  Select Back to Blog Link Color for login page. Default is #50575e</td>
        </tr>		
        <tr valign="top">
          <th scope="row">Navigation Link</th>
          <td><input type="color" name="scl_nav_color" value="<?php echo esc_attr(get_option('scl_nav_color', '#50575e')); ?>" />  Select Navigation Link Color for login page. Default is #50575e</td>
        </tr>
        <tr valign="top">
          <th scope="row" class="sclsubheadings">CUSTOMIZE LOGIN FORM</th>
        </tr>		
        <tr valign="top">
          <th scope="row">Login Form Background</th>
          <td><input type="color" name="scl_login_form_background_color" value="<?php echo esc_attr(get_option('scl_login_form_background_color', '#ffffff')); ?>" />  Select Login Form Background Color. Default is #ffffff</td>
        </tr>		
        <tr valign="top">
          <th scope="row">Login Form Text</th>
          <td><input type="color" name="scl_login_form_text_color" value="<?php echo esc_attr(get_option('scl_login_form_text_color', '#3c434a')); ?>" />  Select Login Form Text Color. Default is #3c434a</td>
        </tr>
        <tr valign="top">
          <th scope="row" class="sclsubheadings">CUSTOMIZE LOG IN BUTTON</th>
        </tr>
        <tr valign="top">
          <th scope="row">Button Background</th>
          <td><input type="color" name="scl_log_in_button_background_color" value="<?php echo esc_attr(get_option('scl_log_in_button_background_color', '#2271b1')); ?>" />  Select Log In Button Background Color. Default is #2271b1</td>
        </tr>
        <tr valign="top">
          <th scope="row">Button Background Hover</th>
          <td><input type="color" name="scl_log_in_button_background_hover_color" value="<?php echo esc_attr(get_option('scl_log_in_button_background_hover_color', '#135E96')); ?>" />  Select Log In Button Background Hover Color. Default is #135E96</td>
        </tr>
        <tr valign="top">
          <th scope="row">Button Text</th>
          <td><input type="color" name="scl_log_in_button_text_color" value="<?php echo esc_attr(get_option('scl_log_in_button_text_color', '#ffffff')); ?>" />  Select Log In Button Text Color. Default is #ffffff</td>
        </tr>
        <tr valign="top">
          <th scope="row">Button Text Hover</th>
          <td><input type="color" name="scl_log_in_button_text_hover_color" value="<?php echo esc_attr(get_option('scl_log_in_button_text_hover_color', '#ffffff')); ?>" />  Select Log In Button Text Hover Color. Default is #ffffff</td>
        </tr>
        <tr valign="top">
          <th scope="row" class="sclsubheadings">CUSTOMIZE LOGIN ERRORS</th>
        </tr>		
        <tr valign="top">
          <th scope="row">Error Background</th>
          <td><input type="color" name="scl_login_error_background_color" value="<?php echo esc_attr(get_option('scl_login_error_background_color', '#ffffff')); ?>" />  Select Error Background Color. Default is #ffffff</td>
        </tr>
        <tr valign="top">
          <th scope="row">Error Border</th>
          <td><input type="color" name="scl_login_error_border_color" value="<?php echo esc_attr(get_option('scl_login_error_border_color', '#72aee6')); ?>" />  Select Error Border Color. Default is #72aee6</td>
        </tr>
        <tr valign="top">
          <th scope="row">Error Text</th>
          <td><input type="color" name="scl_login_error_text_color" value="<?php echo esc_attr(get_option('scl_login_error_text_color', '#3c434a')); ?>" />  Select Error Text Color. Default is #3c434a</td>
        </tr>		
      </table>
      <?php submit_button(); ?>
	  <hr />
	  <h2>CAUTION!</h2>
	  <h3>Pressing the Reset button will clear all of your custom settings.</h3>
	  <button type="submit" class="button" name="super_custom_login_reset" value="reset">Reset to Defaults</button>
    </form>
  </div>
  <?php
}

// Register the settings
function super_custom_login_register_settings() {
  register_setting('scl_settings', 'scl_logo_url', 'sanitize_text_field');
  register_setting('scl_settings', 'scl_logo_width', 'absint');
  register_setting('scl_settings', 'scl_logo_height', 'absint');
  register_setting('scl_settings', 'scl_background_color', 'sanitize_hex_color');
  register_setting('scl_settings', 'scl_backtoblog_color', 'sanitize_hex_color');
  register_setting('scl_settings', 'scl_nav_color', 'sanitize_hex_color');
  register_setting('scl_settings', 'scl_login_form_background_color', 'sanitize_hex_color');
  register_setting('scl_settings', 'scl_login_form_text_color', 'sanitize_hex_color');
  register_setting('scl_settings', 'scl_log_in_button_background_color', 'sanitize_hex_color');
  register_setting('scl_settings', 'scl_log_in_button_background_hover_color', 'sanitize_hex_color');
  register_setting('scl_settings', 'scl_log_in_button_text_color', 'sanitize_hex_color');
  register_setting('scl_settings', 'scl_log_in_button_text_hover_color', 'sanitize_hex_color');  
  register_setting('scl_settings', 'scl_login_error_background_color', 'sanitize_hex_color');  
  register_setting('scl_settings', 'scl_login_error_border_color', 'sanitize_hex_color');  
  register_setting('scl_settings', 'scl_login_error_text_color', 'sanitize_hex_color');    
}
add_action('admin_init', 'super_custom_login_register_settings');

// Replace the login logo with the custom logo
function super_custom_login_logo() {
  $logo_url = get_option('scl_logo_url');
  $logo_width = get_option('scl_logo_width', 328);
  $logo_height = get_option('scl_logo_height', 84);
  if ($logo_url) {
    echo '<style type="text/css">
      #login h1 a {
        background-image: url(' . $logo_url . ');
        background-size: contain;
        width: ' . $logo_width . 'px;
        height: ' . $logo_height . 'px;
		max-width: 100% !important;
      }
	  #login {
	    width: ' . $logo_width . 'px !important;
		max-width: 100% !important;
	  }
	  .login form {
	    width: 280px !important;
		margin-left: auto !important;
		margin-right: auto;
	  }
	  .login #nav {
		text-align: center;
	  }
	  #backtoblog {
		text-align: center;
	  }
    </style>';
  }
}
add_action('login_enqueue_scripts', 'super_custom_login_logo');

// Replace background color on the login page. Replace back to blog link and navigation link colors to the login page
function super_custom_login_background_settings() {
  $background_color = get_option('scl_background_color');
  $backtoblog_color = get_option('scl_backtoblog_color');
  $nav_color = get_option('scl_nav_color');
  if ($background_color || $backtoblog_color || $nav_color) {
    echo '<style type="text/css">
      body.login {
        background-color: ' . $background_color . '!important;
      }
	  .login #backtoblog a {
        color: ' . $backtoblog_color . '!important;
      }
      .login #nav a {
        color: ' . $nav_color . '!important;
      }
    </style>';
  }
}
add_action('login_enqueue_scripts', 'super_custom_login_background_settings');

// Replace login form 
function super_custom_login_form_colors() {
// Replace login form background color and text color 
  $loginformbackground_color = get_option('scl_login_form_background_color');
  $loginformtext_color = get_option('scl_login_form_text_color');
// Replace Log In button background color, text color, hover background color, and hover text color
  $loginbuttonbackground_color = get_option('scl_log_in_button_background_color');
  $loginbuttonbackground_hover_color = get_option('scl_log_in_button_background_hover_color');
  $loginbuttontext_color = get_option('scl_log_in_button_text_color');
  $loginbuttontext_hover_color = get_option('scl_log_in_button_text_hover_color');
// Replace login error background color, border color, and text color
  $loginerrorbackground_color = get_option('scl_login_error_background_color');
  $loginerrorborder_color = get_option('scl_login_error_border_color');
  $loginerrortext_color = get_option('scl_login_error_text_color');
  if ($loginformbackground_color || $loginformtext_color || $loginbuttonbackground_color || $loginbuttonbackground_hover_color || $loginbuttontext_color || $loginbuttontext_hover_color || $loginerrorbackground_color || $loginerrorborder_color || $loginerrortext_color) {
    echo '<style type="text/css">
      .login form {
        background: ' . $loginformbackground_color . '!important;
      }
      .login form {
        color: ' . $loginformtext_color . '!important;
      }
      .login .button-primary {
        background: ' . $loginbuttonbackground_color . '!important;
		border-color: ' . $loginbuttonbackground_color . '!important;
      }
      .login .button-primary:hover {
        background: ' . $loginbuttonbackground_hover_color . '!important;
		border-color: ' . $loginbuttonbackground_hover_color . '!important;
      }
      .login .button-primary {
        color: ' . $loginbuttontext_color . '!important;
      }
      .login .button-primary:hover {
        color: ' . $loginbuttontext_hover_color . '!important;
      }
      }
      .login #login_error {
        background-color: ' . $loginerrorbackground_color . '!important;
      }
      }
      .login #login_error {
        border-colort: ' . $loginerrorborder_color . '!important;
      }
      }
      .login #login_error {
        color: ' . $loginerrortext_color . '!important;
      }	  
    </style>';
  }
}
add_action('login_enqueue_scripts', 'super_custom_login_form_colors');

// Handle the reset button
function super_custom_login_handle_reset() {
  if (isset($_POST['super_custom_login_reset'])) {
    delete_option('scl_logo_url');
    delete_option('scl_logo_width');
    delete_option('scl_logo_height');
    delete_option('scl_background_color');
    delete_option('scl_backtoblog_color');
    delete_option('scl_nav_color');
    delete_option('scl_login_form_background_color');
    delete_option('scl_login_form_text_color');
    delete_option('scl_log_in_button_background_color');
    delete_option('scl_log_in_button_background_hover_color');
    delete_option('scl_log_in_button_text_color');
    delete_option('scl_log_in_button_text_hover_color');
    delete_option('scl_login_error_background_color');
    delete_option('scl_login_error_border_color');
    delete_option('scl_login_error_text_color');
	wp_redirect(admin_url('options-general.php?page=super-custom-login'));
    exit;
  }
}
add_action('admin_init', 'super_custom_login_handle_reset');

=== Super Custom Login ===
Contributors: Obadiah
Donate link: http://middleearmedia.com/labs/plugins/super-custom-login/
Tags: admin, branding, custom login, customized login screen, custom logo, custom login logo, login logo, custom page, customization, login, login error, login page, login screen, logo, background color, middle ear media, obadiah, security, super custom login
Requires at least: 3.1
Tested up to: 6.2
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin enables users to personalize their WordPress login screen by replacing the default WordPress logo with their own custom logo.

== Description ==

This plugin offers customization options for the WordPress login screen, including the ability to replace the default WordPress logo with a custom logo that links to the user's homepage. There are custom color settings for all elements on login page. Additionally, the plugin improves login security by removing error messages upon failed login attempts.

To utilize the custom logo feature, users should first upload their logo (ideally as a transparent PNG) to their media library where the URL can by copied. Install the plugin and go to the settings page. Enter the URL. Enter width and height of logo, if different from defaults. Click "Save Changes".

== Installation ==

Installation from within WordPress
- Visit Plugins > Add New.
- Search for Super Custom Login.
- Install and activate the Super Custom Login plugin.

Manual installation
- Upload the entire super-custom-login folder to the /wp-content/plugins/ directory.
- Visit Plugins.
- Activate the Super Custom Login plugin.
- After activation
- Visit the new Settings > Super Custom Login menu.
- Enter URL, width and height of login page logo.
- Enter colors for login page elements

== Changelog ==

= 1.1 =
* Updated the plugin description. 04/02/2023
* Add doanation link at top of page. 04/02/2023
* Add additional Save Changes button at top of page. 04/02/2023
* Added section headers to separate the Logo, Background, Login Form, Log In Button, and Login Errors. 04/02/2023
* Added reset button at bottom of page to retstore all settings to default. 04/02/2023
* Added Caution warning for reset button. 04/02/2023
* Update readme file. 04/02/2023

= 1.0 =
* Updated the plugin description. 04/01/2023
* Added code to abort if the plugin file is called directly, as a security measure. 04/01/2023
* Added custom settings page to WordPress Dashboard under the Settings submenu. 04/01/2023
* Add a link to the settings page in the plugin list. 04/01/2023
* Define the settings page with three inputs, one type URL for the URL, two type integer for the width and height. Also a Save Changes button. 04/01/2023
* Register the settings and sanitize the inputs for security. 04/01/2023
* Replace the login logo with the custom logo. Pass the default width 328 and height 84. 04/01/2023
* Adjust the CSS styles to use the custom logo url, width, and height. 
* Set max-width to 100% to prevent logo and login form from being cutoff. 04/01/2023
* Adjust the CSS styles to center the logo, login form, and links. 04/01/2023
* Change the URL that the logo links to. 04/01/2023
* Change the title attribute for the logo link. 04/01/2023
* Filter the login error messages to return a null value. 04/01/2023
* Update readme file. 04/01/2023

= 0.8 =
* Updated the following code due to fatal errors. 03/28/2023
1. Updated get_bloginfo() to get_stylesheet_directory_uri(), which is a more secure way of getting the directory URI.
2. Updated get_bloginfo('url') to home_url(), which is a more secure way of getting the home URL.
3. Updated create_function() to __return_null(), which is a more secure way of returning a null value.
4. Changed login_headertitle to login_headertext, which is the correct filter name for the login header title.
* Updated the readme file short description and full description to be easier to read. 03/28/2023
* Removed reference to specific photo editing software in Installation instructions in readme file. 03/28/2023

= 0.7 =
* Updated banner. Created icon. Updated description. Tested plugin with WordPress 4.0. 09/22/2014.

= 0.6 =
* Forced logo image to be 328 pixels wide by 84 pixels high with "width:328px!important;" and "height:84px!important;". Tested plugin with WordPress 3.5. 01/22/2013.

= 0.5 =
* Forced logo image to be 328 pixels wide by 84 pixels high with "background-size:328px 84px !important;". Tested plugin with WordPress 3.5. 01/17/2013.

= 0.4 =
* Modified plugin URI. Added Tags and License information to readme file. Added plugin to official WordPress plugin directory. 10/19/2012.

= 0.3 =
* Corrected the homepage link. It was pointing to the login page instead. 08/13/2012.

= 0.2 =
* Include a template (PSD) file and example (PNG) for custom logo. 05/03/2012.

= 0.1 =
* Added a custom logo on login screen. Added custom login screen link. Added remove error messages on failed log-ins. 05/02/2012.

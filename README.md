=== Upload Security ===

Contributors: saha96

Tags: uploads, security

Requires at least: 3.5

Tested up to: 4.7

Stable tag: 4.7

License: GPLv2 or later

License URI: https://www.gnu.org/licenses/gpl-2.0.html

This plugin helps secure uploads by preventing unauthorized users from accessing your upload directory and stealing its content.

== Description ==

This plugin helps secure uploads by preventing unauthorized users from accessing your upload directory and stealing its content.

Works by adding a blank index.php in every directory and sub directory starting from the upload folder. 

== Installation ==

1. Upload the plugin files to the '/wp-content/plugins/upload-security-sarbajitsaha' directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Go to Settings->Upload Security screen to configure the plugin

== Frequently Asked Questions ==

= How does this work? =

It adds a blank index.php file to every directory and sub directory starting from the upload folder. So anyone accessing your upload directory will see a blank page instead of the contents, and can't download the files. 

== Screenshots ==

1. 1st screenshot shows the initial setup screen
2. 2nd screenshot taken after uploads have been secured. 

== Changelog ==

= 1.0 =
* 1st version

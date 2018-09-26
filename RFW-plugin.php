<?php
/*
Plugin Name: RFW Plugin
Plugin URI: https://github.com/zgordon/wp-dev-course
Description: Demo plugin for learning about plugin settings pages.
Version: 1.0.0
Contributors: Rommel Fowler
Author: Rommel Fowler
Author URI: https://rommelfowler.com
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: rfwplugin
Domain Path:  /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}
/*
Function to enqueue styles
*/
// defining a constant path
define( 'RFWPLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'RFWPLUGIN_DIR', plugin_dir_path( __FILE__ ) );
// this includes style items
include( plugin_dir_path( __FILE__ ) . 'includes/rfwplugin-styles.php');
// this includes JS items
include( plugin_dir_path( __FILE__ ) . 'includes/rfwplugin-scripts.php');
// this includes JS items
include( plugin_dir_path( __FILE__ ) . 'includes/rfwplugin-options.php');
// this includes JS items
include( plugin_dir_path( __FILE__ ) . 'includes/rfwplugin-settings.php');
// this includes menu items
include( plugin_dir_path( __FILE__ ) . 'includes/rfwplugin-menus.php');
// add items to Wordpress settings
include( plugin_dir_path( __FILE__ ) . 'templates/rfwplugin-wp-pages.php');
// this includes adding-file-path markup
include( plugin_dir_path( __FILE__ ) . 'templates/rfwplugin-filepath-markup.php');
// this includes adding-style markup
include( plugin_dir_path( __FILE__ ) . 'templates/rfwplugin-style-markup.php');
// this includes adding-script markup
include( plugin_dir_path( __FILE__ ) . 'templates/rfwplugin-script-markup.php');
// Footer text admin area
include( plugin_dir_path( __FILE__ ) . 'templates/rfwplugin-admin-footer-text.php');


/*
Function to add a link to your settings page in your plugin
Variable - grab WP $link from Wordpress
*/
function rfwplugin_add_settings_link($links){
  //Create new link
  $settings_link = '<a href="admin.php?page=rfwplugin">'. __('Settings', 'rfwplugin') . '</a>';
  //push link onto array
  array_push($links, $settings_link);
  return $links;
}
$filter_name = 'plugin_action_links_' . plugin_basename( __FILE__ );

add_filter( $filter_name, 'rfwplugin_add_settings_link', 10, 1   );

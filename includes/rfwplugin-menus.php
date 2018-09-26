<?php

/*
Function to add Menu item and sub-menu item
*/
function rfwplugin_settings_pages()
{

  add_menu_page(
    // Title
    __( 'RF Plugin', 'rfwplugin' ),
    // CMS Title
    __( 'RF Description', 'rfwplugin' ),
    'manage_options',
    //Slug URL
    'rfwplugin',
    //Callback Function
    'rfwplugin_settings_page_markup',
    // Dashicon
    'dashicons-image-filter',
    1
  );

  add_submenu_page(
    'rfwplugin',
    __( 'File Path', 'rfwplugin' ),
    __( 'File Path', 'rfwplugin' ),
    'manage_options',
    'rfwplugin-filepath',
    //Callback Function
    'rfwplugin_filepath_markup'
  );

  add_submenu_page(
    'rfwplugin',
    __( 'Enqueue Styles', 'rfwplugin' ),
    __( 'Enqueue Styles', 'rfwplugin' ),
    'manage_options',
    'rfwplugin-styles',
    //Callback Function
    'rfwplugin_style_markup'
  );
  add_submenu_page(
    'rfwplugin',
    __( 'Enqueue Scripts', 'rfwplugin' ),
    __( 'Enqueue Scripts', 'rfwplugin' ),
    'manage_options',
    'rfwplugin-scripts',
    //Callback Function
    'rfwplugin_scripts_markup'
  );
  add_submenu_page(
    'rfwplugin',
    __( 'Settings API', 'rfwplugin' ),
    __( 'Settings API', 'rfwplugin' ),
    'manage_options',
    'rfwplugin-settings',
    //Callback Function
    'rfwplugin_settings_section_markup'
  );
  add_submenu_page(
    'rfwplugin',
    __( 'More Settings', 'rfwplugin' ),
    __( 'More Settings', 'rfwplugin' ),
    'manage_options',
    'rfwplugin-more-settings',
    //Callback Function
    'rfwplugin_more_settings_section_markup'
  );
}
add_action( 'admin_menu', 'rfwplugin_settings_pages' );


function rfwplugin_settings_page_markup()
{
  // Double check user capabilities
  if ( !current_user_can('manage_options') ) {
      return;
  }
include(RFWPLUGIN_DIR . 'templates/rfwplugin-main-wrap.php');
}


function rfwplugin_settings_section_markup(){
  // Double check user capabilities
  if ( !current_user_can('manage_options') ) {
      return;
  }

  include(RFWPLUGIN_DIR . 'templates/rfwplugin-settingsAPI-markup.php');

}
function rfwplugin_more_settings_section_markup(){
  // Double check user capabilities
  if ( !current_user_can('manage_options') ) {
      return;
  }

  include(RFWPLUGIN_DIR . 'templates/rfwplugin-more-settings-markup.php');

}

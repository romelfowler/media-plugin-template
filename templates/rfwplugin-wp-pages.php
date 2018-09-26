<?php
/*
Function to add sub-pages to non-custom WP Menu
*/
function rfwplugin_default_sub_pages() {

  // Can add page as a submenu using the following:
  // add_dashboard_page()
  // add_posts_page()
  // add_media_page()
  // add_pages_page()
  // add_comments_page()
  // add_theme_page()
  // add_plugins_page()
  // add_users_page()
  // add_management_page()
  // add_options_page()

  // add_dashboard_page(
  //   __( 'Cool Default Sub Page', 'rfwplugin' ),
  //   __( 'Custom Sub Page', 'rfwplugin' ),
  //   'manage_options',
  //   'rfwplugin-subpage',
  //   'rfwplugin_settings_page_markup'
  // );

}
add_action( 'admin_menu', 'rfwplugin_default_sub_pages' );

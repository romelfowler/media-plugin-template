<?php
/*
NOTE: To load styles conditionaly, use wp_register_style vs wp_enqueue_styles.
  Then add conditional statement. For Global just add wp_enqueue_styles
*/



// Load CSS on all admin pages
function rfwplugin_admin_styles($hook) {
  wp_register_style(
    'rfwplugin-admin',
    RFWPLUGIN_URL . 'admin/css/rfwplugin-admin-style.css',
    [],
    time()
  );
  // toplevel_page_ is a unique ID
  if('toplevel_page_rfwplugin' || 'rf-description_page_rfwplugin-filepath' == $hook){
    // enqueue registered styles
    wp_enqueue_style('rfwplugin-admin');
  }

}
add_action( 'admin_enqueue_scripts', 'rfwplugin_admin_styles' );


// Load CSS on the frontend
// function rfwplugin_frontend_styles() {
//   wp_register_style(
//     'rfwplugin-frontend',
//     RFWPLUGIN_URL . 'frontend/css/rfwplugin-frontend-style.css',
//     [],
//     time()
//   );
  // if(is_single()){
    // enqueue registered styles
    // wp_enqueue_style('rfwplugin-admin');
  // }

// }
// add_action( 'wp_enqueue_scripts', 'rfwplugin_frontend_styles', 100 );

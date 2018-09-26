<?php
/*
NOTE: To load scripts conditionaly, use wp_register_style vs wp_enqueue_scripts.
  Then add conditional statement. For Global just add wp_enqueue_scripts
*/

// Load JS on CMS
function rfwplugin_admin_scripts($hook){
  wp_register_script(
    'rfwplugin-admin',
    RFWPLUGIN_URL . 'admin/js/rfwplugin-admin.js',
    ['jquery'],
    time()
  );

  // Send custom variables to frontend - you can call by concat method (rfwplugin.hook)
  wp_localize_script('rfwplugin-admin','rfwplugin',
  ['hook'=>$hook]
  );
  // Plugin page
  if('toplevel_page_rfwplugin'==$hook){
    wp_enqueue_script('rfwplugin-admin');
  }
}
add_action('admin_enqueue_scripts','rfwplugin_admin_scripts', 100);

// Load JS on frontend
function rfwplugin_frontend_scripts(){
  wp_register_script(
    'rfwplugin-admin',
    RFWPLUGIN_URL . 'frontend/js/rfwplugin-frontend.js',
    ['jquery'],
    time()
  );
  if (is_single()) {
    wp_enqueue_script('rfwplugin-admin');
  }

}
add_action('admin_enqueue_scripts','rfwplugin_frontend_scripts',100);

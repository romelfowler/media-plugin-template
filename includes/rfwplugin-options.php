<?php
/*
NOTE: use SELECT * FROM wp_options WHERE option_name = "rfwplugin_option";
*/

function rfwplugin_option(){
  // Variable array
  // $options = ['First','Second','Third'];

  $options = [];
  $options['name'] = 'Rommel';
  $options['location'] = 'Nevada';
  $options['sponsor'] = 'Plugin';
  // Get options from the database
  if (!get_option('rfwplugin_option')) {
    add_option('rfwplugin_option', $options);
  }

  update_option('rfwplugin_option', $options);
  // delete_option( 'rfwplugin_option' );
}
add_action('admin_init','rfwplugin_option');

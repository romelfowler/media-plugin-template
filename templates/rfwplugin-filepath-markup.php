<?php

/*
Sub-menu item that displays how each function works and what file path it shows.
*/
function rfwplugin_filepath_markup()
{
  // Double check user capabilities
  if ( !current_user_can('manage_options') ) {
      return;
  }

  $rfw_plugin_basename = plugin_basename( __FILE__ );
  $rfw_plugin_dir_path = plugin_dir_path( __FILE__ );
  $rfw_plugins_url = plugins_url();
  $rfw_plugins_urlparam = plugins_url('includes', __FILE__);
  $rfw_plugin_dir_url = plugin_dir_url(__FILE__);
  ?>
  <div class="wrap">
    <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>
    <h4><span style="color: #62c594; font-weight: 700;">Description:</span>
      This tutorial shows a directory file path for each function.
    </h4>
    <p>Udemy: <a href="https://www.udemy.com/wordpress-theme-and-plugin-development-course/learn/v4/content">
      <strong>Building Plugins Video</strong>
    </a></p>

    <ul>
      <li>plugin_basename(__FILE__) - <strong><?php echo $rfw_plugin_basename; ?></strong></li>
      <li>plugin_dir_url( __FILE__ ) - <strong><?php echo $rfw_plugin_dir_path; ?></strong></li>
      <li>plugins_url() - <strong><?php echo $rfw_plugins_url; ?></strong></li>
      <li>plugins_url('includes, __FILE__') - <strong><?php echo $rfw_plugins_urlparam; ?></strong></li>
      <li>plugin_dir_url( __FILE__ ) - <strong><?php echo $rfw_plugin_dir_url; ?></strong></li>
      <li>included file test - <strong><?php include(plugin_dir_path( __FILE__ ) . 'lib/include-test.php'); ?></strong></li>
      <li> <a href="https://wordpress.dev/wp-content/plugins/6.07-plugin-file-paths/includes/" target="_blank">Udemy file to test </a></li>
    </ul>
  </div>
  <?php
}

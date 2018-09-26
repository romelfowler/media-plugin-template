<?php

/*
Sub-menu item that displays how each function works and what file path it shows.
*/
function rfwplugin_scripts_markup()
{
  // Double check user capabilities
  if ( !current_user_can('manage_options') ) {
      return;
  }

  ?>
  <div class="wrap">
    <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>
    <h4><span style="color: #62c594; font-weight: 700;">Description:</span>
      This shows functions that target scripts inside the admin and frontend sections.
    </h4>
    <hr>
    <h4>Load JS global admin/frontend page</h4>
    <div class="code-wrapper">
      <code>
        &emsp;function rfwplugin_admin_scripts($hook){ <br>
          &emsp;&emsp;wp_enqueue_script(<br>
            &emsp;&emsp;&emsp;'rfwplugin-admin',<br>
            &emsp;&emsp;&emsp;RFWPLUGIN_URL . 'admin/js/rfwplugin-admin.js',<br>
            &emsp;&emsp;&emsp;['jquery'],<br>
            &emsp;&emsp;&emsp;time()<br>
          &emsp;&emsp;);<br>
<br>
          &emsp;&emsp;// Send custom variables to frontend - you can call by concat method (rfwplugin.hook)<br>
          &emsp;&emsp;wp_localize_script('rfwplugin-admin','rfwplugin',<br>
          &emsp;&emsp;&emsp;['hook'=>$hook]<br>
          &emsp;&emsp;);<br>
        &emsp;}<br>
        &emsp;add_action('admin_enqueue_scripts','rfwplugin_admin_scripts', 100);<br>

        &emsp;<span style="color: #b71c29">Hook into admin_enqueue_scripts for both admin & frontend pages</span>

      </code>
    </div>

    <h4>Load JS to plugin admin/frontend page</h4>
    <div class="code-wrapper">
      <code>
        &emsp;function rfwplugin_admin_scripts($hook){<br>
          &emsp;&emsp;wp_register_script(<br>
            &emsp;&emsp;&emsp;'rfwplugin-admin',<br>
            &emsp;&emsp;&emsp;RFWPLUGIN_URL . 'admin/js/rfwplugin-admin.js',<br>
            &emsp;&emsp;&emsp;['jquery'],<br>
            &emsp;&emsp;&emsp;time()<br>
          &emsp;&emsp;);<br>
<br>
          &emsp;&emsp;// Send custom variables to frontend - you can call by concat method (rfwplugin.hook)<br>
          &emsp;&emsp;wp_localize_script('rfwplugin-admin','rfwplugin',<br>
          &emsp;&emsp;&emsp;['hook'=>$hook]<br>
          &emsp;&emsp;);<br>
          &emsp;&emsp;// Plugin page<br>
          &emsp;&emsp;if('toplevel_page_rfwplugin'==$hook){<br>
            &emsp;&emsp;&emsp;wp_enqueue_script('rfwplugin-admin');<br>
          &emsp;&emsp;}<br>
        &emsp;}<br>
        &emsp;add_action('admin_enqueue_scripts','rfwplugin_admin_scripts', 100);<br>

        &emsp;<span style="color: #b71c29">Hook into admin_enqueue_scripts for both admin & frontend pages</span>

      </code>
    </div>

  </div>
  <?php
}

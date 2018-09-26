<?php

/*
Sub-menu item that displays how each function works and what file path it shows.
*/
function rfwplugin_style_markup()
{
  // Double check user capabilities
  if ( !current_user_can('manage_options') ) {
      return;
  }

  ?>
  <div class="wrap">
    <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>
    <h4><span style="color: #62c594; font-weight: 700;">Description:</span>
      This shows functions that target styles inside the admin and frontend sections.
    </h4>
    <hr>
    <h4>Load CSS global admin/frontend page</h4>
    <p><span style="color: #62c594; font-weight: 700;">Hook into: <strong>admin_enqueue_scripts</strong>or<br/><strong>wp_enqueue_scripts</strong></span></p>
    <div class="code-wrapper">
      <code>
        function rfwplugin_admin_styles($hook) { <br>
          &emsp;&emsp;wp_enqueue_style( <br>
            &emsp;&emsp;&emsp;'rfwplugin-admin', <br>
            &emsp;&emsp;&emsp;RFWPLUGIN_URL . 'admin/css/rfwplugin-admin-style.css', <br>
            &emsp;&emsp;&emsp;[], <br>
            &emsp;&emsp;&emsp;time() <br>
          &emsp;&emsp;); <br> <br>

        &emsp;} <br>
        &emsp;add_action( 'admin_enqueue_scripts', 'rfwplugin_admin_styles' ); <br>
        &emsp;add_action( 'wp_enqueue_scripts', 'rfwplugin_frontend_styles', 100 );
        <span style="color: #b71c29">Hook into wp_enqueue_scripts for frontend pages</span>

      </code>
    </div>

    <h4>Load CSS to plugin admin/frontend page</h4>
    <div class="code-wrapper">
      <code>

        function rfwplugin_admin_styles($hook) { <br>
          &emsp;&emsp;wp_register_style( <br>
            &emsp;&emsp;&emsp;'rfwplugin-admin', <br>
            &emsp;&emsp;&emsp;RFWPLUGIN_URL . 'admin/css/rfwplugin-admin-style.css', <br>
            &emsp;&emsp;&emsp;[], <br>
            &emsp;&emsp;&emsp;time() <br>
          &emsp;&emsp;); <br> <br>
          &emsp;// toplevel_page_ is a unique ID <br>
          &emsp;if(('toplevel_page_rfwplugin' || 'rf-description_page_rfwplugin') == $hook){  <br>
            &emsp;&emsp;// enqueue registered styles <br>
            &emsp;&emsp;wp_enqueue_style('rfwplugin-admin'); <br>
          &emsp;&emsp;} <br> <br>

        &emsp;} <br>
        &emsp;add_action( 'admin_enqueue_scripts', 'rfwplugin_admin_styles' ); <br>
        &emsp;add_action( 'wp_enqueue_scripts', 'rfwplugin_frontend_styles', 100 );
        <span style="color: #b71c29">Hook into wp_enqueue_scripts for frontend pages</span>

      </code>
    </div>

  </div>
  <?php
}

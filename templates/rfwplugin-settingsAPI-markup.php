
<!-- Settings API markup -->

  <div class="wrap">
    <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>
    <h4><span style="color: #62c594; font-weight: 700;">Description:</span>
      How to use the settings API
    </h4>
    <h4><span style="color: #62c594; font-weight: 700;">LINK: </span><a href="https://www.udemy.com/wordpress-theme-and-plugin-development-course/learn/v4/t/lecture/9648506?start=0" target="_blank">Settings API</a></h4>

    <hr>

        <form class="settings-form" action="options.php" method="post">
          <?php
          // Display necessary hidden fields for settings
          settings_fields('rfwplugin_settingsAPI');
          // Display the settings section for the page
          // IMPORTANT FOR SETTINGS
          do_settings_sections('rfwplugin-settings');
          // default submit button
          submit_button();
          ?>

        </form>

    <hr>
    <div class="code-wrapper flt-l m-20px-r m-20px-b ">
      <h3>Adding a settings API section</h3>

      <code>
        &nbsp;function rfwplugin_settingsAPI()<br>
        &nbsp;{<br>
          &nbsp;&nbsp;// Define (at least) one section for our fields<br>
          &nbsp;&nbsp;add_settings_section(<br>
            &nbsp;&nbsp;&nbsp;// Unique ID for the section<br>
            &nbsp;&nbsp;&nbsp;'rfwplugin_settings_section',<br>
            &nbsp;&nbsp;&nbsp;// Section Title<br>
            &nbsp;&nbsp;&nbsp;__('A Section Title','rfwplugin'),<br>
            &nbsp;&nbsp;&nbsp;// Callback function<br>
            &nbsp;&nbsp;&nbsp;'rfwplugin_settings_section_cb',<br>
            &nbsp;&nbsp;&nbsp;// Admin page to add section<br>
            &nbsp;&nbsp;&nbsp;'rfwplugin'<br>
          &nbsp;&nbsp;);<br>

        &nbsp;&nbsp;add_settings_field(<br>
        &nbsp;&nbsp;&nbsp;// Unique identifier for field<br>
        &nbsp;&nbsp;&nbsp;'rfwplugin_settings_custom_text',<br>
        &nbsp;&nbsp;&nbsp;// Field Title<br>
        &nbsp;&nbsp;&nbsp;__( 'Custom Text', 'rfwplugin'),<br>
        &nbsp;&nbsp;&nbsp;// Callback for field markup<br>
        &nbsp;&nbsp;&nbsp;'rfwplugin_settings_custom_text_callback',<br>
        &nbsp;&nbsp;&nbsp;// Page to go on<br>
        &nbsp;&nbsp;&nbsp;'rfwplugin-settings',<br>
        &nbsp;&nbsp;&nbsp;// Section to go in<br>
        &nbsp;&nbsp;&nbsp;'rfwplugin_settings_section'<br>
      &nbsp;&nbsp;);<br>

      &nbsp;&nbsp;register_setting(<br>
        &nbsp;&nbsp;&nbsp;'rfwplugin_settingsAPI',<br>
        &nbsp;&nbsp;&nbsp;'rfwplugin_settingsAPI'<br>
      &nbsp;&nbsp;);<br>
      &nbsp;}<br>

      &nbsp;add_action( 'admin_init', 'rfwplugin_settingsAPI' );

      </code>
    </div>


    <div class="code-wrapper flt-l m-20px-b ">
      <h3>Adding a form section</h3>

      <code>
        &nbsp;function rfwplugin_settings_section_cb(){<br>
          &nbsp;&nbsp;esc_html_e( 'Inspect to see the form', 'rfwplugin' );<br>

        &nbsp;}<br>

        &nbsp;function rfwplugin_settings_custom_text_callback(){<br>
          &nbsp;&nbsp;$options = get_option( 'wpplugin_settings' );<br>
<br>
        &nbsp;&nbsp;$custom_text = '';<br>
        &nbsp;&nbsp;&nbsp;if( isset( $options[ 'custom_text' ] ) ) {<br>
          &nbsp;&nbsp;&nbsp;&nbsp;$custom_text = esc_html( $options['custom_text'] );<br>
        &nbsp;}<br>
<br>
        &nbsp;echo '< input type="text" id="wpplugin_customtext" <br>name="wpplugin_settings[custom_text]" value="' . $custom_text . '" />';<br>
<br>
        &nbsp;}<br>

      </code>
    </div>



    <div class="code-wrapper flt-l m-20px-b ">
      <h3>Form Sample</h3>

      <code>
        &nbsp;< form class="settings-form" action="options.php" method="post"><br>
          &nbsp;&nbsp;< ?php<br>
          &nbsp;&nbsp;&nbsp;// Display necessary hidden fields for settings<br>
          &nbsp;&nbsp;&nbsp;settings_fields('rfwplugin_settingsAPI');<br>
          &nbsp;&nbsp;&nbsp;// Display the settings section for the page<br>
          &nbsp;&nbsp;&nbsp;// IMPORTANT FOR SETTINGS<br>
          &nbsp;&nbsp;&nbsp;do_settings_sections('rfwplugin-settings');<br>
          &nbsp;&nbsp;&nbsp;// default submit button<br>
          &nbsp;&nbsp;&nbsp;submit_button();<br>
          &nbsp;&nbsp;?><br>

        &nbsp;< /form><br>

      </code>
    </div>
  </div>


<!-- Settings API markup -->

  <div class="wrap">
    <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>
    <h4><span style="color: #62c594; font-weight: 700;">Description:</span>
      How to use the settings API
    </h4>
    <h4><span style="color: #62c594; font-weight: 700;">LINK: </span><a href="https://www.udemy.com/wordpress-theme-and-plugin-development-course/learn/v4/t/lecture/9648614?start=0" target="_blank">More Settings API</a></h4>

    <hr>

        <form class="settings-form" action="options.php" method="post">
          <?php
          // Display necessary hidden fields for settings
          settings_fields('rfwplugin_more_settingsAPI');
          // Display the settings section for the page
          // IMPORTANT FOR SETTINGS
          do_settings_sections('rfwplugin-more-settings');
          // default submit button
          submit_button();
          ?>

        </form>

    <hr>
    <div class="code-wrapper  m-20px-r m-20px-b ">
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

    <div class="code-wrapper  m-20px-r m-20px-b ">
      <h3>Adding a Textarea menu section</h3>

      <code>
        &nbsp;function rfwplugin_more_settingsAPI()<br>
        &nbsp;{<br>
          &nbsp;&nbsp;// If plugin settings don't exist, then create them<br>
          &nbsp;&nbsp;if(!get_option('rfwplugin_more_settingsAPI')){<br>
            &nbsp;&nbsp;&nbsp;add_option('rfwplugin_more_settingsAPI');<br>
          &nbsp;&nbsp;}<br>
          &nbsp;&nbsp;// Define (at least) one section for our fields<br>

          &nbsp;&nbsp;// Radio<br>
          &nbsp;&nbsp;add_settings_field(<br>
          &nbsp;&nbsp;&nbsp;  'rfwplugin_radio',<br>
          &nbsp;&nbsp;&nbsp;  __('Radio','rfwplugin'),<br>
          &nbsp;&nbsp;&nbsp;  'rfwplugin_settings_radio_cb',<br>
          &nbsp;&nbsp;&nbsp;  'rfwplugin-more-settings',<br>
          &nbsp;&nbsp;&nbsp;  'rfwplugin_more_settings_section',<br>
          &nbsp;&nbsp;&nbsp;  [ 'option_one'=>'Radio 1', 'option_two'=>'Radio 2']<br>
          &nbsp;&nbsp;);<br>
      &nbsp;  }<br>


    &nbsp;  // Function for Textarea<br>
      &nbsp;function rfwplugin_settings_textarea_cb(){<br>
        &nbsp;&nbsp;$options = get_option( 'rfwplugin_more_settingsAPI' );<br>
<br>
    &nbsp;  $textarea = '';<br>
    &nbsp;  if( isset( $options[ 'textarea' ] ) ) {<br>
        &nbsp;&nbsp;$textarea = esc_html( $options['textarea'] );<br>
      &nbsp;}<br>
<br>
      &nbsp;echo '<\textarea id="rfwplugin_textarea" name="rfwplugin_settingsAPI[textarea]" rows="5" cols="50">' . $textarea . '</\textarea>';<br>
<br>
    &nbsp;  }<br>
      </code>
    </div>
    <div class="code-wrapper  m-20px-r m-20px-b ">
      <h3>Adding a Checkbox menu Section</h3>

      <code>
      &nbsp;  // Checkbox<br>
        &nbsp;add_settings_field(<br>
          &nbsp;&nbsp;'rfwplugin_checkbox',<br>
        &nbsp;&nbsp;  __('Checkbox','rfwplugin'),<br>
        &nbsp;&nbsp;  'rfwplugin_settings_checkbox_cb',<br>
        &nbsp;&nbsp;  'rfwplugin-more-settings',<br>
        &nbsp;&nbsp;  'rfwplugin_more_settings_section',<br>
        &nbsp;&nbsp;  // This parameter is pass in callback function<br>
        &nbsp;&nbsp;  [ 'label' => 'Checkbox Label' ]<br>
      &nbsp;  );<br>
<br>
&nbsp;// Function for Checkbox in More Settings section<br>
&nbsp;function rfwplugin_settings_checkbox_cb( $args ) {<br>
  &nbsp;&nbsp;$options = get_option( 'rfwplugin_more_settingsAPI' );<br>
  &nbsp;&nbsp;$checkbox = '';<br>
  &nbsp;&nbsp;if(isset($options['checkbox'])){<br>
  &nbsp;&nbsp;&nbsp;  $checkbox = esc_html( $options['checkbox']);<br>
  &nbsp;&nbsp;}<br>
<br>
  &nbsp;&nbsp;$html = '<\input type="checkbox" id="rfwplugin_settings_checkbox" name="rfwplugin_more_settingsAPI[checkbox]" value="1"' . checked(1, $checkbox, false) . '/>';<br>
  &nbsp;&nbsp;$html .= '&nbsp;';<br>
  &nbsp;&nbsp;$html .= '<\label for="rfwplugin_more_settings_checkbox">' . $args['label'] . '</\label>';<br>
<br>
  &nbsp;&nbsp;echo $html;<br>
&nbsp;}<br>
      </code>
    </div>
    <div class="code-wrapper  m-20px-r m-20px-b ">
      <h3>Adding a Dropdown menu Section</h3>

      <code>
        &nbsp;function rfwplugin_more_settingsAPI()<br>
        &nbsp;{<br>
          &nbsp;&nbsp;// If plugin settings don't exist, then create them<br>
          &nbsp;&nbsp;if(!get_option('rfwplugin_more_settingsAPI')){<br>
            &nbsp;&nbsp;&nbsp;add_option('rfwplugin_more_settingsAPI');<br>
          &nbsp;&nbsp;}<br>
          &nbsp;&nbsp;// Define (at least) one section for our fields<br>
          &nbsp;&nbsp;// Dropdown<br>
          &nbsp;&nbsp;add_settings_field(<br>
          &nbsp;&nbsp;&nbsp;  'rfwplugin_dropdown',<br>
          &nbsp;&nbsp;&nbsp;  __('Dropdown','rfwplugin'),<br>
          &nbsp;&nbsp;&nbsp;  'rfwplugin_settings_dropdown_cb',<br>
          &nbsp;&nbsp;&nbsp;  'rfwplugin-more-settings',<br>
          &nbsp;&nbsp;&nbsp;  'rfwplugin_more_settings_section',<br>
          &nbsp;&nbsp;&nbsp;  [ 'option_one'=>'Select Option 1',<br>
          &nbsp;&nbsp;&nbsp; 'option_two'=>'Select Option 2',<br>
          &nbsp;&nbsp;&nbsp; 'option_three'=>'Select Option 3']<br>
          &nbsp;&nbsp;);<br>
      &nbsp;  }<br>
<br>
      &nbsp;// Function for Dropdown<br>
      &nbsp;function rfwplugin_settings_dropdown_cb($args){<br>
        &nbsp;&nbsp;$options = get_option( 'rfwplugin_more_settingsAPI' );<br>
      &nbsp;&nbsp;  $select = '';<br>
      &nbsp;&nbsp;  if(isset($select['select'])){<br>
        &nbsp;&nbsp;&nbsp;  $select = esc_html( $select['select']);<br>
      &nbsp;&nbsp;  }<br>
      &nbsp;&nbsp;  // Open select<br>
      &nbsp;&nbsp;  $html = '<\select name="rfwplugin_more_settingsAPI[select]" id="rfwplugin_more_settings_options"/>';<br>
<br>
        &nbsp;&nbsp;$html .= '<\option value="option_one"' . selected($select, 'option_one', false) .  '>' . $args['option_one']  . '</\option>';<br>
      &nbsp;&nbsp;  $html .= '<\option value="option_two"' . selected($select, 'option_two', false) .  '>' . $args['option_two']  . '</\option>';<br>
      &nbsp;&nbsp;  $html .= '<\option value="option_three"' . selected($select, 'option_three', false) .  '>' . $args['option_three']  . '</\option>';<br>
<br>
        &nbsp;&nbsp;$html .= '</\select>';<br>
      &nbsp;&nbsp;  // Close select<br>
      &nbsp;&nbsp;  echo $html;<br>
      &nbsp;}<br>
      </code>
    </div>
    <div class="code-wrapper m-20px-r m-20px-b ">
      <h3>Adding a Radio menu section</h3>

      <code>
        &nbsp;function rfwplugin_more_settingsAPI()<br>
        &nbsp;{<br>
          &nbsp;&nbsp;// If plugin settings don't exist, then create them<br>
          &nbsp;&nbsp;if(!get_option('rfwplugin_more_settingsAPI')){<br>
            &nbsp;&nbsp;&nbsp;add_option('rfwplugin_more_settingsAPI');<br>
          &nbsp;&nbsp;}<br>
          &nbsp;&nbsp;// Define (at least) one section for our fields<br>

          &nbsp;&nbsp;// Radio<br>
          &nbsp;&nbsp;add_settings_field(<br>
          &nbsp;&nbsp;&nbsp;  'rfwplugin_radio',<br>
          &nbsp;&nbsp;&nbsp;  __('Radio','rfwplugin'),<br>
          &nbsp;&nbsp;&nbsp;  'rfwplugin_settings_radio_cb',<br>
          &nbsp;&nbsp;&nbsp;  'rfwplugin-more-settings',<br>
          &nbsp;&nbsp;&nbsp;  'rfwplugin_more_settings_section',<br>
          &nbsp;&nbsp;&nbsp;  [ 'option_one'=>'Radio 1', 'option_two'=>'Radio 2']<br>
          &nbsp;&nbsp;);<br>
      &nbsp;  }<br>
<br>
      &nbsp; // Function for Radio in More Settings section<br>
      &nbsp; function rfwplugin_settings_radio_cb( $args ){<br>
        &nbsp; $options = get_option( 'rfwplugin_more_settingsAPI' );<br>
        &nbsp; $radio = '';<br>
        &nbsp; if(isset($options['radio'])){<br>
          &nbsp; &nbsp; &nbsp; $radio = esc_html( $options['radio']);<br>
        &nbsp; }<br>
        &nbsp; $html = '<\input type="radio" id="rfwplugin_settings_radio_one" name="rfwplugin_more_settingsAPI[radio]" value="1"' . checked(1,$radio,false) . '/>';<br>
        &nbsp; $html .= '<\label for="rfwplugin_more_settings_radio_one">'.$args['option_one'].'</\label>';<br>
<br>
        &nbsp; $html .= '<\input type="radio" id="rfwplugin_settings_radio_two" name="rfwplugin_more_settingsAPI[radio]" value="2"' . checked(2,$radio,false) . '/>';<br>
        &nbsp; $html .= '<\label for="rfwplugin_more_settings_radio_two">'.$args['option_two'].'</\label>';<br>
<br>
      &nbsp;   echo $html;<br>
      &nbsp; }<br>
      </code>
    </div>
  </div>

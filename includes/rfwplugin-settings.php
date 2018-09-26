<?php

/*
NOTE: Using the Settings API
NOTE: use SELECT * FROM wp_options WHERE option_name = "rfwplugin_settingsAPI";

Function to add fields
*/
  function rfwplugin_settingsAPI()
{
  // If plugin settings don't exist, then create them
  if(!get_option('rfwplugin_settingsAPI')){
    add_option('rfwplugin_settingsAPI');
  }
  // Define (at least) one section for our fields
  add_settings_section(
    // Unique ID for the section
    'rfwplugin_settings_section',
    // Section Title
    __('Form Section Title Sample','rfwplugin'),
    // Callback function
    'rfwplugin_settings_section_cb',
    // Admin page to add section
    'rfwplugin-settings'
  );
  add_settings_field(
    // Unique identifier for field
    'rfwplugin_settings_first_name',
    // Field Title
    __( 'Settings Field Title Text', 'rfwplugin'),
    // Callback for field markup
    'rfwplugin_settings_custom_text_callback',
    // Page to go on
    'rfwplugin-settings',
    // Section to go in
    'rfwplugin_settings_section'
  );
  register_setting(
      'rfwplugin_settingsAPI',
      'rfwplugin_settingsAPI'
  );
}
add_action( 'admin_init', 'rfwplugin_settingsAPI' );


/*
NOTE: More Settings API
NOTE: use SELECT * FROM wp_options WHERE option_name = "rfwplugin_more_settingsAPI";

Function to add fields
*/
function rfwplugin_more_settingsAPI()
{
  // If plugin settings don't exist, then create them
  if(!get_option('rfwplugin_more_settingsAPI')){
    add_option('rfwplugin_more_settingsAPI');
  }
  // Define (at least) one section for our fields
  add_settings_section(
    // Unique ID for the section
    'rfwplugin_more_settings_section',
    // Section Title
    __('More Settings Section Title Sample','rfwplugin'),
    // Callback function
    'rfwplugin_settings_section_cb',
    // Admin page to add section
    'rfwplugin-more-settings'
  );
  // Text Box
  add_settings_field(
    // Unique identifier for field
    'rfwplugin_settings_first_name',
    // Field Title
    __( 'Settings Field Title Text', 'rfwplugin'),
    // Callback for field markup
    'rfwplugin_more_settings_custom_text_callback',
    // Page to go on
    'rfwplugin-more-settings',
    // Section to go in
    'rfwplugin_more_settings_section'
  );
  // Textarea Field
  add_settings_field(
    'rfwplugin_textarea',
    __('Text Area','rfwplugin'),
    'rfwplugin_settings_textarea_cb',
    'rfwplugin-more-settings',
    'rfwplugin_more_settings_section'
  );
  // Checkbox
  add_settings_field(
    'rfwplugin_checkbox',
    __('Checkbox','rfwplugin'),
    'rfwplugin_settings_checkbox_cb',
    'rfwplugin-more-settings',
    'rfwplugin_more_settings_section',
    // This parameter is pass in callback function
    [ 'label' => 'Checkbox Label' ]
  );
  // Radio
  add_settings_field(
    'rfwplugin_radio',
    __('Radio','rfwplugin'),
    'rfwplugin_settings_radio_cb',
    'rfwplugin-more-settings',
    'rfwplugin_more_settings_section',
    [ 'option_one'=>'Radio 1', 'option_two'=>'Radio 2']
  );
  // Dropdown
  add_settings_field(
    'rfwplugin_dropdown',
    __('Dropdown','rfwplugin'),
    'rfwplugin_settings_dropdown_cb',
    'rfwplugin-more-settings',
    'rfwplugin_more_settings_section',
    [ 'option_one'=>'Select Option 1', 'option_two'=>'Select Option 2','option_three'=>'Select Option 3']
  );
  register_setting(
    'rfwplugin_more_settingsAPI',
    'rfwplugin_more_settingsAPI'
  );
}
add_action( 'admin_init', 'rfwplugin_more_settingsAPI' );



/*
Functions start here!

NOTE: checked(1,$var,false) - WP Function that checks to see if $var is selected if not comes back false.
NOTE: selected($select, 'option_one', false) = WP Helper Function that checks for select tag.
*/
function rfwplugin_settings_section_cb(){
  esc_html_e( 'Use Inspector to see the forms', 'rfwplugin' );

}
// Function for text box on Settings API section
function rfwplugin_settings_custom_text_callback(){
  $options = get_option( 'rfwplugin_settingsAPI' );
  $first_name = '';
  if( isset( $options[ 'first_name' ] ) ) {
    $first_name = esc_html( $options['first_name'] );
  }
  echo '<input type="text" id="rfwplugin_first_name" name="rfwplugin_settingsAPI[first_name]" value="' . $custom_text . '" />';
}
// Function for text box in More Settings section
function rfwplugin_more_settings_custom_text_callback(){
  $options = get_option( 'rfwplugin_more_settingsAPI' );

$first_name = '';
if( isset( $options[ 'first_name' ] ) ) {
  $first_name = esc_html( $options['first_name'] );
}
echo '<input type="text" id="rfwplugin_first_name" name="rfwplugin_settingsAPI[first_name]" value="' . $first_name . '" />';
}
// Function for Textarea
function rfwplugin_settings_textarea_cb(){
  $options = get_option( 'rfwplugin_more_settingsAPI' );

$textarea = '';
if( isset( $options[ 'textarea' ] ) ) {
  $textarea = esc_html( $options['textarea'] );
}

echo '<textarea id="rfwplugin_textarea" name="rfwplugin_settingsAPI[textarea]" rows="5" cols="50">' . $textarea . '</textarea>';

}
// Function for Checkbox in More Settings section
function rfwplugin_settings_checkbox_cb( $args ) {
  $options = get_option( 'rfwplugin_more_settingsAPI' );
  $checkbox = '';
  if(isset($options['checkbox'])){
    $checkbox = esc_html( $options['checkbox']);
  }

  $html = '<input type="checkbox" id="rfwplugin_settings_checkbox" name="rfwplugin_more_settingsAPI[checkbox]" value="1"' . checked(1, $checkbox, false) . '/>';
  $html .= '&nbsp;';
  $html .= '<label for="rfwplugin_more_settings_checkbox">' . $args['label'] . '</label>';

  echo $html;
}
// Function for Radio in More Settings section
function rfwplugin_settings_radio_cb( $args ){
  $options = get_option( 'rfwplugin_more_settingsAPI' );
  $radio = '';
  if(isset($options['radio'])){
    $radio = esc_html( $options['radio']);
  }
  $html = '<input type="radio" id="rfwplugin_settings_radio_one" name="rfwplugin_more_settingsAPI[radio]" value="1"' . checked(1,$radio,false) . '/>';
  $html .= '<label for="rfwplugin_more_settings_radio_one">'.$args['option_one'].'</label>&nbsp;';

  $html .= '<input type="radio" id="rfwplugin_settings_radio_two" name="rfwplugin_more_settingsAPI[radio]" value="2"' . checked(2,$radio,false) . '/>';
  $html .= '<label for="rfwplugin_more_settings_radio_two">'.$args['option_two'].'</label>&nbsp;';

  echo $html;
}
// Function for Dropdown
function rfwplugin_settings_dropdown_cb($args){
  $options = get_option( 'rfwplugin_more_settingsAPI' );
  $select = '';
  if(isset($select['select'])){
    $select = esc_html( $select['select']);
  }
  // Open select
  $html = '<select name="rfwplugin_more_settingsAPI[select]" id="rfwplugin_more_settings_options"/>';

  $html .= '<option value="option_one"' . selected($select, 'option_one', false) .  '>' . $args['option_one']  . '</option>';
  $html .= '<option value="option_two"' . selected($select, 'option_two', false) .  '>' . $args['option_two']  . '</option>';
  $html .= '<option value="option_three"' . selected($select, 'option_three', false) .  '>' . $args['option_three']  . '</option>';

  $html .= '</select>';
  // Close select
  echo $html;
}

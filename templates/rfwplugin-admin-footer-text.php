<?php
/*
Function to add text on the footer text in admin
*/
function rfwplugin_footer_call($footer) {
  $email = "info@rommelfowler.com";
  return '<span id="footer-thankyou">'. __('Developer: <a href="mailto:'. $email  .' ">Rommel Fowler Wordpress</a>','rfwplugin') . '</span>';
}
add_filter('admin_footer_text','rfwplugin_footer_call',10,1);

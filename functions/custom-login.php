<?php
// Custom login
function enqueue_custom_login_styles() {
  wp_enqueue_style('open-login-styles', get_stylesheet_directory_uri() . '/login/login-style.css');
}
add_action('login_enqueue_scripts', 'enqueue_custom_login_styles');

// Change login logo URL
function custom_login_logo_url() {
  return home_url();
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );

function custom_login_logo_url_title() {
return 'Everyday Industries';
}
add_filter( 'login_headertitle', 'custom_login_logo_url_title' );
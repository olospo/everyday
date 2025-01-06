<?php
// Custom Colour Scheme
// https://wpadmincolors.com 
//
function wpacg_everyday_admin_color_scheme() {
  //Get the theme directory
  $theme_dir = get_stylesheet_directory_uri();

  //Everyday
  wp_admin_css_color( 'everyday', __( 'Everyday' ),
    $theme_dir . '/login/everyday.css',
    array( '#22312d', '#ffffff', '#f55e22' , '#18584a')
  );
}
add_action('admin_init', 'wpacg_everyday_admin_color_scheme');

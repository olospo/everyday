<?php function theme_setup() {
  // Thumbnails
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'logo', 0, 80, false ); // Logo
  add_image_size( 'thumb', 150, 150, true ); // Normal thumbnail size
  add_image_size( 'large-thumb', 300, 300, true ); // Large thumbnail size 
  add_image_size( 'featured-img', 740, 420, true ); // Featured Image size 
  add_image_size( 'background-img', 1400, 700, true ); // Featured Image size 
  // Menus
  register_nav_menu( 'main', 'Main Menu' );
  register_nav_menu( 'footer-1', 'Footer Menu One');
  register_nav_menu( 'footer-2', 'Footer Menu Two');
  register_nav_menu( 'footer-3', 'Footer Menu Three');
  // Page Excerpt support
  add_post_type_support( 'page', 'excerpt' );
  // Title Tag Support
  add_theme_support('title-tag');
  // HTML5 Markup Support
  add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
  // Post Formats Support
  add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video', 'link', 'audio', 'chat'));
  // Editor Styles
  add_editor_style();
  // RSS Feed
  add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'theme_setup' );

// Excerpt Length: Customises the length of post excerpts.
function custom_excerpt_length($length) {
    return 30; // Set the excerpt length to 30 words.
}
add_filter('excerpt_length', 'custom_excerpt_length');

// Read More after Excerpt: Customises the "Read More" link after excerpts.
function custom_excerpt_more($more) {
    return ''; // Removes the "Read More" link from excerpts.
}
add_filter('excerpt_more', 'custom_excerpt_more');

// Remove WordPress Version number
function wpb_remove_version() {
  return '';
}
add_filter('the_generator', 'wpb_remove_version');

// Hide updates for non-admin
function hide_update_nag() {
  if ( ! current_user_can( 'update_core' ) ) {
    remove_action( 'admin_notices', 'update_nag', 3 );
  }
}
add_action('admin_menu','hide_update_nag');

// Change the Footer in WordPress Admin Panel
function remove_footer_admin () {
 
echo 'Website by <a href="https://olospo.co.uk" target="_blank">Olospo</a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');
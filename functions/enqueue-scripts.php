<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');

function theme_enqueue_assets() {
  // Enqueue main stylesheet
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/css/main.css', [], wp_get_theme()->get('Version'));

  // Deregister default jQuery (optional)
  wp_deregister_script('jquery');

  // Register and enqueue jQuery in the footer
  wp_register_script('jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js', [], null, true);
  wp_enqueue_script('jquery');

  // Enqueue other scripts with dependencies and versioning
  wp_enqueue_script('application', get_stylesheet_directory_uri() . '/js/application.min.js', ['jquery'], wp_get_theme()->get('Version'), true);

  wp_enqueue_script('theme-functions', get_stylesheet_directory_uri() . '/js/functions.js', ['jquery'], wp_get_theme()->get('Version'), true);
}

// Disable Emoji Loading: Prevents WordPress from including emoji scripts and styles.
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Disable WP Embed: Prevents WordPress from embedding content automatically.
function my_deregister_scripts() {
    wp_dequeue_script('wp-embed');
}
add_action('wp_footer', 'my_deregister_scripts');
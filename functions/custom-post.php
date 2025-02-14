<?php
function custom_post_type() {
  // Resources Post Type
  $labels = array(
    'name'                => _x( 'Case Study', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Case Study', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'Case Studies', 'text_domain' ),
    'all_items'           => __( 'All Case Studies', 'text_domain' ),
    'view_item'           => __( 'View Case Study', 'text_domain' ),
    'add_new_item'        => __( 'Add Case Study', 'text_domain' ),
    'add_new'             => __( 'Add New', 'text_domain' ),
    'edit_item'           => __( 'Edit Case Study', 'text_domain' ),
    'update_item'         => __( 'Update Case Study', 'text_domain' ),
    'search_items'        => __( 'Search Case Studies', 'text_domain' ),
    'not_found'           => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
  );
  $args = array(
    'label'               => __( 'Case Studies', 'text_domain' ),
    'description'         => __( 'Everyday Case Studies', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom fields', 'excerpt' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 20,
    'menu_icon'           => 'dashicons-portfolio',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'casestudy', $args );
  
  $labels = array(
    'name'                => _x( 'Profiles', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Profile', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'Profiles', 'text_domain' ),
    'all_items'           => __( 'All Profiles', 'text_domain' ),
    'view_item'           => __( 'View Profile', 'text_domain' ),
    'add_new_item'        => __( 'Add Profile', 'text_domain' ),
    'add_new'             => __( 'Add New', 'text_domain' ),
    'edit_item'           => __( 'Edit Profile', 'text_domain' ),
    'update_item'         => __( 'Update Profile', 'text_domain' ),
    'search_items'        => __( 'Search Profiles', 'text_domain' ),
    'not_found'           => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
  );
  $args = array(
    'label'               => __( 'Profiles', 'text_domain' ),
    'description'         => __( 'Everyday Profiles', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom fields', 'excerpt' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 21,
    'menu_icon'           => 'dashicons-admin-users',
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'publicly_queryable'  => false,
    'capability_type'     => 'post',
  );
  register_post_type( 'profile', $args );
  
  $labels = array(
    'name'                => _x( 'Careers', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Career', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'Careers', 'text_domain' ),
    'all_items'           => __( 'All Careers', 'text_domain' ),
    'view_item'           => __( 'View Career', 'text_domain' ),
    'add_new_item'        => __( 'Add Career', 'text_domain' ),
    'add_new'             => __( 'Add New', 'text_domain' ),
    'edit_item'           => __( 'Edit Career', 'text_domain' ),
    'update_item'         => __( 'Update Career', 'text_domain' ),
    'search_items'        => __( 'Search Careers', 'text_domain' ),
    'not_found'           => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
  );
  $args = array(
    'label'               => __( 'Careers', 'text_domain' ),
    'description'         => __( 'Everyday Careers', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom fields', 'excerpt' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 22,
    'menu_icon'           => 'dashicons-groups',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'career', $args );
  
}

function custom_taxonomy() {
  $labels = array(
    'name' => __( 'Specialties' ),
    'singular_name' => __( 'specialty' ),
    'menu_name' => __( 'Specialties' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'specialty', 'casestudy', $args );
}
add_action( 'init', 'custom_taxonomy' );

// Ensure the custom post type registration runs during the appropriate action
add_action( 'init', 'custom_post_type' );

// CPT Menu Item: Adds 'current_page_parent' class to menu items based on post type.
add_filter('nav_menu_css_class', 'current_type_nav_class', 10, 2);
function current_type_nav_class($classes, $item) {
  $post_type = get_query_var('post_type');
  if (in_array($post_type . '-menu-item', $classes)) {
      array_push($classes, 'current_page_parent');
  }
  return $classes;
}

// Include custom post types in search results.
function tg_include_custom_post_types_in_search_results($query) {
  if ($query->is_main_query() && $query->is_search() && !is_admin()) {
      $query->set('post_type', array('post', 'page'));
  }
}
add_action('pre_get_posts', 'tg_include_custom_post_types_in_search_results');
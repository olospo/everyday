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
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom fields', 'excerpt', 'page-attributes' ),
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
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom fields', 'excerpt', 'page-attributes' ),
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
  
  $labels = array(
    'name'               => 'Testimonials',
    'singular_name'      => 'Testimonial',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Testimonial',
    'edit_item'          => 'Edit Testimonial',
    'new_item'           => 'New Testimonial',
    'all_items'          => 'All Testimonials',
    'view_item'          => 'View Testimonial',
    'search_items'       => 'Search Testimonials',
    'not_found'          => 'No testimonials found',
    'not_found_in_trash' => 'No testimonials found in Trash',
    'menu_name'          => 'Testimonials'
  );
  
  $args = array(
    'labels'             => $labels,
    'rewrite'            => array( 'slug' => 'testimonials' ),
    'supports'           => array( 'title', 'editor', 'thumbnail' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'      => 23,
    'menu_icon'          => 'dashicons-format-quote',
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => false,
    
    
    'show_in_rest'       => true, // if you're using the block editor.
  );
  
  register_post_type( 'testimonial', $args );
  
}
add_action( 'init', 'custom_post_type' );

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
  
  $labels = array(
    'name' => __( 'Industries' ),
    'singular_name' => __( 'industry' ),
    'menu_name' => __( 'Industries' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'show_tagcloud' => false, 
    'meta_box_cb' => false,
  );
  register_taxonomy( 'industry', 'casestudy', $args );
}
add_action( 'init', 'custom_taxonomy' );

function hide_industry_taxonomy_description_field() {
  echo '<style>
    .taxonomy-industry .term-description-wrap, .taxonomy-industry .term-parent-wrap {
      display: none !important;
    }
  </style>';
}
add_action('admin_head', 'hide_industry_taxonomy_description_field');

// Add a new column for 'specialty' to the Case Studies admin list.
function add_taxonomy_columns( $columns ) {
    // Insert the new columns after the title column.
    $new_columns = array();
    foreach ( $columns as $key => $value ) {
        $new_columns[ $key ] = $value;
        if ( 'title' === $key ) {
            // Add Specialty column
            $new_columns['specialty'] = __( 'Specialties', 'your-textdomain' );
            // Add Industry column
            $new_columns['industry'] = __( 'Industries', 'your-textdomain' );
        }
    }
    return $new_columns;
}
add_filter( 'manage_edit-casestudy_columns', 'add_taxonomy_columns' );

function populate_taxonomy_columns( $column, $post_id ) {
    switch ( $column ) {
        case 'specialty':
            // Get the specialty taxonomy terms for this post
            $terms = get_the_term_list( $post_id, 'specialty', '', ', ', '' );
            if ( is_string( $terms ) ) {
                echo $terms;
            }
            break;
        case 'industry':
            // Get the industry taxonomy terms for this post
            $terms = get_the_term_list( $post_id, 'industry', '', ', ', '' );
            if ( is_string( $terms ) ) {
                echo $terms;
            } 
            break;
    }
}
add_action( 'manage_casestudy_posts_custom_column', 'populate_taxonomy_columns', 10, 2 );

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

// Show all posts of Case Studies archive
function my_show_all_casestudies( $query ) {
    if ( ! is_admin() && $query->is_main_query() && ( is_post_type_archive( 'casestudy' ) || is_tax( 'specialty' ) ) ) {
        $query->set( 'posts_per_page', -1 );
    }
}
add_action( 'pre_get_posts', 'my_show_all_casestudies' );

// Add custom columns to the Testimonials CPT in the admin listing.
function add_testimonial_columns( $columns ) {
    $new_columns = array();
    $new_columns['cb']            = $columns['cb'];
    $new_columns['title']         = __( 'Title', 'your-textdomain' );
    $new_columns['author_name']   = __( 'Author Name', 'your-textdomain' );
    $new_columns['job_title']     = __( 'Job Title', 'your-textdomain' );
    $new_columns['case_study']    = __( 'Case Study', 'your-textdomain' );
    $new_columns['date']          = $columns['date'];
    return $new_columns;
}
add_filter( 'manage_testimonial_posts_columns', 'add_testimonial_columns' );


// Populate the custom columns with ACF field values.
function custom_testimonial_column( $column, $post_id ) {
    switch ( $column ) {
        case 'quote':
            $quote = get_field( 'quote', $post_id );
            if ( $quote ) {
                // Limit the quote to 15 words for display purposes.
                echo wp_trim_words( $quote, 15, '...' );
            }
            break;

        case 'author_name':
            $author_name = get_field( 'author_name', $post_id );
            echo $author_name ? esc_html( $author_name ) : '';
            break;

        case 'job_title':
            $job_title = get_field( 'job_title', $post_id );
            echo $job_title ? esc_html( $job_title ) : '';
            break;

        case 'case_study':
            // Retrieve the relationship field value.
            $case_studies = get_field( 'case_study', $post_id );
            if ( $case_studies ) {
                $titles = array();
                // Loop through each linked Case Study.
                foreach ( $case_studies as $case_study ) {
                    // Ensure we get the title. The relationship field returns a WP_Post object.
                    $titles[] = get_the_title( $case_study->ID );
                }
                // Display as a comma-separated list.
                echo implode( ', ', $titles );
            }
            break;
    }
}
add_action( 'manage_testimonial_posts_custom_column', 'custom_testimonial_column', 10, 2 );

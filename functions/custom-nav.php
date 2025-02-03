<?php
function custom_nav_active_class( $classes, $item ) {
    // Check if we are on a single Case Study or the Case Studies archive.
    if ( is_singular( 'casestudy' ) || is_post_type_archive( 'casestudy' ) ) {
        // Get the URL of the Case Studies archive.
        $case_studies_archive_url = get_post_type_archive_link( 'casestudy' );
        
        // If the current menu item's URL matches the Case Studies archive URL, mark it as current.
        if ( isset( $item->url ) && $case_studies_archive_url && $item->url == $case_studies_archive_url ) {
            $classes[] = 'current-menu-item';
        }
        
        // Remove any active classes from the blog page (Insights) if it is set as the posts page.
        $blog_page_id = get_option( 'page_for_posts' );
        if ( $blog_page_id ) {
            $blog_page_url = get_permalink( $blog_page_id );
            if ( isset( $item->url ) && $blog_page_url && $item->url == $blog_page_url ) {
                // Remove WordPress's default active classes.
                $classes = array_diff( $classes, array( 'current-menu-item', 'current_page_item', 'current_page_parent', 'current_page_ancestor' ) );
            }
        }
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'custom_nav_active_class', 10, 2 );


// Custom walker for page navigation.
class childNav extends Walker_page {
  public function start_el(&$output, $page, $depth = 0, $args = array(), $current_page = 0) {
    if ($depth) {
        $indent = str_repeat("\t", $depth);
    } else {
        $indent = '';
    }
    extract($args, EXTR_SKIP);
    $css_class = array('page_item');
    if (!empty($current_page)) {
        $_current_page = get_page($current_page);
        $children = get_children('post_parent=' . $page->ID);
        if (count($children) != 0) {
            $css_class[] = 'hasChildren';
        }
        if (isset($_current_page->ancestors) && in_array($page->ID, (array) $_current_page->ancestors)) {
            $css_class[] = 'current_page_ancestor';
        }
        if ($page->ID == $current_page) {
            $css_class[] = 'current_page_item';
        } elseif ($_current_page && $page->ID == $_current_page->post_parent) {
            $css_class[] = 'current_page_parent';
        }
    } elseif ($page->ID == get_option('page_for_posts')) {
        $css_class[] = 'current_page_parent';
    }
    $css_class = implode(' ', apply_filters('page_css_class', $css_class, $page, $depth, $args, $current_page));
    $output .= $indent . '<li class="' . $css_class . '"><a href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a>';
  }
}
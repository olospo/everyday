<?php
// Custom menu classes for specific post types.
function custom_menu_classes($classes, $item, $args) {
    if ($args->theme_location == 'main') {
        if (is_post_type_archive('resource') || is_singular('resource')) {
            if ($item->object_id == get_option('page_for_posts')) {
                $classes = array_diff($classes, array('current_page_parent', 'current-menu-item', 'current_page_ancestor'));
            }
        }
        
        if (is_post_type_archive('resource') || is_singular('resource')) {
            if ($item->object == 'custom' && $item->url == get_post_type_archive_link('resources')) {
                $classes[] = 'current-menu-item';
            }
        }
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'custom_menu_classes', 10, 3);

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
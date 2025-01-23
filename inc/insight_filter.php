<?php
// Get all categories
$categories = get_categories(array(
  'hide_empty' => true, // Only get categories with posts
));

// Get the current category ID (if viewing a category archive) or determine if it's the blog page
$current_category_id = is_category() ? get_queried_object_id() : 0;

// URL for the "All" button (shows all posts or blog page)
$all_posts_url = (get_option('page_for_posts')) ? get_permalink(get_option('page_for_posts')) : home_url();

echo '<ul>';

// "All" button
echo '<li>';
echo '<a href="' . esc_url($all_posts_url) . '" class="link category ' . (!is_category() ? 'current' : '') . '">All</a>';
echo '</li>';

// Loop through the categories and create navigation links
foreach ($categories as $category) {
  $category_link = get_category_link($category->term_id);
  $current_class = ($current_category_id === $category->term_id) ? 'current' : '';
  echo '<li>';
  echo '<a href="' . esc_url($category_link) . '" class="link category ' . esc_attr($current_class) . '">' . esc_html($category->name) . '</a>';
  echo '</li>';
}

echo '</ul>';
?>
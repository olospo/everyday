<?php
function limit_post_revisions_by_type( $revisions, $post ) {
  if( 'post' == $post->post_type ) {
    $revisions = 10;
  }
  
  // Add more conditions for other custom post types as needed
  // if ( 'custom_post_type' == $post->post_type ) {
  //   return 7;
  // }
  
  return $revisions;
}
add_filter( 'wp_revisions_to_keep', 'limit_post_revisions_by_type', 10, 2 );
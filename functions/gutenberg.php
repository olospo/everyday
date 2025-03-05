<?php
function my_enable_block_editor_for_specific_post_types( $use_block_editor, $post ) {
    // Make sure we have a post object.
    if ( ! $post ) {
        return $use_block_editor;
    }

    // Define the post types for which you want to enable the block editor.
    $allowed_post_types = array( 'post' ); // Replace 'case_studies' with your CPT slug if different

    // Return true (enable Gutenberg) only if the post type is in the allowed list.
    if ( in_array( $post->post_type, $allowed_post_types, true ) ) {
        return true;
    }

    // Disable the block editor for all other post types.
    return false;
}
add_filter( 'use_block_editor_for_post', 'my_enable_block_editor_for_specific_post_types', 10, 2 );
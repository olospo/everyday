<?php
function my_acf_post_object_result( $text, $post, $field ) {
    // Only modify the display for the "testimonials" field.
    if( $field['name'] === 'testimonials' ) {
        // Retrieve the "case_study" relationship field (it may return an array or a single object).
        $case_studies = get_field('case_study', $post->ID);
        $case_study_titles = '';

        if ( $case_studies ) {
            if ( is_array( $case_studies ) ) {
                $titles = array();
                foreach( $case_studies as $cs ) {
                    $titles[] = get_the_title( $cs->ID );
                }
                $case_study_titles = implode( ', ', $titles );
            } else {
                $case_study_titles = get_the_title( $case_studies->ID );
            }
        }

        // Get a thumbnail for the testimonial post.
        $thumb = get_the_post_thumbnail( $post->ID, array(50,50) );
        // Build a custom display string.
        $text = $thumb . ' ' . get_the_title( $post->ID );
        if ( $case_study_titles ) {
            $text .= ' - ' . $case_study_titles;
        }
    }
    return $text;
}
add_filter('acf/fields/post_object/result', 'my_acf_post_object_result', 10, 3);
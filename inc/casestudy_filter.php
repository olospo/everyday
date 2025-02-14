<?php
// Get all specialties (only those with posts)
$specialties = get_terms( array(
    'taxonomy'   => 'specialty',
    'hide_empty' => true,
) );

// Get the current term ID if viewing a specialty archive
$current_term_id = is_tax( 'specialty' ) ? get_queried_object_id() : 0;

// URL for the "All" button - linking to the archive page for the Case Studies CPT
$all_posts_url = get_post_type_archive_link( 'casestudy' );

echo '<ul>';

// "All" button
echo '<li>';
echo '<a href="' . esc_url( $all_posts_url ) . '" class="link specialty ' . ( ! is_tax( 'specialty' ) ? 'current' : '' ) . '">All</a>';
echo '</li>';

// Loop through the specialties and create navigation links
if ( ! empty( $specialties ) && ! is_wp_error( $specialties ) ) {
    foreach ( $specialties as $specialty ) {
        $specialty_link = get_term_link( $specialty );
        $current_class  = ( $current_term_id === $specialty->term_id ) ? 'current' : '';
        echo '<li>';
        echo '<a href="' . esc_url( $specialty_link ) . '" class="link specialty ' . esc_attr( $current_class ) . '">' . esc_html( $specialty->name ) . '</a>';
        echo '</li>';
    }
}

echo '</ul>';
?>
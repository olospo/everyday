<?php /* News Archive */


get_header(); ?>

<section class="hero single">
  <div class="container">
    <div class="content ten columns">
      <h1>Digital product design</h1>
    </div>
  </div>
</section>

<section class="archive">
  <div class="container">
    <div class="filters twelve columns">
      <div class="filter-container">
        <?php get_template_part('inc/casestudy_filter'); ?>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="twelve columns">
      <div class="work-listing">
        <?php 
        // Query for Case Studies.
        $args = array(
          'post_type'      => 'casestudy',
          'posts_per_page' => -1,
          'orderby'        => 'menu_order',
          'order'          => 'ASC'
        );
        // If filtering by specialty taxonomy, add tax_query.
        if ( is_tax('specialty') ) {
          $current_term = get_queried_object();
          $args['tax_query'] = array(
            array(
              'taxonomy' => 'specialty',
              'field'    => 'term_id',
              'terms'    => $current_term->term_id,
            ),
          );
        }
        $case_study_query = new WP_Query( $args );

        // Query for Testimonials with display_on_case_studies_page set to true.
        $testimonial_args = array(
          'post_type'      => 'testimonial',
          'posts_per_page' => -1,
          'orderby'        => 'rand', // Random order (change if needed)
          'meta_query'     => array(
            array(
              'key'     => 'display_on_case_studies_page',
              'value'   => '1', // '1' for true (ACF True/False field stores '1' for true)
              'compare' => '=', // Ensure the value matches '1'
            ),
          ),
        );
        $testimonial_query = new WP_Query( $testimonial_args );
        $testimonials = $testimonial_query->posts;
        $testimonial_count = count( $testimonials );
        $testimonial_index = 0;
        $displayed_testimonials = array(); // Array to track displayed testimonials

        // Loop through the Case Studies.
        $counter = 0;
        if ( $case_study_query->have_posts() ) :
          while ( $case_study_query->have_posts() ) : $case_study_query->the_post();
            $counter++;
            get_template_part('inc/work'); // Output the Case Study template

            // After every third Case Study, output a Testimonial (if available and not displayed before)
            if ( $counter % 2 == 0 && $testimonial_count > 0 ) {
              // Find a testimonial that has not been displayed before
              while ($testimonial_index < $testimonial_count && in_array($testimonial_index, $displayed_testimonials)) {
                $testimonial_index++; // Skip already displayed testimonials
              }

              // If there are still available testimonials, display one
              if ($testimonial_index < $testimonial_count) {
                $testimonial_post = $testimonials[ $testimonial_index ];
                setup_postdata( $testimonial_post );
                // Output the testimonial template
                get_template_part('inc/work_quote', null, array('testimonial' => $testimonial_post));
                wp_reset_postdata();
                $displayed_testimonials[] = $testimonial_index; // Mark the testimonial as displayed
                $testimonial_index++;
              }
            }
          endwhile;
        endif;
        wp_reset_postdata();
        ?>
      </div>
    </div>
  </div>
</section>


<?php get_template_part('inc/collaborate'); ?>

<?php get_footer(); ?>
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
        // Are we on a specialty archive?
        if ( is_tax('specialty') ) {
          $term_id = get_queried_object_id();
          // Query only Case Studies in this specialty
          $case_q = new WP_Query(array(
            'post_type'      => 'casestudy',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
            'tax_query'      => array(array(
              'taxonomy' => 'specialty',
              'field'    => 'term_id',
              'terms'    => $term_id,
            )),
          ));

          while ( $case_q->have_posts() ) {
            $case_q->the_post();
            // 1) Output the Case Study
            get_template_part('inc/work');
            // 2) Pull Testimonials for this Case Study
            $testimonials = get_posts(array(
              'post_type'      => 'testimonial',
              'posts_per_page' => 1,
              'orderby'        => 'menu_order',
              'order'          => 'DESC',
              'meta_query'     => array(array(
                'key'     => 'case_study',           // ACF relationship field
                'value'   => '"' . get_the_ID() . '"',
                'compare' => 'LIKE',
              )),
            ));

            // 3) Render each, first inline, rest full-width
            if ( ! empty( $testimonials ) ) {
              foreach ( $testimonials as $index => $testi ) {
                setup_postdata( $testi );
                if ( $index === 0 ) {
                  // first testimonial: inline size
                  get_template_part('inc/work_quote', null, array(
                    'testimonial' => $testi
                  ));
                } else {
                  // subsequent testimonials: full-width
                  get_template_part('inc/work_quote_large', null, array(
                    'testimonial' => $testi
                  ));
                }
                wp_reset_postdata();
              }
            }
          }
          wp_reset_postdata();
        } else {
          // Not filtered → fall back to your Flexible Content loop
          $rows = get_field('archive_items','option') ?: array();
          foreach ( $rows as $row ) {
            // determine layout
            $layout = isset( $row['acf_fc_layout'] ) ? $row['acf_fc_layout'] : '';
            // pick the post
            if ( $layout === 'casestudy' ) {
              $item = isset( $row['case_study_item'] ) ? $row['case_study_item'] : null;
            }
            elseif ( $layout === 'testimonial' ) {
              $item = isset( $row['testimonial_item'] ) ? $row['testimonial_item'] : null;
            }
            else {
              continue;
            }
            if ( ! $item ) {
              continue;
            }
            global $post;
            $post = $item;
            setup_postdata( $post );
            if ( $layout === 'casestudy' ) {
              get_template_part('inc/work');
            } else {
              // testimonial: respect the ACF quote_size
              $size = isset( $row['quote_size'] ) ? $row['quote_size'] : 'normal';
              if ( $size === 'large' ) {
                get_template_part('inc/work_quote_large', null, array(
                  'testimonial' => $post
                ));
              } else {
                get_template_part('inc/work_quote', null, array(
                  'testimonial' => $post
                ));
              }
            }
            wp_reset_postdata();
          }
        }
        ?>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('inc/collaborate'); ?>

<?php get_footer(); ?>
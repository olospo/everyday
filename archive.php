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
        // Base query args.
        $args = array(
          'post_type'      => 'casestudy',
          'posts_per_page' => -1,
          'orderby'        => 'menu_order',
          'order'          => 'ASC'
        );
        
        // If filtering by specialty taxonomy, add a tax_query.
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
        
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) :
          while ( $the_query->have_posts() ) : $the_query->the_post(); 
            get_template_part('inc/work');
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
<?php /* Industries */

$term = get_queried_object(); // Get the current term object

if (isset($term->term_id)) {
  $title = get_field('intro_title', 'term_' . $term->term_id);
  $content = get_field('intro_content', 'term_' . $term->term_id);
  $selected_case_studies = get_field('case_studies', 'term_' . $term->term_id);
}

get_header(); ?>

<section class="services hero">
  <div class="container">
    <div class="content eight columns">
      <h1><?php single_cat_title(); ?></h1>
    </div>
  </div>  
</section>

<section class="service intro">
  <div class="container">
    <div class="eight columns">
      <h2><?php echo $title; ?></h2>
      <?php echo $content; ?>
    </div>
  </div>
</section>

<?php if( have_rows('client_logos', 'term_' . $term->term_id) ): ?>
<section class="service client-logos">
  <div class="container">
    <h2><?php echo get_field('client_title', 'term_' . $term->term_id); ?></h2>
    <div class="logos">
    <?php while( have_rows('client_logos', 'term_' . $term->term_id) ): the_row();
      $logo_image = get_sub_field('logo'); // Now an array with keys like 'url' and 'alt'
      $logo_alt = !empty($logo_image['alt']) ? $logo_image['alt'] : 'Logo';
    ?>
    <div class="logo">
      <img width="auto" height="auto" src="<?php echo esc_url($logo_image['url']); ?>" alt="<?php echo esc_attr($logo_alt); ?>" />
    </div>
    
    <?php endwhile; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php 
$args = array(
  'post_type'      => 'testimonial',
  'posts_per_page' => -1, // Show all testimonials.
  'meta_query'     => array(
    array(
      'key'     => 'linked_industry', 
      'value'   => '"' . $term->term_id . '"', // Match serialized array values
      'compare' => 'LIKE'
    )
  )
);

$testimonial_query = new WP_Query( $args );

// If no testimonials are found, use 2 random testimonials as a fallback.
if ( ! $testimonial_query->have_posts() ) {
  $fallback_args = array(
    'post_type'      => 'testimonial',
    'posts_per_page' => 2,
    'orderby'        => 'rand'
  );
  $testimonial_query = new WP_Query( $fallback_args );
}

if ( $testimonial_query->have_posts() ) : ?>
  <section class="services reputation">
    <div class="container">
      <h2>Our reputation is driven by results</h2>
      <div class="testimonial twelve columns">
        <div class="slider">
          <?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>
            <div class="slide quote">
              <blockquote>
                <p><?php the_content(); ?></p>
                <cite><?php the_title(); ?></cite><br />
                <span><?php the_field('author_title'); ?></span>
              </blockquote>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif;
wp_reset_postdata();
?>


<?php if ($selected_case_studies) : ?>
<section class="service products">
  <div class="container">
    <h2>Case Studies</h2>
    <div class="twelve columns">
      <div class="news_listing">
      <?php 
        // Loop through the selected posts (if multiple are selected)
        foreach ($selected_case_studies as $post) :
          setup_postdata($post);
          get_template_part('inc/work');
        endforeach;
        wp_reset_postdata();
      ?>
      </div>
      <div class="twelve columns">
        <?php numeric_posts_nav(); ?>
      </div>
    </div>
  </div>
</section>
<?php endif; // End check for selected posts ?>

<section class="service insights">
  <div class="container">
    <h2>Dive deeper into our thinking</h2>
    <div class="twelve columns">
    <?php
      // Get the insight_topic field (assuming it's attached to the current taxonomy term).
      $insight_topics = get_field('insight_topic', get_queried_object());

      // Set up default query arguments.
      $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'post_status'    => 'publish'
      );

      // If the insight_topic field has been set, modify the query to filter by these categories.
      if ( $insight_topics ) {
        $cat_ids = array();
        // Loop through each selected topic. Depending on your ACF settings this may be an object or an ID.
        foreach ( $insight_topics as $topic ) {
          if ( is_object( $topic ) ) {
            $cat_ids[] = $topic->term_id;
          } else {
            $cat_ids[] = $topic;
          }
        }
        // Add a tax_query to restrict posts to the selected categories.
        $args['tax_query'] = array(
          array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $cat_ids,
          ),
        );
      }

      // Run the custom query.
      $insight_query = new WP_Query( $args );

      // If no posts are found for the selected categories, revert back to the default query.
      if ( ! $insight_query->have_posts() ) {
        $args = array(
          'post_type'      => 'post',
          'posts_per_page' => 3,
          'post_status'    => 'publish'
        );
        $insight_query = new WP_Query( $args );
      }

      // Loop through the posts.
      if ( $insight_query->have_posts() ) :
        while ( $insight_query->have_posts() ) : $insight_query->the_post();
    ?>
          <article class="insight large twelve columns">
            <div class="six columns">
              <a href="<?php the_permalink(); ?>">
                <div class="zoom">
                  <div class="image" style="background: url('<?php the_post_thumbnail_url( 'featured-img' ); ?>') center center no-repeat; background-size: cover;"></div>
                </div>
              </a>
            </div>
            <div class="content six columns">
              <?php 
                // Display primary category if available via Yoast SEO.
                $primary_category_id = get_post_meta( get_the_ID(), '_yoast_wpseo_primary_category', true );
                if ( $primary_category_id ) {
                  $primary_category = get_term( $primary_category_id, 'category' );
                  if ( $primary_category && ! is_wp_error( $primary_category ) ) {
                    echo '<span class="cat"><a href="' . esc_url( get_category_link( $primary_category->term_id ) ) . '">' . esc_html( $primary_category->name ) . '</a></span>';
                  }
                }
              ?>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php the_excerpt(); ?>
              <span class="date"><?php the_time( "F j, Y" ); ?></span>
            </div>
          </article>
    <?php
        endwhile;
      else :
        echo '<p>No insights found.</p>';
      endif;
      wp_reset_postdata();
    ?>
    </div>
  </div>  
</section>


<?php get_template_part('inc/collaborate'); ?>

<?php get_footer();  ?>

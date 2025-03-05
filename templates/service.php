<?php /* Template Name: Individual Service */

// Header
$header_title = get_field('header_title');
$header_subtitle = get_field('header_sub-title');
$header_img = get_field('header_illustration');
// Intro
$intro_title = get_field('intro_title');
$intro_content = get_field('intro_content');
// Approach 
$approach_title = get_field('approach_title');
// Testimonials
$testimonial_title = get_field('testimonial_title');
$testimonials = get_field('testimonials');
  
get_header(); while ( have_posts() ) : the_post(); ?>
  
<section class="service hero">
  <div class="container" <?php if ($header_img) : ?>style="background: #22312D url('<?php echo $header_img; ?>') right top no-repeat;"<?php endif; ?>>
    <div class="content eight columns">
      <p><?php echo $header_title; ?></p>
      <h1><?php echo $header_subtitle; ?></h1>
    </div>
  </div>  
</section>

<section class="service mobile header">
  <div class="container">
    <div class="content eight columns">
      <p><?php echo $header_title; ?></p>
      <h1><?php echo $header_subtitle; ?></h1>
    </div>
  </div>
</section>

<section class="service intro">
  <div class="container">
    <div class="eight columns">
      <h2><?php echo $intro_title; ?></h2>
      <?php echo $intro_content; ?>
    </div>
  </div>
</section>

<section class="service approach">
  <div class="container">
    <div class="twelve columns">
      <h2><?php echo $approach_title; ?></h2>
    </div>
  </div>
  <div class="container">
    <div class="content seven columns">
    <?php if( have_rows('approach') ): while( have_rows('approach') ): the_row(); ?>
      <article>
        <h3><?php the_sub_field('title'); ?></h3>
        <p><?php the_sub_field('content'); ?></p>
      </article>
    <?php endwhile; endif; ?>      
    </div>
    <div class="bg five columns"></div>
  </div>
</section>

<section class="services reputation">
  <div class="container">
  <h2><?php echo $testimonial_title; ?></h2>
  <?php if ( $testimonials ) { if ( ! is_array( $testimonials ) ) { $testimonials = array( $testimonials ); } ?>
  <div class="slider testimonial twelve columns">
    <?php foreach ( $testimonials as $post ) : if ( is_numeric( $post ) ) { $post = get_post( $post ); } setup_postdata( $post ); ?>
    <div class="slide">
      <div class="slide quote">
        <?php get_template_part('inc/quote'); ?>
      </div>
    </div>
    <?php endforeach; wp_reset_postdata();?>
  </div>
  <?php } ?>
  </div>
</section>

<?php $selected_case_studies = get_field('case_studies');
if ($selected_case_studies) : ?>
<section class="service products">
  <div class="container">
    <h2>Products we’ve helped launch</h2>
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

<section class="service offering">
  <div class="container">
    <h2>How we can help</h2>
    <?php if( have_rows('service',29) ): ?>
      <?php while( have_rows('service',29) ): the_row(); 
        $service_image = get_sub_field('service_image',29);
        $service_title = get_sub_field('service_title',29);
        $service_description = get_sub_field('service_description',29);
        $page_link = get_sub_field('page_link',29);
        if( $service_image ): $image_url = $service_image['url']; ?>
        <div class="service twelve columns">
          <div class="six columns">
            <a href="<?php echo esc_url($page_link['url']); ?>">
              <div class="zoom">
                <div class="image" style="background: url('<?php echo esc_url($image_url); ?>') center center no-repeat; background-size: cover;"></div>
              </div>
            </a>
          </div>
          <div class="content six columns">
          <?php if( $service_title ): ?>
            <h2><a href="<?php echo esc_url($page_link['url']); ?>"><?php echo esc_html($service_title); ?></a></h2>
          <?php endif; ?>
          <?php if( $service_description ): ?>
            <p><?php echo esc_html($service_description); ?></p>
          <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>
  
<?php get_template_part('inc/collaborate'); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
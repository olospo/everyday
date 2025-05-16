<?php /* Template Name: Home */
// Home
$header_title = get_field('header_title');
$header_button_one = get_field('header_button');
$header_button_two = get_field('header_button_two');
// Focus 
$focus_title = get_field('focus_title');
$focus_button = get_field('focus_button');
// Testimonials 
$testimonial_title = get_field('testimonial_title');
$testimonials = get_field('testimonials');
// Work
$work_group = get_field('work');
$work_title = get_field('work_title');
$work_button = $work_group['button_text'];

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<!-- Header -->
<section class="home hero">
  <div class="container">
    <div class="content six columns">
      <h1><?php echo $header_title; ?></h1>
      <?php // Check if the first button data exists and display it
      if ($header_button_one) :
        $button_url = esc_url($header_button_one['url']);
        $button_title = esc_html($header_button_one['title']);
      ?>
        <a href="<?php echo $button_url; ?>" class="button accent service"><?php echo $button_title; ?></a>
      <?php endif; ?>
      <?php if ($header_button_two) :
        $button_two_url = esc_url($header_button_two['url']);
        $button_two_title = esc_html($header_button_two['title']);
      ?>
        <a href="<?php echo $button_two_url; ?>" class="button accent work"><?php echo $button_two_title; ?></a>
      <?php endif; ?>
    </div>
    <div class="sunrise">
      <svg width="839px" height="502px" viewBox="0 0 839 502" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <title>sun-bg</title>
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="sun-bg" transform="translate(0.000000, -0.000000)" fill="#F4F2E3" fill-rule="nonzero">
                  <polygon id="Path" points="419.5 0 425.673 432.06 507.199 10.9688 437.749 435.114 591.066 43.3956 449.027 441.089 667.434 95.863 459.015 449.724 732.966 166.079 467.275 460.642 784.799 250.974 473.448 473.365 820.666 346.837 477.263 487.337 839 449.479 478.554 501.947 360.447 501.947 0 449.479 361.737 487.337 18.3341 346.837 365.552 473.365 54.2012 250.974 371.725 460.642 106.034 166.079 379.986 449.724 171.566 95.863 389.973 441.089 247.934 43.3956 401.251 435.114 331.801 10.9688 413.327 432.06"></polygon>
              </g>
          </g>
      </svg>
    </div>
  </div>  
</section>

<!-- Logos -->
<section class="home carousel-container">
  <div class="carousel">
    <div class="carousel-track">
      <?php if( have_rows('logo_carousel') ): ?>
        <?php while( have_rows('logo_carousel') ): the_row();
          $logo_image = get_sub_field('logo_image');
          $logo_alt = isset($logo_image['alt']) ? $logo_image['alt'] : ''; // Get alt text
        ?>
        <div class="carousel-item">
          <img width="auto" height="auto" src="<?php echo esc_url($logo_image['url']); ?>" alt="<?php echo esc_attr($logo_alt); ?>" />
        </div>
        <?php endwhile; ?>
        <!-- Duplicate the logos to create the loop effect -->
        <?php while( have_rows('logo_carousel') ): the_row();
          $logo_image = get_sub_field('logo_image');
          $logo_alt = isset($logo_image['alt']) ? $logo_image['alt'] : ''; // Get alt text
        ?>
        <div class="carousel-item">
          <img width="auto" height="auto" src="<?php echo esc_url($logo_image['url']); ?>" alt="<?php echo esc_attr($logo_alt); ?>" />
        </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Services -->
<section class="home services">
  <div class="container">
    <div class="five columns">
      <h2><?php echo $focus_title; ?></h2>
      <?php // Check if the first button data exists and display it
      if ($focus_button) :
        $button_url = esc_url($focus_button['url']);
        $button_title = esc_html($focus_button['title']);
      ?>
        <a href="<?php echo $button_url; ?>" class="button accent service"><?php echo $button_title; ?></a>
      <?php endif; ?>
    </div>
    <div class="focus four columns offset-by-three">
      <img src="<?php bloginfo('template_directory'); ?>/img/bolt-mobile.png" class="bolt-mobile" />
      <h3>Our Focus</h3>
      <ul>
        <?php
        $specialties = get_terms( array(
          'taxonomy'   => 'industry',
          'hide_empty' => true,
          'orderby' => 'term_order',
        ) );
        
        if ( ! empty( $specialties ) && ! is_wp_error( $specialties ) ) {
          foreach ( $specialties as $specialty ) {
            $specialty_link = get_term_link( $specialty );
            // Echo each <li> without any space or newline
            echo '<li><a href="' . esc_url( $specialty_link ) . '">' . esc_html( $specialty->name ) . '</a></li>';
          }
        }
        ?>
      </ul>
  </div>  
</section>

<!-- Testimonials -->
<section class="home reputation">
  <div class="container">
    <h2><?php echo $testimonial_title; ?></h2>
    <?php if ( $testimonials ) { if ( ! is_array( $testimonials ) ) { $testimonials = array( $testimonials ); } ?>
    <div class="slider testimonial twelve columns">
      <?php foreach ( $testimonials as $post ) : if ( is_numeric( $post ) ) { $post = get_post( $post ); } setup_postdata( $post ); ?>
      <div class="slide">
        <div class="image one-half column">
          <div class="content">
          <?php // Get the related Case Study(s) from the testimonial.
          $related_case_studies = get_field('case_study', $post->ID);
          $case_study = false;
          if ( $related_case_studies ) {
            if ( is_array( $related_case_studies ) ) {
              $case_study = reset( $related_case_studies );
            } else {
              $case_study = $related_case_studies;
            }
          }
          if ( $case_study ) {
            // Get the 'logo' image field from the related Case Study.
            $logo = get_field('logo', $case_study->ID);
              if ( $logo ) {
                echo '<a href="' . get_permalink( $case_study->ID ) . '"><img src="' . esc_url( $logo['url'] ) . '" alt="' . esc_attr( $logo['alt'] ) . '" /></a>';
              } 
          } ?>
          </div>
        </div>
        <div class="quote one-half column">
          <?php get_template_part('inc/quote'); ?>
        </div>
      </div>
      <?php endforeach; wp_reset_postdata();?>
    </div>
    <?php } ?>
  </div>  
</section>

<!-- Work -->
<section class="home work">
  <div class="container">
    <h2><?php echo $work_title; ?></h2>
    <?php if ( $work_group && isset( $work_group['selected_work'] ) ) {
      $selected_work = $work_group['selected_work'];
      // If only one post is selected, ensure it's an array.
      if ( ! is_array( $selected_work ) ) {
        $selected_work = array( $selected_work );
      }
      if ( ! empty( $selected_work ) ) : ?>
      <div class="work-wrapper twelve columns">
        <div class="work-list six columns">
          <?php 
          $counter = 0;
          // Loop through the selected case studies.
          foreach ( $selected_work as $post ) : 
            setup_postdata( $post );
            $counter++;
          ?>
          <article class="work-item <?php echo ( $counter === 1 ? 'active' : '' ); ?>" data-image="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" data-link="<?php the_permalink(); ?>">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo get_field( 'short_description' ); ?></p>
            <?php $industries = get_the_terms( get_the_ID(), 'industry' );
              if ( $industries && ! is_wp_error( $industries ) ) {
                foreach ( $industries as $industry ) {
                  echo '<span class="cat"><a href="' . esc_url( get_term_link( $industry->term_id, 'industry' ) ) . '">' . esc_html( $industry->name ) . '</a></span>';
              }
            } ?>
          </article>
          <?php endforeach; wp_reset_postdata(); ?>
        </div>
        <div class="work-image six columns">
          <?php 
          $first = reset( $selected_work ); 
          setup_postdata( $first );
          // Get the thumbnail ID
          $thumbnail_id = get_post_thumbnail_id( $first->ID );
          // Get the alt text from the image metadata
          $alt_text = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
          ?>
          <a href="<?php echo get_permalink( $first->ID ); ?>">
            <img src="<?php echo get_the_post_thumbnail_url( $first->ID, 'full' ); ?>" alt="<?php echo esc_attr( $alt_text ); ?>" id="displayed-image">
          </a>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    <?php endif; } ?> 
    <div class="all-wrapper twelve columns">
      <a href="<?php echo get_site_url(); ?>/casestudy/" class="button accent"><?php echo $work_button; ?></a>
    </div>
  </div>  
</section>

<!-- Insights -->
<section class="home insights">
  <div class="container">
    <h2>UX and product design insights</h2>
    <div class="twelve columns">
    <?php $args = array(
      'post_type' => 'post',
      'posts_per_page' => 3,
      'post_status' => 'publish',
    ); query_posts($args); ?>
      <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
      <article class="insight large twelve columns">
        <div class="six columns">
          <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
            <div class="zoom">
              <div class="image" style="background: url('<?php the_post_thumbnail_url( 'featured-img' ); ?>') center center no-repeat; background-size: cover;"></div>
            </div>
          </a>
        </div>
        <div class="content six columns">
          
          <div class="align">
          <?php 
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
          <div class="meta"><span class="author"><?php echo get_field('authors'); ?></span> &#x25AA; <span class="date"><?php the_time("F j, Y"); ?></span></div>
          </div>
        </div>
      </article>
      <?php endwhile; else : ?>
    <!-- No posts found -->
    <?php endif; wp_reset_query(); ?>
    </div>
  </div>  
</section>

<?php get_template_part('inc/collaborate'); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
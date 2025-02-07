<?php /* Template Name: Home */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<section class="home hero">
  <div class="container">
    <div class="content six columns">
      <h1>Digital product design that transforms how people live, work, and connect.</h1>
      <a href="#" class="button accent">View our services</a> <a href="#" class="button accent">See our work</a>
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

<section class="home carousel-container">
  <div class="carousel">
    <div class="carousel-track">
      <!-- Carousel items -->
      <div class="carousel-item">
        <img width="auto" height="auto" src="<?php bloginfo('template_directory'); ?>/img/zola-logo.png" alt="" />
      </div>
      <div class="carousel-item">
        <img width="auto" height="auto" src="<?php bloginfo('template_directory'); ?>/img/goop-logo.png" alt="" />
      </div>
      <div class="carousel-item">
        <img width="auto" height="auto" src="<?php bloginfo('template_directory'); ?>/img/butcherbox-logo.png" alt="" />
      </div>
      <div class="carousel-item">
        <img width="auto" height="auto" src="<?php bloginfo('template_directory'); ?>/img/blueapron-logo.png" alt="" />
      </div>
      <div class="carousel-item">
        <img width="auto" height="auto" src="<?php bloginfo('template_directory'); ?>/img/1stdibs-logo.png" alt="" />
      </div>
      <div class="carousel-item">
        <img width="auto" height="auto" src="<?php bloginfo('template_directory'); ?>/img/ninja-logo.png" alt="" />
      </div>
      <div class="carousel-item">
        <img width="auto" height="auto" src="<?php bloginfo('template_directory'); ?>/img/primer-logo.png" alt="" />
      </div>
      <!-- Duplicate -->
      <div class="carousel-item">
        <img width="auto" height="auto" src="<?php bloginfo('template_directory'); ?>/img/zola-logo.png" alt="" />
      </div>
      <div class="carousel-item">
        <img width="auto" height="auto" src="<?php bloginfo('template_directory'); ?>/img/goop-logo.png" alt="" />
      </div>
      <div class="carousel-item">
        <img width="auto" height="auto" src="<?php bloginfo('template_directory'); ?>/img/butcherbox-logo.png" alt="" />
      </div>
      <div class="carousel-item">
        <img width="auto" height="auto" src="<?php bloginfo('template_directory'); ?>/img/blueapron-logo.png" alt="" />
      </div>
      <div class="carousel-item">
        <img width="auto" height="auto" src="<?php bloginfo('template_directory'); ?>/img/1stdibs-logo.png" alt="" />
      </div>
      <div class="carousel-item">
        <img width="auto" height="auto" src="<?php bloginfo('template_directory'); ?>/img/ninja-logo.png" alt="" />
      </div>
      <div class="carousel-item">
        <img width="auto" height="auto" src="<?php bloginfo('template_directory'); ?>/img/primer-logo.png" alt="" />
      </div>
    </div>
  </div>
</section>

<section class="home services">
  <div class="container">
    <div class="five columns">
      <h2>Our expertise is in UX design for customer-focused products.</h2>
      <a href="#" class="button accent">See our work</a>
    </div>
    <div class="focus five columns offset-by-two">
      <h3>Our Focus</h3>
      <ul>
        <li><a href="#">Consumer health & wellness</a></li>
        <li><a href="#">Learning & play</a></li>
        <li><a href="#">Beauty & personal care</a></li>
        <li><a href="#">Food & nutrition</a></li>
        <li><a href="#">Marketplaces & platforms</a></li>
      </ul>
  </div>  
</section>

<section class="home reputation">
  <div class="container">
    <h2>Our reputation is driven by results</h2>
    <div class="testimonial twelve columns">
      <div class="image one-half column">

      </div>
      <div class="quote one-half column">
        <blockquote>
          <p>Working with Everyday Industries has been a game changer for Alloy Health. From absorbing and analyzing our complex user flow, to navigating our upgrade needs, Everyday has been a delight to work with and brought meaningful change and value to our entire user experience.</p>
          <cite>Anne Fulenwider</cite><br />
          <span>Co-founder at Alloy Health</span>
        </blockquote>
      </div>
    </div>
  </div>  
</section>

<section class="home work">
  <div class="container">
    <h2>Dive into our work</h2>
    <?php
    $args = array(
      'post_type' => 'casestudy',
      'posts_per_page' => 5,
      'post_status' => 'publish',
    );
    $casestudies = new WP_Query($args);
    ?>
    <div class="work-wrapper twelve columns">
      <div class="work-list six columns">
        <?php if ($casestudies->have_posts()) : $counter = 0; ?>
          <?php while ($casestudies->have_posts()) : $casestudies->the_post(); $counter++; ?>
            <article class="work-item <?php echo $counter === 1 ? 'active' : ''; ?>" data-image="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" data-link="<?php the_permalink(); ?>">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p><?php echo get_field('short_description'); ?></p>
              <span class="cat"><a href="#">Consumer health & wellness</a></span>
            </article>
          <?php endwhile; ?>
        <?php else : ?>
          <p>No case studies found.</p>
        <?php endif; wp_reset_postdata(); ?>
      </div>
      <div class="work-image six columns">
      <?php if ($casestudies->have_posts()) : $casestudies->rewind_posts(); $casestudies->the_post(); ?>
        <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="Default Image" id="displayed-image"></a>
        <?php endif; ?>
      </div>
    </div>
    <div class="all-wrapper twelve columns">
      <a href="#" class="button accent">View all work</a>
    </div>
  </div>  
</section>

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
      <article class="insight twelve columns">
        <a href="<?php the_permalink(); ?>">
        <div class="image six columns" style="background: url('<?php the_post_thumbnail_url( 'featured-img' ); ?>') center center no-repeat; background-size: cover;"></div>
        </a>
        <div class="content six columns">
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
          <span class="date"><?php the_time("F j, Y"); ?></span>
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
<?php /* Single Post */
get_header();

$headerimg = get_field('header_image');

while ( have_posts() ) : the_post(); ?>

<section class="hero casestudy" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php echo $headerimg; ?>') center center no-repeat; background-size: cover;">
</section>

<section class="post news">
  <div class="container">
    <div class="content seven columns">
      <h1><?php the_title(); ?></h1>
      <?php
      $primary_category_id = get_post_meta(get_the_ID(), '_yoast_wpseo_primary_category', true); // Get the primary category
      
      if ($primary_category_id) { // If a primary category is set, fetch it
        $primary_category = get_term($primary_category_id, 'category');
        if ($primary_category && !is_wp_error($primary_category)) {
          echo '<span class="cat"><a href="' . esc_url(get_category_link($primary_category->term_id)) . '">' . esc_html($primary_category->name) . '</a></span>';
        }
      }
      ?>
      <p class="date"><?php the_time("F j, Y"); ?></p>
      <?php the_content(); ?>
    </div>
    <!-- Primary sticky aside -->
    <aside class="ux-insights five columns primary sticky">
      <h3>UX insights in your inbox</h3>
      <p>Get our newsletter</p>
      <form action="#" method="POST" class="newsletter-form">
        <input type="email" name="email" placeholder="Your email address here" required>
        <button type="submit"></button>
        <p class="privacy-text">By signing up, you agree to our <a href="#">Privacy Policy</a>*.</p>
      </form>
    </aside>
    
    <!-- Secondary sticky aside; initially hidden -->
    <aside class="ux-insights five columns secondary sticky" style="display: none;">
      <h3>Interesting problems make interesting products</h3>
      <a href="<?php echo get_site_url(); ?>/casestudy/" class="button accent">View our case studies</a>
    </aside>
  </div>
</section>

<section class="home insights">
  <div class="container">
    <h2>Read more</h2>
    <div class="twelve columns">
      <?php
      $current_id = get_the_ID();
      $cat_ids = wp_list_pluck(get_the_category($current_id), 'term_id');
      $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'post_status'    => 'publish',
        'post__not_in'   => array($current_id),
      );
      if($cat_ids) {
        $args['tax_query'] = array(array(
          'taxonomy' => 'category',
          'field'    => 'term_id',
          'terms'    => $cat_ids,
        ));
      }
      $q = new WP_Query($args);
      if($q->have_posts()):
        while($q->have_posts()): $q->the_post();
      ?>
          <article class="insight large twelve columns">
            <div class="six columns">
              <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
                <div class="zoom">
                  <div class="image" style="background: url('<?php echo esc_url(get_the_post_thumbnail_url(null, 'featured-img')); ?>') center center no-repeat; background-size: cover;"></div>
                </div>
              </a>
            </div>
            <div class="content six columns">
              <?php 
              $primary_cat_id = get_post_meta(get_the_ID(), '_yoast_wpseo_primary_category', true);
              if($primary_cat_id) {
                $primary_cat = get_term($primary_cat_id, 'category');
                if($primary_cat && !is_wp_error($primary_cat)) {
                  echo '<span class="cat"><a href="' . esc_url(get_category_link($primary_cat->term_id)) . '">' . esc_html($primary_cat->name) . '</a></span>';
                }
              }
              ?>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php the_excerpt(); ?>
              <span class="date"><?php the_time("F j, Y"); ?></span>
            </div>
          </article>
      <?php endwhile; else: ?>
        <p>No insights found.</p>
      <?php endif; wp_reset_postdata(); ?>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
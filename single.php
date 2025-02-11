<?php /* Single Post */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="hero casestudy" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php the_post_thumbnail_url( 'full' ); ?>') center center no-repeat; background-size: cover;">
</section>

<section class="post news">
  <div class="container flex">
    <div class="content eight columns">
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
      <p><span class="date"><?php the_time("F j, Y"); ?></span></p>
      <?php the_content(); ?>
    </div>
    <aside class="four columns">
      <h3>UX insights in your inbox</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </aside>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
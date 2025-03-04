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
    <aside class="ux-insights five columns">
      <h3>UX insights in your inbox</h3>
      <p>Get our newsletter</p>
      <form action="#" method="POST" class="newsletter-form">
        <input type="email" name="email" placeholder="Your email address here" required><button type="submit"></button>
        <p class="privacy-text">By signing up, you agree to our <a href="#">Privacy Policy</a>*.</p>
      </form>
    </aside>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
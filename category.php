<?php /* Category */
get_header(); ?>

<section class="hero single">
  <div class="container">
    <div class="content ten columns">
      <h1><?php single_cat_title(); ?></h1>
    </div>
  </div>  
</section>

<section class="archive">
  <div class="container">
    <div class="filters twelve columns">
      <div class="filter-container">
        <?php get_template_part('inc/insight_filter'); ?>
      </div>
    </div>
  </div>
  <?php if ( have_posts() ) : the_post(); ?>
    <!-- Featured article -->
    <div class="container">
      <div class="news_listing twelve columns">
        <?php get_template_part('inc/article_large'); ?>
      </div>
    </div>
    <!-- Newsletter CTA -->
    <?php get_template_part('inc/newsletter_cta'); ?>
    <!-- Container for the rest of the posts + pagination -->
    <div class="container">
      <div class="news_listing twelve columns">
        <?php $post_index = 0;
          // Loop over everything after the first post
          while ( have_posts() ) : the_post();
            $post_index++;
            // After exactly 3 normal posts, show the insight CTA.
            if ( $post_index === 3 ) {
              // Render the 3rd normal article
              get_template_part('inc/article');
              // Then inject the insight CTA
              get_template_part('inc/insight_cta');
            // Immediately after that CTA (i.e. on the 4th iteration), render a featured.
            //    Then, every time 4 normal articles have appeared since the last featured, render another featured.
            } elseif ( $post_index > 3 && ( ($post_index - 4) % 5 === 0 ) ) {
              get_template_part('inc/article_large');
            } else {
              get_template_part('inc/article');
            }
          endwhile;
        ?>
      </div>
      <div class="twelve columns">
        <?php numeric_posts_nav(); ?>
      </div>
    </div>
    <?php wp_reset_query(); ?>
  <?php else : ?>
    <div class="container">
      <!-- No posts found -->
    </div>
  <?php endif; ?>
</section>

<?php get_footer(); ?>
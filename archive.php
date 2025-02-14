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
      <div class="news_listing">
          <?php if ( have_posts() ) : while (have_posts()) : the_post();  ?>
            <?php get_template_part('inc/work'); ?>
          <?php endwhile; ?>
        </div>
        <div class="twelve columns">
        <?php numeric_posts_nav(); ?>
        </div>
        <?php else : endif; wp_reset_query(); ?>
    </div>
  </div>
</section>

<?php get_template_part('inc/collaborate'); ?>

<?php get_footer();  ?>

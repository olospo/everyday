<?php /* News Archive */
get_header(); ?>

<section class="hero single">
  <div class="container">
    <div class="content ten columns">
      <h1>Want to work together?</h1>
    </div>
  </div>
</section>

<section class="archive">
  <div class="container">
    <div class="twelve columns">
      <div class="news_listing">
          <?php if ( have_posts() ) : while (have_posts()) : the_post();  ?>
            <?php get_template_part('inc/career'); ?>
          <?php endwhile; ?>
        </div>
        <div class="twelve columns">
        <?php numeric_posts_nav(); ?>
        </div>
        <?php else : ?>
        <div class="twelve columns">
         <h3>We don’t have any open roles now,  but don’t let that stop you.</h3>
         <p>We may not have any open positions right now, but we're always excited to connect with exceptional talent who share our vision. Send us a message to careers@everydayindustries.com.</p>
        </div>
        <?php endif; wp_reset_query(); ?>
    </div>
  </div>
</section>

<?php get_footer();  ?>

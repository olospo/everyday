<?php /* Single Post */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="hero single">
  <div class="container">
    <div class="content ten columns">
      <h1>Want to work together?</h1>
    </div>
  </div>
</section>

<section class="post">
  <div class="container">
    <div class="content seven columns">
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
    </div>
    <aside class="bg five columns"></aside>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
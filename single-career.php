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

<section class="post news">
  <div class="container flex">
    <div class="content eight columns">
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
    </div>
    <aside class="four columns">
      
    </aside>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
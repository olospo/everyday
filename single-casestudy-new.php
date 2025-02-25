<?php
/*
* Template Name: Case Study
* Template Post Type: casestudy
*/
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="hero single">
  <div class="container">
    <div class="content ten columns">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
</section>

<section class="post news">
  <div class="container flex">
    <div class="content eight columns">
      <p><?php echo get_field('short_description'); ?></p>
    </div>
    <aside class="four columns">
      
    </aside>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
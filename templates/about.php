<?php /* Template Name: About */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<section class="home hero">
  <div class="container">
    <div class="content six columns">
      <h1>Since 2012,  we’ve helped big and small teams design products that impact people’s lives.</h1>
    </div>
  </div>  
</section>

<?php get_template_part('inc/collaborate'); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
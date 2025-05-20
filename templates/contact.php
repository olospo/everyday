<?php /* Template Name: Contact */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<section class="contact hero single">
  <div class="container">
    <div class="content ten columns">
      <h1>Let's connect</h1>
    </div>
  </div>  
</section>

<section class="contact form">
  <div class="container">
    <div class="content one-half column">
      <?php the_content(); ?>
    </div>
    <div class="bg one-half column"></div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
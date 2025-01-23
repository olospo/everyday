<?php /* Single Post */
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
<?php /* Template Name: Home */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<section class="home hero">
  <div class="container">
    <div class="content six columns">
      <h1>Digital product design that transforms how people live, work, and connect.</h1>
      <a href="#" class="orange button">View our services</a> <a href="#" class="orange button">See our work</a>
    </div>
  </div>  
</section>

<!-- <section class="home brands">
  <div class="container">
    
  </div>  
</section> -->

<!-- <section class="home services">
  <div class="container">
    <h2>Our expertise is in UX design for customer-focused products.</h2>
    <a href="#" class="button orange">See our work</a>
  </div>  
</section> -->

<!-- <section class="home reputation">
  <div class="container">
    <h2>Our reputation is driven by results</h2>
  </div>  
</section> -->

<section class="home work">
  <div class="container">
    <h2>Dive into our work</h2>
    <?php $args = array(
      'post_type' => 'casestudy',
      'posts_per_page' => 5,
      'post_status' => 'publish',
    ); query_posts($args); ?>
      <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
      <article>
        <?php the_title(); ?>
      </article>
      <?php endwhile; else : ?>
    <!-- No posts found -->
    <?php endif; wp_reset_query(); ?>
    <a href="#" class="orange button">View all work</a>
  </div>  
</section>

<section class="home insights">
  <div class="container">
    <h2>UX and product design insights</h2>
    <?php $args = array(
      'post_type' => 'post',
      'posts_per_page' => 3,
      'post_status' => 'publish',
    ); query_posts($args); ?>
      <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
      <div class="row">
      <?php get_template_part('inc/article'); ?>
      </div>
      <?php endwhile; else : ?>
    <!-- No posts found -->
    <?php endif; wp_reset_query(); ?>
  </div>  
</section>

<?php get_template_part('inc/collaborate'); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
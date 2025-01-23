<?php /* Template Name: About */
  
$teamHeading = get_field('heading');

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<section class="home hero">
  <div class="container">
    <div class="content six columns">
      <h1>Since 2012,  we’ve helped big and small teams design products that impact people’s lives.</h1>
    </div>
  </div>  
</section>

<section class="home team">
  <div class="container">
    <div class="content twelve columns">
      <h2><?php echo $teamHeading; ?></h2>

      <?php if (have_rows('team_members')) { // Flexible Content ?>
        <?php while (have_rows('team_members')) { the_row(); ?>
          <?php get_template_part( 'inc/profile' ); ?>
        <?php } ?>
      <?php } ?>
    </div>
  </div>  
</section>

<?php get_template_part('inc/collaborate'); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
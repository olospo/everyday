<?php /* Template Name: About */
  
$teamHeading = get_field('heading');

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<section class="about hero">
  <div class="container">
    <div class="content seven columns">
      <h1>Since 2012, we’ve helped big and small teams design products that impact people’s lives.</h1>
    </div>
    <div class="cutoff twelve columns">
      <img src="<?php bloginfo('template_directory'); ?>/img/everyday-cut.svg">
    </div>
  </div>  
</section>

<section class="about office">
  <div class="container">
    <div class="twelve columns">
      <img src="<?php bloginfo('template_directory'); ?>/img/office.jpg" alt="Everyday Office">
      <span>Our office in Atlanta</span>
    </div>
  </div>
</section>

<section class="about what">
  <div class="container">
    <div class="ten columns offset-by-one">
    <h2>What we do</h2>
    <p>We’re based in Atlanta, but we partner with clients across the globe.  We work with product teams to help them learn about their customers, create concepts, test and refine those concepts, then deliver final designs.</p>
    </div>
  </div>
</section>

<section class="about team">
  <div class="container">
    <div class="content twelve columns">
      <h2><?php echo $teamHeading; ?></h2>
      <?php if (have_rows('team_members')) { // Flexible Content ?>
        <?php while (have_rows('team_members')) { the_row(); ?>
          <?php get_template_part( 'inc/profile' ); ?>
        <?php } ?>
      <?php } ?>
      <article class="joinus">
        <div class="image three columns">
          <img src="<?php bloginfo('template_directory'); ?>/img/joinus-bg.jpg" >
        </div>
        <div class="content nine columns">
          <h3>Join us</h3>
          <p>Interested in joining our team?</p>
          <a href="<?php echo get_site_url(); ?>/careers">View roles</a>
        </div>
      </article>
    </div>
  </div>  
</section>

<?php get_template_part('inc/collaborate'); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
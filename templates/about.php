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

<section class="about reasons">
  <div class="container">
    <div class="statement one-half column">
      <div class="content">
        <p>How Everyday is different.</p>
      </div>
    </div>
    <div class="reasons one-half column">
      <div class="content">
        <h3>Founder-led teams</h3>
        <p>At Everyday, you work directly with experienced designers our co-founders lead dedicated, senior-level teams to ensure project success.</p>
        <h3>Collaborative innovation</h3>
        <p>We bring fresh perspectives, you bring deep product knowledge—together, we create solutions.</p>
        <h3>Quick wins, Real results</h3>
        <p>We pinpoint your highest-impact opportunities and help you make design changes that drive immediate value.</p>
      </div>
    </div>
  </div>
</section>

<section class="about why">
  <div class="container">
    <div class="content twelve columns">
      <h3>Our why</h3>
      <p>We believe the best ideas emerge when diverse minds come together, challenge each other, and listen generously. We are driven by curiosity and a desire to make digital products that matter.</p>
    </div>
  </div>
</section>

<?php get_template_part('inc/collaborate'); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
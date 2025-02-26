<?php /* Template Name: About */
  
// Heading
$headingTitle = get_field('heading_title');
$headingImg = get_field('heading_image');
// Office
$officePhoto = get_field('office_photo');
$officeCaption = get_field('office_photo_caption');
// What
$whatTitle = get_field('what_title');
$whatContent = get_field('what_content');
// Who
$teamHeading = get_field('heading');
// How
$howTitle = get_field('how_title');
$howContent = get_field('how_content');
// Why
$whyTitle = get_field('why_title');
$whyContent = get_field('why_content');

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<section class="about hero">
  <div class="container">
    <div class="content seven columns">
      <h1><?php echo $headingTitle; ?></h1>
    </div>
    <div class="cutoff twelve columns">
      <img src="<?php echo $headingImg; ?>" alt="Everyday" />
    </div>
  </div>  
</section>

<section class="about office">
  <div class="container">
    <div class="twelve columns">
      <img src="<?php echo esc_url($officePhoto['url']); ?>" alt="<?php echo esc_attr($officePhoto['alt']); ?>" />
      <?php if( $officeCaption ): ?>
        <span><?php echo $officeCaption; ?></span>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="about what">
  <div class="container">
    <div class="ten columns offset-by-one">
    <h2><?php echo $whatTitle; ?></h2>
    <?php echo $whatContent; ?>
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
          <a href="<?php echo get_site_url(); ?>/career">View roles</a>
        </div>
      </article>
    </div>
  </div>  
</section>

<section class="about reasons">
  <div class="container">
    <div class="statement one-half column">
      <div class="content">
        <p><?php echo $howTitle; ?></p>
      </div>
    </div>
    <div class="reasons one-half column">
      <div class="content">
        <?php echo $howContent; ?>
      </div>
    </div>
  </div>
</section>

<section class="about why">
  <div class="container">
    <div class="content twelve columns">
      <h3><?php echo $whyTitle; ?></h3>
      <?php echo $whyContent; ?>
    </div>
  </div>
</section>

<?php get_template_part('inc/collaborate'); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
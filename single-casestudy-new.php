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

<section class="casestudy intro">
  <div class="container">
    <div class="eight columns">
      <h2><?php the_field( 'short_description' ); ?></h2>
      <?php the_field( 'project_intro' ); ?>
    </div>
    <aside class="four columns">
      <ul>
        <li>2023-present</li>
        <?php $industries = get_the_terms(get_the_ID(), 'industry');
        if ($industries && !is_wp_error($industries)) {
          foreach ($industries as $industry) {
            echo '<li>' . esc_html($industry->name) . '</li>';
          }
        } ?>
        <?php $types = get_the_terms(get_the_ID(), 'specialty');
        if ($types && !is_wp_error($types)) {
          foreach ($types as $type) {
            echo '<li>' . esc_html($type->name) . '</li>';
          }
        } ?>
    </aside>
  </div>
</section>

<section class="service offering">
  <div class="container">
    <h2>How we can help</h2>
    <div class="service twelve columns">
      <div class="image six columns" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/new-product.png');"></div>
      <div class="content six columns">
        <h3><a href="<?php echo get_site_url(); ?>/what-we-do/customer-research-services/">New product design</a></h3>
        <p>Turn ideas into beautifully designed products users love. From initial concept through to final implementation, we design experiences that solve real user needs and drive business growth.
        </p>
      </div>
    </div>
    <div class="service twelve columns">
      <div class="image six columns" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/product-redesigns.png');"></div>
      <div class="content six columns">
        <h3><a href="<?php echo get_site_url(); ?>/what-we-do/product-evaluations/">Product Redesigns</a><h3>
        <p>Transform your existing product into an exceptional experience. Whether modernizing your interface or completely reimagining your product, we help you design products that drive results.</p>
      </div>
    </div>
    <div class="service twelve columns">
      <div class="image six columns" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/ux-eval.png');"></div>
      <div class="content six columns">
        <h3><a href="<?php echo get_site_url(); ?>/what-we-do/user-experience-design-services/">UX evaluations</a><h3>
        <p>Get expert insight into your product experience. Our comprehensive evaluation identifies opportunities to improve usability, engagement, and conversion through design.</p>
      </div>
    </div>
  </div>
</section>
  
<?php get_template_part('inc/collaborate'); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
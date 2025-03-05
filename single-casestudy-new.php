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
    <?php if( have_rows('service',29) ): 
      while( have_rows('service',29) ): the_row();
      $img   = get_sub_field('service_image',29);
      $title = get_sub_field('service_title',29);
      $desc  = get_sub_field('service_description',29);
      $link  = get_sub_field('page_link',29);
      $curr  = get_permalink();
      if( $link && ((isset($link['ID']) && $link['ID'] == get_the_ID()) || (!isset($link['ID']) && $link['url'] == $curr)) ) continue;
      if( $img ): $url = $img['url']; ?>
      <div class="service twelve columns">
        <div class="six columns">
          <a href="<?php echo esc_url($link['url']); ?>">
            <div class="zoom">
              <div class="image" style="background: url('<?php echo esc_url($url); ?>') center center no-repeat; background-size: cover;"></div>
            </div>
          </a>
        </div>
        <div class="content six columns">
        <?php if($title): ?><h2><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($title); ?></a></h2><?php endif; ?>
        <?php if($desc): ?><p><?php echo esc_html($desc); ?></p><?php endif; ?>
        </div>
      </div>
    <?php endif; endwhile; endif; ?>
  </div>
</section>
  
<?php get_template_part('inc/collaborate'); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
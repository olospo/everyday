<?php 
get_header();

$header_color = get_field('header_color');
$style_attr = $header_color ? 'style="background-color:' . esc_attr($header_color) . ';"' : '';

while ( have_posts() ) : the_post(); ?>

<section class="hero single" <?php echo $style_attr; ?>>
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
      <aside class="mobile-details four columns">
        <?php get_template_part( 'casestudy/project-details'); // Project Details ?>
      </aside>
      <?php the_field( 'project_intro' ); ?>
    </div>
    <aside class="details four columns">
      <ul>
        <?php $date = get_field( 'project_date' ); ?>
        <?php if ( $date ) { ?>
          <li><?php echo $date; ?></li>
        <?php } ?>
        <?php $industries = get_the_terms(get_the_ID(), 'industry'); if ($industries && !is_wp_error($industries)) {
          foreach ($industries as $industry) { echo '<li>' . esc_html($industry->name) . '</li>'; }
        } ?>
        <?php $types = get_the_terms(get_the_ID(), 'specialty');
        if ($types && !is_wp_error($types)) { foreach ($types as $type) {
          echo '<li>' . esc_html($type->name) . '</li>'; }
        } ?>
        <?php $link = get_field( 'site_url' ); if ( $link ) { ?>
          <li><a href="<?php echo $link; ?>">View Site</a></li>
        <?php } ?>
      </ul>
    </aside>
  </div>
</section>

<section class="casestudy content">
<?php if ( have_rows( 'content_sections' ) ): ?>
  <?php while ( have_rows( 'content_sections' ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'copy_w_header' ) : ?>
      <?php get_template_part( 'casestudy/copy-block'); // Copy Block ?>
    <?php elseif ( get_row_layout() == 'quote' ) : ?>
      <?php get_template_part( 'casestudy/quote-block'); // Quote Block ?>
    <?php elseif ( get_row_layout() == 'images' ) : ?>
     <?php
       // in your parent loop:
       $bg_color_raw = get_sub_field( 'background_color' );    // raw hex or empty
       $bg_color     = $bg_color_raw ?: '#f2f2e3';            // fallback
       $text_style   = get_sub_field( 'text_color' ) === 'light' ? 'light' : 'dark';
       $text_class   = 'text-' . $text_style;
     
       // pass them through:
       get_template_part(
         'casestudy/images',
         null,
         [
           'bg_color'   => $bg_color,
           'text_class' => $text_class,
         ]
       );
     ?>
    <?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>
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
<?php /* Template Name: Individual Service */

// Header
$header_title = get_field('header_title');
$header_subtitle = get_field('header_sub-title');
$header_img = get_field('header_illustration');
// Intro
$intro_title = get_field('intro_title');
$intro_content = get_field('intro_content');
// Approach 
$approach_title = get_field('approach_title');
// Testimonials
$testimonial_title = get_field('testimonial_title');
$testimonials = get_field('testimonials');
  
get_header(); while ( have_posts() ) : the_post(); ?>
  
<section class="service hero">
  <div class="container" <?php if ($header_img) : ?>style="background: #22312D url('<?php echo $header_img; ?>') right top no-repeat;"<?php endif; ?>>
    <div class="content eight columns">
      <p><?php echo $header_title; ?></p>
      <h1><?php echo $header_subtitle; ?></h1>
    </div>
  </div>  
</section>

<section class="service mobile header">
  <div class="container">
    <div class="content eight columns">
      <p><?php echo $header_title; ?></p>
      <h1><?php echo $header_subtitle; ?></h1>
    </div>
  </div>
</section>

<section class="service intro">
  <div class="container">
    <div class="eight columns">
      <h2><?php echo $intro_title; ?></h2>
      <?php echo $intro_content; ?>
    </div>
  </div>
</section>

<section class="service approach">
  <div class="container">
    <div class="twelve columns">
      <h2><?php echo $approach_title; ?></h2>
    </div>
  </div>
  <div class="container">
    <div class="content seven columns">
    <?php if( have_rows('approach') ): while( have_rows('approach') ): the_row(); ?>
      <article>
        <h3><?php the_sub_field('title'); ?></h3>
        <p><?php the_sub_field('content'); ?></p>
      </article>
    <?php endwhile; endif; ?>      
    </div>
    <div class="bg five columns"></div>
  </div>
</section>

<section class="services reputation">
  <div class="container">
  <h2><?php echo $testimonial_title; ?></h2>
  <?php if ( $testimonials ) { if ( ! is_array( $testimonials ) ) { $testimonials = array( $testimonials ); } ?>
  <div class="slider testimonial twelve columns">
    <?php foreach ( $testimonials as $post ) : if ( is_numeric( $post ) ) { $post = get_post( $post ); } setup_postdata( $post ); ?>
    <div class="slide">
      <div class="slide quote">
        <?php get_template_part('inc/quote'); ?>
      </div>
    </div>
    <?php endforeach; wp_reset_postdata();?>
  </div>
  <?php } ?>
  </div>
</section>

<?php $selected_case_studies = get_field('case_studies');
if ($selected_case_studies) : ?>
<section class="service products">
  <div class="container">
    <h2>Products we’ve helped launch</h2>
    <div class="twelve columns">
      <div class="work-listing">
      <?php 
        // Loop through the selected posts (if multiple are selected)
        foreach ($selected_case_studies as $post) :
          setup_postdata($post);
          get_template_part('inc/work');
        endforeach;
        wp_reset_postdata();
      ?>
      </div>
    </div>
  </div>
</section>
<?php endif; // End check for selected posts ?>

<section class="service insights">
  <div class="container">
    <h2>Dive deeper into our thinking</h2>
    <div class="twelve columns">
      <?php
      $insight_topics = get_field('insight_topic', get_queried_object());
      $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'post_status'    => 'publish'
      );
      if ($insight_topics) {
        $cat_ids = array_map(function($t){ return is_object($t) ? $t->term_id : $t; }, $insight_topics);
        $args['tax_query'] = array(
          array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $cat_ids,
          )
        );
      }
      $insight_query = new WP_Query($args);
      if ( ! $insight_query->have_posts() ) {
        $insight_query = new WP_Query(array(
          'post_type'      => 'post',
          'posts_per_page' => 3,
          'post_status'    => 'publish'
        ));
      }
      if ( $insight_query->have_posts() ):
        while ( $insight_query->have_posts() ): $insight_query->the_post();
          $thumb = get_the_post_thumbnail_url(get_the_ID(), 'featured-img');
      ?>
      <article class="insight large twelve columns">
        <div class="six columns">
          <a href="<?php the_permalink(); ?>">
            <div class="zoom">
              <div class="image" style="background: url('<?php echo esc_url($thumb); ?>') center center no-repeat; background-size: cover;"></div>
            </div>
          </a>
        </div>
        <div class="content six columns">
          <?php
          $primary_cat_id = get_post_meta(get_the_ID(), '_yoast_wpseo_primary_category', true);
          if ($primary_cat_id) {
            $primary_cat = get_term($primary_cat_id, 'category');
            if ($primary_cat && ! is_wp_error($primary_cat)) {
              echo '<span class="cat"><a href="' . esc_url(get_category_link($primary_cat->term_id)) . '">' . esc_html($primary_cat->name) . '</a></span>';
            }
          }
          ?>
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <?php the_excerpt(); ?>
          <span class="date"><?php the_time("F j, Y"); ?></span>
        </div>
      </article>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
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
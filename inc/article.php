<article class="insight small six columns">
  <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
    <div class="zoom">
      <div class="image" style="background: url('<?php the_post_thumbnail_url( 'featured-img' ); ?>') center center no-repeat; background-size: cover;"></div>
    </div>
  </a>
  <div class="content">
    <?php $primary_category_id = get_post_meta(get_the_ID(), '_yoast_wpseo_primary_category', true);
    if ($primary_category_id) { // If a primary category is set, fetch it
      $primary_category = get_term($primary_category_id, 'category');
      if ($primary_category && !is_wp_error($primary_category)) {
        echo '<span class="cat"><a href="' . esc_url(get_category_link($primary_category->term_id)) . '">' . esc_html($primary_category->name) . '</a></span>';
      }
    }
    ?>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php // the_excerpt(); ?>
    <span class="author"><?php echo get_field('authors'); ?></span> &#x25AA; <span class="date"><?php the_time("F j, Y"); ?></span>
  </div>
</article>
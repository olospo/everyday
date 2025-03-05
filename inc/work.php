<article class="work six columns">
  <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
    <div class="zoom">
    <div class="image" style="background: url('<?php the_post_thumbnail_url( 'featured-img' ); ?>') center center no-repeat; background-size: cover;"></div>
    </div>
  </a>
  <div class="content six columns">
    <?php
    $industries = get_the_terms(get_the_ID(), 'industry');
    if ($industries && !is_wp_error($industries)) {
        foreach ($industries as $industry) {
            echo '<span class="cat"><a href="' . esc_url(get_term_link($industry->term_id, 'industry')) . '">' . esc_html($industry->name) . '</a></span>';
        }
    }
    ?>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    
    <p><?php echo get_field('short_description'); ?></p>
  </div>
</article>
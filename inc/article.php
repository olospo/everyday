<article class="insight twelve columns">
  <a href="<?php the_permalink(); ?>">
  <div class="image six columns">
    <img src="<?php the_post_thumbnail_url( 'featured-img' ); ?>" />
  </div>
  </a>
  <div class="content six columns">
    <span class="cat">Consumer health & wellness</span>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    
    <?php the_excerpt(); ?>
    <span class="date"><?php the_time("F j, Y"); ?></span>
  </div>
</article>
<article class="work six columns">
  <a href="<?php the_permalink(); ?>">
  <div class="image">
    <img src="<?php the_post_thumbnail_url( 'featured-img' ); ?>" alt ="<?php the_title(); ?>"/>
  </div>
  </a>
  <div class="content six columns">
    <span class="cat">Consumer health & wellness</span>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    
    <p><?php echo get_field('short_description'); ?></p>
  </div>
</article>
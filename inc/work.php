<article class="work six columns">
  <a href="<?php the_permalink(); ?>">
  <div class="image" style="background: url('<?php the_post_thumbnail_url( 'featured-img' ); ?>') center center no-repeat; background-size: cover;"></div>
  </a>
  <div class="content six columns">
    <span class="cat"><a href="#">Consumer health & wellness</a></span>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    
    <p><?php echo get_field('short_description'); ?></p>
  </div>
</article>
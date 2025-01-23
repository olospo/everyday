<?php
$post = get_sub_field('profile'); 
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post); ?>
<article class="profile">
  <div class="image three columns">
    <img src="<?php the_post_thumbnail_url( 'large-thumb' ); ?>" alt="<?php the_title(); ?>" ?>
  </div>
  <div class="content nine columns">
    <h4><?php the_title(); ?></h4>
    <?php the_content(); ?>
  </div>
</article>
<?php wp_reset_postdata(); ?>
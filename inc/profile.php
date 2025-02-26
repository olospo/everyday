<?php
$post = get_sub_field('profile'); 
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post); ?>
<article class="profile">
  <div class="image three columns">
    <img src="<?php the_post_thumbnail_url( 'large-thumb' ); ?>" alt="<?php the_title(); ?>">
  </div>
  <div class="content nine columns">
    <h3><?php the_title(); ?></h3>
    <p><?php echo get_field('job_title'); ?></p>
    <div class="profile-content">
      <?php the_content(); ?>
    </div>
    <a class="learn-more">Learn More</a>
  </div>
</article>
<?php wp_reset_postdata(); ?>

<img src="">
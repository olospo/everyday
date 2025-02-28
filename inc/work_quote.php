<?php 
// Make sure we're in the testimonial CPT loop.
$testimonial_id = get_the_ID();

// Retrieve fields explicitly from the testimonial post.
$name = get_field('author_name', $testimonial_id);
$job_title = get_field('job_title', $testimonial_id);

?>
<article class="work_quote six columns">
  <div class="content six columns">
    <blockquote>
      <?php the_content(); ?>
      <cite><?php echo esc_html($name); ?></cite><br />
      <span><?php echo esc_html($job_title); ?></span>
    </blockquote>
  </div>
</article>
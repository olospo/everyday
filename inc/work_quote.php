<?php
// Check if the testimonial post was passed in.
if ( isset($args['testimonial']) && is_object($args['testimonial']) ) {
    $testimonial = $args['testimonial'];
    $testimonial_id = $testimonial->ID;
    $name = get_field('author_name', $testimonial_id);
    $job_title = get_field('job_title', $testimonial_id);
    // You can also use $testimonial->post_content for content.
} else {
    // Fallback if needed.
    $name = '';
    $job_title = '';
}
?>

<article class="work_quote six columns">
  <div class="content six columns">
    <blockquote>
      <?php echo apply_filters('the_content', $testimonial->post_content); ?>
      <cite><?php echo esc_html($name); ?></cite><br />
      <span><?php echo esc_html($job_title); ?></span>
    </blockquote>
  </div>
</article>

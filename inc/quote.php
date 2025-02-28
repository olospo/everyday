<?php 
$name = get_field('author_name');
$job_title = get_field('job_title');
$case_study = get_field('case_study');
$industry = get_field('linked_industry');
?>
<blockquote>
  <?php the_content(); ?>
  <cite><?php echo $name; ?></cite><br />
  <span><?php echo $job_title; ?></span>
</blockquote>
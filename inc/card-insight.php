<?php
/**
 * Template part for displaying Case Study cards with excerpts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Newfangled_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card', 'card-' . get_post_type() ); ?>>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" data-equalizer-watch>

	<?php $featured_img_url = get_the_post_thumbnail_url(); ?>

	<div data-bg="url(<?php echo $featured_img_url; ?>)" class="img-wrapper pre-lazyload" style="background-image: url(<?php echo $featured_img_url; ?>);">

	</div>

	<header class="entry-header">
		<h4 class="entry-category">
			<?php $cats = get_the_category($id); ?>
			<?php echo $cats[0]->name; ?>
		</h4>
		<h3 class="entry-title"><?php the_title(); ?></h3>
		<p class="author-info">by <?php the_field( 'authors' ); ?> on <?php echo apply_filters( 'the_date', get_the_date(), get_option( 'date_format' ), '', '' ); ?></p>

	</header>

	<div class="entry-summary">

		<div class="large-excerpt">
			<?php the_excerpt(); ?>
		</div>

		<p class="small-excerpt">
			<?php
$excerpt = get_the_excerpt();

$excerpt = substr($excerpt, 0, 140);
$result = substr($excerpt, 0, strrpos($excerpt, ' '));
echo $result;
?>...
		</p>

		<div class="read-more">
			Read More <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
			<rect y="6" width="16" height="2" fill="#38AD93"/>
			<path d="M10.5 1.5L16 7L10.5 12.5" stroke="#38AD93" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</div>

  </div>

</a>
</article>

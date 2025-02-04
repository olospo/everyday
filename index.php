<?php /* Archive */
get_header(); ?>

<section class="hero single">
  <div class="container">
    <div class="content ten columns">
      <h1>Insights</h1>
    </div>
  </div>  
</section>

<section class="archive">
  <div class="container">
    <div class="filters twelve columns">
      <?php get_template_part('inc/insight_filter'); ?>
    </div>
  </div>
  <?php if ( have_posts() ) : the_post(); ?>
    <!-- Container for featured insight -->
    <div class="container">
      <div class="news_listing twelve columns">
        <article class="insight twelve columns">
          <a href="<?php the_permalink(); ?>">
            <div class="image six columns">
              <img src="<?php the_post_thumbnail_url( 'featured-img' ); ?>" alt="<?php the_title(); ?>" />
            </div>
          </a>
          <div class="content six columns">
            <?php 
              $primary_category_id = get_post_meta( get_the_ID(), '_yoast_wpseo_primary_category', true );
              if ( $primary_category_id ) {
                $primary_category = get_term( $primary_category_id, 'category' );
                if ( $primary_category && ! is_wp_error( $primary_category ) ) {
                  echo '<span class="cat"><a href="' . esc_url( get_category_link( $primary_category->term_id ) ) . '">' . esc_html( $primary_category->name ) . '</a></span>';
                }
              }
            ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php the_excerpt(); ?>
            <span class="date"><?php the_time("F j, Y"); ?></span>
          </div>
        </article>
      </div>
    </div>

    <!-- Newsletter CTA placed outside any container for full-width display -->
    <?php get_template_part('inc/newsletter_cta'); ?>

    <!-- Container for the remaining posts and pagination -->
    <div class="container">
      <div class="news_listing twelve columns">
        <?php 
          // Loop through the remaining posts
          while ( have_posts() ) : the_post();
            get_template_part('inc/article');
          endwhile;
        ?>
      </div>
      <div class="twelve columns">
        <?php numeric_posts_nav(); ?>
      </div>
    </div>

    <?php wp_reset_query(); ?>

  <?php else : ?>
    <div class="container">
      <!-- No posts found -->
    </div>
  <?php endif; ?>
</section>

<?php get_footer();  ?>
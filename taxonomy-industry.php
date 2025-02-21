<?php /* Industries */

$term = get_queried_object(); // Get the current term object

if (isset($term->term_id)) {
  $title = get_field('intro_title', 'term_' . $term->term_id);
  $content = get_field('intro_content', 'term_' . $term->term_id);
  $selected_case_studies = get_field('case_studies', 'term_' . $term->term_id);
}

get_header(); ?>

<section class="services hero">
  <div class="container">
    <div class="content eight columns">
      <h1><?php single_cat_title(); ?></h1>
    </div>
  </div>  
</section>

<section class="service intro">
  <div class="container">
    <div class="eight columns">
      <h2><?php echo $title; ?></h2>
      <?php echo $content; ?>
  </div>
</section>

<section class="services reputation">
  <div class="container">
    <h2>Our reputation is driven by results</h2>
    <div class="testimonial twelve columns">
      <div class="slider">
        <div class="slide quote">
          <blockquote>
            <p>Working with Everyday Industries has been a game changer for Alloy Health. From absorbing and analyzing our complex user flow, to navigating our upgrade needs, Everyday has been a delight to work with and brought meaningful change and value to our entire user experience.</p>
            <cite>Anne Fulenwider</cite><br />
            <span>Co-founder at Alloy Health</span>
          </blockquote>
        </div>
        <div class="slide quote">
          <blockquote>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <cite>Anne Fulenwider</cite><br />
            <span>Co-founder at Alloy Health</span>
          </blockquote>
        </div>
        <div class="slide quote">
          <blockquote>
            <p>Working with Everyday Industries has been a game changer for Alloy Health. From absorbing and analyzing our complex user flow, to navigating our upgrade needs, Everyday has been a delight to work with and brought meaningful change and value to our entire user experience.</p>
            <cite>Tom Brooks</cite><br />
            <span>Founder at Olospo</span>
          </blockquote>
        </div>
        <div class="slide quote">
          <blockquote>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            <cite>Anne Fulenwider</cite><br />
            <span>Co-founder at Alloy Health</span>
          </blockquote>
        </div>
      </div>
    </div>
  </div>  
</section>

<?php if ($selected_case_studies) : ?>
<section class="service products">
  <div class="container">
    <h2>Case Studies</h2>
    <div class="twelve columns">
      <div class="news_listing">
      <?php 
        // Loop through the selected posts (if multiple are selected)
        foreach ($selected_case_studies as $post) :
          setup_postdata($post);
          get_template_part('inc/work');
        endforeach;
        wp_reset_postdata();
      ?>
      </div>
      <div class="twelve columns">
        <?php numeric_posts_nav(); ?>
      </div>
    </div>
  </div>
</section>
<?php endif; // End check for selected posts ?>

<section class="service insights">
  <div class="container">
    <h2>Dive deeper into our thinking</h2>
    <div class="twelve columns">
    <?php
      // Get the insight_topic field (assuming it's attached to the current taxonomy term).
      $insight_topics = get_field('insight_topic', get_queried_object());

      // Set up default query arguments.
      $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'post_status'    => 'publish'
      );

      // If the insight_topic field has been set, modify the query to filter by these categories.
      if ( $insight_topics ) {
        $cat_ids = array();
        // Loop through each selected topic. Depending on your ACF settings this may be an object or an ID.
        foreach ( $insight_topics as $topic ) {
          if ( is_object( $topic ) ) {
            $cat_ids[] = $topic->term_id;
          } else {
            $cat_ids[] = $topic;
          }
        }
        // Add a tax_query to restrict posts to the selected categories.
        $args['tax_query'] = array(
          array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $cat_ids,
          ),
        );
      }

      // Run the custom query.
      $insight_query = new WP_Query( $args );

      // If no posts are found for the selected categories, revert back to the default query.
      if ( ! $insight_query->have_posts() ) {
        $args = array(
          'post_type'      => 'post',
          'posts_per_page' => 3,
          'post_status'    => 'publish'
        );
        $insight_query = new WP_Query( $args );
      }

      // Loop through the posts.
      if ( $insight_query->have_posts() ) :
        while ( $insight_query->have_posts() ) : $insight_query->the_post();
    ?>
          <article class="insight twelve columns">
            <div class="six columns">
              <a href="<?php the_permalink(); ?>">
                <div class="zoom">
                  <div class="image" style="background: url('<?php the_post_thumbnail_url( 'featured-img' ); ?>') center center no-repeat; background-size: cover;"></div>
                </div>
              </a>
            </div>
            <div class="content six columns">
              <?php 
                // Display primary category if available via Yoast SEO.
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
              <span class="date"><?php the_time( "F j, Y" ); ?></span>
            </div>
          </article>
    <?php
        endwhile;
      else :
        echo '<p>No insights found.</p>';
      endif;
      wp_reset_postdata();
    ?>
    </div>
  </div>  
</section>


<?php get_template_part('inc/collaborate'); ?>

<?php get_footer();  ?>

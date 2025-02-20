<?php /* News Archive */
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
      <h2>What we can do for you</h2>
      <p>Launching a new product is an exciting and chaotic journey. Our services simplify the process through design, rapid prototyping, and iterative testing so you can bring ideas to market confidently. We collaborate closely with you to evaluate product ideas, validate concepts, and design excellent experiences - launching products customers want.</p>
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

<section class="archive">
  <div class="container">
    <div class="twelve columns">
      <div class="news_listing">
      <?php if ( have_posts() ) : while (have_posts()) : the_post();  ?>
        <?php get_template_part('inc/work'); ?>
      <?php endwhile; ?>
      </div>
      <div class="twelve columns">
        <?php numeric_posts_nav(); ?>
      </div>
      <?php else : endif; wp_reset_query(); ?>
    </div>
  </div>
</section>

<section class="service insights">
  <div class="container">
    <h2>Dive deeper into our thinking</h2>
    <div class="twelve columns">
    <?php $args = array(
      'post_type' => 'post',
      'posts_per_page' => 3,
      'post_status' => 'publish',
    ); query_posts($args); ?>
      <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
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
      <?php endwhile; else : ?>
    <!-- No posts found -->
    <?php endif; wp_reset_query(); ?>
    </div>
  </div>  
</section>
  
<?php get_template_part('inc/collaborate'); ?>

<?php get_footer();  ?>

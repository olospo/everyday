<?php /* Template Name: Home */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<section class="home hero">
  <div class="container">
    <div class="content six columns">
      <h1>Digital product design that transforms how people live, work, and connect.</h1>
      <a href="#" class="button accent">View our services</a> <a href="#" class="button accent">See our work</a>
    </div>
  </div>  
</section>

<!-- <section class="home brands">
  <div class="container">
    
  </div>  
</section> -->

<section class="home services">
  <div class="container">
    <h2>Our expertise is in UX design for customer-focused products.</h2>
    <a href="#" class="button accent">See our work</a>
  </div>  
</section>

<section class="home reputation">
  <div class="container">
    <h2>Our reputation is driven by results</h2>
    <div class="testimonial twelve columns">
      <div class="image one-half column">

      </div>
      <div class="quote one-half column">
        <blockquote>
          <p>Working with Everyday Industries has been a game changer for Alloy Health. From absorbing and analyzing our complex user flow, to navigating our upgrade needs, Everyday has been a delight to work with and brought meaningful change and value to our entire user experience.</p>
          <cite>Anne Fulenwider</cite>, Co-founder at Alloy Health
        </blockquote>
      </div>
    </div>
  </div>  
</section>

<section class="home work">
  <div class="container">
    <h2>Dive into our work</h2>
    <?php
    $args = array(
      'post_type' => 'casestudy',
      'posts_per_page' => 5,
      'post_status' => 'publish',
    );
    $casestudies = new WP_Query($args);
    ?>
    <div class="work-wrapper twelve columns">
      <div class="work-list six columns">
        <?php if ($casestudies->have_posts()) : $counter = 0; ?>
          <?php while ($casestudies->have_posts()) : $casestudies->the_post(); $counter++; ?>
            <article class="work-item <?php echo $counter === 1 ? 'active' : ''; ?>" data-image="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" data-link="<?php the_permalink(); ?>">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p><?php echo get_field('short_description'); ?></p>
              <span class="cat">Consumer health & wellness</span>
            </article>
          <?php endwhile; ?>
        <?php else : ?>
          <p>No case studies found.</p>
        <?php endif; wp_reset_postdata(); ?>
      </div>
      <div class="work-image six columns">
      <?php if ($casestudies->have_posts()) : $casestudies->rewind_posts(); $casestudies->the_post(); ?>
        <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="Default Image" id="displayed-image"></a>
        <?php endif; ?>
      </div>
    </div>
    <div class="all-wrapper twelve columns">
      <a href="#" class="button accent">View all work</a>
    </div>
  </div>  
</section>

<section class="home insights">
  <div class="container">
    <h2>UX and product design insights</h2>
    <div class="twelve columns">
    <?php $args = array(
      'post_type' => 'post',
      'posts_per_page' => 3,
      'post_status' => 'publish',
    ); query_posts($args); ?>
      <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
      <?php get_template_part('inc/article'); ?>
      <?php endwhile; else : ?>
    <!-- No posts found -->
    <?php endif; wp_reset_query(); ?>
    </div>
  </div>  
</section>

<?php get_template_part('inc/collaborate'); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
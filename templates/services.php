<?php /* Template Name: Services */
  
// Heading 
$header_title = get_field('header_title');
// Services 
$service = get_field('service');
// Capabilities
$capabilities_title = get_field('capabilities_title');
// Testimonials
$testimonial_title = get_field('testimonial_title');
$testimonials = get_field('testimonials');

get_header(); while ( have_posts() ) : the_post(); ?>

<section class="services hero">
  <div class="container">
    <div class="content eight columns">
      <h1><?php echo $header_title; ?></h1>
    </div>
  </div>  
</section>

<section class="services offering">
  <div class="container">
    <?php if( have_rows('service') ): ?>
      <?php while( have_rows('service') ): the_row(); 
        $service_image = get_sub_field('service_image');
        $service_title = get_sub_field('service_title');
        $service_description = get_sub_field('service_description');
        $page_link = get_sub_field('page_link');
        if( $service_image ): $image_url = $service_image['url']; ?>
        <div class="service twelve columns">
          <div class="six columns">
            <a href="<?php echo esc_url($page_link['url']); ?>">
              <div class="zoom">
                <div class="image" style="background: url('<?php echo esc_url($image_url); ?>') center center no-repeat; background-size: cover;"></div>
              </div>
            </a>
          </div>
          <div class="content six columns">
          <?php if( $service_title ): ?>
            <h2><a href="<?php echo esc_url($page_link['url']); ?>"><?php echo esc_html($service_title); ?></a></h2>
          <?php endif; ?>
          <?php if( $service_description ): ?>
            <p><?php echo esc_html($service_description); ?></p>
          <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>

<section class="services capabilities">
  <div class="container">
    <h2><?php echo $capabilities_title; ?></h2>
    <div class="row">
      <?php if( have_rows('list_one') ): ?>
        <?php while( have_rows('list_one') ): the_row(); ?>
          <div class="ux one-third column">
            <h3 class="toggle"><?php the_sub_field('heading'); ?></h3>
            <ul class="collapsed">
              <?php if( have_rows('list') ): ?>
                <?php while( have_rows('list') ): the_row(); ?>
                  <li><?php the_sub_field('list_item'); ?></li>
                <?php endwhile; ?>
              <?php endif; ?>
            </ul>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php if( have_rows('list_two') ): ?>
        <?php while( have_rows('list_two') ): the_row(); ?>
          <div class="product one-third column">
            <h3 class="toggle"><?php the_sub_field('heading'); ?></h3>
            <ul class="collapsed">
              <?php if( have_rows('list') ): ?>
                <?php while( have_rows('list') ): the_row(); ?>
                  <li><?php the_sub_field('list_item'); ?></li>
                <?php endwhile; ?>
              <?php endif; ?>
            </ul>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php if( have_rows('list_three') ): ?>
        <?php while( have_rows('list_three') ): the_row(); ?>
          <div class="strategy one-third column">
            <h3 class="toggle"><?php the_sub_field('heading'); ?></h3>
            <ul class="collapsed">
              <?php if( have_rows('list') ): ?>
                <?php while( have_rows('list') ): the_row(); ?>
                  <li><?php the_sub_field('list_item'); ?></li>
                <?php endwhile; ?>
              <?php endif; ?>
            </ul>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="services reputation">
  <div class="container">
  <h2><?php echo $testimonial_title; ?></h2>
  <?php if ( $testimonials ) { if ( ! is_array( $testimonials ) ) { $testimonials = array( $testimonials ); } ?>
  <div class="slider testimonial twelve columns">
    <?php foreach ( $testimonials as $post ) : if ( is_numeric( $post ) ) { $post = get_post( $post ); } setup_postdata( $post ); ?>
    <div class="slide">
      <div class="slide quote">
        <?php get_template_part('inc/quote'); ?>
      </div>
    </div>
    <?php endforeach; wp_reset_postdata();?>
  </div>
  <?php } ?>
  </div>
</section>

<section class="services reasons">
  <div class="container">
    <div class="statement one-half column">
      <div class="content">
        <p><?php echo get_field('what_we_do_title'); ?></p>
      </div>
    </div>
    <div class="reasons one-half column">
      <div class="content">
        <?php echo get_field('what_we_do_content'); ?>
      </div>
    </div>
  </div>
</section>

<section class="services specialties">
  <div class="container">
    <div class="six columns">
      <h2><?php echo get_field('specialities_title'); ?></h2>
      <?php echo get_field('specialities_content'); ?>
      <?php $specialities_button = get_field('specialities_button'); 
      // Check if the link exists
      if( $specialities_button ): 
        $button_url = esc_url( $specialities_button['url'] );
        $button_title = esc_html( $specialities_button['title'] );
        $button_target = $specialities_button['target'] ? ' target="_blank"' : '';
      ?>
      <a href="<?php echo $button_url; ?>" class="casestudy button accent"<?php echo $button_target; ?>><?php echo $button_title; ?></a>
      <?php endif; ?>
    </div>
    <div class="twelve columns">
      <ul>
        <?php
        $specialties = get_terms( array(
          'taxonomy'   => 'specialty',
          'hide_empty' => true,
          'orderby'    => 'term_id',
          'order'      => 'DESC'
        ) );
        
        if ( ! empty( $specialties ) && ! is_wp_error( $specialties ) ) {
          foreach ( $specialties as $specialty ) {
            $specialty_link = get_term_link( $specialty );
            // Echo each <li> without any space or newline
            echo '<li><a href="' . esc_url( $specialty_link ) . '">' . esc_html( $specialty->name ) . '</a></li>';
          }
        }
        ?>
      </ul>
    </div>
  </div>
</section>

<section class="services industries">
  <div class="container">
    <div class="twelve columns">
      <h2>Industries</h2>
      <?php
      // Get all the industries (terms from the 'industry' taxonomy)
      $industries = get_terms(array(
        'taxonomy' => 'industry',
        'hide_empty' => false, // Set to true if you only want industries that have case studies
      ));

      if ($industries && !is_wp_error($industries)) {
        foreach ($industries as $industry) {
          // Display the Industry name as a link
          echo '<div class="industry">';
          echo '<h3><a href="' . esc_url(get_term_link($industry)) . '">' . esc_html($industry->name) . '</a></h3>';

          // Get the case studies assigned to this industry
          $args = array(
            'post_type' => 'casestudy',
            'tax_query' => array(
              array(
                'taxonomy' => 'industry',
                'field' => 'term_id',
                'terms' => $industry->term_id,
              ),
            ),
          );
          $case_studies = new WP_Query($args);

          // Check if there are case studies for this industry
          if ($case_studies->have_posts()) {
            echo '<p>';
            // Loop through the case studies
            while ($case_studies->have_posts()) {
              $case_studies->the_post();
              echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
              if ($case_studies->current_post < $case_studies->post_count - 1) {
                echo ', '; // Add a comma between case studies, but not after the last one
              }
            }
            echo '</p>';
          } else {
            echo '<p>' . __('No case studies available for this industry.', 'your-textdomain') . '</p>';
          }
          // Reset post data
          wp_reset_postdata();
          echo '</div>';
        }
      } 
      ?>
    </div>
  </div>
</section>

<?php get_template_part('inc/collaborate'); ?>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
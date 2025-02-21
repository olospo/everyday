<?php /* Template Name: Services */
get_header(); while ( have_posts() ) : the_post(); ?>

<section class="services hero">
  <div class="container">
    <div class="content eight columns">
      <h1>We transform products into experiences customers love.</h1>
    </div>
  </div>  
</section>

<section class="services offering">
  <div class="container">
    <div class="service twelve columns">
      <div class="image six columns" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/new-product.png');"></div>
      <div class="content six columns">
        <h2><a href="<?php echo get_site_url(); ?>/what-we-do/customer-research-services/">New product design</a></h2>
        <p>Turn ideas into beautifully designed products users love. From initial concept through to final implementation, we design experiences that solve real user needs and drive business growth.
        </p>
      </div>
    </div>
    <div class="service twelve columns">
      <div class="image six columns" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/product-redesigns.png');"></div>
      <div class="content six columns">
        <h2><a href="<?php echo get_site_url(); ?>/what-we-do/product-evaluations/">Product Redesigns</a><h2>
        <p>Transform your existing product into an exceptional experience. Whether modernizing your interface or completely reimagining your product, we help you design products that drive results.</p>
      </div>
    </div>
    <div class="service twelve columns">
      <div class="image six columns" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/ux-eval.png');"></div>
      <div class="content six columns">
        <h2><a href="<?php echo get_site_url(); ?>/what-we-do/user-experience-design-services/">UX evaluations</a><h2>
        <p>Get expert insight into your product experience. Our comprehensive evaluation identifies opportunities to improve usability, engagement, and conversion through design.</p>
      </div>
    </div>
  </div>
</section>

<section class="services capabilities">
  <div class="container">
    <h2>Capabilities</h2>
    <div class="row">
      <div class="ux one-third column">
        <h3 class="toggle">UX</h3>
        <ul class="collapsed">
          <li>Information architecture</li>
          <li>Competitive analysis</li>
          <li>Concept design</li>
          <li>Concept testing</li>
          <li>Usability testing</li>
        </ul>
      </div>
      <div class="product one-third column">
        <h3 class="toggle">Product design</h3>
        <ul class="collapsed">
          <li>Prototyping</li>
          <li>Hi fidelity design</li>
          <li>Design systems</li>
          <li>Micro animations</li>
          <li>Documentation</li>
        </ul>
      </div>
      <div class="strategy one-third column">
        <h3 class="toggle">Design strategy</h3>
        <ul class="collapsed">
          <li>Workshops</li>
          <li>Experience principles</li>
          <li>Journey mapping</li>
          <li>Experience mapping</li>
          <li>UX audits</li>
        </ul>
      </div>
    </div>
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

<section class="services reasons">
  <div class="container">
    <div class="statement one-half column">
      <div class="content">
        <p>For over a decade we’ve helped big and small teams design products that impact people’s lives.</p>
      </div>
    </div>
    <div class="reasons one-half column">
      <div class="content">
        <h3>Founder-led teams</h3>
        <p>At Everyday, you work directly with experienced designers our co-founders lead dedicated, senior-level teams to ensure project success.</p>
        <h3>Collaborative innovation</h3>
        <p>We bring fresh perspectives, you bring deep product knowledge—together, we create solutions.</p>
        <h3>Quick wins, Real results</h3>
        <p>We pinpoint your highest-impact opportunities and help you make design changes that drive immediate value.</p>
      </div>
    </div>
  </div>
</section>

<section class="services specialties">
  <div class="container">
    <div class="six columns">
      <h2>Specialties</h2>
      <p>Leverage our deep expertise in UX, product design, and strategy to align teams and make digital products customers love.</p>
      <a href="<?php echo get_site_url(); ?>/casestudy/" class="casestudy button accent">See our work</a>
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
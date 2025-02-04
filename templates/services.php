<?php /* Template Name: Services */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

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
        <h2>New product design</h2>
        <p>
          Turn ideas into beautifully designed products users love. From initial concept through to final implementation, we design experiences that solve real user needs and drive business growth.
        </p>
      </div>
    </div>
    <div class="service twelve columns">
      <div class="image six columns" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/product-redesigns.png');"></div>
      <div class="content six columns">
        <h2>Product Redesigns<h2>
        <p>Transform your existing product into an exceptional experience. Whether modernizing your interface or completely reimagining your product, we help you design products that drive results.</p>
      </div>
    </div>
    <div class="service twelve columns">
      <div class="image six columns" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/ux-eval.png');"></div>
      <div class="content six columns">
        <h2>UX evaluations<h2>
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
        <h3>UX</h3>
        <ul>
          <li>Information architecture</li>
          <li>Competitive analysis</li>
          <li>Concept design</li>
          <li>Concept testing</li>
          <li>Usability testing</li>
        </ul>
      </div>
      <div class="product one-third column">
        <h3>Product design</h3>
        <ul>
          <li>Prototyping</li>
          <li>Hi fidelity design</li>
          <li>Design systems</li>
          <li>Micro animations</li>
          <li>Documentation</li>
        </ul>
      </div>
      <div class="strategy one-third column">
        <h3>Design strategy</h3>
        <ul>
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
      <div class="quote six columns">
        <blockquote>
          <p>Working with Everyday Industries has been a game changer for Alloy Health. From absorbing and analyzing our complex user flow, to navigating our upgrade needs, Everyday has been a delight to work with and brought meaningful change and value to our entire user experience.</p>
          <cite>Anne Fulenwider</cite>, Co-founder at Alloy Health
        </blockquote>
      </div>
      <div class="quote six columns">
        <blockquote>
          <p>Working with Everyday Industries has been a game changer for Alloy Health. From absorbing and analyzing our complex user flow, to navigating our upgrade needs, Everyday has been a delight to work with and brought meaningful change and value to our entire user experience.</p>
          <cite>Anne Fulenwider</cite>, Co-founder at Alloy Health
        </blockquote>
      </div>
    </div>
  </div>  
</section>

<?php get_template_part('inc/collaborate'); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
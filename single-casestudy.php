<?php 
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="hero single">
  <div class="container">
    <div class="content ten columns">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
</section>

<section class="casestudy intro">
  <div class="container">
    <div class="eight columns">
      <h2><?php the_field( 'short_description' ); ?></h2>
      <?php the_field( 'project_intro' ); ?>
    </div>
    <?php if ( have_rows( 'project_overview' ) ) : ?>
      <?php while ( have_rows( 'project_overview' ) ) : the_row(); ?>
        <aside class="four columns">
        <h3>Project Date</h3>
        <ul>
          <li><?php the_sub_field( 'project_date' ); ?></li>
        </ul>
        <?php if ( have_rows( 'what_we_did' ) ) : ?>
        <h3>What We Did</h3>
          <ul>
          <?php while ( have_rows( 'what_we_did' ) ) : the_row(); ?>
            <li><?php the_sub_field( 'service' ); ?></li>
          <?php endwhile; ?>
          </ul>
        <?php else : endif; ?>
        <h3>Project Type</h3>
          <ul>
          <?php if ( have_rows( 'project_type' ) ) : ?>
            <?php while ( have_rows( 'project_type' ) ) : the_row(); ?>
              <li><?php the_sub_field( 'type' ); ?></li>
            <?php endwhile; ?>
          <?php else : endif; ?>
          </ul>
        </aside>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>

<section class="casestudy old content">
<?php if ( have_rows( 'content_sections' ) ): ?>
  <?php while ( have_rows( 'content_sections' ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'copy_w_header' ) : ?>
      <section class="copy-block">
        <div class="container">
          <div class="content">
            <h3><?php the_sub_field( 'header' ); ?></h3>
            <?php the_sub_field( 'copy' ); ?>
          </div>
        </div>
      </section>
    <?php elseif ( get_row_layout() == 'images' ) : ?>
      <?php if ( have_rows( 'images' ) ): ?>
        <?php while ( have_rows( 'images' ) ) : the_row(); ?>
          <?php if ( get_row_layout() == 'fw_image' ) : ?>
            <?php if ( get_sub_field( 'hide_for_mobile' ) == 1 ) { ?>
              <section class="image-block mobile-hide">
                <div class="container">
          <?php	} else { ?>
           <section class="image-block">
             <div class="container">
          <?php	} ?>
              <div class="content">
                <?php $mobile_image = get_sub_field( 'mobile_image' ); ?>
                <?php $image = get_sub_field( 'image' ); ?>
            <?php if ( $mobile_image ) { ?>
              <div class="image mobile-show">
                <img src="<?php echo $mobile_image['url']; ?>" alt="<?php echo $mobile_image['alt']; ?>" />
              </div>
              <div class="image mobile-hide">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              </div>
            <?php } else { ?>

              <div class="image">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              </div>
            <?php } ?>
            <?php $caption = get_sub_field( 'caption' ); ?>
            <?php if ( $caption ) { ?>
              <div class="caption">
                <?php the_sub_field( 'caption' ); ?>
              </div>
            <?php } ?>
            </div>
             </div>
            </section>
          <?php elseif ( get_row_layout() == 'fw_website_image' ) : ?>
            <section class="web-image-block">
              <div class="container">
              <div class="content">
              <?php $image = get_sub_field( 'image' ); ?>
              <?php if ( $image ) { ?>
                <div class="image">
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                </div>
              <?php } ?>
            <?php $mobile_image = get_sub_field( 'mobile_image' ); ?>
            <?php if ( $mobile_image ) { ?>
              <div class="mobile-image">
                <img src="<?php echo $mobile_image['url']; ?>" alt="<?php echo $mobile_image['alt']; ?>" />
              </div>
            <?php } ?>
            <div class="caption">
              <?php the_sub_field( 'caption' ); ?>
            </div>
            </div>
              </div>
          </section>
          <?php elseif ( get_row_layout() == 'three_images' ) : ?>
            <section class="three-images">
              <div class="container">
              <div class="content">
              <?php $images_images = get_sub_field( 'images' ); ?>
              <?php if ( $images_images ) :  ?>
                <?php foreach ( $images_images as $images_image ): ?>
                  <div class="image">
                    <img src="<?php echo $images_image['url']; ?>" alt="<?php echo $images_image['alt']; ?>" />
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
              </div>
              <?php $caption = get_sub_field( 'caption' ); ?>
              <?php if ( $caption ) { ?>
                <div class="caption">
                  <?php the_sub_field( 'caption' ); ?>
                </div>
              <?php } ?>
              </div>
            </section>

            <section class="three-images-mobile">
              <div class="container">
              <div class="content">
              <!-- Slider main container -->
              <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                  <!-- Slides -->
                  <?php $images_images = get_sub_field( 'images' ); ?>
                  <?php if ( $images_images ) :  ?>
                    <?php foreach ( $images_images as $images_image ): ?>
                      <div class="swiper-slide">
                        <div class="image">
                          <img src="<?php echo $images_image['url']; ?>" alt="<?php echo $images_image['alt']; ?>" />
                        </div>
                      </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

              </div>
            </div>
            <?php $caption = get_sub_field( 'caption' ); ?>
            <?php if ( $caption ) { ?>
              <div class="caption">
                <?php the_sub_field( 'caption' ); ?>
              </div>
            <?php } ?>
              </div>
            </section>
          <?php elseif ( get_row_layout() == 'large_image_with_quote_block' ) : ?>
            <div class="container">
            <section class="image-quote" <?php if ( get_sub_field( 'image' ) ) { ?>
            style="background-image: url('<?php the_sub_field( 'image' ); ?>');"<?php } ?>>
            
              <?php if ( have_rows( 'quote' ) ) : ?>
                <div class="quote-row">
                <?php while ( have_rows( 'quote' ) ) : the_row(); ?>
                  <div class="quote-container">
                    <div class="quote">
                      <p><?php the_sub_field( 'copy' ); ?></p>
                      <div class="attribution"><?php the_sub_field( 'atrribute' ); ?></div>
                    </div>
                  </div>
                <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </section>
            </div>
            
            
            <section class="image-quote-mobile">
              <div class="container">
                <div class="mobile-image">
                  <?php $mobile_image = get_sub_field( 'mobile_image' ); ?>
                  <?php if ( $mobile_image ) { ?>
                    <img src="<?php echo $mobile_image['url']; ?>" alt="<?php echo $mobile_image['alt']; ?>" />
                  <?php } ?>
                </div>
                <?php if ( have_rows( 'quote' ) ) : ?>
                <div class="quote-row">
                <?php while ( have_rows( 'quote' ) ) : the_row(); ?>
                  <div class="quote-container">
                    <div class="quote">
                      <p><?php the_sub_field( 'copy' ); ?></p>
                      <div class="attribution"><?php the_sub_field( 'atrribute' ); ?></div>
                    </div>
                  </div>
                <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
          </section>
          <?php endif; ?>
        <?php endwhile; ?>
      <?php else: ?>
        <?php // no layouts found ?>
      <?php endif; ?>
    <?php elseif ( get_row_layout() == 'quote' ) : ?>
    <section class="quote-block">
      <div class="container">
      <div class="content">
        <div class="copy">
          <?php the_sub_field( 'copy' ); ?>
          <?php if ( have_rows( 'atrribution' ) ) : ?>
          <?php while ( have_rows( 'atrribution' ) ) : the_row(); ?>
          <div class="attribution">
            <div class="name">
              <?php the_sub_field( 'name' ); ?>
              <div class="title"><?php the_sub_field( 'title' ); ?></div>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      <?php endif; ?>
      </div>
      </section>
    <?php endif; ?>
  <?php endwhile; ?>
<?php else: ?>
  <?php // no layouts found ?>
<?php endif; ?>
  </div>
</section>

<section class="service offering">
  <div class="container">
    <h2>How we can help</h2>
    <div class="service twelve columns">
      <div class="image six columns" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/new-product.png');"></div>
      <div class="content six columns">
        <h3><a href="<?php echo get_site_url(); ?>/what-we-do/customer-research-services/">New product design</a></h3>
        <p>Turn ideas into beautifully designed products users love. From initial concept through to final implementation, we design experiences that solve real user needs and drive business growth.
        </p>
      </div>
    </div>
    <div class="service twelve columns">
      <div class="image six columns" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/product-redesigns.png');"></div>
      <div class="content six columns">
        <h3><a href="<?php echo get_site_url(); ?>/what-we-do/product-evaluations/">Product Redesigns</a><h3>
        <p>Transform your existing product into an exceptional experience. Whether modernizing your interface or completely reimagining your product, we help you design products that drive results.</p>
      </div>
    </div>
    <div class="service twelve columns">
      <div class="image six columns" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/ux-eval.png');"></div>
      <div class="content six columns">
        <h3><a href="<?php echo get_site_url(); ?>/what-we-do/user-experience-design-services/">UX evaluations</a><h3>
        <p>Get expert insight into your product experience. Our comprehensive evaluation identifies opportunities to improve usability, engagement, and conversion through design.</p>
      </div>
    </div>
  </div>
</section>
  
<?php get_template_part('inc/collaborate'); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
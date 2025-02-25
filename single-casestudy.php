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

<section class="casestudy content">
  <div class="container">

<?php if ( have_rows( 'content_sections' ) ): ?>
  <?php while ( have_rows( 'content_sections' ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'copy_w_header' ) : ?>
      <section class="copy-block">
        <div class="content">
          <h3><?php the_sub_field( 'header' ); ?></h3>
          <?php the_sub_field( 'copy' ); ?>
        </div>
      </section>
    <?php elseif ( get_row_layout() == 'images' ) : ?>
      <?php if ( have_rows( 'images' ) ): ?>
        <?php while ( have_rows( 'images' ) ) : the_row(); ?>
          <?php if ( get_row_layout() == 'fw_image' ) : ?>
            <?php if ( get_sub_field( 'hide_for_mobile' ) == 1 ) { ?>
              <section class="image-block mobile-hide">
          <?php	} else { ?>
           <section class="image-block">
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
            </section>
          <?php elseif ( get_row_layout() == 'fw_website_image' ) : ?>
            <section class="web-image-block">
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
          </section>
          <?php elseif ( get_row_layout() == 'three_images' ) : ?>
            <section class="three-images">
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
            </section>

            <section class="three-images-mobile">
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
            </section>
          <?php elseif ( get_row_layout() == 'large_image_with_quote_block' ) : ?>
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

            <section class="image-quote-mobile">
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
            </section>
          <?php endif; ?>
        <?php endwhile; ?>
      <?php else: ?>
        <?php // no layouts found ?>
      <?php endif; ?>
    <?php elseif ( get_row_layout() == 'quote' ) : ?>
    <section class="quote-block">
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
      </section>
    <?php endif; ?>
  <?php endwhile; ?>
<?php else: ?>
  <?php // no layouts found ?>
<?php endif; ?>
  </div>
</section>


<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
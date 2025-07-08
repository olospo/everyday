<?php
  $bg_color   = $args['bg_color']   ?? '#f2f2e3';
  $text_class = $args['text_class'] ?? 'text-dark';
?>
<?php if ( have_rows( 'images' ) ): ?>
  <?php while ( have_rows( 'images' ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'fw_image' ) : ?>
      <?php $hide_mobile = get_sub_field( 'hide_for_mobile' ) == 1; ?>
      <section class="image-block <?php echo $hide_mobile ? ' mobile-hide' : ''; echo esc_attr($text_class); ?>"
       style="background-color: <?php echo esc_attr($bg_color); ?>;">
        <div class="container">
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
      <section class="web-image-block <?php echo esc_attr($text_class); ?>"
       style="background-color: <?php echo esc_attr($bg_color); ?>;">
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
      <section class="three-images <?php echo esc_attr($text_class); ?>"
       style="background-color: <?php echo esc_attr($bg_color); ?>;">
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
      <section class="three-images-mobile <?php echo esc_attr($text_class); ?>"
       style="background-color: <?php echo esc_attr($bg_color); ?>;">
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
              <div class="quote <?php echo esc_attr($text_class); ?>"
               style="background-color: <?php echo esc_attr($bg_color); ?>;">
                <p><?php the_sub_field( 'copy' ); ?></p>
                <?php if ( get_sub_field( 'atrribute' ) ) { ?>
                <div class="attribution"><?php the_sub_field( 'atrribute' ); ?></div>
                <?php } ?>
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
              <div class="quote <?php echo esc_attr($text_class); ?>"
               style="background-color: <?php echo esc_attr($bg_color); ?>;">
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
<?php else: endif; // No layouts found ?>
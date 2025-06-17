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
    <aside class="four columns">
      <ul>
        <?php $date = get_field( 'project_date' ); ?>
        <?php if ( $date ) { ?>
          <li><?php echo $date; ?></li>
        <?php } ?>
        <?php $industries = get_the_terms(get_the_ID(), 'industry');
        if ($industries && !is_wp_error($industries)) {
          foreach ($industries as $industry) {
            echo '<li>' . esc_html($industry->name) . '</li>';
          }
        } ?>
        <?php $types = get_the_terms(get_the_ID(), 'specialty');
        if ($types && !is_wp_error($types)) {
          foreach ($types as $type) {
            echo '<li>' . esc_html($type->name) . '</li>';
          }
        } ?>
        
        <?php $link = get_field( 'site_url' ); ?>
        <?php if ( $link ) { ?>
          <li><a href="<?php echo $link; ?>">View Site</a></li>
        <?php } ?>
        
      </ul>
    </aside>
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
          <blockquote>
          <?php the_sub_field( 'copy' ); ?>
          <?php if ( have_rows( 'atrribution' ) ) : ?>
          <?php while ( have_rows( 'atrribution' ) ) : the_row(); ?>
          <cite><?php the_sub_field( 'name' ); ?></cite><br />
          <span><?php the_sub_field( 'title' ); ?></span>
            </div>
          </div>
          </blockquote>
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
    <?php if( have_rows('service',29) ): 
      while( have_rows('service',29) ): the_row();
      $img   = get_sub_field('service_image',29);
      $title = get_sub_field('service_title',29);
      $desc  = get_sub_field('service_description',29);
      $link  = get_sub_field('page_link',29);
      $curr  = get_permalink();
      if( $link && ((isset($link['ID']) && $link['ID'] == get_the_ID()) || (!isset($link['ID']) && $link['url'] == $curr)) ) continue;
      if( $img ): $url = $img['url']; ?>
      <div class="service twelve columns">
        <div class="six columns">
          <a href="<?php echo esc_url($link['url']); ?>">
            <div class="zoom">
              <div class="image" style="background: url('<?php echo esc_url($url); ?>') center center no-repeat; background-size: cover;"></div>
            </div>
          </a>
        </div>
        <div class="content six columns">
        <?php if($title): ?><h2><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($title); ?></a></h2><?php endif; ?>
        <?php if($desc): ?><p><?php echo esc_html($desc); ?></p><?php endif; ?>
        </div>
      </div>
    <?php endif; endwhile; endif; ?>
  </div>
</section>

<?php get_template_part('inc/collaborate'); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
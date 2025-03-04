<?php if ( is_front_page() || is_home() ) : ?>
  <h1 class="site-title">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <img src="<?php bloginfo('template_directory'); ?>/img/everyday-logo.svg" alt="<?php bloginfo( 'name' ); ?>">
    </a>
  </h1>
<?php else : ?>
  <p class="site-title">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <img src="<?php bloginfo('template_directory'); ?>/img/everyday-logo.svg" alt="<?php bloginfo( 'name' ); ?>">
    </a>
  </p>
<?php endif; ?>
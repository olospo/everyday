<?php /* Footer */ 
  // Contact Settings
  $email = get_field('email','options');
?>

<footer class="footer">
  <div class="container">
    <div class="logo four columns">
      <img src="<?php bloginfo('template_directory'); ?>/img/everyday-logo.svg" alt="<?php echo bloginfo( 'name' ); ?>">
      <p>Digital product design studio</p>
      <a href="<?php echo get_site_url(); ?>/contact" class="contact">Contact us</a>
    </div>
    <div class="newsletter twelve columns">
      <h5>Get our newsletter</h5>
      <form action="#" method="POST" class="newsletter-form">
        <input type="email" name="email" placeholder="Your email address here" required><button type="submit" aria-label="submit"></button>
        <p class="privacy-text">By signing up, you agree to our <a href="#">Privacy Policy</a>*.</p>
      </form>
    </div>
    <div class="row">
      <div class="sitemap one-third column">
        <h5>What we do</h5>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-1', 'container'=> false, 'menu_class'=> false ) ); ?>
      </div>
      <div class="sitemap one-third column">
        <h5>Our focus</h5>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-2', 'container'=> false, 'menu_class'=> false ) ); ?>
      </div>
      <div class="sitemap one-third column">
        <h5>About us</h5>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-3', 'container'=> false, 'menu_class'=> false ) ); ?>
      </div>
    </div>
    <div class="copyright twelve columns">
      <p>&copy; <?php echo date("Y"); ?> Everyday Industries, Inc. All Rights Reserved</p>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>

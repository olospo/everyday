<?php /* Footer */ 
  // Contact Settings
  $email = get_field('email','options');
?>

<footer class="footer">
  <div class="container">
    <div class="logo four columns">
      <img src="<?php bloginfo('template_directory'); ?>/img/everyday-logo.svg" alt="<?php echo bloginfo( 'name' ); ?>">
      <p>Digital product design studio</p>
    </div>
    <div class="newsletter twelve columns">
      <!-- <h5>Get our newsletter</h5> -->
    </div>
    <div class="row">
      <div class="sitemap one-third column">
        <h5>What we do</h5>
        <ul>
          <li><a href="#">New product design</a></li>
          <li><a href="#">Product redesigns</a></li>
          <li><a href="#">UX evaluations</a></li>
        </ul>
      </div>
      <div class="sitemap one-third column">
        <h5>Our focus</h5>
        <ul>
          <li><a href="#">Consumer health & wellness</a></li>
          <li><a href="#">Beauty & personal care</a></li>
          <li><a href="#">Learning & play</a></li>
          <li><a href="#">Food & nutrition</a></li>
          <li><a href="#">Marketplaces & platforms</a></li>
        </ul>
      </div>
      <div class="sitemap one-third column">
        <h5>About us</h5>
        <ul>
          <li><a href="#">Work</a></li>
          <li><a href="#">Studio</a></li>
          <li><a href="#">Careers</a></li>
        </ul>
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

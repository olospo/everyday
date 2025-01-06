<?php /* Footer */ 
  // Contact Settings
  $email = get_field('email','options');
?>

<footer class="footer">
  <div class="container">
    <div class="logo four columns">
      <img src="<?php bloginfo('template_directory'); ?>/img/everyday-logo.svg" alt="<?php echo bloginfo( 'name' ); ?>">
    </div>
    
      <div class="copyright twelve columns">
        <p>&copy; <?php echo date("Y"); ?> Everyday Industries, Inc. All Rights Reserved</p>
      </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>

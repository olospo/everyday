<?php 
// Retrieve the call_to_action group from the options page.
$cta = get_field('call_to_action', 'option');

$cta_title = isset($cta['cta_title']) ? $cta['cta_title'] : '';
$cta_description = isset($cta['cta_description']) ? $cta['cta_description'] : '';
$cta_button  = isset($cta['cta_button']) ? $cta['cta_button'] : '';
?>

<section class="cta collaborate">
  <div class="container">
    <h4><?php echo esc_html($cta_title); ?></h4>
    <p><?php echo esc_html($cta_description); ?></p>
    <?php if ( $cta_button ) {
        if ( is_array( $cta_button ) ) {
          $button_url    = isset($cta_button['url']) ? $cta_button['url'] : '';
          $button_title  = isset($cta_button['title']) ? $cta_button['title'] : 'Get in touch';
          $button_target = isset($cta_button['target']) ? $cta_button['target'] : '_self';
        } else {
          $button_url    = $cta_button;
          $button_title  = 'Get in touch';
          $button_target = '_self';
        }
      if ( $button_url ) : ?>
      <a href="<?php echo esc_url($button_url); ?>" class="button accent" target="<?php echo esc_attr($button_target); ?>"><?php echo esc_html($button_title); ?></a>
    <?php endif; } ?>
  </div>  
</section>
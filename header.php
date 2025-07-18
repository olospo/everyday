<?php /* Header */  ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php wp_title( '|', true, 'left' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, minimal-ui" />
<?php
// Output ACF custom head scripts if available
if( function_exists('get_field') ) {
    $custom_scripts = get_field('custom_scripts', 'option');
    if( $custom_scripts ) {
        echo "\n<!-- Custom Head Scripts -->\n" . $custom_scripts . "\n<!-- End Custom Head Scripts -->\n";
    }
}
?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
// header.php (or wherever you output <header class="main">)
$header_style = '';
if ( is_singular('casestudy') && $color = get_field('header_color') ) {
    $header_style = ' style="background:' . esc_attr($color) . ';"';
}
?>
<header class="main"<?php echo $header_style; ?>>
  <div class="container">
    <div class="logo four columns">  
      <?php get_template_part( 'inc/logo' ); ?>
    </div>
    <nav class="menu eight columns">
      <?php wp_nav_menu( array( 'theme_location' => 'main', 'container'=> false, 'menu_class'=> false ) ); ?>
    </nav>
    <button class="menu-toggle mobile_menu" aria-label="Mobile Menu">
      <span></span>
      <span></span>
    </button>
  </div>
</header>

<nav class="mobile">
  <div class="container">
    <?php wp_nav_menu( array( 'theme_location' => 'main', 'container'=> false, 'menu_class'=> false ) ); ?>
  </div>
</nav>
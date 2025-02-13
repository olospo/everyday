<?php /* Header */  ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php wp_title( '|', true, 'left' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, minimal-ui" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="main">
  <div class="container">
    <div class="logo four columns">  
      <?php get_template_part( 'inc/logo' ); ?>
    </div>
    <nav class="menu eight columns">
      <?php wp_nav_menu( array( 'theme_location' => 'main', 'container'=> false, 'menu_class'=> false ) ); ?>
    </nav>
    <button class="menu-toggle mobile_menu">
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
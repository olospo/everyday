<?php /* Header */  ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php wp_title( '|', true, 'left' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, minimal-ui" />
<?php wp_head(); ?>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet"> 
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
  <?php wp_nav_menu( array( 'theme_location' => 'main', 'container'=> false, 'menu_class'=> false ) ); ?>
</nav>
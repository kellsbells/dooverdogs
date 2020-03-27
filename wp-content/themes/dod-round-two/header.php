<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _s
 */

?><!DOCTYPE html>
<!--[if lte IE 8]> <html class="no-js lt-ie10 lt-ie9 oldie" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 9]> <html class="no-js lt-ie10 oldie" <?php language_attributes() ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes() ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans+Condensed:300&display=swap" rel="stylesheet" defer>
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<title>Do Over Dogs Rescue - a Second Chance at Life</title>
<meta name="description" content="Based in Broomfield, Colorado Do Over Dogs is a 501(c)(3) dog rescue that gives at-risk dogs from the shelter environment a second chance at life.">
<link rel="canonical" href="https://dooverdogs.com"/>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://kit.fontawesome.com/31052e2e18.js" defer></script>


<?php 
wp_head(); 
$imagedir = get_stylesheet_directory_uri() . "/assets/img";
?>
</head>

<body <?php body_class(); ?>>

<div class="breakpoint-context"></div>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>

	

	<header class="header-desktop" role="banner">

		<div class="header__container">
			<div class="header__navigation">
				<nav class="nav-item" role="navigation">
					<a href="/" class="header__logo" aria-label="Return Home">
						<img src="<?php echo $imagedir ?>/dod-logo-text-white-abbr.png" alt="Do Over Dogs Logo">
					</a>

					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav>
			</div>
			
		</div>


	</header>

	<header class="header-mobile" role="banner">
		<div class="fixed-nav">
			<a href="<?php echo home_url(); ?>" class="site-branding nav-item">
				<img class="mobile-logo" src="<?php echo $imagedir ?>/dod-logo-text-white-abbr.png" alt="Do Over Dogs Logo"/>
			</a>
			<div class="hamburger-helper">
                <div class="hamburger" id="hamburger-6">
                  	<span class="line"></span>
                  	<span class="line"></span>
                 	<span class="line"></span>
                </div> 
            </div>
		</div>
		<div class="dropdown">
			<div class="header__container">
				<nav class="nav-item" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav>
			</div>
		</div>
	</header>

	<div id="content" class="site-content">



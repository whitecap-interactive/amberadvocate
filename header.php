<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package amberadvocate
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'amberadvocate' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="content-channel row">
			<div class="col-sm-3 header-logos">
				<div class="logo-justice"> </div>
				<div class="logo-amber"> </div>
			</div>
			<div class="col-sm-6 main-logo">
				<div class="logo-advocate"><a href="/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-advocate-large.png" width="500" height="70" border="0" alt="AMBER Advocate" /></a></div>
			</div>
			<div class="col-sm-3">
				<div class="social-links">
					<!-- <a href="#"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a> -->
					<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/FB-FindUsonFacebook-online-100.png" /></a>
				</div>
				<div class="mobile-nav-toggle">
					<div id="nav-icon3">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
			</div>
		</div>

		<div class="nav-bar">

			<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
					) );
				?>

		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">



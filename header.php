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
	<a class="skip-link screen-reader-text hidden" href="#content"><?php esc_html_e( 'Skip to content', 'amberadvocate' ); ?></a>

	<header id="masthead" class="site-header header-banner-top" role="banner">
		<div class="login-seach-social-wrapper">
			<div class="login-seach-social">
				<div class="login">
					<a href="">Sign In</a> | <a href="">Join The Email List</a>
				</div>
				<div class="social">
					<i class="fa fa-facebook-square fa-2x"></i>
					<i class="fa fa- fa-2x"></i>
					<i class="fa fa- fa-2x"></i>				
					<i class="fa fa- fa-2x"></i>
					<i class="fa fa- fa-2x"></i>
					<i class="fa fa- fa-2x"></i>
				</div>
			</div>
		</div>
		
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="http://amberadvocate.org/wp-content/uploads/2017/07/amber-advocate-logo.jpg"></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="http://amberadvocate.org/wp-content/uploads/2017/07/amber-advocate-logo.jpg"></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->
		<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'amberadvocate' ); ?></button> -->
		<div class="main-navigation">
			<input type="checkbox" name="mobile-menu-toggle" id="mobile-menu-toggle" class="mobile-menu-box" />
			<nav id="site-navigation" class="horizontal-nav primary-wrapper" role="navigation">
			
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</nav><!-- #site-navigation -->
			<label for="mobile-menu-toggle" class="mobile-menu-label hidden"></label>
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">

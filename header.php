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
				<div class="social">
					<span class="search">
						<form action="<?php echo site_url(); ?>" role="search" method="get" id="searchform" class="searchform">
							<i class="fa fa-search fa-1x"> 
								<input type="text" value="" name="s" id="s" placeholder="What're we looking for ?"/> 
							</i>
							<i class="fa fa-search fa-1x"> 
								<input type="submit" id="searchsubmit" value="Search" />
							</i> 
						</form>
					</span>
					<i class="fa fa-facebook fa-1x"></i>
					<i class="fa fa-instagram fa-1x"></i>
					<i class="fa fa-twitter fa-1x"></i>				
					<i class="fa fa-envelope-o fa-1x"></i>
				</div>
				<div class="login">
					<a href="">Welcome, Guest</a> | <a href="">Login</a>
				</div>
			</div>
		</div>
		
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="http://amberadvocate.org/wp-content/uploads/2017/07/amber-logo-1.png"></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="http://amberadvocate.org/wp-content/uploads/2017/07/amber-logo-1.png"></a></p>
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

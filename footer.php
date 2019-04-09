<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package amberadvocate
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="footer-links">
				<div class="content-channel row">
					<div class="col-sm-8">
						<nav id="bottom-nav" role="navigation">
							<?php wp_nav_menu( array( 
								'theme_location' 	=> 'footer', 
								'menu_class' 		=> 'bottom-menu menu-trigger',
								'container' 		=> false,
								'before'      => '<h3>',
								'after'       => '</h3>',
								'items_wrap'    => '<ul id="%1$s" class="%2$s" rel="bottom">%3$s</ul>'
							) ); ?>
						</nav>
					</div>
					<div class="col-sm-4 footer-login">
						<h3>Partner Portal Login</h3>
						<?php echo do_shortcode('[user-meta-login]');?>
						<?php 
							if ( in_array( 'cart_admin', (array) $user->roles ) ) {
								echo '<a href="/cart-admin/cart-listing/">CART Listing</a>';
							}
						?>
					</div>
				</div>
			</div>
			<div class="footer-logos">
				<div class="footer-logo-justice"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-justice.png" width="73" height="73" border="0" alt="Department of Justice - Office of Justice Programs" /></div>
				<div class="footer-logo-amber"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-amber.png" width="100" height="60" border="0" alt="AMBER Alert" /></div>
				<div class="footer-logo-advocate"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-advocate.png" width="154" height="21" border="0" alt="AMBER Advocate" /></div>
			</div>
			<div class="footer-copyright">
				<!-- &copy; --> <?php echo date("Y");?> AMBER Alert Training and Technical Assistance Program
				<?php 
					if (is_front_page()){
						echo '<p><a href="/terms-of-use-and-privacy-policy/">Terms of Use and Privacy Policy</a></p>';
					}
				?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

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
			<div class="footer-content-container">
				<div class="content-channel row">
					<div class="col-sm-8">
						<div class="footer-logos">
							<div class="footer-logo-justice"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-justice.png" width="100" border="0" alt="Department of Justice - Office of Justice Programs" /></div>
							<div class="footer-logo-amber"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-amber.png" width="130" border="0" alt="AMBER Alert" /></div>
							<div class="footer-address">
								Address goes here.<br />
								555 Turbo Way<br />
								SLC, UT 84121<br /><br />
								<a href="mailto:info@fvtc.edu">info@fvtc.edu</a><br />
								(801) 555-5555
							</div>
						</div>
						<div class="footer-copyright">
							<!-- &copy; --> <?php echo date("Y");?> AMBER Alert Training and Technical Assistance Program
							<?php
								if (is_front_page()){
									echo '<p><a href="/terms-of-use-and-privacy-policy/">Terms of Use and Privacy Policy</a></p>';
								}
							?>
						</div>
					</div>
					<div class="col-sm-4 footer-right-channel">
						<div class="footer-social">
							Social Links
						</div>
						<div class="footer-logo-advocate"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-advocate.png" width="154" height="21" border="0" alt="AMBER Advocate" /></div>
					</div>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

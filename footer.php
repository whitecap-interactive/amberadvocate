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
					<div class="col-sm-9">
						<div class="footer-logos">
							<div class="footer-logo-justice"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-justice.png" width="100" border="0" alt="Department of Justice - Office of Justice Programs" /></div>
							<div class="footer-logo-amber"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-amber.png" width="130" border="0" alt="AMBER Alert" /></div>
							<div class="footer-address">
								AMBER Alert Training & Technical Assistance Program<br />
								P.O. Box 2277<br />
								Appleton, WI 54912-2277<br />
								877-712-6237 (877-71-AMBER)<br />
								<a href="mailto:askamber@fvtc.edu">askamber@fvtc.edu</a>
							</div>
						</div>
						<div class="footer-copyright">
							Copyright &copy; <?php echo date("Y");?> AMBER Alert Training and Technical Assistance Program
							<?php
								if (is_front_page()){
									echo '<p><a href="/terms-of-use-and-privacy-policy/">Terms of Use and Privacy Policy</a></p>';
								}
							?>
						</div>
					</div>
					<div class="col-sm-3 footer-right-channel">
						<div class="footer-social">
							<!--<div class="footer-instagram">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-instagram.png" width="32" border="0" alt="Instagram" />
							</div>
							<div class="footer-twitter">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-twitter.png" width="32" border="0" alt="Twitter" />
							</div>-->
							<div class="footer-facebook">
								<a href="https://www.facebook.com/AMBERAdvocate/" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-facebook.png" width="32" border="0" alt="Facebook" /></a>
							</div>
						</div>
						<div class="footer-logo-advocate"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-advocate.png" width="170" border="0" alt="AMBER Advocate" /></div>
					</div>
				</div>
				<?php
					if (is_front_page()){ ?>
						<div class="home-legal content-channel row">
							<hr />
							<p style="text-align: center;"><small>This resource was prepared under Cooperative Agreement number 2017-MC-FX-K003 from the Office of Justice Programs (OJP), U.S. Department of Justice. Points of view or opinions expressed in this document are those of the authors and do not necessarily represent the official position or policies of OJP or the U.S. Department of Justice.</small></p>


							<hr />
							<p style="text-align: center;"></p>
						</div>
					<?php } ?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

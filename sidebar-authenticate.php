<?php
/**
 * The Partner Portal sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package amberadvocate
 */

?>

	<div class="col-sm-9">

		<div class="partner-portal-login gray">

			<p><strong>This page is only accessible to logged in users.</strong></p>

			<?php echo do_shortcode('[user-meta-login]');?>

		</div>

	</div>

	<div class="col-sm-3">
		<?php get_sidebar('portal'); ?>
	</div>


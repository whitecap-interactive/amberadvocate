<?php
/**
 * The template used for displaying the main Partner Portal page
 *
 * @package amberadvocate
 */
get_header();
?>
<style type="text/css">
	input[type="text"].um_login_field, input[type="password"].um_pass_field{
		width: 100%;
	}
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content-channel channel-padding">
		<header class="entry-header green">
			<h2 class="page-title"><?php the_title(); ?></h2>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>

			<div class="row">

				<div class="col-sm-5">

					<?php echo do_shortcode('[user-meta-login]');?>

				</div>

				<div class="col-sm-4">

					
					
				</div>

				<div class="col-sm-3">
					<?php get_sidebar('portal'); ?>
				</div>
			</div>
			<div class="row">
				<?php echo do_shortcode('[usahtml5map id="0"]');?>
			</div>
		</div><!-- .entry-content -->
	
	</div>
</article><!-- #post-## -->
<?php
get_sidebar();
get_footer();
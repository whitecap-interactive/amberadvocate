<?php
/**
 * The template used for displaying the main Partner Portal page
 *
 * @package amberadvocate
 */
get_header(); ?>

<style type="text/css">
	input[type="text"].um_login_field, input[type="password"].um_pass_field{
		width: 100%;
	}
</style>


<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<header class="post-entry-header green">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->

				<div class="content-channel channel-padding">

					<div class="row">

						<div class="col-sm-9">

							<div class="partner-portal-login gray">

								<?php echo do_shortcode('[user-meta-login]');?>

								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<?php the_content(); ?>
								<?php endwhile; endif; ?>

							</div>

						</div>

						<div class="col-sm-3">
							<?php get_sidebar('portal'); ?>
						</div>
					</div>
					<div class="row">

						

					</div>
				</div><!-- .entry-content -->
				<br clear="all" />
				<div class="full-width-channel select-a-state">
					<h2>Select a state from the map or the dropdown below to see the AMBER Alert Partner information for that state</h2>
					<?php get_sidebar('state-select'); ?>
					<?php echo do_shortcode( '[usahtml5map id="0"]' );?>
				</div>				

			</article><!-- #post-## -->
		
	</main>
</div>

<?php
get_sidebar();
get_sidebar('questions');
get_footer();
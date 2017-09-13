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
		<div class="content-channel channel-padding">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<header class="entry-header green">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="row">
							<div class="col-sm-12">
								<?php the_content(); ?>
							</div>
						</div>
					<?php endwhile; endif; ?>
							

					<div class="row">

						<div class="col-sm-9">

							<div class="partner-portal-login gray">

								<?php echo do_shortcode('[user-meta-login]');?>

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
					<h2>Select a state below to see the AMBER Alert Partner information for that state</h2>
					<?php echo do_shortcode( '[usahtml5map id="0"]' );?>
				</div>				

			</article><!-- #post-## -->
<br clear="all"/>
		</div>
	</main>
</div>

<?php
get_sidebar();
get_sidebar('questions');
get_footer();
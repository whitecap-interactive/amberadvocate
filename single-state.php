<?php
/**
 * The template for displaying a single State post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package amberadvocate
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="content-channel channel-padding">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'state' );

				endwhile; // End of the loop.
				?>
				
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

<?php
/**
 * Template Name: Partner Portal Pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package amberadvocate
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="content-channel channel-padding">
				<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'partner-template' );


					endwhile; // End of the loop.
				?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
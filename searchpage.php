<?php
/*
 * Template Name: Search Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package amberadvocate
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="post-entry-header orange">
				<h1 class="entry-title">Search</h1>
			</header><!-- .page-header -->

			<div class="content-channel channel-padding">

				<div class="aligncenter">

					<?php get_search_form(); ?>

				</div>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_sidebar('questions');
get_footer();

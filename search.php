<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package amberadvocate
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


				<?php
				if ( have_posts() ) : ?>

					<header class="post-entry-header orange">
						<h1 class="entry-title"><?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'amberadvocate' ), '<span>' . get_search_query() . '</span>' );
						?></h1>
					</header><!-- .page-header -->
					<div class="content-channel channel-padding">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

				<div class="search-page">

					<?php get_search_form(); ?>

				</div>

			</div>
		</main><!-- #main -->
	</section><!-- #primary -->



<?php
get_sidebar();
get_sidebar('questions');
get_footer();

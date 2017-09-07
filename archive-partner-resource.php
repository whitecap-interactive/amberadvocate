<?php
/**
 * The template for displaying archive pages
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
				if ( have_posts() ) : ?>

					<header class="entry-header green">
						<h1>Partner Resources</h1>
						<?php
							//the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->
					<table id="partner-table" class="partner-table">
					    <tr>
					        <th><input type="text" id="partner-name-search" onkeyup="partnerSearch('name')" placeholder="Search By Name" title="Type in a name"></th>
					    </tr>  
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'partner-resources' );

						endwhile;
						?>
					</table>
					<?php
					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

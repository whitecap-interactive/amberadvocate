<?php
/**
 * The template for displaying the State archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package amberadvocate
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->



			<table id="organization-table" class="organization-list">
			    <?php

                    // set up our archive arguments
                    $archive_args = array(
                        'post_type' => 'state',    // get only posts
                        'posts_per_page'=> -1,   // this will display all posts on one page
                        'orderby' => 'title',
                        'order'   => 'ASC',
                    );

                    // new instance of WP_Quert
                    $archive_query = new WP_Query( $archive_args );

                  ?>

                <?php /* Start the Loop */ ?>
                <?php while ( $archive_query->have_posts() ) : $archive_query->the_post(); // run the custom loop ?>

                    <?php get_template_part( 'template-parts/content', 'state-list' ); ?>

                <?php endwhile; ?>
                </table>

        <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

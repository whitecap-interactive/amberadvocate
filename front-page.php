<?php
/**
 * The template for displaying a custom home page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package amberadvocate
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="content-channel channel-padding">

<!-- 				<div class="row">
					<div class="col-sm-4">

						<ul class="home-page-menu">
						  <li class="green"><a href="/partner-portal"><i class="fa fa-lg fa-users" aria-hidden="true"></i> Partner Portal</a></li>
						  <li class="dark-orange"><a href="/training-and-events"><i class="fa fa-lg fa-university" aria-hidden="true"></i> Training & Events</a></li>
						  <li class="blue"><a href="#"><i class="fa fa-lg fa-newspaper-o" aria-hidden="true"></i> Featured AMBER News</a></li>
						  <li class="purple"><a href="#"><i class="fa fa-lg fa-smile-o" aria-hidden="true"></i> Faces of the AMBER Alert</a></li>
						  <li class="red"><a href="#"><i class="fa fa-lg fa-road" aria-hidden="true"></i> On the Front Lines</a></li>
						  <li class="yellow"><a href="#"><i class="fa fa-lg fa-globe" aria-hidden="true"></i> AMBER Alert International</a></li>
						  <li class="orange"><a href="#"><i class="fa fa-lg fa-map-marker" aria-hidden="true"></i> AMBER Alert in Indian Country</a></li>
						  <li class="gray"><a href="#"><i class="fa fa-lg fa-caret-square-o-down" aria-hidden="true"></i> AMBER Alert Briefs</a></li>
						</ul>

					</div>
					<div class="col-sm-8">

					</div>
				</div> -->




				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>


			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

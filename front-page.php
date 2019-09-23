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
<!--
 				<div class="row">
					<div class="col-sm-4">

						<ul class="home-page-menu">
						 <li class="dark-orange-border"><a href="/training-resources"> Training & Events</a></li>
						 <li class="green-border"><a href="/category/upcoming-webinars"> Upcoming Webinars</a></li>
						 <li class="blue-border"><a href="/category/amber-news"> Featured AMBER News</a></li>
						 <li class="purple-border"><a href="/category/amber-speaks"> Faces of the AMBER Network</a></li>
						 <li class="red-border"><a href="/amber-alert-network/amber-alert-in-action"> On the Front Lines</a></li>
						 <li class="yellow-border"><a href="/amber-alert-network/amber-alert-in-action"> AMBER Alert International</a></li>
						 <li class="orange-border"><a href="/amber-alert-in-indian-country/"> AMBER Alert in Indian Country</a></li>
						 <li class="gray-border"><a href="/category/briefs"> AMBER Alert Briefs</a></li>
						 <li class="green-border"><a href="/partner-portal"> Partner Portal</a></li>
						 <li class="dark-orange-border"><a href="/category/partner-events"> Partner Events</a></li>
						 <li class="blue-border"><a href="/category/partner-news"> Partner News</a></li>
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
get_sidebar('questions');
get_footer();

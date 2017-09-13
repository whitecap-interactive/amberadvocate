<?php
/**
 * The template for displaying all pages
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

			<?php while ( have_posts() ) : the_post();

				//get_template_part( 'template-parts/content', 'page' ); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="post-entry-header green">
						<?php the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); ?>
						<h3>Get to know your partners in the AMBER Alert Network</h3>
					</header><!-- .entry-header -->

					<div class="content-channel channel-padding">

						<div class="entry-content row">

							<div class="col-sm-9 post-list">

								<?php 

									$amber_speaks_articles = new WP_Query( 'category_name=amber-speaks' );
										
									while ( $amber_speaks_articles->have_posts() ) : $amber_speaks_articles->the_post(); ?>

										<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									
											<?php if ( has_post_thumbnail() ) : ?>
		                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		                                    <?php endif; ?>
		                                    <h3><a href="<?php echo the_permalink();?>"><?php echo the_title(); ?></a></h3>
		                                    <p><?php echo the_excerpt(); ?></p>

	                                	</article>

								<?php endwhile; ?>								

							</div>

							<div class="col-sm-3">



							</div>

						</div><!-- .entry-content -->


					</div>	

				</article><!-- #post-## -->				
					
			<?php endwhile; ?>			

			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_sidebar('questions');
get_footer();


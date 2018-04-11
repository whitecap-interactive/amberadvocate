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

					<header class="post-entry-header orange">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<style type="text/css">

						header.post-entry-header {
							margin: 0;
						}

						.large-counter-container {
							text-align: center;
							width: 100%;
							background: #2f2f2f;
							padding: 2em 1em 1em 1em;
							margin: 0;
						}

					</style>

					<div class="large-counter-container">
						<!-- <img src="https://www.amberadvocate.org/wp-content/uploads/2018/01/910-NCMEC.jpg" width="300" alt="910 Children Recovered With the Help of AMBER Alert"/> -->
						<div class="clock" style="margin: 0 auto; max-width: 210px;"></div>
						<h1 style="text-align: center;"><span style="color: #ffffff;">CHILDREN SAFELY RECOVERED WITH THE HELP OF</span></h1>
						<img src="https://www.amberadvocate.org/wp-content/uploads/2018/01/NEW-AMBER-ALERT-LOGO.png" alt="" width="169" height="136" border="0" alt="AMBER Alert" />
					</div>				

					<div class="content-channel channel-padding">

						<div class="entry-content row">

							<div class="col-sm-6 post-list">

								<header class="post-entry-header red">
									<h2 class="entry-title"><i class="fa fa-lg fa-road" aria-hidden="true"></i> &nbsp; On the Front Lines</h2>
								</header>							

								<?php 

									$front_lines_articles = new WP_Query( 'category_name=on-the-front-lines' );
										
									while ( $front_lines_articles->have_posts() ) : $front_lines_articles->the_post(); ?>

										<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									
											<?php if ( has_post_thumbnail() ) : ?>
		                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		                                    <?php endif; ?>
		                                    <h3><a href="<?php echo the_permalink();?>"><?php echo the_title(); ?></a></h3>
		                                    <p><?php echo the_excerpt(); ?></p>

	                                	</article>

								<?php endwhile; ?>								

							</div>

							<div class="col-sm-6 post-list">

								<header class="post-entry-header yellow">
									<h2 class="entry-title"><i class="fa fa-lg fa-globe" aria-hidden="true"></i> &nbsp; AMBER Alert International</h2>
								</header>

								<?php 

									$international_articles = new WP_Query( 'category_name=international' );
										
									while ( $international_articles->have_posts() ) : $international_articles->the_post(); ?>

										<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									
											<?php if ( has_post_thumbnail() ) : ?>
		                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		                                    <?php endif; ?>
		                                    <h3><a href="<?php echo the_permalink();?>"><?php echo the_title(); ?></a></h3>

		                                    <p><?php echo the_excerpt(); ?></p>

	                                	</article>

								<?php endwhile; ?>

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


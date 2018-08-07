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

			<?php if ( have_posts() ) : ?>

				<header class="post-entry-header">
					<?php 
						//echo '<h1 class="entry-title"><span>' . single_term_title() . '</span></h1>'; 
						the_archive_title( '<h1 class="entry-title"><span>', '</span></h1>' );
						the_archive_description( '<h3>', '</h3>' );
					?>
				</header><!-- .page-header -->


				<div class="content-channel channel-padding">

					<div class="entry-content row">

						<div class="col-sm-8 post-list">


						<?php while ( have_posts() ) : the_post();

							//get_template_part( 'template-parts/content', 'page' ); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
								<?php if ( has_post_thumbnail() ) : ?>
			                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			                    <?php endif; ?>
			                    <h3><a href="<?php echo the_permalink();?>"><?php echo the_title(); ?></a></h3>
			                    <p><?php echo the_excerpt(); ?></p>

			            	</article>

						<?php endwhile;

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif; ?> 

						</div>

						<div class="col-sm-4">
							<?php get_sidebar('posts'); ?>
						</div>

					</div>

				</div>
           	


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_sidebar('spanish-questions');
get_footer();

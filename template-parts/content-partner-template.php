<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package amberadvocate
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header green">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="row">
			

			<div class="col-sm-9">
				<?php the_content(); ?>
			</div>
			<div class="col-sm-3">
				<?php get_sidebar('portal'); ?>
			</div>
				
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

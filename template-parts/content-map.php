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

	<header class="post-entry-header orange">
		<?php
			$subhead = rwmb_meta('amber_subhead');
			if (!empty($subhead)) {
				the_title( '<h1 class="entry-title"><span>', '</span></h1>' );
				echo '<h3>' . rwmb_meta('amber_subhead') . '</h3>';
			} else { the_title( '<h1 class="entry-title">', '</h1>' ); }


		?>

	</header><!-- .entry-header -->

	<div class="content-channel channel-padding">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'amberadvocate' ),
				'after'  => '</div>',
			) );
		?>


		<?php get_sidebar('html5-map'); ?>


	</div><!-- .entry-content -->

</article><!-- #post-## -->

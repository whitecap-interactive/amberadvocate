<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package amberadvocate
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-entry-header">
		<?php
			$subhead = rwmb_meta('amber_subhead');
			if (!empty($subhead)) { 
				the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); 
				echo '<h3>' . rwmb_meta('amber_subhead') . '</h3>'; 
			} else { the_title( '<h1 class="entry-title">', '</h1>' ); }
		?>
	</header><!-- .entry-header -->

	<div class="content-channel channel-padding">
		<div class="row">
			<div class="col-sm-9">
			<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. */
						__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'amberadvocate' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				/*wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'amberadvocate' ),
					'after'  => '</div>',
				) );*/
			?>
			</div>
			<div class="col-sm-3">
				<?php get_sidebar('posts'); ?>
			</div>

	</div><!-- .entry-content -->

</article><!-- #post-## -->

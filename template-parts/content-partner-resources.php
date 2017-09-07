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
	<header class="entry-header ">
		<?php

			$files = rwmb_meta( 'amber_file_advanced',  $post_id = get_the_ID() ); // Since 4.8.0
						
			if ( !empty( $files ) ) {
		        foreach ($files as $key => $ids) {
		        	$doc_url = $ids["url"];
		        }
			}


			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :

				the_title( '<h2 class="entry-title"><a target="_blank" href="' . esc_url( $doc_url ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php amberadvocate_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->

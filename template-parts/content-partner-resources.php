<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package amberadvocate
 */

?>


<?php

	$files = rwmb_meta( 'amber_file_advanced',  $post_id = get_the_ID() ); // Since 4.8.0
				
	if ( !empty( $files ) ) {
        foreach ($files as $key => $ids) {
        	$doc_url = $ids["url"];
        }
	}

	
	if ($doc_url) {
		the_title( '<tr><td><a target="_blank" href="' . esc_url( $doc_url ) . '" rel="bookmark">', '</a></td></tr>' );
	}else{
		the_title( '<tr><td>', ' - No Attachment Found</td></tr>' );
	}


	if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php amberadvocate_posted_on(); ?>
		</div><!-- .entry-meta -->
	<?php
	endif; 
?>


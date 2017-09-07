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

	$files = rwmb_meta( 'amber_file_advanced',  $post_id = get_the_ID() );

	if ( !empty( $files ) ) {
        foreach ($files as $key => $ids) {
        	$doc_url = $ids["url"];
        	$doc_state = rwmb_meta( 'amber_state_select',  $post_id = $ids["ID"] ); 
        	$doc_region = rwmb_meta( 'amber_region_select',  $post_id = $ids["ID"] );
        	$doc_date = rwmb_meta( 'amber_submitted_date',  $post_id = $ids["ID"] );
        	$doc_submitter = rwmb_meta( 'amber_uploaded_by_text',  $post_id = $ids["ID"] ); 
        }
	}


/*	echo '<pre>';
	var_dump($ids['ID']);
	echo '</pre>';*/

	if ($doc_url) {
		//the_title( '<tr><td><a target="_blank" href="' . esc_url( $doc_url ) . '" rel="bookmark">', '</a></td></tr>' );
		echo '<tr><td><a target="_blank" href="' . esc_url( $doc_url ) . '" rel="bookmark">';
		the_title();
		echo '</a></td>';
		echo '<td>';
		echo $doc_state;
		echo '</td>';
		echo '<td>';
		echo $doc_region;
		echo '</td>';
		echo '<td>';
		echo $doc_date;
		echo '</td>';
		echo '<td>';
		echo $doc_submitter;
		echo '</td>';
		echo '</tr>';
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


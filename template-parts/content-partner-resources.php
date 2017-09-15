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

	if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php amberadvocate_posted_on(); ?>
		</div><!-- .entry-meta -->
	<?php
	endif; 
?>


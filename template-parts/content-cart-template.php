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

    <header class="post-entry-header purple">
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
			

			<div class="col-sm-12">
				<?php the_content(); ?>
			</div>
			<!-- <div class="col-sm-3">
				<?php get_sidebar('cart'); ?>
			</div> -->
				
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

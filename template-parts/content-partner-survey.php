<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package amberadvocate
 */

?>
<style type="text/css">
    .smcx-widget.smcx-embed{
        margin:0 auto !important;
        min-height: 1400px;
    }
    .smcx-embed>.smcx-iframe-container{
        min-height: 1400px;
    }
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="post-entry-header green">
        <h1>Tell Us What You Think</h1>
        <?php
            /*$subhead = rwmb_meta('amber_subhead');
            if (!empty($subhead)) { 
                the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); 
                echo '<h3>' . rwmb_meta('amber_subhead') . '</h3>'; 
            } else { the_title( '<h1 class="entry-title">', '</h1>' ); }*/
        ?>
    </header><!-- .entry-header -->


	<div class="content-channel channel-padding">
		<div class="row change-direction">
			<?php if ( is_user_logged_in() ) { ?>
            <?php
                /*$value = rwmb_meta( 'amber_survey_textarea');
                echo '<h1>' . $value . '</h1>';*/
            ?>

				<script>(function(t,e,s,n){var o,a,c;t.SMCX=t.SMCX||[],e.getElementById(n)||(o=e.getElementsByTagName(s),a=o[o.length-1],c=e.createElement(s),c.type="text/javascript",c.async=!0,c.id=n,c.src=["https:"===location.protocol?"https://":"http://","widget.surveymonkey.com/collect/website/js/tRaiETqnLgj758hTBazgdw6wwMZ8LW8ULyMBQgqiDwGEk5LL7_2Fy_2FFd_2BveD1_2FnKlI.js"].join(""),a.parentNode.insertBefore(c,a))})(window,document,"script","smcx-sdk");</script><a style="font: 12px Helvetica, sans-serif; color: #999; text-decoration: none;" href=https://www.surveymonkey.com> Create your own user feedback survey </a>

			<?php } else { 
				get_sidebar('authenticate'); 
			}
			?>
				
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

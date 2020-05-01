<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package amberadvocate
 */
$user = wp_get_current_user();
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
				<?php 
				    if( is_user_logged_in() && 
		                in_array( 'aattap_liaison', (array) $user->roles)  ||
		                in_array( 'administrator', (array) $user->roles) ||
		                in_array( 'liaison_admin', (array) $user->roles)
		            ){ 
			    ?>

				<div class="col-sm-12">
					
					<?php if (in_array( 'aattap_liaison', (array) $user->roles)) {?>
						<p style="text-align: center;"><a href="/liaison/liaison-listing/" class="question-button button-lg light-orange" ><span><span style="font-size:1.4em;font-weight:bold;">&#171;</span> &nbsp; Back to liaison records</span></a></p>
					 <?php }else{ ?>
						<p style="text-align: center;"><a href="/liaison/liaison-listing/" class="question-button button-lg light-orange" ><span><span style="font-size:1.4em;font-weight:bold;">&#171;</span> &nbsp; Back to your liaison records</span></a></p> 
					<?php } ?>
					
					

					<hr />

					<?php 
						echo do_shortcode('[mb_frontend_form id="liaison_record_metabox" allow_delete="true" delete_confirmation="Your post has been deleted." edit="true" post_fields="title" label_title="Title"]');
					?>

					<?php the_content(); ?>
					
					<?php if (in_array( 'aattap_liaison', (array) $user->roles)) {?>
						<p style="text-align: center;"><a href="/liaison/liaison-listing/" class="question-button button-lg light-orange" ><span><span style="font-size:1.4em;font-weight:bold;">&#171;</span> &nbsp; Back to liaison records</span></a></p>
					 <?php }else{ ?>
						<p style="text-align: center;"><a href="/liaison/liaison-listing/" class="question-button button-lg light-orange" ><span><span style="font-size:1.4em;font-weight:bold;">&#171;</span> &nbsp; Back to your liaison records</span></a></p> 
					<?php } ?>

				</div>
				<!-- <div class="col-sm-3">
					<?php get_sidebar('cart'); ?>
				</div> -->
				<?php }else{echo "<h2>Sorry, you don't have permission to view this page</h2>";
			}?>	
			</div>
		</div><!-- .entry-content -->

	</article><!-- #post-## -->


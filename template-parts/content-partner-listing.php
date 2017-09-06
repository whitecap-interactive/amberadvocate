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
			<?php if ( is_user_logged_in() ) { ?>

				<div class="col-sm-12">
					<table class="partner-table">
						<tr>
							<th><strong>Name</strong></th>
							<th><strong>State</strong></th>
							<th><strong>Region</strong></th>
						</tr>
					<?php
						$partners = get_users( 'blog_id=1&orderby=nicename&role=partner' );
					    foreach ( $partners as $partner ) {
					    	$partner_state_name = get_user_meta($partner->ID, 'state', true);
				    		if ( $post = get_page_by_path( $partner_state_name, OBJECT, 'state' ) ){
				    			$state_id = $post->ID;
				    		}    
							else{
								$state_id = 0;
							}	
							$region = rwmb_meta( 'amber_region', $args = array(), $state_id );
					    	echo '<tr>' .
					    		 '<td><a href="' . get_author_posts_url( $partner->ID ) . '">' . $partner->user_firstname . ' ' . $partner->user_lastname . '</a></td>'.
					    		 '<td>' . $partner_state_name . '</td>' . 
					    		 //'<td>State ID: ' . $state_id . '</td>' .
					    		 '<td>' . $region . '</td>' .
					    		 '</tr>';
					    }  
					?>
					</table>
				</div>
				<!-- <div class="col-sm-6">

				</div> -->

			<?php } else { 
				get_sidebar('authenticate'); 
			}
			?>
				
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

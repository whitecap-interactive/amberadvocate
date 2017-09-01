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

	<div class="content-channel channel-padding">
	<header class="entry-header green">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="row">
			<div class="col-sm-6">
				<table class="partner-table">
				<?php
					the_content();
					$partners = get_users( 'blog_id=1&orderby=nicename&role=partner' );
				    foreach ( $partners as $partner ) {
				    	$partner_state_name = get_user_meta($partner->ID, 'your_state', true);
			    		if ( $post = get_page_by_path( $partner_state_name, OBJECT, 'state' ) ){
			    			$state_id = $post->ID;
			    		}    
						else{
							$state_id = 0;
						}	
						$region = rwmb_meta( 'amber_region', $args = array(), $state_id );
				    	echo '<tr>' .
				    		 '<td>' . $partner->user_firstname . ' ' . $partner->user_lastname . '</td>' .
				    		 //'<td>Partner ID: ' . $partner->ID . '</td>' .
				    		 '<td>State: ' . $partner_state_name . '</td>' . 
				    		 //'<td>State ID: ' . $state_id . '</td>' .
				    		 '<td>Region: ' . $region . '</td>' .
				    		 '</tr>';
				    }  
				?>
				</table>
			</div>
			<div class="col-sm-6">

			</div>
		</div>
	</div><!-- .entry-content -->
</div>

</article><!-- #post-## -->

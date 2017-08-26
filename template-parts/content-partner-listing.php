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
					$partner_contacts = array(); 
				    foreach ( $partners as $partner ) {
				    	/*$partner_contacts[$partner->user_nicename] = $partner->user_firstname . ' ' . $partner->user_lastname ;*/
				    	$partner_state_name = get_user_meta($partner->ID, 'your_state', true);
			    		if ( $post = get_page_by_path( $partner_state_name, OBJECT, 'state' ) ){
			    			$id = $post->ID;
			    		}    
						else{
							$id = 0;
						}	  
				    	echo '<tr>' .
				    		 '<td>' . $partner->user_firstname . ' ' . $partner->user_lastname . '</td>' .
				    		 '<td>Partner ID: ' . $partner->ID . '</td>' .
				    		 '<td>State Name: ' . $partner_state_name . '</td>' . 
				    		 '<td>State ID: ' . $id/*get_user_meta($partner->ID, 'your_state', true)*/ . '</td>' .
				    		 '</tr>';

				    	// NEED TO GET REGION STATE IS ASSOCIATED WITH

				    }  

					//var_dump($partner_contacts);

				?>
				</table>
			</div>
		</div>
	</div><!-- .entry-content -->
</div>

</article><!-- #post-## -->

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
				    	$partner_contacts[$partner->user_nicename] = $partner->user_firstname . ' ' . $partner->user_lastname ;
				    	$partner_state = get_user_meta($partner->ID, 'your_state', true);
				    	foreach ($partner_state as $state_id) {
				    		if ( $post = get_page_by_path( $state_id, OBJECT, 'state' ) )
								    $id = $post->ID;
								else
								    $id = 0;
				    	}
				    	echo '<tr>' .
				    		 '<td>' . $partner->user_firstname . ' ' . $partner->user_lastname . '</td>' .
				    		 '<td>Partner ID: ' . $partner->ID . '</td>' .
				    		 '<td>' . $partner_state . '</td>' . 
				    		 '<td>' . get_user_meta($partner->ID, 'your_state', true) . '</td>' .
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

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
				    	echo '<tr>' .
				    		 '<td>' . $partner->user_firstname . ' ' . $partner->user_lastname . '</td>' .
				    		 '<td>NEED STATE</td>' . 
				    		 '<td>NEED REGION</td>' .
				    		 '</tr>';

				    	// NEED TO GET STATE USER IS ASSIGNED TO

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

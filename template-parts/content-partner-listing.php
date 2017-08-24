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
		<table>
		<?php
			the_content();

			$partners = get_users( 'blog_id=1&orderby=nicename&role=partner' );
			$partner_contacts = array();  

		    foreach ( $partners as $partner ) {
		    	$partner_contacts[$partner->user_nicename] = $partner->user_firstname . ' ' . $partner->user_lastname ;
		    	echo '<tr><td>' . $partner->user_firstname . ' ' . $partner->user_lastname . '</td></tr>';
		    }    
    
			//var_dump($partner_contacts);

		?>
	</table>
	</div><!-- .entry-content -->
</div>

</article><!-- #post-## -->

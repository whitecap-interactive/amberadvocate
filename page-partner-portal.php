<?php
/**
 * The template used for displaying the main Partner Portal page
 *
 * @package amberadvocate
 */
get_header();
?>
<style type="text/css">
	input[type="text"].um_login_field, input[type="password"].um_pass_field{
		width: 100%;
	}
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="page-title"><?php the_title(); ?></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

		<?php echo do_shortcode('[user-meta-login]');?>

		<div><a href="<?php echo site_url(); ?>/states/">View States</a></div>
		<div><a href="<?php echo site_url(); ?>/patner-portal/request-access/">Request Access</a></div>
	</div><!-- .entry-content -->
	
	<?php edit_post_link( __( 'Edit', 'amberadvocate' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
<?php
get_sidebar();
get_footer();
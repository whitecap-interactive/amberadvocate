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
	<div class="content-channel channel-padding">
		<header class="entry-header green">
			<h2 class="page-title"><?php the_title(); ?></h2>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>

			<div class="row">

				<div class="col-sm-5">

					<?php echo do_shortcode('[user-meta-login]');?>

				</div>

				<div class="col-sm-4">

					
					
				</div>

				<div class="col-sm-3">
					<h3>Partner Portal Links</h3>

					<ul class="partner-links">
						<li><i class="fa fa-cog" aria-hidden="true"></i><a href="#">Partner Dashboard</a></li>
						<li><i class="fa fa-address-book" aria-hidden="true"></i><a href="#">Partner Listing</a></li>
						<li><i class="fa fa-folder-open" aria-hidden="true"></i><a href="#">State Directory</a></li>
						<li><i class="fa fa-file-o" aria-hidden="true"></i><a href="#">Submit a Document</a></li>
						<li><i class="fa fa-inbox" aria-hidden="true"></i><a href="#">Contact Us</a></li>
						<li><i class="fa fa-map-o" aria-hidden="true"></i><a href="<?php echo site_url(); ?>/amber-alert-network/meet-our-partners/">View States</a></li>
						<li><i class="fa fa-key" aria-hidden="true"></i><a href="<?php echo site_url(); ?>/patner-portal/request-access/">Request Access</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<?php echo do_shortcode('[usahtml5map id="0"]');?>
			</div>
		</div><!-- .entry-content -->
	
	</div>
</article><!-- #post-## -->
<?php
get_sidebar();
get_footer();
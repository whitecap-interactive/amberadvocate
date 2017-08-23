<?php
/**
 * Template part for displaying state content in single-state.php
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
			
			<?php
				
				the_content();
				
			?>

			<div class="state-meta row">
				<div class="col-sm-9">

					<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td>Partner's Region</td>
							<td><?php echo rwmb_meta('amber_region');?></td>
						</tr>
						<!-- <tr>
							<td>Partner's Employing Agency</td>
							<td><?php echo rwmb_meta('amber_employing_agency');?></td>
						</tr> -->
						<tr>
							<td>Primary AMBER Alert Program or  Missing Persons Clearinghouse Program Phone Number</td>
							<td><?php echo rwmb_meta('amber_primary_phone');?></td>
						</tr>
						<tr>
							<td>Secondary or Alternate AMBER Alert Program or  Missing Persons Clearinghouse Program Phone Number</td>
							<td><?php echo rwmb_meta('amber_secondary_phone');?></td>
						</tr>
						<tr>
							<td>Alert Program or  Missing Persons Clearinghouse Program Email</td>
							<td><?php echo rwmb_meta('amber_email');?></td>
						</tr>
						<tr>
							<td>Missing Persons Clearinghouse Program Website</td>
							<td><a href="<?php echo rwmb_meta('amber_mpcp_website');?>" target="_blank"><?php echo rwmb_meta('amber_mpcp_website');?></a></td>
						</tr>
						<tr>
							<td>AMBER Alert Program Website</td>
							<td><a href="<?php echo rwmb_meta('amber_program_website');?>" target="_blank"><?php echo rwmb_meta('amber_program_website');?></a></td>
						</tr>
					</table>

			</div>

			<div class="col-sm-3">
				<h3>Partner Portal Links</h3>
				<ul>
					<li><a href="#">Partner Dashboard</a></li>
					<li><a href="#">State Directory</a></li>
					<li><a href="#">Submit a Document</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
			</div>
				
		</div><!-- .entry-content -->
	</div>
</div>

<div class="full-width-channel select-a-state">
	<h2>Select a state below to see the AMBER Alert Partner information for that state</h2>
	<?php echo do_shortcode( '[usahtml5map id="0"]' );?>
</div>
</article><!-- #post-## -->

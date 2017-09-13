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

	
	<header class="entry-header orange">
		<?php the_title( '<h1 class="entry-title">', '<span class="region alignright">Region: ' . rwmb_meta('amber_region') . '</span></h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		
		<?php
			
			the_content();
			
		?>

		<div class="state-meta row">
			<div class="col-sm-12">

				<table cellpadding="0" cellspacing="0" border="0" class="partner-table">
					<!-- <tr>
						<td>AMBER Alert Region</td>
						<td><?php echo rwmb_meta('amber_region');?></td>
					</tr> -->
					<tr>
						<th colspan="2"><strong>AMBER Alert Program</strong></th>
					</tr>
					<tr>
						<td>AMBER Alert Program Phone Number</td>
						<td><?php echo rwmb_meta('amber_program_phone');?></td>
					</tr>
					<tr>
						<td>AMBER Alert Program Email</td>
						<td><?php echo rwmb_meta('amber_program_email');?></td>
					</tr>
					<tr>
						<td>AMBER Alert Program Website</td>
						<td style="text-align:center;">
							<?php if (!empty(rwmb_meta('amber_program_website'))) { echo '<a class="button light-orange" href="' . rwmb_meta('amber_program_website') . '" target="_blank">Website</a>'; } ?>
						</td>
					</tr>
				</table>
				<table cellpadding="0" cellspacing="0" border="0" class="partner-table">
					<tr>
						<th colspan="2"><strong>Missing Persons Clearinghouse Program</strong></th>
					</tr>
					<tr>
						<td>Missing Persons Clearinghouse Program Phone Number</td>
						<td><?php echo rwmb_meta('amber_mpch_phone');?></td>
					</tr>
					<tr>
						<td>Missing Persons Clearinghouse Program Email</td>
						<td><?php echo rwmb_meta('amber_mpch_email');?></td>
					</tr>
					<tr>
						<td>Missing Persons Clearinghouse Program Website</td>
						<td style="text-align:center;">
							<?php if (!empty(rwmb_meta('amber_mpch_website'))) { echo '<a class="button light-orange" href="' . rwmb_meta('amber_mpch_website') . '" target="_blank">Website</a>'; } ?>
						</td>
					</tr>
				</table>

			</div>

			<!-- <div class="col-sm-3">
				<?php get_sidebar('portal'); ?>
			</div> -->

		</div>
			
	</div><!-- .entry-content -->
	

	<div class="full-width-channel select-a-state">
		<h2>Select a state below to see the AMBER Alert Partner information for that state</h2>
		<?php echo do_shortcode( '[usahtml5map id="0"]' );?>
	</div>
	
</article><!-- #post-## -->

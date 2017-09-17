<?php
/**
 * Template part for displaying state content in single-state.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package amberadvocate
 */

?>

<?php
	$region = rwmb_meta('amber_region'); 
	if ( $region == '1') { $region_color = 'red'; }
	else if ( $region == '2') { $region_color = 'green'; }
	else if ( $region == '3') { $region_color = 'dark-orange'; }
	else if ( $region == '4') { $region_color = 'blue'; }
	else if ( $region == '5') { $region_color = 'purple'; }	
	else { $region_color = 'orange'; }

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	
	<header class="post-entry-header <?php echo $region_color; ?>">
		<?php the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); ?>
		<?php echo '<h3>Region: ' . rwmb_meta('amber_region') . '</h3>'; ?>
	</header><!-- .entry-header -->

	<div class="content-channel channel-padding">
		
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
						<td><a href="mailto:<?php echo rwmb_meta('amber_program_email');?>" target="_blank"><?php echo rwmb_meta('amber_program_email');?></a></td>
					</tr>
					<tr>
						<td>AMBER Alert Program Website</td>
						<td>
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
						<td><a href="mailto:<?php echo rwmb_meta('amber_mpch_email');?>" target="_blank"><?php echo rwmb_meta('amber_mpch_email');?></a></td>
					</tr>
					<tr>
						<td>Missing Persons Clearinghouse Program Website</td>
						<td>
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
		<h2>Select a state from the map or the dropdown below to see the AMBER Alert Partner information for that state</h2>
		<?php get_sidebar('state-select'); ?>
		<?php echo do_shortcode( '[usahtml5map id="0"]' );?>
	</div>
	
</article><!-- #post-## -->

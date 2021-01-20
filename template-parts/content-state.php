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

				<?php if (!empty(rwmb_meta('amber_amberic_phone')) || !empty(rwmb_meta('amber_amberic_email')) || !empty(rwmb_meta('amber_amberic_website'))) { ?>
					<table cellpadding="0" cellspacing="0" border="0" class="partner-table">
						<tr>
							<th colspan="2"><strong>Amber Alert In Indian Country Contact</strong></th>
						</tr>
						<tr>
							<td>Amber Alert In Indian Country Phone Number</td>
							<td><?php echo rwmb_meta('amber_amberic_phone');?></td>
						</tr>
						<tr>
							<td>Amber Alert In Indian Country Email</td>
							<td><a href="mailto:<?php echo rwmb_meta('amber_amberic_email');?>" target="_blank"><?php echo rwmb_meta('amber_amberic_email');?></a></td>
						</tr>
						<tr>
							<td>Amber Alert In Indian Country Website</td>
							<td>
							<?php if (!empty(rwmb_meta('amber_amberic_website'))) { echo '<a class="button light-orange" href="' . rwmb_meta('amber_amberic_website') . '" target="_blank">Website</a>'; } ?>
						</td>
						</tr>
					</table>
				<?php } ?>

				<?php if (!empty(rwmb_meta('amber_notes'))) { ?>
				<table cellpadding="0" cellspacing="0" border="0" class="partner-table">
					<tr>
						<th><strong>Additional Notes</strong></th>
					</tr>
					<tr>
						<td><?php echo rwmb_meta('amber_notes');?></td>
					</tr>
				</table>
				<?php } ?>
			</div>

			<!-- <div class="col-sm-3">
				<?php get_sidebar('portal'); ?>
			</div> -->

		</div>

	</div><!-- .entry-content -->


	<div class="full-width-channel select-a-state">
		<h2>Select a state from the map or the dropdown below to see the AMBER Alert Partner information for that state</h2>

		<div>
		  <div style="display:inline; float:left; width: 75%;">
		    <!-- <h3>Select a state from the dropdown or click on the map below.</h3> -->
		    <?php get_sidebar('state-select') ?>
		  </div>
		  <div style="display:inline; float:left;">
		    <h3 class="widget-title">Legend</h3>
		    <div style="display: inline; float: left; width: 30px; height: 30px; background: #B61C1C;"></div>
		    <div style="display: inline; padding: 0 0 0 6px;">Region 1</div>
		    <div class="clearfix"></div>
		    <div style="display: inline; float: left; width: 30px; height: 30px; background: #1B7E3B;"></div>
		    <div style="display: inline; padding: 0 0 0 6px;">Region 2</div>
		    <div class="clearfix"></div>
		    <div style="display: inline; float: left; width: 30px; height: 30px; background: #CE6615;"></div>
		    <div style="display: inline; padding: 0 0 0 6px;">Region 3</div>
		    <div class="clearfix"></div>
		    <div style="display: inline; float: left; width: 30px; height: 30px; background: #1954DB;"></div>
		    <div style="display: inline; padding: 0 0 0 6px;">Region 4</div>
		    <div class="clearfix"></div>
		    <div style="display: inline; float: left; width: 30px; height: 30px; background: #5B3160;"></div>
		    <div style="display: inline; padding: 0 0 0 6px;">Region 5</div>
		  </div>
		</div>
		<?php //get_sidebar('state-select'); ?>
		<?php get_sidebar('html5-map'); ?>
		<?php //echo do_shortcode( '[usahtml5map id="0"]' );?>
	</div>

</article><!-- #post-## -->

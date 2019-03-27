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
	$region = rwmb_meta('cart_region'); 
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
		<?php echo '<h3>Region: ' . rwmb_meta('cart_region') . ' &nbsp; | &nbsp; State: ' . rwmb_meta('cart_state_select') . '</h3>'?>
	</header><!-- .entry-header -->

	<div class="content-channel channel-padding">
		
		<?php
			
			// the_content();
			
		?>

		<div class="cart-meta row">
			<div class="col-sm-12">

				<table cellpadding="0" cellspacing="0" border="0" class="partner-table">
					<!-- <tr>
						<td>AMBER Alert Region</td>
						<td><?php echo rwmb_meta('amber_region');?></td>
					</tr> -->
					<tr>
						<th colspan="2"><strong>CART Information</strong></th>
					</tr>
					<tr>
						<td>CART Coordinator Name</td>
						<td><?php echo rwmb_meta('cart_first_name');?> <?php echo rwmb_meta('cart_last_name');?></td>
					</tr>
					<tr>
						<td>CART Coordinator Email</td>
						<td><a href="mailto:<?php echo rwmb_meta('cart_email');?>" target="_blank"><?php echo rwmb_meta('cart_email');?></a></td>
					</tr>
					<tr>
						<td>CART Physical Address</td>
						<td><?php echo rwmb_meta('cart_address');?></td>
					</tr>
					<tr>
						<td>Program Primary Contact Phone</td>
						<td><?php echo rwmb_meta('cart_primary_phone');?></td>
					</tr>
					<tr>
						<td>Is the CART active?</td>
						<td><?php echo rwmb_meta('cart_active');?></td>
					</tr>
					<tr>
						<td>Is the CART certified?</td>
						<td><?php echo rwmb_meta('cart_certified');?></td>
					</tr>
					<tr>
						<td>Date of original certification</td>
						<td><?php echo rwmb_meta('cart_certification_date');?></td>
					</tr>
					<tr>
						<td>Has the CART recertified?</td>
						<td><?php echo rwmb_meta('cart_recertified');?></td>
					</tr>
					<tr>
						<td>Date of CART recertification</td>
						<td><?php echo rwmb_meta('cart_recertification_date');?></td>
					</tr>
					<tr>
						<td>Cart Type</td>
						<td><?php echo rwmb_meta('cart_type');?></td>
					</tr>
					<tr>
						<td>Tribal Affiliation</td>
						<td><?php echo rwmb_meta('cart_tribal_affiliation');?></td>
					</tr>
					<tr>
						<td>Tribal Organization Name</td>
						<td><?php echo rwmb_meta('cart_tribal_organization');?></td>
					</tr>
					<tr>
						<td>Number of Agencies</td>
						<td><?php echo rwmb_meta('cart_number_agencies');?></td>
					</tr>
					<tr>
						<td>Names of Agencies in CART</td>
						<td><?php echo rwmb_meta('cart_agency_names');?></td>
					</tr>
				</table>

				

				<table cellpadding="0" cellspacing="0" border="0" class="partner-table">
					<tr>
						<th colspan="2"><strong>AATTAP Liaison Activity Reporting</strong></th>
					</tr>
				</table>

				<?php 
					$annual_reports = rwmb_meta( 'annual_activity_reporting' );
					if ( ! empty( $annual_reports ) ) {
					    foreach ( $annual_reports as $annual_report ) {
					        $liason_name = isset( $annual_report['cart_liason_name'] ) ? $annual_report['cart_liason_name'] : '';
					        $liason_region = isset( $annual_report['cart_liason_region'] ) ? $annual_report['cart_liason_region'] : '';
					        $liason_year = isset( $annual_report['cart_liason_activity_year'] ) ? $annual_report['cart_liason_activity_year'] : '';
					        $liason_first_six_method = isset ( $annual_report['cart_liason_first_six_method'] ) ? $annual_report['cart_liason_first_six_method'] : '';
					        $liason_first_six_member = isset ( $annual_report['cart_liason_first_six_member'] ) ? $annual_report['cart_liason_first_six_member'] : '';
					        $liason_first_six_training = isset ( $annual_report['cart_liason_first_six_training'] ) ? $annual_report['cart_liason_first_six_training'] : '';
					        $liason_first_six_notes = isset ( $annual_report['cart_liason_first_six_notes'] ) ? $annual_report['cart_liason_first_six_notes'] : '';
					        $liason_second_six_method = isset ( $annual_report['cart_liason_second_six_method'] ) ? $annual_report['cart_liason_second_six_method'] : '';
					        $liason_second_six_member = isset ( $annual_report['cart_liason_second_six_member'] ) ? $annual_report['cart_liason_second_six_member'] : '';
					        $liason_second_six_training = isset ( $annual_report['cart_liason_second_six_training'] ) ? $annual_report['cart_liason_second_six_training'] : '';
					        $liason_second_six_notes = isset ( $annual_report['cart_liason_second_six_notes'] ) ? $annual_report['cart_liason_second_six_notes'] : '';
					        ?>
					    <table cellpadding="0" cellspacing="0" border="0" class="partner-table sub-table">	
					        <tr>
								<th colspan="2"><strong>Annual Reporting: <?php echo $liason_year; ?> &nbsp; | &nbsp; Region: <?php echo $liason_region; ?> &nbsp; | &nbsp; Liason Name: <?php echo $liason_name; ?></strong></th>
							</tr>
							<tr>
								<th colspan="2">First Six Months</th>
							</tr>
							<tr>
								<td>Method</td>
								<td><?php echo $liason_first_six_method; ?></td>
							</tr>
							<tr>
								<td>CART Member Contacted</td>
								<td><?php echo $liason_first_six_member; ?></td>
							</tr>
							<tr>
								<td>Training requested?</td>
								<td><?php echo $liason_first_six_training; ?></td>
							</tr>
							<tr>
								<td>Notes</td>
								<td><?php echo $liason_first_six_notes; ?></td>
							</tr>
							<tr>
								<th colspan="2">Second Six Months</th>
							</tr> 
							<tr>
								<td>Method</td>
								<td><?php echo $liason_second_six_method; ?></td>
							</tr>
							<tr>
								<td>CART Member Contacted</td>
								<td><?php echo $liason_second_six_member; ?></td>
							</tr>
							<tr>
								<td>Training requested?</td>
								<td><?php echo $liason_second_six_training; ?></td>
							</tr>
							<tr>
								<td>Notes</td>
								<td><?php echo $liason_second_six_notes; ?></td>
							</tr>							
						</table>
							
					    <?php 
					    }
					}

				?>	

				</table>
				
			</div>

			<!-- <div class="col-sm-3">
				<?php get_sidebar('portal'); ?>
			</div> -->

		</div>
			
	</div><!-- .entry-content -->
	

	
</article><!-- #post-## -->

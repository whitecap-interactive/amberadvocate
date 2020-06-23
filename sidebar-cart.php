<?php
/**
 * The Partner Portal sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package amberadvocate
 */

?>

<?php
	$user = wp_get_current_user();
	if ( in_array( 'cart_admin', (array) $user->roles ) ) { ?>

		<div class="partner-links-container">

			<h3>CART Database Links</h3>

			<ul class="partner-links">
				<li><i class="fa fa-address-book" aria-hidden="true"></i><a href="/cart-admin/cart-listing">CART Listing</a></li>
				<li><i class="fa fa-file-o" aria-hidden="true"></i><a href="/cart-admin/add-edit-cart">Add a CART</a></li>
				<li><i class="fa fa-file-o" aria-hidden="true"></i><a href="https://www.amberadvocate.org/wp-content/uploads/2020/06/CART-Assessor-Guide-FINAL.pdf " target="_blank">CART Assessor Guide</a></li>
				<li><i class="fa fa-file-o" aria-hidden="true"></i><a href="https://www.amberadvocate.org/wp-content/uploads/2020/06/CART_Assessor_Field_Checklist_fillable.pdf" target="_blank">Field Exercise – Assessor’s Detailed Checklist</a></li>
				<li><i class="fa fa-file-o" aria-hidden="true"></i><a href="https://www.amberadvocate.org/wp-content/uploads/2020/06/CART_Field_Exercise_Assessor_SUMMARY_FINDINGS_fillable.pdf" target="_blank">Field Exercise – Assessor’s SUMMARY Findings Report</a></li>
				<li><i class="fa fa-file-o" aria-hidden="true"></i><a href="https://www.amberadvocate.org/wp-content/uploads/2018/03/CART-Standard-Compliance-Document-fillable.pdf" target="_blank">CART Standard Compliance Document</a></li>
				<li><i class="fa fa-file-o" aria-hidden="true"></i><a href="https://www.amberadvocate.org/wp-content/uploads/2020/06/CART-Member-Interview-Form-fillable-1.pdf" target="_blank">CART Member Interview Form</a></li>
			</ul>


		</div>

<?php } ?>

<?php
	if ( in_array( 'aattap_liaison', (array) $user->roles) ) { ?>

		<div class="partner-links-container">

			<h3>Liaison Database Links</h3>

			<ul class="partner-links">
				<li><i class="fa fa-address-book" aria-hidden="true"></i><a href="/liaison/liaison-listing?show_all=true">Liaison Listing</a></li>
				<li><i class="fa fa-file-o" aria-hidden="true"></i><a href="/liaison/add-edit-liaison-record">Add a Liaison Record</a></li>
			</ul>


		</div>

<?php } ?>


<?php
	if ( in_array( 'liaison_admin', (array) $user->roles) ) { ?>

		<div class="partner-links-container">

			<h3>Liaison Admin Links</h3>

			<ul class="partner-links">
				<li><i class="fa fa-address-book" aria-hidden="true"></i><a href="/liaison/liaison-listing">Liaison Listing</a></li>
			</ul>


		</div>

<?php } ?>

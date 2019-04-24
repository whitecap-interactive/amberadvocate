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
			</ul>


		</div>

<?php } ?>
<?php
/**
 * The Partner Portal sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package amberadvocate
 */

?>

<div class="partner-links-container">

	<h3>Partner Portal Links</h3>

	<?php if ( is_user_logged_in() ) { ?>

		<ul class="partner-links">
			<li><i class="fa fa-address-book" aria-hidden="true"></i><a href="/partner-portal/partner-listing">Partner Listing</a></li>
			<li><i class="fa fa-folder-open" aria-hidden="true"></i><a href="/partner-resources/">Partner Resources</a></li>
			<li><i class="fa fa-play-circle" aria-hidden="true"></i><a href="/partner-portal/videos-and-webinars/">Partner Videos & Webinars</a></li>
			<li><i class="fa fa-inbox" aria-hidden="true"></i><a href="/forums">Partner Discussion Board</a></li>
			<li><i class="fa fa-file-o" aria-hidden="true"></i><a href="/partner-portal/submit-a-document">Submit a Document</a></li>
			<li><i class="fa fa-wrench" aria-hidden="true"></i></i><a href="/partner-portal/contact-us">Submit a Correction</a></li>
		</ul>

	<?php } else { ?>

		<p>Portal accounts are reserved for use by State AMBER Alert Coordinators, State Missing Persons Clearinghouse Coordinators, members of official Child Abduction Response Teams, Tribal/MMIP Coordinators, associate NCJTC employees and USDOJ/OJP/OJJDP grantor partners.</p>
		<p>If you are officially serving in one of the above roles through a recent personnel transition or assignment and have not been invited to create an account, please email us at <a href="mailto:askamber@fvtc.edu">askamber@fvtc.edu</a> for assistance.</p>
		<!--<p><a class="button logged-out-links" href="/patner-portal/request-access/">Request Access</a></p>
		<p><a class="button logged-out-links" href="/patner-portal/contact-us/">Contact us</a></p>-->

	<?php } ?>

</div>

<?php
	get_sidebar('cart');
 ?>

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
			<li><i class="fa fa-folder-open" aria-hidden="true"></i><a href="/partner-resourcecs/">Partner Resources</a></li>
			<li><i class="fa fa-file-o" aria-hidden="true"></i><a href="/partner-portal/submit-a-document">Submit a Document</a></li>
			<li><i class="fa fa-inbox" aria-hidden="true"></i><a href="/partner-portal/what-say-you-partner-discussions">Partner Discussion Board</a></li>
			<li><i class="fa fa-wrench" aria-hidden="true"></i></i><a href="/partner-portal/contact-us">Submit a Correction</a></li>
		</ul>

	<?php } else { ?>
	&nbsp;<br />
		<p><a class="button logged-out-links" href="/patner-portal/request-access/">Request Access</a></p>
		<p><a class="button logged-out-links" href="/patner-portal/contact-us/">Contact us</a></p>

	<?php } ?>

</div>

<div class="question-sidebar-container">

	<div class="content-channel row">
		<div class="col-sm-6">
			<h1 class='question-headline'><span>Questions?</span></h1>
			<!--<div class="question-line"></div>-->
			<h3 class='question-sub-headline'>For questions about using the site or your existing membership, please use the 'Contact Us' button. </h3>

			<div class="question-button">
				<a href="/partner-portal/contact-us" class="question-button button-lg light-orange" >
					<span>
						Contact Us
					</span>
				</a>


				<!-- <a href="/partner-portal/request-access" class="question-button button-lg light-orange" >
					<span>
						Request Access
					</span>
				</a> -->
			</div>
		</div>
		<div class="col-sm-6 footer-login">
			<h1 class='question-headline'>Partner Portal Login</h1>
			<?php echo do_shortcode('[user-meta-login]');?>
			<?php
				$user = wp_get_current_user();
				if ( in_array( 'cart_admin', (array) $user->roles ) ) {
					echo '<p><a class="button" style="margin-top: 4px; display: inline-block; padding: 2px 20px;" href="/cart-admin/cart-listing/">CART Admin Listing</a></p>';
				}
			?>
		</div>
	</div>

</div>

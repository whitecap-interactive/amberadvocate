<?php
				$user = wp_get_current_user();
				if( is_user_logged_in()){ ?>
<div class="question-sidebar-container">

	<div class="content-channel row">

				<div class="col-sm-6">
					<h1 class='question-headline'><span>Questions?</span></h1>
					<!--<div class="question-line"></div>-->
					<h3 class='question-sub-headline'>For questions about using the site or your existing membership, please contact us at <a href="mailto:askamber@fvtc.edu">askamber@fvtc.edu</a>. </h3>

					<!--<div class="question-button">
						<a href="mailto:askamber@fvtc.edu" class="question-button button-lg light-orange" >
							<span>
								Contact Us
							</span>
						</a>
					</div>-->
				</div>
				<div class="col-sm-6 footer-login">
					<h1 class='question-headline'>Partner Portal Links</h1>
					<?php echo do_shortcode('[user-meta-login]');?>
					<?php
						$user = wp_get_current_user();
						if ( in_array( 'cart_admin', (array) $user->roles ) ) {
							echo '<p><a class="button" style="margin-top: 4px; display: inline-block; padding: 2px 20px;" href="/cart-admin/cart-listing/">CART Admin Listing</a></p>';
						}
						if ( in_array( 'aattap_liaison', (array) $user->roles ) || in_array( 'liaison_admin', (array) $user->roles ) ) {
							echo '<p><a class="button" style="margin-top: 4px; display: inline-block; padding: 2px 20px;" href="/liaison/liaison-listing/?show_all=true">Liaison Listing</a></p>';
						}
					?>
				</div>
			</div>
		</div>
			<?php } else { ?>
				<!--<div class="col-sm-12 footer-login">
					<h1 class='question-headline'>Partner Portal Links</h1>
					<?php //echo do_shortcode('[user-meta-login]');?>
					<?php
						$user = wp_get_current_user();
						if ( in_array( 'cart_admin', (array) $user->roles ) ) {
							echo '<p><a class="button" style="margin-top: 4px; display: inline-block; padding: 2px 20px;" href="/cart-admin/cart-listing/">CART Admin Listing</a></p>';
						}
						if ( in_array( 'aattap_liaison', (array) $user->roles ) || in_array( 'liaison_admin', (array) $user->roles ) ) {
							echo '<p><a class="button" style="margin-top: 4px; display: inline-block; padding: 2px 20px;" href="/liaison/liaison-listing/?show_all=true">Liaison Listing</a></p>';
						}
					?>
				</div>-->
			<?php } ?>

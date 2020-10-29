<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package amberadvocate
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="post-entry-header purple">
        <?php
            $subhead = rwmb_meta('amber_subhead');
            if (!empty($subhead)) { 
                the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); 
                echo '<h3>' . rwmb_meta('amber_subhead') . '</h3>'; 
            } else { the_title( '<h1 class="entry-title">', '</h1>' ); }
        ?>
    </header><!-- .entry-header -->
    <style type="text/css">
        
    </style>
	<div class="content-channel channel-padding">

		<div class="row change-direction">
			<?php if ( is_user_logged_in() ) { ?>

				<div class="col-sm-12">
					<?php 
                        // get_sidebar('cart-table'); 
                    ?> 


                    <?php 
                        $args = array( 
                            'orderby' => 'title',
                            'post_type' => 'cart',
                            'order' => 'ASC',
                        );
                        $the_query = new WP_Query( $args );

                    ?>

                    <p style="text-align: center;">

                    <a href="/cart-admin/add-edit-cart/" class="question-button button-lg light-orange" >
                        <span>
                            <span style="font-size:1.4em;font-weight:bold;">+</span> &nbsp; Add a New CART    
                        </span>
                    </a></p>

                    

                    <table cellpadding="0" cellspacing="0" border="0" class="partner-table" id="cart-table">
                        <tr>
                            <th><input type="text" id="cart-name-search" onkeyup="cartSearch('name')" placeholder="Search for CART Program Name" title="Type in a name"></th>
                            <th>
                                Region<br />
                                <select id="cart-region-search" onchange="cartSearch('region')">
                                    <option value="">Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </th>
                            <th>
                                State<br />
                                <select id="cart-state-search" onchange="cartSearch('state')">
                                    <option value="">Select</option>
                                    <option value="Alabama">Alabama</option>
                                    <option value="Alaska">Alaska</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Arizona">Arizona</option>
                                    <option value="Arkansas">Arkansas</option>
                                    <option value="California">California</option>
                                    <option value="Colorado">Colorado</option>
                                    <option value="Connecticut">Connecticut</option>
                                    <option value="Delaware">Delaware</option>
                                    <option value="District of Columbia">District of Columbia</option>
                                    <option value="Federated States of Micronesia">Federated States of Micronesia</option>
                                    <option value="Florida">Florida</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Idaho">Idaho</option>
                                    <option value="Illinois">Illinois</option>
                                    <option value="Indiana">Indiana</option>
                                    <option value="Iowa">Iowa</option>
                                    <option value="Kansas">Kansas</option>
                                    <option value="Kentucky">Kentucky</option>
                                    <option value="Louisiana">Louisiana</option>
                                    <option value="Maine">Maine</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Maryland">Maryland</option>
                                    <option value="Massachusetts">Massachusetts</option>
                                    <option value="Michigan">Michigan</option>
                                    <option value="Minnesota">Minnesota</option>
                                    <option value="Mississippi">Mississippi</option>
                                    <option value="Missouri">Missouri</option>
                                    <option value="Montana">Montana</option>
                                    <option value="Nebraska">Nebraska</option>
                                    <option value="Nevada">Nevada</option>
                                    <option value="New Hampshire">New Hampshire</option>
                                    <option value="New Jersey">New Jersey</option>
                                    <option value="New Mexico">New Mexico</option>
                                    <option value="New York">New York</option>
                                    <option value="North Carolina">North Carolina</option>
                                    <option value="North Dakota">North Dakota</option>
                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                    <option value="Ohio">Ohio</option>
                                    <option value="Oklahoma">Oklahoma</option>
                                    <option value="Oregon">Oregon</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Pennsylvania">Pennsylvania</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Rhode Island">Rhode Island</option>
                                    <option value="South Carolina">South Carolina</option>
                                    <option value="South Dakota">South Dakota</option>
                                    <option value="Tennessee">Tennessee</option>
                                    <option value="Texas">Texas</option>
                                    <option value="Utah">Utah</option>
                                    <option value="Vermont">Vermont</option>
                                    <option value="Virgin Islands">Virgin Islands</option>
                                    <option value="Virginia">Virginia</option>
                                    <option value="Washington">Washington</option>
                                    <option value="West Virginia">West Virginia</option>
                                    <option value="Wisconsin">Wisconsin</option>
                                    <option value="Wyoming">Wyoming</option>
                                </select>
                            </th>
                            <th>
                                Active/Non-Active<br />
                                <select id="cart-active-search" onchange="cartSearch('active')">
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>

                            </th>
                            <th>
                                Certified/Non-Certified<br />
                                <select id="cart-certified-search" onchange="cartSearch('certified')">
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>

                            </th>
                            <th>ID</th>
                            <th></th>
                        </tr>
                        
                    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
                        $post_id = get_the_ID(); ?>
                        <tr>
                            <td class="cart-name"><a href="<?php the_permalink();?>"><?php the_title() ;?></a></td>
                            <td class="cart-region"><?php echo rwmb_meta('cart_region'); ?></td>
                            <td class="cart-state"><?php echo rwmb_meta('cart_state_select'); ?></td>
                            <td class="cart-active"><?php echo rwmb_meta('cart_active'); ?></td>
                            <td class="cart-certified"><?php echo rwmb_meta('cart_certified'); ?></td>
                            <td class="cart-certified"><?php echo $post_id; ?></td>
                            <td><a href="/cart-admin/add-edit-cart/?rwmb_frontend_field_post_id=<?php echo $post_id; ?>">Edit</a></td>
                        </tr>
                    <?php endwhile; else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
                    </table>
                    <?php wp_reset_query(); ?>



				</div>


			<?php } else { 
				get_sidebar('authenticate'); 
			}
			?>
				
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

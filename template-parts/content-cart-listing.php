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
                        );
                        $the_query = new WP_Query( $args );

                    ?>

                    <p><a href="/cart-admin/add-new-cart/">Add a New CART</a></p>

                    <table cellpadding="0" cellspacing="0" border="0">
                        <thead>
                            <tr>
                                <td>CART Program Name</td>
                                <td>AATTAP Region</td>
                                <td>State</td>
                                <td>Active/Inactive</td>
                                <td>Certified/Non-Certified</td>
                                <td></td>
                            </tr>
                        </thead>
                    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
                        $post_id = get_the_ID(); ?>
                        <tr>
                            <td><a href="<?php the_permalink();?>"><?php the_title() ;?></a></td>
                            <td><?php echo rwmb_meta('cart_region'); ?></td>
                            <td><?php echo rwmb_meta('cart_state_select'); ?></td>
                            <td><?php echo rwmb_meta('cart_active'); ?></td>
                            <td><?php echo rwmb_meta('cart_active'); ?></td>
                            <td><a href="/cart-admin/add-new-cart/?rwmb_frontend_field_post_id=<?php echo $post_id; ?>">Edit</a></td>
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

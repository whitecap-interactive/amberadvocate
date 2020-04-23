<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package amberadvocate
 */

$current_user_id = get_current_user_id();
$author_obj = get_user_by('id', $current_user_id);
$author_first_name =  $author_obj->first_name;
$author_last_name =  $author_obj->last_name;


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

        <?php
            echo '<h2>Hello '. $author_first_name . $author_last_name .  '! These are your open liaison records.</h2>';
        ?>

		<div class="row change-direction">
			<?php if ( is_user_logged_in() ) { ?>

				<div class="col-sm-12">
					<?php 
                        // get_sidebar('cart-table'); 
                    ?> 


                    <?php 


                        $args = array( 
                            'author'    =>  $current_user_id,
                            'orderby'   => 'title',
                            'post_type' => 'liaison-record',
                            'order'     => 'ASC',
                            'meta_query' => array(
                                array(
                                    'key' => 'liaison_final_submit_checkbox',
                                    'value' => '0',
                                ),
                            ),
                        );
                        $the_query = new WP_Query( $args );

                    ?>

                    <p style="text-align: center;">

                    <a href="/liaison/add-liaison-record/" class="question-button button-lg light-orange" >
                        <span>
                            <span style="font-size:1.4em;font-weight:bold;">+</span> &nbsp; Add a New Liaison Record    
                        </span>
                    </a></p>

                    

                    <table cellpadding="0" cellspacing="0" border="0" class="partner-table" id="cart-table">
                        <tr>
                            <th>
                                Title
                            </th>
                            <th>
                                Status
                            </th>

                            <th>
                                
                            </th>
                        </tr>
                        
                    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
                        $post_id = get_the_ID(); 

                        $record_status = rwmb_meta('liaison_final_submit_checkbox');
                        if ($record_status === '0' ) {
                            $status = '<span style="color:green;">Open</span>';
                        }
                    ?>
                        <tr>
                            <td class="cart-name"><a href="<?php the_permalink();?>"><?php the_title() ;?></a></td>
                            <td class="cart-region"><?php echo $status; ?></td>
                            <td><a href="/liaison/add-liaison-record/?rwmb_frontend_field_post_id=<?php echo $post_id; ?>">Edit</a></td>
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

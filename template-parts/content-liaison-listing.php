<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package amberadvocate
 */


$user = wp_get_current_user();
$current_role = $user->roles;
$current_id = $user->ID;
$author_first_name =  $user->first_name;
$author_last_name =  $user->last_name;
$show_all = $_GET['show_all'] ?? '';
$today = date("Y-m-d");
$curr_date = date_create($today);
date_sub($curr_date, date_interval_create_from_date_string('90 days'));
$ninety_days_ago = date_format($curr_date, 'Y-m-d');



if (in_array( 'aattap_liaison', (array) $user->roles)) {
   if ($show_all) { //if show all is set to true, then show all
       $only_show_open_records = array();
   }else{ //otherwise define your metaquery to only pull "open" records
        $only_show_open_records = array(
            array(
                'key' => 'liaison_final_submit_checkbox',
                'value' => '0',
            ),
        );
   }
}
if (in_array( 'liaison_admin', (array) $user->roles)) {
   //show everything for all liaisons
    $current_id = -1;
    //$only_show_open_records = array();
}

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

	<div class="content-channel channel-padding">
        <?php

            if( is_user_logged_in() &&
                in_array( 'aattap_liaison', (array) $user->roles)  ||
                in_array( 'administrator', (array) $user->roles) ||
                in_array( 'liaison_admin', (array) $user->roles)
            ){
        ?>
        <?php
            if (in_array( 'liaison_admin', (array) $user->roles)) {
                echo '<h2>Hello '. $author_first_name . ' ' . $author_last_name .  '! These are liaison records for the last 90 days.</h2>';
            }elseif ($show_all === 'true') {
                echo '<h2>Hello '. $author_first_name . ' ' . $author_last_name .  '! Here are all of your liaison records for the last 90 days.</h2>';
            }else{
                echo '<h2>Hello '. $author_first_name . ' ' . $author_last_name .  '! These are your open liaison records.</h2>';
            }

        ?>

		<div class="row change-direction">
			<?php if ( is_user_logged_in() ) { ?>

				<div class="col-sm-12">
                    <?php
                        $args = array(
                            'author'    =>  $current_id,
                            'orderby'   => 'title',
                            'post_type' => 'liaison-record',
                            'order'     => 'ASC',
                            'orderby' => 'meta_value', //for order by date
                            'meta_key' => 'liaison_activity_date', //for order by date
                            'meta_query' => array(
                                array(
                                    'key' => 'liaison_activity_date',
                                    'value' => array($ninety_days_ago, $today),
                                    'compare' => 'BETWEEN',
                                    'type' => 'DATE'
                                ),
                                $only_show_open_records,
                            )

                        );
                        $the_query = new WP_Query( $args );

                    ?>
                  <!-- Conditional Header Messaging -->
                    <p style="text-align: center;">
                        <a href="/liaison/add-edit-liaison-record/" class="question-button button-lg light-orange" >
                            <span>
                                <span style="font-size:1.4em;font-weight:bold;">+</span> &nbsp; Add a New Liaison Record <!--for liaison admin and liaison-->
                            </span>
                        </a>
                        <?php
                        if (!in_array( 'liaison_admin', (array) $user->roles)) { //for regular liaisons
                            if (!$show_all) { ?>
                                <a href="/liaison/liaison-listing/?show_all=true" class="question-button button-lg light-orange" >
                                    <span>
                                        <span style="font-size:1.4em;font-weight:bold;">+</span> &nbsp; View All Open and Closed Records
                                    </span>
                                </a>
                            <?php }else {?> <!-- if show all = true -->
                                    <a href="/liaison/liaison-listing/" class="question-button button-lg light-orange" >
                                        <span>
                                            <span style="font-size:1.4em;font-weight:bold;">+</span> &nbsp; View Open Liaison Records
                                        </span>
                                    </a>
                            <?php } ?> <!-- end if show all = true -->
                         <?php } ?> <!-- end if !liaison admin -->
                    </p>

                   
                    


                    <table cellpadding="0" cellspacing="0" border="0" class="partner-table" id="liaison-table">
                        <tr>
                            <th>
                                <button id="reset-button" onclick="location.reload()"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                            </th>
                            <th style="cursor: pointer;" onclick="sortLiaisonTable(1)">
                                Activity
                            </th>
                            <th style="cursor: pointer;" onclick="sortLiaisonTable(2)">
                                Date
                            </th>
                            <th style="cursor: pointer;" onclick="sortLiaisonTable(3)">
                                Region
                            </th>
                            <th style="cursor: pointer;" onclick="sortLiaisonTable(4)">
                                Status
                            </th>
                            <th>

                            </th>
                        </tr>

                    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
                        $post_id = get_the_ID();
                        $activity_date = rwmb_meta('liaison_activity_date');
                        $record_date = date_create($activity_date);
                        $display_date = date_format($record_date,"M j, Y");

                        $record_status = rwmb_meta('liaison_final_submit_checkbox');
                        if ($record_status === '0' ) {
                            $status = '<span style="color:green;">Open</span>';
                        }elseif ($record_status === '1') {
                            $status = '<span style="color:red;">Closed</span>';
                        }
                    ?>
                        <tr>
                            <td></td>
                            <td class="liaison-name"><?php the_title() ;?></td>
                            <td class="liaison-date"><?php echo $display_date; ?></td>
                            <td class="liaison-region"><?php echo rwmb_meta('liaison_region_select');  ?></td>
                            <td class="liaison-status"><?php echo $status; ?></td>
                            <td><a href="/liaison/add-edit-liaison-record/?rwmb_frontend_field_post_id=<?php echo $post_id; ?>">View/Edit</a></td>
                        </tr>
                    <?php endwhile; else: ?> <p>Sorry, there are no records to display</p> <?php endif; ?>
                    </table>
                    <?php wp_reset_query(); ?>

				</div>

			<?php } else {
				get_sidebar('authenticate');
			}
			?>

		</div>
        <?php }else{echo "<h2>Sorry, you don't have permission to view this page</h2>";}?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

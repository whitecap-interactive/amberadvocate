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

    <header class="post-entry-header green">
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
            $settings = get_option( 'amberadvocate' );
            $field_id = 'standard';
            $alert_group_fields = $settings[$field_id];
        ?>

        <?php if ( is_user_logged_in() ) { ?>
            <?php if ( !empty( $alert_group_fields ) ) { ?>
                <div class="survey-link-section">
                    <section class="lazy slider" data-sizes="50vw">
                        <?php
                            foreach ( $alert_group_fields as $alert_group_field ) {
                                echo '<div>';
                                echo $alert_group_field['text-alert'];
                                echo '<a href="' . $alert_group_field['text-url'] . '" class="question-button button-lg light-orange"><span>';
                                echo $alert_group_field['text-button'];
                                echo '</span></a></div>';
                            }
                            
                        ?>
                    </section>
                </div>
            <?php } ?> <!-- end if !empty( $alert_group_fields ) -->
        <?php } ?> <!-- end if ( is_user_logged_in() ) -->   

		<div class="row change-direction">
			<?php if ( is_user_logged_in() ) { ?>

				<div class="col-sm-7">
					<?php get_sidebar('partner-table'); ?> 
				</div>
				<div class="col-sm-5">

			        <?php
			        	$user = wp_get_current_user();
						//echo $user->id;
                        $partner = $user->id;
                        $partner_state = get_user_meta($partner, 'state', true);
                        $partner_role =  get_user_meta($partner, 'partner_role', true);
                        $partner_bio =  get_user_meta($partner, 'description', true);
                        $partner_office_phone =  get_user_meta($partner, 'office_phone', true);
                        $partner_mobile_phone =  get_user_meta($partner, 'cellular_or_alternate_number', true);
                        $partner_rank_or_title =  get_user_meta($partner, 'rank_or_title', true);
                        $partner_employing_agency =  get_user_meta($partner, 'employing_agency', true);
                    ?>

                    <div class="partner-detail-panel">
                        <h2><?php echo $user->first_name . ' ' . $user->last_name; ?><span><?php echo $partner_state; ?></span></h2>
                        <div class="partner-role"><?php echo $partner_role; ?></div>
                        <hr />
                        <p>
                            <i class="fa fa-phone fa-lg" aria-hidden="true"></i> &nbsp;  <?php echo $partner_office_phone; ?> &nbsp;  | &nbsp;  <i class="fa fa-mobile fa-lg" aria-hidden="true"></i> &nbsp;  <?php echo $partner_mobile_phone; ?>
                            <br />
                            <i class="fa fa-envelope fa-lg" aria-hidden="true"></i> &nbsp;  <a href="mailto:<?php echo $user->user_email; ?>" target="_blank"><?php echo $user->user_email; ?></a>
                        </p>
                        <hr />
                        <p>Rank or Title:<br /><?php echo $partner_rank_or_title; ?></p>
                        <p>Employing Agency:<br /><?php echo $partner_employing_agency; ?></p>
                        <hr />
                        <p>Bio:<br /><?php echo $partner_bio; ?></p>
                        <p><a class="button light-orange" href="/partner-portal/profile">Update My Profile Info</a></p>
                    </div>

                     <?php get_sidebar('portal'); ?>

				</div>

			<?php } else { 
				get_sidebar('authenticate'); 
			}
			?>
				
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

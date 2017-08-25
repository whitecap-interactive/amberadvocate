<?php
/**
 * @package Tribal Database
 */

    //GET USER DATA
    
    $post = get_post($_GET[org_id]); 
    $org_name = $post->post_name;

    //get users that are a members of current organization page. 
    $user_fields = array( 
        'meta_query' => array(
                array(
                    'key'   => 'your_state',
                    'value' => $org_name,
                    'compare' => '='
                ),
            )
        );
    $user_query = new WP_User_Query( $user_fields );
    

    //get all inactive/pending users from user_meta table 
    global $userMeta;
    $inactive_user_ids = get_users( array(
    'meta_key'=>'user_meta_user_status',
    'meta_value'=>'inactive' 
    ));
    $pending_user_ids = get_users( array(
    'meta_key'=>'user_meta_user_status',
    'meta_value'=>'pending' 
    ));
    $hide_user_ids = array_unique(array_merge($inactive_user_ids,$pending_user_ids), SORT_REGULAR);
    
    $inactive_ids = array();
    foreach($hide_user_ids as $value) {
     $inactive_ids[] = $value->ID;
    }
    /*echo '<pre>';
    var_dump($inactive_ids);
    echo '</pre>';*/
?>
<div class="content-channel channel-padding">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">

            <div class="profile-links">
                <?php if ( is_user_logged_in() ) {
                    $user = wp_get_current_user(); ?>


                    <h3><?php echo 'Welcome, ' . $user->first_name; ?>!</h3>
                    <?php 
                        if ( in_array( 'administrator', (array) $user->roles ) ) {
                            echo '(Administrator)';
                        }
                        elseif ( in_array( 'mega_member', (array) $user->roles ) ) {
                            echo '(Mega Member)';
                        }
                        elseif ( in_array( 'member', (array) $user->roles ) ) {
                            echo '(Member)';
                        }
                    ?> 
                    <br /><a href="/database/profile">Profile</a> | <a href="<?php echo wp_logout_url( $redirect ); ?>">Logout</a>

                    <br clear="all" />
                <?php } 
                else {
                    echo '<h3>Welcome, Guest!</h3>';
                    echo '<a href="/wp-admin">Sign In</a> | <a href="/database/request-access">Request Access</a>';
                } ?>
            </div>    
            <br clear="all" />    
            <h2 class="page-title"><?php the_title(); ?><!-- <span class="back-to-link"> &nbsp; | <a href="/organizations">Back to Organizations &#187;</a></span>--></h2>
        </header><!-- .entry-header -->

        <div class="entry-content">
            
            <?php the_content(); ?>

        </div><!-- .entry-content -->    
        
        <div class="org-details-container row loop-padding">

            <?php 
                if ( is_user_logged_in() ) { 

                    $current_user = wp_get_current_user();

                    // START MEMBERS CONDITIONAL

                    if ( ( in_array( 'mega_member', (array) $user->roles ) ) || ( in_array( 'member', (array) $user->roles ) ) || ( $current_user->organization == $org_name ) || ( in_array( 'administrator', (array) $user->roles ) ) ) { ?>
            
                        <div class="details-header">
                            <h3><span class="dashicons dashicons-groups dash-large"></span> Member Directory<!-- &nbsp; &#187;--></h3>
                        </div>

                        <div class="loop-padding">
                
                            <table class="organization-list">
                                <tr>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>

                                <?php

                                // User Loop
                                if ( ! empty( $user_query->results ) ) {

                                    foreach ( $user_query->results as $user ) {
                                        //dont list inactive/pending users
                                        if (in_array($user->ID, $inactive_ids)) {
                                            //do nothing
                                        }else{
                                            echo '<tr><td><span class="dashicons dashicons-universal-access dash-large"></span> <a href="/member-profile?usr_id=' . $user->ID . '">'. $user->display_name .'</a></td><td>'. $user->job_title .'</td><td>'. $user->user_email .'</td><td>'. $user->phone .'</td></tr>';
                                        }

                                    }
                                } 
                                else {
                                    echo '<tr><td colspan="4">No members found.</td></tr>';
                                }
                            ?>

                            </table> 
                            
                        </div> 
                        
                    <?php } 



                } ?>   
                   
        </div>
        
            
        <footer class="entry-footer">
            <?php edit_post_link( __( 'Edit', 'tribaldb' ), '<span class="edit-link">', '</span>' ); ?>

        </footer><!-- .entry-footer -->
    </article><!-- #post-## -->
</div><!-- .content-channel  .channel-padding-->

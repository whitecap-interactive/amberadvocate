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
/*    echo '<pre>';
    var_dump($user_query);
    echo '</pre>';*/


    /*$my_user_query = get_user_meta( 4 );
    echo '<pre>';
    var_dump($my_user_query);
    echo '</pre>';*/

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

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h2 class="page-title"><?php the_title(); ?><!-- <span class="back-to-link"> &nbsp; | <a href="/organizations">Back to Organizations &#187;</a></span>--></h2>
    </header><!-- .entry-header -->

    <div class="entry-content">
        
        <?php the_content(); ?>

    </div><!-- .entry-content -->    
    
    <div class="row loop-padding">

        <?php 
            if ( is_user_logged_in() ) { 

                $current_user = wp_get_current_user();

                // DISPLAY ORG DETAIL DATA FOR TESTING
                //echo '$org_name: ' . $org_name;
                //echo '<br />$current_user->organization: ' . $current_user->organization;

                // START MEMBERS CONDITIONAL

                //if ( ( in_array( 'mega_member', (array) $user->roles ) ) || ( in_array( 'member', (array) $user->roles ) ) || ( $current_user->organization == $org_name ) || ( in_array( 'administrator', (array) $user->roles ) ) ) { ?>
        
                    <div class="details-header">
                        <h3><span class="dashicons dashicons-groups dash-large"></span> Partner List </h3>
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
                    
                <?php //} 

                // START DOCUMENTS CONDITIONAL

                /*$current_user = wp_get_current_user();                

                if ( ( in_array( 'mega_member', (array) $current_user->roles ) ) || ( in_array( 'administrator', (array) $current_user->roles ) ) || ( $current_user->organization == $org_name )  ) { ?>

                    <div class="details-header">
                        <h3><span class="dashicons dashicons-paperclip dash-large"></span> Documents<!-- &nbsp; &#187;--><span class="float-right"><span class="dashicons dashicons-welcome-add-page dash-large"></span> <a href="/database/submit-a-document">Submit a Document &#187;</a></span></h3>
                    </div>
            
                    <div class="loop-padding">

                        <table class="organization-list">
                            <tr>
                                <th>File name</th>
                            </tr>
                            <?php
                                $tribal_files = rwmb_meta('tribal_file_advanced');
                                //var_dump($tribal_files);
                                if ( !empty( $tribal_files ) ) {
                                    foreach ( $tribal_files as $tribal_file ) {
                                        echo "<tr><td><span class='dashicons dashicons-media-document dash-medium'></span> <a href='{$tribal_file['url']}' title='{$tribal_file['title']}' target='_blank'>{$tribal_file['title']}</a></td></tr>";
                                    }
                                } else {
                                    echo '<tr><td>No documents found.</td></tr>';
                                }
                            ?>
                        </table>
                    </div> 

                <?php } else { ?>

                    <div class="details-header loop-padding">
                        <h3><span class="dashicons dashicons-paperclip dash-large"></span> Documents <!--&nbsp; &#187;--></h3>
                    </div>
                    <div class="ten-twenty-four row loop-padding clearfix">
                        <p>You must be assigned to this organization to view it’s documents.</p>
                    </div>

                <?php } 

                // START GLOBAL DOCS SECTION

                $settings = get_option( 'tribaldb' );
                $field_id = 'global_doc';
                $global_doc_ids = $settings[$field_id];

                if ( !empty( $global_doc_ids ) ) {        
    
                    echo '<div class="details-header"><h3><span class="dashicons dashicons-info dash-large"></span> Information & Resources</h3></div>';
                    echo '<div class="loop-padding">';
                    echo '<table class="organization-list">';

                    foreach ( $global_doc_ids as $global_doc_id ) {

                        $document = RWMB_File_Field::file_info( $global_doc_id );
                        //var_dump($document);

                        echo "<tr><td><span class='dashicons dashicons-media-document dash-medium'></span> <a href='{$document['url']}' title='{$document['title']}' target='_blank'>{$document['title']}</a></td></tr>";
                    }
                    
                    echo '</table>';
                    echo '</div>';
    
                }               */

            } else { ?>
    
                <div class="details-header loop-padding">
                    <h3>Members Only <!--&nbsp; &#187;--></h3>
                </div>
                <div class="ten-twenty-four row loop-padding clearfix">
                    <p>You must be logged in to view the complete member directory and document repository. Please <a href="/database" style="color:#866787!important">login here</a>.</p> 
                </div>
            
            <?php } ?> <!-- end if / else ( is_user_logged_in() ) -->  
               
    </div><!-- end org details container -->
    
        
    <footer class="entry-footer">
        <?php edit_post_link( __( 'Edit', 'tribaldb' ), '<span class="edit-link">', '</span>' ); ?>

    </footer><!-- .entry-footer -->
</article><!-- #post-## -->

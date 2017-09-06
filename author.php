<?php 

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <div class="content-channel channel-padding">

            <header class="entry-header green">
                <h1 class="entry-title">Partner Listing</h1>
            </header><!-- .entry-header --> 

            <div class="entry-content">

                <div class="row state-meta">
                    <div class="col-sm-6">

                        <table class="partner-table">
                        <tr>
                            <th><strong>Name</strong></th>
                            <th><strong>State</strong></th>
                            <th><strong>Region</strong></th>
                        </tr>
                        <?php
                            the_content();
                            $partners = get_users( 'blog_id=1&orderby=nicename&role=partner' );
                            foreach ( $partners as $partner ) {
                                $partner_state_name = get_user_meta($partner->ID, 'state', true);
                                if ( $post = get_page_by_path( $partner_state_name, OBJECT, 'state' ) ){
                                    $state_id = $post->ID;
                                }    
                                else{
                                    $state_id = 0;
                                }   
                                $region = rwmb_meta( 'amber_region', $args = array(), $state_id );
                                echo '<tr>' .
                                     '<td><a href="' . get_author_posts_url( $partner->ID ) . '">' . $partner->user_firstname . ' ' . $partner->user_lastname . '</a></td>'.
                                     '<td>' . $partner_state_name . '</td>' . 
                                     //'<td>State ID: ' . $state_id . '</td>' .
                                     '<td>' . $region . '</td>' .
                                     '</tr>';
                            }  
                        ?>
                        </table>

                    </div>
                    <div class="col-sm-6">

                        <?php
                            $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
                            //var_dump ( $curauth );
                            $partner = $curauth->id;
                            $partner_state = get_user_meta($partner, 'state', true);
                            $partner_role =  get_user_meta($partner, 'partner_role', true);
                            $partner_bio =  get_user_meta($partner, 'description', true);
                            $partner_office_phone =  get_user_meta($partner, 'office_phone', true);
                            $partner_mobile_phone =  get_user_meta($partner, 'cellular_or_alternate_number', true);
                            $partner_rank_or_title =  get_user_meta($partner, 'rank_or_title', true);
                            $partner_employing_agency =  get_user_meta($partner, 'employing_agency', true);
                        ?>

                        <table cellpadding="0" cellspacing="0" border="0" class="partner-table">
                            <tr>
                                <th colspan="2"><strong><?php echo $curauth->first_name . ' ' . $curauth->last_name; ?></strong></th>
                            </tr>
                            <tr>
                                <td>State</td>
                                <td><?php echo $partner_state; ?></td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td><?php echo $partner_role; ?></td>
                            </tr>
                            <tr>
                                <td>Bio</td>
                                <td><?php echo wpautop( get_the_author_meta( 'description' ) ); ?></td>
                            </tr>
                            <tr>
                                <td>Office Phone</td>
                                <td><?php echo $partner_office_phone; ?></td>
                            </tr>
                            <tr>
                                <td>Mobile/Secondary Phone</td>
                                <td><?php echo $partner_mobile_phone; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $curauth->user_email; ?></td>
                            </tr>
                            <tr>
                                <td>Rank or Title</td>
                                <td><?php echo $partner_rank_or_title; ?></td>
                            </tr>
                            <tr>
                                <td>Employing Agency</td>
                                <td><?php echo $partner_employing_agency; ?></td>
                            </tr>
                        </table>



                    </div>

                </div>

            </div>
        </div>

    </main>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
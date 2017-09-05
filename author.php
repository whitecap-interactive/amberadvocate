<?php 

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <div class="content-channel channel-padding">

            <div class="row col-sm-12">
                <header class="entry-header green">
                    <h1 class="entry-title">Partner Listing</h1>
                </header><!-- .entry-header -->            
            </div>
            <div class="row state-meta">
                <div class="col-sm-6">
                    <table class="partner-table">
                    <?php
                        the_content();
                        $partners = get_users( 'blog_id=1&orderby=nicename&role=partner' );
                        foreach ( $partners as $partner ) {
                            $partner_state_name = get_user_meta($partner->ID, 'your_state', true);
                            if ( $post = get_page_by_path( $partner_state_name, OBJECT, 'state' ) ){
                                $state_id = $post->ID;
                            }    
                            else{
                                $state_id = 0;
                            }   
                            $region = rwmb_meta( 'amber_region', $args = array(), $state_id );
                            echo '<tr>' .
                                 '<td><a href="' . get_author_posts_url( $partner->ID ) . '">' . $partner->user_firstname . ' ' . $partner->user_lastname . '</a></td>'.
                                 '<td>State: ' . $partner_state_name . '</td>' . 
                                 //'<td>State ID: ' . $state_id . '</td>' .
                                 '<td>Region: ' . $region . '</td>' .
                                 '</tr>';
                        }  
                    ?>
                    </table>
                </div>
                <div class="col-sm-6">

                    <div id="content" class="narrowcolumn">

                        <!-- This sets the $curauth variable -->

                        <?php
                        $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
                        ?>

                        <table cellpadding="0" cellspacing="0" border="0" class="partner-table">
                            <tr>
                                <th colspan="2"><strong><?php echo $curauth->first_name . ' ' . $curauth->last_name; ?></strong></th>
                            </tr>
                            <tr>
                                <td>State</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Partner Role</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Bio</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Office Phone</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Mobile/Secondary Phone</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Rank or Title</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Employing Agency</td>
                                <td></td>
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
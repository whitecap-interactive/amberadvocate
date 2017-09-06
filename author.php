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

                        <table id="partner-table" class="partner-table">
                        <tr>
                            <th><input type="text" id="partner-name-search" onkeyup="partnerSearch('name')" placeholder="Search for Partner Name" title="Type in a name"></th>
                            <th>
                                <select id="partner-state-search" onchange="partnerSearch('state')">
                                    <option value="">Select a State</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select>                                             
                            </th>
                            <th>
                                <select id="partner-region-search" onchange="partnerSearch('region')">
                                    <option value="">Region</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="na">N/A</option>
                                </select>
                            </th>
                        </tr>
                        <?php
                            the_content();
                            $partners = get_users( 'blog_id=1&orderby=nicename' );
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
                                     '<td><a href="/states/' . $partner_state_name . '">' . $partner_state_name . '</a></td>' . 
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
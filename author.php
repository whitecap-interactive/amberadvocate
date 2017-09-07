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
                    <div class="col-sm-7">

                        <?php get_sidebar('partner-table'); ?>

                    </div>
                    <div class="col-sm-5">

                        <?php
                            $user = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
                            //var_dump ( $user );
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
                    </div>

                        <!-- <table cellpadding="0" cellspacing="0" border="0" class="partner-table">
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
                        </table> -->



                    </div>

                </div>

                <div class="row">
                    &nbsp;
                </div>

            </div>
        </div>

    </main>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
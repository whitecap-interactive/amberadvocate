<?php 

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        

            <header class="post-entry-header green">
                <h1 class="entry-title">Contactos</h1>
            </header><!-- .entry-header --> 

            <div class="content-channel channel-padding">

                <div class="row">
                    <div class="col-sm-7" id="partner-list">
                        <?php get_sidebar('spanish-partner-table'); ?> 
                    </div>
                    <div class="col-sm-5" id="partner-info">

                	<?php
                        $ss_id = $wp_query->post->ID; 
				        $ss_name = get_the_title($ss_id);
				        $ss_state = rwmb_meta( 'amber_ss_state_select', $args = '', $post_id = $ss_id ) ?? "";
                        $ss_email = rwmb_meta( 'amber_ss_email_text', $args = '', $post_id = $ss_id ) ?? "";
                        $ss_office_phone = rwmb_meta( 'amber_ss_office_phone_text', $args = '', $post_id = $ss_id ) ?? "";
                        $ss_cellular = rwmb_meta( 'amber_ss_cellular_text', $args = '', $post_id = $ss_id ) ?? "";
                        $ss_rank = rwmb_meta( 'amber_ss_rank_text', $args = '', $post_id = $ss_id ) ?? "";
                        $ss_agency = rwmb_meta( 'amber_ss_agency_text', $args = '', $post_id = $ss_id ) ?? "";
                        $ss_bio = rwmb_meta( 'amber_ss_bio_wysiwyg', $args = '', $post_id = $ss_id ) ?? "";
                	?>
                   
                    <div>
                    </div>
                    <div class="partner-detail-panel">
                        <h2><?php echo $ss_name; ?><span><?php echo $ss_state; ?></span></h2>
                        <div class="partner-role"><?php echo $partner_role; ?></div>
                        <hr />
                        <p>
                            <i class="fa fa-phone fa-lg" aria-hidden="true"></i> &nbsp;  <?php echo $ss_office_phone; ?> &nbsp;  | &nbsp;  <i class="fa fa-mobile fa-lg" aria-hidden="true"></i> &nbsp;  <?php echo $ss_cellular; ?>
                            <br />
                            <i class="fa fa-envelope fa-lg" aria-hidden="true"></i> &nbsp;  <a href="mailto:<?php echo $ss_email; ?>" target="_blank"><?php echo $ss_email; ?></a>
                        </p>
                        <hr />
                        <p>Rank or Title:<br /><?php echo $ss_rank; ?></p>
                        <p>Employing Agency:<br /><?php echo $ss_agency; ?></p>
                        <hr />
                        <p>Bio:<br /><?php echo $ss_bio; ?></p>
                    </div>

                    <?php //get_sidebar('portal'); ?>

                    </div>

                </div>

                <div class="row">
                    &nbsp;
                </div>

            </div>
        

    </main>
</div>

<?php get_sidebar(); ?>
<?php get_sidebar('spanish-questions'); ?>
<?php get_footer(); ?>
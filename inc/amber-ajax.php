<?php
// process ajax request
// based on user input in the liaison record CART Id field, return a permalink on keyup
function amber_ajax_display_post_link() {

    // check nonce
    check_ajax_referer( 'amberAjaxNonce', 'nonce' );


    // output results
    $url = get_permalink($_POST['post_id']);
    if ($url == null) {
        echo 'There are no CART records with that ID';
    }else{
        echo "<a target='_blank' href='$url'>$url</a>";
    }
    // end processing
    wp_die();

}

// ajax hook for logged-in users: wp_ajax_{action}
add_action( 'wp_ajax_amber_public_hook', 'amber_ajax_display_post_link' );

// ajax hook for non-logged-in users: wp_ajax_nopriv_{action}
add_action( 'wp_ajax_nopriv_amber_public_hook', 'amber_ajax_display_post_link' );  




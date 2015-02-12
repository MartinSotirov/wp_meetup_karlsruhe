<?php
/*
Author: Martin Sotirov
*/

// LOAD THEME CORE
require_once( 'includes/core.php' );
require_once( 'includes/custom-post-types.php' );

/*********************
LAUNCH THEME
*********************/

add_action( 'after_setup_theme', 'awesome_theme_init' );
function awesome_theme_init() {

    // cleanup the head
    add_action( 'init', 'awesome_head_cleanup' );
    // remove WP version from RSS
    add_filter( 'the_generator', 'remove_rss_version' );
    // enqueue base scripts and styles
    add_action( 'wp_enqueue_scripts', 'awesome_scripts_and_styles', 999 );
    // ie conditional wrapper

    // add theme support
    awesome_theme_support();

    // cleaning up random code around images
    add_filter( 'the_content', 'awesome_filter_ptags_on_images' );

}

/************* THUMBNAIL SIZE OPTIONS *************/
// add_image_size( 'service-photo', 2880, 'auto', true );
// add_image_size( 'service-photo-medium', 1600, 960, true );

/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
    $content_width = 640;
}

// Add a custom footer text on the admin page
add_filter( 'admin_footer_text', 'awesome_custom_admin_footer' );
function awesome_custom_admin_footer() {
    echo '<span id="footer-thankyou">Developed by <a href="http://evil.ninja/" target="_blank">Martin Sotirov</a></span>.';
}

?>

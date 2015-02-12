<?php
/*
Author: Martin Sotirov
*/

/*********************
Removing unneeded wp_head stuff
*********************/

function awesome_head_cleanup() {
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// remove WP version from css
	add_filter( 'style_loader_src', 'awesome_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', 'awesome_remove_wp_ver_css_js', 9999 );
}

// remove WP version from RSS
function remove_rss_version() { return ''; }

// remove WP version from scripts
function awesome_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

/*********************
SCRIPTS & STYLES
*********************/

// loading modernizr and jquery, and reply script
function awesome_scripts_and_styles() {

	global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

	if (!is_admin()) {

		// jQuery 2 from Google's CDN
		wp_register_script( 'jquery-google', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', array(), '2.1.3', true );
		//adding scripts in the footer
		wp_register_script( 'modernizr', get_stylesheet_directory_uri() . '/assets/js/lib/modernizr.custom.min.js', array(), '2.8.3', false );
		wp_register_script( 'main-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array( 'jquery-google' ), '', true );

		// register main stylesheet
		wp_register_style( 'main-stylesheet', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), '', 'all' );
		// Google fonts
		wp_register_style( 'google-font-lato', 'http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic', array(), '', 'all' );


		// enqueue styles and scripts
		wp_enqueue_script( 'jquery-google' );
		wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'main-scripts' );

		wp_enqueue_style( 'google-font-lato' );
		wp_enqueue_style( 'main-stylesheet' );

	}
}

/*********************
THEME SUPPORT
*********************/

// Adding Theme Support
function awesome_theme_support() {

	// default thumb size
	set_post_thumbnail_size(125, 125, true);

	add_post_type_support( 'page', 'excerpt', 'thumbnail' );
	
	// rss
	add_theme_support('automatic-feed-links');

	// wp menus
	add_theme_support( 'menus' );

	// Post thumbnails
	add_theme_support( 'post-thumbnails' );

	// registering menus
	register_nav_menus( array(
		'main-nav' => 'The Main Menu',
	));
}

/*********************
CLEANUP 
*********************/
// remove the p from around images 
// (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function awesome_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

?>

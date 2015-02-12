<?php

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'awesome_flush_rewrite_rules' );

// Flush your rewrite rules
function awesome_flush_rewrite_rules() {
    flush_rewrite_rules();
}

// Register a location custom post type
add_action( 'init', 'awesome_custom_post_types');

function awesome_custom_post_types() {

    // Portfolio
    register_post_type(
        'portfolio', array( 'labels' =>
            array(
                'name'               => 'Portfolio',
                'singular_name'      => 'Project',
                'all_items'          => 'All Projects',
                'add_new'            => 'Add Project',
                'add_new_item'       => 'Add Project',
                'edit'               => 'Edit',
                'edit_item'          => 'Edit Project',
                'new_item'           => 'New Project',
                'view_item'          => 'View Project',
                'search_items'       => 'Search for Projects',
                'not_found'          => 'There are no projects yet.',
                'not_found_in_trash' => 'No projects found in trash',
                'parent_item_colon'  => ''
            ),
            'taxonomies'          => array('category'),
            'description'         => 'Add new photo shoots',
            // 'publicly_queryable'  => false,
            // 'exclude_from_search' => false,
            'show_ui'             => true,
            'query_var'           => true,
            'menu_position'       => 10,
            'menu_icon'           => 'dashicons-screenoptions',
            'capability_type'     => 'post',
            'public'              => true,
            'has_archive'         => true,
            'hierarchical'        => false,
            'supports'            => array( 'title', 'thumbnail', 'excerpt' ),
            'rewrite'             => array( 'with_front' => false ),
        )
    );
    flush_rewrite_rules();

    // Team
    register_post_type(
        'team', array( 'labels' =>
            array(
                'name'               => 'Team',
                'singular_name'      => 'Team Member',
                'all_items'          => 'All Team Members',
                'add_new'            => 'Add New Team Member',
                'add_new_item'       => 'Add New Team Member',
                'edit'               => 'Edit',
                'edit_item'          => 'Edit Team Member',
                'new_item'           => 'New Team Member',
                'view_item'          => 'View Team Member',
                'search_items'       => 'Search for team members',
                'not_found'          => 'There are no team members yet.',
                'not_found_in_trash' => 'No team members found in trash',
                'parent_item_colon'  => ''
            ),
            'description'         => 'Add new team members',
            'publicly_queryable'  => false,
            'exclude_from_search' => false,
            'show_ui'             => true,
            'query_var'           => true,
            'menu_position'       => 10,
            'menu_icon'           => 'dashicons-groups',
            'capability_type'     => 'post',
            'hierarchical'        => false,
            'has_archive'         => false,
            'supports'            => array( 'title', 'thumbnail', 'excerpt' )
        )
    );
}

// Rename featured image metabox
add_action('do_meta_boxes', 'awesome_hide_featuredimage_metabox');
function awesome_hide_featuredimage_metabox() {
    // Rename the featured image meta box for projects
    remove_meta_box( 'postimagediv', 'portfolio', 'side' );
    add_meta_box('postimagediv', 'Project Image', 'post_thumbnail_meta_box', 'portfolio', 'side');
    // Remove category meta box from Portfolio page
    remove_meta_box( 'categorydiv', 'portfolio', 'side' );
    // Rename the excerpt for projects
    remove_meta_box( 'postexcerpt', 'portfolio', 'normal' );
    add_meta_box('postexcerpt', 'Project Description', 'post_excerpt_meta_box', 'portfolio', 'normal');
    // Rename the excerpt for team members
    remove_meta_box( 'postexcerpt', 'team', 'normal' );
    add_meta_box('postexcerpt', 'Job Title', 'post_excerpt_meta_box', 'team', 'normal');
    // Rename the featured image meta box for team members
    remove_meta_box( 'postimagediv', 'team', 'side' );
    add_meta_box('postimagediv', 'Team Member Photo', 'post_thumbnail_meta_box', 'team', 'side');
}

// Add a custom column to the portfolio index
add_filter('manage_portfolio_posts_columns', 'awesome_portfolio_images', 5);
function awesome_portfolio_images($defaults){
    $defaults['awesome_portfolio_image'] = 'Project image';
    return $defaults;
}
// Fill the custom column with images
add_action('manage_portfolio_posts_custom_column', 'awesome_add_portfolio_images', 5, 2);
function awesome_add_portfolio_images($column_name, $id) {
    if ($column_name === 'awesome_portfolio_image') {
        echo the_post_thumbnail();
    }
}
// Add a custom column to the team members index
add_filter('manage_team_posts_columns', 'awesome_team_images', 5);
function awesome_team_images($defaults){
    $defaults['awesome_team_image'] = 'Photo';
    return $defaults;
}
// Fill the custom column with images
add_action('manage_team_posts_custom_column', 'awesome_add_team_images', 5, 2);
function awesome_add_team_images($column_name, $id) {
    if ($column_name === 'awesome_team_image') {
        echo the_post_thumbnail();
    }
}

?>
<?php
/*
Plugin Name: Banner Carousels
Plugin URI: http://isobar.com/
Description: HT Schools banners plugin built
Version: 2.1.1
Author: Habeeb Mohamed
Author URI: https://isobar.com/
License: GPLv2 or later
*/


// Register the Custom Post Type
 
function register_banners() {
 
    $labels = array(
        'name' => _x( 'Banners', 'banner' ),
        'singular_name' => _x( 'Banner', 'banner' ),
        'add_new' => _x( 'Add New', 'banner' ),
        'add_new_item' => _x( 'Add New banner', 'banner' ),
        'edit_item' => _x( 'Edit Banner', 'banner' ),
        'new_item' => _x( 'New Banner', 'banner' ),
        'view_item' => _x( 'View Banner', 'banner' ),
        'search_items' => _x( 'Search banners', 'banner' ),
        'not_found' => _x( 'No banner found', 'banner' ),
        'not_found_in_trash' => _x( 'No banners found in Trash', 'banner' ),
        'parent_item_colon' => _x( 'Parent banner:', 'banner' ),
        'menu_name' => _x( 'Banners', 'banner' ),
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Banner Categories',
        'supports' => array( 'title', 'editor', 'author', 'custom-fields',  'page-attributes' ),
        'taxonomies' => array( 'banner-category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-audio',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'banners', $args );
    //flush_rewrite_rules(true);
}
add_action( 'init', 'register_banners' );



function create_category_banners() {
	register_taxonomy(
		'banner-category',
		'banners',
		array(
			'label' => __( 'banner Category' ),
			'rewrite' => array( 'slug' => 'banner-category' ),
			'hierarchical' => true,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'show_in_rest'          => true,
            'query_var'             => true,
		)
	);
}

add_action( 'init', 'create_category_banners' );
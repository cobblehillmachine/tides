<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/


// let's create the function for the custom type
function custom_post_gallery() { 
	// creating (registering) the custom type 
	register_post_type('gallery', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Gallery', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Gallery', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Galleries', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Gallery Post', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Gallery Post', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Gallery Post', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Gallery Post', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Gallery Post', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Holds the images for the gallery page', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 5, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'gallery', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'gallery', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'revisions', 'thumbnail')
	 	) /* end of options */
	); /* end of register post type */
} 

function custom_post_floorplans() { 
	// creating (registering) the custom type 
	register_post_type('floorplans', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Floorplans', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Floorplan', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Floorplans', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Floorplan Post', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Floorplan Post', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Floorplan Post', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Floorplan Post', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Floorplan Post', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Holds the content for floorplans', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 5, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'floorplan', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'floorplan', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'revisions', 'thumbnail', 'custom-fields')
	 	) /* end of options */
	); /* end of register post type */
} 

function custom_post_team() { 
	// creating (registering) the custom type 
	register_post_type('team', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Team', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Team', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Team Members', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Team Member', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Team Member', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Team Member', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Team Member', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Team Member', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Holds the content for team members', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 5, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'team', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'team', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'revisions', 'thumbnail', 'custom-fields')
	 	) /* end of options */
	); /* end of register post type */
} 

function custom_post_neighbors() { 
	// creating (registering) the custom type 
	register_post_type('neighbors', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Neighbors', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Neighbors', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Neighbors', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Neighbor', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Neighbor', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Neighbor', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Neighbor', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Neighbor', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Holds the content for neighbor', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 5, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'team', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'team', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'revisions', 'thumbnail', 'custom-fields')
	 	) /* end of options */
	); /* end of register post type */
} 
	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_gallery');
	add_action( 'init', 'custom_post_floorplans');
	add_action( 'init', 'custom_post_team');
	add_action( 'init', 'custom_post_neighbors');

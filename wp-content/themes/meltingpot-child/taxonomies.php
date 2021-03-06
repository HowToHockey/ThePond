<?php
/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function add_custom_taxonomies() {
    register_taxonomy('performance-level', 
        array( 'post', 'skills', 'sfwd-courses', 'sfwd-lessons', 'sfwd-topic', 'content-library' ), 
        array(
            // Hierarchical taxonomy (like categories)
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            // This array of options controls the labels displayed in the WordPress Admin UI
            'labels' => array(
            'name' => _x( 'Performance Levels', 'taxonomy general name' ),
            'singular_name' => _x( 'Performance Level', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Performance Levels' ),
            'all_items' => __( 'All Performance Levels' ),
            'parent_item' => __( 'Parent Performance Level' ),
            'parent_item_colon' => __( 'Parent Performance Level:' ),
            'edit_item' => __( 'Edit Performance Level' ),
            'update_item' => __( 'Update Performance Level' ),
            'add_new_item' => __( 'Add New Performance Level' ),
            'new_item_name' => __( 'New Performance Level Name' ),
            'menu_name' => __( 'Performance Levels' ),
        ),
        // Control the slugs used for this taxonomy
        'rewrite' => array(
            'slug' => 'performance-levels', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/performance-levels/"
            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
        ),
    ));

    register_taxonomy('skill-type', 
        array( 'post', 'skills', 'skill-examples', 'sfwd-courses', 'sfwd-lessons', 'sfwd-topic', 'content-library' ), 
        array(
            // Hierarchical taxonomy (like categories)
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            // This array of options controls the labels displayed in the WordPress Admin UI
            'labels' => array(
            'name' => _x( 'Skill Types', 'taxonomy general name' ),
            'singular_name' => _x( 'Skill Type', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Skill Types' ),
            'all_items' => __( 'All Skill Types' ),
            'parent_item' => __( 'Parent Skill Type' ),
            'parent_item_colon' => __( 'Parent Skill Type:' ),
            'edit_item' => __( 'Edit Skill Type' ),
            'update_item' => __( 'Update Skill Type' ),
            'add_new_item' => __( 'Add New Skill Type' ),
            'new_item_name' => __( 'New Skill Type Name' ),
            'menu_name' => __( 'Skill Types' ),
        ),
        // Control the slugs used for this taxonomy
        'rewrite' => array(
            'slug' => 'skill-type', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/performance-levels/"
            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
        ),
    ));
}
add_action( 'init', 'add_custom_taxonomies', 0 );
?>
<?php 
    // post types
    function create_post_type() {
        register_post_type( 'portfolio-item',
        array(
            'labels' => array(
            'name' => __( 'Portfolio Items' ),
            'singular_name' => __( 'Portfolio Item' ),
            'add_new_item' => __( 'Add New Portfolio Item' ),
            'edit_item' => __( 'Edit Portfolio Item' ),
            'new_item' => __( 'New Portfolio Item' ),
            'view_item' => __( 'View Portfolio Item' ),
            'search_items' => __( 'Search Portfolio Items' ),
            'not_found' => __( 'No portfolio items found' ),
            'not_found_in_trash' => __( 'No portfolio items found in Trash' ),
        ),
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => false,
        'menu_icon' => 'dashicons-format-video',
        )
        );
    }
    add_action( 'init', 'create_post_type' );
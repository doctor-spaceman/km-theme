<?php 
    // menus
    function register_my_menus() {
    register_nav_menus(
        array(
        'main-menu' => __( 'Main Menu' )
        )
    );
    }
    add_action( 'init', 'register_my_menus' );

    // Change the URL to the ajax-loader image
    add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');
    function my_wpcf7_ajax_loader () {
        return  get_bloginfo('stylesheet_directory') . '/img/ajax-loader.gif';
    }
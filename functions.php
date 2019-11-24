<?php

// fonts
function wpt_theme_fonts() {
	wp_register_style('font-josefin', 'https://fonts.googleapis.com/css?family=Josefin+Sans:400,700');
	wp_register_style('font-raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,500');
	wp_register_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');	
	wp_enqueue_style('font-josefin');
	wp_enqueue_style('font-raleway');
	wp_enqueue_style('font-awesome');
}
add_action('wp_enqueue_scripts', 'wpt_theme_fonts');

// css
function wpt_theme_styles() {
	wp_register_style('css-main',  get_template_directory_uri() . '/style.css');
	wp_enqueue_style('css-main');
}
add_action('wp_enqueue_scripts', 'wpt_theme_styles');

// js
function wpt_theme_js() {
	wp_register_script('js-main',  get_template_directory_uri() . '/js/app.js', array('jquery'), '', true);
	wp_enqueue_script('js-main');
}
add_action('wp_enqueue_scripts', 'wpt_theme_js');

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

// menus
function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// Enable featured images on posts and pages
add_theme_support( 'post-thumbnails' ); 

// Remove commenting
//-- Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
//-- Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
//-- Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

// Change the URL to the ajax-loader image
add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');
function my_wpcf7_ajax_loader () {
	return  get_bloginfo('stylesheet_directory') . '/img/ajax-loader.gif';
}

// Don't link media files by default
function wpb_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

?>
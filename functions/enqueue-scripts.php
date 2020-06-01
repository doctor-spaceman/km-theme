<?php 
    // fonts
    function wpt_theme_fonts() {
        wp_register_style('font-josefin', 'https://fonts.googleapis.com/css?family=Josefin+Sans:400,700&display=swap');
        wp_register_style('font-raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,500&display=swap');
        wp_register_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');	
        wp_enqueue_style('font-josefin');
        wp_enqueue_style('font-raleway');
        wp_enqueue_style('font-awesome');
    }
    add_action('wp_enqueue_scripts', 'wpt_theme_fonts');

    // css
    function wpt_theme_styles() {
        wp_register_style('css-main',  get_template_directory_uri() . '/css/style.css');
        wp_enqueue_style('css-main');
    }
    add_action('wp_enqueue_scripts', 'wpt_theme_styles');

    // js
    function wpt_theme_js() {
        wp_register_script('js-main',  get_template_directory_uri() . '/js/app.js', array('jquery'), '', true);
        wp_enqueue_script('js-main');
    }
    add_action('wp_enqueue_scripts', 'wpt_theme_js');
<?php 
/*-----Enqueue Scripts-----*/
function is_admin_area() {
    if ( is_admin() )  {
        return true;
    }
    if ( strpos( $_SERVER['REQUEST_URI'], 'wp-login') != false ) {
        return true;
    }
}

if ( !is_admin_area() ) {
    // Remove excess Wordpress scripts and styles
    function wp_disable_emojis() {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    }
    add_action('init', 'wp_disable_emojis');

    // Use modern jQuery
    function switch_to_hosted_jquery() {
        wp_deregister_script('jquery');
        wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js',null, null, false, null);
        wp_enqueue_script('jquery');
    }
    add_action('init', 'switch_to_hosted_jquery');
}

function site_scripts() {
    // fonts
    wp_register_style('font-josefin', 'https://fonts.googleapis.com/css?family=Josefin+Sans:400,700&display=swap');
    wp_register_style('font-raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,500&display=swap');
    wp_register_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');	
    wp_enqueue_style('font-josefin');
    wp_enqueue_style('font-raleway');
    wp_enqueue_style('font-awesome');
    
    // css
    if ( preg_match('/(staging-km)/', get_site_url()) ) :
        wp_register_style('css-main', get_template_directory_uri() . '/css/style.css');
    else :
        wp_register_style('css-main', get_template_directory_uri() . '/css/style.min.css');
    endif;
    wp_enqueue_style('css-main');

    // js
    if ( file_exists(get_template_directory_uri() . '/js/vendor.js') ) :
        if ( preg_match('/(staging-km)/', get_site_url()) ) :
            wp_register_script('js-vendor', get_template_directory_uri() . '/js/vendor.js', array('jquery'), '', true);
            wp_register_script('js-custom', get_template_directory_uri() . '/js/custom.js', array('js-vendor'), '', true);
        else :
            wp_register_script('js-vendor', get_template_directory_uri() . '/js/vendor.min.js', array('jquery'), '', true);
            wp_register_script('js-custom', get_template_directory_uri() . '/js/custom.min.js', array('js-vendor'), '', true);
        endif;
        wp_enqueue_script('js-vendor');
        wp_enqueue_script('js-custom');
    else :
        if ( preg_match('/(staging-km)/', get_site_url()) ) :
            wp_register_script('js-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true);
        else : 
            wp_register_script('js-custom', get_template_directory_uri() . '/js/custom.min.js', array('jquery'), '', true);
        endif;
        wp_enqueue_script('js-custom');
    endif;
}
add_action( 'wp_enqueue_scripts', 'site_scripts' );
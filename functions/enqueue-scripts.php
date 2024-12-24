<?php 
/*-----Enqueue Scripts-----*/
function is_admin_area() {
  if (is_admin())  {
    return true;
  }
  if (strpos( $_SERVER['REQUEST_URI'], 'wp-login') != false) {
    return true;
  }
}

if (!is_admin_area()) {
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
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js', null, null, false, null);
  }
  add_action('init', 'switch_to_hosted_jquery');
}

// Avoid loading Contact Form 7 scripts
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

function site_scripts() {
  $isStaging = preg_match('/(staging)/', get_site_url());

  // fonts
  wp_register_style('font-cormorant-garamond', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital@0;1&display=swap');
  wp_register_style('font-rubik', 'https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,500;1,300;1,500&display=swap');
  wp_enqueue_style('font-cormorant-garamond');
  wp_enqueue_style('font-rubik');
  
  // css
  if ($isStaging === 1) :
    wp_register_style('css-main', get_template_directory_uri() . '/css/style.css');
  else :
    wp_register_style('css-main', get_template_directory_uri() . '/css/style.min.css');
  endif;
  wp_enqueue_style('css-main');

  // js
  if (file_exists(get_template_directory() . '/js/vendor.js')) :
    if ($isStaging === 1) :
      wp_register_script('js-vendor', get_template_directory_uri() . '/js/vendor.js', array('jquery'), '', true);
      wp_enqueue_script('js-custom', get_template_directory_uri() . '/js/custom.js', array('jquery','js-vendor'), '', true);
    else :
      wp_register_script('js-vendor', get_template_directory_uri() . '/js/vendor.js', array('jquery'), '', true);
      wp_enqueue_script('js-custom', get_template_directory_uri() . '/js/custom.min.js', array('jquery','js-vendor'), '', true);
    endif;
  else :
    if ($isStaging === 1) :
      wp_enqueue_script('js-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true);
    else :
      wp_enqueue_script('js-custom', get_template_directory_uri() . '/js/custom.min.js', array('jquery'), '', true);
    endif;
  endif;
  wp_register_script('js-fontawesome', 'https://kit.fontawesome.com/e550cf8e1e.js');	
  wp_enqueue_script('js-fontawesome');
}
add_action( 'wp_enqueue_scripts', 'site_scripts' );
<!DOCTYPE html> 
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="../favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="../favicon-16x16.png" sizes="16x16" />
		<?php wp_head(); ?>
	</head>
	
	<?php $background = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>

	<body <?php body_class(); ?>>
    <header id="header" class="wrapper">
      <?php if (is_front_page()) : ?>
        <h1 id="nameTitle">
      <?php else : ?>
        <div id="nameTitle" class="h1">
          <a href="<?php bloginfo('url'); ?>">
      <?php endif; ?>
      <?php bloginfo('name'); ?>
      <?php if (is_front_page()) : ?>
        </h1>
      <?php else : ?>
          </a>
        </div>
      <?php endif; ?>
      <div class="wave"></div>
      <?php if (!is_front_page()) : 
        wp_nav_menu(
          array(
            'menu' => 'Main Menu', 
            'container' => 'nav',
            'container_class' => 'main-menu'
          )
        );
      endif; ?>
    </header>
    <main>

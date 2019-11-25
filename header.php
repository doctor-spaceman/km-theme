<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <? language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <? language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <? language_attributes(); ?>>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="../favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="../favicon-16x16.png" sizes="16x16" />
		<title><?php wp_title(); ?></title>
		<?php wp_head(); ?>
	</head>
	
	<?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

	<body>
		<div id="mainHeader" class="bg-white text-blue-light">
			<div id="headerContent" class="wrapper">
				<a href="<?php bloginfo('url'); ?>">
					<div id="brand">
						<img id="logo" src="/wp-content/themes/kmueller/img/triangles.jpg">
						<h1 id="nameTitle"><?php bloginfo('name'); ?></h1>
					</div>
				</a>
				<div id="navIcon">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div id="mainMenu">
				<?php wp_nav_menu(
					array(
						'menu' => 'Main Menu', 
						'container_class' => 'main-menu'
					)
				);?>
			</div>
			<div id="mainMenuOverlay" class="screen-overlay"></div>
		</div>
		<div class="hero-area clearfix" style="background: url('<?php echo $background[0]; ?>') no-repeat top left/cover;">
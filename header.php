<!doctype html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="../favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="../favicon-16x16.png" sizes="16x16" />
		<title><?php wp_title(); ?></title>
		<?php wp_head(); ?>
	</head>
	
	<?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' ); ?>

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
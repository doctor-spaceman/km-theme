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

	<body>
    <header id="header" class="wrapper">
      <h1 id="nameTitle">
        <?php if (!is_front_page()) : ?><a href="<?php bloginfo('url'); ?>"><?php endif; ?>
        <?php bloginfo('name'); ?>
        <?php if (!is_front_page()) : ?></a><?php endif; ?>
      </h1>
      <div class="flex">
        <span>
          Creative Direction
        </span>
        <span>
          Data-Driven Decisions
        </span>
        <span>
          Thoughtful Analysis
        </span>
        <span>
          Audio Experiences
        </span>
      </div>
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
    <main role="main">
      <?php if (!is_front_page()) : ?>
        <div class="hero-area clearfix"<?php if ( $background ) : ?> style="background: url('<?php echo $background[0]; ?>') no-repeat top left/cover;"<?php endif; ?>>
          <div class="hero-copy wrapper">
            <p>
              <?php 
                if ( is_404() ) :
                  echo "Sorry, no such page exists.";
                elseif ( get_field('hero_content') ) : 
                  echo get_field('hero_content');
                endif;
              ?>
            </p>
          </div>
        </div>
      <?php endif; ?>

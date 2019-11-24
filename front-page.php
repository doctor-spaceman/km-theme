<?php get_header(); ?>

			<div class="hero-copy wrapper">
				<?php the_field('hero_content'); ?>
			</div>
		</div>
		<div id="content" class="clearfix">
			<div class="content-panel bg-blue-dark">
				<div class="services wrapper">
					<a class="feature-box" href="<?php the_field('left_panel_link'); ?>">
						<div>
							<span class="<?php the_field('left_panel_icon'); ?> text-blue-light"></span>
							<?php the_field('left_panel_content'); ?>
						</div>
					</a>
					<a class="feature-box" href="<?php the_field('middle_panel_link'); ?>">
						<div>
							<span class="<?php the_field('middle_panel_icon'); ?> text-blue-light"></span>
							<?php the_field('middle_panel_content'); ?>
						</div>
					</a>
					<a class="feature-box" href="<?php the_field('right_panel_link'); ?>">
						<div>
							<span class="<?php the_field('right_panel_icon'); ?> text-blue-light"></span>
							<?php the_field('right_panel_content'); ?>
						</div>
					</a>
				</div>
			</div>
			<div class="content-panel">
				<div class="copy text-blue-dark wrapper">
				<?php
					$displayContact = get_field('contact_form');
					
					if (have_posts()) : while (have_posts()) :
						the_post();
						the_content(); 
					endwhile; endif;
				?>
				</div>
			</div>
			<div class="content-panel">
				<div id="contactForm" class="wrapper">
					<?php echo do_shortcode( $displayContact ); ?>
				</div>
			</div>
		</div>
			
<?php get_footer(); ?>
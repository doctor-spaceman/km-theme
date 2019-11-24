<?php get_header(); ?>

			<div class="hero-copy wrapper">
				<?php the_field('hero_content'); ?>
			</div>
		</div>
		<div id="content" class="clearfix">
			<div class="content-panel">
				<div class="text-blue-dark wrapper">
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
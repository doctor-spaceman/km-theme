<?php
/*
Template Name: Portfolio Archive
*/

get_header(); ?>

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
			<?php wp_reset_query(); ?>	
			<?php 
				$args = array( 
					'post_type' => 'portfolio-item',
					'posts_per_page' => -1
				);
				$the_query = new WP_Query( $args );
			?>
			<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="content-panel">
				<div class="wrapper">
					<h2 class="section"><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div>
			</div>
	
			<?php endwhile; else : ?>
		
				<p>Sorry, there are currently no portfolio items. Check back soon!</p>
		
			<?php endif; ?>
	
			<div class="content-panel">
				<div id="contactForm" class="wrapper">
					<?php echo do_shortcode( $displayContact ); ?>
				</div>
			</div>
		</div>

<?php get_footer(); ?>

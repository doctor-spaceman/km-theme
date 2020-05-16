<?php
/*
Template Name: Portfolio Archive
*/

get_header(); ?>

		<div id="content" class="clearfix">
		<?php if ( get_the_content() ) : ?>
			<div class="content-panel">
				<div class="text-blue-dark wrapper">
					<?php the_content(); ?>
				</div>
			</div>
		<?php endif; ?>
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
		</div>

<?php get_footer(); ?>

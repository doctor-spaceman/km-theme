<?php get_header(); ?>

			<div class="hero-copy wrapper">
				<p>Sorry, no such page exists.</p>
			</div>
		</div>
		<div id="content" class="clearfix">
			<div class="content-panel">
				<div class="text-blue-dark wrapper">
				<?php
					if (have_posts()) : while (have_posts()) :
						the_post();
						the_content(); 
					endwhile; endif;
				?>
				</div>
			</div>
		</div>

<?php get_footer(); ?>
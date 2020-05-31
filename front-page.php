<?php get_header(); ?>

					<section class="content-panel bg-blue-dark">
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
					</section>
					<section class="content-panel">
						<div class="copy text-blue-dark wrapper">
						<?php
							if (have_posts()) : while (have_posts()) :
								the_post();
								the_content(); 
							endwhile; endif;
						?>
						</div>
					</section>
				</main>
			</div>		
				
<?php get_footer(); ?>
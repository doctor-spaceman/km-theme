<?php get_header(); ?>

					<section class="content-panel bg-blue-dark">
						<div class="services wrapper">
							<a class="feature-box" href="<?php echo esc_url(get_field('left_panel_link')); ?>">
								<div>
									<span data-fa-symbol="left" class="<?php echo esc_html(get_field('left_panel_icon')); ?> text-blue-light"></span>
									<svg class="fa-icon"><use xlink:href="#left"></use></svg>
									<h2><?php echo esc_html(get_field('left_panel_title')); ?></h2>
									<p><?php echo esc_html(get_field('left_panel_content')); ?></p>
								</div>
							</a>
							<a class="feature-box" href="<?php echo esc_url(get_field('middle_panel_link')); ?>">
								<div>
									<span data-fa-symbol="middle" class="<?php echo esc_html(get_field('middle_panel_icon')); ?> text-blue-light"></span>
									<svg class="fa-icon"><use xlink:href="#middle"></use></svg>
									<h2><?php echo esc_html(get_field('middle_panel_title')); ?></h2>
									<p><?php echo esc_html(get_field('middle_panel_content')); ?></p>
								</div>
							</a>
							<a class="feature-box" href="<?php echo esc_url(get_field('right_panel_link')); ?>">
								<div>
									<span data-fa-symbol="right" class="<?php echo esc_html(get_field('right_panel_icon')); ?> text-blue-light"></span>
									<svg class="fa-icon"><use xlink:href="#right"></use></svg>
									<h2><?php echo esc_html(get_field('right_panel_title')); ?></h2>
									<p><?php echo esc_html(get_field('right_panel_content')); ?></p>
								</div>
							</a>
						</div>
					</section>
					<section class="content-panel">
						<div class="copy text-blue-dark wrapper">
						<?php
							if ( get_the_content() ) :
								the_content(); 
							endif;
						?>
						</div>
					</section>
				</main>
			</div>		
				
<?php get_footer(); ?>
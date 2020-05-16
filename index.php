<?php get_header(); ?>

<?php
	$displayContact = get_field('contact_form');
?>

		<div id="content" class="clearfix">
		<?php if ( get_the_content() ) : ?>
			<div class="content-panel">
				<div class="text-blue-dark wrapper">
					<?php the_content(); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( $displayContact ) : ?>
			<div class="content-panel">
				<div id="contactForm" class="wrapper">
					<?php echo do_shortcode( $displayContact ); ?>
				</div>
			</div>
		<?php endif; ?>
		</div>

<?php get_footer(); ?>
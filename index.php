<?php 
if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
	wpcf7_enqueue_scripts();
}

$displayContact = get_field('contact_form');

get_header(); 
?>

		<div id="content" class="clearfix">
		<?php if ( get_the_content() ) : ?>
			<section class="content-panel">
				<div class="text-blue-dark wrapper">
					<?php the_content(); ?>
				</div>
			</section>
		<?php endif; ?>
		<?php if ( $displayContact ) : ?>
			<section class="content-panel">
				<div id="contactForm" class="wrapper">
					<?php echo do_shortcode( $displayContact ); ?>
				</div>
			</section>
		<?php endif; ?>
		</div>

<?php get_footer(); ?>
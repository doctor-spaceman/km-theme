<?php
/*
 Template Name: Resume
*/
?>
<?php get_header(); ?>

        <?php if ( get_field('hero_content') ) : ?>
            <div class="hero-copy wrapper">
                <?php the_field('hero_content'); ?>
            </div>
        <?php endif; ?>
		</div>
        <div id="content" class="clearfix">
			<div class="content-panel">
				<div class="text-blue-dark wrapper">
                <?php 
                if ( have_rows('resume_sections') ) : 
                    while ( have_rows('resume_sections') ) : 
                        the_row(); 
                        $panelType = get_row_layout(); // panel row name
                ?>
                    <section>
                    <?php if ( get_sub_field('resume_section_title') ) : ?>              
                        <h2 class="section"><?php echo the_sub_field('resume_section_title'); ?></h2>
                    <?php endif; ?>
                    <?php 
                        if ( file_exists(get_template_part('inc/panel', $panelType)) ) : 
                            include(locate_template('inc/panel-'.$panelType, false, false));
                        endif;
                    ?>
                    </section>
                <?php 
                    endwhile;
                endif;
                ?>
				</div>
			</div>
		</div>

<?php get_footer();?>
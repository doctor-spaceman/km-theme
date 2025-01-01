<?php
/*
 Template Name: Resume
*/
?>
<?php get_header(); ?>

<div class="wrapper">
  <section class="intro">
    <?php if (get_the_title()) : ?>
      <h1><?php the_title(); ?></h1>
    <?php endif; ?>
    <?php if (get_the_content()) : ?>
      <div>
        <?php the_content(); ?>
      </div>
    <?php endif; ?>
  </section>
  <?php if (have_rows('resume_sections')) : 
    while (have_rows('resume_sections')) : 
      the_row(); 
      $panelType = get_row_layout(); // panel row name

      if (file_exists(locate_template('inc/panel-'.$panelType.'.php', false, false))) : 
        include(locate_template('inc/panel-'.$panelType.'.php', false, false));
      endif;
    endwhile;
  endif; ?>
</div>

<?php get_footer();?>
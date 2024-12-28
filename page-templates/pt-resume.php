<?php
/*
 Template Name: Resume
*/
?>
<?php get_header(); ?>

<div class="wrapper">
  <section>
    <?php if (get_the_content()) : the_content(); endif; ?>
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
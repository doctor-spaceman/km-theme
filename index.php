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
</div>

<?php get_footer(); ?>
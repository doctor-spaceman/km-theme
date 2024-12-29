<?php
/*
Template Name: Portfolio Archive
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
  <?php wp_reset_query(); ?>	
  <?php 
    $args = array( 
      'post_type' => 'portfolio-item',
      'posts_per_page' => -1
    );
    $the_query = new WP_Query($args);
  ?>
  <?php if ($the_query->have_posts()) : 
    while ($the_query->have_posts()) : 
      $the_query->the_post();

      if (file_exists(locate_template('inc/panel-portfolio_item.php', false, false))) : 
        include(locate_template('inc/panel-portfolio_item.php', false, false));
      endif;
    endwhile; 
  ?>
  <?php else : ?>
    <section>
      <p>Sorry, there are currently no portfolio items. Check back soon!</p>
    </section>
  <?php endif; ?>
</div>

<?php get_footer(); ?>

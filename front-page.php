<?php get_header(); ?>

<div class="columns wrapper">
  <section class="w50">
    <?php wp_nav_menu(
      array(
        'menu' => 'Main Menu', 
        'container' => 'nav',
        'container_class' => 'main-menu main-menu--section'
      )
    );?>
    <aside class="social flex flex-align-center">
      <a class="social__icon" href="https://www.linkedin.com/in/katelynmueller/">
        <span title="Katelyn's LinkedIn Profile" class="fa-brands fa-linkedin fontawesome-icon"></span>
      </a>
      <a class="social__icon" href="https://github.com/luckysnorkel">
        <span title="Katelyn's Github Profile" class="fa-brands fa-square-github fontawesome-icon"></span>
      </a>
      <a class="social__icon" href="https://public.tableau.com/app/profile/katelyn.mueller.mclean/vizzes">
        <span title="Katelyn's Tableau Profile" class="fa-solid fa-chart-pie fontawesome-icon"></span>
      </a>
    </aside>
  </section>
  <section class="w50">
    <?php
      if ( get_the_content() ) :
        the_content(); 
      endif;
    ?>
  </section>
</section>

<?php get_footer(); ?>
				

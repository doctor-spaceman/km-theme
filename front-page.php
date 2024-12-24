<?php get_header(); ?>

      <section class="col-2 flex wrapper">
        <div class="col-2__left w50">
          <?php wp_nav_menu(
            array(
              'menu' => 'Main Menu', 
              'container' => 'nav',
              'container_class' => 'main-menu main-menu--section'
            )
          );?>
          <div id="social">
          <div draggable="true">
            <span title="Tumblr" class="fab fa-tumblr-square fontawesome-icon"></span>
          </div>
          <div draggable="true">
            <span title="LinkedIn" class="fab fa-linkedin fontawesome-icon"></span>
          </div>
        </div>
        </div>
        <div class="col-2__right w50">
          <?php
            if ( get_the_content() ) :
              the_content(); 
            endif;
          ?>
        </div>
      </section>
    </main>

<?php get_footer(); ?>
				

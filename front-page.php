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
          <aside class="social">
            <div class="social-slider flex flex-justify-space-between flex-align-center">
              <div class="social-slider__option js-drag-item">
                <div draggable="true" data-href="https://www.linkedin.com/in/katelynmueller/">
                  <span title="Katelyn's LinkedIn Profile" class="fa-brands fa-linkedin fontawesome-icon"></span>
                </div>
              </div>
              <div class="social-slider__target flex flex-justify-end flex-align-center js-drag-target"></div>
            </div>
            <div class="social-slider flex flex-justify-space-between flex-align-center">
              <div class="social-slider__option js-drag-item">
                <div draggable="true" data-href="https://github.com/luckysnorkel">
                  <span title="Katelyn's Github Profile" class="fa-brands fa-square-github fontawesome-icon"></span>
                </div>
              </div>
              <div class="social-slider__target flex flex-justify-end flex-align-center js-drag-target"></div>
            </div>
            <div class="social-slider flex justify-space-between flex-align-center">
              <div class="social-slider__option js-drag-item">
                <div draggable="true" data-href="https://public.tableau.com/app/profile/katelyn.mueller.mclean/vizzes">
                  <span title="Katelyn's Tableau Profile" class="fa-solid fa-chart-pie fontawesome-icon"></span>
                </div>
              </div>
              <div class="social-slider__target flex flex-justify-end flex-align-center js-drag-target"></div>
            </div>
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
				

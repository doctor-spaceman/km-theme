<?php get_header(); ?>

      <section class="columns flex wrapper">
        <div class="w50">
          <?php wp_nav_menu(
            array(
              'menu' => 'Main Menu', 
              'container' => 'nav',
              'container_class' => 'main-menu main-menu--section'
            )
          );?>
          <div class="social">
            <div class="social-slider flex justify-space-between">
              <div class="social-slider__option js-drag-item">
                <div draggable="true" data-href="https://github.com/luckysnorkel">
                  <span title="Katelyn's Github" class="fab fa-github-square fontawesome-icon"></span>
                </div>
              </div>
              <div class="social-slider__target-container">
                <div class="social-slider__target js-drag-target"></div>
              </div>
            </div>
            <div class="social-slider flex justify-space-between">
              <div class="social-slider__option js-drag-item">
                <div draggable="true" data-href="https://github.com/luckysnorkel">
                  <span title="LinkedIn" class="fab fa-linkedin fontawesome-icon"></span>
                </div>
              </div>
              <div class="social-slider__target-container">
                <div class="social-slider__target js-drag-target"></div>
              </div>
            </div>
          </div>
          
        </div>
        </div>
        <div class="w50">
          <?php
            if ( get_the_content() ) :
              the_content(); 
            endif;
          ?>
        </div>
      </section>
    </main>

<?php get_footer(); ?>
				

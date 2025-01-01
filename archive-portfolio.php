<?php
/*
Template Name: Portfolio Archive
*/
?>

<?php get_header(); ?>
<?php
  $args = array( 
    'post_type' => 'portfolio-item',
    'posts_per_page' => -1
  );
  $the_query = new WP_Query($args);
?>

<div class="wrapper">
  <div class="portfolio-filters flex flex-align-center flex-justify-center">
    <button
      aria-label="Show all projects"
      class="portfolio-filters__filter p active"
      data-category="all"
    >
        All Projects
    </button>
    <?php
      if ($the_query->have_posts()) :
        $portfolioCategoriesRaw = array();
        while ($the_query->have_posts()) :
          $the_query->the_post();
          $itemCategory = get_field('portfolio_item_category');
          $portfolioCategoriesRaw[] = $itemCategory;
          $portfolioCategories = array_values(array_unique($portfolioCategoriesRaw));
        endwhile;
      endif;
      wp_reset_query();
    ?>
    <?php if (count($portfolioCategories)) : ?>
      <?php for ($i = 0; $i < count($portfolioCategories); $i++) : ?>
        <button
          aria-label="Show only <?php echo esc_html($portfolioCategories[$i]); ?> projects"
          class="portfolio-filters__filter p"
          data-category="<?php echo esc_attr($portfolioCategories[$i]); ?>"
        >
          <?php echo esc_html($portfolioCategories[$i]); ?>
        </button>
      <?php endfor; ?>  
    <?php endif; ?>
  </div>
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
  <?php wp_reset_query(); ?>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const $portoflioFilters = document.querySelectorAll('.portfolio-filters__filter');
    const $portfolioItems = document.querySelectorAll('.portfolio-item');
    for (const $filter of $portoflioFilters) {
      $filter.addEventListener('click', (event) => {
        for (const $f of $portoflioFilters) {
          if ($f.classList.contains('active')) $f.classList.remove('active');
        }
        event.target.classList.add('active');
        if (event.target.dataset.category === 'all') {
          for (const $item of $portfolioItems) {
            $item.style.display = 'block';
          }
        } else {
          for (const $item of $portfolioItems) {
            console.log($item.dataset.category)
            if ($item.dataset.category === event.target.dataset.category) {
              $item.style.display = 'block';
            } else {
              $item.style.display = 'none';
            }
          }
        }
      })
    }
  });
</script>

<?php get_footer(); ?>

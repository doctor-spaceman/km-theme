<?php $sectionName = get_sub_field('resume_section_title'); ?>

<section class="resume-section">
  <?php if ($sectionName) : ?>
    <h2 class="resume-section__title"><?php echo $sectionName; ?></h2>
  <?php endif; ?>

  <?php if (have_rows('resume_section_items')) : ?>
    <?php while (have_rows('resume_section_items')) : ?>
      <div class="resume-section__content">
        <?php
          the_row();

          // Panel fields
          $itemName = get_sub_field('resume_section_item_name');
          $itemLocation = get_sub_field('resume_section_item_location');
          $itemDetails = get_sub_field('resume_section_item_details');
          $enableItemCredits = get_sub_field('resume_section_item_option_add_credits');
          $itemCredits = get_sub_field('resume_section_item_credits');
          $enableItemList = get_sub_field('resume_section_item_option_add_list');
        ?>
        <div class="resume-item__summary">
          <?php if ($itemName) : ?>
            <h3 class="resume-item__title">
              <?php echo $itemName; if ($itemLocation) : echo ' — '.$itemLocation; endif; ?>
            </h3>
          <?php endif; ?>
          <?php if (have_rows('resume_section_item_roles')) : 
            while (have_rows('resume_section_item_roles')) :
              the_row();
              $itemRole = get_sub_field('resume_section_item_role');
              $itemDuration = get_sub_field('resume_section_item_dates');
            ?>
              <?php if ($itemRole) : ?>
                <p class="resume-item__title">
                  <?php echo $itemRole; if ($itemDuration) : ?><span class="resume-item__duration"><?php echo ' — '.$itemDuration; ?></span><?php endif; ?>
                </p>
              <?php endif; ?>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <?php if ($itemDetails) : ?>
          <div class="resume-item__list">
            <?php echo $itemDetails; ?>
          </div>
        <?php endif; ?>
        <?php if ($enableItemCredits && $itemCredits) : ?>          
          <div class="resume-item__list resume-item__list--columns resume-item__list--indented">
            <h4 class="underline uppercase">Credits</h4>
            <?php echo $itemCredits; ?>
          </div>
        <?php endif; ?>
        <?php if ($enableItemList && have_rows('resume_section_item_lists')) : ?>
          <div>
            <?php while (have_rows('resume_section_item_lists')) : 
              the_row();

              $itemListName = get_sub_field('resume_section_item_list_group_name');
              $itemList = get_sub_field('resume_section_item_list_group');
            ?>
              <div class="resume-item__list resume-item__list--columns">
                <h3><?php echo $itemListName; ?></h3>
                <?php echo $itemList; ?>
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</section>
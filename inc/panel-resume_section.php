<?php
if ( have_rows('resume_section_items') ) :
    while ( have_rows('resume_section_items') ): 
?>
    <div class="resume-section">
    <?php
        the_row();

        // Panel fields
        $itemName = get_sub_field('resume_section_item_name');
        $itemLocation = get_sub_field('resume_section_item_location');
        $itemDetails = get_sub_field('resume_section_item_details');
        $itemCredits = get_sub_field('resume_section_item_credits');

    ?>
    <?php if ( $itemName ) : ?>
        <h3><?php echo $itemName; if ( $itemLocation ) : echo ' | '.$itemLocation; endif; ?></h3>
    <?php endif; ?>
    <?php if ( have_rows('resume_section_item_roles') ) : 
        while ( have_rows('resume_section_item_roles') ) :
            the_row();

            $itemRole = get_sub_field('resume_section_item_role');
            $itemDates = get_sub_field('resume_section_item_dates');
    ?>
        <p class="job-title"><?php echo $itemRole; ?></p>
    <?php if ( $itemDates ) : ?>
        <p class="date">
            <?php echo $itemDates; ?>
        </p>
    <?php endif; endwhile; endif; ?>
    <?php if ( $itemDetails ) : 
        echo $itemDetails;
    endif;
    if ( $itemCredits ) : ?>
        <h4 class="credits">Credits</h4>
        <div class="copy-no-rule credits-list">
            <?php echo $itemCredits; ?>
        </div>
<?php
    endif; 
    if ( have_rows('resume_section_item_lists') ) : 
?>
        <div class="resume-list-container">
<?php       
        while ( have_rows('resume_section_item_lists') ) : 
            the_row();

            $itemListName = get_sub_field('resume_section_item_list_group_name');
            $itemList = get_sub_field('resume_section_item_list_group');
?>
            <div class="resume-list">
                <h3><?php echo $itemListName; ?></h3>
                <?php echo $itemList; ?>
            </div>
<?php
        endwhile;
?>
        </div>
<?php
    endif;
?>
    </div>
<?php    
    endwhile;
endif;
<?php
  // Panel fields
  $itemCategory = get_field('portfolio_item_category');
  $itemMedia = false;
  if (have_rows('portfolio_item_media')) :
    $itemMedia = true;
  endif;
?>

<section class="portfolio-item">
  <?php if (get_the_title()) : ?>
    <h2 class="portfolio-item__title"><?php echo the_title(); ?></h2>
    <?php if ($itemCategory) : ?>
      <p class="portfolio-item__category"><?php echo $itemCategory; ?></p>
    <?php endif; ?>
  <?php endif; ?>
  <?php if (get_the_content()) : ?>
    <div class="portfolio-item__content<?php if ($itemMedia) : ?> columns<?php endif; ?>">
      <div class="portfolio-item__content-copy<?php if ($itemMedia) : ?> w50<?php endif; ?>">
        <?php if (have_rows('portfolio_item_accolades')) : ?>
          <ul class="portfolio-item__list portfolio-item__list--accolades">
            <?php while (have_rows('portfolio_item_accolades')) :
              the_row();
              $accoladeName = get_sub_field('accolade_title');
              $accoladeUrl = get_sub_field('accolade_url');
            ?>
              <li class="portfolio-item__list-item flex flex-align-center">
                <span class="portfolio-item__list-item-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/>
                  </svg>
                </span>
                <?php if ($accoladeUrl) : ?><a href="<?php echo $accoladeUrl; ?>" target="_blank"><?php endif; ?>
                  <?php echo $accoladeName; ?>
                <?php if ($accoladeUrl) : ?></a><?php endif; ?>
              </li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>
        <?php the_content(); ?>
        <?php if (have_rows('portfolio_item_external_links')) : ?>
          <ul class="portfolio-item__list">
            <?php while (have_rows('portfolio_item_external_links')) :
              the_row();
              $linkName = get_sub_field('link_title');
              $linkUrl = get_sub_field('link_url');
            ?>
              <li class="portfolio-item__list-item flex flex-align-center">
                <span class="portfolio-item__list-item-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M352 0c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9L370.7 96 201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L416 141.3l41.4 41.4c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6l0-128c0-17.7-14.3-32-32-32L352 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/>
                  </svg>
                </span>
                <?php if ($linkUrl) : ?><a href="<?php echo $linkUrl; ?>" target="_blank"><?php endif; ?>
                  <?php echo $linkName; ?>
                <?php if ($linkUrl) : ?></a><?php endif; ?>
              </li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>
      </div>
      <?php if (have_rows('portfolio_item_media')) : ?>
        <ul class="portfolio-item__content-media w50 flex flex-column">
          <?php while (have_rows('portfolio_item_media')) :
            the_row();
            $mediaType = get_sub_field('media_type');
            $mediaSource = false;
            $isAudio = false;
            $isVideo = false;
            $isImage = false;
            if (get_sub_field('video')) :
              $isVideo = true;
              $mediaSource = get_sub_field('video');
            elseif (get_sub_field('image')) :
              $isImage = true;
              $mediaSource = get_sub_field('image');
            elseif (get_sub_field('audio')) :
              $isAudio = true;
              $mediaSource = get_sub_field('audio');
            endif;
          ?>
            <li
              class="portfolio-item__content-media<?php if ($isVideo) : ?>--video<?php elseif ($isImage) : ?>--image<?php elseif ($isAudio) : ?>--audio<?php endif; ?>"
              <?php if ($isImage) : ?>style="aspect-ratio: <?php echo $mediaSource['width'] / $mediaSource['height']; ?>"<?php endif; ?>
            >
              <?php if ($isVideo) : ?>
                <media-controller>
                <?php if (str_contains($mediaSource, 'vimeo')) : ?>
                  <vimeo-video
                    src="<?php echo $mediaSource; ?>"
                    slot="media"
                    crossorigin
                    muted
                  ></vimeo-video>
                <?php elseif (str_contains($mediaSource, 'youtube')) : ?>
                  <youtube-video
                    src="<?php echo $mediaSource; ?>"
                    slot="media"
                    crossorigin
                    muted
                  ></youtube-video>
                <?php endif; ?>
                  <media-loading-indicator slot="centered-chrome" noautohide></media-loading-indicator>
                  <media-control-bar>
                    <media-play-button></media-play-button>
                    <media-mute-button></media-mute-button>
                    <media-time-range></media-time-range>
                    <media-time-display showduration ></media-time-display>
                    <media-fullscreen-button></media-fullscreen-button>
                  </media-control-bar>
                </media-controller>
              <?php elseif ($isImage) : ?>
                <picture>
                  <source srcset="<?php echo $mediaSource['url']; ?>" />
                  <img src="<?php echo $mediaSource['url']; ?>" alt="<?php echo $mediaSource['alt'] ?>" />
                </picture>
              <?php elseif ($isAudio) : ?>
                <media-controller audio>
                  <audio
                    slot="media"
                    src="<?php echo $mediaSource['url']; ?>"
                  ></audio>
                  <media-control-bar>
                    <media-play-button></media-play-button>
                    <media-mute-button></media-mute-button>
                    <media-time-range></media-time-range>
                    <media-time-display showduration></media-time-display>
                  </media-control-bar>
                </media-controller>
              <?php endif; ?>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php endif; ?>
  <?php endif; ?>
</section>
<?php
  // Template Name: Index
  update_option('current_page_template', 'index');
  get_header();
  $show_promo_banner = get_field('show_promo_banner', 'option');
?>

<?php //include 'inc/promo-banner.php' ?>



<?php if (get_field('which_hero_section')==='video-hero'): ?>
<section class="without-windowheight-home-hero new-home--hero <?php echo ($show_promo_banner) ? ' promo-on' : ''; ?>">
  <img class="hero-mobile-bg" src="<?php the_field('hero_mobile_image') ?>" alt="Hero Mobile background">
  <figure class="hero-video-wrap" style="background-image: url('<?php the_field('hero_video_background') ?>')">
    <video class="video" role="presentation" autoplay muted loop>
      <source id="video" src="<?php the_field('play_video_file') ?>" type="video/mp4">
    </video>
  </figure>
  <div id="video-toggle" class="video-buttons-wrapper">

        <div class="video-controls">
          <button type="button" class="play-pause" aria-label="Pause video background">
            <span class="pause-icon">pause</span>
          </button>
        </div>

      </div>
  <article class="text-box">
    <h1 class="heading"><?php the_field("hero_heading") ?></h1>
    <div class="home-hero-btn-copy">
      <p class="copy"><?php the_field("hero_copy") ?></p>
      <div class="buttons-wrap">
        <a href="<?php the_field("hero_start_button_link") ?>" data-color="<?php the_field('hero_btn_color'); ?>" class="btn start-btn" style="background: <?php the_field('hero_btn_color'); ?>; border-color: <?php the_field('hero_btn_color'); ?>;">
          <span class="big-text"><?php the_field("hero_start_button_text") ?></span>
          <span class="small-text"><?php the_field("hero_start_button_price") ?></span>
        </a>
        <?php if (get_field('turn_on_play_button')==='yes'): ?>
          <div class="play-button video-modal-call" data-videosrc="<?php the_field('play_data_video_url') ?>" tabindex="0" role="button">
            <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 17.2741V1.7878C0 1.00585 0.857086 0.526443 1.52338 0.935696L14.5644 8.94583C15.2113 9.34313 15.197 10.2879 14.5384 10.6655L1.49735 18.1416C0.830685 18.5238 0 18.0425 0 17.2741Z" fill="white"/>
            </svg>
            <span><?php the_field('play_button_text') ?></span>
          </div>

        <?php else: ?>
          <?php
            $phone_number = get_field("hero_call_button_number");
            $phone_number = preg_replace('/[^0-9]/', '', $phone_number);
          ?>
          <a href="tel:<?php echo $phone_number ?>" class="btn call-btn number">
            <span class="big-text"><span class="phone-icon"><?php include 'inc/vectors/phone.svg' ?></span><?php the_field("hero_call_button_text") ?></span>
            <span class="small-text promoNumber"><?php the_field("hero_call_button_number") ?></span>
          </a>
        <?php endif; ?>

      </div>
    </div>
  </article>
  <?php if (get_field('turn_on_play_button')==='yes'): ?>
    <div class="play-button video-modal-call" data-videosrc="<?php the_field('play_data_video_url') ?>" tabindex="0" role="button">
      <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 17.2741V1.7878C0 1.00585 0.857086 0.526443 1.52338 0.935696L14.5644 8.94583C15.2113 9.34313 15.197 10.2879 14.5384 10.6655L1.49735 18.1416C0.830685 18.5238 0 18.0425 0 17.2741Z" fill="white"/>
      </svg>
      <span><?php the_field('play_button_text') ?></span>
    </div>
  <?php endif; ?>
</section>
<?php elseif (get_field('which_hero_section')==='without-video-hero'): ?>
<section class="home-hero<?php echo ($show_promo_banner) ? ' promo-on' : ''; ?>">
  <figure class="hero-img hero-img-1" style="background-image: url(<?php the_field("hero_image_1") ?>);"></figure>
  <figure class="hero-img hero-img-2" style="background-image: url(<?php the_field("hero_image_2") ?>);"></figure>
  <article class="text-box">
    <h1 class="heading"><?php the_field("hero_heading") ?></h1>
    <div class="home-hero-btn-copy">
      <p class="copy"><?php the_field("hero_copy") ?></p>
      <div class="buttons-wrap">
        <a href="<?php the_field("hero_start_button_link") ?>" data-color="<?php the_field('hero_btn_color'); ?>" class="btn start-btn" style="background: <?php the_field('hero_btn_color'); ?>; border-color: <?php the_field('hero_btn_color'); ?>;">
          <span class="big-text"><?php the_field("hero_start_button_text") ?></span>
          <span class="small-text"><?php the_field("hero_start_button_price") ?></span>
        </a>
        <?php
          $phone_number = get_field("hero_call_button_number");
          $phone_number = preg_replace('/[^0-9]/', '', $phone_number);
        ?>
        <a href="tel:<?php echo $phone_number ?>" class="btn call-btn number">
          <span class="big-text"><span class="phone-icon"><?php include 'inc/vectors/phone.svg' ?></span><?php the_field("hero_call_button_text") ?></span>
          <span class="small-text promoNumber"><?php the_field("hero_call_button_number") ?></span>
        </a>
      </div>
    </div>
  </article>
</section>

<?php else: ?>

<section class="new-home--hero <?php echo ($show_promo_banner) ? ' promo-on' : ''; ?>">
  <figure class="hero-video-wrap" style="background-image: url('<?php the_field('hero_video_background') ?>')">
    <video role="presentation" autoplay muted loop >
      <source src="<?php the_field('play_video_file') ?>">
    </video>
  </figure>
  <article class="text-box">
    <h1 class="heading"><?php the_field("hero_heading") ?></h1>
    <div class="home-hero-btn-copy">
      <p class="copy"><?php the_field("hero_copy") ?></p>
      <!-- <div class="buttons-wrap">
        <a href="<?php the_field("hero_start_button_link") ?>" data-color="<?php the_field('hero_btn_color'); ?>" class="btn start-btn" style="background: <?php the_field('hero_btn_color'); ?>; border-color: <?php the_field('hero_btn_color'); ?>;">
          <span class="big-text"><?php the_field("hero_start_button_text") ?></span>
          <span class="small-text"><?php the_field("hero_start_button_price") ?></span>
        </a>
        <?php if (get_field('turn_on_play_button')==='yes'): ?>
          <div class="play-button video-modal-call" data-videosrc="<?php the_field('play_data_video_url') ?>">
            <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 17.2741V1.7878C0 1.00585 0.857086 0.526443 1.52338 0.935696L14.5644 8.94583C15.2113 9.34313 15.197 10.2879 14.5384 10.6655L1.49735 18.1416C0.830685 18.5238 0 18.0425 0 17.2741Z" fill="white"/>
            </svg>
            <span><?php the_field('play_button_text') ?></span>
          </div>

        <?php else: ?>
          <?php
            $phone_number = get_field("hero_call_button_number");
            $phone_number = preg_replace('/[^0-9]/', '', $phone_number);
          ?>
          <a href="tel:<?php echo $phone_number ?>" class="btn call-btn number">
            <span class="big-text"><span class="phone-icon"><?php include 'inc/vectors/phone.svg' ?></span><?php the_field("hero_call_button_text") ?></span>
            <span class="small-text promoNumber"><?php the_field("hero_call_button_number") ?></span>
          </a>
        <?php endif; ?>

      </div> -->
    </div>
  </article>
  <a class="home-arrow-wrap" href="#rated-medical-alert-systems">
    <img class="home-hero-arrow" src="<?php echo GET_TEMP ?>/img/arrow-down.svg">
  </a>
  <?php if (get_field('turn_on_play_button')==='yes'): ?>
    <div class="play-button video-modal-call" data-videosrc="<?php the_field('play_data_video_url') ?>" tabindex="0" role="button">
      <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 17.2741V1.7878C0 1.00585 0.857086 0.526443 1.52338 0.935696L14.5644 8.94583C15.2113 9.34313 15.197 10.2879 14.5384 10.6655L1.49735 18.1416C0.830685 18.5238 0 18.0425 0 17.2741Z" fill="white"/>
      </svg>
      <span><?php the_field('play_button_text') ?></span>
    </div>
  <?php endif; ?>
</section>

<section class="home--intro">
  <div class="inner-max-container">
    <div class="intro-box">
      <h2><?php the_field('intro_title') ?></h2>
      <?php the_field('intro_copy') ?>

      <div class="btn-wrap">
        <a class="btn orange" href="<?php the_field('intro_button_url') ?>"><?php the_field('intro_button_text') ?></a>
        <?php
          $phone_number = get_field("hero_call_button_number");
          $phone_number = preg_replace('/[^0-9]/', '', $phone_number);
        ?>
        <a href="tel:<?php echo $phone_number ?>" class="btn call-btn number">
          <span class="big-text">
            <span class="phone-icon">
              <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2.14572 0.907016C2.69822 0.345853 3.45849 0.0199188 4.25936 0.000882947C5.06024 -0.0181529 5.83615 0.271268 6.41648 0.805505L7.68562 1.97384C7.97323 2.23822 8.20415 2.55484 8.36519 2.9056C8.52624 3.25636 8.61424 3.63438 8.62417 4.01806C8.6341 4.40174 8.56576 4.78354 8.42307 5.14166C8.28037 5.49977 8.06611 5.82718 7.79254 6.10515L7.00056 6.90957C6.62304 7.29495 6.14376 7.57313 5.61459 7.714L5.37897 7.77529C5.30559 7.79499 5.2375 7.82985 5.17939 7.87746C5.12128 7.92508 5.07455 7.98432 5.04239 8.05109C5.01008 8.11761 4.99333 8.1902 4.99333 8.26369C4.99333 8.33719 5.01008 8.40978 5.04239 8.47629L5.14534 8.6908C6.75901 12.0408 9.59906 14.6932 13.1166 16.1356L13.3146 16.2179C13.3798 16.2446 13.4499 16.2582 13.5207 16.2578C13.5915 16.2574 13.6615 16.2431 13.7263 16.2157C13.7912 16.1882 13.8496 16.1483 13.8979 16.0983C13.9463 16.0483 13.9836 15.9893 14.0076 15.9249L14.0829 15.7334C14.2241 15.3556 14.4453 15.0105 14.7323 14.7202L15.5243 13.9157C15.7973 13.6373 16.1244 13.4137 16.4869 13.2578C16.8495 13.1019 17.2403 13.0168 17.6369 13.0074C18.0335 12.998 18.4281 13.0644 18.7981 13.2028C19.1681 13.3413 19.5062 13.5491 19.7931 13.8142L21.0642 14.9826C21.6432 15.5172 21.9794 16.2522 21.9991 17.0263C22.0188 17.8004 21.7203 18.5504 21.1691 19.112L20.3771 19.9183C20.154 20.1444 19.8954 20.3351 19.6109 20.4833C18.7736 20.9193 17.8144 21.0857 16.8726 20.9583C12.7213 20.4821 8.84101 18.7181 5.81256 15.9305C2.78411 13.1428 0.770359 9.48138 0.0726971 5.49416C-0.224296 3.7838 0.450868 2.54843 0.975556 2.13664L1.02307 2.09259L1.06069 2.0562C1.07674 2.04022 1.09132 2.02291 1.10426 2.00448C1.18032 1.90316 1.26369 1.80715 1.35373 1.71719L2.14572 0.907016Z" fill="white"/>
              </svg>
            </span>
            <?php the_field("hero_call_button_text") ?>
          </span>
          <span class="small-text promoNumber"><?php the_field("hero_call_button_number") ?></span>
        </a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<style>
  .home-products .products-grid .new-tab {background-color: <?php the_field('new_button_background') ?>; color:<?php the_field('new_button_text_color') ?>;}
</style>

<section class="home-products container <?php if(get_field('products_right_image')==='on'): echo 'home-products-right-img'; endif; ?>">
  <div class="inner-max-container">
    <article class="col col-info">
      <h2 class="heading"><?php the_field("products_heading") ?></h2>
      <p class="copy"><?php the_field("products_copy") ?></p>
    </article>

    <article class="col col-products">
      <div class="grid-wrap">
        <?php
          if( have_rows('product_list') ):
          while( have_rows('product_list') ): the_row();
        ?>

        <div class="products-grid <?php if(get_sub_field('turn_on_new_tab')): echo 'add-new-tab'; endif; ?>">
          <span class="new-tab t-desktop"><?php the_sub_field("new_button_text") ?></span>
          <div class="grid-inner-wrap">
            <img src="<?php the_sub_field("product_image") ?>" alt="">
            <div class="prod-text-wrap">
              <div class="text-box">
                <span class="new-tab t-mobile"><?php the_sub_field("new_button_text") ?></span>
                <p class="prod-name"><?php the_sub_field("product_name") ?></p>
                <p class="prod-price"><?php the_sub_field("price") ?></p>
              </div>
            </div>
          </div>
          <a class="product-link" href="<?php the_sub_field("url") ?>">
          LEARN MORE
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="10" viewBox="0 0 18 10" fill="none">
            <path d="M16.9596 5.45962C17.2135 5.20578 17.2135 4.79422 16.9596 4.54038L12.823 0.403806C12.5692 0.149965 12.1576 0.149965 11.9038 0.403806C11.65 0.657647 11.65 1.0692 11.9038 1.32304L15.5808 5L11.9038 8.67696C11.65 8.9308 11.65 9.34235 11.9038 9.59619C12.1576 9.85003 12.5692 9.85003 12.823 9.59619L16.9596 5.45962ZM0.5 5.65H16.5V4.35H0.5V5.65Z" fill="#2F5865"/>
          </svg>
        </a>
          </div>
        <?php
          endwhile; endif;
        ?>
      </div>
      <a href="<?php the_field("products_button_url") ?>" class="t-desktop btn-outline blue" tabindex="0" role="button"><?php the_field("products_button_text") ?></a>
    </article>
  </div>
</section>

<section class="home-testimonials" id="rated-medical-alert-systems">
  <article class="heading-wrap">
    <h3 class="heading"><?php the_field("testmonials_heading") ?></h3>
    <p class="intro-copy"><?php the_field("testmonials_subtext") ?></p>
  </article>

  <article class="home-testimonials-slider">

    <?php
    $i = 1;
      if( have_rows('testimonials') ):
      while( have_rows('testimonials') ): the_row();
    ?>

    <?php
      if ( get_sub_field("type") == "company" ) :
    ?>
    <div class="h-t-block is-image" aria-label="slide <?php echo $i; ?>">
      <a href="<?php the_sub_field('url') ?>" target="_blank" class="block-img" style="background-image: url(<?php the_sub_field("image") ?>);">
      </a>
      <div class="block-text-wrap">
        <p class="quote small-quote"><?php the_sub_field("copy") ?></p>
      </div>
    </div>

    <?php
      elseif ( get_sub_field("type") == "video" ) :
    ?>

    <div class="h-t-block is-video" aria-label="slide <?php echo $i; ?>">

      <a class="block-img video-modal-call" data-videosrc="<?php the_sub_field("video_url") ?>" style="background-image: url(<?php the_sub_field("video_image") ?>);" tabindex="0" role="button">
        <span class="play-icon"><?php include 'inc/vectors/play-icon.svg' ?></span>
      </a>
      <div class="block-text-wrap">
        <p class="quote big-quote">
          <?php the_sub_field("copy") ?>
        </p>
        <p class="author-credit"><?php the_sub_field("author") ?></p>
      </div>
    </div>

    <?php
      elseif ( get_sub_field("type") == "rating" ) :
    ?>

    <div class="h-t-block is-rated" aria-label="slide <?php echo $i; ?>">
      <div class="block-text-wrap">
        <ul class="star-rating" role="list">
          <li role="listitem"><?php include 'inc/vectors/star.svg' ?></li>
          <li role="listitem"><?php include 'inc/vectors/star.svg' ?></li>
          <li role="listitem"><?php include 'inc/vectors/star.svg' ?></li>
          <li role="listitem"><?php include 'inc/vectors/star.svg' ?></li>
          <li role="listitem"><?php include 'inc/vectors/star.svg' ?></li>
        </ul>
        <p class="quote small-quote"><?php the_sub_field("copy") ?></p>
        <p class="author-credit"><?php the_sub_field("author") ?></p>
      </div>
    </div>
    <?php endif; ?>
    <?php $i++; endwhile; endif; ?>

  </article>
</section>

<?php if (get_field('hiw_item')): ?>
<section class="home-how-it-works">
<?php if (get_field('hiw_item_title')): ?>
  <div class="heading-wrap">
    <h3><?php the_field('hiw_item_title') ?></h3>
    <p><?php the_field('hiw_item_copy') ?></p>
  </div>
<?php endif; ?>

    <div class="tab-container">
    <?php if (have_rows('hiw_item')): ?>
      <div class="dt-nav">
        <ul class="nav-wrap">
          <?php $index = 0; ?>
          <?php while (have_rows('hiw_item')): the_row(); ?>
            <li class="tab" data-index="<?php echo $index; ?>"><?php the_sub_field('heading'); ?></li>
            <?php $index++; ?>
          <?php endwhile; ?>
        </ul>
      </div>
      <div class="mobile-nav">
      <button class="dropdown-btn"></button>
      <svg class="dropdown-arrow" xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6" fill="none">
        <path d="M9.5 0H0L4.75 5.5L9.5 0Z" fill="#2F5865"/>
      </svg>
      <div class="dropdown-content">
        <ul class="nav-wrap">
          <?php $index = 0; ?>
          <?php while (have_rows('hiw_item')): the_row(); ?>
            <li class="tab" data-index="<?php echo $index; ?>"><?php the_sub_field('heading'); ?></li>
            <?php $index++; ?>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
    <?php $index = 0; ?>
    <?php while (have_rows('hiw_item')): the_row(); ?>
      <div class="tab-content" data-index="<?php echo $index; ?>">
        <div class="hiw-item">
          <div class="image-slider">
            <div class="top-image">
            <?php if (have_rows('slider_images')): ?>
              <?php $imageIndex = 0; ?>
              <?php while (have_rows('slider_images')): the_row(); ?>
                <div class="slider-thumbnail" data-index="<?php echo $imageIndex; ?>">
                  <img src="<?php the_sub_field('slider_image'); ?>" alt="Slider Thumbnail">
                </div>
                <?php $imageIndex++; ?>
              <?php endwhile; ?>
            <?php endif; ?>
            </div>
          </div>
          <div class="text-row">
            <h3><?php the_sub_field('heading'); ?></h3>
            <span class="sub-heading"><?php the_sub_field('sub_heading'); ?></span>
            <p><?php the_sub_field('content'); ?></p>
            <ul>
              <?php if (have_rows('bullet_point')): ?>
                <?php while (have_rows('bullet_point')): the_row(); ?>
                  <span class="bullet-points">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M7.75 14.2705C11.4779 14.2705 14.5 11.2484 14.5 7.52051C14.5 3.79259 11.4779 0.770508 7.75 0.770508C4.02208 0.770508 1 3.79259 1 7.52051C1 11.2484 4.02208 14.2705 7.75 14.2705Z" stroke="#2F5865" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M10.7583 5.55762L7.49013 9.91587C7.34309 10.1114 7.11851 10.2336 6.87445 10.2509C6.6304 10.2682 6.39085 10.1788 6.21775 10.0059L4.53025 8.31837" stroke="#2F5865" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <li>
                      <?php the_sub_field('point'); ?>
                    </li>
                  </span>
                <?php endwhile; ?>
              <?php endif; ?>
              <?php $link = get_sub_field('link'); ?>
              <?php if ($link): ?>
                <div class="link-container">
                  <a class="btn-outline blue" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?></a>
                </div>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
      <?php $index++; ?>
    <?php endwhile; ?>
  <?php endif; ?>
</div>

</section>
<?php endif; ?>

<section class="home-topic-grid is-active">
    <div class="row-content">

      <!-- Block 1 -->
      <?php if( have_rows('block_1') ): while( have_rows('block_1') ): the_row(); ?>
      <div class="video-article-wrap">
        <img class="video-image" src="<?php the_sub_field('background_image'); ?>" alt=""/>
        <div class="heading-wrap">
          <h3 class="heading">
            <span class="heading-text" id="headingText_block1">
              <?php the_sub_field('title'); ?>
            </span>
          </h3>
          <p class="smaller"><?php the_sub_field('sub_text'); ?></p>
        </div>
        <div class="text-wrap">
          <a class="post-link" href="<?php the_sub_field('block_url'); ?>">
              Learn More
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="10" viewBox="0 0 18 10" fill="none">
                <path d="M16.9596 5.45962C17.2135 5.20578 17.2135 4.79422 16.9596 4.54038L12.823 0.403806C12.5692 0.149965 12.1576 0.149965 11.9038 0.403806C11.65 0.657647 11.65 1.0692 11.9038 1.32304L15.5808 5L11.9038 8.67696C11.65 8.9308 11.65 9.34235 11.9038 9.59619C12.1576 9.85003 12.5692 9.85003 12.823 9.59619L16.9596 5.45962ZM0.5 5.65H16.5V4.35H0.5V5.65Z" fill="#2F5865"/>
              </svg>
            </a>
        </div>
      </div>
      <?php endwhile; endif; ?>

      <!-- Block 2 -->
      <?php if( have_rows('block_2') ): while( have_rows('block_2') ): the_row(); ?>
      <div class="video-article-wrap">
        <img class="video-image" src="<?php the_sub_field('background_image'); ?>" alt=""/>
        <div class="heading-wrap">
          <h3 class="heading">
            <span class="heading-text" id="headingText_block1">
              <?php the_sub_field('title'); ?>
            </span>
          </h3>
          <p class="smaller"><?php the_sub_field('sub_text'); ?></p>
        </div>
        <div class="text-wrap">
          <a class="post-link" href="<?php the_sub_field('link'); ?>">
              Learn More
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="10" viewBox="0 0 18 10" fill="none">
                <path d="M16.9596 5.45962C17.2135 5.20578 17.2135 4.79422 16.9596 4.54038L12.823 0.403806C12.5692 0.149965 12.1576 0.149965 11.9038 0.403806C11.65 0.657647 11.65 1.0692 11.9038 1.32304L15.5808 5L11.9038 8.67696C11.65 8.9308 11.65 9.34235 11.9038 9.59619C12.1576 9.85003 12.5692 9.85003 12.823 9.59619L16.9596 5.45962ZM0.5 5.65H16.5V4.35H0.5V5.65Z" fill="#2F5865"/>
              </svg>
            </a>
        </div>
      </div>
      <?php endwhile; endif; ?>

      <!-- Block 3 -->
      <?php if( have_rows('block_4') ): while( have_rows('block_4') ): the_row(); ?>
      <div class="video-article-wrap">
        <img class="video-image" src="<?php the_sub_field('background_image'); ?>" alt=""/>
        <div class="heading-wrap">
          <span class="heading-text" id="headingText_block1">
            <?php the_sub_field('title'); ?>
          </span>
          <p class="smaller"><?php the_sub_field('sub_text'); ?></p>
        </div>
        <div class="text-wrap">
          <a class="post-link" href="<?php the_sub_field('video_url'); ?>">
              Learn More
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="10" viewBox="0 0 18 10" fill="none">
                <path d="M16.9596 5.45962C17.2135 5.20578 17.2135 4.79422 16.9596 4.54038L12.823 0.403806C12.5692 0.149965 12.1576 0.149965 11.9038 0.403806C11.65 0.657647 11.65 1.0692 11.9038 1.32304L15.5808 5L11.9038 8.67696C11.65 8.9308 11.65 9.34235 11.9038 9.59619C12.1576 9.85003 12.5692 9.85003 12.823 9.59619L16.9596 5.45962ZM0.5 5.65H16.5V4.35H0.5V5.65Z" fill="#2F5865"/>
              </svg>
            </a>
        </div>
      </div>
      <?php endwhile; endif; ?>
    </div>

    <!-- Block 4 -->
    <?php $i=0; if( have_rows('block_3') ): while( have_rows('block_3') ): the_row(); $i++; ?>
      <div class="post-article-wrap">
        <div class="post-article-content">
          <p class="post-date"><?php the_sub_field('date'); ?></p>
          <div class="post-title">
            <h3 class="heading">
              <span class="heading-text">
                <?php the_sub_field('title'); ?>
              </span>
            </h3>
          </div>
          <p class="smaller" id="postDescrip-<?php echo $i; ?>"><?php the_sub_field('sub_text'); ?></p>
            <a class="post-link last-link" href="<?php the_sub_field('link'); ?>">
            Learn More
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="10" viewBox="0 0 18 10" fill="none">
              <path d="M16.9596 5.45962C17.2135 5.20578 17.2135 4.79422 16.9596 4.54038L12.823 0.403806C12.5692 0.149965 12.1576 0.149965 11.9038 0.403806C11.65 0.657647 11.65 1.0692 11.9038 1.32304L15.5808 5L11.9038 8.67696C11.65 8.9308 11.65 9.34235 11.9038 9.59619C12.1576 9.85003 12.5692 9.85003 12.823 9.59619L16.9596 5.45962ZM0.5 5.65H16.5V4.35H0.5V5.65Z" fill="#2F5865"/>
            </svg>
          </a>
        </div>
      </div>
      <?php endwhile; endif; ?>

</section>




<?php include 'inc/bottom-get-started.php' ?>


<?php get_footer(); ?>

<?php
  // Template Name: Home New
  update_option('current_page_template', 'home');
  get_header();
  $show_promo_banner = get_field('show_promo_banner', 'option');
?>


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
<section class="home-hero-new <?php echo ($show_promo_banner) ? ' promo-on' : ''; ?>">
 
  <div class="container">

    <div class="row">
      <article>
        <?php if (get_field('hero_top_logo')): ?>
        <div class="top-logo">
          <?php if (get_field('hero_top_logo_link')): ?>
            <a href="<?php the_field('hero_top_logo_link') ?>">
              <img src="<?php the_field('hero_top_logo') ?>" alt="Hero Top Logo">
            </a>
          <?php else: ?>
            <img src="<?php the_field('hero_top_logo') ?>" alt="Hero Top Logo">
          <?php endif; ?>
        </div>
        <?php endif; ?>
        <h1><?php the_field("hero_heading") ?></h1>
        <div class="home-hero-btn-copy">
          <p class="copy"><?php the_field("hero_copy") ?></p>
          <div class="buttons-wrap">
            <a href="<?php the_field("hero_start_button_link") ?>" data-color="<?php the_field('hero_btn_color'); ?>" class="btn start-btn" style="background: <?php the_field('hero_btn_color'); ?>; border-color: <?php the_field('hero_btn_color'); ?>;">
              <?php the_field("hero_start_button_text") ?>
            </a>
            <?php
              $phone_number = get_field("hero_call_button_number");
              $phone_number = preg_replace('/[^0-9]/', '', $phone_number);
            ?>
            <a href="tel:<?php echo $phone_number ?>" class="btn call-btn number">
              <?php the_field("hero_call_button_text") ?></span>
            </a>
          </div>
        </div>
      </article>

      <div class="image-wrap desktop">
        <img src="<?php the_field('hero_image') ?>" alt="Hero Image">
        <div class="hero-img-bg"></div>
      </div>

      <div class="image-wrap mobile-only">
        <img src="<?php the_field('mobile_hero_image') ?>" alt="Hero Image">
      </div>
    </div>

  </div>
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


<section class="new-home--logo-block">
  <div class="container">
    <h2><?php the_field('logo_title'); ?></h2>
    <div class="logo-wrap">
      <?php
        if( have_rows('logos_list') ):
        while( have_rows('logos_list') ): the_row();
      ?>
        <div class="logo-box">
          <img class="logo" src="<?php the_sub_field('logo'); ?>" alt="Logo">
        </div>
      <?php
        endwhile; endif;
      ?>
    </div>
  </div>
</section>

<style>
  .home-products .products-grid .new-tab {background-color: <?php the_field('new_button_background') ?>; color:<?php the_field('new_button_text_color') ?>;}
</style>

<section class="home-products-new container <?php if(get_field('products_right_image')==='on'): echo 'home-products-right-img'; endif; ?>">

    <article class="col col-info">
      <span class="subhead"><?php the_field("products_subhead") ?></span>
      <h2 class="heading"><?php the_field("products_heading") ?></h2>
      <p class="copy"><?php the_field("products_copy") ?></p>

      <a href="<?php the_field("products_button_url") ?>" class="t-desktop btn-outline blue" tabindex="0" role="button"><?php the_field("products_button_text") ?></a>
    </article>

    <article class="col col-products desktop">
      <div class="grid-wrap">
        <div class="col-w col-l">
          <?php
            $number = 0;
            if( have_rows('product_list') ):
            while( have_rows('product_list') ): the_row();
              if ($number % 2 == 0):
          ?>

          <a class="products-grid <?php if(get_sub_field('turn_on_new_tab')): echo 'add-new-tab'; endif; ?>"  href="<?php the_sub_field("url") ?>">
            <span class="new-tab t-desktop"><?php the_sub_field("new_button_text") ?></span>
            <div class="grid-inner-wrap">
              <img class="img" src="<?php the_sub_field("product_image") ?>" alt="product Image">
              <div class="prod-text-wrap">
                <div class="text-box">
                  <span class="new-tab t-mobile"><?php the_sub_field("new_button_text") ?></span>
                  <p class="prod-name"><?php the_sub_field("product_name") ?></p>
                  <p class="prod-price"><?php the_sub_field("text") ?></p>
                </div>
              </div>
            </div>
            <span class="product-link">
              <svg width="63" height="64" viewBox="0 0 63 64" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M31.5 0.323975C48.897 0.323975 63 14.427 63 31.824C63 49.2209 48.897 63.324 31.5 63.324C14.103 63.324 0 49.2209 0 31.824C0 14.427 14.103 0.323975 31.5 0.323975ZM17.7188 29.8552C16.6314 29.8552 15.75 30.7367 15.75 31.824C15.75 32.9113 16.6314 33.7927 17.7188 33.7927H40.5283L32.0766 42.2444C31.3078 43.0132 31.3078 44.2598 32.0766 45.0286C32.8455 45.7974 34.092 45.7974 34.8609 45.0286L46.6734 33.2161C47.4422 32.4473 47.4422 31.2007 46.6734 30.4319L34.8609 18.6194C34.092 17.8505 32.8455 17.8505 32.0766 18.6194C31.3078 19.3882 31.3078 20.6347 32.0766 21.4036L40.5283 29.8552H17.7188Z" fill="#DB4E3B"/>
              </svg>
            </span>
            </a>
          <?php
            endif;  $number++; 
            endwhile; endif;
          ?>
        </div>

        <div class="col-w col-r">
          <?php
            $number = 0;
            if( have_rows('product_list') ):
            while( have_rows('product_list') ): the_row();
              if ($number % 2 != 0):
          ?>

          <a class="products-grid <?php if(get_sub_field('turn_on_new_tab')): echo 'add-new-tab'; endif; ?>" href="<?php the_sub_field("url") ?>">
            <span class="new-tab t-desktop"><?php the_sub_field("new_button_text") ?></span>
            <div class="grid-inner-wrap">
              <img class="img" src="<?php the_sub_field("product_image") ?>" alt="Product Image">
              <div class="prod-text-wrap">
                <div class="text-box">
                  <span class="new-tab t-mobile"><?php the_sub_field("new_button_text") ?></span>
                  <p class="prod-name"><?php the_sub_field("product_name") ?></p>
                  <p class="prod-price"><?php the_sub_field("text") ?></p>
                </div>
              </div>
            </div>
            <span class="product-link" >
              <svg width="63" height="64" viewBox="0 0 63 64" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M31.5 0.323975C48.897 0.323975 63 14.427 63 31.824C63 49.2209 48.897 63.324 31.5 63.324C14.103 63.324 0 49.2209 0 31.824C0 14.427 14.103 0.323975 31.5 0.323975ZM17.7188 29.8552C16.6314 29.8552 15.75 30.7367 15.75 31.824C15.75 32.9113 16.6314 33.7927 17.7188 33.7927H40.5283L32.0766 42.2444C31.3078 43.0132 31.3078 44.2598 32.0766 45.0286C32.8455 45.7974 34.092 45.7974 34.8609 45.0286L46.6734 33.2161C47.4422 32.4473 47.4422 31.2007 46.6734 30.4319L34.8609 18.6194C34.092 17.8505 32.8455 17.8505 32.0766 18.6194C31.3078 19.3882 31.3078 20.6347 32.0766 21.4036L40.5283 29.8552H17.7188Z" fill="#DB4E3B"/>
              </svg>
            </span>
            </a>
          <?php
            endif;  $number++; 
            endwhile; endif;
          ?>
        </div>

      </div>
      
    </article>

    <article class="col col-products mobile">
      <div class="grid-wrap">
        <div class="col-w col-l">
          <?php
            $number = 0;
            if( have_rows('product_list') ):
            while( have_rows('product_list') ): the_row();
              if ($number < 2):
          ?>

          <a class="products-grid <?php if(get_sub_field('turn_on_new_tab')): echo 'add-new-tab'; endif; ?>"  href="<?php the_sub_field("url") ?>">
            <span class="new-tab t-desktop"><?php the_sub_field("new_button_text") ?></span>
            <div class="grid-inner-wrap">
              <img class="img" src="<?php the_sub_field("product_image") ?>" alt="product Image">
              <div class="prod-text-wrap">
                <div class="text-box">
                  <span class="new-tab t-mobile"><?php the_sub_field("new_button_text") ?></span>
                  <p class="prod-name"><?php the_sub_field("product_name") ?></p>
                  <p class="prod-price"><?php the_sub_field("text") ?></p>
                </div>
              </div>
            </div>
            <span class="product-link">
              <svg width="63" height="64" viewBox="0 0 63 64" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M31.5 0.323975C48.897 0.323975 63 14.427 63 31.824C63 49.2209 48.897 63.324 31.5 63.324C14.103 63.324 0 49.2209 0 31.824C0 14.427 14.103 0.323975 31.5 0.323975ZM17.7188 29.8552C16.6314 29.8552 15.75 30.7367 15.75 31.824C15.75 32.9113 16.6314 33.7927 17.7188 33.7927H40.5283L32.0766 42.2444C31.3078 43.0132 31.3078 44.2598 32.0766 45.0286C32.8455 45.7974 34.092 45.7974 34.8609 45.0286L46.6734 33.2161C47.4422 32.4473 47.4422 31.2007 46.6734 30.4319L34.8609 18.6194C34.092 17.8505 32.8455 17.8505 32.0766 18.6194C31.3078 19.3882 31.3078 20.6347 32.0766 21.4036L40.5283 29.8552H17.7188Z" fill="#DB4E3B"/>
              </svg>
            </span>
            </a>
          <?php
            endif;  $number++; 
            endwhile; endif;
          ?>
        </div>

        <div class="col-w col-r">
          <?php
            $number = 0;
            if( have_rows('product_list') ):
            while( have_rows('product_list') ): the_row();
              if ($number >= 2):
          ?>

          <a class="products-grid <?php if(get_sub_field('turn_on_new_tab')): echo 'add-new-tab'; endif; ?>" href="<?php the_sub_field("url") ?>">
            <span class="new-tab t-desktop"><?php the_sub_field("new_button_text") ?></span>
            <div class="grid-inner-wrap">
              <img class="img" src="<?php the_sub_field("product_image") ?>" alt="Product Image">
              <div class="prod-text-wrap">
                <div class="text-box">
                  <span class="new-tab t-mobile"><?php the_sub_field("new_button_text") ?></span>
                  <p class="prod-name"><?php the_sub_field("product_name") ?></p>
                  <p class="prod-price"><?php the_sub_field("text") ?></p>
                </div>
              </div>
            </div>
            <span class="product-link" >
              <svg width="63" height="64" viewBox="0 0 63 64" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M31.5 0.323975C48.897 0.323975 63 14.427 63 31.824C63 49.2209 48.897 63.324 31.5 63.324C14.103 63.324 0 49.2209 0 31.824C0 14.427 14.103 0.323975 31.5 0.323975ZM17.7188 29.8552C16.6314 29.8552 15.75 30.7367 15.75 31.824C15.75 32.9113 16.6314 33.7927 17.7188 33.7927H40.5283L32.0766 42.2444C31.3078 43.0132 31.3078 44.2598 32.0766 45.0286C32.8455 45.7974 34.092 45.7974 34.8609 45.0286L46.6734 33.2161C47.4422 32.4473 47.4422 31.2007 46.6734 30.4319L34.8609 18.6194C34.092 17.8505 32.8455 17.8505 32.0766 18.6194C31.3078 19.3882 31.3078 20.6347 32.0766 21.4036L40.5283 29.8552H17.7188Z" fill="#DB4E3B"/>
              </svg>
            </span>
            </a>
          <?php
            endif;  $number++; 
            endwhile; endif;
          ?>
        </div>

      </div>
      
    </article>

</section>

<section class="home-testimonials" id="rated-medical-alert-systems">
  <article class="heading-wrap">
    <span class="sub-head"><?php the_field("testimonials_subhead") ?></span>
    <h3 class="heading"><?php the_field("testmonials_heading") ?></h3>
    <p class="intro-copy"><?php the_field("testmonials_subtext") ?></p>

    <div class="btn-wrap">
      <div class="arrow arrow-l">
        <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M31.5 63C14.103 63 1.23293e-06 48.897 2.75382e-06 31.5C4.27471e-06 14.103 14.103 -4.27471e-06 31.5 -2.75382e-06C48.897 -1.23293e-06 63 14.103 63 31.5C63 48.897 48.897 63 31.5 63ZM45.2813 33.4687C46.3686 33.4687 47.25 32.5873 47.25 31.5C47.25 30.4127 46.3686 29.5312 45.2813 29.5312L22.4717 29.5312L30.9234 21.0796C31.6922 20.3108 31.6922 19.0642 30.9234 18.2954C30.1545 17.5265 28.908 17.5265 28.1391 18.2954L16.3266 30.1079C15.5578 30.8767 15.5578 32.1233 16.3266 32.8921L28.1391 44.7046C28.908 45.4735 30.1545 45.4735 30.9234 44.7046C31.6922 43.9358 31.6922 42.6892 30.9234 41.9204L22.4717 33.4687L45.2813 33.4687Z" fill="#DB4E3B"/>
        </svg>
      </div>
      <div class="arrow arrow-r">
        <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M31.5 0C48.897 0 63 14.103 63 31.5C63 48.897 48.897 63 31.5 63C14.103 63 0 48.897 0 31.5C0 14.103 14.103 0 31.5 0ZM17.7188 29.5312C16.6314 29.5312 15.75 30.4127 15.75 31.5C15.75 32.5873 16.6314 33.4688 17.7188 33.4688H40.5283L32.0766 41.9204C31.3078 42.6892 31.3078 43.9358 32.0766 44.7046C32.8455 45.4735 34.092 45.4735 34.8609 44.7046L46.6734 32.8921C47.4422 32.1233 47.4422 30.8767 46.6734 30.1079L34.8609 18.2954C34.092 17.5265 32.8455 17.5265 32.0766 18.2954C31.3078 19.0642 31.3078 20.3108 32.0766 21.0796L40.5283 29.5312H17.7188Z" fill="#DB4E3B"/>
        </svg>
        </svg>
      </div>
    </div>
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

    <div class="container">

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
            
                <div class="slider-thumbnail desktop">
                  <img src="<?php the_sub_field('desktop_image'); ?>" alt="Slider Thumbnail">
                </div>

                <div class="slider-thumbnail mobile">
                  <img src="<?php the_sub_field('mobile_image'); ?>" alt="Slider Thumbnail">
                </div>
             
            </div>
          </div>
          <div class="text-row">
            <h3><?php the_sub_field('heading'); ?></h3>
            <span class="sub-heading"><?php the_sub_field('sub_heading'); ?></span>
            <?php the_sub_field('content'); ?>
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
            </ul>

              <?php $link = get_sub_field('link'); ?>
              <?php if ($link): ?>
                <div class="link-container">
                  <a class="btn-outline blue" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>"><?php echo esc_html($link['title']); ?></a>
                </div>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <?php $index++; ?>
    <?php endwhile; ?>
  <?php endif; ?>
</div>
</div>

</section>
<?php endif; ?>

<section class="home-topic-grid is-active">
  <div class="container">

    <div class="top-text">
      <h2><?php the_field('resources_title'); ?></h2>
      <?php the_field('resources_copy'); ?>
    </div>

    <div class="row-content">

      <?php
        if( have_rows('resources_cards') ):
        while( have_rows('resources_cards') ): the_row();
      ?>

      <a class="card" href="<?php the_sub_field('link'); ?>">
        <figure>
          <img src="<?php the_sub_field('image'); ?>" alt="Image"/>
        </figure>

        <article>
          <h3><?php the_sub_field('title'); ?></h3>
          <p><?php the_sub_field('copy'); ?></p>
        </article>

        <span class="btn">Learn More</span>
      </a>


      <?php
        endwhile; endif;
      ?>

  </div>
</section>




<?php include 'inc/bottom-get-started.php' ?>


<?php get_footer(); ?>

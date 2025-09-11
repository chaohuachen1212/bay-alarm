<?php
  // Template Name: Free Quote New
  update_option('current_page_template', 'free-quote-page free-quote--new-page');
  get_header();
  $path = basename($_SERVER['REQUEST_URI']);
  $show_promo_banner = get_field('show_promo_banner', 'option');
  $openStrWd = get_field('week_days_open_time_new');
  $open_tiem_wd_arr = explode(":",$openStrWd);
  $wdOpenTimeH = $open_tiem_wd_arr[0];
  $wdOpenTimeM = $open_tiem_wd_arr[1];
  $closeStrWd = get_field('week_days_close_time_new');
  $close_tiem_wd_arr = explode(":",$closeStrWd);
  $wdCloseTimeH = $close_tiem_wd_arr[0];
  $wdCloseTimeM = $close_tiem_wd_arr[1];
  $theDayOff = get_field('pick_the_days_off');

  $openStrWkd = get_field('weekend_open_time_new');
  $open_tiem_wkd_arr = explode(":",$openStrWkd);
  $wkdOpenTimeH = $open_tiem_wkd_arr[0];
  $wkdOpenTimeM = $open_tiem_wkd_arr[1];
  $closeStrWkd = get_field('weekend_close_time_new');
  $close_tiem_wkd_arr = explode(":",$closeStrWkd);
  $wkdCloseTimeH = $close_tiem_wkd_arr[0];
  $wkdCloseTimeM = $close_tiem_wkd_arr[1];


  date_default_timezone_set('America/Los_Angeles');
  $currentHour = date('H', time());
  $currentMin = date('i', time());
  $currentWeekDate   = date('w');

?>


<!-- TrustBox script -->
<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
<!-- End TrustBox script -->

<style>
  .free-quote--hero .col-l .call-btn {background-color: <?php the_field('call_button_background_color') ?>; color:<?php the_field('call_button_text_color') ?>; border: 2px solid <?php the_field('call_button_background_color') ?>; }
  .free-quote--hero .col-l .call-btn span {color:<?php the_field('call_button_text_color') ?>; transition: all .25s ease; }
  .free-quote--hero .col-l .call-btn:hover {background-color: <?php the_field('call_button_text_color') ?>; color:<?php the_field('call_button_background_color') ?>; border: 2px solid <?php the_field('call_button_background_color') ?>; }
  .free-quote--hero .col-l .call-btn:hover span { color:<?php the_field('call_button_background_color') ?>; }
</style>

<?php if (get_field('pick_hero_type')==='old-hero-no-show'): ?>

<section class="fquote-sec-wrap" style="background-image: url(<?php the_field('hero_image'); ?>)">
  <h1><?php the_field('hero_heading'); ?></h1>
  <div class="box-wrap"<?php if(get_field('box_background_color')){?>style="background-color: <?php echo get_field('box_background_color'); ?>"<?php } ?>>

    <div class="step-wrap">

      <article class="step-panel is-active">
        <p class="step-q"><?php the_field('step_1_text'); ?></p>
        <ul role="list">
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>myself</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>spouse</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>parent</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>friend</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>other</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
        </ul>
      </article>

      <article class="step-panel">
        <p class="step-q"><?php the_field('step_2_text'); ?></p>
        <ul role="list">
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>Inside the home</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>On the go</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>Both</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
        </ul>
      </article>

      <article class="step-panel">
        <p class="step-q"><?php the_field('step_3_text'); ?></p>
        <ul role="list">
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>As soon as possible</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>within a week</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>within a month</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>just researching</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
        </ul>
      </article>

      <article class="step-panel">
        <?php include 'inc/form-free-quote.php'; ?>
      </article>
    </div>

    <div class="back-wrap">
      <p class="back-btn" tabindex="0"><?php include 'inc/vectors/arrow.svg'; ?>Back</p>
    </div>

    <div class="fquote-steps-current">
      <div class="is-active"></div>
      <div></div>
      <div></div>
      <div></div>
    </div>

    <div class="bottom<?php echo ($path === 'get-started') ? ' gs-no-bg' : ''; ?>">
      <article class="col col-contact">
        <?php
          if ($path !== 'get-started'):
          $phoneNum = get_field("hero_call_button_number");
          $purePhoneNum = preg_replace('/[^0-9]/', '', $phoneNum);
        ?>

        <p><?php the_field('hero_call_button_text') ?></p>
        <span class="number"><a href="tel:<?php echo $purePhoneNum; ?>" class="promoNumber"><?php the_field('hero_call_button_number') ?></a></span>
        <?php endif; ?>

      </article>
    </div>
  </div>

</section>
<?php endif; ?>

<?php if ($theDayOff===$currentWeekDate): ?>
  <?php include 'inc/new-night-time-form-block.php'; ?>

<?php elseif($theDayOff=='weekend' && $currentWeekDate ==6 || $currentWeekDate ==7 ): ?>
  <?php include 'inc/new-night-time-form-block.php'; ?>

<?php else: ?>
<!-- Hero with form -->
<?php if ($currentWeekDate>= '1' && $currentWeekDate <= '5'): ?>

<?php if ($currentHour>= $wdOpenTimeH && $currentHour <= $wdCloseTimeH): ?>
  <?php if ($currentHour=== $wdCloseTimeH && $currentMin >= $wdCloseTimeM): ?>
    <?php include 'inc/new-night-time-form-block.php'; ?>
  <?php else: ?>

   <?php include 'inc/day-form-old-block.php'; ?>
    
  <?php endif; ?>


<?php else: ?>
  <?php include 'inc/new-night-time-form-block.php'; ?>
<?php endif; ?>

<?php else: ?>
  <?php if ($currentHour>= $wkdOpenTimeH && $currentHour <= $wkdCloseTimeH ): ?>
    <?php if ($currentHour=== $wkdCloseTimeH && $currentMin >= $wkdCloseTimeM): ?>
      <?php include 'inc/new-night-time-form-block.php'; ?>
    <?php else: ?>
      <?php include 'inc/day-form-old-block.php'; ?>
    <?php endif; ?>

  <?php else: ?>
    <?php include 'inc/new-night-time-form-block.php'; ?>

  <?php endif; ?>

<?php endif; ?>
<?php endif; ?>



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



 <?php if (get_field('turn_on_rating_section')==='on'): ?>
 <!-- ===============================================
            Reviews
=============================================== -->
<section class="hiw-review-sec">
  <div class="col-wrap">

    <article class="copy-wrap">
      <div class="text-wrap">
        <h2><?php the_field('review_heading') ?></h2>
      </div>
    </article>

    <div class="row">
      <article class="col">
        <div class="img-wrap">
          <?php
            $n = 1;
            if ( have_rows('review_image_grid') ):
            while ( have_rows('review_image_grid') ): the_row();

            $review_author = get_sub_field('review_author');
            $author_title = explode('|', $review_author);

            $author_company = $author_title[1];
            $company = explode(',', $author_company);

          ?>
            <div role="tab" tabindex="0" class="img <?php if($n===1): echo 'is-active'; endif; ?>" style="background-image: url(<?php the_sub_field('image') ?>);" aria-label="<?php echo trim($company[1], ' ') ?>"></div>
          <?php
            $n++; endwhile; endif;
          ?>
        </div>

      </article>
      <div class="quotes-wrap">
        <?php
          $c = 1;
          if ( have_rows('review_image_grid') ):
          while ( have_rows('review_image_grid') ): the_row();

        ?>
        <div class="testimonial-wrap <?php if($c===1): echo 'is-active'; endif; ?>">
          <?php the_sub_field('review_testimonial_text') ?>
          <p class="author"><?php the_sub_field('review_author') ?></p>
        </div>
        <?php
          $c++; endwhile; endif;
        ?>
      </div>
    </div>

  </div>
</section>
 <?php endif; ?>
<section class="google-reviews-wrap">
  <div class="google-reviews top">
    <?php echo do_shortcode( '[brb_collection id="31258"]' ); ?>
  </div>
  <div class="google-reviews small-top">
    <?php echo do_shortcode( '[brb_collection id="31257"]' ); ?>
  </div>
</section>

<?php include 'inc/bottom-get-started.php' ?>

<?php get_footer(); ?>

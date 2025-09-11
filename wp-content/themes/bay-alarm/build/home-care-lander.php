<?php
  // Template Name: Home Care Lander
  update_option('current_page_template', 'home-care-page');
  get_header();
  $path = basename($_SERVER['REQUEST_URI']);
  $show_promo_banner = get_field('show_promo_banner', 'option');
?>

<?php //include 'inc/promo-banner.php' ?>

<section class="fquote-sec-wrap" style="background-image: url(<?php the_field('hero_image'); ?>)">
  <h1><?php the_field('hero_heading'); ?></h1>
  <div class="box-wrap"<?php if(get_field('box_background_color')){?>style="background-color: <?php echo get_field('box_background_color'); ?>"<?php } ?>>

    <div class="step-wrap">

      <article class="step-panel step-1 is-active">
        <p class="step-q"><?php the_field('step_1_text'); ?></p>
        <ul>
          <li class="q-choice btn-outline blue" tabindex="0"><span>Inside the home</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>On the go</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>Both</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
        </ul>
      </article>

      <article class="step-panel step-2">
        <p class="step-q"><?php the_field('step_2_text'); ?></p>
        <ul>
          <li class="q-choice btn-outline blue" tabindex="0"><span>myself</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>spouse</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>parent</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>friend</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>other</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
        </ul>
      </article>

      <article class="step-panel step-3">
        <p class="step-q"><?php the_field('step_3_text'); ?></p>
        <ul>
          <li class="q-choice btn-outline blue" tabindex="0"><span>As soon as possible</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>within a week</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>within a month</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>just researching</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
        </ul>
      </article>

      <article class="step-panel step-4">
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


<section class="home-care--team">
  <div class="l-col">
    <img src="<?php the_field('care_team_image') ?>">
  </div>

  <div class="r-col">
    <h4><?php the_field('care_team_title') ?></h4>
    <p><?php the_field('care_team_copy') ?></p>
    <div class="btn-wrap">
      <a href="<?php the_field('care_team_button_url') ?>"><?php the_field('care_team_button_copy') ?><?php include 'inc/vectors/arrow-thick-right.svg' ?></a>
    </div>
  </div>
</section>


<section class="home-testimonials">
  <article class="heading-wrap">
    <h3 class="heading"><?php the_field("testmonials_heading") ?></h3>
    <p class="intro-copy"><?php the_field("testmonials_subtext") ?></p>
  </article>

  <article class="home-testimonials-slider">

    <?php
      if( have_rows('testimonials') ):
      while( have_rows('testimonials') ): the_row();
    ?>

    <?php
      if ( get_sub_field("type") == "company" ) :
    ?>
    <div class="h-t-block is-image">
      <a url="javascript:void(0)" class="block-img" style="background-image: url(<?php the_sub_field("image") ?>);">
      </a>
      <div class="block-text-wrap">
        <p class="quote small-quote"><?php the_sub_field("copy") ?></p>
      </div>
    </div>

    <?php
      elseif ( get_sub_field("type") == "video" ) :
    ?>

    <div class="h-t-block is-video">
      <a url="javascript:void(0)" class="block-img video-modal-call" data-videosrc="<?php the_sub_field("video_url") ?>" style="background-image: url(<?php the_sub_field("video_image") ?>);">
        <span class="play-icon"><?php include 'inc/vectors/play-icon.svg' ?></span>
      </a>
      <div class="block-text-wrap">
        <p class="quote big-quote">
          <span class="quote-mark"><?php include 'inc/vectors/quote-mark.svg' ?></span>
          <?php the_sub_field("copy") ?>
        </p>
        <p class="author-credit"><?php the_sub_field("author") ?></p>
      </div>
    </div>

    <?php
      elseif ( get_sub_field("type") == "rating" ) :
    ?>

    <div class="h-t-block is-rated">
      <div class="block-text-wrap">
        <ul class="star-rating">
          <li><?php include 'inc/vectors/star.svg' ?></li>
          <li><?php include 'inc/vectors/star.svg' ?></li>
          <li><?php include 'inc/vectors/star.svg' ?></li>
          <li><?php include 'inc/vectors/star.svg' ?></li>
          <li><?php include 'inc/vectors/star.svg' ?></li>
        </ul>
        <p class="quote small-quote"><?php the_sub_field("copy") ?></p>
        <p class="author-credit"><?php the_sub_field("author") ?></p>
      </div>
    </div>
    <?php endif; ?>
    <?php endwhile; endif; ?>

  </article>
</section>

<?php get_footer(); ?>

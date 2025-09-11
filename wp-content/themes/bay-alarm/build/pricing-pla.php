<?php
  // Template Name: Pricing PLA
  update_option('current_page_template', 'pricing-page pricing-pla');
  get_header();
  $purePhoneNum = preg_replace('/[^0-9]/', '', get_field('pricing_mobile_order_url'));
?>

<section class="pla-hero">
  <div class="inner-max-container">
    <div class="pla-hero-copy">
      <?php the_field('pricing_pla_hero_copy'); ?>
      <div class="pla-hero-btns">
        <?php
          $c = 0;
          if (have_rows('pla_hero_btns')) : while (have_rows('pla_hero_btns')) : the_row();
            $new_tab = (get_sub_field('open_new_tab')) ? ' rel="noopener noreferrer" target="_blank"' : '';
        ?>
        <?php if ($count === 1): ?>
        <span class="btns-or">OR</span>
        <?php endif; ?>
        <a href="<?php the_sub_field('button_url'); ?>"<?php echo $new_tab; ?>><?php the_sub_field('button_text'); ?></a>
        <?php $count++; endwhile; endif; ?>
      </div>

      <?php
        if (count(get_field('pricing_pla_hero_images') > 1)):
      ?>
      <div class="pla-hero-nav">
        <div class="pla-hero-prev">
          <?php include 'inc/vectors/arrow-thick.svg'; ?>
        </div>

        <?php
          if (get_field('pla_hero_thumbnails')):
            $img_repeater = 'pla_hero_thumbnails';
            $img_url = 'pla_thumbnail_image';
          else:
            $img_repeater = 'pricing_pla_hero_images';
            $img_url = 'pla_hero_image';
          endif;

          $c = 1;
          if (have_rows($img_repeater)) : while (have_rows($img_repeater)) : the_row();
        ?>

        <a href="#!"<?php echo ($c === 1) ? " class='is-active'" : ''; ?> data-pla-item="<?php echo $c; ?>">
          <figure style="background-image: url(<?php the_sub_field($img_url); ?>);"></figure>
        </a>

          <?php $c++; endwhile; endif; ?>

        <div class="pla-hero-next">
          <?php include 'inc/vectors/arrow-thick.svg'; ?>
        </div>
      </div>

      <?php endif; ?>

    </div>
  </div>

  <div class="pricing-pla-hero-imgs">

  <?php
    $c = 1;
    if (have_rows('pricing_pla_hero_images')) : while (have_rows('pricing_pla_hero_images')) : the_row();
  ?>

  <figure class="pla-hero-bg-img<?php echo ($c === 1) ? ' is-active' : ''; ?>" data-pla-item="<?php echo $c; ?>" style="background-image: url(<?php the_sub_field('pla_hero_image'); ?>);"></figure>

  <?php $c++; endwhile; endif; ?>

  </div>

</section>

<section class="pla-video" style="background-image: url(<?php the_field('pricing_pla_video_bg_image'); ?>);">
  <div class="pla-video-inner">
    <div>
      <?php the_field('pricing_pla_video_copy'); ?>
      <?php if (get_field('pla_video_cta_text')): ?>
        <p>
          <a href="<?php the_field('pla_video_cta_url'); ?>"<?php echo (get_field('pla_video_cta_color')) ? ' data-hex="' . get_field('pla_video_cta_color') . '" style="background-color:' . get_field('pla_video_cta_color') . '; border-color:' . get_field('pla_video_cta_color') . '"' : ''; ?>>
            <?php the_field('pla_video_cta_text'); ?>
          </a>
        </p>
      <?php endif; ?>
    </div>
    <div>
      <figure data-videosrc="<?php the_field('pla_video_embed_url'); ?>" style="background-image: url(<?php the_field('video_cover_image'); ?>);"></figure>
      <div class="pla-iframe-embed">
        <iframe width="560" height="315" src="" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</section>

<section class="hiw-review-sec">
  <div class="col-wrap">

    <article class="col">
      <div class="text-wrap">
        <h6 class="hiw-sec-title title"><?php the_field('reviews_heading') ?></h6>

        <?php echo do_shortcode('[google-reviews-pro place_photo=https://lh3.googleusercontent.com/p/AF1QipMxReDT8dJovcxzLTzP4WdsHm_lPrU7WRyza1-H=s1600-w300-h300 place_name="Bay Alarm Medical" place_id=ChIJnb7qsZNmhYAR78LhIMEfOGQ view_mode=badge_inner]'); ?>

        <div class="testimonial-wrap">
          <p><?php the_field('review_testimonial_text') ?></p>
          <p class="author"><?php the_field('review_author') ?></p>
        </div>
        <?php $reviewsUrl = (get_field('review_button_type') === 'internal') ? get_field('review_button_interal') : get_field('review_button_external'); ?>
        <a href="<?php echo $reviewsUrl; ?>" class="btn-outline blue hiw-sec-btn">
          <?php the_field('pla_review_button_text') ?>
        </a>
      </div>
    </article>

    <article class="col">
      <div class="img-wrap">
        <?php
          $counter = 1;
          if ( have_rows('review_image_grid') ):
          while ( have_rows('review_image_grid') ): the_row();
          if ( $counter < 3 ) {
        ?>
        <div class="img img-<?php echo $counter ?>" style="background-image: url(<?php the_sub_field('image') ?>);"></div>
        <?php
          } $counter++; endwhile; endif;
        ?>
      </div>
      <div class="img-wrap">
        <?php
          $counter = 1;
          if ( have_rows('review_image_grid') ):
          while ( have_rows('review_image_grid') ): the_row();
          if ( $counter >= 3 ) {
        ?>
        <div class="img img-<?php echo $counter ?>" style="background-image: url(<?php the_sub_field('image') ?>);"></div>
        <?php
          } $counter++; endwhile; endif;
        ?>
      </div>
    </article>
  </div>
</section>

<section class="prod-base-station">
  <div class="prod-sec-heading">
    <h3><?php the_field('base_station_heading'); ?></h3>
    <h4><?php the_field('base_station_heading_copy'); ?></h4>
  </div>
  <figure style="background-image: url(<?php the_field('base_station_image'); ?>);"></figure>
  <figure class="base-station-mobileImg" style="background-image: url(<?php the_field('base_station_mobile_image'); ?>);"></figure>
  <div class="base-station-copy">

    <?php if (have_rows('base_station_copy_group')) : while (have_rows('base_station_copy_group')) : the_row(); ?>

    <div class="station-copy">
      <h6><?php the_sub_field('base_station_copy_group_title'); ?></h6>
      <?php the_sub_field('base_station_copy_group_copy'); ?>
    </div>

    <?php endwhile; endif; ?>

  </div>
  <div class="station-copy-bottom">
    <h6><?php the_field('base_station_bottom_copy_title'); ?></h6>
    <?php the_field('base_station_bottom_copy_copy'); ?>
  </div>
</section>

<section class="prod-helpbtn-sec">
  <div class="prod-sec-heading">
    <h3 class="heading"><?php the_field('help_button_heading'); ?></h3>
    <div class="copy">
      <p><?php the_field('help_button_subheading'); ?></p>
    </div>
  </div>

  <article class="feature-listing-wrap">
    <div class="img-col">
      <span class="white-gradient"></span>
      <img src="<?php the_field('help_button_image'); ?>">
    </div>

    <div class="text-col">

      <?php if (have_rows('features')) : while (have_rows('features')) : the_row(); ?>

      <div class="feature-box">
        <div class="icon-circle" style="background-image: url(<?php the_sub_field('feature_icon'); ?>);">
        </div>
        <h6 class="feature-title"><?php the_sub_field('feature_title'); ?></h6>
        <?php the_sub_field('feature_copy'); ?>
      </div>

      <?php endwhile; endif; ?>

    </div>
  </article>
</section>

<section class="prod-auto-fall-sec">
  <article class="col col-text">
    <div class="prod-sec-heading">
      <h3 class="heading"><?php the_field('auto_fall_heading'); ?></h3>
      <div class="copy">
        <?php the_field('auto_fall_copy'); ?>
      </div>
    </div>
  </article>

  <article class="col col-img">
    <img src="<?php the_field('auto_fall_image'); ?>">
  </article>

  <a href="tel:<?php echo $purePhoneNum; ?>" class="number bottom-call-btn btn-outline red"><?php the_field('table_bottom_note') ?></a>
</section>

<?php include 'inc/rating-section.php' ?>

<?php get_footer(); ?>

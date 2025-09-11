<?php
  //Template Name:  Fall Detection Template
  update_option('current_page_template','fall-detection-temp'); // <----- this adds a body class
  get_header();

  $hero_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
?>

<!-- =========================================================
                Top Subnav
========================================================= -->
<section class="prod-new--topnav">
  <?php include 'inc/hiw-subnav.php' ?>
</section>

<section class="para-hero container on-road-hero">
  <!-- <?php include 'inc/hiw-subnav.php' ?> -->
  <figure class="hero-img hero-img-1" style="background-image: url(<?php the_field('fd_hero_image'); ?>);"></figure>

  <!-- text -->
  <div class="hero-text-wrap">
    <?php the_field('fd_hero_copy'); ?>
  </div>
</section>

<section class="prod-hero-copy-wrap">
  <div class="prod-hero-copy">
    <?php the_field('fd_hero_bottom_copy'); ?>
  </div>
  <div class="prod-video-wrap on-the-road-video-block">
    <div>
      <figure data-videosrc="<?php the_field('fd_hero_video_url'); ?>" style="background-image: url(<?php the_field('fd_hero_video_image') ?>)">
        <span class="play-icon">
          <?php include 'inc/vectors/play-icon.svg'; ?>
        </span>
      </figure>
      <div class="on-the-road-iframe-embed">
        <iframe width="560" height="315" src="" frameborder="0" allow="encrypted-media; autoplay;" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</section>

<?php
  $hero_btn = get_field('fd_hero_bottom_button');
  if ($hero_btn) :
?>
<div class="btn-container padding-t padding-b">
  <a href="<?php echo $hero_btn['url']; ?>" class="btn blue"><?php echo $hero_btn['title']; ?></a>
</div>
<?php endif; ?>


<?php include 'inc/app-sec-banner.php' ?>


<!-- =========================================================
                Split Section
========================================================= -->
<section class="gps-split">

  <div class="gps-split-img" style="background-image: url(<?php the_field('split_image'); ?>);"></div>

  <div class="gps-split-info">
    <h3><?php the_field('split_image_title'); ?></h3>
    <?php the_field('split_image_text'); ?>
  </div>
</section>


<section class="prod-base-station">

  <h3><?php the_field('product_info_list_header'); ?></h3>

  <div class="gps-prod">
    <ul class="gps-info-list">
      <?php if (have_rows('product_info_list_item')) : while (have_rows('product_info_list_item')) : the_row(); ?>
        <li><h5><?php the_sub_field('text'); ?></h5><img src="<?php the_sub_field('icon'); ?>"></li>
      <?php endwhile; endif; ?>
    </ul>

    <img class="gps-info-img" src="<?php the_field('product_info_list_image'); ?>">
  </div>

  <div class="product-image">
    <img src="<?php the_field('product_image'); ?>">
    <h6><?php the_field('product_image_text'); ?></h6>
  </div>

</section>


<section class="prod-base-station product-image-section">
  <div class="prod-sec-heading">
    <h3 class="small-padding"><?php the_field('product_image_1_title'); ?></h3>
    <p class="hiw-sec-copy"><?php the_field('product_image_1_subtext'); ?></p>
  </div>

  <ul class="product-image-ul prod-antenna">
    <?php if (have_rows('product_image_1')) : while (have_rows('product_image_1')) : the_row(); ?>
    <li>
      <img src="<?php the_sub_field('image'); ?>">
      <h6><?php the_sub_field('title'); ?></h6>
    </li>
    <?php endwhile; endif; ?>
  </ul>
</section>


<section class="prod-base-station">
  <div class="prod-sec-heading">
    <h3 class="small-padding"><?php the_field('fall_detect_faq_title'); ?></h3>
  </div>

  <ul class="fall-detect-faq">
    <?php if (have_rows('fall_detect_faq_item')) : while (have_rows('fall_detect_faq_item')) : the_row(); ?>
    <li>
      <img src="<?php the_sub_field('image'); ?>">
      <h6><?php the_sub_field('title'); ?></h6>
      <p><?php the_sub_field('text'); ?></p>
    </li>
    <?php endwhile; endif; ?>
  </ul>
</section>


<section class="prod-base-station product-image-section">
  <div class="prod-sec-heading">
    <h3 class="small-padding"><?php the_field('product_image_2_title'); ?></h3>
    <p class="hiw-sec-copy"><?php the_field('product_image_2_subtext'); ?></p>
  </div>

  <ul class="product-image-ul">
    <?php if (have_rows('product_image_2')) : while (have_rows('product_image_2')) : the_row(); ?>
    <li>
      <img src="<?php the_sub_field('image'); ?>">
      <h6><?php the_sub_field('title'); ?></h6>
      <p><?php the_sub_field('text'); ?></p>
    </li>
    <?php endwhile; endif; ?>
  </ul>
</section>

<?php include 'inc/product--accessories.php'; ?>

<section class="fall-detect-btm" style="background-image: url(<?php the_field('fall_detect_btm_image'); ?>);">
  <div class="fall-detect-btm-info">
    <h3><?php the_field('fall_detect_btm_title'); ?></h3>
    <?php the_field('fall_detect_btm_info'); ?>
  </div>
</section>

<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>

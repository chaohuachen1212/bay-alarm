<?php
  // Template Name: Accessories
  update_option('current_page_template', 'accessories');
  get_header();
?>

<!-- =========================================================
                Top Subnav
========================================================= -->
<section class="prod-new--topnav">
  <?php include 'inc/hiw-subnav.php' ?>
</section>

<section class="para-hero acc-hero">
  <!-- nav -->
  <!-- <?php include 'inc/hiw-subnav.php' ?> -->

  <!-- Img -->
  <figure class="hero-img hero-img-1" style="background-image: url(<?php the_field('acc_hero_image') ?>);"></figure>

  <!-- text -->
  <div class="hero-text-wrap">
    <h1 class="heading"><?php the_field('acc_hero_heading'); ?></h3>
    <p><?php the_field('acc_hero_subheading'); ?></p>
  </div>
</section>



<section class="acc-nav inner-max-container">
  <div class="acc-nav-inner">

    <?php
      if (have_rows('acc_items')) : while (have_rows('acc_items')) : the_row();
      $href = str_replace(' ', '-', strtolower(get_sub_field('acc_item_title')));
    ?>

    <a href="#<?php echo $href; ?>">
      <figure style="background-image: url(<?php the_sub_field('acc_item_image'); ?>);"></figure>
      <h6><?php the_sub_field('acc_item_title'); ?></h6>
    </a>

    <?php endwhile; endif; ?>

  </div>
  <?php the_field('acc_mobile_gps_copy'); ?>
</section>


<?php include 'inc/app-sec-banner.php' ?>

<section class="acc-col">

  <?php
    if (have_rows('acc_items')) : while (have_rows('acc_items')) : the_row();
    $id = str_replace(' ', '-', strtolower(get_sub_field('acc_item_title')));
  ?>

  <div id="<?php echo $id; ?>" class="acc-col-item">
    <div>
      <div class="acc-col-split">
        <figure class="acc-img" style="background-image: url(<?php the_sub_field('acc_item_image') ?>)"></figure>
      </div>
      <div class="acc-col-split">
        <article>
          <div class="acc-copy-title">
            <h3><?php the_sub_field('acc_item_title') ?></h3>
            <?php if (get_sub_field('acc_item_video_url')): ?>
            <div class="acc-vid-btn video-modal-call" data-videosrc="<?php the_sub_field('acc_item_video_url'); ?>">
              <div class="acc-vid-btn-icon">
                <?php include 'inc/vectors/play-icon.svg'; ?>
              </div>
              <div class="acc-vid-btn-copy">
                <span>WATCH</span>
                <p><?php the_sub_field('acc_item_video_btn_text'); ?></p>
              </div>
              <?php if (get_sub_field('acc_item_video_btn_img')): ?>
              <div class="acc-vid-btn-img" style="background-image: url(<?php the_sub_field('acc_item_video_btn_img'); ?>)"></div>
              <?php endif; ?>
            </div>
            <?php endif; ?>
          </div>
          <?php
            the_sub_field('acc_item_copy');

            if (have_rows('acc_item_features')) :
          ?>

          <ul>

            <?php while (have_rows('acc_item_features')) : the_row(); ?>

            <li>
              <figure style="background-image: url(<?php the_sub_field('acc_item_feature_icon'); ?>);"></figure>
              <span><?php the_sub_field('acc_item_feature_copy'); ?></span>
            </li>

            <?php endwhile; ?>

          </ul>

          <?php endif; ?>

        </article>
      </div>
    </div>
  </div>

  <?php endwhile; endif; ?>

</section>

<section class="acc-landline container">

  <?php if (have_rows('acc_landline')) : while (have_rows('acc_landline')) : the_row(); ?>

  <div class="acc-landline-split">
    <figure style="background-image: url(<?php the_sub_field('acc_landline_image'); ?>)"></figure>
    <?php the_sub_field('acc_landline_copy'); ?>
  </div>

  <?php endwhile; endif; ?>

</section>

<?php include 'inc/bottom-get-started.php' ?>

<?php get_footer(); ?>

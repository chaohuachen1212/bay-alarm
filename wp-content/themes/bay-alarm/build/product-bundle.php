<?php
  // Template Name: Product Bundle
  update_option('current_page_template','product-details-page prod-inhome');
  get_header();
?>

<!-- =========================================================
                Top Subnav
========================================================= -->
<section class="prod-new--topnav">
  <?php include 'inc/hiw-subnav.php' ?>
</section>

<!-- =========================================================
                Hero Section
========================================================= -->
<section class="bundle-hero">
  <!-- <?php include 'inc/hiw-subnav.php' ?> -->
  <figure class="bundle-hero-img" style="background-image: url(<?php the_field('ih_hero_image'); ?>);"></figure>
  <?php the_field('ih_hero_copy'); ?>
</section>

<section class="bundle-hero-bottom">
  <div class="bundle-hero-bottom-copy">
    <?php the_field('ih_hero_bottom_copy'); ?>
  </div>
</section>

<?php include 'inc/app-sec-banner.php' ?>

<!-- =========================================================
                Base Station
========================================================= -->
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

<section class="bundle-hover-two-col">
  <div class="prod-sec-heading">
    <h3 class="heading"><?php the_field('hover_columns_heading'); ?></h3>
    <div class="copy">
      <p><?php the_field('hover_columns_subheading'); ?></p>
    </div>
  </div>
  <div class="bundle-hover-col">

    <?php if (have_rows('hover_column')) : while (have_rows('hover_column')) : the_row(); ?>
    <div class="hover-col">
      <figure style="background-image: url(<?php the_sub_field('column_image'); ?>);">
        <div class="hover-col-tap">
          <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
              <path d="M0 0h24v24H0V0z" id="a"></path>
            </defs>
            <clipPath id="b">
              <use overflow="visible" xlink:href="#a"></use>
            </clipPath>
            <path clip-path="url(#b)" d="M9 11.24V7.5C9 6.12 10.12 5 11.5 5S14 6.12 14 7.5v3.74c1.21-.81 2-2.18 2-3.74C16 5.01 13.99 3 11.5 3S7 5.01 7 7.5c0 1.56.79 2.93 2 3.74zm9.84 4.63l-4.54-2.26c-.17-.07-.35-.11-.54-.11H13v-6c0-.83-.67-1.5-1.5-1.5S10 6.67 10 7.5v10.74l-3.43-.72c-.08-.01-.15-.03-.24-.03-.31 0-.59.13-.79.33l-.79.8 4.94 4.94c.27.27.65.44 1.06.44h6.79c.75 0 1.33-.55 1.44-1.28l.75-5.27c.01-.07.02-.14.02-.2 0-.62-.38-1.16-.91-1.38z"></path>
          </svg>
        </div>
      </figure>
      <article>
        <div>
          <?php the_sub_field('column_copy'); ?>
        </div>
      </article>
      <div class="hover-col-close">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" fill="none"><path d="M23.5.5l-23 23M23.5 23.5l-23-23"/></g></svg>
      </div>
    </div>
    <?php endwhile; endif; ?>

  </div>
</section>

<section class="bundle-monitor">
  <figure class="monitor-bg" style="background-image: url(<?php the_field('monitor_bg_image'); ?>);"></figure>
  <div class="monitor-content">
    <div>
      <figure style="background-image: url(<?php the_field('monitor_map_image'); ?>);"></figure>
    </div>
    <div>
      <article>
        <?php the_field('monitor_copy'); ?>
      </article>
    </div>
  </div>
</section>

<?php include 'inc/bundle-modules/module-cellular.php'; ?>
<?php include 'inc/product-wall-buttons.php'; ?>
<?php include 'inc/bundle-modules/module-accessories.php'; ?>
<?php include 'inc/product--spouse.php'; ?>
<?php include 'inc/product--consultant.php'; ?>
<?php include 'inc/bottom-get-started.php' ?>

<?php get_footer(); ?>

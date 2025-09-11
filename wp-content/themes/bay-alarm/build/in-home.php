<?php
  // Template Name: In-Home
  update_option('current_page_template','product-details-page prod-inhome');
  get_header();
  $page_temp = get_page_template_slug( get_queried_object_id() );
?>

<!-- =========================================================
                Hero Section
========================================================= -->

<!-- =========================================================
                Top Subnav
========================================================= -->
<section class="prod-new--topnav">
  <?php include 'inc/hiw-subnav.php' ?>
</section>


<section class="para-hero container on-road-hero">
  <!-- <?php include 'inc/hiw-subnav.php' ?> -->
  <figure class="hero-img hero-img-1" style="background-image: url(<?php the_field('ih_hero_image'); ?>);"></figure>

  <!-- text -->
  <div class="hero-text-wrap">
    <?php the_field('ih_hero_copy'); ?>
  </div>
</section>

<section class="prod-hero-copy-wrap">
  <div class="prod-hero-copy">
    <?php the_field('ih_hero_bottom_copy'); ?>
  </div>

  <div class="prod-video-wrap on-the-road-video-block">
    <div>
      <figure data-videosrc="<?php the_field('ih_hero_video_url'); ?>" style="background-image: url(<?php the_field('ih_hero_video_image') ?>)">
        <span class="play-icon">
          <?php include 'inc/vectors/play-icon.svg'; ?>
        </span>
      </figure>
      <div class="on-the-road-iframe-embed">
        <iframe width="560" height="315" src="" frameborder="0" allow="encrypted-media; autoplay;" allowfullscreen></iframe>
      </div>
    </div>
  </div>

  <?php
    $hero_btn = get_field('ih_hero_bottom_button');
    if ($hero_btn) :
  ?>
  <div class="btn-container padding-t padding-b">
    <a href="<?php echo $hero_btn['url']; ?>" class="btn blue"><?php echo $hero_btn['title']; ?></a>
  </div>
  <?php endif; ?>
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


<?php include 'inc/product--installation.php' ?>
<?php include 'inc/product--cellular.php' ?>
<?php include 'inc/product--faq.php' ?>
<?php include 'inc/product-detail-content.php' ?>
<?php include 'inc/bottom-get-started.php' ?>

<?php get_footer(); ?>

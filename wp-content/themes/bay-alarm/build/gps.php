<?php
  //Template Name:  GPS Template
  update_option('current_page_template','gps-temp'); // <----- this adds a body class
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
  <figure class="hero-img hero-img-1" style="background-image: url(<?php the_field('gps_hero_image'); ?>);"></figure>

  <!-- text -->
  <div class="hero-text-wrap">
    <?php the_field('gps_hero_copy'); ?>
  </div>
</section>

<section class="prod-hero-copy-wrap">
  <div class="prod-hero-copy">
    <?php the_field('gps_hero_bottom_copy'); ?>
  </div>
  <div class="prod-video-wrap on-the-road-video-block">
    <div>
      <figure data-videosrc="<?php the_field('gps_hero_video_url'); ?>" style="background-image: url(<?php the_field('gps_hero_video_image') ?>)">
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
  $hero_btn = get_field('gps_hero_bottom_button');
  if ($hero_btn) :
?>
<div class="btn-container padding-t padding-b">
  <a href="<?php echo $hero_btn['url']; ?>" class="btn blue"><?php echo $hero_btn['title']; ?></a>
</div>
<?php endif; ?>


<?php include 'inc/app-sec-banner.php' ?>



<!-- =========================================================
                GPS Info Section
========================================================= -->
<section class="prod-base-station">

  <div class="prod-sec-heading">
    <h3><?php the_field('product_info_header'); ?></h3>
    <h4><?php the_field('product_info_subtext'); ?></h4>
  </div>

  <div class="gps-prod">
    <div class="gps-prod-info">
      <img src="<?php the_field('product_info_img'); ?>">
      <div>
        <div class="gps-line gps-line-1">Speaker</div>
        <div class="gps-line gps-line-2">Push The Button</div>
        <?php the_field('product_text'); ?>
      </div>
    </div>

    <div class="gps-prod-extra">
      <img class="gps-prod-extra-img" src="<?php the_field('product_info_extra_image'); ?>">
      <h5><?php the_field('product_info_extra_title'); ?></h5>
      <a href="<?php echo home_url(); ?>/pricing/"><?php the_field('product_info_link_text'); ?></a>
    </div>
  </div>


  <div class="prod-sec-heading">
    <h3><?php the_field('product_info_list_header'); ?></h3>
    <h4><?php the_field('product_info_list_subtext'); ?></h4>
  </div>

  <div class="gps-prod">
    <ul class="gps-info-list">
      <?php if (have_rows('product_info_list_item')) : while (have_rows('product_info_list_item')) : the_row(); ?>
        <li><h5><?php the_sub_field('text'); ?></h5><img src="<?php the_sub_field('icon'); ?>"></li>
      <?php endwhile; endif; ?>
    </ul>

    <img class="gps-info-img" src="<?php the_field('product_info_list_image'); ?>">
  </div>

  <?php if (have_rows('inc_acc_item')): ?>
  <div class="gps-prod">
    <ul class="gps-prod-accessories">
      <?php while (have_rows('inc_acc_item')) : the_row(); ?>
      <li>
        <img src="<?php the_sub_field('image'); ?>">
        <h6><?php the_sub_field('text'); ?></h6>
      </li>
      <?php endwhile; ?>
    </ul>
  </div>
  <?php endif; ?>
</section>

<section class="gps-split">

  <div class="gps-split-img" style="background-image: url(<?php the_field('split_image'); ?>);"></div>

  <div class="gps-split-info">
    <h3><?php the_field('split_image_title'); ?></h3>
    <?php the_field('split_image_text'); ?>
  </div>
</section>

<section class="gps-cta-info">
  <h3><?php the_field('cta_title'); ?></h3>
  <ul>

    <?php if (have_rows('cta_item')) : while (have_rows('cta_item')) : the_row(); ?>
    <li>
      <div class="gps-cta-img" style="background-image: url(<?php the_sub_field('image'); ?>)"></div>
      <?php the_sub_field('text'); ?>
    </li>
    <?php endwhile; endif; ?>

  </ul>
</section>


<section class="hiw-call-centers">

  <article class="heading-wrap container">
    <h4 class="hiw-sec-title"><?php the_field("centers_heading") ?></h4>
    <p class="hiw-sec-copy"><?php the_field("centers_subtext") ?></p>
  </article>

  <article class="cols-wrap">
    <div class="col content-col container">
      <?php
        if( have_rows('centers_text_group') ):
        while( have_rows('centers_text_group') ): the_row();
      ?>
      <section class="content-group">
        <h5 class="content-title"><?php the_sub_field('title') ?></h5>
        <?php the_sub_field('copy') ?>
      </section>
      <?php
        endwhile; endif;
      ?>
    </div>

    <div class="col centers-col">
      <img class="map-centers" src="<?php the_field("centers_image") ?>">
    </div>
  </article>
</section>


<section id="accessories" class="prod-accessories-sec">

  <div class="inner-max-container">
    <div class="prod-sec-heading">
      <h3 class="heading"><?php the_field('accessories_heading'); ?></h3>
      <div class="copy">
        <p><?php the_field('accessories_subheading'); ?></p>
      </div>
    </div>

    <div class="cols-wrap">

      <?php if (have_rows('accessories_column')) : while (have_rows('accessories_column')) : the_row(); ?>

      <article class="col">
        <img src="<?php the_sub_field('acc_col_image'); ?>">
        <h6 class="col-title"><?php the_sub_field('acc_col_title'); ?></h6>
        <p><?php the_sub_field('acc_col_copy'); ?></p>
      </article>

      <?php endwhile; endif; ?>

    </div>

    <a href="<?php the_field('accessories_link_url'); ?>" class="btn-outline blue ctabtn"><?php the_field('accessories_link_text'); ?></a>
  </div>
</section>


<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>

<?php
  // Template Name: Cellular
  update_option('current_page_template','product-details-page product-cellular');
  get_header();
?>

<!-- =========================================================
                Hero Section
========================================================= -->
<section class="para-hero textleft-hero container"> <!-- add .prod-video-hero for custom hero with video btns -->

  <!-- nav -->
  <?php include 'inc/hiw-subnav.php' ?>

  <!-- Img -->
  <figure class="hero-img hero-img-1" style="background-image: url(<?php the_field('prod_hero_image'); ?>);"></figure>

  <!-- text -->
  <div class="hero-text-wrap">
    <?php the_field('prod_hero_heading'); ?>
    <?php the_field('prod_hero_heading_copy'); ?>
  </div>
</section>

<!-- =========================================================
                Intro Section
========================================================= -->
<section class="prod-intro-sec">
  <article class="container-wrap">
    <div class="col col-img">
      <img class="prod-img" src="<?php the_field('prod_hero_bottom_image'); ?>">
    </div>

    <div class="col col-text">
      <ul>

        <?php if (have_rows('prod_hero_bottom_list')) : while (have_rows('prod_hero_bottom_list')) : the_row(); ?>

        <li><?php the_sub_field('prod_hero_bottom_list_item'); ?></li>

        <?php endwhile; endif; ?>

      </ul>
      <div class="map-coverage">
        <div class="map-col">
          <img src="<?php the_field('prod_hero_cellular_map_image'); ?>">
        </div>
        <div class="map-text-col">
          <div class="text-wrap">
            <p><?php the_field('prod_hero_cellular_map_copy'); ?></p>
            <a href="<?php the_field('prod_hero_cellular_map_link_url'); ?>" target="_blank"><?php the_field('prod_hero_cellular_map_link_text'); ?></a>
          </div>
        </div>
      </div>
    </div>
  </article>
</section>


<?php include 'inc/app-sec-banner.php' ?>
<?php include 'inc/product--faq.php'; ?>
<?php include 'inc/product--installation.php'; ?>

<!-- =========================================================
                Spec Section
========================================================= -->
<section class="prod-spec-sec">
  <div class="prod-sec-heading">
    <h3 class="heading"><?php the_field('cellular_heading'); ?></h3>
    <div class="copy">
      <p><?php the_field('cellular_heading_copy'); ?></p>
    </div>
  </div>

  <div class="prod-wrap">
    <img class="prod-img" src="<?php the_field('cellular_image'); ?>" >

    <?php
      $count = 1;
      if (have_rows('cellular_copy_group')) : while (have_rows('cellular_copy_group')) : the_row();
    ?>

    <article class="feature-box feature-box-<?php echo $count; ?>">
      <span class="icon-cirle" style="background-image: url(<?php the_sub_field('cellular_copy_group_icon'); ?>);">
      </span>
      <span class="line"></span>
      <div class="feature-text-wrap text-right">
        <h6 class="feature-title"><?php the_sub_field('cellular_copy_group_title'); ?></h6>
        <?php the_sub_field('cellular_copy_group_copy'); ?>
      </div>
    </article>

    <?php
      $count++;
      endwhile;
      endif;
    ?>

  </div>
</section>


<?php include 'inc/product-detail-content.php' ?>

<?php include 'inc/bottom-get-started.php' ?>

<?php get_footer(); ?>

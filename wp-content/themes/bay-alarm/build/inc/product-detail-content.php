<?php
  $args = array('post_type' => 'product-detail');
  $the_query = new WP_Query($args);
  if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
?>

<!-- =========================================================
                Help button Section
========================================================= -->
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

      <?php if (have_rows('help_button_group')) : while (have_rows('help_button_group')) : the_row(); ?>

      <div class="feature-box">
        <div class="icon-circle" style="background-image: url(<?php the_sub_field('help_button_group_icon'); ?>);">
        </div>
        <h6 class="feature-title"><?php the_sub_field('help_button_group_title'); ?></h6>
        <?php the_sub_field('help_button_group_copy'); ?>
      </div>

      <?php endwhile; endif; ?>

    </div>
  </article>
</section>

<!-- =========================================================
                Auto Fall Section
========================================================= -->
<section class="prod-auto-fall-sec">
  <article class="col col-text">
    <div class="prod-sec-heading">
      <h3 class="heading"><?php the_field('fall_detection_heading'); ?></h3>
      <div class="copy">
        <?php the_field('fall_detection_copy'); ?>
      </div>
      <a href="<?php the_field('fall_detection_link_url'); ?>" class="btn-outline blue"><?php the_field('fall_detection_link_text'); ?></a>
    </div>
  </article>

  <article class="col col-img">
    <img src="<?php the_field('fall_detection_image'); ?>">
  </article>
</section>

<?php
  endwhile;
  endif;
  wp_reset_query();

  // add wall buttons module for in-home page only
  if (get_page_template_slug() === 'in-home.php'):
    include 'product-wall-buttons.php';
  endif;

  if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
?>

<!-- =========================================================
                Accessories Section
========================================================= -->
<section class="prod-accessories-sec accessories-2col">

  <div class="inner-max-container">

    <div class="cols-wrap">
      <div class="accessories-img">
        <figure style="background-image: url(<?php the_field('accessories_group_image'); ?>);"></figure>
      </div>

      <article class="col">
        <h3 class="heading"><?php the_field('accessories_heading'); ?></h3>

        <div class="copy">
          <p><?php the_field('accessories_subheading'); ?></p>
        </div>

        <?php if (have_rows('accessories_column')) : while (have_rows('accessories_column')) : the_row(); ?>

        <h6 class="col-title"><?php the_sub_field('acc_col_title'); ?></h6>
        <p><?php the_sub_field('acc_col_copy'); ?></p>

        <?php endwhile; endif; ?>

        <a href="<?php the_field('accessories_link_url'); ?>" class="btn-outline blue ctabtn"><?php the_field('accessories_link_text'); ?></a>
      </article>

    </div>
  </div>
</section>

<!-- =========================================================
                Spouse Section
========================================================= -->
<section class="prod-spouse-sec">
  <figure class="big-img" style="background-image: url(<?php the_field('spouse_monitoring_image'); ?>);"></figure>

  <div class="text-box">
    <div class="prod-sec-heading">
      <h3 class="heading"><?php the_field('spouse_monitoring_heading'); ?></h3>
      <div class="copy">
        <?php the_field('spouse_monitoring_copy'); ?>
        <a href="<?php the_field('spouse_monitoring_link_url'); ?>" class="btn blue ctabtn"><?php the_field('spouse_monitoring_link_text'); ?></a>
      </div>
    </div>

  </div>
</section>

<!-- =========================================================
                Consultants Section
========================================================= -->
<section class="prod-consultants-sec">
  <article class="inner-max-container">
    <div class="prod-sec-heading">
      <h3 class="heading"><?php the_field('care_consultants_heading'); ?></h3>
      <div class="copy">
        <p><?php the_field('care_consultants_subheading'); ?></p>
      </div>
    </div>

    <div class="members-wrap">

      <?php if (have_rows('consultants')) : while (have_rows('consultants')) : the_row(); ?>

      <a href="<?php the_sub_field('consultants_url'); ?>" class="member">
        <figure class="mem-img" style="background-image: url(<?php the_sub_field('consultants_image'); ?>);"></figure>
        <div class="caption-wrap">
          <p class="mem-name"><?php the_sub_field('consultants_first_name'); ?></p>
          <p class="mem-more">Learn more</p>
        </div>
      </a>

      <?php endwhile; endif; ?>

    </div>

    <div class="content-text">
      <?php the_field('care_consultants_copy'); ?>
    </div>

    <a href="<?php the_field('care_consultants_link_url'); ?>" class="btn-outline blue ctabtn"><?php the_field('care_consultants_link_text'); ?></a>
  </article>
</section>

<?php
  endwhile;
  endif;
  wp_reset_query();
?>
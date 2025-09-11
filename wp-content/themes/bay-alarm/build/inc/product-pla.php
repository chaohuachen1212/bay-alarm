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
    </div>
  </article>

  <article class="col col-img">
    <img src="<?php the_field('fall_detection_image'); ?>">
  </article>

<?php
  endwhile;
  endif;
  wp_reset_query();
?>

  <a href="tel:<?php echo $purePhoneNum; ?>" class="number bottom-call-btn btn-outline red"><?php the_field('table_bottom_note') ?></a>
</section>
<?php
  $args = array('post_type' => 'product-detail');
  $the_query = new WP_Query($args);
  if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
?>

<!-- =========================================================
                Auto Fall Detection Section
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
?>
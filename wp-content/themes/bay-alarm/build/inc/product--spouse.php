<?php
  $args = array('post_type' => 'product-detail');
  $the_query = new WP_Query($args);
  if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
?>

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

<?php
  endwhile;
  endif;
  wp_reset_query();
?>
<?php
  $args = array('post_type' => 'product-detail');
  $the_query = new WP_Query($args);
  if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
?>

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
<?php
  $args = array('post_type' => 'product-detail');
  $the_query = new WP_Query($args);
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

<?php
  endwhile;
  endif;
  wp_reset_query();
?>
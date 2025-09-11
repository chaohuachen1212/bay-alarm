<?php
  $args = array('post_type' => 'product-detail');
  $the_query = new WP_Query($args);
  if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
?>


<!-- =========================================================
                FAQ Section
========================================================= -->
<section class="prod-faq-sec" style="display: <?php the_field('faq_display') ?>">
  <div class="prod-sec-heading">
    <h3 class="heading"><?php the_field('faq_heading'); ?></h3>
  </div>

  <div class="highlight-container inner-max-container">

    <?php
      $count = 0;
      if (have_rows('faq_columns')) : while (have_rows('faq_columns')) : the_row();
        $color = '';

        switch ($count) {
          case 0:
            $color = 'gray';
            break;
          case 1:
            $color = 'blue';
            break;
          default:
            $color = 'teal-dark';
            break;
        }
    ?>

    <article class="col">
      <div class="col-icons">
        <div class="icon-wrap <?php echo ($count === 1) ? ' two-circle' : ''; ?>">
          <span class="icon-circle <?php echo $color; ?>" style="background-image: url(<?php the_sub_field('faq_col_icon'); ?>);"></span>
        </div>

        <?php if ($count === 1) : ?>

        <div class="icon-wrap two-circle">
          <span class="icon-circle teal" style="background-image: url(<?php the_sub_field('faq_col_icon_2'); ?>);"></span>
        </div>

        <?php endif; ?>

      </div>
      <h6 class="col-title"><?php the_sub_field('faq_col_title'); ?></h6>
      <div class="col-text">
        <?php the_sub_field('faq_col_copy'); ?>
      </div>
    </article>

    <?php
      $count++;
      endwhile;
      endif;
    ?>

  </div>
</section>
<?php
  endwhile;
  endif;
  wp_reset_query();
?>

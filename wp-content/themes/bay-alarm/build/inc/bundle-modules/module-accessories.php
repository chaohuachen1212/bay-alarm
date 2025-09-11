<!-- =========================================================
                Accessories Section
========================================================= -->
<section class="prod-accessories-sec">

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
    
    <?php if ( get_field('show_button_accessories') === 'yes' ) : ?>
    <a href="<?php the_field('accessories_link_url'); ?>" class="btn-outline blue ctabtn"><?php the_field('accessories_link_text'); ?></a>
    <?php endif; ?>
  </div>
</section>


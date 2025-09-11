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

      <?php if ( get_field('fall_show_button') === 'yes' ) : ?>
      <a href="<?php the_field('fall_detection_link_url'); ?>" class="btn-outline blue"><?php the_field('fall_detection_link_text'); ?></a>
      <?php endif; ?>
    </div>
  </article>

  <article class="col col-img">
    <img src="<?php the_field('fall_detection_image'); ?>">
  </article>
</section>


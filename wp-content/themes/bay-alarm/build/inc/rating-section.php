<section id="reviews-section" class="pricing-review <?php echo (get_page_template_slug() === 'pricing-pla.php') ? ' more-padding' : ''; ?>">
  <div class="container">
    <?php if (get_field('review_heading')): ?>
      <article class="intro-wrap">
        <h2 class="heading"><?php the_field('review_heading') ?></h2>
      </article>
    <?php endif; ?>
    <div class="google-reviews no-pad">
      <div class="google-reviews top">
        <?php echo do_shortcode( '[brb_collection id="31258"]' ); ?>
      </div>
      <div class="google-reviews small-top">
        <?php echo do_shortcode( '[brb_collection id="31257"]' ); ?>
      </div>
    </div>
    <?php if (get_page_template_slug() !== 'pricing-pla.php'): ?>
    <div class="button-wrap">
      <?php $url = (get_field('review_url', 'option')) ? get_field('review_url', 'option') : get_home_url() . '/medical-alert-reviews/' ?>
      <a href="<?php echo $url; ?>" class="add-review-btm"><?php the_field('review_button_text') ?></a>
    </div>
    <?php endif; ?>

    <?php if (get_page_template_slug() === 'pricing-pla.php'): ?>
    <a href="tel:<?php echo $purePhoneNum; ?>" class="number bottom-call-btn more-space btn-outline red"><?php the_field('table_bottom_note') ?></a>
    <?php endif; ?>
  </div>
</section>

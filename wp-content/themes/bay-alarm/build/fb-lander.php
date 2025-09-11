<?php
  // Template Name: FB Landing
  update_option('current_page_template', 'fb-landing');
  get_header();
  $number = str_replace('-', '', get_field('call_number'));
?>

<section class="fb-landing-hero" style="background-image: url(<?php the_field('fb_hero_img'); ?>);">
  <div>
    <h1><?php the_field('hero_copy'); ?></h1>
    <a href="tel:<?php echo $number; ?>" class="btn">
      <span>Call Now – <?php the_field('call_number'); ?></span>
      <?php include 'inc/vectors/phone.svg'; ?>
    </a>
  </div>
</section>

<section class="fb-content">
  <div>
    <?php if (have_rows('fb_copy_blocks')) : while (have_rows('fb_copy_blocks')) : the_row(); ?>
    <div class="fb-copy">
      <?php the_sub_field('fb_copy'); ?>
    </div>
    <?php endwhile; endif; ?>
    <div class="fb-btn">
      <a href="tel:<?php echo $number; ?>" class="btn-outline blue">Call: <?php the_field('call_number'); ?></a>
    </div>
  </div>
  <div>
    <figure style="background-image: url(<?php the_field('fb_right_image'); ?>);"></figure>
  </div>
</section>

<?php get_footer(); ?>

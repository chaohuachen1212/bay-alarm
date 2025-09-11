<?php
  // Template Name: Meet the Team
  update_option('current_page_template','meet-the-team');
  get_header();
?>
<?php if (get_field('hero_text')): ?>
<!-- =========================================================
                Hero Section
========================================================= -->
<section class="bundle-hero team-single-hero">
  <figure class="bundle-hero-img" style="background-image: url(<?php the_field('hero_image'); ?>);"></figure>
  <h1><?php the_field('hero_text'); ?></h1>
</section>
<?php endif; ?>
<?php if (get_field('team_intro_copy')): ?>
<section class="bundle-hero-bottom">
  <div class="bundle-hero-bottom-copy">
    <?php the_field('team_intro_copy'); ?>
  </div>
</section>
<?php endif; ?>

<?php include 'inc/team/meet.php'; ?>

<?php get_footer(); ?>

<?php
  // Template Name: Refer-A-Friend
  update_option('current_page_template','refer');
  get_header();

  $hero_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
?>

<section class="brochure-hero" style="background-image: url(<?php echo $hero_image; ?>);">
  <div class="center-all">
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </div>
</section>

<section class="refer-a-friend">

<!--
  <article class="refer-block">

    <div class="refer-text"><?php // the_field('refer_text'); ?></div>
    <div class="refer-message"></div>

  </article>

  <article class="refer-block">
    <figure style="background-image: url(<?php // the_field('refer_image'); ?>);"></figure>
    <?php // the_field('refer_info'); ?>
  </article>

-->

</section>

<?php include 'inc/bottom-get-started.php' ?>


<?php get_footer(); ?>

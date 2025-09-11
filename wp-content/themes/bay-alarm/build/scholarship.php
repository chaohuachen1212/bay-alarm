<?php
  //Template Name:  Scholarship
  update_option('current_page_template','scholarship'); // <----- this adds a body class
  get_header();
?>


<section class="home-hero">
  <figure class="hero-img hero-img-1" style="background-image: url(<?php the_field("hero_image"); ?>);"></figure>
  <article class="text-box">
    <h1 class="heading"><?php the_field("hero_heading"); ?></h1>
    <?php the_field("hero_copy"); ?>
  </article>
</section>


<section class="submit-info-wrap">
  <article class=" scholarship-split submit-info">
    <h3><?php the_field('submit_title'); ?></h3>
    <?php the_field('submit_info'); ?>
  </article>

  <ul class=" scholarship-split submit-images">
  <?php if (have_rows('submit_image')) : while (have_rows('submit_image')) : the_row(); ?>
    <li style="background-image: url(<?php the_sub_field('image'); ?>);"></li>
  <?php endwhile; endif; ?>
  </ul>
</section>

<section class="additional-info">
  <article class=" scholarship-split add-info-item add-info-left"><?php the_field('add_info_left'); ?></article>
  <article class=" scholarship-split add-info-item add-info-right"><?php the_field('add_info_right'); ?></article>
</section>

<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>

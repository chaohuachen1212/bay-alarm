<?php
  //Template Name:  Customer Service
  update_option('current_page_template','customer-service');
  get_header();

  $hero_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
?>

<section class="cs-hero" style="background-image: url(<?php echo $hero_image; ?>);">
  <div class="center-all">
    <h1><?php the_title(); ?></h1>
    <p><?php the_field('sub_title'); ?></p>
  </div>
</section>

<!-- Contact Form -->

<?php
  $args = array('post_type' => 'contact_info');
  $the_query = new WP_Query($args);
  while ($the_query->have_posts()): $the_query->the_post();
?>

<section class="contact-form-wrapper customer-service-contact">

  <article>
    <h2><?php the_title(); ?></h2>
    <h4><?php the_field('sub_title'); ?></h4>
    <?php the_field('information'); ?>

    <div class="contact-btn">
      <?php if (have_rows('buttons')) : while (have_rows('buttons')) : the_row(); ?>
      <a href="<?php the_sub_field('link'); ?>" class="btn-outline blue" <?php the_sub_field('new_tab'); ?>><?php the_sub_field('label'); ?></a>
      <?php endwhile; endif; ?>
    </div>
  </article>

</section>

<?php
  endwhile;
  wp_reset_query();
?>

<section class="cs-40-split">
  <figure style="background-image: url(<?php the_field('middle_image'); ?>);"></figure>
  <article>
    <h2><?php the_field('middle_title'); ?></h2>
    <h4><?php the_field('middle_sub_title'); ?></h4>
    <p><?php the_field('middle_info'); ?></p>

    <?php if (have_rows('middle_button')) : while (have_rows('middle_button')) : the_row(); ?>
    <a href="<?php the_sub_field('link'); ?>" class="btn-outline blue" <?php the_sub_field('new_tab'); ?>><?php the_sub_field('label'); ?></a>
    <?php endwhile; endif; ?>
  </article>
</section>

<section class="cs-50-split">

  <?php if (have_rows('middle_cta')) : while (have_rows('middle_cta')) : the_row(); ?>
  <figure style="background-image: url(<?php the_sub_field('background_image'); ?>);">
    <div class="center-all">
      <h2><?php the_sub_field('label'); ?></h2>
      <a href="<?php the_sub_field('link'); ?>" class="btn-outline white" <?php the_sub_field('new_tab'); ?>><?php the_sub_field('label'); ?></a>
    </div>
  </figure>
  <?php endwhile; endif; ?>

</section>

<section class="cs-about">
  <h2><?php the_field('bottom_title'); ?></h2>
  <p><?php the_field('bottom_sub_title'); ?></p>
  <ul>
    <?php if (have_rows('bottom_item')) : while (have_rows('bottom_item')) : the_row(); ?>
    <li>
      <a href="<?php the_sub_field('link'); ?>">
        <figure style="background-image: url(<?php the_sub_field('image'); ?>);"></figure>
        <p><?php the_sub_field('text'); ?></p>
      </a>
    </li>
    <?php endwhile; endif; ?>
  </ul>
</section>


<?php include 'inc/bottom-get-started.php' ?>

<?php get_footer(); ?>

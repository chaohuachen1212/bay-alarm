<?php
  // Template Name: Privacy Policy
  update_option('current_page_template', 'privacy-policy');
  get_header();
?>

<section class="privacy container">

  <div class="privacy-content">
    <div class="privacy-group">
      <div class="pg-left"></div>
      <div class="pg-right privacy-top">
        <?php if (get_field('privacy_title')): ?>
          <h1 style="font-size:38px; font-weight:100;"><?php the_field('privacy_title'); ?></h1>
          <span><?php the_field('effective_date'); ?></span>
        <?php endif; ?>
      </div>
    </div>

    <?php
      if (have_rows('privacy_group')) : while (have_rows('privacy_group')) : the_row();
      $sub_field = get_sub_field('privacy_group_title');
      $sub_title = strtolower(str_replace(' ', '-', substr($sub_field, strpos($sub_field, '.') + 2)));
    ?>

    <div id="<?php echo $sub_title; ?>" class="privacy-group">
      <div class="pg-left">
        <?php if (get_sub_field('privacy_group_title')): ?>
          <h6><?php the_sub_field('privacy_group_title') ?></h6>
        <?php endif; ?>
      </div>
      <div class="pg-right">
        <?php the_sub_field('privacy_group_copy') ?>
      </div>
    </div>

    <?php endwhile; endif; ?>

  </div>
</section>

<?php include 'inc/bottom-get-started.php' ?>


<?php get_footer(); ?>

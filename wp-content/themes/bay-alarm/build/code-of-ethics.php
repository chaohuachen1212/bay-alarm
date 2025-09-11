<?php
  // Template Name: Code of Ethics
  update_option('current_page_template', 'code-of-ethics');
  get_header();
?>

<section class="container">

  <div class="ethics-content">
    <h1><?php the_field('heading') ?></h1>
    <?php the_field('intro_text') ?>

    <ol class="code-list">
      <?php
        if( have_rows('code_listing') ):
        while( have_rows('code_listing') ): the_row();
          if (get_sub_field('title')):
      ?>
      <li>
        <!-- <p><?php // the_sub_field('title') ?></p> -->
        <h2><?php the_sub_field('title') ?></h2>
        <?php the_sub_field('text') ?>
      </li>
    <?php endif; ?>
      <?php
        endwhile; endif;
      ?>
    </ol>

  </div>
</section>

<?php include 'inc/bottom-get-started.php' ?>


<?php get_footer(); ?>

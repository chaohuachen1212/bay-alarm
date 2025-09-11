<?php
  // Template Name: Languages
  update_option('current_page_template', 'languages-page');
  get_header();
?>

<section class="lsl-hero" style="background-image: url(<?php the_field('hero_image') ?>);">
  <div class="center-all">
    <h1><?php the_field('hero_text') ?></h1>
    <p><?php the_field('hero_subtext') ?></p>
  </div>
</section>


<section class="container">

  <article class="lang-list-wrap">
    <?php
      if( have_rows('language_list') ):
      while( have_rows('language_list') ): the_row();
    ?>
    <div class="col">
      <?php the_sub_field('column') ?>
    </div>
    <?php
      endwhile; endif;
    ?>
  </article>
  
</section>

<?php include 'inc/bottom-get-started.php' ?>


<?php get_footer(); ?>

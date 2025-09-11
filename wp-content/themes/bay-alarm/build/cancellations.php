<?php
  // Template Name: Cancellations
  update_option('current_page_template', 'cancellations');
  get_header();
?>
  <section class="cancellations--hero">
    <div class="container">
      <div class="row">
          <?php
          $hero_text = get_field('hero_title');
          $hero_copy = get_field('hero_copy');
          ?>
          <div class="col-l">
          <article>
          <span class="sub-head"><?php the_field('hero_subhead'); ?></span>
          <?php if ($hero_text): ?>
              <h1><?php echo $hero_text; ?></h1>
          <?php endif; ?>
          <?php if ($hero_copy): ?>
              <?php echo $hero_copy; ?>
          <?php endif; ?>

          <?php
          $desktop_hero_image = get_field('hero_image');
          ?>
        </article>
      </div>
        <figure>
          <img class="hero-image" src="<?php echo $desktop_hero_image; ?>">
        </figure>
      </div>
    </div>
  </section>

<section class="cancellations--main-content">
  <div class="container">
    <?php
      if( have_rows('main_contents') ):
      while( have_rows('main_contents') ): the_row();
    ?>
    <div class="row">
      <div class="col">
        <h2><?php the_sub_field('title'); ?></h2>
        <?php the_sub_field('copy'); ?>
      </div>

      <div class="col">
        <img src="<?php the_sub_field('image'); ?>" alt="Image">
      </div>
    </div>
    <?php
      endwhile; endif;
    ?>
  </div>
</section>





<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>
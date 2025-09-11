<?php
  // Template Name: Aging Place Thanks
  update_option('current_page_template','aging-place-thanks'); // <----- this adds a body class
  get_header();
?>

<section class="aging-place-thanks--main">
  <div class="container">
    <div class="top-wrap">
      <img class="main-icon" src="<?php the_field('main_icon') ?>" alt="Hero Icon">
      <h1><?php the_field('main_title') ?></h1>
    </div>

    <div class="card-wrap">
      <div class="row">
      <figure>
        <img src="<?php the_field('main_image') ?>" alt="Main Image">
      </figure>

      <article>
        <h2><?php the_field('main_header_one') ?></h2>
        <?php the_field('main_copy_one') ?>
        <hr>
        <h2><?php the_field('main_header_two') ?></h2>
        <?php the_field('main_copy_two') ?>
        <div class="button-wrap">
          <?php if (get_field('first_button_url')): ?>
            <a class="btn" href="<?php the_field('first_button_url') ?>"><?php the_field('first_button_text') ?></a>
          <?php endif; ?>
          <?php
            $phone_number = get_field("second_button_phone_number");
            $phone_number = preg_replace('/[^0-9]/', '', $phone_number);
            if ($phone_number):
          ?>
          <a href="tel:<?php echo $phone_number ?>" class="btn call-btn number">
            <span class="promoNumber"><?php the_field("second_button_text") ?></span>
          </a>
          <?php endif; ?>
        </div>
      </article>
      </div>
    </div>
  </div>
</section>

<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>

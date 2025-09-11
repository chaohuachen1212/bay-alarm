<?php
  // Template Name: Health Partner Lander
  update_option('current_page_template', 'health-partner-lander');
  get_header();
?>

  <?php
    include 'inc/healt-partner-hero.php';
    include 'inc/logos-block.php';
  ?>

  

  <section class="health-partner--channels">
    <div class="container">
      <div class="top-wrap">
        <h2><?php the_field('channels_title'); ?></h2>
        <?php the_field('channels_copy'); ?>
      </div>

      <div class="row">
          <?php
            if( have_rows('channels_cards') ):
            while( have_rows('channels_cards') ): the_row();
          ?>
          <a class="col" href="<?php the_sub_field('link'); ?>">
               <img class="icon" src="<?php the_sub_field('icon'); ?>" alt="Icon">
               <h3><?php the_sub_field('title'); ?></h3>
               <p><?php the_sub_field('copy'); ?></p>
               <span class="btn">Learn More</span>
          </a>
          <?php
            endwhile; endif;
          ?>
      </div>

      <div class="bottom-card">
        <div class="copy-wrap">
          <img class="icon" src="<?php the_field('channels_bottom_card_icon'); ?>" alt="Icon">
          <h3><?php the_field('channels_bottom_card_copy'); ?></h3>
        </div>
          <a href="<?php the_field("hero_button_link") ?>" class="btn call-btn">
            <span class="small-text"><?php the_field("hero_button_text") ?></span>
          </a>
      </div>
    </div>
  </section>

  <section class="health-partner--solutions">
    <div class="container">
      <div class="top-wrap">
        <h2><?php the_field('solutions_title'); ?></h2>
        <?php the_field('solutions_copy'); ?>
      </div>

      <div class="row">
        <?php
          if( have_rows('solutions_cards') ):
          while( have_rows('solutions_cards') ): the_row();
        ?>
        <a class="card" href="">
          <figure>
            <img src="<?php the_sub_field('image'); ?>" alt="Image">
          </figure>
          <h3><?php the_sub_field('title'); ?></h3>
          <p><?php the_sub_field('copy'); ?></p>
          <span class="btn">Learn More</span>
        </a>
        <?php
            endwhile; endif;
          ?>
      </div>
    </div>
  </section>


  <section class="health-partner--glad">
    <div class="container">
      <div class="row">
        <div class="col">
          <img src="<?php the_field('glad_image'); ?>" alt="Icon">
        </div>
        <div class="col">
          <h2><?php the_field('glad_title'); ?></h2>
          <?php the_field('glad_copy'); ?>
        </div>
      </div>
    </div>
  </section>


<section class="health-partner--form" id="b2b-contact">
    <div class="container">
      <div class="row">
        <div class="col copy">
          <img src="<?php echo GET_TEMP ?>/img/form-icons.png" alt="Image">
          <h2>Become a Bay Alarm Health Partner Today!</h2>
          <p>Talk to someone in partnerships today or call us toll free <a class="“number" href="tel:18775229633"><span class="promoNumber">1-877-522-9633</span></a></p>
        </div>

        <div class="col form-wrap">
          <?php include 'inc/b2b-interest-form.php'; ?>
        </div>
      </div>
    </div>
  </section>


<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>

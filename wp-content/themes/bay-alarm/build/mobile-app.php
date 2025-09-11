<?php
  // Template Name: Mobile App
  update_option('current_page_template','mobile-app-page');
  get_header();
?>

<!-- =========================================================
                Hero Section
========================================================= -->
<section class="para-hero textleft-hero container prod-video-hero">

  <!-- Img -->
  <figure class="hero-img hero-img-1" style="background-image: url(<?php the_field("hero_background") ?>);"></figure>

  <!-- text -->
  <div class="hero-text-wrap">
    <p class="small-text"><?php the_field("hero_heading_small_text") ?></p>
    <h1 class="heading"><?php the_field("hero_heading") ?></h1>
    <p><?php the_field("hero_paragraph") ?></p>
    <div class="badges-wrap">
      <a aria-label="Download the <?php the_field("hero_heading") ?> from Apple Store" href="<?php the_field("apple_store_url") ?>" target="_blank">
        <img alt="<?php echo esc_attr(get_field("apple_store_badge")['alt']) ?>" src="<?php echo esc_url(get_field("apple_store_badge")['url']) ?>" class="badge">
      </a>
      <a aria-label="Download the <?php the_field("hero_heading") ?> from Google Play" href="<?php the_field("google_play_url") ?>" target="_blank">
        <img alt="<?php echo esc_attr(get_field("google_play_badge")['alt']) ?>" src="<?php echo esc_url(get_field("google_play_badge")['url']) ?>" class="badge">
      </a>
    </div>
  </div>
</section>

<!-- =========================================================
                Intro Section
========================================================= -->
<section class="prod-intro-sec">
  <article class="container-wrap no-map">
    <div class="col col-img">
      <?php if (get_field('intro_image')): ?>
        <img class="prod-img" alt="<?php echo esc_attr(get_field("intro_image")['alt']) ?>" src="<?php echo esc_url(get_field("intro_image")['url']) ?>">
      <?php endif; ?>
    </div>

    <div class="col col-text">
      <ul>
        <?php
          if( have_rows('intro_bullet_items') ):
          while( have_rows('intro_bullet_items') ): the_row();
        ?>
        <li><?php the_sub_field("item") ?></li>
        <?php
          endwhile; endif;
        ?>
      </ul>
    </div>
  </article>
</section>

<!-- =========================================================
                Body
========================================================= -->

<section class="app-features-sec">

  <article class="intro">
    <h3><?php the_field("features_heading") ?></h3>
    <p><?php the_field("features_subtext") ?></p>
  </article>

  <article class="listing-wrap">
    <div class="mobile-col">
      <?php if (get_field('background_phone')): ?>
        <img alt="<?php echo esc_attr(get_field("background_phone")['alt']) ?>" src="<?php echo esc_url(get_field("background_phone")['url']) ?>">
      <?php endif; ?>
      <div class="screen-imgs-wrap">
        <?php
          $counter = 1;
          if( have_rows('features_items') ):
          while( have_rows('features_items') ): the_row();
          ( $counter === 1 ) ? $activeClass = "is-active" : $activeClass = "";
        ?>
        <?php if (get_sub_field('phone_screen_image')): ?>
          <img class="<?php echo $activeClass; ?>" alt="<?php echo esc_attr(get_sub_field("phone_screen_image")['alt']) ?>" src="<?php echo esc_url(get_sub_field("phone_screen_image")['url']) ?>">
        <?php endif; ?>
        <?php
          $counter++; endwhile; endif;
        ?>
      </div>
    </div>

    <div class="content-col">
      <div class="item-wrap">
        <?php
          if( have_rows('features_items') ):
          while( have_rows('features_items') ): the_row();
          ( $counter === 1 ) ? $activeClass = "is-active" : $activeClass = "";
        ?>
        <section class="list-tiem">
          <div class="icon">
            <img alt="<?php echo esc_attr(get_sub_field("icon")['alt']) ?>" src="<?php echo esc_url(get_sub_field("icon")['url']) ?>">
          </div>
          <h6><?php the_sub_field("title") ?></h6>
          <p><?php the_sub_field("subtext") ?></p>
        </section>
        <?php
          endwhile; endif;
        ?>
      </div>
      <?php if (get_field('feature_bottom_image')): ?>
        <img class="bottom-img" alt="<?php echo esc_attr(get_field("feature_bottom_image")['alt']) ?>" src="<?php echo esc_url(get_field("feature_bottom_image")['url']) ?>">
      <?php endif; ?>
    </div>
  </article>
</section>



<section class="app-bottom" style="background-image: url(<?php the_field("banner_background") ?>);">
  <h5><?php the_field("banner_heading") ?></h5>
  <p><?php the_field("banner_subtext") ?></p>
  <div class="badges-wrap">
    <a href="<?php the_field("apple_store_url") ?>" target="_blank" aria-label="Download the <?php the_field("hero_heading") ?> from Apple Store">
      <img alt="<?php echo esc_attr(get_field("apple_store_badge")['alt']) ?>" src="<?php echo esc_url(get_field("apple_store_badge")['url']) ?>" class="badge">
    </a>
    <a href="<?php the_field("google_play_url") ?>" target="_blank" aria-label="Download the <?php the_field("hero_heading") ?> from Google Play">
      <img alt="<?php echo esc_attr(get_field("google_play_badge")['alt']) ?>" src="<?php echo esc_url(get_field("google_play_badge")['url']) ?>" class="badge">
    </a>
  </div>
</section>



<?php include 'inc/bottom-get-started.php' ?>

<?php get_footer(); ?>

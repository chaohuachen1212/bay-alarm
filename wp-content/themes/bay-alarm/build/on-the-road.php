<?php
  // Template Name: On the Road
  update_option('current_page_template', 'on-the-road');
  get_header();
?>

<!-- =========================================================
                Top Subnav
========================================================= -->
<section class="prod-new--topnav">
  <?php include 'inc/hiw-subnav.php' ?>
</section>

<section class="para-hero container on-road-hero">
  <!-- <?php include 'inc/hiw-subnav.php' ?> -->
  <figure class="hero-img hero-img-1" style="background-image: url(<?php the_field('road_hero_image'); ?>);"></figure>

  <div class="hero-text-wrap">
    <?php the_field('road_hero_copy'); ?>

    <div class="on-the-road-video-block">
      <div>
        <figure data-videosrc="<?php the_field('road_hero_video_url'); ?>" style="background-image: url(<?php the_field('road_hero_video_image') ?>)">
          <span class="play-icon">
            <?php include 'inc/vectors/play-icon.svg'; ?>
          </span>
        </figure>
        <div class="on-the-road-iframe-embed">
          <iframe width="560" height="315" src="" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
        </div>
      </div>
    </div>

  </div>
</section>

<section class="on-the-road-awards">
  <div class="awards-top">
    <img src="<?php echo esc_url(get_field('awards_quote_logo')['url']); ?>" alt="<?php echo esc_attr(get_field('awards_quote_logo')['alt']) ?>">
    <h2><?php the_field('awards_quote_heading'); ?></h2>
    <h5><?php the_field('awards_quote_subheading'); ?></h5>
  </div>
  <div class="awards-quote">
    <p class="awards-quote-copy"><?php the_field('awards_quote_copy'); ?></p>
    <p class="awards-quote-author">- <?php the_field('awards_quote_author'); ?></p>
  </div>
</section>

<section class="on-the-road-awards-row">
  <div class="awards-logo-container">
    <p><?php the_field('awards_logos_heading'); ?></p>
    <div class="awards-logo-row">
      <?php if (have_rows('awards_logos')): while (have_rows('awards_logos')): the_row(); ?>
      <div class="awards-logo">
        <figure style="background-image: url(<?php the_sub_field('logo'); ?>)"></figure>
      </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>

<section class="splitsecnd-app app-features-sec">
  <div class="features-intro-copy">
    <?php the_field('app_scroll_intro_copy'); ?>
  </div>
  <article class="listing-wrap">
    <div class="mobile-col">
      <img src="<?php echo esc_url(get_field("app_background_phone")['url']) ?>" alt="<?php echo esc_attr(get_field("app_background_phone")['alt']) ?>">
      <div class="screen-imgs-wrap">
        <?php
          $counter = 1;
          if( have_rows('app_features_items') ):
          while( have_rows('app_features_items') ): the_row();
          ( $counter === 1 ) ? $activeClass = "is-active" : $activeClass = "";
        ?>
        <img class="<?php echo $activeClass; ?>" src="<?php echo esc_url(get_sub_field("phone_screen_image")['url']) ?>" alt="<?php echo esc_attr(get_sub_field("phone_screen_image")['alt']) ?>">
        <?php
          $counter++; endwhile; endif;
        ?>
      </div>
    </div>

    <div class="content-col">
      <div class="item-wrap">
        <?php
          if( have_rows('app_features_items') ):
          while( have_rows('app_features_items') ): the_row();
          ( $counter === 1 ) ? $activeClass = "is-active" : $activeClass = "";
        ?>
        <section class="list-tiem">
          <div class="icon">
            <img src="<?php echo esc_url(get_sub_field("icon")['url']) ?>" alt="<?php echo esc_attr(get_sub_field("icon")['alt']) ?>">
          </div>
          <h6><?php the_sub_field("title") ?></h6>
          <p><?php the_sub_field("subtext") ?></p>
        </section>
        <?php
          endwhile; endif;
        ?>
      </div>
      <img class="bottom-img" src="<?php echo esc_url(get_field("app_feature_bottom_image")['url']) ?>" alt="<?php echo esc_attr(get_field("app_feature_bottom_image")['alt']) ?>">
    </div>
  </article>
  <div class="app-features-sec-cta">
    <a href="<?php the_field('app_scroll_cta_url'); ?>" class="btn blue outline"><?php the_field('app_scroll_cta_text'); ?></a>
  </div>
</section>

<section class="on-the-road-visual text-center">
  <figure style="background-image: url(<?php the_field('keys_image'); ?>)"></figure>
  <article>
    <div>
      <?php the_field('keys_copy'); ?>
    </div>
  </article>
</section>

<section class="splitsecnd-features">
  <div class="features-intro-copy">
    <?php the_field('app_intro_copy'); ?>
  </div>
  <div class="splitsecnd-detail">
    <div>
      <img src="<?php echo esc_url(get_field('app_intro_image')['url']); ?>" alt="<?php echo esc_attr(get_field('app_intro_image')['alt']) ?>">
    </div>
    <article>
      <ul>
        <?php if (have_rows('app_intro_items')): while (have_rows('app_intro_items')): the_row(); ?>
        <li><?php the_sub_field('app_intro_item_text'); ?></li>
        <?php endwhile; endif; ?>
      </ul>
      <a href="<?php the_field('app_cta_url'); ?>" class="btn blue outline"><?php the_field('app_cta_text'); ?></a>
    </article>
  </div>
</section>

<section class="on-the-road-visual text-center">
  <figure style="background-image: url(<?php the_field('emergency_image'); ?>)"></figure>
  <article>
    <div>
      <?php the_field('emergency_copy'); ?>
    </div>
  </article>
</section>

<section class="on-the-road-video">
  <div class="on-the-road-video-block">
    <div>
      <figure data-videosrc="<?php the_field('road_video_embed_url'); ?>" style="background-image: url(<?php the_field('road_video_cover'); ?>)">
        <span class="play-icon">
          <?php include 'inc/vectors/play-icon.svg'; ?>
        </span>
      </figure>
      <div class="on-the-road-iframe-embed">
        <iframe width="560" height="315" src="" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
      </div>
    </div>
  </div>
  <article>
    <div>
      <?php the_field('road_video_copy'); ?>
    </div>
  </article>
</section>

<section class="on-the-road-visual peace-visual text-center">
  <figure style="background-image: url(<?php the_field('peace_image'); ?>)"></figure>
  <article>
    <div>
      <?php the_field('peace_copy'); ?>
    </div>
  </article>
</section>

<section class="on-the-road-bottom">
  <div class="on-the-road-bottom-image">
    <img src="<?php echo esc_url(get_field('road_bottom_image')['url']); ?>" alt="<?php echo esc_attr(get_field('road_bottom_image')['alt']) ?>">
  </div>
  <article>
    <div>
      <?php the_field('road_bottom_copy'); ?>
    </div>
  </article>
</section>

<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>

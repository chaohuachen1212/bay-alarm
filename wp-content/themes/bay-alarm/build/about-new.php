<?php
  // Template Name: About Us
  update_option('current_page_template', 'about-us');
  get_header();
?>

<section class="para-hero container on-road-hero">
  <?php include 'inc/hiw-subnav.php' ?>
  <figure class="hero-img hero-img-1" style="background-image: url(<?php the_field('about_hero_image'); ?>);"></figure>

  <div class="hero-text-wrap">
    <?php the_field('about_hero_copy'); ?>

    <?php if (get_field('about_hero_video_url')): ?>
    <div class="on-the-road-video-block">
      <div>
        <figure data-videosrc="<?php the_field('about_hero_video_url'); ?>" style="background-image: url(<?php the_field('about_hero_video_image') ?>)">
          <span class="play-icon">
            <?php include 'inc/vectors/play-icon.svg'; ?>
          </span>
        </figure>
        <div class="on-the-road-iframe-embed">
          <iframe width="560" height="315" src="" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    <?php endif; ?>

  </div>
</section>

<section class="on-the-road-awards">
  <div class="awards-top">
    <img src="<?php the_field('logo'); ?>">
    <h2><?php the_field('mission_heading'); ?></h2>
    <?php if (get_field('mission_subheading')): ?>
    <h5><?php the_field('mission_subheading'); ?></h5>
    <?php endif; ?>
  </div>
  <div class="awards-quote">
    <p class="awards-quote-copy"><?php the_field('mission_copy'); ?></p>
  </div>
</section>

<section class="splitsecnd-app app-features-sec">
  <div class="features-intro-copy">
    <?php the_field('values_intro_copy'); ?>
  </div>
  <article class="listing-wrap">
    <div class="mobile-col">
      <div class="screen-imgs-wrap">
        <?php
          $counter = 1;
          if( have_rows('values_items') ):
          while( have_rows('values_items') ): the_row();
          ( $counter === 1 ) ? $activeClass = "is-active" : $activeClass = "";
        ?>
        <img class="<?php echo $activeClass; ?>" src="<?php the_sub_field("value_image"); ?>">
        <?php
          $counter++; endwhile; endif;
        ?>
      </div>
    </div>

    <div class="content-col">
      <div class="item-wrap">
        <?php
          if( have_rows('values_items') ):
          while( have_rows('values_items') ): the_row();
          ( $counter === 1 ) ? $activeClass = "is-active" : $activeClass = "";
        ?>
        <section class="list-tiem">
          <div class="icon"><img src="<?php the_sub_field("icon"); ?>"></div>
          <h6><?php the_sub_field("title"); ?></h6>
          <p><?php the_sub_field("subtext"); ?></p>
        </section>
        <?php
          endwhile; endif;
        ?>
      </div>
      <img class="bottom-img" src="<?php the_field("values_bottom_image"); ?>">
    </div>
  </article>
</section>

<section class="splitsecnd-features">
  <div class="features-intro-copy">
    <?php the_field('ethics_copy'); ?>
  </div>
  <div class="splitsecnd-detail">
    <div>
      <img src="<?php the_field('ethics_image'); ?>">
    </div>
    <article>
      <ul>
        <?php if (have_rows('ethics_list_items')): while (have_rows('ethics_list_items')): the_row(); ?>
        <li><?php the_sub_field('ethics_item'); ?></li>
        <?php endwhile; endif; ?>
      </ul>
      <a href="<?php the_field('ethics_cta_url'); ?>" class="btn blue outline"><?php the_field('ethics_cta_text'); ?></a>
    </article>
  </div>
</section>

<section class="on-the-road-video">
  <div class="on-the-road-video-block">
    <div>
      <figure data-videosrc="<?php the_field('giving_back_video_embed_url'); ?>" style="background-image: url(<?php the_field('giving_back_video_cover'); ?>)">
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
      <?php the_field('giving_back_copy'); ?>
    </div>
  </article>
</section>

<section class="on-the-road-bottom">
  <div class="on-the-road-bottom-image">
    <img src="<?php the_field('leadership_image'); ?>" alt="Leadership">
  </div>
  <article>
    <div>
      <?php the_field('leadership_copy'); ?>
    </div>
  </article>
</section>

<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>

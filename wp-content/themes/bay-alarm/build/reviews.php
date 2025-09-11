<?php
  //Template Name:  Reviews
  update_option('current_page_template','reviews-page'); // <----- this adds a body class
  get_header();
?>

<section class="reviews-hero">
  <figure style="background-image: url(<?php the_field('review_hero_image'); ?>);"></figure>
  <div class="container">
    <article>
      <small><?php the_field('reviews_slogan'); ?></small>
      <?php the_field('reviews_hero_copy'); ?>
    </article>
  </div>
</section>

<section class="reviews-video-container">
  <div class="container">

    <?php if (have_rows('review_videos')) : while (have_rows('review_videos')) : the_row();
      $review_video_title = get_sub_field('review_video_title');
    ?>

    <div class="video">
      <a href="javascript:void(0)" class="video-modal-call" data-videosrc="<?php the_sub_field('review_video_url'); ?>?autoplay=1&rel=0" aria-label='Watch <?php echo $review_video_title; ?>'>
        <figure style="background-image: url(<?php the_sub_field('review_video_image'); ?>);">
          <div>
            <?php include 'inc/vectors/play-icon.svg' ?>
          </div>
        </figure>
      </a>
      <div class="transcript-box">
        <p><?php the_sub_field('review_video_title'); ?></p>
        <?php if (get_sub_field('transcript_content')): ?>
        <a class="transcript-button" href="javascript:void(0);">Read the transcript</a>
        <?php endif; ?>
      </div>
      <?php if (get_sub_field('transcript_content')): ?>
      <div class="content-wrap">
        <span class="gradient-layer"></span>
        <div class="transcript-content">
          <?php the_sub_field('transcript_content'); ?>
        </div>
      </div>
      <?php endif; ?>
    </div>

    <?php endwhile; endif; ?>

  </div>
</section>

<section class="independent-ratings container">
  <div class="inner-max-container">
    <h5><?php the_field('review_ratings_heading'); ?></h5>
    <div class="ratings-container">

      <?php if (have_rows('review_ratings')) : while (have_rows('review_ratings')) : the_row(); ?>

      <div class="rating">
        <figure>
          <img src="<?php the_sub_field('company_rating_logo'); ?>" alt="">
        </figure>
        <article>
          <?php the_sub_field('company_rating_copy'); ?>
        </article>
      </div>

      <?php endwhile; endif; ?>

    </div>
  </div>
</section>


<?php include 'inc/rating-section.php' ?>
<?php include 'inc/bottom-get-started.php' ?>


<?php get_footer(); ?>

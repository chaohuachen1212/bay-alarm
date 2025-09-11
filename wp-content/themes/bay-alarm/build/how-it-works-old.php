<?php
  //Template Name:  How it Works Old
  update_option('current_page_template','hiw-page-old'); // <----- this adds a body class
  get_header();
?>

<!-- =========================================================
                Top Subnav
========================================================= -->
<section class="prod-new--topnav">
  <?php include 'inc/hiw-subnav.php' ?>
</section>


<section class="para-hero hiw-hero">
  <!-- nav -->
  <!-- <?php include 'inc/hiw-subnav.php' ?> -->

  <!-- Img -->
  <figure class="hero-img hero-img-1" style="background-image: url(<?php the_field("hero_image") ?>);"></figure>

  <!-- text -->
  <div class="hero-text-wrap">
    <h1 class="heading"><?php the_field("hero_heading") ?></h3>
    <p class="copy"><?php the_field("hero_subtext") ?></p>
  </div>
</section>


<!-- ===============================================
            Features
=============================================== -->
<section class="hiw-features-sec">
  <div class="inner-max-container">
    <div class="features-wrap">

      <?php
        if( have_rows('features') ):
        while( have_rows('features') ): the_row();
      ?>
      <article class="col">
        <figure class="feature-fig-wrap">
          <div class="feature-fig" style="background-image: url(<?php the_sub_field('image') ?>);"></div>
        </figure>
        <h6 class="feature-title"><?php the_sub_field('title') ?></h6>
        <p class="feature-copy"><?php the_sub_field('text') ?></p>
      </article>
      <?php
        endwhile; endif;
      ?>
    </div>
  </div>
</section>


<!-- ===============================================
            Video
=============================================== -->
<section>
<?php $c = 1; if (have_rows('video_modules')) : while (have_rows('video_modules')) : the_row(); ?>
<div class="hiw-video-sec">
  <div class="col-wrap<?php echo ($c % 2 !== 0) ? ' is-reverse' : ''; ?>">
    <article href="<?php the_sub_field('video_url') ?>" class="col video-copy-col">
      <div class="text-wrap">
        <?php if (get_sub_field('video_heading')): ?>
        <h6 class="hiw-sec-title title"><?php the_sub_field('video_heading'); ?></h6>
        <?php endif; ?>
        <?php the_sub_field('video_subtext') ?>
        <a href="<?php the_sub_field('video_url'); ?>" class="btn-outline blue hiw-sec-btn"><?php the_sub_field('button_text') ?></a>
      </div>
    </article>
    <?php if (get_sub_field('image_only')): ?>
      <article class="col video-col">
        <figure class="video-img image-only" style="background-image: url(<?php the_sub_field('video_image') ?>);"> </figure>
      </article>

      <?php else: ?>
      <article class="col video-col">
        <a href="#!" class="video-img" data-videosrc="<?php the_sub_field('video_embed_url'); ?>" style="background-image: url(<?php the_sub_field('video_image') ?>);">
          <span class="play-icon">
            <?php include 'inc/vectors/play-icon.svg'; ?>
          </span>
        </a>
        <iframe width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
      </article>
      <?php endif; ?>

  </div>
</div>
<?php $c++; endwhile; endif; ?>
</section>




<!-- ===============================================
            Reviews
=============================================== -->
<section class="hiw-review-sec">
  <div class="col-wrap">

    <article class="col">
      <div class="text-wrap">
        <h6 class="hiw-sec-title title"><?php the_field('review_heading') ?></h6>

        <?php echo do_shortcode('[google-reviews-pro place_photo=https://lh3.googleusercontent.com/p/AF1QipMxReDT8dJovcxzLTzP4WdsHm_lPrU7WRyza1-H=s1600-w300-h300 place_name="Bay Alarm Medical" place_id=ChIJnb7qsZNmhYAR78LhIMEfOGQ view_mode=badge_inner]'); ?>
        <p class="review-count"><?php echo get_field('reviews_count', 'option'); ?> reviews</p>

        <div class="testimonial-wrap">
          <p><?php the_field('review_testimonial_text') ?></p>
          <p class="author"><?php the_field('review_author') ?></p>
        </div>

        <?php $reviewsUrl = (get_field('review_button_type') === 'internal') ? get_field('review_button_interal') : get_field('review_button_external'); ?>
        <a href="<?php echo $reviewsUrl; ?>" class="btn-outline blue hiw-sec-btn">
          <?php the_field('review_button_text') ?>
        </a>
      </div>
    </article>

    <article class="col">
      <div class="img-wrap">
        <?php
          $counter = 1;
          if ( have_rows('review_image_grid') ):
          while ( have_rows('review_image_grid') ): the_row();
          if ( $counter < 3 ) {
        ?>
        <div class="img img-<?php echo $counter ?>" style="background-image: url(<?php the_sub_field('image') ?>);"></div>
        <?php
          } $counter++; endwhile; endif;
        ?>
      </div>
      <div class="img-wrap">
        <?php
          $counter = 1;
          if ( have_rows('review_image_grid') ):
          while ( have_rows('review_image_grid') ): the_row();
          if ( $counter >= 3 ) {
        ?>
        <div class="img img-<?php echo $counter ?>" style="background-image: url(<?php the_sub_field('image') ?>);"></div>
        <?php
          } $counter++; endwhile; endif;
        ?>
      </div>
    </article>
  </div>
</section>




<!-- ===============================================
            Products
=============================================== -->
<section class="hiw-products-sec">

  <?php
    if ( have_rows('products') ):
    while ( have_rows('products') ): the_row();
  ?>
  <div class="col-wrap">
    <article class="col col-text">
      <div class="text-wrap">
        <h4 class="hiw-sec-title"><?php the_sub_field('heading') ?></h4>
        <p class="price"><?php the_sub_field('price') ?></p>
        <p class="hiw-sec-copy"><?php the_sub_field('text') ?></p>
        <div class="button-wrap">
          <?php if (get_sub_field("learn_button_type")==='external'): ?>
            <a href="<?php the_sub_field("learn_button_url_external") ?>" class="btn-outline blue learn-btn hiw-sec-btn" target="_blank"><?php the_sub_field("learn_button_text") ?></a>
          <?php endif; ?>
          <?php if (get_sub_field("learn_button_type")==='internal'): ?>
            <a href="<?php the_sub_field("learn_button_url_internal") ?>" class="btn-outline blue learn-btn hiw-sec-btn" ><?php the_sub_field("learn_button_text") ?></a>
          <?php endif; ?>
          <?php if (get_sub_field('buy_button_text')): ?>
            <a href="<?php the_sub_field("buy_button_url_external") ?> <?php the_sub_field("buy_button_url_internal") ?>" class="btn blue buy-btn hiw-sec-btn"><?php the_sub_field("buy_button_text") ?></a>
          <?php endif; ?>
        </div>
      </div>
    </article>
    <article class="col col-img">
      <img class="prod-img" src="<?php the_sub_field('product_imgaes') ?>">
    </article>
  </div>
  <?php
    endwhile; endif;
  ?>
</section>



<!-- ===============================================
            Call Centers
=============================================== -->
<section class="hiw-call-centers">

  <article class="heading-wrap container">
    <h4 class="hiw-sec-title"><?php the_field("centers_heading") ?></h4>
    <p class="hiw-sec-copy"><?php the_field("centers_subtext") ?></p>
  </article>

  <article class="cols-wrap">
    <div class="col content-col container">
      <?php
        if( have_rows('centers_text_group') ):
        while( have_rows('centers_text_group') ): the_row();
      ?>
      <section class="content-group">
        <h5 class="content-title"><?php the_sub_field('title') ?></h5>
        <?php the_sub_field('copy') ?>
      </section>
      <?php
        endwhile; endif;
      ?>
    </div>

    <div class="col centers-col">
      <img class="map-centers" src="<?php the_field("centers_image") ?>">
    </div>
  </article>
</section>


<!-- ===============================================
            Coverage
=============================================== -->
<section class="hiw-coverage">
  <div class="cols-wrap">
    <article class="col col-map">
      <img src="<?php the_field("coverage_image") ?>">
    </article>
    <article class="col col-content">
      <div class="heading-wrap">
        <h4 class="hiw-sec-title"><?php the_field("coverage_heading") ?></h4>
        <?php the_field("coverage_text") ?>
      </div>
    </article>
  </div>
</section>




<!-- ===============================================
            Languages
=============================================== -->
<section class="hiw-languages">
  <div class="img-wrap">
    <figure class="bg-img" style="background-image: url(<?php the_field("languages_image") ?>);"></figure>
  </div>

  <div class="content-wrap">
    <h4 class="hiw-sec-title"><?php the_field("languages_heading") ?></h4>
    <?php the_field("languages_text") ?>
    <a href="<?php the_field("langs_button_external_url") ?> <?php the_field("langs_button_internal_url") ?>" class="btn-outline blue cta-btn"><?php the_field("languages_button_text") ?></a>
  </div>
</section>



<!-- ===============================================
            Discount Cards
=============================================== -->
<section class="hiw-discount">
  <div class="cols-wrap">
    <article class="col col-img">
      <img src="<?php the_field("discount_image") ?>">
    </article>

    <article class="col col-text">
      <h4 class="hiw-sec-title"><?php the_field("discount_heading") ?></h4>
      <?php the_field("discount_text") ?>
      <a href="<?php the_field("discount_button_url") ?>" class="btn-outline blue cta-btn"><?php the_field("discount_button_text") ?></a>
    </article>
  </div>
</section>



<?php include 'inc/rating-section.php' ?>

<?php include 'inc/instagram-section.php' ?>

<?php include 'inc/bottom-get-started.php' ?>

<div itemscope="" itemType="https://schema.org/FAQPage" style="display: none;">
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Does Medicare pay for medical alert systems? </h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <div itemprop="text">
        <p>No, typically, Medicare does NOT pay for a medical alert system. Most insurance plans don't pay, but some will, so be sure to check. And there are some other options to help. See our guide for more details: <a href="https://www.bayalarmmedical.com/medical-alert-blog/will-insurance-pay-for-medical-alert-systems/">Do Medicare &amp; Insurance Pay for Medical Alert Systems?</a> </p>
        </div>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Do senior organizations recommend medical alert systems?  </h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <div itemprop="text">
        <p>Yes. Several senior organizations, including AARP, have issued strong endorsements on the use of life-saving, home medical alert systems. The use of these devices is predicted to continue growing strongly. See: <a href="https://www.bayalarmmedical.com/medical-alert-blog/senior-organizations-recommend-medical-alert-systems/">Senior Organizations Endorse Medical Alert Devices</a> </p>
        </div>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">Do you need a landline for a medical alert system? </h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <div itemprop="text">
        <p>No, a landline is not needed for a medical alert system. While the base station typically connects to a landline if available, an appropriate cellular signal will also work with comparable results for many home alert systems. See more: <a href="https://www.bayalarmmedical.com/medical-alert-blog/need-landline-use-bay-alarm-medical-alert-systems/">Do I Need a Landline To Us Bay Alarm Medical Alert Systems?</a> </p>
        </div>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What is the range of your medical alert system? </h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <div itemprop="text">
        <p>Expect a range of up to 1,000 feet for your medical alert system outside the home - that's about 3 football fields (or 2 acres). For travel further afield, there are GPS-enabled systems too. See more: <a href="https://www.bayalarmmedical.com/medical-alert-blog/do-medical-alert-systems-work-outside-the-home/">Do Medical Alert Systems Work Outside The Home?</a> </p>
        </div>
    </div>
  </div>
  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
    <h3 itemprop="name">What battery life does your system have? </h3>
    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
      <div itemprop="text">
        <p>The battery life of the wearable part of the home medical alert system is 2-5 years. The base station has a backup battery good for 32 hours in a power outage. See more: <a href="https://www.bayalarmmedical.com/medical-alert-system/accessories/">Medical Alert Buttons, Alarm Necklaces & Accessories</a> </p>
        </div>
    </div>
  </div>
</div>


<?php get_footer(); ?>

<?php
  //Template Name:  How it Works New
  update_option('current_page_template','hiw-page-new'); // <----- this adds a body class
  get_header();
  $show_promo_banner = get_field('show_promo_banner', 'option');
?>


<!-- =========================================================
                Top Subnav
========================================================= -->
<section class="prod-new--topnav">
  <?php include 'inc/hiw-subnav.php' ?>
</section>


<style>
  .prod-new--hero .btn-outline {background-color: <?php the_field('hero_button_background_color') ?>; color:<?php the_field('hero_button_border_color') ?>; border: 2px solid <?php the_field('hero_button_border_color') ?>; }
  .prod-new--hero .btn-outline:hover {background-color: <?php the_field('hero_button_border_color') ?>; color:<?php the_field('hero_button_background_color') ?>; border: 2px solid <?php the_field('hero_button_border_color') ?>; }
  .prod-new--hero .btn-large {background-color: <?php the_field('hero_button_background_color') ?>; color:<?php the_field('hero_button_text_color') ?>;  border: 2px solid <?php the_field('hero_button_border_color') ?>; }
  .prod-new--hero .btn-large:hover {background-color: <?php the_field('hero_button_text_color') ?>; color:<?php the_field('hero_button_background_color') ?>; border: 2px solid <?php the_field('hero_button_background_color') ?>;  }
  .in-home-monitoring .btn-wrap .btn-outline {background-color: <?php the_field('monitoring_button_background_color') ?>; color:<?php the_field('monitoring_button_color') ?>; border: 2px solid <?php the_field('monitoring_button_border_color') ?>; }
  .in-home-monitoring .btn-wrap .btn-outline:hover {background-color: <?php the_field('monitoring_button_color') ?>; color:<?php the_field('monitoring_button_background_color') ?>; border: 2px solid <?php the_field('monitoring_button_border_hover_color') ?>; }
  .in-home-monitoring-more-copy .btn-wrap .btn-outline {background-color: <?php the_field('monitoring_button_background_color') ?>; color:<?php the_field('monitoring_button_color') ?>; border: 2px solid <?php the_field('monitoring_button_border_color') ?>; }
  .in-home-monitoring-more-copy .btn-wrap .btn-outline:hover {background-color: <?php the_field('monitoring_button_color') ?>; color:<?php the_field('monitoring_button_background_color') ?>; border: 2px solid <?php the_field('monitoring_button_border_hover_color') ?>; }
</style>
<!-- =========================================================
                Hero Section
========================================================= -->
<section class="prod-new--hero hiw-prod--hero <?php echo get_field('new_hero_theme') ? 'new-hero' : '' ?> <?php if(get_field('which_type_of_hero_center_image')==='image'): echo 'center-img-hero'; endif; ?> <?php if(empty(get_field('hero_button_copy'))): echo 'no-hero-btn--sec'; endif; ?>">

  <div class="container">
    <div class="row">
      <article>
        <h1><?php the_field("hero_title") ?></h1>
          <p class="copy"><?php the_field("hero_copy") ?></p>
       
      </article>

      <div class="image-wrap">
        <img src="<?php the_field('hero_desktop_image') ?>" alt="Hero Image">
        <div class="hero-img-bg"></div>
      </div>
    </div>
  </div>
</section>


<!-- ===============================================
            Features
=============================================== -->
<section class="in-home-accessories hiw-accessories">
  <div class="container">

    <div class="cards-wrap">

      <?php
        if( have_rows('features') ):
        while( have_rows('features') ): the_row();
      ?>
      <div class="card">
        <figure style="background-image: url(<?php the_sub_field('image') ?>)"> </figure>
        <article>
          <h4><?php the_sub_field('title') ?></h4>
          <p><?php the_sub_field('text') ?></p>
        </article>
      </div>

      <?php
        endwhile; endif;
      ?>
    </div>
    <?php if (get_field('accessories_button_copy')): ?>
      <div class="btn-wrap">
        <a class="blue btn-outline" href="<?php the_field('accessories_button_url') ?>"><?php the_field('accessories_button_copy') ?></a>
      </div>
     <?php endif; ?>
  </div>
</section>


<section class="hiw--devices-sec">
  <div class="container">
    <h2><?php the_field('devices_title'); ?></h2>
    <p><?php the_field('devices_copy'); ?></p>

    <div class="cards-wrap">
      <?php
      	if( have_rows('devices_cards') ):
      	while( have_rows('devices_cards') ): the_row();
      ?>
      <a class="card" href="<?php the_sub_field('button_url'); ?>">
        <figure>
          <img src="<?php the_sub_field('image'); ?>" alt="Card Image">
        </figure>
        <article>
          <h3><?php the_sub_field('title'); ?></h3>
          <p><?php the_sub_field('copy'); ?></p>
          <span class="btn"><?php the_sub_field('botton_text'); ?></span>
        </article>
      </a>
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
<div class="hiw-video-sec hiw--two-cols-video">
  <div class="col-wrap<?php echo ($c % 2 !== 0) ? ' is-reverse' : ''; ?>">
    <article href="<?php the_sub_field('video_url') ?>" class="col video-copy-col">
      <div class="text-wrap">
        <?php if (get_sub_field('video_heading')): ?>
        <h6 class="hiw-sec-title title"><?php the_sub_field('video_heading'); ?></h6>
        <?php endif; ?>
        <?php the_sub_field('video_subtext') ?>

        <?php if (get_sub_field('turn_on_video_button')): ?>
          <a class="btn video-modal-call" data-videosrc="<?php the_sub_field('button_url') ?>">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14 26.2524C7.23451 26.2524 1.75 20.7679 1.75 14.0024C1.75 7.23695 7.23451 1.75244 14 1.75244C20.7655 1.75244 26.25 7.23695 26.25 14.0024C26.25 20.7679 20.7655 26.2524 14 26.2524ZM14 28.0024C21.732 28.0024 28 21.7344 28 14.0024C28 6.27046 21.732 0.00244141 14 0.00244141C6.26801 0.00244141 0 6.27046 0 14.0024C0 21.7344 6.26801 28.0024 14 28.0024Z" fill="white"/>
            <path d="M10.9746 8.84942C11.2661 8.69944 11.6169 8.72492 11.8836 8.91543L18.0086 13.2904C18.2385 13.4547 18.375 13.7199 18.375 14.0024C18.375 14.285 18.2385 14.5502 18.0086 14.7145L11.8836 19.0895C11.6169 19.28 11.2661 19.3054 10.9746 19.1555C10.6832 19.0055 10.5 18.7052 10.5 18.3774V9.62745C10.5 9.29968 10.6832 8.9994 10.9746 8.84942Z" fill="white"/>
            </svg>
            <?php the_sub_field('button_text') ?>
          </a>
        <?php else: ?>
        <a href="<?php the_sub_field('button_url'); ?>" class="btn"><?php the_sub_field('button_text') ?></a>
        <?php endif; ?>
      </div>
    </article>
    <?php if (get_sub_field('image_only')): ?>
      <article class="col video-col">
        <figure class="video-img image-only" style="background-image: url(<?php the_sub_field('video_image') ?>);"> </figure>
      </article>

      <?php else: ?>

          <article class="col video-col-box">

            <figure class="video-modal-call" data-videosrc="<?php the_sub_field('video_embed_url') ?>" aria-label="Play Video" role="button">
              <img class="video-bg" src="<?php the_sub_field('video_image'); ?>" alt="Video Background">
              <span class="play-icon">
                <?php include 'inc/vectors/play-icon.svg'; ?>
              </span>

            </figure>
          </article>

      <?php endif; ?>

  </div>
</div>
<?php $c++; endwhile; endif; ?>
</section>


<?php if (get_field('product_title')): ?>
  <section class="hiw--products-sec">
    <div class="container">
      <h2><?php the_field('product_title'); ?></h2>
      <div class="cards-wrap">
        <?php
        	if( have_rows('product_cards') ):
        	while( have_rows('product_cards') ): the_row();
        ?>
          <a class="card" href="<?php the_sub_field('button_url'); ?>">
            <figure>
              <img src="<?php the_sub_field('image'); ?>" alt="Card Image">
              <?php if (get_sub_field('popular_text')): ?>
                <span><?php the_sub_field('popular_text'); ?></span>
              <?php endif; ?>
            </figure>
            <h3><?php the_sub_field('title'); ?></h3>
            <?php the_sub_field('copy'); ?>
            <span class="btn"><?php the_sub_field('button_text'); ?></span>
          </a>
        <?php
        	endwhile; endif;
        ?>


      </div>
    </div>
  </section>
<?php endif; ?>


<?php if (get_field('tablepress_shortcode')): ?>
<section class="tablepress--sec">
  <h2><?php the_field('tablepress_title'); ?></h2>
  <div class="tablepress-box">
    <?php $tableID = get_field('tablepress_shortcode'); ?>
    <?php echo do_shortcode("$tableID"); ?>
  </div>
</section>
<?php endif; ?>

<?php
	if( have_rows('two_columns_rows') ):
	while( have_rows('two_columns_rows') ): the_row();
?>
<section class="two-columns--phone hiw-two-columns-phone <?php if(get_sub_field('is_columns_reverse')): echo 'column-reverse'; endif; ?>">
  <div class="row">
    <div class="col phone-wrap">
        <img src="<?php the_sub_field('image') ?>" alt="Image">
    </div>
    <div class="col copy-wrap">
      <h2><?php the_sub_field('title') ?></h2>

      <div class="copy">
        <?php the_sub_field('copy') ?>
      </div>
      <?php

      $link = get_sub_field('button');

      if( $link ):
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php
	endwhile; endif;
?>


<!-- ===============================================
            Reviews
=============================================== -->
<section class="hiw-review-sec">
  <div class="col-wrap">

    <article class="copy-wrap">
      <div class="text-wrap">
        <h2><?php the_field('review_heading') ?></h2>
      </div>
    </article>

    <div class="row">
      <article class="col">
        <div class="img-wrap">
          <?php
            $n = 1;
            if ( have_rows('review_image_grid') ):
            while ( have_rows('review_image_grid') ): the_row();

            $review_author = get_sub_field('review_author');
            $author_title = explode('|', $review_author);

            $author_company = $author_title[1];
            $company = explode(',', $author_company);

          ?>
            <div role="tab" tabindex="0" class="img <?php if($n===1): echo 'is-active'; endif; ?>" style="background-image: url(<?php the_sub_field('image') ?>);" aria-label="<?php echo trim($company[1], ' ') ?>"></div>
          <?php
          	$n++; endwhile; endif;
          ?>
        </div>

      </article>
      <div class="quotes-wrap">
        <?php
          $c = 1;
          if ( have_rows('review_image_grid') ):
          while ( have_rows('review_image_grid') ): the_row();

        ?>
        <div class="testimonial-wrap <?php if($c===1): echo 'is-active'; endif; ?>">
          <?php the_sub_field('review_testimonial_text') ?>
          <p class="author"><?php the_sub_field('review_author') ?></p>
        </div>
        <?php
          $c++; endwhile; endif;
        ?>
      </div>
    </div>

  </div>
</section>



<!-- ===============================================
            Coverage
=============================================== -->
<section class="nationwide-coverage">
  <div class="top">
    <h2><?php the_field('coverage_title') ?></h2>
    <p><?php the_field('coverage_copy') ?></p>
  </div>

  <div class="btn-wrap">
    <a class="btn-outline darkblue" href="<?php the_field('coverage_button_url') ?>"><?php the_field('coverage_button_text') ?></a>
  </div>

  <div class="map-info">
    <div class="copy-col desktop">
      <div class="location">
        <?php
        	$c = 1;
        	if( have_rows('coverage_locations') ):
        	while( have_rows('coverage_locations') ): the_row();
          if($c===1) {
        ?>
        <h3><?php the_sub_field('heading') ?></h3>
        <?php
        	if( have_rows('location') ):
        	while( have_rows('location') ): the_row();
        ?>
          <p><?php the_sub_field('text') ?></p>
        <?php
        	endwhile; endif;
        ?>
        <?php
          }
        	$c++; endwhile; endif;
        ?>
      </div>
      <div class="location">
        <?php
        	$c = 1;
        	if( have_rows('coverage_locations') ):
        	while( have_rows('coverage_locations') ): the_row();
          if($c===2) {
        ?>
        <h3><?php the_sub_field('heading') ?></h3>
        <?php
        	if( have_rows('location') ):
        	while( have_rows('location') ): the_row();
        ?>
          <p><?php the_sub_field('text') ?></p>
        <?php
        	endwhile; endif;
        ?>
        <?php
          }
        	$c++; endwhile; endif;
        ?>
      </div>
    </div>
    <div class="map-wrap">
      <img src="<?php echo esc_url(get_field('coverage_image')['url']) ?>" alt="<?php echo esc_attr(get_field('coverage_image')['alt']) ?>">
    </div>
    <div class="copy-col mobile">
      <div class="location">
        <?php
        	$c = 1;
        	if( have_rows('coverage_locations') ):
        	while( have_rows('coverage_locations') ): the_row();
          if($c===1) {
        ?>
        <h3><?php the_sub_field('heading') ?></h3>
        <?php
        	if( have_rows('location') ):
        	while( have_rows('location') ): the_row();
        ?>
          <p><?php the_sub_field('text') ?></p>
        <?php
        	endwhile; endif;
        ?>
        <?php
          }
        	$c++; endwhile; endif;
        ?>
      </div>
      <div class="location">
        <?php
        	$c = 1;
        	if( have_rows('coverage_locations') ):
        	while( have_rows('coverage_locations') ): the_row();
          if($c===2) {
        ?>
        <h3><?php the_sub_field('heading') ?></h3>
        <?php
        	if( have_rows('location') ):
        	while( have_rows('location') ): the_row();
        ?>
          <p><?php the_sub_field('text') ?></p>
        <?php
        	endwhile; endif;
        ?>
        <?php
          }
        	$c++; endwhile; endif;
        ?>
      </div>
    </div>
    <div class="copy-col right">
      <div class="location">
        <?php
        	$c = 1;
        	if( have_rows('coverage_locations') ):
        	while( have_rows('coverage_locations') ): the_row();
          if($c===3) {
        ?>
        <h3><?php the_sub_field('heading') ?></h3>
        <?php
        	if( have_rows('location') ):
        	while( have_rows('location') ): the_row();
        ?>
          <p><?php the_sub_field('text') ?></p>
        <?php
        	endwhile; endif;
        ?>
        <?php
          }
        	$c++; endwhile; endif;
        ?>
      </div>
      <div class="location">
        <?php
        	$c = 1;
        	if( have_rows('coverage_locations') ):
        	while( have_rows('coverage_locations') ): the_row();
          if($c===4) {
        ?>
        <h3><?php the_sub_field('heading') ?></h3>
        <?php
        	if( have_rows('location') ):
        	while( have_rows('location') ): the_row();
        ?>
          <p><?php the_sub_field('text') ?></p>
        <?php
        	endwhile; endif;
        ?>
        <?php
          }
        	$c++; endwhile; endif;
        ?>
      </div>
    </div>
  </div>


  <div class="call-centers">
    <div class="cc-wrap">
      <?php
      	$n = 1;
      	if( have_rows('call_center_list') ):
      	while( have_rows('call_center_list') ): the_row();
      ?>
      <div class="row row-<?php echo $n ?>">

        <div class="col copy">
          <div class="icon">
            <div class="img-wrap">
              <img src="<?php echo esc_url(get_sub_field('icon')['url']) ?>" alt="<?php echo esc_attr(get_sub_field('icon')['alt']) ?>">
            </div>
          </div>
          <div class="text-wrap">
            <h3><?php the_sub_field('title') ?></h3>
            <p><?php the_sub_field('copy') ?></p>
          </div>
        </div>

        <div class="col image">
          <?php if (get_sub_field('image_or_video')==='video'): ?>
              <figure class="video-modal-call" data-videosrc="<?php the_sub_field('video_url') ?>" aria-label="Play Video" role="button">
                <img class="video-bg" src="<?php echo esc_url(get_sub_field('image')['url']) ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']) ?>">
              </figure>
          <?php else: ?>
            <img src="<?php echo esc_url(get_sub_field('image')['url']) ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']) ?>">
          <?php endif; ?>
        </div>

      </div>
      <?php
      	$n++; endwhile; endif;
      ?>
    </div>

  </div>
</section>


<section id="reviews-section" class="pricing-review<?php echo (get_page_template_slug() === 'pricing-pla.php') ? ' more-padding' : ''; ?>">
  <div class="container">

    <div class="google-reviews no-pad">
      <div class="google-reviews top">
        <?php echo do_shortcode( '[brb_collection id="31258"]' ); ?>
      </div>
      <div class="google-reviews small-top">
        <?php echo do_shortcode( '[brb_collection id="31257"]' ); ?>
      </div>
    </div>
    <?php if (get_page_template_slug() !== 'pricing-pla.php'): ?>
    <div class="button-wrap">
      <?php $url = (get_field('review_url', 'option')) ? get_field('review_url', 'option') : get_home_url() . '/medical-alert-reviews/' ?>
      <a href="<?php echo $url; ?>" class="add-review-btm"><?php the_field('review_button_text') ?></a>
    </div>
    <?php endif; ?>

  </div>
</section>



<!-- ===============================================
            Languages
=============================================== -->
<section class="hiw-languages">

  <div class="row">
    <div class="col content-box">
      <div class="max-text">
        <h4 class="hiw-sec-title"><?php the_field("languages_heading") ?></h4>
        <?php the_field("languages_text") ?>
        <?php

        $link = get_field('languages_button');

        if( $link ):
        	$link_url = $link['url'];
        	$link_title = $link['title'];
        	$link_target = $link['target'] ? $link['target'] : '_self';
        ?>
          <a href="<?php echo esc_url($link_url); ?>" class="btn blue cta-btn" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
        <?php endif; ?>
      </div>

    </div>

    <div class="col img-box">
      <img src="<?php the_field('languages_image') ?>" alt="Image">
    </div>
  </div>
</section>



<section class="hiw--faq">
  <div class="container">
    <h2><?php the_field('faq_title') ?></h2>
    <div class="faq-wrap">
      <?php
      	if( have_rows('faq_list') ):
      	while( have_rows('faq_list') ): the_row();
      ?>
        <div class="item">
          <p class="question"><?php the_sub_field('question') ?></p>
          <p><?php the_sub_field('answer') ?></p>
        </div>
      <?php
      	endwhile; endif;
      ?>
    </div>
  </div>
</section>


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

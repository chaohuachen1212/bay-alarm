<?php
  //Template Name:  How it Works
  update_option('current_page_template','hiw-page'); // <----- this adds a body class
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

<?php if (get_field('turn_on_goods_block')): ?>

<style>
  .home-products .products-grid .new-tab {background-color: <?php the_field('new_button_background') ?>; color:<?php the_field('new_button_text_color') ?>;}
</style>

<section class="home-products container">
  <div class="inner-max-container">

    <article class="col col-products">
      <div class="grid-wrap">
        <?php
          if( have_rows('goods_list') ):
          while( have_rows('goods_list') ): the_row();
        ?>

        <div class="products-grid <?php if(get_sub_field('turn_on_new_tab')): echo 'add-new-tab'; endif; ?>">
          <span class="new-tab t-desktop"><?php the_sub_field("new_button_text") ?></span>
          <div class="grid-inner-wrap">
            <img src="<?php the_sub_field("product_image") ?>" alt="Image">
            <div class="prod-text-wrap">
              <div class="text-box">
                <span class="new-tab t-mobile"><?php the_sub_field("new_button_text") ?></span>
                <p class="prod-name"><?php the_sub_field("product_name") ?></p>
                <p class="prod-price"><?php the_sub_field("price") ?></p>
              </div>
            </div>
          </div>
          <a class="product-link" href="<?php the_sub_field("url") ?>">
          LEARN MORE
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="10" viewBox="0 0 18 10" fill="none">
            <path d="M16.9596 5.45962C17.2135 5.20578 17.2135 4.79422 16.9596 4.54038L12.823 0.403806C12.5692 0.149965 12.1576 0.149965 11.9038 0.403806C11.65 0.657647 11.65 1.0692 11.9038 1.32304L15.5808 5L11.9038 8.67696C11.65 8.9308 11.65 9.34235 11.9038 9.59619C12.1576 9.85003 12.5692 9.85003 12.823 9.59619L16.9596 5.45962ZM0.5 5.65H16.5V4.35H0.5V5.65Z" fill="#2F5865"/>
          </svg>
        </a>
          </div>
        <?php
          endwhile; endif;
        ?>
      </div>
      <?php if (get_field('goods_button_text')): ?>
        <a href="<?php the_field("goods_button_url") ?>" class="t-desktop btn-outline blue" tabindex="0" role="button"><?php the_field("goods_button_text") ?></a>
      <?php endif; ?>
    </article>
  </div>
</section>
<?php endif; ?>

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
        <?php if (get_sub_field('vimeo_video')): ?>
        <article class="col video-col">
          <a href="#!" class="video-vimeo" data-videosrc="https://player.vimeo.com/video/656655929?h=31033eabba" style="background-image: url(<?php the_sub_field('video_image') ?>);" aria-label="Play Video">
            <span class="play-icon">
              <?php include 'inc/vectors/play-icon.svg'; ?>
            </span>
          </a>
          <iframe title="<?php echo get_sub_field('video_heading'); ?>" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
        </article>

        <?php else: ?>
          <article class="col video-col">
            <a href="#!" class="video-img" data-videosrc="<?php the_sub_field('video_embed_url'); ?>" style="background-image: url(<?php the_sub_field('video_image') ?>);" aria-label="Play Video" role="button">
              <span class="play-icon">
                <?php include 'inc/vectors/play-icon.svg'; ?>
              </span>
            </a>
            <iframe title="<?php echo get_sub_field('video_heading'); ?>" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
          </article>

        <?php endif; ?>
      <?php endif; ?>

  </div>
</div>
<?php $c++; endwhile; endif; ?>
</section>


<?php if (get_field('consumer_title')): ?>
<!-- ===============================================
            Discount Cards
=============================================== -->
<section class="hiw-discount">
  <div class="cols-wrap">
    <article class="col col-img">
      <img src="<?php echo esc_url(get_field("consumer_image")['url']) ?>" alt="<?php echo esc_attr(get_field("consumer_image")['alt']) ?>">
    </article>

    <article class="col col-text">
      <h4 class="hiw-sec-title"><?php the_field("consumer_title") ?></h4>
      <?php the_field("consumer_copy") ?>
      <a href="<?php the_field("consumer_button_url") ?>" class="btn-outline blue cta-btn"><?php the_field("consumer_button_text") ?></a>
    </article>
  </div>
</section>
<?php endif; ?>

<!-- ===============================================
            Reviews
=============================================== -->
<section class="hiw-review-sec">
  <div class="col-wrap">

    <article class="copy-wrap">
      <div class="text-wrap">
        <h6><?php the_field('review_heading') ?></h6>
        <p><?php the_field('review_copy') ?></p>
        <!-- <?php echo do_shortcode( '[brb_collection id="31258"]' ); ?> -->

        <!-- <?php $reviewsUrl = (get_field('review_button_type') === 'internal') ? get_field('review_button_interal') : get_field('review_button_external'); ?>
        <a href="<?php echo $reviewsUrl; ?>" class="btn-outline blue hiw-sec-btn">
          <?php the_field('review_button_text') ?>
        </a> -->
      </div>
    </article>

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
        <p><?php the_sub_field('review_testimonial_text') ?></p>
        <p class="author"><?php the_sub_field('review_author') ?></p>
      </div>
      <?php
        $c++; endwhile; endif;
      ?>
    </div>
  </div>
</section>


<style>
  .hiw-products-sec .new-tab {background-color: <?php the_field('hiw_new_tab_background') ?>; color:<?php the_field('hiw_new_tab_text_color') ?>;}
</style>

<!-- ===============================================
            Products
=============================================== -->
<section class="hiw-products-sec">

  <?php
    $i = 0;
    if ( have_rows('products') ):
    while ( have_rows('products') ): the_row();
    $i++;
  ?>
  <div class="col-wrap <?php if(get_sub_field('turn_on_new_tab')): echo 'add-new-tab'; endif; ?>">
    <article class="col col-text">
      <div class="text-wrap">
        <div class="new-tab-wrap">
          <span class="new-tab"><?php the_sub_field('new_tab_text') ?></span>
        </div>
        <h4 class="hiw-sec-title"><?php the_sub_field('heading') ?></h4>
        <p class="price"><?php the_sub_field('price') ?></p>
        <p class="hiw-sec-copy" id="hiwCopy-<?php echo $i; ?>"><?php the_sub_field('text') ?></p>
        <div class="button-wrap">
          <?php if (get_sub_field("learn_button_type")==='external'): ?>
            <a aria-describedby="hiwCopy-<?php echo $i; ?>" href="<?php the_sub_field("learn_button_url_external") ?>" class="btn-outline blue learn-btn hiw-sec-btn" target="_blank"><?php the_sub_field("learn_button_text") ?></a>
          <?php endif; ?>
          <?php if (get_sub_field("learn_button_type")==='internal'): ?>
            <a aria-describedby="hiwCopy-<?php echo $i; ?>" href="<?php the_sub_field("learn_button_url_internal") ?>" class="btn-outline blue learn-btn hiw-sec-btn" ><?php the_sub_field("learn_button_text") ?></a>
          <?php endif; ?>
          <?php if (get_sub_field('buy_button_text')): ?>
            <a aria-describedby="hiwCopy-<?php echo $i; ?>" href="<?php the_sub_field("buy_button_url_external") ?> <?php the_sub_field("buy_button_url_internal") ?>" class="btn blue buy-btn hiw-sec-btn"><?php the_sub_field("buy_button_text") ?></a>
          <?php endif; ?>
        </div>
      </div>
    </article>
    <article class="col col-img">
      <img class="prod-img" src="<?php echo esc_url(get_sub_field('product_imgaes')['url']) ?>" alt="<?php echo esc_attr(get_sub_field('product_imgaes')['alt']) ?>">
    </article>
  </div>
  <?php
    endwhile; endif;
  ?>
</section>

<?php if (get_field('tablepress_shortcode')): ?>
<section class="tablepress--sec">
    <?php $tableID = get_field('tablepress_shortcode'); ?>
    <?php echo do_shortcode("$tableID"); ?>
</section>
<?php endif; ?>

<!-- ===============================================
            Proud
=============================================== -->
<section class="hiw--proud" style="background-image: url('<?php the_field('proud_image') ?>')">
  <article>
    <img src="<?php echo esc_url(get_field('proud_icon')['url']) ?>" alt="<?php echo esc_attr(get_field('proud_icon')['alt']) ?>">
    <h3><?php the_field('proud_title') ?></h3>
    <p><?php the_field('proud_copy') ?></p>

    <?php if (get_field('proud_button_text')): ?>
      <div class="btn-wrap">
        <a class="btn-outline white" href="<?php the_field('proud_url') ?>"><?php the_field('proud_button_text') ?></a>
      </div>
    <?php endif; ?>
  </article>

</section>


<!-- ===============================================
            Coverage
=============================================== -->
<section class="nationwide-coverage">

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
    <div class="copy-col">
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

  <div class="top">
    <h2><?php the_field('coverage_title') ?></h2>
    <p><?php the_field('coverage_copy') ?></p>
  </div>

  <div class="call-centers">
    <div class="cc-wrap">
      <?php
      	$n = 1;
      	if( have_rows('call_center_list') ):
      	while( have_rows('call_center_list') ): the_row();
      ?>
      <div class="row row-<?php echo $n ?>">
        <div class="col image">
          <?php if (get_sub_field('image_or_video')==='video'): ?>
              <iframe class="lazyloading" src="<?php the_sub_field('video_url') ?>" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen" data-was-processed="true" title="<?php echo get_sub_field('title'); ?>"></iframe>
          <?php else: ?>
            <img src="<?php echo esc_url(get_sub_field('image')['url']) ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']) ?>">
          <?php endif; ?>
        </div>

        <div class="col copy">
          <img class="icon" src="<?php echo esc_url(get_sub_field('icon')['url']) ?>" alt="<?php echo esc_attr(get_sub_field('icon')['alt']) ?>">
          <div class="test-wrap">
            <p><strong><?php the_sub_field('title') ?></strong></p>
            <p><?php the_sub_field('copy') ?></p>
          </div>
          <?php if ($n < 3): ?>
            <?php include 'img/hiw/line-' .($n). '.svg' ?>
          <?php endif; ?>

          </div>
          <?php if ($n < 3): ?>
            <img class="mobile-line" src="<?php echo GET_TEMP ?>/img/hiw/mobile-line.svg" alt="">
          <?php endif; ?>
      </div>
      <?php
      	$n++; endwhile; endif;
      ?>
    </div>
    <div class="btn-wrap">
      <a class="btn-outline darkblue" href="<?php the_field('coverage_button_url') ?>"><?php the_field('coverage_button_text') ?></a>
    </div>
  </div>
</section>



<!-- ===============================================
            Languages
=============================================== -->
<section class="hiw-languages">
  <div class="img-wrap">
    <figure class="bg-img" style="background-image: url('<?php the_field('languages_image') ?>')"></figure>
  </div>

  <div class="content-wrap">
    <h4 class="hiw-sec-title"><?php the_field("languages_heading") ?></h4>
    <?php the_field("languages_text") ?>
    <a href="<?php the_field("langs_button_external_url") ?> <?php the_field("langs_button_internal_url") ?>" class="btn-outline blue cta-btn"><?php the_field("languages_button_text") ?></a>
  </div>
</section>



<!-- ===============================================
            Landline
=============================================== -->
<?php if (get_field('turn_on_landline_section')): ?>
<section class="hiw-landline">
  <div class="row">
    <div class="col copy">
      <h2><?php the_field('landline_title') ?></h2>
      <p><?php the_field('landline_copy') ?></p>
      <div class="btn-wrap">
        <a class="btn-outline darkblue" href="<?php the_field('landline_button_url') ?>"><?php the_field('landline_button_text') ?></a>
      </div>
      <div class="small-copy">
        <?php the_field('landline_small_copy') ?>
      </div>
    </div>

    <div class="col img">
      <img src="<?php echo esc_url(get_field('landline_image')['url']) ?>" alt="<?php echo esc_attr(get_field('landline_image')['alt']) ?>">
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (get_field('discount_heading')): ?>
<!-- ===============================================
            Discount Cards
=============================================== -->
<section class="hiw-discount">
  <div class="cols-wrap">
    <article class="col col-img">
      <img src="<?php echo esc_url(get_field("discount_image")['url']) ?>" alt="<?php echo esc_attr(get_field("discount_image")['alt']) ?>">
    </article>

    <article class="col col-text">
      <h4 class="hiw-sec-title"><?php the_field("discount_heading") ?></h4>
      <?php the_field("discount_text") ?>
      <a href="<?php the_field("discount_button_url") ?>" class="btn-outline blue cta-btn"><?php the_field("discount_button_text") ?></a>
    </article>
  </div>
</section>
<?php endif; ?>

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

<section id="reviews-section" class="pricing-review container<?php echo (get_page_template_slug() === 'pricing-pla.php') ? ' more-padding' : ''; ?>">
  <div class="container">
    <article class="intro-wrap">
      <!-- <h2 class="heading"><?php the_field('review_heading') ?></h2> -->
    </article>
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

    <?php if (get_page_template_slug() === 'pricing-pla.php'): ?>
    <a href="tel:<?php echo $purePhoneNum; ?>" class="number bottom-call-btn more-space btn-outline red"><?php the_field('table_bottom_note') ?></a>
    <?php endif; ?>
  </div>
</section>


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

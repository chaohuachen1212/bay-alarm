<?php
  //Template Name:  Product Details
  update_option('current_page_template','product-details-page'); // <----- this adds a body class
  get_header();
?>

<!-- =========================================================
                Hero Section
========================================================= -->
<section class="para-hero textleft-hero container"> <!-- add .prod-video-hero for custom hero with video btns -->

  <!-- nav -->
  <?php include 'inc/hiw-subnav.php' ?>

  <!-- Img -->
  <figure class="hero-img hero-img-1" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/hero-prod-cell.jpg);"></figure>

  <!-- text -->
  <div class="hero-text-wrap">
    <h1 class="heading">24/7 Help at the Push of a Button</h3>
    <p class="copy">America's #1 Rated Personal Emergency Response System for as low as $25/month! Order Online</p>

<!--     <a href="#!" class="btn btn-outline white">watch how it works</a>
    <a href="#!" class="btn btn-outline white">how to install</a> -->
  </div>
</section>

<!-- =========================================================
                Intro Section
========================================================= -->
<section class="prod-intro-sec">
  <article class="container-wrap"> <!-- add .no-map for text only -->
    <div class="col col-img">
      <img class="prod-img" src="<?php echo get_template_directory_uri(); ?>/img/png-prod-cellular.png">
    </div>

    <div class="col col-text">
      <ul>
        <li>Designed for residents without a landline phone jack.</li>
        <li>24/7 help at the push of a button</li>
        <li>No additional charges for cellular service.</li>
        <li>As low as $35/mo. Call 1-877-522-9633 to order.</li>
      </ul>
      <div class="map-coverage">
        <div class="map-col">
          <img src="<?php echo get_template_directory_uri(); ?>/img/map-coverage-att.jpg">
        </div>
        <div class="map-text-col">
          <div class="text-wrap">
            <p>Check the strength of your ATT&T wireless voice coverage</p>
            <a href="#/">See coverage map</a>
          </div>
        </div>
      </div>
<!--
      <h3>Easy to Use.<br>Even Easier to Install</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore fugiat.</p> -->
    </div>
  </article>
</section>

<!-- =========================================================
                Base Station
========================================================= -->
<section class="prod-base-station">
  <div class="prod-sec-heading">
    <h3>The Base Station</h3>
    <h4>Reliable &amp; Proven Technology. Crystal Clear 2-way Communication</h4>
  </div>
  <figure style="background-image: url(<?php echo GET_TEMP; ?>/img/base-station.jpg);"></figure>
  <figure class="base-station-mobileImg" style="background-image: url(<?php echo GET_TEMP; ?>/img/base-station2.jpg);"></figure>
  <div class="base-station-copy">
    <div class="station-copy">
      <h6>Loud and Clear</h6>
      <p>The personal emergency alert system's built-in, high-output speaker and ultra sensitive microphone allows crystal clear 2-way communication during an emergency.</p>
      <p>Additionally, the system can be used to answer a phone call. No more rushing to the phone and risking a slip or fall!</p>
    </div>
    <div class="station-copy">
      <h6>32 Hour Battery Backup</h6>
      <p>In the event of an blackout or power outage, our system will continue to run for up to 32 hours.</p>
      <p>The battery will automatically recharge itself once power comes back on to the home.</p>
      <p>Get the peace of mind you deserve.</p>
    </div>
  </div>
  <div class="station-copy-bottom">
    <h6>Portable</h6>
    <p>Going on a vacation? Visiting friends and family in another state? Not a problem?</p>
    <p>Our personal emergency response system can be plugged into any home with a standard landline so you can be protected wherever you go.</p>
  </div>
</section>


<?php// include 'inc/product-faq.php' ?>
<!-- =========================================================
                FAQ Section
========================================================= -->
<section class="prod-faq-sec">
  <div class="prod-sec-heading">
    <h3 class="heading">Frequently Asked Questions</h3>
  </div>

  <div class="highlight-container inner-max-container">
    <article class="col">
      <div class="col-icons">
        <div class="icon-wrap">
          <span class="icon-circle gray"></span>
          <span class="icon logo"><?php include "inc/vectors/logo_ATT.svg" ?></span>
        </div>
      </div>
      <h6 class="col-title">Do I need to have AT&T cell service</h6>
      <div class="col-text">
        <p>You DO NOT need to have an existing AT&T cell phone subscription. AT&T cellular service is included with the device.</p>
      </div>
    </article>

    <article class="col">
      <div class="col-icons">
        <div class="icon-wrap two-circle">
          <span class="icon-circle blue"></span>
          <span class="icon"><?php include "inc/vectors/signal-tower.svg" ?></span>
        </div>
        <div class="icon-wrap two-circle">
          <span class="icon-circle teal"></span>
          <span class="icon"><?php include "inc/vectors/house.svg" ?></span>
        </div>
      </div>
      <h6 class="col-title">Cellular vs In-Home. Which is better?</h6>
      <div class="col-text">
        <p>There won't be a difference in performance if AT&T coverage is strong in your area. If AT&T coverage is weak or non-existent, we recommend installing a traditional landline and going with our<br/><a href="#/">In-Home Medical Alert System.</a></p>
      </div>
    </article>

    <article class="col">
      <div class="col-icons">
        <div class="icon-wrap">
          <span class="icon-circle teal-dark"></span>
          <span class="icon"><?php include "inc/vectors/chat.svg" ?></span>
        </div>
      </div>
      <h6 class="col-title">I have a few more questions!</h6>
      <div class="col-text">
        <p>Awesome! Our Care Consultants are ready to help. Give us a call today<br/><a href="18775229633">1-877-522-9633</a></p>
      </div>
    </article>
  </div>
</section>

<?php// include 'inc/product-installation.php' ?>
<!-- =========================================================
                Videos Section
========================================================= -->
<section class="prod-videos-sec">
  <article class="inner-max-container">
    <div class="prod-sec-heading">
      <h3 class="heading">Ridiculously Simple Installation.</h3>
      <div class="copy">
        <p>Plug it in and you're ready to go.</p>
      </div>
    </div>
    <div class="videos-container">
      <section class="cell">
        <div class="v-wrap video-modal-call" data-videosrc="https://www.youtube.com/v/iZOsIfJej2o">
          <figure class="v-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/video-img-2.jpg);">
            <span class="play-icon"><?php include ("inc/vectors/play-icon.svg") ?></span>
            <span class="icon-circle"></span>
          </figure>
          <p class="v-name">Plug into power.</p>
        </div>
      </section>
      <section class="cell">
        <div class="v-wrap video-modal-call" data-videosrc="https://www.youtube.com/v/gkPMzCXEgMA">
          <figure class="v-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/video-img-3.jpg);">
            <span class="play-icon"><?php include ("inc/vectors/play-icon.svg") ?></span>
            <span class="icon-circle"></span>
          </figure>
          <p class="v-name">Plug into power.</p>
        </div>
      </section>
    </div>
  </article>
</section>

<!-- =========================================================
                Spec Section
========================================================= -->
<section class="prod-spec-sec">
  <div class="prod-sec-heading">
    <h3 class="heading">The Cellular Station.</h3>
    <div class="copy">
      <p>Crystal clear 2-way communication you can trust. Powered by AT&T.</p>
    </div>
  </div>

  <div class="prod-wrap">
    <img class="prod-img" src="<?php echo get_template_directory_uri(); ?>/img/prod-inhome-cellular-4.jpg" >
    <article class="feature-box feature-box-1">
      <span class="icon-cirle" style="background-image: url(<?php echo get_template_directory_uri(); ?>/inc/vectors/speaker-white.svg);">
      </span>
      <span class="line"></span>
      <div class="feature-text-wrap text-right">
        <h6 class="feature-title">Loud and clear.</h6>
        <p>The system's built-in, high-output speaker and ultra-sensitive microphone allows crystal clear 2-way communication during an emergency.</p>
        <p>In the event that our operators can't hear you, we'll immediately contact your emergency call list and dispatch local EMS to the home.</p>
      </div>
    </article>

    <article class="feature-box feature-box-2">
      <span class="icon-cirle" style="background-image: url(<?php echo get_template_directory_uri(); ?>/inc/vectors/battery-white.svg);">
      </span>
      <span class="line"></span>
      <div class="feature-text-wrap text-right">
        <h6 class="feature-title">2 Hour Battery Backup.</h6>
        <p>In the event of a blackout or power outage, our system will continue to run for up to 32 hours.</p>
        <p>For added peace of mind, the battery will automatically recharge itself once power comes back on to the home.</p>
      </div>
    </article>

    <article class="feature-box feature-box-3">
      <span class="icon-cirle" style="background-image: url(<?php echo get_template_directory_uri(); ?>/inc/vectors/signal-tower-white.svg);">
      </span>
      <span class="line"></span>
      <div class="feature-text-wrap">
        <h6 class="feature-title">Powered by AT&T.</h6>
        <p>Our cellular medical alert system is powered by an AT&T Cellular 3G SIM card.</p>
        <p>This system will work anywhere in United States as long as the area has AT&T coverage.</p>
        <p>See a full coverage map here.</p>
      </div>
    </article>

  </div>
</section>

<!-- =========================================================
                Help button Section
========================================================= -->
<!-- <section class="prod-helpbtn-sec">
  <div class="prod-sec-heading">
    <h3 class="heading">The Help Button</h3>
    <div class="copy">
      <p>Sleek. Comfortable. Ultra-lightweight.</p>
    </div>
  </div>

  <article class="feature-listing-wrap">
    <div class="img-col">
      <span class="white-gradient"></span>
      <img src="<?php echo get_template_directory_uri(); ?>/img/help-button.jpg">
    </div>

    <div class="text-col">
      <div class="feature-box">
        <div class="icon-circle">
          <?php include ("vectors/umbrella.svg") ?>
        </div>
        <h6 class="feature-title">100% Waterproof</h6>
        <p>Our emergency buttons are designed to be lightweight, comfortable and most importantly, 100% waterproof. Afterall, 80% of senior-related falls happen in the bathroom.</p>
        <p>Your choice of either a necklace or wristband is included with the medical alert phone system. Additional buttons may be purchased.</p>
      </div>

      <div class="feature-box">
        <div class="icon-circle">
          <?php include ("vectors/signal-range.svg") ?>
        </div>
        <h6 class="feature-title">100% Waterproof</h6>
        <p>Our emergency buttons are designed to be lightweight, comfortable and most importantly, 100% waterproof. Afterall, 80% of senior-related falls happen in the bathroom.</p>
        <p>Your choice of either a necklace or wristband is included with the medical alert phone system. Additional buttons may be purchased.</p>
      </div>

      <div class="feature-box">
        <div class="icon-circle">
          <?php include ("vectors/circle-checker.svg") ?>
        </div>
        <h6 class="feature-title">100% Waterproof</h6>
        <p>Our emergency buttons are designed to be lightweight, comfortable and most importantly, 100% waterproof. Afterall, 80% of senior-related falls happen in the bathroom.</p>
        <p>Your choice of either a necklace or wristband is included with the medical alert phone system. Additional buttons may be purchased.</p>
      </div>
    </div>
  </article>
</section>
 -->
<!-- =========================================================
                Auto Fall Section
========================================================= -->
<!-- <section class="prod-auto-fall-sec">
  <article class="col col-text">
    <div class="prod-sec-heading">
      <h3 class="heading">Available with Automatic Fall Detection</h3>
      <div class="copy">
        <p>Etiam porta sem malesuada magna mollis euismod. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nullam quis risus eget urna mollis ornare vel eu leo.</p>
      </div>
      <a href="#/" class="btn-outline blue">Learn More</a>
    </div>
  </article>

  <article class="col col-img">
    <img src="<?php echo get_template_directory_uri(); ?>/img/prod-automatic-fall-detection.jpg">
  </article>
</section> -->

<!-- =========================================================
                Accessories Section
========================================================= -->
<!-- <section class="prod-accessories-sec">

  <div class="inner-max-container">
    <div class="prod-sec-heading">
      <h3 class="heading">Accessories</h3>
      <div class="copy">
        <p>For added protection and peace of mind.</p>
      </div>
    </div>

    <div class="cols-wrap">
      <article class="col">
        <img src="<?php echo get_template_directory_uri(); ?>/img/accessories-vial.jpg">
        <h6 class="col-title">Vial of Life</h6>
        <p>The Vial of Life speacks for you when you can't speak for yourself.</p>
      </article>

      <article class="col">
        <img src="<?php echo get_template_directory_uri(); ?>/img/accessories-lockbox.jpg">
        <h6 class="col-title">Lockbox</h6>
        <p>Protect your home from property of damage during a forced entry.</p>
      </article>

      <article class="col">
        <img src="<?php echo get_template_directory_uri(); ?>/img/accessories-plan.jpg">
        <h6 class="col-title">Premier Protection Plan</h6>
        <p>Protect your Medical Alert Equipment from power surges, voltage spike, and water or flood damage.</p>
      </article>
    </div>

    <a href="#/" class="btn-outline blue ctabtn">View all accessories</a>
  </div>
</section> -->

<!-- =========================================================
                Spouse Section
========================================================= -->
<!-- <section class="prod-spouse-sec">
  <figure class="big-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/old-couple-2.jpg);"></figure>

  <div class="text-box">
    <div class="prod-sec-heading">
      <h3 class="heading">Free Monitoring for Spouse</h3>
      <div class="copy">
        <p>Bay Alarm Medical provides complimentary service for your spouse or an additional family member.</p>
        <p>Simply purchase a second pendant and we'll provide free monitoring for it.</p>
        <a href="#/" class="btn blue ctabtn">Get started today</a>
      </div>
    </div>

  </div>
</section> -->

<!-- =========================================================
                Consultants Section
========================================================= -->
<!-- <section class="prod-consultants-sec">
  <article class="inner-max-container">
    <div class="prod-sec-heading">
      <h3 class="heading">Meet Our Care Consultants</h3>
      <div class="copy">
        <p>Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
      </div>
    </div>

    <div class="members-wrap">
      <a href="#/" class="member">
        <figure class="mem-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/staff-4.jpg);"></figure>
        <div class="caption-wrap">
          <p class="mem-name">Bryan</p>
          <p class="mem-more">Learn more</p>
        </div>
      </a href="#/">
      <a href="#/" class="member">
        <figure class="mem-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/staff-3.jpg);"></figure>
        <div class="caption-wrap">
          <p class="mem-name">Kayla</p>
          <p class="mem-more">Learn more</p>
        </div>
      </a href="#/">
      <a href="#/" class="member">
        <figure class="mem-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/staff-2.jpg);"></figure>
        <div class="caption-wrap">
          <p class="mem-name">Rachel</p>
          <p class="mem-more">Learn more</p>
        </div>
      </a href="#/">
      <a href="#/" class="member">
        <figure class="mem-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/staff-1.jpg);"></figure>
        <div class="caption-wrap">
          <p class="mem-name">Trisha</p>
          <p class="mem-more">Learn more</p>
        </div>
      </a href="#/">
    </div>

    <div class="content-text">
      <p>Request information from a Bay Alarm Medical Care Consultant!</p>
      <p>We promise, no aggressive sales tactics. Only honest advice from people that care. Whether it's with us or another company, the safety of you and your family are our highest priority.</p>
    </div>

    <a href="#/" class="btn-outline blue ctabtn">Request Information</a>
  </article>
</section> -->

<?php include 'inc/product-detail-content.php' ?>

<?php include 'inc/bottom-get-started.php' ?>

<?php get_footer(); ?>

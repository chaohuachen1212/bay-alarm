<!DOCTYPE html>
<html <?php language_attributes(); ?>>


<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="google-site-verification" content="VG6jkc-IqIAJnSddhk_va7tJXeWY8IM6xpO2WqbUOCQ" />
  <meta name="facebook-domain-verification" content="514s8acndnqvaqvjy8toh01iydoyud" />
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/new-favicon-96x96px.png" />
  <title><?php wp_title( '-', true, 'right' ); ?></title>

  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link rel="preload" as="font" type="font/woff2" crossorigin href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/CircularTT-Medium.woff">
  <link rel="preload" as="font" type="font/woff2" crossorigin href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/CircularTT-Bold.woff">
  <link rel="preload" as="font" type="font/woff2" crossorigin href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/CircularTT-Black.woff">
  <link rel="preload" as="font" type="font/woff2" crossorigin href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/CircularTT-Book.woff">
  <link rel="preload" as="font" type="font/woff2" crossorigin href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/slick.woff">

  <?php
    define('SITE_KEY', '6Ld5mp8mAAAAAPK1W-QIuTKNqmDb4sejGHhfZZ3l');
  ?>

  <script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-K6LK4DQ');</script>
  <!-- End Google Tag Manager -->


  <?php if (get_page_template_slug() !== 'fb-lander.php' && !is_single(25578) && !is_single(25848) && !is_single(26446)): ?>
  <!-- Start of LiveChat (www.livechatinc.com) code -->
  <script type="text/javascript">
  window.__lc = window.__lc || {};
  window.__lc.license = 1031331;
  (function() {
    var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
    lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
  })();
  </script>
  <!-- End of LiveChat code -->
  <?php endif; ?>

  <?php
    $schemaArr = ['how-it-works.php', 'in-home.php', 'gps.php', 'product-bundle.php', 'pricing.php'];
    if (in_array(get_page_template_slug(), $schemaArr)):
  ?>
  <script type='application/ld+json'>
    {
      "@context":"https:\/\/schema.org",
      "@type":"Organization",
      "url":"https:\/\/www.bayalarmmedical.com\/",
      "sameAs":["https:\/\/www.facebook.com\/BayAlarmMedical\/",
      "https:\/\/plus.google.com\/+Bayalarmmedical",
      "https:\/\/www.youtube.com\/user\/BayAlarmMedical",
      "https:\/\/www.pinterest.com\/bayalarmmedical\/",
      "https:\/\/twitter.com\/BayAlarmMedical"],
      "@id":"#organization",
      "name":"Bay Alarm Medical",
      "logo":"https:\/\/www.bayalarmmedical.com\/wp-content\/uploads\/2017\/02\/bay-alarm-medical-logo.jpg",
      "aggregateRating":{"@type":"AggregateRating","ratingValue":"4.7","bestRating":"5","reviewCount":"<?php echo get_field('reviews_count', 'option'); ?>"}
    }
  </script>
  <?php endif; ?>

<?php wp_head(); ?>
<!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->
</head>




<div class="header-margin--wrap"></div>
    <body class="<?php echo get_option('current_page_template'); ?>">
    <!--[if < IE 9]><style media="screen">.old-browsers{position:relative;background:#fff;width:100%;height:100%;color:#000;font-family:sans-serif;font-size:20px;text-align:center;padding:0;margin:0}.old-browsers h2{padding:20px 0}.old-browsers p,.old-browsers ul{margin:0 auto}.old-browsers p{max-width:700px;padding-bottom:50px;line-height:1.4em}.old-browsers ul li{display:inline-block;padding:0 25px}.old-browsers ul li img{width:115px}.old-browsers ul li p{padding-top:15px;color:#249AE1}body{margin:0;padding:0}</style><div class="old-browsers"> <h2>Browser out of date.</h2> <p>It appears you're running on a very old web browser that we're unable to support. If you would like to view the site you'll need to update your browser. Please choose from any of the following modern browsers. Thanks!</p> <ul> <li> <a href="https://www.google.com/intl/en/chrome/browser/desktop/index.html#brand=CHMB&utm_campaign=en&utm_source=en-ha-na-us-sk&utm_medium=ha"> <img src="https://raw.githubusercontent.com/alrra/browser-logos/master/chrome/chrome_128x128.png" alt="Google Chrome"> <p>Google Chrome</p> </a> </li> <li> <a href="https://www.mozilla.org/en-US/firefox/new/"> <img src="https://raw.githubusercontent.com/alrra/browser-logos/master/firefox/firefox_128x128.png" alt="Mozilla Firefox"> <p>Mozilla Firefox</p> </a> </li> <li> <a href="https://support.apple.com/downloads/safari"> <img src="https://raw.githubusercontent.com/alrra/browser-logos/master/safari/safari_128x128.png" alt="Safari"> <p>Safari</p> </a> </li> <li> <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie"> <img src="https://raw.githubusercontent.com/alrra/browser-logos/master/internet-explorer/internet-explorer_128x128.png" alt="Internet Explorer"> <p>Internet Explorer</p> </a> </li> </ul></div><![endif]-->


    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K6LK4DQ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <?php 
      //$promo_banner_display = get_field('promo_banner_display');
      // if ( $promo_banner_display ) :
      if (  is_page_template('index.php') || 
            is_page_template('home-new.php') || 
            is_page_template('home-care-lander.php') || 
            is_page_template('pricing.php') || 
            is_page_template('pricing-new.php') || 
            is_page_template('free-quote.php') || 
            is_page_template('free-quote-new.php') || 
            is_page_template('how-it-works-new.php') || 
            is_page_template('product-detail.php') 
      ) :
        include 'inc/promo-banner.php';
      endif; 
    ?>
    <?php if (get_field('turn_on_header_tabs')): ?>
   <div class="mobile-header--tabs">
      <ul class="row">
        <li class="is-active" >
          <a href="/" class="font-600">
            Bay Alarm Medical
          </a>
        </li>

        <li>
          <a class="font-600" href="https://www.getsafe.com/" target="_blank">
            GetSafe
          </a>
        </li>
      </ul>
    </div>
    <?php endif; ?>

    <div class="header-mega-wrap">
      <?php
        $currentPath = $_SERVER['REQUEST_URI'];
        $currentPathName = basename($currentPath);
        $page_temp = get_page_template_slug();
        $args = array('post_type' => 'navigation');
        $the_query = new WP_Query($args);
        while ($the_query->have_posts()): $the_query->the_post();
      ?>

        <?php include 'inc/header-mini-nav.php' ?>
      
        <header role="banner" class="max-container">
          <?php include 'inc/header-main-nav.php' ?>
          <?php include 'inc/header-slide-menu.php' ?>
        </header>

      <?php
        endwhile;
        wp_reset_query();
      ?>

         <!-- Slider menu: Promo -->
      <?php 
        $show_promo_banner = get_field('show_promo_banner', 'option');
        if ($show_promo_banner): 
      ?>
       <?php
          $base_prod_url = get_field('mobile_promo_banner_link', 'option');
          if ($base_prod_url):
          $prod_link = $base_prod_url['url'];
          $prod_target = $base_prod_url['target'] ? $base_prod_url['target'] : '_self';
      ?>
      <style>
      .header-mega-wrap .mobile-btn-link p {color: <?php the_field('mobile_promo_banner_text_color', 'option') ?>;}

      .header-mega-wrap .mobile-btn-link svg path {fill: <?php the_field('mobile_promo_banner_text_color', 'option') ?>; stroke: <?php the_field('mobile_promo_banner_text_color', 'option') ?>;}
    </style>
      <a href="<?php echo esc_url($prod_link); ?>" target="<?php echo esc_attr($prod_target); ?>"  class="mobile-btn-link mobile-btn-promo" style="background: <?php the_field('mobile_promo_banner_background_color', 'option'); ?>;">
        <div class="icon"><?php include GET_DIR . '/img/ui/tag-fill.svg'; ?></div>
        <p><?php the_field('mobile_promo_banner_text', 'option'); ?></p>
        <div class="arrow"><?php include GET_DIR . '/img/ui/menu-arrow-right.svg'; ?></div>
      </a>
      <?php endif; ?>
      <?php endif; ?>
    </div>


    <div class="page-overlay"></div>

    <div class="max-container" class="main-page-body" id="main-page-body">

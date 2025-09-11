    </div> <!-- end [max-container] -->


    <!-- Video Modal -->
    <section class="video-modal" role="dialog" tabindex="0">
      <article class="video-modal-wrap">
        <iframe class="video-iframe" width="420" height="315" src="" frameborder="0" allowfullscreen>
        </iframe>
      </article>
      <div class="video-modal-close" tabindex="0" role="button">
        <?php include 'inc/vectors/close.svg'; ?>
      </div>
    </section>

    <?php
      $path = basename($_SERVER['REQUEST_URI']);
      $page_temp = get_page_template_slug();
      $args = array('post_type' => 'footer');
      $the_query = new WP_Query($args);
      while ($the_query->have_posts()): $the_query->the_post();
    ?>

    <!-- Footer -->
    <footer class="max-container">
      <?php if ($page_temp !== 'pricing-pla.php'): ?>
      <div class="footer-top">
        <section class="contact-module desktop">
          <div class="contact-wrap">
            <div class="footer-logo">
              <a href="/">
                <?php include 'inc/vectors/footer-logo.svg' ?>
              </a>
            </div>

            <div class="contact-info">
              <div class="footer-address">
                <?php the_field('company_address'); ?>
              </div>
              <?php
                if ($path !== 'get-started'):
                $phoneNum = ($page_temp === 'fb-lander.php') ? '1-855-707-2225' : get_field("company_phone");
                $purePhoneNum = preg_replace('/[^0-9]/', '', $phoneNum);
              ?>
              <span class="footer-number number" ><a href="tel:<?php echo $purePhoneNum; ?>" class="promoNumber">Call <?php echo $phoneNum; ?></a></span>
              <?php endif; ?>
            </div>

            <div class="footer-social">
              <?php
            	if( have_rows('footer_social_icons') ):
            	while( have_rows('footer_social_icons') ): the_row();
              ?>
              <?php if (get_field('is_whatapp_icon')): ?>
                  <a aria-label="<?php the_sub_field('label_name') ?>" href="<?php the_sub_field('url') ?>" target="_top" class="whatsapp wa_btn" style="background-image: url(<?php the_sub_field('icon') ?>);"></a>
              <?php else: ?>
                  <a aria-label="<?php the_sub_field('label_name') ?>" href="<?php the_sub_field('url') ?>" rel="noreferrer noopener" target="_blank" style="background-image: url(<?php the_sub_field('icon') ?>);"></a>
              <?php endif; ?>
              <?php
            	endwhile; endif;
              ?>
            </div>
          </div>
        </section>

        <section class="sitemap-module">
          <div class="sitemap-col-wrap">

            <?php
              if (have_rows('footer_links')) : while (have_rows('footer_links')) : the_row();
            ?>

            <article class="sitemap-col">

              <?php
                if (have_rows('footer_link')) : while (have_rows('footer_link')) : the_row();
                $url = (get_sub_field('footer_link_custom_url')) ? get_sub_field('footer_link_custom_url') : get_sub_field('footer_link_url');
              ?>

                <div class="footer-nav-item">
                <?php if (get_sub_field('is_popup_window')==='yes'): ?>
                  <a class="item-link is-popup">
                    <span class="item-text"><?php the_sub_field('footer_link_text'); ?></span>
                  </a>
                <?php else: ?>
                   <a href="<?php echo $url; ?>" class="item-link">
                      <span class="item-text"><?php the_sub_field('footer_link_text'); ?></span>
                   </a>
                <?php endif; ?>
                </div>

              <?php endwhile; endif; ?>

            </article>

            <?php endwhile; endif; ?>

          </div>
        </section>

        <section class="contact-module mobile">
          <div class="contact-wrap">
            <div class="footer-logo">
              <a href="/">
                <?php include 'inc/vectors/footer-logo.svg' ?>
              </a>
            </div>

            <div class="contact-info">
              <div class="footer-address">
                <?php the_field('company_address'); ?>
              </div>
              <?php
                if ($path !== 'get-started'):
                $phoneNum = ($page_temp === 'fb-lander.php') ? '1-855-707-2225' : get_field("company_phone");
                $purePhoneNum = preg_replace('/[^0-9]/', '', $phoneNum);
              ?>
              <span class="footer-number number" ><a href="tel:<?php echo $purePhoneNum; ?>" class="promoNumber">Call <?php echo $phoneNum; ?></a></span>
              <?php endif; ?>
            </div>

            <div class="footer-social">
              <?php
              if( have_rows('footer_social_icons') ):
              while( have_rows('footer_social_icons') ): the_row();
              ?>
              <?php if (get_field('is_whatapp_icon')): ?>
                  <a aria-label="<?php the_sub_field('label_name') ?>" href="<?php the_sub_field('url') ?>" target="_top" class="whatsapp wa_btn" style="background-image: url(<?php the_sub_field('icon') ?>);"></a>
              <?php else: ?>
                  <a aria-label="<?php the_sub_field('label_name') ?>" href="<?php the_sub_field('url') ?>" rel="noreferrer noopener" target="_blank" style="background-image: url(<?php the_sub_field('icon') ?>);"></a>
              <?php endif; ?>
              <?php
              endwhile; endif;
              ?>
            </div>
          </div>
        </section>
      </div>
      <?php endif; ?>

      <div class="footer-bottom">
        <article class="footer-bwrap">
          <section class="f-copyright">
            <p class="f-ptext">
              <span class="copyright-text">© <?php echo date("Y"); ?> <?php the_field('footer_bottom_copy'); ?></span>
              <a class="ada-logo" href="https://www.essentialaccessibility.com/bay-alarm-medical" target="_blank">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 213.88 80.44"><defs><style>.cls-1{fill:#bcd9ea}.cls-2{fill:#fff}.cls-3{fill:#103c60}</style></defs><rect class="cls-1" width="106.94" height="80.44" rx="40.22"/><rect class="cls-1" x="106.94" width="106.94" height="80.44" rx="40.22"/><circle class="cls-2" cx="107.61" cy="40.22" r="26.97"/><path class="cls-2" d="M37.44 64.7z"/><path class="cls-3" d="M45.71 23.2a4.09 4.09 0 10-4.14-4.08 4.11 4.11 0 004.14 4.08zM56.51 50.36a2.38 2.38 0 00-1.61 1.75v.09a12.06 12.06 0 01-7.81 7.65 11.38 11.38 0 01-4.89.41 12.8 12.8 0 01-6.5-3.14l-.19-.12c-.18-.17-.35-.35-.51-.53l-.45-.47-.14-.18a12.33 12.33 0 01-2.19-4.19 12.93 12.93 0 01-.42-5.39A12.26 12.26 0 0138 37.1l.07-.06a2.44 2.44 0 00-.53-4.65 2.27 2.27 0 00-1.37.22 17.22 17.22 0 00-9.2 13 17.69 17.69 0 00.64 7.8 16.6 16.6 0 0020.65 11.28 17 17 0 0011.15-11.3 2.48 2.48 0 000-1.43 2.33 2.33 0 00-2.9-1.6z"/><path class="cls-3" d="M75.88 53.74a1.86 1.86 0 00-2.5-.67l-2.73 1.53-6.91-10.43a2.48 2.48 0 00-2.11-1.28h-13v-4.13h9a2.6 2.6 0 000-5.17h-9v-5.37a2.92 2.92 0 00-5.84 0v17a3 3 0 002.67 2.92 4 4 0 00.6 0h15.08l6.57 9.9a2.16 2.16 0 001.34.92 1.84 1.84 0 00.41.06h.06a1.82 1.82 0 00.72-.12h.25l4.7-2.63a1.8 1.8 0 00.69-2.53zM180.94 64.45a.44.44 0 01-.44.44h-36.18a.44.44 0 01-.44-.44V51.24a.44.44 0 01.44-.44h36.18a.43.43 0 01.44.44v13.21m-23.51-7.36H161a.39.39 0 00.38-.39v-3.57a.39.39 0 00-.38-.39h-3.57a.39.39 0 00-.39.39v3.57a.39.39 0 00.39.39m-6.78 1.28h-3.57a.38.38 0 00-.38.39v3.57a.38.38 0 00.38.38h3.57a.38.38 0 00.39-.38v-3.57a.38.38 0 00-.39-.39m0-1.28h3.57a.39.39 0 00.39-.39v-3.57a.39.39 0 00-.39-.39h-3.57a.39.39 0 00-.39.39v3.57a.39.39 0 00.39.39m13.53 0h3.57a.39.39 0 00.39-.39v-3.57a.39.39 0 00-.39-.39h-3.57a.39.39 0 00-.38.39v3.57a.39.39 0 00.38.39m6.77 0h3.57a.39.39 0 00.38-.39v-3.57a.39.39 0 00-.38-.39H171a.38.38 0 00-.38.39v3.57a.38.38 0 00.38.39m0 1.28h-3.57a.38.38 0 00-.38.39v3.57a.38.38 0 00.38.38H171a.38.38 0 00.39-.38v-3.57a.38.38 0 00-.39-.39m-13.53 0h-3.57a.38.38 0 00-.38.39v3.57a.37.37 0 00.38.38h3.57a.38.38 0 00.39-.38v-3.57a.38.38 0 00-.39-.39m20.3 0h-3.57a.38.38 0 00-.38.39v3.57a.38.38 0 00.38.38h3.57a.39.39 0 00.39-.38v-3.57a.39.39 0 00-.39-.39m-13.53 0h-3.57a.38.38 0 00-.39.39v3.57a.38.38 0 00.39.38h3.57a.39.39 0 00.39-.38v-3.57a.39.39 0 00-.39-.39m-19.43-9.82a.36.36 0 00.33.39h34.64a.37.37 0 00.33-.39V15.94a.36.36 0 00-.33-.39h-34.69a.36.36 0 00-.33.39zm4.69-5.78v-22a.31.31 0 01.3-.32h25.52a.3.3 0 01.29.32v22a.3.3 0 01-.29.32h-25.57a.31.31 0 01-.3-.32M204.13 80v-4.42h-1.59v-.91h4.26v.91h-1.59V80zM207.49 80v-5.33h1.62l1 3.67 1-3.67h1.62V80h-1v-4.18L210.6 80h-1l-1.06-4.22V80zM118.54 35.11L97.08 23.94c0 4.6.52 7.56 3.67 9.2l10.78 5.61zM121.35 36.57l-7 3.64-13.5 7c-3.07 1.67-3.77 5.29-3.77 9.26l19.49-10.14c4.31-2.35 4.78-5.22 4.78-9.79z"/></svg>
              </a>
            </p>
          </section>
        </article>
      </div>

    </footer>

    <?php
      endwhile;
      wp_reset_query();
    ?>

    <div class="review-wrap">
      <img class="close" src="<?php echo GET_TEMP ?>/img/close.svg" alt="close">
      <?php echo do_shortcode( '[brb_collection id="31259"]' ); ?>
    </div>

    <?php include 'inc/compare-us-others.php' ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.4.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/3.0.0/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity@2.3.0/dist/flickity.pkgd.min.js"></script>


    <?php if (strpos(get_home_url(), 'bayalarmmedical.com') === false): ?>
      <!-- <script id="__bs_script__">//<![CDATA[
      document.write("<script async src='http://HOST:1111/browser-sync/browser-sync-client.js?v=2.27.9'><\/script>".replace("HOST", location.hostname));
  //]]></script> -->
    <?php endif; ?>

<?php
if(get_field('included_pages', 'option')){
$includepages = get_field('included_pages', 'option');
$pageids = array();
foreach($includepages as $e) {
  $pageids[] = $e->ID;
}
if(in_array(get_the_ID(), $pageids)){ ?>
    <div class="modal-form active">
      <div class="blackout-bg"></div>
      <div class="form-wrap active">
        <div class="form-header">
          <div class="header-col">
            <?php $main_heading = (get_page_template_slug() !== 'pricing-pla.php') ? get_field('main_heading', 'option') : get_field('main_heading_pla', 'option'); ?>
            <h3><?php echo $main_heading; ?></h3>
            <p><?php the_field('main_heading_pla', 'option'); ?></p>
         </div>
         <div class="contact-info">
            <div class="contact-text" id="formModalContactPhone"><?php echo get_field('contact_text', 'option'); ?></div>
            <?php $modalPhoneNumber = preg_replace('/[^0-9]/', '', get_field('contact_phone_number', 'option')); ?>
            <div class="contact-phone"><a aria-describedby="formModalContactPhone" href="tel:<?php echo $modalPhoneNumber; ?>">Call us at: <?php echo get_field('contact_phone_number', 'option'); ?></a></div>
          </div>

         
        </div>
        <div class="form-columns">
          <div class="column list">
            <div class="image-wrap"><img src="<?php $img = get_field('heading_image', 'option'); echo $img['url']; ?>"></div>
            <article>
              <?php $list_heading = (get_page_template_slug() !== 'pricing-pla.php') ? get_field('list_heading', 'option') : get_field('list_heading_pla', 'option'); ?>
              <h4><?php echo $list_heading; ?></h4>
              <div class="list-wrap">
                <?php $list_field = (get_page_template_slug() !== 'pricing-pla.php') ? get_field('list', 'option') : get_field('list_pla', 'option'); ?>
                <?php foreach($list_field as $l){ ?>
                <?php $listimage = $l['image'] ?>
                <div class="listing">
                  <div class="listing-img"><img src="<?php echo $listimage['url']; ?>" alt=""></div>
                  <div class="listing-text"><?php echo $l['text']; ?></div>
                </div>
                <?php } ?>
              </div>
            </article>
          </div>
          <div class="column form-column">

            <?php $free_quote_nonce = wp_create_nonce( 'free_quote_nonce' ); ?>
            <form id="popup-modal-form" class="fquote-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
              <input hidden name="action" value="free_quote_submission">
              <input hidden name="free_quote_nonce" value="<?php echo $free_quote_nonce; ?>">
              <input class='input-required' type="text" maxlength="40" placeholder="First Name *" name="first_name" required title="First Name: This field is required.">
              <input class='input-required' type="text" maxlength="40" placeholder="Last Name *" name="last_name" required>
              <input class='input-required' type="text" maxlength="40" placeholder="Phone Number *" name="phone" type="tel" required >
              <input class='input-required' type="email" maxlength="40" placeholder="Email *" name="email" type="email" required>
              <input type="text" maxlength="40" name="lead_source" value="Exit Intent Form" hidden>
              <input id="referral_url" name="referral_url" type="text" hidden>
              <input id="store_name" maxlength="40" name="store_name" type="text" value="Bay Alarm Medical" hidden>
              <?php if (!empty(get_field('form_consent_text', 'option'))): ?>
                <input id="marketing_sms_opt_in" name="marketing_sms_opt_in" type="text" value="1" hidden>
                <p style="font-size: 10px; margin-bottom: 20px; color: #3C3A42;"><?php the_field('form_consent_text', 'option'); ?></p>
              <?php endif; ?>
              <input type="submit" id="quote-submit" value="Get Your Free Quote">
            </form>
            <div class="no-thanks" tabindex="0" role="button">No Thanks</div>
          </div>
        </div>
      </div>
    </div>
<?php }} ?>

    <?php wp_footer(); ?>

  <?php
    $page = get_page_template_slug( $post_id );
    $reviews_count = get_field('reviews_count', 'option');

    if ($page === 'in-home.php'): ?>
      <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "Product",
          "name": "In-Home Medical Alert System",
          "image": "https://www.bayalarmmedical.com/wp-content/uploads/2016/12/hiw-prod-1.jpg",
          "manufacturer": {
            "@type": "Organization",
            "name": "Bay Alarm Medical"
          },
          "description": "America’s #1 rated Personal Emergency Response System for as low as $25 per month",
          "audience": "seniors",
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.7",
            "ratingCount": "<?php echo $reviews_count; ?>"
          }
        }
      </script>

      <?php
        endif;
        if ($page === 'cellular.php'): ?>
        <script type="application/ld+json">
          {
            "@context": "http://schema.org",
            "@type": "Product",
            "name": "Cellular Medical Alert System",
            "image": "https://www.bayalarmmedical.com/wp-content/themes/bay-alarm/build/img/png-prod-cellular.png",
            "manufacturer": {
              "@type": "Organization",
              "name": "Bay Alarm Medical"
            },
            "description": "Designed for residents without a landline phone jack. 24/7 help at the push of a button. As low as $35 per month.",
            "audience": "seniors",
            "aggregateRating": {
              "@type": "AggregateRating",
              "ratingValue": "4.7",
              "ratingCount": "<?php echo $reviews_count; ?>"
            }
          }
        </script>

      <?php
        endif;
        if ($page === 'product-bundle.php'): ?>
        <script type="application/ld+json">
          {
            "@context": "http://schema.org",
            "@type": "Product",
            "name": "In-Home Medical Alert System with GPS Medical Alert System",
            "image": "https://www.bayalarmmedical.com/wp-content/uploads/2016/12/hiw-prod-1.jpg",
            "manufacturer": {
              "@type": "Organization",
              "name": "Bay Alarm Medical"
            },
            "description": "America’s #1 rated Personal Emergency Response System with GPS. Go anywhere, do anything. Get help at the touch of a button. As low as $39.95 per month.",
            "audience": "seniors",
            "aggregateRating": {
              "@type": "AggregateRating",
              "ratingValue": "4.7",
              "ratingCount": "<?php echo $reviews_count; ?>"
            }
          }
        </script>

      <?php
        endif;
        if ($page === 'gps.php'): ?>
        <script type="application/ld+json">
          {
            "@context": "http://schema.org",
            "@type": "Product",
            "name": "GPS Medical Alert System",
            "image": "https://www.bayalarmmedical.com/wp-content/themes/bay-alarm/build/img/png-prod-gps.png",
            "manufacturer": {
              "@type": "Organization",
              "name": "Bay Alarm Medical"
            },
            "description": "Senior medical alert system with GPS. Go anywhere, do anything. Get help at the touch of a button.",
            "audience": "seniors",
            "aggregateRating": {
              "@type": "AggregateRating",
              "ratingValue": "4.7",
              "ratingCount": "<?php echo $reviews_count; ?>"
            }
          }
        </script>

      <?php
        endif;
        if ($page === 'fall-detection.php'): ?>
        <script type="application/ld+json">
          {
            "@context": "http://schema.org",
            "@type": "Product",
            "name": "Medical Alert System With Automatic Fall Detection",
            "image": "https://www.bayalarmmedical.com/wp-content/themes/bay-alarm/build/img/png-prod-fall-detection.png",
            "manufacturer": {
              "@type": "Organization",
              "name": "Bay Alarm Medical"
            },
            "description": "Senior medical alert system with fall detection pendant. Automatically places a call for help if you are unable to. From $35 per month.",
            "audience": "seniors",
            "aggregateRating": {
              "@type": "AggregateRating",
              "ratingValue": "4.7",
              "ratingCount": "<?php echo $reviews_count; ?>"
            }
          }
        </script>
      <?php endif; ?>

      <script src="https://apis.google.com/js/platform.js" async defer></script>​


    <!-- BEGIN GCR Language Code -->
    <script>
      window.___gcfg = {
        lang: 'en_US'
      };
    </script>
    <!-- END GCR Language Code -->
  </body>
</html>

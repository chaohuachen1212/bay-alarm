<?php
  //Template Name:  Product Quiz
  update_option('current_page_template','product-quiz');
  get_header();
?>

  <div class="progress--steps">
    <div class="progress-bar-bg">
      <div class="progress-bar-fill"><p>(Step <span class="number">1</span> of <span class="total-number">6</span>)</p></div>
    </div>
  </div>

  <section class="product-quiz--main-content">

    <div class="container">
      <div class="quiz-steps-wrap">
        <?php
           $c = 1;
          if( have_rows('main_steps_content') ):
          while( have_rows('main_steps_content') ): the_row();
        ?>
        <div class="quiz-step quiz-step-<?php echo $c; ?>">
          <article>
            <div class="inner-wrap">
              <h2><?php the_sub_field('title'); ?></h2>
              <div class="btn-wrap">
                <?php
                  if( have_rows('buttons_text') ):
                  while( have_rows('buttons_text') ): the_row();
                  $text = strtolower(str_replace(' ', '-', get_sub_field('text')));
                ?>
                  <span class="btn <?php if(get_sub_field('turn_on_skip_next_step')): echo 'skep-next-step'; endif; ?>" data-item="<?php if($c===4): echo 'live-along-'; endif; ?><?php echo $text; ?>"><?php the_sub_field('text'); ?></span>
                <?php
                  endwhile; endif;
                ?>
              </div>

              <div class="copy">
                <?php the_sub_field('copy'); ?>
              </div>

              <span class="btn-back">
                <?php include 'inc/vectors/arrow-left-circle-fill.svg'; ?>
                Go Back
              </span>

              <span class="btn-skep-back">
                <?php include 'inc/vectors/arrow-left-circle-fill.svg'; ?>
                Go Back
              </span>
            </div>
          </article>

          
          <?php if (get_sub_field('image')): ?>
          <figure>
            <img class="image" src="<?php the_sub_field('image'); ?>" alt="image">
          </figure>
          <?php endif; ?>
        </div>
        <?php
          $c++; endwhile; endif;
        ?>

        <div class="quiz-step">

          <div class="last-step--content">
            <div class="row in-home-cellular">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>In-Home Cellular</h2>
                <div class="tabs-wrap">
                  <span>Award Winning</span>
                  <span>In Stock</span>
                </div>
                <p>This in-home system is ideal for someone who stays mostly at home, with reliable coverage and optional safety add-ons for peace of mind.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/in-home-cellular.webp" alt="Image">
              </figure>
            </div>

            <div class="row in-home-cellular-wall-buttons">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>In-Home Cellular + Wall Buttons</h2>
                <div class="tabs-wrap">
                  <span>Award Winning</span>
                  <span>In Stock</span>
                </div>
                <p>This system offers in-home protection with added safety features like fall detection and wall buttons and ideal for users with fall concerns or who live alone.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/sos-home-cellular-wall-button.webp" alt="Image">
              </figure>
            </div>

            <div class="row in-home-cellular-optional-wall-buttons">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>In-Home Cellular + Optional Wall Buttons</h2>
                <div class="tabs-wrap">
                  <span>Award Winning</span>
                  <span>In Stock</span>
                </div>
                <p>This system offers in-home protection with added safety features like fall detection and wall buttons and ideal for users with fall concerns or who live alone.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/sos-home-cellular-wall-button.webp" alt="Image">
              </figure>
            </div>


            <div class="row in-home-cellular-fall-detection">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>In-Home Cellular + Fall Detection</h2>
                <div class="tabs-wrap">
                  <span>Award Winning</span>
                  <span>In Stock</span>
                </div>
                <p>This system offers in-home protection with added safety features like fall detection and wall buttons and ideal for users with fall concerns or who live alone.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/in-home-cellular-fall-detection.webp" alt="Image">
              </figure>
            </div>

            <div class="row in-home-cellular-fall-detection-wall-buttons">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>In-Home Cellular + Fall Detection + Wall Buttons</h2>
                <div class="tabs-wrap">
                  <span>Award Winning</span>
                  <span>In Stock</span>
                </div>
                <p>Since the person lives alone and is at risk of falling, we recommend in-home protection with fall detection and wall buttons for added safety in key areas.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/in-home-cellular-fall-detection-wall-buttons.webp" alt="Image">
              </figure>
            </div>

            <div class="row in-home-cellular-fd-optional-wall-buttons">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>In-Home Cellular + FD <br>+ Optional Wall Buttons</h2>
                <div class="tabs-wrap">
                  <span>Award Winning</span>
                  <span>In Stock</span>
                </div>
                <p>This system offers in-home protection with added safety features like fall detection and wall buttons and ideal for users with fall concerns or who live alone.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/in-home-cellular-fall-detection-wall-buttons.webp" alt="Image">
              </figure>
            </div>

            <div class="row in-home-cellular-optional-fall-detection">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>In-Home Cellular <br>+ Optional Fall Detection</h2>
                <div class="tabs-wrap">
                  <span>Award Winning</span>
                  <span>In Stock</span>
                </div>
                <p>This system offers in-home protection with added safety features like fall detection and wall buttons and ideal for users with fall concerns or who live alone.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/in-home-cellular-fall-detection.webp" alt="Image">
              </figure>
            </div>

            <div class="row in-home-cellular-fd-coverage-check">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>In-Home Cellular + FD + Coverage Check</h2>
                <div class="tabs-wrap">
                  <span>Award Winning</span>
                  <span>In Stock</span>
                </div>
                <p>This in-home system is ideal for someone who stays mostly at home, with reliable coverage and optional safety add-ons for peace of mind.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/in-home-cellular-fall-detection.webp" alt="Image">
              </figure>
            </div>

            <div class="row in-home-cellular-verify-coverage">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>In-Home Cellular (verify coverage)</h2>
                <div class="tabs-wrap">
                  <span>Award Winning</span>
                  <span>In Stock</span>
                </div>
                <p>This in-home system is ideal for someone who stays mostly at home, with reliable coverage and optional safety add-ons for peace of mind.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/in-home-cellular-fall-detection.webp" alt="Image">
              </figure>
            </div>

            <div class="row in-home-landline-fd-if-selected">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>In-Home Landline (+ FD if selected)</h2>
                <div class="tabs-wrap">
                  <span>Award Winning</span>
                  <span>In Stock</span>
                </div>
                <p>This system is best for someone who spends most of their time at home and does not have reliable cellular coverage. It keeps things simple and secure.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/in-home-cellular-fall-detection.webp" alt="Image">
              </figure>
            </div>


            <div class="row sos-all-in-one-2-fall-detection">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>SOS All-In-One 2 + Fall Detection</h2>
                <div class="tabs-wrap">
                  <span>Most Popular</span>
                  <span>In Stock</span>
                </div>
                <p>This device offers flexible coverage for those who move between home and outside, with one simple wearable solution.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/sos-all-in-one-1-fall-detection.webp" alt="Image">
              </figure>
            </div>

            <div class="row sos-all-in-one-2">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>SOS All-In-One 2</h2>
                <div class="tabs-wrap">
                  <span>Most Popular</span>
                  <span>In Stock</span>
                </div>
                <p>This device offers flexible coverage for those who move between home and outside, with one simple wearable solution.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/sos-all-in-one-2.webp" alt="Image">
              </figure>
            </div>

            <div class="row sos-all-in-one-2-optional-fall-detection">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>SOS All-In-One 2 <br>+ Optional Fall Detection</h2>
                <div class="tabs-wrap">
                  <span>Most Popular</span>
                  <span>In Stock</span>
                </div>
                <p>This system is great for people who split time between home and outdoors. Fall detection can be added now or later, depending on their needs.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/sos-all-in-one-1-fall-detection.webp" alt="Image">
              </figure>
            </div>

            <div class="row sos-all-in-one-2-fall-detection-verify-coverage">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>SOS All-In-One 2 <br>+ Fall Detection (verify coverage)</h2>
                <div class="tabs-wrap">
                  <span>Most Popular</span>
                  <span>In Stock</span>
                </div>
                <p>This device offers flexible coverage for those who move between home and outside, with one simple wearable solution.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/sos-all-in-one-1-fall-detection.webp" alt="Image">
              </figure>
            </div>

            <div class="row sos-all-in-one-2-verify-coverage">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>SOS All-In-One 2 (verify coverage)</h2>
                <div class="tabs-wrap">
                  <span>Most Popular</span>
                  <span>In Stock</span>
                </div>
                <p>This device offers flexible coverage for those who move between home and outside, with one simple wearable solution.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/sos-all-in-one-2.webp" alt="Image">
              </figure>
            </div>

            <div class="row sos-all-in-one-2-optional-fall-detection-coverage-check">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>SOS All-In-One 2 (Optional Fall Detection, Coverage Check)</h2>
                <div class="tabs-wrap">
                  <span>Most Popular</span>
                  <span>In Stock</span>
                </div>
                <p>This system is great for people who split time between home and outdoors. Fall detection can be added now or later, depending on their needs.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/sos-all-in-one-1-fall-detection.webp" alt="Image">
              </figure>
            </div>

            <div class="row sos-micro-360-bundle">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>SOS Micro 360 Bundle <br>(Includes In-Home Cellular)</h2>
                <div class="tabs-wrap">
                  <span>Most Versatile</span>
                  <span>In Stock</span>
                </div>
                <p>Since the person spends most of their time away from home and lives alone, we recommend the SOS Micro 360 Bundle. It includes a mobile SOS Micro device, an in-home system for added protection while at home, automatic fall detection, and caregiver tools for complete peace of mind.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/sos-micro-360-bundle.webp" alt="Image">
              </figure>
            </div>

            <div class="row sos-micro-fall-detection">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>SOS Micro + Fall Detection</h2>
                <div class="tabs-wrap">
                  <span>Most Versatile</span>
                  <span>In Stock</span>
                </div>
                <p>For those who spend most of their time outside the home, the SOS Micro offers reliable mobile coverage and easy one-button help access.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/sos-micro-fall-detection.webp" alt="Image">
              </figure>
            </div>


            <div class="row sos-micro-360-bundle-in-home-cellular">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>SOS Micro 360 Bundle <br>(Includes In-Home Cellular)</h2>
                <div class="tabs-wrap">
                  <span>Most Versatile</span>
                  <span>In Stock</span>
                </div>
                <p>Since the person spends most of their time away from home and lives alone, we recommend the SOS Micro 360 Bundle. It includes a mobile SOS Micro device, an in-home system for added protection while at home, automatic fall detection, and caregiver tools for complete peace of mind.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/sos-micro-360-bundle.webp" alt="Image">
              </figure>
            </div>

            <div class="row sos-micro">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>SOS Micro</h2>
                <div class="tabs-wrap">
                  <span>Most Versatile</span>
                  <span>In Stock</span>
                </div>
                <p>For those who spend most of their time outside the home, the SOS Micro offers reliable mobile coverage and easy one-button help access.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/sos-micro.webp" alt="Image">
              </figure>
            </div>

            <div class="row sos-micro-fall-detection-update">
              <div class="article">
                <p class="subhead">We Recommend:</p>
                <h2>SOS Micro + Fall Detection</h2>
                <div class="tabs-wrap">
                  <span>Most Versatile</span>
                  <span>In Stock</span>
                </div>
                <p>Because the person is often out and about, the SOS Micro provides mobile protection in a compact, wearable form and with optional caregiver features.</p>
                <div class="btn-wrap">
                  <a class="btn" href="/pricing/">Buy Now</a>
                  <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
                </div>
                <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
              </div>
              <figure>
                <img src="<?php echo GET_TEMP ?>/img/product-quiz/sos-micro-fall-detection.webp" alt="Image">
              </figure>
            </div>

          </div>
        </div>
       
      </div>
    </div>
  </section>

  <section class="product-quiz--form-sec" id="free-quote-form">
    <div class="container">
      <div class="row">
        <div class="images-wrap">
          <div class="default-images">
            <img src="<?php echo GET_TEMP ?>/img/product-quiz/form-default-img1.webp" alt="Image">
            <img src="<?php echo GET_TEMP ?>/img/product-quiz/form-default-img2.webp" alt="Image">
          </div>
          <div class="all-in-one-images">
            <img src="<?php echo GET_TEMP ?>/img/product-quiz/all-in-one-img1.webp" alt="Image">
            <img src="<?php echo GET_TEMP ?>/img/product-quiz/all-in-one-img2.webp" alt="Image">
          </div>
          <div class="micro-images">
            <img src="<?php echo GET_TEMP ?>/img/product-quiz/micro-img1.webp" alt="Image">
            <img src="<?php echo GET_TEMP ?>/img/product-quiz/micro-img2.webp" alt="Image">
          </div>
        </div>

        <div class="right-col">
          <h2>Fill out the form below to receive a free quote*</h2>
          <div class="form-wrap">

            <?php $free_quote_nonce = wp_create_nonce( 'free_quote_nonce' ); ?>
            <form class="fquote-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
            <input hidden name="free_quote_nonce" value="<?php echo $free_quote_nonce; ?>">
            <input hidden name="free_quote_redirect" value="<?php the_field('form_redirect'); ?>">
            <input hidden id="referral_url" name="referral_url" size="20" type="text">
            <input hidden id="store_name" maxlength="40" name="store_name" type="text" value="Bay Alarm Medical">
            <?php if (!empty(get_field('form_notice_copy'))): ?>
              <input id="marketing_sms_opt_in" name="marketing_sms_opt_in" type="text" value="1" hidden>
            <?php endif; ?>

            <fieldset role="radiogroup" aria-labelledby="headerInquire">
              <div class="box-row">
                <legend>
                  <h3 id="headerInquire">Im Inquiring for:</h3>
                </legend>
                <div class="radio-box-wrap">
                  <div class="radio-box">
                    <input id="inquiring-1" maxlength="40" name="inquiring" type="radio" value="myself" required role="radio">
                    <label for="inquiring-1">Myself</label>
                  </div>
                  <div class="radio-box">
                    <input id="inquiring-2" maxlength="40" name="inquiring" type="radio" value="spouse" required role="radio">
                    <label for="inquiring-2">Spouse</label>
                  </div>
                  <div class="radio-box">
                    <input id="inquiring-3" maxlength="40" name="inquiring" type="radio" value="parent" required role="radio">
                    <label for="inquiring-3">Parent</label>
                  </div>
                  <div class="radio-box">
                    <input id="inquiring-5" maxlength="40" name="inquiring" type="radio" value="other" required role="radio">
                    <label for="inquiring-5">Other</label>
                  </div>
                </div>
              </div>
            </fieldset>

            <fieldset role="radiogroup" aria-labelledby="urgencyHeader">
              <div class="box-row">
                <legend>
                  <h3 id="urgencyHeader">
                    Im looking to start:      
                    </h3>
                </legend>
                <div class="radio-box-wrap">
                  <div class="radio-box">
                    <input id="urgency-1" maxlength="40" name="urgency" type="radio" value="As soon as possible" required role="radio">
                    <label for="urgency-1">As soon as possible</label>
                  </div>
                  <div class="radio-box">
                    <input id="urgency-2" maxlength="40" name="urgency" type="radio" value="within a week" required role="radio">
                    <label for="urgency-2">Within a week</label>
                  </div>
                  <div class="radio-box">
                    <input id="urgency-3" maxlength="40" name="urgency" type="radio" value="within a month" required role="radio">
                    <label for="urgency-3">Within a month</label>
                  </div>
                  <div class="radio-box">
                    <input id="urgency-4" maxlength="40" name="urgency" type="radio" value="just researching" required role="radio">
                    <label for="urgency-4">I'm just researching</label>
                  </div>
                </div>
              </div>
            </fieldset>

            <div class="input-col">
              <div class="two-col">
                <input  id="first_name" maxlength="40" name="first_name" aria-label="First Name" size="20" type="text" placeholder="First Name*" onfocus="this.placeholder=''" onblur="this.placeholder='First Name*'" required />
                <input  id="last_name" maxlength="40" name="last_name" size="20" type="text" placeholder="Last Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Last Name*'" required />
              </div>
              <input  id="email" maxlength="40" name="email" size="20" type="email" placeholder="Email*" onfocus="this.placeholder=''" onblur="this.placeholder='Email*'" required />
              <input  id="phone" maxlength="40" name="phone" size="20" type="tel" placeholder="Phone*" onfocus="this.placeholder=''" onblur="this.placeholder='Phone*'" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required />
              
            </div>

            <div class="bottom-wrap">
              <div class="notice">
                <?php the_field('form_notice_copy') ?>
              </div>
              <button type="submit" name="submit" id="quote-submit">Submit</button>
            </div>

            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>
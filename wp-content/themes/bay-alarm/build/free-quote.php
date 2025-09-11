<?php
  // Template Name: Free Quote
  update_option('current_page_template', 'free-quote-page');
  get_header();
  $path = basename($_SERVER['REQUEST_URI']);
  $show_promo_banner = get_field('show_promo_banner', 'option');
  $openStrWd = get_field('week_days_open_time');
  $open_tiem_wd_arr = explode(":",$openStrWd);
  $wdOpenTimeH = $open_tiem_wd_arr[0];
  $wdOpenTimeM = $open_tiem_wd_arr[1];
  $closeStrWd = get_field('week_days_close_time');
  $close_tiem_wd_arr = explode(":",$closeStrWd);
  $wdCloseTimeH = $close_tiem_wd_arr[0];
  $wdCloseTimeM = $close_tiem_wd_arr[1];
  $theDayOff = get_field('pick_the_days_off');

  $openStrWkd = get_field('weekend_open_time');
  $open_tiem_wkd_arr = explode(":",$openStrWkd);
  $wkdOpenTimeH = $open_tiem_wkd_arr[0];
  $wkdOpenTimeM = $open_tiem_wkd_arr[1];
  $closeStrWkd = get_field('weekend_close_time');
  $close_tiem_wkd_arr = explode(":",$closeStrWkd);
  $wkdCloseTimeH = $close_tiem_wkd_arr[0];
  $wkdCloseTimeM = $close_tiem_wkd_arr[1];


  date_default_timezone_set('America/Los_Angeles');
  $currentHour = date('H', time());
  $currentMin = date('i', time());
  $currentWeekDate   = date('w');

?>


<!-- TrustBox script -->
<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
<!-- End TrustBox script -->

<style>
  .free-quote--hero .col-l .call-btn {background-color: <?php the_field('call_button_background_color') ?>; color:<?php the_field('call_button_text_color') ?>; border: 2px solid <?php the_field('call_button_background_color') ?>; }
  .free-quote--hero .col-l .call-btn span {color:<?php the_field('call_button_text_color') ?>; transition: all .25s ease; }
  .free-quote--hero .col-l .call-btn:hover {background-color: <?php the_field('call_button_text_color') ?>; color:<?php the_field('call_button_background_color') ?>; border: 2px solid <?php the_field('call_button_background_color') ?>; }
  .free-quote--hero .col-l .call-btn:hover span { color:<?php the_field('call_button_background_color') ?>; }
</style>

<?php if (get_field('pick_hero_type')==='old-hero-no-show'): ?>

<section class="fquote-sec-wrap" style="background-image: url(<?php the_field('hero_image'); ?>)">
  <h1><?php the_field('hero_heading'); ?></h1>
  <div class="box-wrap"<?php if(get_field('box_background_color')){?>style="background-color: <?php echo get_field('box_background_color'); ?>"<?php } ?>>

    <div class="step-wrap">

      <article class="step-panel is-active">
        <p class="step-q"><?php the_field('step_1_text'); ?></p>
        <ul role="list">
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>myself</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>spouse</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>parent</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>friend</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>other</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
        </ul>
      </article>

      <article class="step-panel">
        <p class="step-q"><?php the_field('step_2_text'); ?></p>
        <ul role="list">
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>Inside the home</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>On the go</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>Both</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
        </ul>
      </article>

      <article class="step-panel">
        <p class="step-q"><?php the_field('step_3_text'); ?></p>
        <ul role="list">
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>As soon as possible</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>within a week</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>within a month</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li role="listitem" class="q-choice btn-outline blue" tabindex="0"><span>just researching</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
        </ul>
      </article>

      <article class="step-panel">
        <?php include 'inc/form-free-quote.php'; ?>
      </article>
    </div>

    <div class="back-wrap">
      <p class="back-btn" tabindex="0"><?php include 'inc/vectors/arrow.svg'; ?>Back</p>
    </div>

    <div class="fquote-steps-current">
      <div class="is-active"></div>
      <div></div>
      <div></div>
      <div></div>
    </div>

    <div class="bottom<?php echo ($path === 'get-started') ? ' gs-no-bg' : ''; ?>">
      <article class="col col-contact">
        <?php
          if ($path !== 'get-started'):
          $phoneNum = get_field("hero_call_button_number");
          $purePhoneNum = preg_replace('/[^0-9]/', '', $phoneNum);
        ?>

        <p><?php the_field('hero_call_button_text') ?></p>
        <span class="number"><a href="tel:<?php echo $purePhoneNum; ?>" class="promoNumber"><?php the_field('hero_call_button_number') ?></a></span>
        <?php endif; ?>

      </article>
    </div>
  </div>

</section>
<?php endif; ?>

<?php if ($theDayOff===$currentWeekDate): ?>
  <section class="night-home--hero">
    <img class="hero-img desktop-img" src="<?php the_field('night_hero_background'); ?>" alt="Home hero image">
    <img class="hero-img mobile-img" src="<?php the_field('night_hero_mobile_background'); ?>" alt="Home hero image">
    <div class="container">
      <div class="inner-container">
        <article>
          <h1><?php the_field('night_hero_title') ?></h1>
          <p><?php the_field('night_hero_copy') ?></p>
        </article>
      </div>
    </div>
  </section>

  <section class="night-form--hero-sec">
    <div class="container">
      <div class="row <?php if(empty(get_field('night_hero_countdown_title'))): echo 'no-countdown-sec'; endif; ?>">
        <div class="col-l is-active">
          <div class="l-inner-wrap">
          <?php if (get_field('night_hero_form_title')): ?>
            <h2><?php the_field('night_hero_form_title'); ?></h2>
          <?php endif; ?>
          <?php if (get_field('night_form_first_copy')): ?>
            <p class="first-copy"><?php the_field('night_form_first_copy'); ?></p>
          <?php endif; ?>
          <?php $free_quote_nonce = wp_create_nonce( 'free_quote_nonce' ); ?>
          <form class="fquote-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
            <input hidden name="free_quote_nonce" value="<?php echo $free_quote_nonce; ?>">
            <input hidden name="free_quote_redirect" value="<?php the_field('afterhours_thank_you_url'); ?>">
            <input hidden id="referral_url" name="referral_url" size="20" type="text">
            <input hidden id="store_name" maxlength="40" name="store_name" type="text" value="Bay Alarm Medical">
            <?php if (!empty(get_field('form_notice_copy'))): ?>
              <input id="marketing_sms_opt_in" name="marketing_sms_opt_in" type="text" value="1" hidden>
            <?php endif; ?>

            <div class="form-slices-wrap">

              <div class="raido-wrap">
              <div class="slice">
                <div class="col">
                  <fieldset role="radiogroup" aria-labelledby="headerInquire">
                    <legend>
                      <h3 id="headerInquire"><?php the_field('night_form_radio_header1'); ?></h3>
                    </legend>
                    <div class="raido-box-wrap">
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
                  </fieldset>
                </div>
              </div>

              <div class="slice">
                <div class="col">
                  <fieldset role="radiogroup" aria-labelledby="protectionHeader">
                    <legend>
                      <h3 id="protectionHeader"><?php the_field('night_form_radio_header2'); ?></h3>
                    </legend>
                    <div class="raido-box-wrap">
                      <div class="radio-box">
                        <input id="protection-1" maxlength="40" name="protection_for" type="radio" value="Inside the home" required role="radio">
                        <label for="protection-1">Inside the home</label>
                      </div>
                      <div class="radio-box">
                        <input id="protection-2" maxlength="40" name="protection_for" type="radio" value="On the go" required role="radio">
                        <label for="protection-2">On the go</label>
                      </div>
                      <div class="radio-box">
                        <input id="protection-3" maxlength="40" name="protection_for" type="radio" value="Both" required role="radio">
                        <label for="protection-3">Both home & mobile</label>
                      </div>
                      <div class="radio-box">
                        <input id="protection-4" maxlength="40" name="protection_for" type="radio" value="Not sure" required role="radio">
                        <label for="protection-4">Not sure</label>
                      </div>
                    </div>
                  </fieldset>
               </div>
              </div>

              <div class="slice">
                <div class="col">
                  <fieldset role="radiogroup" aria-labelledby="urgencyHeader">
                    <legend>
                      <h3 id="urgencyHeader"><?php the_field('night_form_radio_header3'); ?></h3>
                    </legend>
                    <div class="raido-box-wrap">
                      <div class="radio-box">
                        <input id="urgency-1" maxlength="40" name="urgency" type="radio" value="As soon as possible" required role="radio">
                        <label for="urgency-1">ASAP</label>
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
                        <label for="urgency-4">Just researching</label>
                      </div>
                    </div>
                  </fieldset>
               </div>
              </div>

              <div class="bottom-wrap">
                <div class="next-wrap">
                  <span class="btn next">Next</span>
                </div>
              </div>
            </div>

            <div class="second-wrap">
              <div class="back-wrap">
                <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.646446 3.64645C0.451184 3.84171 0.451184 4.15829 0.646446 4.35355L3.82843 7.53553C4.02369 7.7308 4.34027 7.7308 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.97631 4.7308 0.659728 4.53553 0.464465C4.34027 0.269203 4.02369 0.269203 3.82843 0.464465L0.646446 3.64645ZM13 3.5L1 3.5L1 4.5L13 4.5L13 3.5Z" fill="#595252"/>
                </svg>
                <span>
                  back
                </span>
              </div>
              <div class="slice-wrap">
                <legend>
                  <h3 id="urgencyHeader"><?php the_field('night_form_second_copy'); ?></h3>
                </legend>
                <div class="input-col">
                  <div class="two-col">
                    <input  id="first_name" maxlength="40" name="first_name" aria-label="First Name" size="20" type="text" placeholder="First Name*" onfocus="this.placeholder=''" onblur="this.placeholder='First Name*'" required />
                    <input  id="last_name" maxlength="40" name="last_name" size="20" type="text" placeholder="Last Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Last Name*'" required />
                  </div>
                  <input  id="phone" maxlength="40" name="phone" size="20" type="tel" placeholder="Phone*" onfocus="this.placeholder=''" onblur="this.placeholder='Phone*'" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required />
                  <input  id="email" maxlength="40" name="email" size="20" type="email" placeholder="Email*" onfocus="this.placeholder=''" onblur="this.placeholder='Email*'" required />
                </div>
                <div class="bottom-wrap">
                  <p><?php the_field('form_notice_copy') ?></p>
                  <div class="next-wrap">
                    <!-- <span class="btn back">Back</span> -->
                    <button type="submit" name="submit" id="quote-submit" class="btn">Submit</button>
                  </div>

                </div>
              </div>
            </div>

            </div>

          </form>

          </div>
        </div>
        <div class="col-r">
          <div class="cr-wrap">
            <img class="cr-img" src="<?php the_field('form_image'); ?>" alt="CR image">
            <div class="bottom-note">
              <?php the_field('form_image_note'); ?>
            </div>
          </div>

          <?php if (get_field('night_hero_countdown_title')): ?>
          <div class="hero-countdown-wrap">
            <div class="copy">
              <h3><?php the_field('night_hero_countdown_title') ?></h3>
              <p class="hidden-countdown-date"><?php the_field('night_hero_countdown_time') ?></p>
              <div class="countdown-wrap">
                <div class="box">
                  <p id="countdown-days">4</p>
                  <span>Days</span>
                </div>
                <div class="box">
                  <p id="countdown-hours">05</p>
                  <span>Hours</span>
                </div>
                <div class="box">
                  <p id="countdown-minutes">43</p>
                  <span>Minutes</span>
                </div>
                <div class="box">
                  <p id="countdown-seconds">33</p>
                  <span>Seconds</span>
                </div>
              </div>
              <?php if (get_field('night_hero_turn_on_call_btn')): ?>
              <div class="btn-wrap">
                <span class="number">
                  <a href="tel:18775229633" class="promoNumber btn call-btn">Call Now <span><?php the_field('hero_call_button_number') ?></span></a>
                </span>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>

        </div>
      </div>
      <div class="logos-wrap">
        <?php
          if( have_rows('hero_logos_list') ):
          while( have_rows('hero_logos_list') ): the_row();
        ?>

        <div class="image-wrap">
          <?php if (get_sub_field('link')): ?>
              <a target="_blank" rel="noopener noreferrer" href="<?php the_sub_field('link'); ?>">
              <img src="<?php the_sub_field('image'); ?>" alt="logo">
            </a>
          <?php else: ?>
            <img src="<?php the_sub_field('image'); ?>" alt="logo">
          <?php endif; ?>
        </div>
        <?php
          endwhile; endif;
        ?>
      </div>
    </div>
  </section>


<?php elseif($theDayOff=='weekend' && $currentWeekDate ==6 || $currentWeekDate ==7 ): ?>
  <section class="night-home--hero">
    <img class="hero-img desktop-img" src="<?php the_field('night_hero_background'); ?>" alt="Home hero image">
    <img class="hero-img mobile-img" src="<?php the_field('night_hero_mobile_background'); ?>" alt="Home hero image">
    <div class="container">
      <div class="inner-container">
        <article>
          <h1><?php the_field('night_hero_title') ?></h1>
          <p><?php the_field('night_hero_copy') ?></p>
        </article>
      </div>
    </div>
  </section>

  <section class="night-form--hero-sec">
    <div class="container">
      <div class="row <?php if(empty(get_field('night_hero_countdown_title'))): echo 'no-countdown-sec'; endif; ?>">
        <div class="col-l is-active">
          <div class="l-inner-wrap">
          <?php if (get_field('night_hero_form_title')): ?>
            <h2><?php the_field('night_hero_form_title'); ?></h2>
          <?php endif; ?>
          <?php if (get_field('night_form_first_copy')): ?>
            <p class="first-copy"><?php the_field('night_form_first_copy'); ?></p>
          <?php endif; ?>
          <?php $free_quote_nonce = wp_create_nonce( 'free_quote_nonce' ); ?>
          <form class="fquote-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
            <input hidden name="free_quote_nonce" value="<?php echo $free_quote_nonce; ?>">
            <input hidden name="free_quote_redirect" value="<?php the_field('afterhours_thank_you_url'); ?>">
            <input hidden id="referral_url" name="referral_url" size="20" type="text">
            <input hidden id="store_name" maxlength="40" name="store_name" type="text" value="Bay Alarm Medical">
            <?php if (!empty(get_field('form_notice_copy'))): ?>
              <input id="marketing_sms_opt_in" name="marketing_sms_opt_in" type="text" value="1" hidden>
            <?php endif; ?>

            <div class="form-slices-wrap">

              <div class="raido-wrap">
              <div class="slice">
                <div class="col">
                  <fieldset role="radiogroup" aria-labelledby="headerInquire">
                    <legend>
                      <h3 id="headerInquire"><?php the_field('night_form_radio_header1'); ?></h3>
                    </legend>
                    <div class="raido-box-wrap">
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
                  </fieldset>
                </div>
              </div>

              <div class="slice">
                <div class="col">
                  <fieldset role="radiogroup" aria-labelledby="protectionHeader">
                    <legend>
                      <h3 id="protectionHeader"><?php the_field('night_form_radio_header2'); ?></h3>
                    </legend>
                    <div class="raido-box-wrap">
                      <div class="radio-box">
                        <input id="protection-1" maxlength="40" name="protection_for" type="radio" value="Inside the home" required role="radio">
                        <label for="protection-1">Inside the home</label>
                      </div>
                      <div class="radio-box">
                        <input id="protection-2" maxlength="40" name="protection_for" type="radio" value="On the go" required role="radio">
                        <label for="protection-2">On the go</label>
                      </div>
                      <div class="radio-box">
                        <input id="protection-3" maxlength="40" name="protection_for" type="radio" value="Both" required role="radio">
                        <label for="protection-3">Both home & mobile</label>
                      </div>
                      <div class="radio-box">
                        <input id="protection-4" maxlength="40" name="protection_for" type="radio" value="Not sure" required role="radio">
                        <label for="protection-4">Not sure</label>
                      </div>
                    </div>
                  </fieldset>
               </div>
              </div>

              <div class="slice">
                <div class="col">
                  <fieldset role="radiogroup" aria-labelledby="urgencyHeader">
                    <legend>
                      <h3 id="urgencyHeader"><?php the_field('night_form_radio_header3'); ?></h3>
                    </legend>
                    <div class="raido-box-wrap">
                      <div class="radio-box">
                        <input id="urgency-1" maxlength="40" name="urgency" type="radio" value="As soon as possible" required role="radio">
                        <label for="urgency-1">ASAP</label>
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
                        <label for="urgency-4">Just researching</label>
                      </div>
                    </div>
                  </fieldset>
               </div>
              </div>

              <div class="bottom-wrap">
                <div class="next-wrap">
                  <span class="btn next">Next</span>
                </div>
              </div>
            </div>

            <div class="second-wrap">
              <div class="back-wrap">
                <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.646446 3.64645C0.451184 3.84171 0.451184 4.15829 0.646446 4.35355L3.82843 7.53553C4.02369 7.7308 4.34027 7.7308 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.97631 4.7308 0.659728 4.53553 0.464465C4.34027 0.269203 4.02369 0.269203 3.82843 0.464465L0.646446 3.64645ZM13 3.5L1 3.5L1 4.5L13 4.5L13 3.5Z" fill="#595252"/>
                </svg>
                <span>
                  back
                </span>
              </div>
              <div class="slice-wrap">
                <legend>
                  <h3 id="urgencyHeader"><?php the_field('night_form_second_copy'); ?></h3>
                </legend>
                <div class="input-col">
                  <div class="two-col">
                    <input  id="first_name" maxlength="40" name="first_name" aria-label="First Name" size="20" type="text" placeholder="First Name*" onfocus="this.placeholder=''" onblur="this.placeholder='First Name*'" required />
                    <input  id="last_name" maxlength="40" name="last_name" size="20" type="text" placeholder="Last Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Last Name*'" required />
                  </div>
                  <input  id="phone" maxlength="40" name="phone" size="20" type="tel" placeholder="Phone*" onfocus="this.placeholder=''" onblur="this.placeholder='Phone*'" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required />
                  <input  id="email" maxlength="40" name="email" size="20" type="email" placeholder="Email*" onfocus="this.placeholder=''" onblur="this.placeholder='Email*'" required />
                </div>
                <div class="bottom-wrap">
                  <p><?php the_field('form_notice_copy') ?></p>
                  <div class="next-wrap">
                    <!-- <span class="btn back">Back</span> -->
                    <button type="submit" name="submit" id="quote-submit" class="btn">Submit</button>
                  </div>

                </div>
              </div>
            </div>

            </div>

          </form>

          </div>
        </div>
        <div class="col-r">
          <div class="cr-wrap">
            <img class="cr-img" src="<?php the_field('form_image'); ?>" alt="CR image">
            <div class="bottom-note">
              <?php the_field('form_image_note'); ?>
            </div>
          </div>

          <?php if (get_field('night_hero_countdown_title')): ?>
          <div class="hero-countdown-wrap">
            <div class="copy">
              <h3><?php the_field('night_hero_countdown_title') ?></h3>
              <p class="hidden-countdown-date"><?php the_field('night_hero_countdown_time') ?></p>
              <div class="countdown-wrap">
                <div class="box">
                  <p id="countdown-days">4</p>
                  <span>Days</span>
                </div>
                <div class="box">
                  <p id="countdown-hours">05</p>
                  <span>Hours</span>
                </div>
                <div class="box">
                  <p id="countdown-minutes">43</p>
                  <span>Minutes</span>
                </div>
                <div class="box">
                  <p id="countdown-seconds">33</p>
                  <span>Seconds</span>
                </div>
              </div>
              <?php if (get_field('night_hero_turn_on_call_btn')): ?>
              <div class="btn-wrap">
                <span class="number">
                  <a href="tel:18775229633" class="promoNumber btn call-btn">Call Now <span><?php the_field('hero_call_button_number') ?></span></a>
                </span>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>

        </div>
      </div>
      <div class="logos-wrap">
        <?php
          if( have_rows('hero_logos_list') ):
          while( have_rows('hero_logos_list') ): the_row();
        ?>

        <div class="image-wrap">
          <?php if (get_sub_field('link')): ?>
            <a target="_blank" rel="noopener noreferrer" href="<?php the_sub_field('link'); ?>">
              <img src="<?php the_sub_field('image'); ?>" alt="logo">
            </a>
          <?php else: ?>
            <img src="<?php the_sub_field('image'); ?>" alt="logo">
          <?php endif; ?>
        </div>
        <?php
          endwhile; endif;
        ?>
      </div>
    </div>
  </section>

<?php else: ?>
<!-- Hero with form -->
<?php if ($currentWeekDate>= '1' && $currentWeekDate <= '5'): ?>

<?php if ($currentHour>= $wdOpenTimeH && $currentHour <= $wdCloseTimeH): ?>
  <?php if ($currentHour=== $wdCloseTimeH && $currentMin >= $wdCloseTimeM): ?>
    <section class="night-home--hero">
      <img class="hero-img desktop-img" src="<?php the_field('night_hero_background'); ?>" alt="Home hero image">
      <img class="hero-img mobile-img" src="<?php the_field('night_hero_mobile_background'); ?>" alt="Home hero image">
      <div class="container">
        <div class="inner-container">
          <article>
            <h1><?php the_field('night_hero_title') ?></h1>
            <p><?php the_field('night_hero_copy') ?></p>
          </article>
        </div>
      </div>
    </section>

    <section class="night-form--hero-sec">
      <div class="container">
        <div class="row <?php if(empty(get_field('night_hero_countdown_title'))): echo 'no-countdown-sec'; endif; ?>">
          <div class="col-l is-active">
            <div class="l-inner-wrap">
            <?php if (get_field('night_hero_form_title')): ?>
              <h2><?php the_field('night_hero_form_title'); ?></h2>
            <?php endif; ?>
            <?php if (get_field('night_form_first_copy')): ?>
              <p class="first-copy"><?php the_field('night_form_first_copy'); ?></p>
            <?php endif; ?>
            <?php $free_quote_nonce = wp_create_nonce( 'free_quote_nonce' ); ?>
            <form class="fquote-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
              <input hidden name="free_quote_nonce" value="<?php echo $free_quote_nonce; ?>">
              <input hidden name="free_quote_redirect" value="<?php the_field('afterhours_thank_you_url'); ?>">
              <input hidden id="referral_url" name="referral_url" size="20" type="text">
              <input hidden id="store_name" maxlength="40" name="store_name" type="text" value="Bay Alarm Medical">
              <?php if (!empty(get_field('form_notice_copy'))): ?>
                <input id="marketing_sms_opt_in" name="marketing_sms_opt_in" type="text" value="1" hidden>
              <?php endif; ?>

              <div class="form-slices-wrap">

                <div class="raido-wrap">
                <div class="slice">
                  <div class="col">
                    <fieldset role="radiogroup" aria-labelledby="headerInquire">
                      <legend>
                        <h3 id="headerInquire"><?php the_field('night_form_radio_header1'); ?></h3>
                      </legend>
                      <div class="raido-box-wrap">
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
                    </fieldset>
                  </div>
                </div>

                <div class="slice">
                  <div class="col">
                    <fieldset role="radiogroup" aria-labelledby="protectionHeader">
                      <legend>
                        <h3 id="protectionHeader"><?php the_field('night_form_radio_header2'); ?></h3>
                      </legend>
                      <div class="raido-box-wrap">
                        <div class="radio-box">
                          <input id="protection-1" maxlength="40" name="protection_for" type="radio" value="Inside the home" required role="radio">
                          <label for="protection-1">Inside the home</label>
                        </div>
                        <div class="radio-box">
                          <input id="protection-2" maxlength="40" name="protection_for" type="radio" value="On the go" required role="radio">
                          <label for="protection-2">On the go</label>
                        </div>
                        <div class="radio-box">
                          <input id="protection-3" maxlength="40" name="protection_for" type="radio" value="Both" required role="radio">
                          <label for="protection-3">Both home & mobile</label>
                        </div>
                        <div class="radio-box">
                          <input id="protection-4" maxlength="40" name="protection_for" type="radio" value="Not sure" required role="radio">
                          <label for="protection-4">Not sure</label>
                        </div>
                      </div>
                    </fieldset>
                 </div>
                </div>

                <div class="slice">
                  <div class="col">
                    <fieldset role="radiogroup" aria-labelledby="urgencyHeader">
                      <legend>
                        <h3 id="urgencyHeader"><?php the_field('night_form_radio_header3'); ?></h3>
                      </legend>
                      <div class="raido-box-wrap">
                        <div class="radio-box">
                          <input id="urgency-1" maxlength="40" name="urgency" type="radio" value="As soon as possible" required role="radio">
                          <label for="urgency-1">ASAP</label>
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
                          <label for="urgency-4">Just researching</label>
                        </div>
                      </div>
                    </fieldset>
                 </div>
                </div>

                <div class="bottom-wrap">
                  <div class="next-wrap">
                    <span class="btn next">Next</span>
                  </div>
                </div>
              </div>

              <div class="second-wrap">
                <div class="back-wrap">
                  <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0.646446 3.64645C0.451184 3.84171 0.451184 4.15829 0.646446 4.35355L3.82843 7.53553C4.02369 7.7308 4.34027 7.7308 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.97631 4.7308 0.659728 4.53553 0.464465C4.34027 0.269203 4.02369 0.269203 3.82843 0.464465L0.646446 3.64645ZM13 3.5L1 3.5L1 4.5L13 4.5L13 3.5Z" fill="#595252"/>
                  </svg>
                  <span>
                    back
                  </span>
                </div>
                <div class="slice-wrap">
                  <legend>
                    <h3 id="urgencyHeader"><?php the_field('night_form_second_copy'); ?></h3>
                  </legend>
                  <div class="input-col">
                    <div class="two-col">
                      <input  id="first_name" maxlength="40" name="first_name" aria-label="First Name" size="20" type="text" placeholder="First Name*" onfocus="this.placeholder=''" onblur="this.placeholder='First Name*'" required />
                      <input  id="last_name" maxlength="40" name="last_name" size="20" type="text" placeholder="Last Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Last Name*'" required />
                    </div>
                    <input  id="phone" maxlength="40" name="phone" size="20" type="tel" placeholder="Phone*" onfocus="this.placeholder=''" onblur="this.placeholder='Phone*'" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required />
                    <input  id="email" maxlength="40" name="email" size="20" type="email" placeholder="Email*" onfocus="this.placeholder=''" onblur="this.placeholder='Email*'" required />
                  </div>
                  <div class="bottom-wrap">
                    <p><?php the_field('form_notice_copy') ?></p>
                    <div class="next-wrap">
                      <!-- <span class="btn back">Back</span> -->
                      <button type="submit" name="submit" id="quote-submit" class="btn">Submit</button>
                    </div>

                  </div>
                </div>
              </div>

              </div>

            </form>

            </div>
          </div>
          <div class="col-r">
            <div class="cr-wrap">
              <img class="cr-img" src="<?php the_field('form_image'); ?>" alt="CR image">
              <div class="bottom-note">
                <?php the_field('form_image_note'); ?>
              </div>
            </div>

            <?php if (get_field('night_hero_countdown_title')): ?>
            <div class="hero-countdown-wrap">
              <div class="copy">
                <h3><?php the_field('night_hero_countdown_title') ?></h3>
                <p class="hidden-countdown-date"><?php the_field('night_hero_countdown_time') ?></p>
                <div class="countdown-wrap">
                  <div class="box">
                    <p id="countdown-days">4</p>
                    <span>Days</span>
                  </div>
                  <div class="box">
                    <p id="countdown-hours">05</p>
                    <span>Hours</span>
                  </div>
                  <div class="box">
                    <p id="countdown-minutes">43</p>
                    <span>Minutes</span>
                  </div>
                  <div class="box">
                    <p id="countdown-seconds">33</p>
                    <span>Seconds</span>
                  </div>
                </div>
                <?php if (get_field('night_hero_turn_on_call_btn')): ?>
                <div class="btn-wrap">
                  <span class="number">
                    <a href="tel:18775229633" class="promoNumber btn call-btn">Call Now <span><?php the_field('hero_call_button_number') ?></span></a>
                  </span>
                </div>
                <?php endif; ?>
              </div>
            </div>
            <?php endif; ?>

          </div>
        </div>
        <div class="logos-wrap">
          <?php
            if( have_rows('hero_logos_list') ):
            while( have_rows('hero_logos_list') ): the_row();
          ?>

          <div class="image-wrap">
            <?php if (get_sub_field('link')): ?>
                <a target="_blank" rel="noopener noreferrer" href="<?php the_sub_field('link'); ?>">
                <img src="<?php the_sub_field('image'); ?>" alt="logo">
              </a>
            <?php else: ?>
              <img src="<?php the_sub_field('image'); ?>" alt="logo">
            <?php endif; ?>
          </div>
          <?php
            endwhile; endif;
          ?>
        </div>
      </div>
    </section>
  <?php else: ?>
    <section class="free-quote--hero <?php if(get_field('day_time_form_showing_on_the_top')): echo 'day-time-form-top'; endif; ?>">
      <div class="container">
        <div class="row hero-row">
          <div class="col-l">
            <article>
              <h1><?php the_field('hero_title') ?></h1>
              <div class="copy-wrap">
                <div class="copy">
                  <?php the_field('hero_copy') ?>
                </div>
              </div>

              <div class="day-form-box">
                <span class="number">
                  <a href="tel:18775229633" class="promoNumber btn call-btn" tabindex="0">Call <span><?php the_field('hero_call_button_number') ?></span></a>
                </span>

                <?php

                $link = get_field('hero_second_button');

                if( $link ):
                	$button_url = $link['url'];
                	$link_title = $link['title'];
                	$link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                  <a class="btn second-btn" href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
                <div class="mobile-logos-box">
                  <?php if (get_field('day_form_hero_mobile_logo_url')): ?>
                  <a class="mobile-logos-wrap" href="<?php the_field('day_form_hero_mobile_logo_url'); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php the_field('day_form_hero_mobile_logo'); ?>" alt="logo">
                  </a>
                <?php else: ?>
                  <div class="free-quote-review-wrap">
                    <?php echo do_shortcode( '[brb_collection id="31259"]' ); ?>
                  </div>

                <?php endif; ?>
                </div>

              </div>

              <div class="logos-wrap desktop">
                <?php
                	if( have_rows('hero_logos_list') ):
                	while( have_rows('hero_logos_list') ): the_row();
                ?>

                <div class="image-wrap">
                  <?php if (get_sub_field('link')): ?>
                      <a target="_blank" rel="noopener noreferrer" href="<?php the_sub_field('link'); ?>">
                      <img src="<?php the_sub_field('image'); ?>" alt="logo">
                    </a>
                  <?php else: ?>
                    <img src="<?php the_sub_field('image'); ?>" alt="logo">
                  <?php endif; ?>
                </div>

                <?php
                	endwhile; endif;
                ?>

              </div>
            </article>
          </div>

          <?php if (get_field('day_time_form_showing_on_the_top')): ?>
            <div class="day-form-wrap">
              <article class="is-active">
                <div class="back-wrap">
                  <svg width="21" height="13" viewBox="0 0 21 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0.46967 5.96967C0.176777 6.26256 0.176777 6.73744 0.46967 7.03033L5.24264 11.8033C5.53553 12.0962 6.01041 12.0962 6.3033 11.8033C6.59619 11.5104 6.59619 11.0355 6.3033 10.7426L2.06066 6.5L6.3033 2.25736C6.59619 1.96447 6.59619 1.48959 6.3033 1.1967C6.01041 0.903807 5.53553 0.903807 5.24264 1.1967L0.46967 5.96967ZM21 5.75L1 5.75L1 7.25L21 7.25L21 5.75Z" fill="#595252"/>
                  </svg>
                  <span>
                    back
                  </span>
                </div>
                <?php if (get_field('form_intro')): ?>
                  <h2><?php the_field('form_intro'); ?></h2>
                <?php endif; ?>
                <?php if (get_field('form_radio_header')): ?>
                  <p class="first-copy"><?php the_field('form_radio_header'); ?></p>
                <?php endif; ?>
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
                  <div class="row">
                    <div class="radio-row">
                      <div class="col">
                        <fieldset role="radiogroup" aria-labelledby="headerInquire">
                          <div class="box-row">
                            <legend>
                              <h3 id="headerInquire"><?php the_field('form_radio_title1'); ?></h3>
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
                      </div>

                      <div class="col">
                        <fieldset role="radiogroup" aria-labelledby="protectionHeader">
                          <div class="box-row">
                            <legend>
                              <h3 id="protectionHeader"><?php the_field('form_radio_title2'); ?></h3>
                            </legend>
                            <div class="radio-box-wrap">
                              <div class="radio-box">
                                <input id="protection-1" maxlength="40" name="protection_for" type="radio" value="Inside the home" required role="radio">
                                <label for="protection-1">Inside the home</label>
                              </div>
                              <div class="radio-box">
                                <input id="protection-2" maxlength="40" name="protection_for" type="radio" value="On the go" required role="radio">
                                <label for="protection-2">On the go</label>
                              </div>
                              <div class="radio-box">
                                <input id="protection-3" maxlength="40" name="protection_for" type="radio" value="Both" required role="radio">
                                <label for="protection-3">Both home & mobile</label>
                              </div>
                              <div class="radio-box">
                                <input id="protection-4" maxlength="40" name="protection_for" type="radio" value="Not sure" required role="radio">
                                <label for="protection-4">Not sure</label>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>

                      <div class="col">
                        <fieldset role="radiogroup" aria-labelledby="urgencyHeader">
                          <div class="box-row">
                            <legend>
                              <h3 id="urgencyHeader"><?php the_field('form_radio_title3'); ?></h3>
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
                      </div>

                      <div class="bottom-wrap">
                        <div class="next-wrap">
                          <span class="next">Next</span>
                        </div>
                      </div>
                    </div>

                    <div class="second-wrap">
                      <?php if (get_field('form_title')): ?>
                        <h4><?php the_field('form_title'); ?></h4>
                      <?php endif; ?>
                      <div class="second-max-wrap">
                        <div class="input-col">
                          <div class="two-col">
                            <input  id="first_name" maxlength="40" name="first_name" aria-label="First Name" size="20" type="text" placeholder="First Name*" onfocus="this.placeholder=''" onblur="this.placeholder='First Name*'" required />
                            <input  id="last_name" maxlength="40" name="last_name" size="20" type="text" placeholder="Last Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Last Name*'" required />
                          </div>
                          <input  id="phone" maxlength="40" name="phone" size="20" type="tel" placeholder="Phone*" onfocus="this.placeholder=''" onblur="this.placeholder='Phone*'" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required />
                          <input  id="email" maxlength="40" name="email" size="20" type="email" placeholder="Email*" onfocus="this.placeholder=''" onblur="this.placeholder='Email*'" required />
                        </div>

                        <div class="bottom-wrap">
                          <p class="notice"><?php the_field('form_notice_copy') ?></p>
                          <button type="submit" name="submit" id="quote-submit">Submit form</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                </div>
              </article>
            </div>
          <?php else: ?>
          <div class="col-r">
            <div class="note">
              <?php the_field('form_image_note'); ?>
            </div>
            <img class="cr-img" src="<?php the_field('form_image'); ?>" alt="CR image">
          </div>
          <?php endif; ?>
        </div>
      </div>

      <?php if (get_field('day_time_form_showing_on_the_top')): ?>
        <div class="cr-consuemr--image-sec">
          <div class="container">
            <div class="inner-wrap">
              <h2><?php the_field('cr_consumer_title'); ?></h2>
              <div class="note">
                <?php the_field('form_image_note'); ?>
              </div>
              <img class="cr-img" src="<?php the_field('form_image'); ?>" alt="CR image">
            </div>
          </div>
        </div>
      <?php else: ?>
      <div class="cr-consumer--sec" id="consultation">
        <img class="cr-bg desktop-bg" src="<?php the_field('cr_desktop_background'); ?>" alt="Background image">
        <div class="container">
          <div class="row">

            <article class="is-active">
              <div class="back-wrap">
                <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.646446 3.64645C0.451184 3.84171 0.451184 4.15829 0.646446 4.35355L3.82843 7.53553C4.02369 7.7308 4.34027 7.7308 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.97631 4.7308 0.659728 4.53553 0.464465C4.34027 0.269203 4.02369 0.269203 3.82843 0.464465L0.646446 3.64645ZM13 3.5L1 3.5L1 4.5L13 4.5L13 3.5Z" fill="white"/>
                </svg>
                <span>
                  back
                </span>
              </div>
              <?php if (get_field('form_intro')): ?>
                <h2><?php the_field('form_intro'); ?></h2>
              <?php endif; ?>
              <?php if (get_field('form_radio_header')): ?>
                <p class="first-copy"><?php the_field('form_radio_header'); ?></p>
              <?php endif; ?>
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
                <div class="row">
                  <div class="radio-row">
                    <div class="col">
                      <fieldset role="radiogroup" aria-labelledby="headerInquire">
                        <div class="box-row">
                          <legend>
                            <h3 id="headerInquire"><?php the_field('form_radio_title1'); ?></h3>
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
                    </div>

                    <div class="col">
                      <fieldset role="radiogroup" aria-labelledby="protectionHeader">
                        <div class="box-row">
                          <legend>
                            <h3 id="protectionHeader"><?php the_field('form_radio_title2'); ?></h3>
                          </legend>
                          <div class="radio-box-wrap">
                            <div class="radio-box">
                              <input id="protection-1" maxlength="40" name="protection_for" type="radio" value="Inside the home" required role="radio">
                              <label for="protection-1">Inside the home</label>
                            </div>
                            <div class="radio-box">
                              <input id="protection-2" maxlength="40" name="protection_for" type="radio" value="On the go" required role="radio">
                              <label for="protection-2">On the go</label>
                            </div>
                            <div class="radio-box">
                              <input id="protection-3" maxlength="40" name="protection_for" type="radio" value="Both" required role="radio">
                              <label for="protection-3">Both home & mobile</label>
                            </div>
                            <div class="radio-box">
                              <input id="protection-4" maxlength="40" name="protection_for" type="radio" value="Not sure" required role="radio">
                              <label for="protection-4">Not sure</label>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                    </div>

                    <div class="col">
                      <fieldset role="radiogroup" aria-labelledby="urgencyHeader">
                        <div class="box-row">
                          <legend>
                            <h3 id="urgencyHeader"><?php the_field('form_radio_title3'); ?></h3>
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
                    </div>

                    <div class="bottom-wrap">
                      <div class="next-wrap">
                        <span class="next">Next</span>
                      </div>
                    </div>
                  </div>

                  <div class="second-wrap">
                    <?php if (get_field('form_title')): ?>
                      <h4><?php the_field('form_title'); ?></h4>
                    <?php endif; ?>
                    <div class="input-col">
                      <div class="two-col">
                        <input  id="first_name" maxlength="40" name="first_name" aria-label="First Name" size="20" type="text" placeholder="First Name*" onfocus="this.placeholder=''" onblur="this.placeholder='First Name*'" required />
                        <input  id="last_name" maxlength="40" name="last_name" size="20" type="text" placeholder="Last Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Last Name*'" required />
                      </div>
                      <input  id="phone" maxlength="40" name="phone" size="20" type="tel" placeholder="Phone*" onfocus="this.placeholder=''" onblur="this.placeholder='Phone*'" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required />
                      <input  id="email" maxlength="40" name="email" size="20" type="email" placeholder="Email*" onfocus="this.placeholder=''" onblur="this.placeholder='Email*'" required />
                    </div>

                    <div class="bottom-wrap">
                      <div class="notice">
                        <?php the_field('form_notice_copy') ?>
                      </div>
                      <button type="submit" name="submit" id="quote-submit">Submit form</button>
                    </div>
                  </div>
                </div>
              </form>
              </div>
            </article>
          </div>
        </div>
        <img class="mobile-bg" src="<?php the_field('cr_mobile_image'); ?>" alt="Background image">
      </div>
      <?php endif; ?>

      <?php if (get_field('turn_on_goods_block')): ?>

      <style>
        .home-products .products-grid .new-tab {background-color: <?php the_field('new_button_background') ?>; color:<?php the_field('new_button_text_color') ?>;}
      </style>

      <div class="home-products container">
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
                <?php if (get_sub_field('url')): ?>
                <a class="product-link" href="<?php the_sub_field("url") ?>">
                LEARN MORE
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="10" viewBox="0 0 18 10" fill="none">
                  <path d="M16.9596 5.45962C17.2135 5.20578 17.2135 4.79422 16.9596 4.54038L12.823 0.403806C12.5692 0.149965 12.1576 0.149965 11.9038 0.403806C11.65 0.657647 11.65 1.0692 11.9038 1.32304L15.5808 5L11.9038 8.67696C11.65 8.9308 11.65 9.34235 11.9038 9.59619C12.1576 9.85003 12.5692 9.85003 12.823 9.59619L16.9596 5.45962ZM0.5 5.65H16.5V4.35H0.5V5.65Z" fill="#2F5865"/>
                </svg>
              </a>
              <?php endif; ?>
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
      </div>
      <?php endif; ?>

      <div class="video--sec">
        <div class="row">
        <div class="col">
          <h2><?php the_field('hero_video_title') ?></h2>
          <p><?php the_field('hero_video_copy') ?></p>

          <?php
          $link = get_field('hero_video_button');

          if( $link ):
          	$link_url = $link['url'];
          	$link_title = $link['title'];
          	$link_target = $link['target'] ? $link['target'] : '_self';
          	?>
          <div class="btn-wrap">
            <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
          </div>
          <?php endif; ?>
        </div>

        <div class="col">
          <figure class="block-img video-modal-call" data-videosrc="<?php the_field('hero_video_url') ?>" style="background-image: url('<?php the_field('hero_video_image') ?>')" tabindex="0">
            <span class="play-icon"><?php include 'inc/vectors/play-icon.svg' ?></span>
          </figure>
        </div>
      </div>
      </div>
    </section>
  <?php endif; ?>


<?php else: ?>
  <section class="night-home--hero">
    <img class="hero-img desktop-img" src="<?php the_field('night_hero_background'); ?>" alt="Home hero image">
    <img class="hero-img mobile-img" src="<?php the_field('night_hero_mobile_background'); ?>" alt="Home hero image">
    <div class="container">
      <div class="inner-container">
        <article>
          <h1><?php the_field('night_hero_title') ?></h1>
          <p><?php the_field('night_hero_copy') ?></p>
        </article>
      </div>
    </div>
  </section>

  <section class="night-form--hero-sec">
    <div class="container">
      <div class="row <?php if(empty(get_field('night_hero_countdown_title'))): echo 'no-countdown-sec'; endif; ?>">
        <div class="col-l is-active">
          <div class="l-inner-wrap">
          <?php if (get_field('night_hero_form_title')): ?>
            <h2><?php the_field('night_hero_form_title'); ?></h2>
          <?php endif; ?>
          <?php if (get_field('night_form_first_copy')): ?>
            <p class="first-copy"><?php the_field('night_form_first_copy'); ?></p>
          <?php endif; ?>
          <?php $free_quote_nonce = wp_create_nonce( 'free_quote_nonce' ); ?>
          <form class="fquote-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
            <input hidden name="free_quote_nonce" value="<?php echo $free_quote_nonce; ?>">
            <input hidden name="free_quote_redirect" value="<?php the_field('afterhours_thank_you_url'); ?>">
            <input hidden id="referral_url" name="referral_url" size="20" type="text">
            <input hidden id="store_name" maxlength="40" name="store_name" type="text" value="Bay Alarm Medical">
            <?php if (!empty(get_field('form_notice_copy'))): ?>
              <input id="marketing_sms_opt_in" name="marketing_sms_opt_in" type="text" value="1" hidden>
            <?php endif; ?>

            <div class="form-slices-wrap">

              <div class="raido-wrap">
              <div class="slice">
                <div class="col">
                  <fieldset role="radiogroup" aria-labelledby="headerInquire">
                    <legend>
                      <h3 id="headerInquire"><?php the_field('night_form_radio_header1'); ?></h3>
                    </legend>
                    <div class="raido-box-wrap">
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
                  </fieldset>
                </div>
              </div>

              <div class="slice">
                <div class="col">
                  <fieldset role="radiogroup" aria-labelledby="protectionHeader">
                    <legend>
                      <h3 id="protectionHeader"><?php the_field('night_form_radio_header2'); ?></h3>
                    </legend>
                    <div class="raido-box-wrap">
                      <div class="radio-box">
                        <input id="protection-1" maxlength="40" name="protection_for" type="radio" value="Inside the home" required role="radio">
                        <label for="protection-1">Inside the home</label>
                      </div>
                      <div class="radio-box">
                        <input id="protection-2" maxlength="40" name="protection_for" type="radio" value="On the go" required role="radio">
                        <label for="protection-2">On the go</label>
                      </div>
                      <div class="radio-box">
                        <input id="protection-3" maxlength="40" name="protection_for" type="radio" value="Both" required role="radio">
                        <label for="protection-3">Both home & mobile</label>
                      </div>
                      <div class="radio-box">
                        <input id="protection-4" maxlength="40" name="protection_for" type="radio" value="Not sure" required role="radio">
                        <label for="protection-4">Not sure</label>
                      </div>
                    </div>
                  </fieldset>
               </div>
              </div>

              <div class="slice">
                <div class="col">
                  <fieldset role="radiogroup" aria-labelledby="urgencyHeader">
                    <legend>
                      <h3 id="urgencyHeader"><?php the_field('night_form_radio_header3'); ?></h3>
                    </legend>
                    <div class="raido-box-wrap">
                      <div class="radio-box">
                        <input id="urgency-1" maxlength="40" name="urgency" type="radio" value="As soon as possible" required role="radio">
                        <label for="urgency-1">ASAP</label>
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
                        <label for="urgency-4">Just researching</label>
                      </div>
                    </div>
                  </fieldset>
               </div>
              </div>

              <div class="bottom-wrap">
                <div class="next-wrap">
                  <span class="btn next">Next</span>
                </div>
              </div>
            </div>

            <div class="second-wrap">
              <div class="back-wrap">
                <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.646446 3.64645C0.451184 3.84171 0.451184 4.15829 0.646446 4.35355L3.82843 7.53553C4.02369 7.7308 4.34027 7.7308 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.97631 4.7308 0.659728 4.53553 0.464465C4.34027 0.269203 4.02369 0.269203 3.82843 0.464465L0.646446 3.64645ZM13 3.5L1 3.5L1 4.5L13 4.5L13 3.5Z" fill="#595252"/>
                </svg>
                <span>
                  back
                </span>
              </div>
              <div class="slice-wrap">
                <legend>
                  <h3 id="urgencyHeader"><?php the_field('night_form_second_copy'); ?></h3>
                </legend>
                <div class="input-col">
                  <div class="two-col">
                    <input  id="first_name" maxlength="40" name="first_name" aria-label="First Name" size="20" type="text" placeholder="First Name*" onfocus="this.placeholder=''" onblur="this.placeholder='First Name*'" required />
                    <input  id="last_name" maxlength="40" name="last_name" size="20" type="text" placeholder="Last Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Last Name*'" required />
                  </div>
                  <input  id="phone" maxlength="40" name="phone" size="20" type="tel" placeholder="Phone*" onfocus="this.placeholder=''" onblur="this.placeholder='Phone*'" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required />
                  <input  id="email" maxlength="40" name="email" size="20" type="email" placeholder="Email*" onfocus="this.placeholder=''" onblur="this.placeholder='Email*'" required />
                </div>
                <div class="bottom-wrap">
                  <p><?php the_field('form_notice_copy') ?></p>
                  <div class="next-wrap">
                    <!-- <span class="btn back">Back</span> -->
                    <button type="submit" name="submit" id="quote-submit" class="btn">Submit</button>
                  </div>

                </div>
              </div>
            </div>

            </div>

          </form>

          </div>
        </div>
        <div class="col-r">
          <div class="cr-wrap">
            <img class="cr-img" src="<?php the_field('form_image'); ?>" alt="CR image">
            <div class="bottom-note">
              <?php the_field('form_image_note'); ?>
            </div>
          </div>

          <?php if (get_field('night_hero_countdown_title')): ?>
          <div class="hero-countdown-wrap">
            <div class="copy">
              <h3><?php the_field('night_hero_countdown_title') ?></h3>
              <p class="hidden-countdown-date"><?php the_field('night_hero_countdown_time') ?></p>
              <div class="countdown-wrap">
                <div class="box">
                  <p id="countdown-days">4</p>
                  <span>Days</span>
                </div>
                <div class="box">
                  <p id="countdown-hours">05</p>
                  <span>Hours</span>
                </div>
                <div class="box">
                  <p id="countdown-minutes">43</p>
                  <span>Minutes</span>
                </div>
                <div class="box">
                  <p id="countdown-seconds">33</p>
                  <span>Seconds</span>
                </div>
              </div>
              <?php if (get_field('night_hero_turn_on_call_btn')): ?>
              <div class="btn-wrap">
                <span class="number">
                  <a href="tel:18775229633" class="promoNumber btn call-btn">Call Now <span><?php the_field('hero_call_button_number') ?></span></a>
                </span>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>

        </div>
      </div>

      <div class="logos-wrap">
        <?php
          if( have_rows('hero_logos_list') ):
          while( have_rows('hero_logos_list') ): the_row();
        ?>

        <div class="image-wrap">
          <?php if (get_sub_field('link')): ?>
              <a target="_blank" rel="noopener noreferrer" href="<?php the_sub_field('link'); ?>">
              <img src="<?php the_sub_field('image'); ?>" alt="logo">
            </a>
          <?php else: ?>
            <img src="<?php the_sub_field('image'); ?>" alt="logo">
          <?php endif; ?>
        </div>
        <?php
          endwhile; endif;
        ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php else: ?>
  <?php if ($currentHour>= $wkdOpenTimeH && $currentHour <= $wkdCloseTimeH ): ?>
    <?php if ($currentHour=== $wkdCloseTimeH && $currentMin >= $wkdCloseTimeM): ?>
      <section class="night-home--hero">
        <img class="hero-img desktop-img" src="<?php the_field('night_hero_background'); ?>" alt="Home hero image">
        <img class="hero-img mobile-img" src="<?php the_field('night_hero_mobile_background'); ?>" alt="Home hero image">
        <div class="container">
          <div class="inner-container">
            <article>
              <h1><?php the_field('night_hero_title') ?></h1>
              <p><?php the_field('night_hero_copy') ?></p>
            </article>
          </div>
        </div>
      </section>

      <section class="night-form--hero-sec">
        <div class="container">
          <div class="row <?php if(empty(get_field('night_hero_countdown_title'))): echo 'no-countdown-sec'; endif; ?>">
            <div class="col-l is-active">
              <div class="l-inner-wrap">
              <?php if (get_field('night_hero_form_title')): ?>
                <h2><?php the_field('night_hero_form_title'); ?></h2>
              <?php endif; ?>
              <?php if (get_field('night_form_first_copy')): ?>
                <p class="first-copy"><?php the_field('night_form_first_copy'); ?></p>
              <?php endif; ?>
              <?php $free_quote_nonce = wp_create_nonce( 'free_quote_nonce' ); ?>
              <form class="fquote-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
                <input hidden name="free_quote_nonce" value="<?php echo $free_quote_nonce; ?>">
                <input hidden name="free_quote_redirect" value="<?php the_field('afterhours_thank_you_url'); ?>">
                <input hidden id="referral_url" name="referral_url" size="20" type="text">
                <input hidden id="store_name" maxlength="40" name="store_name" type="text" value="Bay Alarm Medical">
                <?php if (!empty(get_field('form_notice_copy'))): ?>
                  <input id="marketing_sms_opt_in" name="marketing_sms_opt_in" type="text" value="1" hidden>
                <?php endif; ?>

                <div class="form-slices-wrap">

                  <div class="raido-wrap">
                  <div class="slice">
                    <div class="col">
                      <fieldset role="radiogroup" aria-labelledby="headerInquire">
                        <legend>
                          <h3 id="headerInquire"><?php the_field('night_form_radio_header1'); ?></h3>
                        </legend>
                        <div class="raido-box-wrap">
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
                      </fieldset>
                    </div>
                  </div>

                  <div class="slice">
                    <div class="col">
                      <fieldset role="radiogroup" aria-labelledby="protectionHeader">
                        <legend>
                          <h3 id="protectionHeader"><?php the_field('night_form_radio_header2'); ?></h3>
                        </legend>
                        <div class="raido-box-wrap">
                          <div class="radio-box">
                            <input id="protection-1" maxlength="40" name="protection_for" type="radio" value="Inside the home" required role="radio">
                            <label for="protection-1">Inside the home</label>
                          </div>
                          <div class="radio-box">
                            <input id="protection-2" maxlength="40" name="protection_for" type="radio" value="On the go" required role="radio">
                            <label for="protection-2">On the go</label>
                          </div>
                          <div class="radio-box">
                            <input id="protection-3" maxlength="40" name="protection_for" type="radio" value="Both" required role="radio">
                            <label for="protection-3">Both home & mobile</label>
                          </div>
                          <div class="radio-box">
                            <input id="protection-4" maxlength="40" name="protection_for" type="radio" value="Not sure" required role="radio">
                            <label for="protection-4">Not sure</label>
                          </div>
                        </div>
                      </fieldset>
                   </div>
                  </div>

                  <div class="slice">
                    <div class="col">
                      <fieldset role="radiogroup" aria-labelledby="urgencyHeader">
                        <legend>
                          <h3 id="urgencyHeader"><?php the_field('night_form_radio_header3'); ?></h3>
                        </legend>
                        <div class="raido-box-wrap">
                          <div class="radio-box">
                            <input id="urgency-1" maxlength="40" name="urgency" type="radio" value="As soon as possible" required role="radio">
                            <label for="urgency-1">ASAP</label>
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
                            <label for="urgency-4">Just researching</label>
                          </div>
                        </div>
                      </fieldset>
                   </div>
                  </div>

                  <div class="bottom-wrap">
                    <div class="next-wrap">
                      <span class="btn next">Next</span>
                    </div>
                  </div>
                </div>

                <div class="second-wrap">
                  <div class="back-wrap">
                    <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.646446 3.64645C0.451184 3.84171 0.451184 4.15829 0.646446 4.35355L3.82843 7.53553C4.02369 7.7308 4.34027 7.7308 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.97631 4.7308 0.659728 4.53553 0.464465C4.34027 0.269203 4.02369 0.269203 3.82843 0.464465L0.646446 3.64645ZM13 3.5L1 3.5L1 4.5L13 4.5L13 3.5Z" fill="#595252"/>
                    </svg>
                    <span>
                      back
                    </span>
                  </div>
                  <div class="slice-wrap">
                    <legend>
                      <h3 id="urgencyHeader"><?php the_field('night_form_second_copy'); ?></h3>
                    </legend>
                    <div class="input-col">
                      <div class="two-col">
                        <input  id="first_name" maxlength="40" name="first_name" aria-label="First Name" size="20" type="text" placeholder="First Name*" onfocus="this.placeholder=''" onblur="this.placeholder='First Name*'" required />
                        <input  id="last_name" maxlength="40" name="last_name" size="20" type="text" placeholder="Last Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Last Name*'" required />
                      </div>
                      <input  id="phone" maxlength="40" name="phone" size="20" type="tel" placeholder="Phone*" onfocus="this.placeholder=''" onblur="this.placeholder='Phone*'" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required />
                      <input  id="email" maxlength="40" name="email" size="20" type="email" placeholder="Email*" onfocus="this.placeholder=''" onblur="this.placeholder='Email*'" required />
                    </div>
                    <div class="bottom-wrap">
                      <p><?php the_field('form_notice_copy') ?></p>
                      <div class="next-wrap">
                        <!-- <span class="btn back">Back</span> -->
                        <button type="submit" name="submit" id="quote-submit" class="btn">Submit</button>
                      </div>

                    </div>
                  </div>
                </div>

                </div>

              </form>

              </div>
            </div>
            <div class="col-r">
              <div class="cr-wrap">
                <img class="cr-img" src="<?php the_field('form_image'); ?>" alt="CR image">
                <div class="bottom-note">
                  <?php the_field('form_image_note'); ?>
                </div>
              </div>

              <?php if (get_field('night_hero_countdown_title')): ?>
              <div class="hero-countdown-wrap">
                <div class="copy">
                  <h3><?php the_field('night_hero_countdown_title') ?></h3>
                  <p class="hidden-countdown-date"><?php the_field('night_hero_countdown_time') ?></p>
                  <div class="countdown-wrap">
                    <div class="box">
                      <p id="countdown-days">4</p>
                      <span>Days</span>
                    </div>
                    <div class="box">
                      <p id="countdown-hours">05</p>
                      <span>Hours</span>
                    </div>
                    <div class="box">
                      <p id="countdown-minutes">43</p>
                      <span>Minutes</span>
                    </div>
                    <div class="box">
                      <p id="countdown-seconds">33</p>
                      <span>Seconds</span>
                    </div>
                  </div>
                  <?php if (get_field('night_hero_turn_on_call_btn')): ?>
                  <div class="btn-wrap">
                    <span class="number">
                      <a href="tel:18775229633" class="promoNumber btn call-btn">Call Now <span><?php the_field('hero_call_button_number') ?></span></a>
                    </span>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
              <?php endif; ?>

            </div>
          </div>
          <div class="logos-wrap">
            <?php
              if( have_rows('hero_logos_list') ):
              while( have_rows('hero_logos_list') ): the_row();
            ?>

            <div class="image-wrap">
              <?php if (get_sub_field('link')): ?>
                  <a target="_blank" rel="noopener noreferrer" href="<?php the_sub_field('link'); ?>">
                  <img src="<?php the_sub_field('image'); ?>" alt="logo">
                </a>
              <?php else: ?>
                <img src="<?php the_sub_field('image'); ?>" alt="logo">
              <?php endif; ?>
            </div>
            <?php
              endwhile; endif;
            ?>

          </div>
        </div>
      </section>

    <?php else: ?>
      <section class="free-quote--hero <?php if(get_field('day_time_form_showing_on_the_top')): echo 'day-time-form-top'; endif; ?>">
        <div class="container">
          <div class="row hero-row">
            <div class="col-l">
              <article>
                <h1><?php the_field('hero_title') ?></h1>
                <div class="copy-wrap">
                  <div class="copy">
                    <?php the_field('hero_copy') ?>
                  </div>
                </div>

                <div class="day-form-box">
                  <span class="number">
                    <a href="tel:18775229633" class="promoNumber btn call-btn" tabindex="0">Call <span><?php the_field('hero_call_button_number') ?></span></a>
                  </span>

                  <?php

                  $link = get_field('hero_second_button');

                  if( $link ):
                  	$link_url = $link['url'];
                  	$link_title = $link['title'];
                  	$link_target = $link['target'] ? $link['target'] : '_self';
                  ?>
                    <a class="btn second-btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                  <?php endif; ?>
                  <div class="mobile-logos-box">
                    <?php if (get_field('day_form_hero_mobile_logo_url')): ?>
                    <a class="mobile-logos-wrap" href="<?php the_field('day_form_hero_mobile_logo_url'); ?>" target="_blank" rel="noopener noreferrer">
                      <img src="<?php the_field('day_form_hero_mobile_logo'); ?>" alt="logo">
                    </a>
                  <?php else: ?>
                    <div class="free-quote-review-wrap">
                      <?php echo do_shortcode( '[brb_collection id="31259"]' ); ?>
                    </div>

                  <?php endif; ?>
                  </div>

                </div>

                <div class="logos-wrap desktop">
                  <?php
                  	if( have_rows('hero_logos_list') ):
                  	while( have_rows('hero_logos_list') ): the_row();
                  ?>

                  <div class="image-wrap">
                    <?php if (get_sub_field('link')): ?>
                        <a target="_blank" rel="noopener noreferrer" href="<?php the_sub_field('link'); ?>">
                        <img src="<?php the_sub_field('image'); ?>" alt="logo">
                      </a>
                    <?php else: ?>
                      <img src="<?php the_sub_field('image'); ?>" alt="logo">
                    <?php endif; ?>
                  </div>

                  <?php
                  	endwhile; endif;
                  ?>

                </div>
              </article>
            </div>

            <?php if (get_field('day_time_form_showing_on_the_top')): ?>
              <div class="day-form-wrap">
                <article class="is-active">
                  <div class="back-wrap">
                    <svg width="21" height="13" viewBox="0 0 21 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.46967 5.96967C0.176777 6.26256 0.176777 6.73744 0.46967 7.03033L5.24264 11.8033C5.53553 12.0962 6.01041 12.0962 6.3033 11.8033C6.59619 11.5104 6.59619 11.0355 6.3033 10.7426L2.06066 6.5L6.3033 2.25736C6.59619 1.96447 6.59619 1.48959 6.3033 1.1967C6.01041 0.903807 5.53553 0.903807 5.24264 1.1967L0.46967 5.96967ZM21 5.75L1 5.75L1 7.25L21 7.25L21 5.75Z" fill="#595252"/>
                    </svg>
                    <span>
                      back
                    </span>
                  </div>
                  <?php if (get_field('form_intro')): ?>
                    <h2><?php the_field('form_intro'); ?></h2>
                  <?php endif; ?>
                  <?php if (get_field('form_radio_header')): ?>
                    <p class="first-copy"><?php the_field('form_radio_header'); ?></p>
                  <?php endif; ?>
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
                    <div class="row">
                      <div class="radio-row">
                        <div class="col">
                          <fieldset role="radiogroup" aria-labelledby="headerInquire">
                            <div class="box-row">
                              <legend>
                                <h3 id="headerInquire"><?php the_field('form_radio_title1'); ?></h3>
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
                        </div>

                        <div class="col">
                          <fieldset role="radiogroup" aria-labelledby="protectionHeader">
                            <div class="box-row">
                              <legend>
                                <h3 id="protectionHeader"><?php the_field('form_radio_title2'); ?></h3>
                              </legend>
                              <div class="radio-box-wrap">
                                <div class="radio-box">
                                  <input id="protection-1" maxlength="40" name="protection_for" type="radio" value="Inside the home" required role="radio">
                                  <label for="protection-1">Inside the home</label>
                                </div>
                                <div class="radio-box">
                                  <input id="protection-2" maxlength="40" name="protection_for" type="radio" value="On the go" required role="radio">
                                  <label for="protection-2">On the go</label>
                                </div>
                                <div class="radio-box">
                                  <input id="protection-3" maxlength="40" name="protection_for" type="radio" value="Both" required role="radio">
                                  <label for="protection-3">Both home & mobile</label>
                                </div>
                                <div class="radio-box">
                                  <input id="protection-4" maxlength="40" name="protection_for" type="radio" value="Not sure" required role="radio">
                                  <label for="protection-4">Not sure</label>
                                </div>
                              </div>
                            </div>
                          </fieldset>
                        </div>

                        <div class="col">
                          <fieldset role="radiogroup" aria-labelledby="urgencyHeader">
                            <div class="box-row">
                              <legend>
                                <h3 id="urgencyHeader"><?php the_field('form_radio_title3'); ?></h3>
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
                        </div>

                        <div class="bottom-wrap">
                          <div class="next-wrap">
                            <span class="next">Next</span>
                          </div>
                        </div>
                      </div>

                      <div class="second-wrap">
                        <?php if (get_field('form_title')): ?>
                          <h4><?php the_field('form_title'); ?></h4>
                        <?php endif; ?>
                        <div class="second-max-wrap">
                          <div class="input-col">
                            <div class="two-col">
                              <input  id="first_name" maxlength="40" name="first_name" aria-label="First Name" size="20" type="text" placeholder="First Name*" onfocus="this.placeholder=''" onblur="this.placeholder='First Name*'" required />
                              <input  id="last_name" maxlength="40" name="last_name" size="20" type="text" placeholder="Last Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Last Name*'" required />
                            </div>
                            <input  id="phone" maxlength="40" name="phone" size="20" type="tel" placeholder="Phone*" onfocus="this.placeholder=''" onblur="this.placeholder='Phone*'" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required />
                            <input  id="email" maxlength="40" name="email" size="20" type="email" placeholder="Email*" onfocus="this.placeholder=''" onblur="this.placeholder='Email*'" required />
                          </div>

                          <div class="bottom-wrap">
                            <p class="notice"><?php the_field('form_notice_copy') ?></p>
                            <button type="submit" name="submit" id="quote-submit">Submit form</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  </div>
                </article>
              </div>
            <?php else: ?>
            <div class="col-r">
              <div class="note">
                <?php the_field('form_image_note'); ?>
              </div>
              <img class="cr-img" src="<?php the_field('form_image'); ?>" alt="CR image">
            </div>
            <?php endif; ?>
          </div>
        </div>

        <?php if (get_field('day_time_form_showing_on_the_top')): ?>
          <div class="cr-consuemr--image-sec">
            <div class="container">
              <div class="inner-wrap">
                <h2><?php the_field('cr_consumer_title'); ?></h2>
                <div class="note">
                  <?php the_field('form_image_note'); ?>
                </div>
                <img class="cr-img" src="<?php the_field('form_image'); ?>" alt="CR image">
              </div>
            </div>
          </div>
        <?php else: ?>
        <div class="cr-consumer--sec" id="consultation">
          <img class="cr-bg desktop-bg" src="<?php the_field('cr_desktop_background'); ?>" alt="Background image">
          <div class="container">
            <div class="row">

              <article class="is-active">
                <div class="back-wrap">
                  <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0.646446 3.64645C0.451184 3.84171 0.451184 4.15829 0.646446 4.35355L3.82843 7.53553C4.02369 7.7308 4.34027 7.7308 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.97631 4.7308 0.659728 4.53553 0.464465C4.34027 0.269203 4.02369 0.269203 3.82843 0.464465L0.646446 3.64645ZM13 3.5L1 3.5L1 4.5L13 4.5L13 3.5Z" fill="white"/>
                  </svg>
                  <span>
                    back
                  </span>
                </div>
                <?php if (get_field('form_intro')): ?>
                  <h2><?php the_field('form_intro'); ?></h2>
                <?php endif; ?>
                <?php if (get_field('form_radio_header')): ?>
                  <p class="first-copy"><?php the_field('form_radio_header'); ?></p>
                <?php endif; ?>
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
                  <div class="row">
                    <div class="radio-row">
                      <div class="col">
                        <fieldset role="radiogroup" aria-labelledby="headerInquire">
                          <div class="box-row">
                            <legend>
                              <h3 id="headerInquire"><?php the_field('form_radio_title1'); ?></h3>
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
                      </div>

                      <div class="col">
                        <fieldset role="radiogroup" aria-labelledby="protectionHeader">
                          <div class="box-row">
                            <legend>
                              <h3 id="protectionHeader"><?php the_field('form_radio_title2'); ?></h3>
                            </legend>
                            <div class="radio-box-wrap">
                              <div class="radio-box">
                                <input id="protection-1" maxlength="40" name="protection_for" type="radio" value="Inside the home" required role="radio">
                                <label for="protection-1">Inside the home</label>
                              </div>
                              <div class="radio-box">
                                <input id="protection-2" maxlength="40" name="protection_for" type="radio" value="On the go" required role="radio">
                                <label for="protection-2">On the go</label>
                              </div>
                              <div class="radio-box">
                                <input id="protection-3" maxlength="40" name="protection_for" type="radio" value="Both" required role="radio">
                                <label for="protection-3">Both home & mobile</label>
                              </div>
                              <div class="radio-box">
                                <input id="protection-4" maxlength="40" name="protection_for" type="radio" value="Not sure" required role="radio">
                                <label for="protection-4">Not sure</label>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>

                      <div class="col">
                        <fieldset role="radiogroup" aria-labelledby="urgencyHeader">
                          <div class="box-row">
                            <legend>
                              <h3 id="urgencyHeader"><?php the_field('form_radio_title3'); ?></h3>
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
                      </div>

                      <div class="bottom-wrap">
                        <div class="next-wrap">
                          <span class="next">Next</span>
                        </div>
                      </div>
                    </div>

                    <div class="second-wrap">
                      <?php if (get_field('form_title')): ?>
                        <h4><?php the_field('form_title'); ?></h4>
                      <?php endif; ?>
                      <div class="input-col">
                        <div class="two-col">
                          <input  id="first_name" maxlength="40" name="first_name" aria-label="First Name" size="20" type="text" placeholder="First Name*" onfocus="this.placeholder=''" onblur="this.placeholder='First Name*'" required />
                          <input  id="last_name" maxlength="40" name="last_name" size="20" type="text" placeholder="Last Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Last Name*'" required />
                        </div>
                        <input  id="phone" maxlength="40" name="phone" size="20" type="tel" placeholder="Phone*" onfocus="this.placeholder=''" onblur="this.placeholder='Phone*'" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required />
                        <input  id="email" maxlength="40" name="email" size="20" type="email" placeholder="Email*" onfocus="this.placeholder=''" onblur="this.placeholder='Email*'" required />
                      </div>

                      <div class="bottom-wrap">
                        <div class="notice">
                          <?php the_field('form_notice_copy') ?>
                        </div>
                        <button type="submit" name="submit" id="quote-submit">Submit form</button>
                      </div>
                    </div>
                  </div>
                </form>
                </div>
              </article>
            </div>
          </div>
          <img class="mobile-bg" src="<?php the_field('cr_mobile_image'); ?>" alt="Background image">
        </div>
        <?php endif; ?>

        <?php if (get_field('turn_on_goods_block')): ?>

        <style>
          .home-products .products-grid .new-tab {background-color: <?php the_field('new_button_background') ?>; color:<?php the_field('new_button_text_color') ?>;}
        </style>

        <div class="home-products container">
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
                  <?php if (get_sub_field('url')): ?>
                  <a class="product-link" href="<?php the_sub_field("url") ?>">
                  LEARN MORE
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="10" viewBox="0 0 18 10" fill="none">
                    <path d="M16.9596 5.45962C17.2135 5.20578 17.2135 4.79422 16.9596 4.54038L12.823 0.403806C12.5692 0.149965 12.1576 0.149965 11.9038 0.403806C11.65 0.657647 11.65 1.0692 11.9038 1.32304L15.5808 5L11.9038 8.67696C11.65 8.9308 11.65 9.34235 11.9038 9.59619C12.1576 9.85003 12.5692 9.85003 12.823 9.59619L16.9596 5.45962ZM0.5 5.65H16.5V4.35H0.5V5.65Z" fill="#2F5865"/>
                  </svg>
                </a>
                <?php endif; ?>
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
        </div>
        <?php endif; ?>

        <div class="video--sec">
          <div class="row">
          <div class="col">
            <h2><?php the_field('hero_video_title') ?></h2>
            <p><?php the_field('hero_video_copy') ?></p>

            <?php
            $link = get_field('hero_video_button');

            if( $link ):
            	$link_url = $link['url'];
            	$link_title = $link['title'];
            	$link_target = $link['target'] ? $link['target'] : '_self';
            	?>
            <div class="btn-wrap">
              <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            </div>
            <?php endif; ?>
          </div>

          <div class="col">
            <figure class="block-img video-modal-call" data-videosrc="<?php the_field('hero_video_url') ?>" style="background-image: url('<?php the_field('hero_video_image') ?>')" tabindex="0">
              <span class="play-icon"><?php include 'inc/vectors/play-icon.svg' ?></span>
            </figure>
          </div>
        </div>
        </div>
      </section>
    <?php endif; ?>

  <?php else: ?>
    <section class="night-home--hero">
      <img class="hero-img desktop-img" src="<?php the_field('night_hero_background'); ?>" alt="Home hero image">
      <img class="hero-img mobile-img" src="<?php the_field('night_hero_mobile_background'); ?>" alt="Home hero image">
      <div class="container">
        <div class="inner-container">
          <article>
            <h1><?php the_field('night_hero_title') ?></h1>
            <p><?php the_field('night_hero_copy') ?></p>
          </article>
        </div>
      </div>
    </section>

    <section class="night-form--hero-sec">
      <div class="container">
        <div class="row <?php if(empty(get_field('night_hero_countdown_title'))): echo 'no-countdown-sec'; endif; ?>">
          <div class="col-l is-active">
            <div class="l-inner-wrap">
            <?php if (get_field('night_hero_form_title')): ?>
              <h2><?php the_field('night_hero_form_title'); ?></h2>
            <?php endif; ?>
            <?php if (get_field('night_form_first_copy')): ?>
              <p class="first-copy"><?php the_field('night_form_first_copy'); ?></p>
            <?php endif; ?>
            <?php $free_quote_nonce = wp_create_nonce( 'free_quote_nonce' ); ?>
            <form class="fquote-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
              <input hidden name="free_quote_nonce" value="<?php echo $free_quote_nonce; ?>">
              <input hidden name="free_quote_redirect" value="<?php the_field('afterhours_thank_you_url'); ?>">
              <input hidden id="referral_url" name="referral_url" size="20" type="text">
              <input hidden id="store_name" maxlength="40" name="store_name" type="text" value="Bay Alarm Medical">
              <?php if (!empty(get_field('form_notice_copy'))): ?>
                <input id="marketing_sms_opt_in" name="marketing_sms_opt_in" type="text" value="1" hidden>
              <?php endif; ?>

              <div class="form-slices-wrap">

                <div class="raido-wrap">
                <div class="slice">
                  <div class="col">
                    <fieldset role="radiogroup" aria-labelledby="headerInquire">
                      <legend>
                        <h3 id="headerInquire"><?php the_field('night_form_radio_header1'); ?></h3>
                      </legend>
                      <div class="raido-box-wrap">
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
                    </fieldset>
                  </div>
                </div>

                <div class="slice">
                  <div class="col">
                    <fieldset role="radiogroup" aria-labelledby="protectionHeader">
                      <legend>
                        <h3 id="protectionHeader"><?php the_field('night_form_radio_header2'); ?></h3>
                      </legend>
                      <div class="raido-box-wrap">
                        <div class="radio-box">
                          <input id="protection-1" maxlength="40" name="protection_for" type="radio" value="Inside the home" required role="radio">
                          <label for="protection-1">Inside the home</label>
                        </div>
                        <div class="radio-box">
                          <input id="protection-2" maxlength="40" name="protection_for" type="radio" value="On the go" required role="radio">
                          <label for="protection-2">On the go</label>
                        </div>
                        <div class="radio-box">
                          <input id="protection-3" maxlength="40" name="protection_for" type="radio" value="Both" required role="radio">
                          <label for="protection-3">Both home & mobile</label>
                        </div>
                        <div class="radio-box">
                          <input id="protection-4" maxlength="40" name="protection_for" type="radio" value="Not sure" required role="radio">
                          <label for="protection-4">Not sure</label>
                        </div>
                      </div>
                    </fieldset>
                 </div>
                </div>

                <div class="slice">
                  <div class="col">
                    <fieldset role="radiogroup" aria-labelledby="urgencyHeader">
                      <legend>
                        <h3 id="urgencyHeader"><?php the_field('night_form_radio_header3'); ?></h3>
                      </legend>
                      <div class="raido-box-wrap">
                        <div class="radio-box">
                          <input id="urgency-1" maxlength="40" name="urgency" type="radio" value="As soon as possible" required role="radio">
                          <label for="urgency-1">ASAP</label>
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
                          <label for="urgency-4">Just researching</label>
                        </div>
                      </div>
                    </fieldset>
                 </div>
                </div>

                <div class="bottom-wrap">
                  <div class="next-wrap">
                    <span class="btn next">Next</span>
                  </div>
                </div>
              </div>

              <div class="second-wrap">
                <div class="back-wrap">
                  <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0.646446 3.64645C0.451184 3.84171 0.451184 4.15829 0.646446 4.35355L3.82843 7.53553C4.02369 7.7308 4.34027 7.7308 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.97631 4.7308 0.659728 4.53553 0.464465C4.34027 0.269203 4.02369 0.269203 3.82843 0.464465L0.646446 3.64645ZM13 3.5L1 3.5L1 4.5L13 4.5L13 3.5Z" fill="#595252"/>
                  </svg>
                  <span>
                    back
                  </span>
                </div>
                <div class="slice-wrap">
                  <legend>
                    <h3 id="urgencyHeader"><?php the_field('night_form_second_copy'); ?></h3>
                  </legend>
                  <div class="input-col">
                    <div class="two-col">
                      <input  id="first_name" maxlength="40" name="first_name" aria-label="First Name" size="20" type="text" placeholder="First Name*" onfocus="this.placeholder=''" onblur="this.placeholder='First Name*'" required />
                      <input  id="last_name" maxlength="40" name="last_name" size="20" type="text" placeholder="Last Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Last Name*'" required />
                    </div>
                    <input  id="phone" maxlength="40" name="phone" size="20" type="tel" placeholder="Phone*" onfocus="this.placeholder=''" onblur="this.placeholder='Phone*'" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required />
                    <input  id="email" maxlength="40" name="email" size="20" type="email" placeholder="Email*" onfocus="this.placeholder=''" onblur="this.placeholder='Email*'" required />
                  </div>
                  <div class="bottom-wrap">
                    <p><?php the_field('form_notice_copy') ?></p>
                    <div class="next-wrap">
                      <!-- <span class="btn back">Back</span> -->
                      <button type="submit" name="submit" id="quote-submit" class="btn">Submit</button>
                    </div>

                  </div>
                </div>
              </div>

              </div>

            </form>

            </div>
          </div>
          <div class="col-r">
            <div class="cr-wrap">
              <img class="cr-img" src="<?php the_field('form_image'); ?>" alt="CR image">
              <div class="bottom-note">
                <?php the_field('form_image_note'); ?>
              </div>
            </div>

            <?php if (get_field('night_hero_countdown_title')): ?>
            <div class="hero-countdown-wrap">
              <div class="copy">
                <h3><?php the_field('night_hero_countdown_title') ?></h3>
                <p class="hidden-countdown-date"><?php the_field('night_hero_countdown_time') ?></p>
                <div class="countdown-wrap">
                  <div class="box">
                    <p id="countdown-days">4</p>
                    <span>Days</span>
                  </div>
                  <div class="box">
                    <p id="countdown-hours">05</p>
                    <span>Hours</span>
                  </div>
                  <div class="box">
                    <p id="countdown-minutes">43</p>
                    <span>Minutes</span>
                  </div>
                  <div class="box">
                    <p id="countdown-seconds">33</p>
                    <span>Seconds</span>
                  </div>
                </div>
                <?php if (get_field('night_hero_turn_on_call_btn')): ?>
                <div class="btn-wrap">
                  <span class="number">
                    <a href="tel:18775229633" class="promoNumber btn call-btn">Call Now <span><?php the_field('hero_call_button_number') ?></span></a>
                  </span>
                </div>
                <?php endif; ?>
              </div>
            </div>
            <?php endif; ?>

          </div>
        </div>
        <div class="logos-wrap">
          <?php
            if( have_rows('hero_logos_list') ):
            while( have_rows('hero_logos_list') ): the_row();
          ?>

          <div class="image-wrap">
            <?php if (get_sub_field('link')): ?>
                <a target="_blank" rel="noopener noreferrer" href="<?php the_sub_field('link'); ?>">
                <img src="<?php the_sub_field('image'); ?>" alt="logo">
              </a>
            <?php else: ?>
              <img src="<?php the_sub_field('image'); ?>" alt="logo">
            <?php endif; ?>
          </div>
          <?php
            endwhile; endif;
          ?>
        </div>
      </div>
    </section>

  <?php endif; ?>

<?php endif; ?>
<?php endif; ?>


<section class="home-testimonials">
  <article class="heading-wrap">
    <h3 class="heading"><?php the_field("testmonials_heading") ?></h3>
    <p class="intro-copy"><?php the_field("testmonials_subtext") ?></p>
  </article>

  <article class="home-testimonials-slider">

    <?php
      if( have_rows('testimonials') ):
      while( have_rows('testimonials') ): the_row();
    ?>

    <?php
      if ( get_sub_field("type") == "company" ) :
    ?>
    <div class="h-t-block is-image">
      <a url="javascript:void(0)" class="block-img" style="background-image: url(<?php the_sub_field("image") ?>);" aria-describedby="companyQuote">
      </a>
      <div class="block-text-wrap">
        <p class="quote small-quote" id="companyQuote"><?php the_sub_field("copy") ?></p>
      </div>
    </div>

    <?php
      elseif ( get_sub_field("type") == "video" ) :
    ?>

    <div class="h-t-block is-video">
      <a url="javascript:void(0)" class="block-img video-modal-call" data-videosrc="<?php the_sub_field("video_url") ?>" style="background-image: url(<?php the_sub_field("video_image") ?>);" aria-describedby="videoQuote">
        <span class="play-icon"><?php include 'inc/vectors/play-icon.svg' ?></span>
      </a>
      <div class="block-text-wrap">
        <p class="quote big-quote" id="videoQuote">
          <?php the_sub_field("copy") ?>
        </p>
        <p class="author-credit"><?php the_sub_field("author") ?></p>
      </div>
    </div>

    <?php
      elseif ( get_sub_field("type") == "rating" ) :
    ?>

    <div class="h-t-block is-rated">
      <div class="block-text-wrap">
        <ul class="star-rating" role="list">
          <li role="listitem"><?php include 'inc/vectors/star.svg' ?></li>
          <li role="listitem"><?php include 'inc/vectors/star.svg' ?></li>
          <li role="listitem"><?php include 'inc/vectors/star.svg' ?></li>
          <li role="listitem"><?php include 'inc/vectors/star.svg' ?></li>
          <li role="listitem"><?php include 'inc/vectors/star.svg' ?></li>
        </ul>
        <p class="quote small-quote"><?php the_sub_field("copy") ?></p>
        <p class="author-credit"><?php the_sub_field("author") ?></p>
      </div>
    </div>
    <?php endif; ?>
    <?php endwhile; endif; ?>

  </article>
</section>

 <?php if (get_field('turn_on_rating_section')==='on'): ?>
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

    <article class="col <?php echo get_field('which_way_to_display_logos'); ?>">
      <div class="img-wrap">
        <?php
          $n = 1;
          if ( have_rows('review_image_grid') ):
          while ( have_rows('review_image_grid') ): the_row();

        ?>
          <div class="img <?php if($n===1): echo 'is-active'; endif; ?>" style="background-image: url(<?php the_sub_field('image') ?>);"></div>
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
 <?php endif; ?>

<section class="google-reviews-wrap">
  <div class="google-reviews top">
    <?php echo do_shortcode( '[brb_collection id="31258"]' ); ?>
  </div>
  <div class="google-reviews small-top">
    <?php echo do_shortcode( '[brb_collection id="31257"]' ); ?>
  </div>
</section>


<?php get_footer(); ?>

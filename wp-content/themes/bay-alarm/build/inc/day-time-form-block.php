 <section class="free-quote--hero <?php if(get_field('day_time_form_showing_on_the_top')): echo 'day-time-form-top'; endif; ?>">
      <div class="container">
        <div class="row hero-row">
          <div class="col-l">
            <article>
              <img class="top-logo" src="<?php the_field('day_time_form_subhead_image'); ?>" alt="logo">
              <h1><?php the_field('hero_title') ?></h1>
              <div class="copy-wrap">
                <div class="copy">
                  <?php the_field('hero_copy') ?>
                </div>
              </div>

              <div class="day-form-box">
                <span class="number">
                  <a href="tel:18775229633" class="promoNumber btn call-btn" tabindex="0"><span><?php the_field('hero_call_button_number') ?></span></a>
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

          <div class="col-r hero-image-wrap">
            <img class="cr-img" src="<?php the_field('form_image'); ?>" alt="CR image">
            <div class="hero-img-bg"></div>
          </div>
         
        </div>
      </div>


      <div class="cr-consumer--sec" id="consultation">

        <div class="container">
          <div class="row">
            <div class="form-img-box">
               <img src="<?php the_field('cr_form_image'); ?>" alt="Background image">
            </div>
            <article class="is-active">
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
                    <div class="slice is-active">
                      <div class="col">
                        <fieldset role="radiogroup" aria-labelledby="headerInquire">
                          <div class="box-row">
                            <legend>
                              <h3 id="headerInquire">
                              <?php the_field('form_radio_title1'); ?>
                                </h3>
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

                        <div class="bottom-wrap">
                          <div class="next-wrap">
                            <span class="next">Next</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="slice">
                      <div class="col">
                        <fieldset role="radiogroup" aria-labelledby="protectionHeader">
                          <div class="box-row">
                            <legend>
                              <h3 id="protectionHeader">
                                <span class="back-btn"> 
                                <svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1256 1.12728C10.7473 1.74986 10.7473 2.75927 10.1256 3.38185L4.50249 9.01328L10.1256 14.6447C10.7473 15.2673 10.7473 16.2767 10.1256 16.8993C9.50396 17.5219 8.49604 17.5219 7.87438 16.8993L-3.58498e-07 9.01328L7.87438 1.12728C8.49604 0.504701 9.50396 0.504701 10.1256 1.12728Z" fill="#3C3A42"/>
                                </svg>
                              </span>
                              <?php the_field('form_radio_title2'); ?>
                                </h3>
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
                        <div class="bottom-wrap">
                          <div class="next-wrap">
                            <span class="next">Next</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="slice">
                      <div class="col">
                        <fieldset role="radiogroup" aria-labelledby="urgencyHeader">
                          <div class="box-row">
                            <legend>
                              <h3 id="urgencyHeader">
                                <span class="back-btn"> 
                                <svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1256 1.12728C10.7473 1.74986 10.7473 2.75927 10.1256 3.38185L4.50249 9.01328L10.1256 14.6447C10.7473 15.2673 10.7473 16.2767 10.1256 16.8993C9.50396 17.5219 8.49604 17.5219 7.87438 16.8993L-3.58498e-07 9.01328L7.87438 1.12728C8.49604 0.504701 9.50396 0.504701 10.1256 1.12728Z" fill="#3C3A42"/>
                                </svg>
                              </span>
                                <?php the_field('form_radio_title3'); ?>        
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

                        <div class="form-bottom-wrap">
                          <div class="next-wrap">
                            <span class="next">Next</span>
                          </div>
                        </div>
                      </div>
                  </div>
                    
                  </div>

                  <div class="second-wrap">
                    <?php if (get_field('form_title')): ?>
                      <h4>
                        <span class="back-wrap back-btn"> 
                          <svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1256 1.12728C10.7473 1.74986 10.7473 2.75927 10.1256 3.38185L4.50249 9.01328L10.1256 14.6447C10.7473 15.2673 10.7473 16.2767 10.1256 16.8993C9.50396 17.5219 8.49604 17.5219 7.87438 16.8993L-3.58498e-07 9.01328L7.87438 1.12728C8.49604 0.504701 9.50396 0.504701 10.1256 1.12728Z" fill="#3C3A42"/>
                          </svg>
                        </span>
                        <?php the_field('form_title'); ?>
                      </h4>
                    <?php endif; ?>
                    <div class="input-col">
                      <div class="two-col">
                        <input  id="first_name" maxlength="40" name="first_name" aria-label="First Name" size="20" type="text" placeholder="First Name*" onfocus="this.placeholder=''" onblur="this.placeholder='First Name*'" required />
                        <input  id="last_name" maxlength="40" name="last_name" size="20" type="text" placeholder="Last Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Last Name*'" required />
                      </div>
                      <input  id="phone" maxlength="40" name="phone" size="20" type="tel" placeholder="Phone*" onfocus="this.placeholder=''" onblur="this.placeholder='Phone*'" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required />
                      <input  id="email" maxlength="40" name="email" size="20" type="email" placeholder="Email*" onfocus="this.placeholder=''" onblur="this.placeholder='Email*'" required />
                    </div>

                    <div class="bottom-wrap">
                      <div class="notice">
                        <?php the_field('form_notice_copy') ?>
                      </div>
                      <button type="submit" name="submit" id="quote-submit">Submit</button>
                    </div>
                  </div>
                </div>
              </form>
              </div>
            </article>
          </div>
        </div>

      </div>
     


      <?php if (get_field('turn_on_goods_block')): ?>
      <section class="hiw--devices-sec">
        <div class="container">
          <div class="inner-max-container">
            <div class="cards-wrap">
              <?php
                if( have_rows('goods_list') ):
                while( have_rows('goods_list') ): the_row();
              ?>
              <div class="card">
                <figure>
                  <img src="<?php the_sub_field('product_image'); ?>" alt="Card Image">
                </figure>
                <article>
                  <h3><?php the_sub_field('product_name'); ?></h3>
                  <p><?php the_sub_field('price'); ?></p>
                </article>
              </div>
              <?php
                endwhile; endif;
              ?>
            </div>
          </div>
        </div>
      </section>
      <?php endif; ?>

      <div class="video--sec">
        <div class="row">
        <div class="col text-wrap">
          <h2><?php the_field('hero_video_title') ?></h2>
          <p><?php the_field('hero_video_copy') ?></p>
   
          <a class="btn video-modal-call" data-videosrc="<?php the_field('hero_video_url') ?>">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14 26.2524C7.23451 26.2524 1.75 20.7679 1.75 14.0024C1.75 7.23695 7.23451 1.75244 14 1.75244C20.7655 1.75244 26.25 7.23695 26.25 14.0024C26.25 20.7679 20.7655 26.2524 14 26.2524ZM14 28.0024C21.732 28.0024 28 21.7344 28 14.0024C28 6.27046 21.732 0.00244141 14 0.00244141C6.26801 0.00244141 0 6.27046 0 14.0024C0 21.7344 6.26801 28.0024 14 28.0024Z" fill="white"/>
            <path d="M10.9746 8.84942C11.2661 8.69944 11.6169 8.72492 11.8836 8.91543L18.0086 13.2904C18.2385 13.4547 18.375 13.7199 18.375 14.0024C18.375 14.285 18.2385 14.5502 18.0086 14.7145L11.8836 19.0895C11.6169 19.28 11.2661 19.3054 10.9746 19.1555C10.6832 19.0055 10.5 18.7052 10.5 18.3774V9.62745C10.5 9.29968 10.6832 8.9994 10.9746 8.84942Z" fill="white"/>
            </svg>
            Watch Video
          </a>
        
        </div>

        <div class="col img-wrap">
          <figure class="block-img video-modal-call" data-videosrc="<?php the_field('hero_video_url') ?>" style="background-image: url('<?php the_field('hero_video_image') ?>')" tabindex="0">
            <span class="play-icon">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 36.2 36.2" enable-background="new 0 0 36.2 36.2" xml:space="preserve">
              <circle fill="none" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" cx="18.1" cy="18.1" r="17.3"/>
              <polygon points="26.2,18.1 12.6,8.9 12.6,27.3 "/>
              </svg>
            </span>
          </figure>
        </div>
      </div>
      </div>
    </section>
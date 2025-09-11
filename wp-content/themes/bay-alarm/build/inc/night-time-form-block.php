

    <section class="night-form--hero free-quote--hero">
      <div class="cr-consumer--sec" id="consultation">

        <div class="container">
          <div class="row">
            <div class="form-img-box">
               <img src="<?php the_field('night_hero_background'); ?>" alt="Background image">
            </div>
            <article class="is-active">
              <?php if (get_field('night_hero_title')): ?>
                <h2><?php the_field('night_hero_title'); ?></h2>
              <?php endif; ?>
              <?php if (get_field('night_hero_copy')): ?>
                <p class="first-copy"><?php the_field('night_hero_copy'); ?></p>
              <?php endif; ?>
              <div class="form-wrap">
                <?php $free_quote_nonce = wp_create_nonce( 'free_quote_nonce' ); ?>
                <form class="fquote-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
               <input hidden name="action" value="free_quote_submission">
               <input hidden name="free_quote_nonce" value="<?php echo $free_quote_nonce; ?>">
               <input hidden name="free_quote_redirect" value="<?php the_field('afterhours_thank_you_url'); ?>">
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

    </section>
<?php
  // Template Name: Senior Living
  update_option('current_page_template', 'senior-living');
  get_header();
?>

  <section class="senior-living--hero">
    <div class="container">
      <div class="row">
        <div class="col-l">
          <article>
            <h1><?php the_field('hero_title'); ?></h1>
            <p><?php the_field('hero_copy'); ?></p>
          </article>
        </div>
        <figure>
          <img class="hero-img" src="<?php the_field("hero_image"); ?>">
        </figure>
      </div>
    </div>
  </section>


  <section class="new-home--logo-block">
    <div class="container">
      <h2><?php the_field('logos_title'); ?></h2>
      <div class="logo-wrap">
        <?php
          if( have_rows('logos_list') ):
          while( have_rows('logos_list') ): the_row();
        ?>
          <div class="logo-box">
            <img class="logo" src="<?php the_sub_field('logo'); ?>" alt="Logo">
          </div>
        <?php
          endwhile; endif;
        ?>
      </div>
    </div>
  </section>

  <section class="senior-living--form">
    <div class="container">
      <div class="row" id="living-form">
        <div class="column col-l">
          <img  src="<?php the_field('form_image'); ?>" alt="Image">
        </div>
        <div class="column col-r">
          <div class="form-wrap">
              <?php $free_quote_nonce = wp_create_nonce( 'free_quote_nonce' ); ?>
              <form class="fquote-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
              <input hidden name="free_quote_nonce" value="<?php echo $free_quote_nonce; ?>">
              <input hidden name="free_quote_redirect" value="<?php the_field('form_redirect'); ?>">
              <input hidden id="referral_url" name="referral_url" size="20" type="text">
              <input hidden id="store_name" maxlength="40" name="store_name" type="text" value="Bay Alarm Medical">
              <input hidden id="contact_method" maxlength="40" name="contact_method" type="text" value="partner_web_form" />
              <?php if (!empty(get_field('form_notice_copy'))): ?>
                <input id="marketing_sms_opt_in" name="marketing_sms_opt_in" type="text" value="1" hidden>
              <?php endif; ?>
              <div class="row">
                <div class="radio-row">
                  <div class="slice is-active">
                    <div class="step-wrap">
                      <span class="is-active">Step 1</span>
                      <span>Step 2</span>
                      <span>Step 3</span>
                      <span>Step 4</span>
                    </div>
                    <div class="col">
                      <fieldset role="radiogroup" aria-labelledby="headerCommunityType">
                        <div class="box-row">
                          <legend>
                            <h3 id="headerCommunityType">
                            What community type are you looking for a new solution for?
                              </h3>
                          </legend>
                          <div class="radio-box-wrap">
                            <div class="radio-box">
                              <input id="community-type-1" maxlength="40" name="community_type" type="radio" value="Independent" required role="radio">
                              <label for="community-type-1">Independent</label>
                            </div>
                            <div class="radio-box">
                              <input id="community_type-2" maxlength="40" name="community_type" type="radio" value="Assisted Living" required role="radio">
                              <label for="community-type-2">Assisted Living</label>
                            </div>
                            <div class="radio-box">
                              <input id="community_type-3" maxlength="40" name="community_type" type="radio" value="HUD/Section 202 & 811 Housing" required role="radio">
                              <label for="community-type-3">HUD/Section 202 & 811 Housing</label>
                            </div>
                            <div class="radio-box">
                              <input id="community_type-5" maxlength="40" name="community_type" type="radio" value="Other or multiple" required role="radio">
                              <label for="community-type-5">Other or multiple</label>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      <div class="note">
                        <?php the_field('form_notice_copy') ?>
                      </div>
                    </div>
                  </div>

                  <div class="slice">
                    <div class="step-wrap">
                      <span class="is-active">Step 1</span>
                      <span class="is-active">Step 2</span>
                      <span>Step 3</span>
                      <span>Step 4</span>
                    </div>
                    <div class="col">
                      <fieldset role="radiogroup" aria-labelledby="headerResidentCount">
                        <div class="box-row">
                          <legend>
                            <h3 id="headerResidentCount">
                              <span class="back-btn"> 
                              <svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1256 1.12728C10.7473 1.74986 10.7473 2.75927 10.1256 3.38185L4.50249 9.01328L10.1256 14.6447C10.7473 15.2673 10.7473 16.2767 10.1256 16.8993C9.50396 17.5219 8.49604 17.5219 7.87438 16.8993L-3.58498e-07 9.01328L7.87438 1.12728C8.49604 0.504701 9.50396 0.504701 10.1256 1.12728Z" fill="#3C3A42"/>
                              </svg>
                            </span>
                            How many residents are in your community?
                              </h3>
                          </legend>
                          <div class="radio-box-wrap">
                            <div class="radio-box">
                              <input id="res-count-1" maxlength="40" name="resident_count" type="radio" value="Less Than 50" required role="radio">
                              <label for="res-count-1">Less Than 50</label>
                            </div>
                            <div class="radio-box">
                              <input id="res-count-2" maxlength="40" name="resident_count" type="radio" value="51 to 100" required role="radio">
                              <label for="res-count-2">51 to 100</label>
                            </div>
                            <div class="radio-box">
                              <input id="res-count-3" maxlength="40" name="resident_count" type="radio" value="101 to 200" required role="radio">
                              <label for="res-count-3">101 to 200</label>
                            </div>
                            <div class="radio-box">
                              <input id="res-count-4" maxlength="40" name="resident_count" type="radio" value="Over 200" required role="radio">
                              <label for="res-count-4">Over 200</label>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      <div class="note">
                        <?php the_field('form_notice_copy') ?>
                      </div>
                    </div>
                  </div>

                  <div class="slice">
                    <div class="step-wrap">
                      <span class="is-active">Step 1</span>
                      <span class="is-active">Step 2</span>
                      <span class="is-active">Step 3</span>
                      <span>Step 4</span>
                    </div>
                    <div class="col">
                      <fieldset role="radiogroup" aria-labelledby="headerMainObjective">
                        <div class="box-row">
                          <legend>
                            <h3 id="headerMainObjective">
                              <span class="back-btn"> 
                              <svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1256 1.12728C10.7473 1.74986 10.7473 2.75927 10.1256 3.38185L4.50249 9.01328L10.1256 14.6447C10.7473 15.2673 10.7473 16.2767 10.1256 16.8993C9.50396 17.5219 8.49604 17.5219 7.87438 16.8993L-3.58498e-07 9.01328L7.87438 1.12728C8.49604 0.504701 9.50396 0.504701 10.1256 1.12728Z" fill="#3C3A42"/>
                              </svg>
                            </span>
                              What do you need help with?        
                              </h3>
                          </legend>
                          <div class="radio-box-wrap">
                            <div class="radio-box">
                              <input id="main-objective-1" maxlength="40" name="main_objective" type="radio" value="Updating for compliance" required role="radio">
                              <label for="main-objective-1">Updating for compliance</label>
                            </div>
                            <div class="radio-box">
                              <input id="main-objective-2" maxlength="40" name="main_objective" type="radio" value="Enhancing resident safety" required role="radio">
                              <label for="main-objective-2">Enhancing resident safety</label>
                            </div>
                            <div class="radio-box">
                              <input id="main-objective-3" maxlength="40" name="main_objective" type="radio" value="Improving operational efficiency" required role="radio">
                              <label for="main-objective-3">Improving operational efficiency</label>
                            </div>
                            <div class="radio-box">
                              <input id="main-objective-4" maxlength="40" name="main_objective" type="radio" value="Boosting staff productivity" required role="radio">
                              <label for="main-objective-4">Boosting staff productivity</label>
                            </div>
                          </div>
                        </div>
                      </fieldset>

                      <div class="note">
                        <?php the_field('form_notice_copy') ?>
                      </div>
                    </div>
                </div>


                <div class="slice">
                    <div class="step-wrap">
                      <span class="is-active">Step 1</span>
                      <span class="is-active">Step 2</span>
                      <span class="is-active">Step 3</span>
                      <span>Step 4</span>
                    </div>
                    <div class="col">
                     <h3>
                      <span class="back-btn"> 
                      <svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1256 1.12728C10.7473 1.74986 10.7473 2.75927 10.1256 3.38185L4.50249 9.01328L10.1256 14.6447C10.7473 15.2673 10.7473 16.2767 10.1256 16.8993C9.50396 17.5219 8.49604 17.5219 7.87438 16.8993L-3.58498e-07 9.01328L7.87438 1.12728C8.49604 0.504701 9.50396 0.504701 10.1256 1.12728Z" fill="#3C3A42"/>
                      </svg>
                    </span>
                      Tell us about yourself!      
                      </h3>
                      <div class="input-col">
                        <div class="two-col">
                          <input  id="first_name" maxlength="40" name="first_name" aria-label="First Name" size="20" type="text" placeholder="First Name*" onfocus="this.placeholder=''" onblur="this.placeholder='First Name*'" required />
                          <input  id="last_name" maxlength="40" name="last_name" size="20" type="text" placeholder="Last Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Last Name*'" required />
                        </div>
                        <input  id="community_name" maxlength="40" name="community_name" size="20" type="text" placeholder="Community Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Community Name*'" required />
                        <input  id="phone" maxlength="40" name="phone" size="20" type="tel" placeholder="Phone*" onfocus="this.placeholder=''" onblur="this.placeholder='Phone*'" required />
                        <input  id="email" maxlength="40" name="email" size="20" type="email" placeholder="Email*" onfocus="this.placeholder=''" onblur="this.placeholder='Email*'" required />
                      </div>

                      <div class="bottom-wrap">
                        <button type="submit" name="submit" id="quote-submit">Submit</button>
                      </div>

                      <div class="note">
                        <?php the_field('form_notice_copy') ?>
                      </div>
                    </div>
                </div>
                  
                </div>

               
              </div>
            </form>
            </div>
        </div>
      </div>
    </div>
  </section>

  <section class="senior-living--data">
    <div class="container">
        <h2><?php the_field('data_title'); ?></h2>
        <div class="items-wrap">
          <?php
            if( have_rows('data_items') ):
            while( have_rows('data_items') ): the_row();
          ?>
          <div class="item">
            <h3><?php the_sub_field('title'); ?></h3>
            <p><?php the_sub_field('copy'); ?></p>
          </div>
          <?php
            endwhile; endif;
          ?>
        </div>
    </div>
  </section>


  <section class="senior-living--advantage">
    <div class="container">
      <div class="top-wrap">
        <h2><?php the_field('advantage_title'); ?></h2>
        <p><?php the_field('advantage_copy'); ?></p>
      </div>

      <div class="cards-wrap">
        <?php
            if( have_rows('advantage_cards') ):
            while( have_rows('advantage_cards') ): the_row();
          ?>
        <div class="card">
          <div class="icon-wrap">
             <img class="logo" src="<?php the_sub_field('icon'); ?>" alt="Icon">
          </div>
          <h3><?php the_sub_field('title'); ?></h3>
          <p><?php the_sub_field('copy'); ?></p>
        </div>
        <?php
            endwhile; endif;
          ?>
      </div>

      <div class="call-wrap">
        <div class="col-l">
          <div class="icon-wrap">
             <img class="logo" src="<?php the_field('advantage_cell_icon'); ?>" alt="Icon">
          </div>

          <h3><?php the_field('advantage_cell_copy'); ?></h3>
        </div>

        <div class="col-r">
          <a class="btn number" href="tel:18775229633"> 
            Call Now:
            <span class="promoNumber">1-877-522-9633</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="senior-living--two-cols">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2><?php the_field('experience_title'); ?></h2>
          <?php the_field('experience_copy'); ?>
        </div>
        <div class="col">
           <img src="<?php the_field('experience_image'); ?>" alt="Image">
        </div>
      </div>
    </div>
  </section>

  <section class="senior-living--two-cols col-reverse">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2><?php the_field('retention_title'); ?></h2>
          <?php the_field('retention_copy'); ?>
        </div>
        <div class="col">
           <img src="<?php the_field('retention_image'); ?>" alt="Image">
        </div>
      </div>
    </div>
  </section>

  <section class="senior-living--continuum">
    <div class="container">
      <article>
        <h2><?php the_field('continuum_title'); ?></h2>
        <?php the_field('continuum_copy'); ?>
      </article>

      <div class="grid-wrap">
         <?php
            if( have_rows('continuum_grid') ):
            while( have_rows('continuum_grid') ): the_row();
         ?>
        <div class="card">
          <img src="<?php the_sub_field('image'); ?>" alt="Image">
          <p><?php the_sub_field('text'); ?></p>
        </div>
        <?php
            endwhile; endif;
          ?>
      </div>
    </div>
  </section>


  <section class="consult--sec two-columns--limitations column-reverse">
    <div class="row">
      <div class="col phone-wrap">
          <img src="<?php the_field('elevate_image') ?>" alt="Image">
      </div>
      <div class="col copy-wrap">
        <h2><?php the_field('elevate_title') ?></h2>

        <div class="copy">
          <?php the_field('elevate_copy') ?>
        </div>
        <?php
        $link = get_field('elevate_button');

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
  include 'inc/bottom-get-started.php';
  get_footer();
?>
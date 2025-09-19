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
          if( have_rows('main_steps_content') ):
          while( have_rows('main_steps_content') ): the_row();
        ?>
        <div class="quiz-step">
          <article>
            <div class="inner-wrap">
              <h2><?php the_sub_field('title'); ?></h2>
              <div class="btn-wrap">
                <?php
                  if( have_rows('buttons_text') ):
                  while( have_rows('buttons_text') ): the_row();
                ?>
                  <span class="btn"><?php the_sub_field('text'); ?></span>
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
            </div>
          </article>

          <div class="last-step--content">
            <div class="inner-wrap">
              <p class="subhead">We Recommend:</p>
              <h2><?php the_sub_field('title'); ?></h2>
              <div class="tabs-wrap">
                <span>Award Winning</span>
                <span>In Stock</span>
              </div>
              <?php the_sub_field('copy'); ?>
              <div class="btn-wrap">
                <a class="btn" href="/pricing/">Buy Now</a>
                <a class="btn number" href="tel:18775229633"><span class="promoNumber">Give us a Call</span></a>
              </div>
              <p class="note">Scroll down below to register for a <a href="#free-quote-form">FREE</a> Quote*</p>
            </div>
          </div>

          <figure>
            <img class="image" src="<?php the_sub_field('image'); ?>" alt="image">
          </figure>
        </div>
        <?php
          endwhile; endif;
        ?>
       
      </div>
    </div>
  </section>

  <section class="product-quiz--form-sec" id="free-quote-form">
    <div class="container">
      <div class="row">
        <div class="images-wrap">
          <img class="image" src="http://bay-alarm-cc.local/wp-content/uploads/Mask-group-8.webp" alt="image">
          <img class="image" src="http://bay-alarm-cc.local/wp-content/uploads/Mask-group-8.webp" alt="image">
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
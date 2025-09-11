    <?php $free_quote_nonce = wp_create_nonce( 'free_quote_nonce' ); ?>
    <form class="fquote-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
      <p class="title"><?php the_field('form_intro_text'); ?></p>
      <input hidden name="action" value="free_quote_submission">
      <input hidden name="free_quote_nonce" value="<?php echo $free_quote_nonce; ?>">
      <input hidden name="free_quote_redirect" value="<?php the_field('form_redirect'); ?>">
      <input hidden id="inquiring" maxlength="40" name="inquiring" type="text" class="selected-choice" />
      <input hidden id="protection_for" maxlength="40" name="protection_for" type="text" class="selected-choice" />
      <input hidden id="urgency" maxlength="40" name="urgency" type="text" class="selected-choice" />

      <input hidden id="referral_url" name="referral_url" size="20" type="text" />
      <input hidden id="store_name" maxlength="40" name="store_name" type="text" value="Bay Alarm Medical" />

      <?php if (!empty(get_field('form_consent_text'))): ?>
        <input id="marketing_sms_opt_in" name="marketing_sms_opt_in" type="text" value="1" hidden>
      <?php endif; ?>

      <div class="input-wrap has-label field-row">
        <input  id="first_name" maxlength="40" name="first_name" size="20" type="text" placeholder="First Name*" onfocus="this.placeholder=''" onblur="this.placeholder='First Name*'" required />
        <label data-content="First Name" for="first_name">First Name</label>
      </div>

      <div class="input-wrap has-label field-row">
        <input  id="last_name" maxlength="40" name="last_name" size="20" type="text" placeholder="Last Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Last Name*'" required />
        <label data-content="Last Name" for="last_name">Last Name</label>
      </div>

      <div class="input-wrap has-label field-row">
        <input  id="email" maxlength="40" name="email" size="20" type="email" placeholder="Email*" onfocus="this.placeholder=''" onblur="this.placeholder='Email*'" required />
        <label data-content="Email" for="email">Email</label>
      </div>

      <div class="input-wrap has-label field-row">
        <input  id="phone" maxlength="40" name="phone" size="20" type="tel" placeholder="Phone*" onfocus="this.placeholder=''" onblur="this.placeholder='Phone*'" required />
        <label data-content="Phone" for="phone">Phone</label>
      </div>
      <?php if (!empty(get_field('form_consent_text'))): ?>
        <p><?php the_field('form_consent_text'); ?></p>
      <?php endif; ?>
      <button type="submit" name="submit" id="quote-submit" class="btn-outline blue">Submit<span class="loading-icon"></span></button>
    </form>

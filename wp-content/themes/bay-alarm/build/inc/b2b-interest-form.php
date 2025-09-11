    <?php $free_quote_nonce = wp_create_nonce( 'free_quote_nonce' ); ?>
    <form class="b2b-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
        <p class="title"><?php the_field('form_intro_text'); ?></p>
        <input hidden name="action" value="free_quote_submission">
        <input hidden name="free_quote_nonce" value="<?php echo $free_quote_nonce; ?>">
        <input hidden name="free_quote_redirect" value="<?php the_field('form_redirect'); ?>">
        <input hidden id="inquiring" maxlength="40" name="inquiring" type="text" class="selected-choice" />
        <input hidden id="protection_for" maxlength="40" name="protection_for" type="text" class="selected-choice" />
        <input hidden id="urgency" maxlength="40" name="urgency" type="text" class="selected-choice" />

        <input hidden id="referral_url" name="referral_url" size="20" type="text" />
        <input hidden id="contact_method" maxlength="40" name="contact_method" type="text" value="Partners" />
        <input hidden id="store_name" maxlength="40" name="store_name" type="text" value="Bay Alarm Medical" />

        <?php if (!empty(get_field('form_consent_text'))): ?>
        <input id="marketing_sms_opt_in" name="marketing_sms_opt_in" type="text" value="1" hidden>
        <?php endif; ?>

        <div class="form-field-contain">

            <div class="input-wrap has-label field-row b2b-first-name">
                <input id="first_name" maxlength="40" name="first_name" size="20" type="text" placeholder="First name"
                    onfocus="this.placeholder=''" onblur="this.placeholder='First Name*'" required />
                <label data-content="First Name" for="first_name">First Name</label>
            </div>

            <div class="input-wrap has-label field-row b2b-last-name">
                <input id="last_name" maxlength="40" name="last_name" size="20" type="text" placeholder="Last name"
                    onfocus="this.placeholder=''" onblur="this.placeholder='Last Name*'" required />
                <label data-content="Last Name" for="last_name">Last Name</label>
            </div>

            <div class="input-wrap has-label field-row b2b-email">
                <input id="email" maxlength="40" name="email" size="20" type="email" placeholder="Enter Your Email"
                    onfocus="this.placeholder=''" onblur="this.placeholder='Email*'" required />
                <label data-content="Email" for="email">Email</label>
            </div>

            <div class="input-wrap has-label field-row b2b-phone">
                <input id="phone" maxlength="40" name="phone" size="20" type="tel" placeholder="Enter Your Phone Number"
                    onfocus="this.placeholder=''" onblur="this.placeholder='Phone*'" required />
                <label data-content="Phone" for="phone">Phone</label>
            </div>

            <div class="input-wrap has-label field-row b2b-company">
                <input id="company_name" maxlength="40" name="company_name" size="20" type="text"
                    placeholder="Enter Your Company Name" onfocus="this.placeholder=''" onblur="this.placeholder='Company Name*'"
                    required />
                <label data-content="Company Name" for="company_name">Company Name</label>
            </div>

            <div class="input-wrap has-label field-row b2b-website">
                <input id="company_website" maxlength="40" name="company_website" size="20" type="text"
                    placeholder="Enter Your Company Website" onfocus="this.placeholder=''"
                    onblur="this.placeholder='Company Website*'" required />
                <label data-content="Company Website" for="company_website">Company Website</label>
            </div>
            <?php if (!empty(get_field('form_consent_text'))): ?>
            <p><?php the_field('form_consent_text'); ?></p>
            <?php endif; ?>
            <button type="submit" name="submit" id="quote-submit" class="btn">Submit<span
                    class="loading-icon"></span></button>
            <small>By submitting this form, you are providing an electronic signature certifying that our company and
                our affiliates have your consent to contact you at the provided telephone number using an autodialer,
                SMS, or prerecorded message in accordance with our Terms of Use. Please note that you are not required
                to purchase anything from the companies that may contact you.</small>

        </div>
    </form>
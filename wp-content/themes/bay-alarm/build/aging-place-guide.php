<?php
  // Template Name: Aging Place Guide
  update_option('current_page_template', 'aging-place-guide');
  get_header();
?>

<section class="aging-place-guide--hero">
  <img class="mobile-only" src="<?php the_field('hero_mobile_image') ?>" alt="Hero Image">
  <div class="container">
    <div class="row">
        <div class="col col-l">
          <div class="inner-wrap">
            <?php if (get_field('hero_subhead')): ?>
            <span class="eyebrows"><?php the_field('hero_subhead') ?></span>
             <?php endif; ?>
            <h1><?php the_field('hero_title') ?></h1>

            <?php if (get_field('hero_copy')): ?>
            <p><?php the_field('hero_copy') ?></p>
            <?php endif; ?>
            <h6><?php the_field('hero_list_title') ?></h6>
            <?php the_field('hero_list_copy') ?>
            <a class="pdf-file-link" href="<?php the_field('form_download_file') ?>" download>download</a>
            <p class="form-title"><?php the_field('hero_form_title') ?></p>
            <div class="form-wrap">
              <form class="aging-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
                <input type="hidden" name="action" value="aging_form_submission">
                <input hidden name="aging_form_redirect" value="<?php the_field('thank_you_redirect_url'); ?>" />
                <input hidden id="referral_url" name="referral_url" size="20" type="text" />
                <input hidden id="contact_method" maxlength="40" name="contact_method" type="text" value="AgingInPlace" />
                <input hidden id="store_name" maxlength="40" name="store_name" type="text" value="Bay Alarm Medical" />
                <div class="input-wraper">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12.375 6.75C12.375 8.61396 10.864 10.125 9 10.125C7.13604 10.125 5.625 8.61396 5.625 6.75C5.625 4.88604 7.13604 3.375 9 3.375C10.864 3.375 12.375 4.88604 12.375 6.75Z" fill="#3C3A42"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0 9C0 4.02944 4.02944 0 9 0C13.9706 0 18 4.02944 18 9C18 13.9706 13.9706 18 9 18C4.02944 18 0 13.9706 0 9ZM9 1.125C4.65076 1.125 1.125 4.65076 1.125 9C1.125 10.8601 1.76991 12.5696 2.84834 13.917C3.6483 12.6284 5.40522 11.25 9.00001 11.25C12.5948 11.25 14.3517 12.6284 15.1517 13.917C16.2301 12.5696 16.875 10.8601 16.875 9C16.875 4.65076 13.3492 1.125 9 1.125Z" fill="#3C3A42"/>
                  </svg>
                  <input type="text" id="name" name="name" placeholder="Enter Your Full Name" required>
                </div>
                <div class="input-wraper">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0 4.5C0 3.25736 1.00736 2.25 2.25 2.25H15.75C16.9926 2.25 18 3.25736 18 4.5V13.5C18 14.7426 16.9926 15.75 15.75 15.75H2.25C1.00736 15.75 0 14.7426 0 13.5V4.5ZM2.25 3.375C1.62868 3.375 1.125 3.87868 1.125 4.5V4.74402L9 9.46902L16.875 4.74402V4.5C16.875 3.87868 16.3713 3.375 15.75 3.375H2.25ZM16.875 6.05598L11.5784 9.23393L16.875 12.4934V6.05598ZM16.837 13.7909L10.4916 9.88605L9 10.781L7.50844 9.88605L1.16298 13.7909C1.29121 14.2712 1.72929 14.625 2.25 14.625H15.75C16.2707 14.625 16.7088 14.2712 16.837 13.7909ZM1.125 12.4934L6.42159 9.23393L1.125 6.05598V12.4934Z" fill="#3C3A42"/>
                  </svg>
                  <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
                </div>
                <div class="input-wraper">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M2.12037 0.57496C2.95525 -0.259918 4.33293 -0.174147 5.05781 0.757839L7.07573 3.35231C7.44604 3.82842 7.5769 4.44835 7.4306 5.03351L6.81493 7.4962C6.74993 7.7562 6.82611 8.03123 7.01561 8.22074L9.77927 10.9844C9.96877 11.1739 10.2438 11.2501 10.5038 11.1851L12.9665 10.5694C13.5517 10.4231 14.1716 10.554 14.6477 10.9243L17.2422 12.9422C18.1741 13.6671 18.2599 15.0448 17.425 15.8796L16.2619 17.0428C15.4297 17.875 14.185 18.2404 13.025 17.8326C10.1447 16.8199 7.44118 15.1621 5.13955 12.8605C2.83792 10.5588 1.18007 7.85526 0.167443 4.97503C-0.240393 3.81501 0.125021 2.57031 0.957206 1.73812L2.12037 0.57496Z" fill="#3C3A42"/>
                  </svg>
                  <input type="tel" id="phone" name="phone" placeholder="Enter Your Phone Number (optional)" >
                </div>

                <h4>Are you interested in a medical alert system?</h4>
                <div class="radio-box-wrap">
                    <div class="radio-box">
                      <input id="interest-1" maxlength="40" name="interest" type="radio" value="Yes" required role="radio">
                      <label for="interest-1">Yes</label>
                    </div>
                    <div class="radio-box">
                      <input id="interest-2" maxlength="40" name="interest" type="radio" value="No" required role="radio">
                      <label for="interest-2">No</label>
                    </div>
                    <div class="radio-box">
                      <input id="interest-3" maxlength="40" name="interest" type="radio" value="Yes but not at the moment" required role="radio">
                      <label for="interest-3">Yes but not at the moment</label>
                    </div>
                  </div>
                <input class="form-submit" type="submit" value="Download Guide Now">

                <p class="form-note"><?php the_field('hero_form_note'); ?></p>
              </form>

            </div>
          </div>
        </div>

        <div class="col col-img">
          <img class="desktop-only" src="<?php the_field('hero_image') ?>" alt="Hero Image">
        </div>
    </div>
  </div>
</section>

<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>

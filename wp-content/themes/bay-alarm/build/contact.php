<?php
  //Template Name:  Contact
  update_option('current_page_template','contact');
  get_header();
?>

<section class="contact-hero-wrapper" style="background-image: url(<?php the_field('hero_image'); ?>);">
  <div class="contact-marker">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="7 -3.8 41 42" style="enable-background:new 7 -3.8 41 42;" xml:space="preserve">
      <style type="text/css">
        .st0{fill:#EC2624;}
      </style>
      <path class="st0" d="M27.5-3.8C16.2-3.8,7,5.4,7,16.7s9.2,20.5,20.5,20.5S48,28,48,16.7S38.8-3.8,27.5-3.8z M27.5,18.7h-5v5h-3.9v-5
        h-5v-3.9h5v-5h3.9v5h5V18.7z M31,21.6c-0.3,0-0.5-0.1-0.7-0.3c-0.4-0.4-0.4-1,0-1.4c0.9-0.9,1.3-2,1.3-3.2s-0.5-2.3-1.3-3.2
        c-0.4-0.4-0.4-1,0-1.4c0.4-0.4,1-0.4,1.4,0c1.2,1.2,1.9,2.9,1.9,4.6s-0.7,3.4-1.9,4.6C31.6,21.5,31.3,21.6,31,21.6z M34.2,24.8
        c-0.3,0-0.5-0.1-0.7-0.3c-0.4-0.4-0.4-1,0-1.4c3.5-3.5,3.5-9.2,0-12.7c-0.4-0.4-0.4-1,0-1.4c0.4-0.4,1-0.4,1.4,0
        c4.3,4.3,4.3,11.3,0,15.6C34.7,24.7,34.5,24.8,34.2,24.8z M38.1,27.7c-0.2,0.2-0.4,0.3-0.7,0.3c-0.3,0-0.5-0.1-0.7-0.3
        c-0.4-0.4-0.4-1,0-1.4C42,21,42,12.5,36.7,7.2c-0.4-0.4-0.4-1,0-1.4c0.4-0.4,1-0.4,1.4,0C44.1,11.8,44.1,21.7,38.1,27.7z"/>
    </svg>
  </div>
  <div class="contact-hero-info">
    <div class="ch-info title"><h1><?php the_field('title'); ?></h1></div>
    <a href="mailto:<?php the_field('email_address'); ?>" class="email-link">
      <div class="ch-info email-wrap">
        <figure>
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 15.6 14.8" enable-background="new 0 0 15.6 14.8" xml:space="preserve">
            <polygon points="7.8,0 10.2,4.9 15.6,5.7 11.7,9.5 12.6,14.8 7.8,12.3 3,14.8 3.9,9.5 0,5.7 5.4,4.9 "/>
          </svg>
        </figure>
        <article>
          <p><?php the_field('email_address'); ?></p>
        </article>
      </div>
    </a>
    <div class="ch-info address-wrap">
      <figure>
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 15.6 14.8" enable-background="new 0 0 15.6 14.8" xml:space="preserve">
          <polygon points="7.8,0 10.2,4.9 15.6,5.7 11.7,9.5 12.6,14.8 7.8,12.3 3,14.8 3.9,9.5 0,5.7 5.4,4.9 "/>
        </svg>
      </figure>
      <article>
        <ul class="address-list">
          <a href="<?php the_field('address_link'); ?>" target="_blank">
            <?php if( have_rows('address') ): while( have_rows('address') ): the_row(); ?>
            <li><?php the_sub_field('line'); ?></li>
            <?php endwhile; endif; ?>
          </a>
          <a href="tel:<?php 
              $str = get_field('phone_number'); 
              $phone = intval(preg_replace('/[^0-9]+/', '', $str), 10);
              echo $phone;
          ?>">
            <li class="space"><?php the_field('phone_number'); ?></li>
          </a>
        </ul>

        <?php if( have_rows('hours') ): while( have_rows('hours') ): the_row(); ?>
        <p><?php the_sub_field('line'); ?></p>
        <?php endwhile; endif; ?>

      </article>
    </div>
  </div>

</section>

<?php
  include 'inc/contact-form.php';
  include 'inc/bottom-get-started.php';
  get_footer();
?>

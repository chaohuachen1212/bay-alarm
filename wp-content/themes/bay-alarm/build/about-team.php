<?php
  // Template Name: About Team
  update_option('current_page_template', 'about-team');
  get_header();
  $show_promo_banner = get_field('show_promo_banner', 'option');
?>


<section class="about-team--hero">
  <div class="mobile-img-wrap">
    <img class="hero-mobile-img" src="<?php the_field('hero_mobile_image'); ?>" alt="Image">
    <img class="hero-tablet-img" src="<?php the_field('hero_image'); ?>" alt="Image">
  </div>
  <div class="container">

    <div class="row">
      <div class="col">
        <span class="eyebrows"><?php the_field('hero_eyebrow'); ?></span>
        <h1><?php the_field('hero_title'); ?></h1>
        <?php the_field('hero_copy'); ?>
      </div>

      <div class="col img-wrap">
        <img class="hero-img" src="<?php the_field('hero_image'); ?>" alt="Image">
      </div>
    </div>
  </div>
</section>

<section class="about-team--mission">
  <div class="container">
      <div class="row" id="mission">
        <div class="col image-wrap">
          <img src="<?php the_field('mission_image'); ?>" alt="Image">
        </div>

        <div class="col copy-wrap">
          <span class="eyebrows"><?php the_field('mission_eyebrow'); ?></span>
          <h2><?php the_field('mission_title'); ?></h2>
          <div class="mission-dropdown-wrap">
            <?php
               $c = 1;
              if( have_rows('mission_dropdown_list') ):
              while( have_rows('mission_dropdown_list') ): the_row();
            ?>
            <div class="item <?php if($c===1): echo 'is-active'; endif; ?>">
              <h4>
                <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.122 13.1382C5.63868 12.6542 5.63868 11.8694 6.122 11.3854L10.4938 7.0072L6.122 2.629C5.63868 2.14497 5.63868 1.3602 6.122 0.876171C6.60532 0.39214 7.38893 0.39214 7.87225 0.876171L13.9942 7.0072L7.87225 13.1382C7.38893 13.6223 6.60532 13.6223 6.122 13.1382Z" fill="#3C3A42"/>
                </svg>
                <?php the_sub_field('title'); ?>
                </h4>
              <p><?php the_sub_field('copy'); ?></p>
            </div>
            <?php
              $c++; endwhile; endif;
            ?>
          </div>
        </div>
      </div>
  </div>
</section>

<section class="about-team--start">
  <div class="container">
     <?php
      if( have_rows('start_rows') ):
      while( have_rows('start_rows') ): the_row();
   ?>
    <div class="row <?php if(get_sub_field('turn_on_row_reverse')): echo 'is-reverse'; endif; ?>" id="<?php the_sub_field('id'); ?>">
      <div class="col copy">
         <span class="eyebrows"><?php the_sub_field('eyebrow'); ?></span>
          <h2><?php the_sub_field('title'); ?></h2>
          <?php the_sub_field('copy'); ?>
      </div>
      <div class="col img">
        <img src="<?php the_sub_field('image'); ?>" alt="Image">
      </div>
    </div>
    <?php
     endwhile; endif;
   ?>
  </div>
</section>

<section class="about-team--feature">
    <?php
      if( have_rows('feature_images') ):
      while( have_rows('feature_images') ): the_row();
   ?>
      <img src="<?php the_sub_field('image'); ?>" alt="Image">
   <?php
     endwhile; endif;
   ?>
</section>



<!-- ===============================================
            Reviews
=============================================== -->
<section class="hiw-review-sec">
  <div class="col-wrap">

    <article class="copy-wrap">
      <div class="text-wrap">
        <h2><?php the_field('review_heading') ?></h2>
      </div>
    </article>

    <div class="row">
      <article class="col">
        <div class="img-wrap">
          <?php
            $n = 1;
            if ( have_rows('review_image_grid') ):
            while ( have_rows('review_image_grid') ): the_row();

            $review_author = get_sub_field('review_author');
            $author_title = explode('|', $review_author);

            $author_company = $author_title[1];
            $company = explode(',', $author_company);

          ?>
            <div role="tab" tabindex="0" class="img <?php if($n===1): echo 'is-active'; endif; ?>" style="background-image: url(<?php the_sub_field('image') ?>);" aria-label="<?php echo trim($company[1], ' ') ?>"></div>
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
          <?php the_sub_field('review_testimonial_text') ?>
          <p class="author"><?php the_sub_field('review_author') ?></p>
        </div>
        <?php
          $c++; endwhile; endif;
        ?>
      </div>
    </div>

  </div>
</section>


<section class="about-team--grid" >
  <div class="container">
    <h2 id="team"><?php the_field('team_title'); ?></h2>
    <?php include 'inc/team/meet-new.php'; ?>
  </div>
</section>

<section class="about-team--ethics" >
  <div class="container">
    <div class="top-wrap" id="codeofethics">
      <span class="eyebrows"><?php the_field('ethics_eyebrow'); ?></span>
      <h2><?php the_field('ethics_title'); ?></h2>
    </div>

    <div class="ethics-rows">
      <?php
        if( have_rows('ethics_list') ):
        while( have_rows('ethics_list') ): the_row();
     ?>
      <div class="row">
        <div class="col img-wrap">
            <img src="<?php the_sub_field('image'); ?>" alt="Image">
        </div>

        <div class="col copy">
            <?php the_sub_field('content'); ?>
        </div>
      </div>
      <?php
       endwhile; endif;
     ?>
    </div>
  </div>
</section>


<section class="hiw--faq">
  <div class="container">
    <?php if (get_field('faq_title')): ?>
      <h2><?php the_field('faq_title') ?></h2>
    <?php endif; ?>
    <div class="faq-wrap">
      <?php
        if( have_rows('faq_list') ):
        while( have_rows('faq_list') ): the_row();
      ?>
        <div class="item">
          <p class="question"><?php the_sub_field('question') ?></p>
          <p><?php the_sub_field('answer') ?></p>
        </div>
      <?php
        endwhile; endif;
      ?>
    </div>
  </div>
</section>


<section class="follow-us--block">
  <div class="container">
    <div class="top-wrap">
      <h2><?php the_field('follow_us_title') ?></h2>
      <?php the_field('follow_us_copy') ?>
    </div>

    <div class="row">
      <?php
        if( have_rows('follow_us_list') ):
        while( have_rows('follow_us_list') ): the_row();
          $base_prod_url = get_sub_field('link');
           if ($base_prod_url):
            $prod_link = $base_prod_url['url'];
            $prod_title = $base_prod_url['title'];
            $prod_target = $base_prod_url['target'] ? $base_prod_url['target'] : '_self';
      ?>
      <a class="col"  href="<?php echo esc_url($prod_link); ?>" target="<?php echo esc_attr($prod_target); ?>" >
        <img src="<?php the_sub_field('icon'); ?>" alt="Image">
        <h4><?php echo esc_attr($prod_title); ?></h4>
      </a>
      <?php
       endif; endwhile; endif;
      ?>

    </div>
  </div>
</section>

<?php include 'inc/bottom-get-started.php' ?>

<?php get_footer(); ?>
<?php
  // Template Name: Automatic Fall Detection
  update_option('current_page_template', 'automatic-fall-detection');
  get_header();
?>


<section class="afd--hero">
  <div class="container">
    <div class="row">
        <article>
          <h1><?php the_field('hero_title') ?></h1>
          <p><?php the_field('hero_copy') ?></p>

           <?php
            $hero_link = get_field('hero_button');
            if ($hero_link):
              $prod_link = $hero_link['url'];
              $prod_title = $hero_link['title'];
              $prod_target = $hero_link['target'] ? $hero_link['target'] : '_self';
          ?>
           <a class="btn" href="<?php echo esc_url($prod_link); ?>" target="<?php echo esc_attr($prod_target); ?>" >
            <?php echo esc_attr($prod_title); ?>
          </a>
           <?php endif; ?>
        </article>

        <div class="img-wrap">
          <img src="<?php the_field("hero_image"); ?>">
        </div>
    </div>
  </div>
</section>

<section class="in-home-accessories">
  <div class="container">
    <div class="header">
      <h2><?php the_field('accessories_title') ?></h2>
      <p><?php the_field('accessories_copy') ?></p>
    </div>
    <div class="cards-wrap">

      <?php
        if( have_rows('accessories_cards') ):
        while( have_rows('accessories_cards') ): the_row();
      ?>
      <div class="card">
        <figure style="background-image: url(<?php the_sub_field('image') ?>)"> </figure>
        <article>
          <h4><?php the_sub_field('title') ?></h4>
          <p><?php the_sub_field('copy') ?></p>
        </article>
      </div>

      <?php
        endwhile; endif;
      ?>
    </div>
  </div>
</section>


<section class="prod-new--helpbtn helpbtn-row-reverse">
  <div class="container">

    <div class="col-wraps">
      <article class="col col-l">
        <h2><?php the_field('content_grid_title') ?></h2>
        <p><?php the_field('content_grid_copy') ?></p>

        <div class="sec-wrap">
          <?php
            if( have_rows('content_grid_list_items') ):
            while( have_rows('content_grid_list_items') ): the_row();
          ?>
          <section>
            <h6>
              <i class="icon">
                <img src="<?php the_sub_field('icon') ?>" alt="faq icon">
              </i>
              <?php the_sub_field('title') ?>
            </h6>
            <div class="text-wrap">
              <?php the_sub_field('copy') ?>
            </div>
          </section>

          <?php
            endwhile; endif;
          ?>

        </div>
      </article>

      <article class="col col-r">
         <img src="<?php the_field('content_grid_images') ?>" alt="Image">
      </article>
    </div>

  </div>
</section>

<section class="afd--detection">
  <div class="container">
    <div class="row">
        <article>
          <h2><?php the_field('detection_title') ?></h2>
          <p><?php the_field('detection_copy') ?></p>

           <?php
            $link = get_field('detection_button');
            if ($link):
              $d_link = $link['url'];
              $d_title = $link['title'];
              $d_target = $link['target'] ? $link['target'] : '_self';
          ?>
           <a class="btn" href="<?php echo esc_url($d_link); ?>" target="<?php echo esc_attr($d_target); ?>" >
            <?php echo esc_attr($d_title); ?>
          </a>
           <?php endif; ?>
        </article>


        <img class="img-wrap" src="<?php the_field("detection_image"); ?>">
    </div>
  </div>
</section>

<section class="two-columns--limitations">
  <div class="row">
    <div class="col phone-wrap">
        <img src="<?php the_field('limitations_image') ?>" alt="Image">
    </div>
    <div class="col copy-wrap">
      <h2><?php the_field('limitations_title') ?></h2>

      <div class="copy">
        <?php the_field('limitations_copy') ?>
      </div>
      <?php

      $link = get_field('limitations_button');

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

<section class="afd-right--sec">
  <div class="container">
    <div class="top-wrap">
      <h2><?php the_field('right_title') ?></h2>
      <p><?php the_field('right_copy') ?></p>
    </div>

    <div class="cards">
      <?php
        if( have_rows('right_cards') ):
        while( have_rows('right_cards') ): the_row();
      ?>
      <div class="card">
        <div class="icon">
          <img src="<?php the_sub_field('icon') ?>" alt="Image">
        </div>
        <h3><?php the_sub_field('title') ?></h3>
        <p><?php the_sub_field('copy') ?></p>
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
        <img src="<?php the_field('consult_image') ?>" alt="Image">
    </div>
    <div class="col copy-wrap">
      <h2><?php the_field('consult_title') ?></h2>

      <div class="copy">
        <?php the_field('consult_copy') ?>
      </div>
      <?php
      $link = get_field('consult_button');

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


<section class="hiw--faq">
  <div class="container">
    <h2><?php the_field('faq_title') ?></h2>
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

<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>
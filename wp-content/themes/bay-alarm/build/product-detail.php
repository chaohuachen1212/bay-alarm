<?php
  // Template Name: Product Detail New
  update_option('current_page_template','product-details-page smart-watch product-detail-new');
  get_header();
  $page_temp = get_page_template_slug( get_queried_object_id() );
  $show_promo_banner = get_field('show_promo_banner', 'option');
?>



<!-- =========================================================
                Top Subnav
========================================================= -->
<section class="prod-new--topnav">
  <?php include 'inc/hiw-subnav.php' ?>
</section>



<!-- =========================================================
                Hero Section
========================================================= -->
<section class="prod-new--hero <?php echo get_field('new_hero_theme') ? 'new-hero' : '' ?> <?php if(get_field('which_type_of_hero_center_image')==='image'): echo 'center-img-hero'; endif; ?> <?php the_field('hero_theme_color'); ?>">

  <div class="container">
    <div class="text-wrap <?php if(get_field('turn_on_hero_logos')): echo 'having-logos'; endif; ?>">
      <?php if (get_field('hero_subhead')): ?>
        <span class="sub-head"><?php the_field('hero_subhead') ?></span>
      <?php endif; ?>

      <h1><?php the_field('hero_title') ?></h1>
      <p><?php the_field('hero_copy') ?></p>

      <?php if (get_field('new_hero_theme')): ?>
        <div class="btn-wrap">
          <a href="<?php the_field('hero_button_url') ?>" class="btn btn-large no-caps"><?php the_field('hero_button_copy') ?></a>

          <?php if (get_field('turn_on_hero_logos')): ?>
          <div class="logos-wrap">
            <?php
            	if( have_rows('hero_logos') ):
            	while( have_rows('hero_logos') ): the_row();
            ?>
            <a href="<?php the_sub_field('url'); ?>" target="_blank">
              <img src="<?php the_sub_field('image'); ?>" alt="Logo">
            </a>
            <?php
            	endwhile; endif;
            ?>

          </div>
          <?php endif; ?>
        </div>
      </div>
      <?php endif; ?>



      <?php if (get_field('which_type_of_hero_center_image')==='video'): ?>
        <div class="right-wrap video-right">
          <article class="image-box video-wraper">
            <img class="dot dot-top" src="<?php echo GET_TEMP ?>/img/hiw/bg-dot.png" alt="Image">
            <img class="dot dot-bottom" src="<?php echo GET_TEMP ?>/img/hiw/bg-dot.png" alt="Image">
          <div class="video-box video-modal-call" data-videosrc="<?php the_field('hero_video_url') ?>">
            <div class="flex">
              <figure class="video-img" style="background-image: url(<?php the_field('hero_video_image') ?>);">
                <?php if (get_field('new_hero_theme')): ?>
                  <span class="icon"><?php include 'inc/vectors/play-icon-new.svg' ?></span>
                <?php else: ?>
                  <span class="icon"><?php include 'inc/vectors/play-icon.svg' ?></span>
                <?php endif; ?>
              </figure>
              <?php if(!get_field('new_hero_theme')): ?>
              <figcaption><?php the_field('hero_video_copy') ?></figcaption>
              <?php endif; ?>
            </div>
          </div>
        </article>
      </diiv>
      <?php endif; ?>

      <?php if (get_field('which_type_of_hero_center_image')==='image'): ?>
        <div class="right-wrap">
          <article class="image-box">
            <img class="main-img" src="<?php the_field('hero_desktop_image') ?>" alt="Image">
            <img class="dot dot-top" src="<?php echo GET_TEMP ?>/img/hiw/bg-dot.png" alt="Image">
            <img class="dot dot-bottom" src="<?php echo GET_TEMP ?>/img/hiw/bg-dot.png" alt="Image">
          </article>
        </div>
      <?php endif; ?>

      <?php if(!get_field('new_hero_theme')): ?>
      <a href="<?php the_field('hero_button_url') ?>" class="blue btn-outline"><?php the_field('hero_button_copy') ?></a>
    </div>
    <?php endif; ?>
  </div>
</section>


  <?php

    // Check value exists.
    if( have_rows('main_content') ):

    // Loop through rows.
    while ( have_rows('main_content') ) : the_row();
    ?>
    <?php
        if( get_row_layout() == 'product_accessories' ):
      ?>

      <section class="in-home-accessories <?php if(get_field('which_type_of_hero_center_image')==='image'): echo 'center-img-hero'; endif; ?>">
        <div class="container">
          <div class="header">
            <h2><?php the_sub_field('accessories_title') ?></h2>
            <p><?php the_sub_field('accessories_copy') ?></p>
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
          <?php if (get_field('accessories_button_copy')): ?>
            <div class="btn-wrap">
              <a class="blue btn-outline" href="<?php the_field('accessories_button_url') ?>"><?php the_field('accessories_button_copy') ?></a>
            </div>
           <?php endif; ?>
        </div>
      </section>

      <?php
        elseif( get_row_layout() == 'product_features' ):
      ?>

      <section class="product--features">

        <div class="mobile">
          <h2><?php the_sub_field('features_title'); ?></h2>
          <div class="copy">
            <p><?php the_sub_field('features_copy'); ?></p>
          </div>
        </div>
        <div class="row desktop">
          <div class="display-wrap">
            <?php
              $c = 1;
              if( have_rows('features_items_list') ):
              while( have_rows('features_items_list') ): the_row();
            ?>
              <img class="<?php if($c===1): echo 'is-active'; endif; ?>" src="<?php the_sub_field('image'); ?>" alt="Image">
            <?php
              $c++; endwhile; endif;
            ?>

          </div>
          <article>
            <div class="desktop">
              <h2><?php the_sub_field('features_title'); ?></h2>
              <div class="copy">
                <p><?php the_sub_field('features_copy'); ?></p>
              </div>
            </div>
            <div class="list-wrap">
              <?php
              	$c = 1;
              	if( have_rows('features_items_list') ):
              	while( have_rows('features_items_list') ): the_row();
              ?>
              <div class="item <?php if($c===1): echo 'is-active'; endif; ?>">
                <h5>
                  <?php include 'img/prod-in-home-new/faq-arrow-new.svg' ?>
                  <?php the_sub_field('title'); ?>
                </h5>

                <div class="text">
                  <p><?php the_sub_field('copy'); ?></p>
                </div>
              </div>

              <?php
              	$c++; endwhile; endif;
              ?>


            </div>
          </article>
        </div>

        <div class="p-detail-wrap mobile">
          <?php
            if( have_rows('features_items_list') ):
            while( have_rows('features_items_list') ): the_row();
          ?>
          <div class="item-box">
            <div class="image-wrap">
              <img src="<?php the_sub_field('image'); ?>" alt="Image">
            </div>

            <div class="text-wrap">
              <h5>
                <?php the_sub_field('title'); ?>
              </h5>

              <div class="text">
                <p><?php the_sub_field('copy'); ?></p>
              </div>
            </div>
          </div>
          <?php
            endwhile; endif;
          ?>

        </div>
      </section>

      <?php
        elseif( get_row_layout() == 'two_column_content_grid' ):
      ?>

      <section class="prod-new--helpbtn <?php if(get_sub_field('content_grid_row_reverse')): echo 'helpbtn-row-reverse'; endif; ?> <?php if(get_sub_field('turn_on_content_grid_images_background')): echo 'blue-img-bg'; endif; ?> <?php if(get_sub_field('turn_on_two_column')): echo 'two-cols'; endif; ?> <?php if(get_sub_field('adjust_last_grid_item')): echo 'adjust-grid-last'; endif; ?>">
        <div class="container">

          <div class="col-wraps">
            <article class="col col-l">
              <h2><?php the_sub_field('content_grid_title') ?></h2>
              <p><?php the_sub_field('content_grid_copy') ?></p>

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
               <img src="<?php the_sub_field('content_grid_images') ?>" alt="Image">
            </article>
          </div>

        </div>
      </section>


      <?php
        elseif( get_row_layout() == 'two_columns_article_image' ):
      ?>

      <section class="two-columns-article-image <?php if(get_sub_field('columns_reverse')): echo 'column-reverse'; endif; ?> <?php the_sub_field('which_theme_color'); ?>">
        <div class="row">

          <div class="col-l">
            <article>
              <h2><?php the_sub_field('two_columns_article_title') ?></h2>
              <?php the_sub_field('two_columns_article_copy') ?>

              <?php

              $link = get_sub_field('button');

              if( $link ):
              	$link_url = $link['url'];
              	$link_title = $link['title'];
              	$link_target = $link['target'] ? $link['target'] : '_self';
              	?>
                <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
              <?php endif; ?>

              <?php if (get_sub_field('video_url')): ?>
                <a class="btn video-modal-call" data-videosrc="<?php the_sub_field('video_url') ?>">
                  <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M14 26.2524C7.23451 26.2524 1.75 20.7679 1.75 14.0024C1.75 7.23695 7.23451 1.75244 14 1.75244C20.7655 1.75244 26.25 7.23695 26.25 14.0024C26.25 20.7679 20.7655 26.2524 14 26.2524ZM14 28.0024C21.732 28.0024 28 21.7344 28 14.0024C28 6.27046 21.732 0.00244141 14 0.00244141C6.26801 0.00244141 0 6.27046 0 14.0024C0 21.7344 6.26801 28.0024 14 28.0024Z" fill="white"/>
                  <path d="M10.9746 8.84942C11.2661 8.69944 11.6169 8.72492 11.8836 8.91543L18.0086 13.2904C18.2385 13.4547 18.375 13.7199 18.375 14.0024C18.375 14.285 18.2385 14.5502 18.0086 14.7145L11.8836 19.0895C11.6169 19.28 11.2661 19.3054 10.9746 19.1555C10.6832 19.0055 10.5 18.7052 10.5 18.3774V9.62745C10.5 9.29968 10.6832 8.9994 10.9746 8.84942Z" fill="white"/>
                  </svg>
                  <?php the_sub_field('video_button_text') ?>
                </a>
              <?php endif; ?>

              <?php if (get_sub_field('note_copy')): ?>
                <div class="note-wrap">
                  <?php the_sub_field('note_copy') ?>
                </div>
              <?php endif; ?>

            </article>
          </div>
          <?php if (get_sub_field('is_image_popup_vdieo')): ?>
            <figure class="video-modal-call" data-videosrc="<?php the_sub_field('image_popup_video_url') ?>">
              <img src="<?php the_sub_field('image') ?>" alt="Image">
              <svg width="78" height="78" viewBox="0 0 78 78" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle opacity="0.3" cx="38.8726" cy="38.8726" r="38.8726" fill="black"/>
              <circle cx="38.8727" cy="38.8725" r="32.0534" stroke="#F4F5FB" stroke-width="5"/>
              <path d="M55.6094 38.8725L30.5042 53.367L30.5042 24.378L55.6094 38.8725Z" fill="white"/>
              </svg>

            </figure>
          <?php else: ?>
            <figure>
              <img src="<?php the_sub_field('image') ?>" alt="Image">
            </figure>
          <?php endif; ?>
        </div>
      </section>

      <?php
        elseif( get_row_layout() == 'two_columns_phone' ):
      ?>

      <section class="two-columns--phone <?php if(get_sub_field('is_columns_reverse')): echo 'column-reverse'; endif; ?>">
        <div class="row">
          <div class="col phone-wrap">
              <img src="<?php the_sub_field('image') ?>" alt="Image">
          </div>
          <div class="col copy-wrap">
            <h2><?php the_sub_field('title') ?></h2>

            <div class="copy">
              <?php the_sub_field('copy') ?>
            </div>
            <?php

            $link = get_sub_field('button');

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
        elseif( get_row_layout() == 'faq_component' ):
      ?>

      <section class="prod-new--faq">
        <div class="container">

          <div class="inner-wrap">
            <h2><?php the_sub_field('faq_title') ?></h2>

            <div class="aq-wrapper">
              <?php
              	if( have_rows('faq_items_list') ):
              	while( have_rows('faq_items_list') ): the_row();
              ?>
              <article class="row">
                <div class="q-box">
                  <i class="arrow">
                    <?php include 'img/prod-in-home-new/faq-arrow-new.svg' ?>
                  </i>
                  <h6><?php the_sub_field('question') ?></h6>
                </div>
                <div class="a-box">
                  <p><?php the_sub_field('answer') ?></p>
                </div>
              </article>

              <?php
              	endwhile; endif;
              ?>
            </div>
          </div>

        </div>
      </section>

      <?php
        elseif( get_row_layout() == 'specifications_component' ):
      ?>

      <section class="smartwatch--specifications">
        <div class="title-wrap mobile">
          <h2><?php the_sub_field('specifications_title') ?></h2>
          <p><?php the_sub_field('specifications_copy') ?></p>
        </div>
        <div class="row">
          <div class="l-col">

            <div class="title-wrap desktop">
              <h2><?php the_sub_field('specifications_title') ?></h2>
              <p><?php the_sub_field('specifications_copy') ?></p>
            </div>

            <div class="list-wrap">
              <?php
              	$n = 1;
              	if( have_rows('specifications_items_list') ):
              	while( have_rows('specifications_items_list') ): the_row();
              ?>
              <div class="item <?php if($n===1): echo 'is-active'; endif; ?>">
                <div class="number-wrap">
                  <span><?php echo $n ?></span>
                </div>
                <div class="box">
                  <p><?php the_sub_field('sub_title') ?></p><small><?php the_sub_field('small_text') ?></small>
                </div>
              </div>
              <?php
              	$n++; endwhile; endif;
              ?>
            </div>


          </div>

          <div class="r-col">


            <?php
            	$c = 1;
            	if( have_rows('specifications_items_list') ):
            	while( have_rows('specifications_items_list') ): the_row();
            ?>
              <img class="<?php if($c===1): echo 'is-active'; endif; ?>" src="<?php the_sub_field('image') ?>">
            <?php
            	$c++; endwhile; endif;
            ?>


          </div>
        </div>
      </section>

    <?php
      endif;
      // End loop.
      endwhile;

    endif;

    ?>



<!-- =========================================================
                Base Station
========================================================= -->

<?php include 'inc/bottom-get-started.php' ?>

<?php get_footer(); ?>

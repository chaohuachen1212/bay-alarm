<?php
  // Template Name: Smart Watch
  update_option('current_page_template','product-details-page smart-watch');
  get_header();
  $page_temp = get_page_template_slug( get_queried_object_id() );
?>

<!-- =========================================================
                Top Subnav
========================================================= -->
<section class="prod-new--topnav">
  <?php include 'inc/hiw-subnav.php' ?>
</section>


<style>
  .prod-new--hero .btn-outline {background-color: <?php the_field('hero_button_background_color') ?>; color:<?php the_field('hero_button_border_color') ?>; border: 2px solid <?php the_field('hero_button_border_color') ?>; }
  .prod-new--hero .btn-outline:hover {background-color: <?php the_field('hero_button_border_color') ?>; color:<?php the_field('hero_button_background_color') ?>; border: 2px solid <?php the_field('hero_button_border_color') ?>; }
  .in-home-monitoring .btn-wrap .btn-outline {background-color: <?php the_field('monitoring_button_background_color') ?>; color:<?php the_field('monitoring_button_color') ?>; border: 2px solid <?php the_field('monitoring_button_border_color') ?>; }
  .in-home-monitoring .btn-wrap .btn-outline:hover {background-color: <?php the_field('monitoring_button_color') ?>; color:<?php the_field('monitoring_button_background_color') ?>; border: 2px solid <?php the_field('monitoring_button_border_hover_color') ?>; }
  .in-home-monitoring-more-copy .btn-wrap .btn-outline {background-color: <?php the_field('monitoring_button_background_color') ?>; color:<?php the_field('monitoring_button_color') ?>; border: 2px solid <?php the_field('monitoring_button_border_color') ?>; }
  .in-home-monitoring-more-copy .btn-wrap .btn-outline:hover {background-color: <?php the_field('monitoring_button_color') ?>; color:<?php the_field('monitoring_button_background_color') ?>; border: 2px solid <?php the_field('monitoring_button_border_hover_color') ?>; }
</style>
<!-- =========================================================
                Hero Section
========================================================= -->
<section class="prod-new--hero">
  <figure class="bg-img desktop" style="background-image: url(<?php the_field('hero_desktop_image') ?>);"></figure>
  <figure class="bg-img mobile" style="background-image: url(<?php the_field('hero_mobile_image') ?>);">
  </figure>

  <div class="container">
    <div class="text-wrap">
      <h1><?php the_field('hero_title') ?></h1>
      <p><?php the_field('hero_copy') ?></p>

      <?php if (get_field('sos_hero_video_on_or_off')==='on'): ?>
        <article class="video-box video-modal-call" data-videosrc="<?php the_field('hero_video_url') ?>">
          <div class="flex">
            <figure class="video-img" style="background-image: url(<?php the_field('hero_video_image') ?>);">
              <span class="icon"><?php include 'inc/vectors/play-icon.svg' ?></span>
            </figure>
            <figcaption><?php the_field('hero_video_copy') ?></figcaption>
          </div>
        </article>
      <?php endif; ?>
      <a href="<?php the_field('hero_button_url') ?>" class="blue btn-outline"><?php the_field('hero_button_copy') ?></a>
    </div>
  </div>
</section>

<!-- =========================================================
                Accessories Section
========================================================= -->
<?php if (get_field('on_or_off_accessories_section')==='on'): ?>
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
      <?php if (get_field('accessories_button_copy')): ?>
        <div class="btn-wrap">
          <a class="blue btn-outline" href="<?php the_field('accessories_button_url') ?>"><?php the_field('accessories_button_copy') ?></a>
        </div>
       <?php endif; ?>
    </div>
  </section>
<?php endif; ?>

<?php if (get_field('turn_on_boxes_section')): ?>
<section class="prod-response-boxes-sec">
  <div class="container">
    <article class="prod-new-text-box center">
      <h2><?php the_field('boxes_title') ?></h2>
      <p><?php the_field('boxes_copy') ?></p>
    </article>
    <article class="cols-wrap <?php the_field('how_many_boxes') ?>">
      <?php
        if( have_rows('boxes_list') ):
        while( have_rows('boxes_list') ): the_row();
      ?>
      <div class="col">
        <img src="<?php the_sub_field('image') ?>" alt="Image">
        <h5><?php the_sub_field('title') ?></h5>
        <p><?php the_sub_field('copy') ?></p>
      </div>
      <?php
      	endwhile; endif;
      ?>
    </article>
    <?php if (get_field('boxes_button_copy')): ?>
      <a href="<?php the_field('boxes_button_url') ?>" class="blue btn-outline"><?php the_field('boxes_button_copy') ?></a>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>

<?php if (get_field('turn_on_smart_slider')): ?>
<!-- =========================================================
                Slider Section
========================================================= -->
<section class="smart-watch--section">
  <div class="sw-img-wrap">
    <div class="box">
      <img class="smart-watch" src="<?php echo GET_TEMP ?>/img/smart-watch/smart-watch.png">
      <div class="sw-l-col">
        <?php
        	if( have_rows('smart_watch_slider') ):
        	while( have_rows('smart_watch_slider') ): the_row();
        ?>
        <div class="img-wrap">
          <img src="<?php the_sub_field('image') ?>">
        </div>
        <?php
          endwhile; endif;
        ?>

      </div>
    </div>
  </div>

  <div class="sw-r-col">
    <?php
      if( have_rows('smart_watch_slider') ):
      while( have_rows('smart_watch_slider') ): the_row();
    ?>
    <div class="copy">
      <span><?php the_sub_field('sub_header') ?></span>
      <h3><?php the_sub_field('title') ?></h3>
      <?php the_sub_field('copy') ?>
      <div class="btn-wrap">
        <a class="btn-outline blue" aria-label="Buy the SOS Smartwatch Now" href="<?php the_sub_field('button_url') ?>"><?php the_sub_field('button_text') ?></a>
      </div>
    </div>
    <?php
      endwhile; endif;
    ?>
  </div>
</section>
<?php endif; ?>



<!-- =========================================================
                Available
========================================================= -->
<?php if (get_field('on_or_off_column_section')==='on'): ?>
  <section class="prod-new--available">
    <div class="container">
      <article class="prod-new-text-box">
        <div class="l-col">
          <img src="<?php the_field('column_image') ?>">
        </div>
        <div class="r-col">
          <h2><?php the_field('column_title') ?></h2>
          <?php if (get_field('column_is_link_or_video')==='link'): ?>
            <a class="blue btn-outline" href="<?php the_field('column_button_link') ?>"><?php the_field('column_button_copy') ?></a>
          <?php else: ?>
            <a class="blue btn-outline video-modal-call" data-videosrc="<?php the_field('column_video_url') ?>"><?php the_field('column_button_copy') ?></a>
          <?php endif; ?>
        </div>
      </article>
    </div>
  </section>
<?php endif; ?>


<!-- =========================================================
                Network
========================================================= -->
<section class="prod-new--network">
  <div class="container">

    <div class="col-wrap flex">
      <article class="col">
        <h2><?php the_field('network_title') ?></h2>
        <p><?php the_field('network_copy') ?></p>

        <a href="<?php the_field('network_button_url') ?>" class="darkblue btn-outline"><?php the_field('network_button_copy') ?></a>

        <img class="map-img-mobile" src="<?php the_field('network_map') ?>" alt="network map">

        <div class="bottom-note">
          <?php the_field('network_note') ?>
        </div>
      </article>

      <article class="col">
        <img class="map-img-desktop" src="<?php the_field('network_map') ?>" alt="network map">
      </article>
    </div>
  </div>
</section>




<!-- =========================================================
                Network
========================================================= -->
<section class="prod-new--faq">
  <div class="container">

    <div class="inner-wrap">
      <h2><?php the_field('fqa_title') ?></h2>

      <div class="aq-wrapper">
        <?php
        	if( have_rows('faq_item_list') ):
        	while( have_rows('faq_item_list') ): the_row();
        ?>
        <article class="row">
          <div class="q-box">
            <i class="icon">
              <img src="<?php the_sub_field('icon') ?>' ?>" alt="faq icon">
            </i>
            <h6><?php the_sub_field('question') ?></h6>
            <i class="arrow">
              <?php include 'img/prod-in-home-new/faq-arrow.svg' ?>
            </i>
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


<!-- =========================================================
                The Help Button Section
========================================================= -->
<section class="prod-new--helpbtn">
  <div class="container">

    <div class="col-wraps">
      <article class="col col-l">
        <h2><?php the_field('help_button_title') ?></h2>
        <p><?php the_field('help_button_copy') ?></p>

        <div class="sec-wrap">
          <?php
          	if( have_rows('help_button_information_list') ):
          	while( have_rows('help_button_information_list') ): the_row();
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
         <?php $helpButton = get_field('help_button_images') ?>

        <div class="grid grid-1" style="background-image: url(<?php echo $helpButton[0]['image']; ?>);">
        </div>

        <?php if ($helpButton[1]['image']): ?>
        <div class="grid-2col">
          <div class="grid grid-twin" style="background-image: url(<?php echo $helpButton[1]['image']; ?>);">
          </div>
          <div class="grid grid-twin" style="background-image: url(<?php echo $helpButton[2]['image']; ?>);">
          </div>
        </div>
        <?php endif; ?>
         <?php if ($helpButton[3]['image']): ?>
          <div class="grid grid-3" style="background-image: url(<?php echo $helpButton[3]['image']; ?>);">
          </div>
        <?php endif; ?>
      </article>
    </div>

  </div>
</section>


<?php if (get_field('on_or_off_bella_charm_section')==='on'): ?>
<section class="prod--bella-charm" style="background-color: <?php the_field('pick_background_color') ?>">
  <figure class="left-flower" style="background-image: url('<?php the_field('bella_left_background_image') ?>')"> </figure>
  <figure class="right-flower" style="background-image: url('<?php the_field('bella_right_background_image') ?>')"> </figure>
  <div class="l-col">
    <?php
    	$c = 1;
      if( have_rows('bella_items_list') ):
      while( have_rows('bella_items_list') ): the_row();
    ?>
      <img class="color-pick <?php if($c===1): echo 'is-active'; endif; ?>" src="<?php the_sub_field('image') ?>">
    <?php
      $c++; endwhile; endif;
    ?>
    <img class="help-btn" src="<?php the_field('bella_help_button_image') ?>">
  </div>

  <div class="r-col">
    <h3><?php the_field('bella_title') ?></h3>
    <img class="bella" src="<?php the_field('bella_font_image') ?>">
    <p class="copy"><?php the_field('bella_copy') ?></p>
    <div class="bella-items-wrap">
      <?php
      	if( have_rows('bella_items_list') ):
      	while( have_rows('bella_items_list') ): the_row();
      ?>
        <div class="item">
          <img src="<?php the_sub_field('icon') ?>">
          <p><?php the_sub_field('icon_copy') ?></p>
        </div>
      <?php
      	endwhile; endif;
      ?>

    </div>

    <?php if (get_field('is_video_or_link_button_for_bella')==='link'): ?>
      <a class="btn" href="<?php the_field('bella_button_link') ?>"><?php the_field('bella_button_copy') ?></a>
    <?php else: ?>
      <a class="btn video-modal-call" data-videosrc="<?php the_field('bella_video_url') ?>"><?php the_field('bella_button_copy') ?></a>
    <?php endif; ?>
  </div>

</section>
 <?php endif; ?>


<section class="prod-new--wall-btn">
  <div class="background-img" style="background-image: url(<?php the_field('wall_background_image') ?>);">
  </div>

  <div class="container">
    <article class="text-box">
      <div class="title-wrap">
        <h2><?php the_field('wall_title') ?></h2>
        <p><?php the_field('wall_title_copy') ?></p>
      </div>
      <?php the_field('wall_copy') ?>
    </article>
  </div>
</section>

<section class="smartwatch--specifications">
  <h2><?php the_field('specifications_title') ?></h2>
  <div class="row">
    <div class="l-col">
      <?php
      	$c = 1;
      	if( have_rows('specifications_list') ):
      	while( have_rows('specifications_list') ): the_row();
      ?>
        <img class="<?php if($c===1): echo 'is-active'; endif; ?>" src="<?php the_sub_field('image') ?>">
      <?php
      	$c++; endwhile; endif;
      ?>
    </div>

    <div class="r-col">
      <div class="list-wrap">
        <?php
        	$n = 1;
        	if( have_rows('specifications_list') ):
        	while( have_rows('specifications_list') ): the_row();
        ?>
        <div class="item <?php if($n===1): echo 'is-active'; endif; ?>">
          <span><?php echo $n ?></span>
          <div class="box">
            <p><?php the_sub_field('sub_title') ?></p><small><?php the_sub_field('small_text') ?></small>
          </div>
        </div>
        <?php
        	$n++; endwhile; endif;
        ?>
      </div>

      <div class="mobile-list-wrap">
        <?php
        	$n = 1;
        	if( have_rows('specifications_list') ):
        	while( have_rows('specifications_list') ): the_row();
        ?>
        <div class="item-wrap">
          <div class="item">
            <span><?php echo $n ?></span>
            <div class="box">
              <p><?php the_sub_field('sub_title') ?></p><small><?php the_sub_field('small_text') ?></small>
            </div>
          </div>
          <img class="<?php if($n===1): echo 'is-active'; endif; ?>" src="<?php the_sub_field('image') ?>">
        </div>
        <?php
        	$n++; endwhile; endif;
        ?>
      </div>
    </div>
  </div>
</section>

<?php if (get_field('on_or_off_features_section')==='on'): ?>
<section class="prod-new--wall-features">
  <div class="container">
    <article class="content-box">
      <h5><?php the_field('features_title') ?></h5>
      <div class="feature-list-wrap">
        <?php
        	if( have_rows('features_list') ):
        	while( have_rows('features_list') ): the_row();
        ?>
        <div class="feature-box">
          <div class="icon-wrap">

            <img src="<?php the_sub_field('icon') ?>">
          </div>
          <p><?php the_sub_field('copy') ?></p>
        </div>
        <?php
        	endwhile; endif;
        ?>
      </div>

    </article>
  </div>
</section>
<?php endif; ?>


<?php if (get_field('on_or_off_monitoring_section')==='on'): ?>
<section class="<?php if(get_field('which_type_of_copy')==='long'): echo 'in-home-monitoring-more-copy'; else: echo 'in-home-monitoring'; endif; ?>" >
  <figure style="background-image: url(<?php the_field('monitoring_background_image') ?>)"> </figure>
  <article>
    <h2 style="color:<?php the_field('monitoring_title_color_picker') ?>"><?php the_field('monitoring_title') ?></h2>
    <?php the_field('monitoring_copy') ?>
    <div class="btn-wrap">
      <a class="blue btn-outline" href="<?php the_field('monitoring_button_url') ?>"><?php the_field('monitoring_button_copy') ?></a>
    </div>
  </article>
</section>
<?php endif; ?>

<?php if (get_field('turn_on_consultants')): ?>
<section class="prod-new--consultants">
  <div class="slider-wrap">
    <?php
    	if( have_rows('consultants_slider') ):
    	while( have_rows('consultants_slider') ): the_row();
    ?>
    <div class="person-info">
      <img src="<?php the_sub_field('image') ?>">
      <p class="name"><?php the_sub_field('name') ?></p>
    </div>
    <?php
    	endwhile; endif;
    ?>
  </div>
  <article>
    <h2><?php the_field('consultants_title') ?></h2>

    <?php the_field('consultants_copy') ?>
    <div class="btn-wrap">
      <a class="blue btn-outline" href="<?php the_field('consultants_button_url') ?>"><?php the_field('consultants_button_copy') ?></a>
    </div>
  </article>
</section>
<?php endif; ?>



<!-- =========================================================
                Base Station
========================================================= -->

<?php include 'inc/bottom-get-started.php' ?>

<?php get_footer(); ?>

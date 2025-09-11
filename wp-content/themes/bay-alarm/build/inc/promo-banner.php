<?php 
  $show_promo_banner = get_field('show_promo_banner', 'option');
  if ($show_promo_banner): 
?>

<!-- <div class="promo-banner--margin"></div> -->

<?php if (get_field('what_type_of_the_banner', 'option')==='automatically'): ?>
<?php
  date_default_timezone_set('America/Los_Angeles');
  $currentWeekDate   = date('d/m/Y');
  $currentMonth = date('m');
  $currentDay = date('d');
  $now = new DateTime("now");
  $count = 0;
	if( have_rows('promo_banner_list', 'option') ):
	while( have_rows('promo_banner_list', 'option') ): the_row();
  $startMonth = strtotime(get_sub_field('start_date'));
  $sMonth = date( 'm', $startMonth );
  $sDay = date( 'd', $startMonth );
  $endMonth = strtotime(get_sub_field('end_date'));
  $eMonth = date( 'm', $endMonth );
  $endDay = date( 'd', $endMonth );
?>

  <?php if(($sMonth <= $currentMonth) && ($currentMonth <= $eMonth ) ): ?>
    <?php if(($currentDay <= $endDay) && ($sDay <= $currentDay )): ?>
      <div class="pricing-promo--wrap">
        <div class="pricing-promo home-promo-banner" style="background: <?php the_sub_field('promo_banner_bg', 'option'); ?>;">
          <?php if (get_sub_field('promo_banner_desktop_image_bg', 'option')): ?>
            <img class="banner-bg desktop--bg" src="<?php the_sub_field('promo_banner_desktop_image_bg', 'option'); ?>" alt="">
          <?php endif; ?>

          <?php if (get_sub_field('promo_banner_mobile_image_bg', 'option')): ?>
            <img class="banner-bg mobile--bg" src="<?php the_sub_field('promo_banner_mobile_image_bg', 'option'); ?>" alt="">
          <?php endif; ?>
          <div class="pricing-promo-copy">
            <p>
              <?php the_sub_field('promo_banner_copy', 'option'); ?>
              <?php if (get_sub_field('promo_banner_cta_text', 'option')): ?>
                <a class="pricing-promo-cta" href="<?php the_sub_field('promo_banner_cta_url', 'option'); ?>" data-hex="<?php the_sub_field('promo_banner_save_bg', 'option'); ?>"><?php the_sub_field('promo_banner_cta_text', 'option'); ?></a></p>
              <?php endif; ?>
          </div>
          <div class="pricing-promo-save">
            <p style="background: <?php the_sub_field('promo_banner_save_bg', 'option'); ?>;"><?php the_sub_field('promo_banner_save', 'option'); ?></p>
          </div>
        </div>
      </div>
    <?php $count++; ?>
    <?php endif; ?>
    <?php endif; ?>
<?php
	endwhile; endif;
?>

<?php
  $c = 1;
  if( have_rows('promo_banner_list', 'option') ):
  while( have_rows('promo_banner_list', 'option') ): the_row();
?>
  <?php if ($count === 0): ?>
  <?php if ($c === 1): ?>
  <div class="pricing-promo--wrap">
    <div class="pricing-promo home-promo-banner" style="background: <?php the_sub_field('promo_banner_bg', 'option'); ?>;">
      <?php if (get_sub_field('promo_banner_desktop_image_bg', 'option')): ?>
        <img class="banner-bg desktop--bg" src="<?php the_sub_field('promo_banner_desktop_image_bg', 'option'); ?>" alt="">
      <?php endif; ?>

      <?php if (get_sub_field('promo_banner_mobile_image_bg', 'option')): ?>
        <img class="banner-bg mobile--bg" src="<?php the_sub_field('promo_banner_mobile_image_bg', 'option'); ?>" alt="">
      <?php endif; ?>
      <div class="pricing-promo-copy">
        <p>
          <?php the_sub_field('promo_banner_copy', 'option'); ?>
          <?php if (get_sub_field('promo_banner_cta_text', 'option')): ?>
            <a class="pricing-promo-cta" href="<?php the_sub_field('promo_banner_cta_url', 'option'); ?>" data-hex="<?php the_sub_field('promo_banner_save_bg', 'option'); ?>"><?php the_sub_field('promo_banner_cta_text', 'option'); ?></a></p>
          <?php endif; ?>
      </div>
      <div class="pricing-promo-save">
        <p style="background: <?php the_sub_field('promo_banner_save_bg', 'option'); ?>;"><?php the_sub_field('promo_banner_save', 'option'); ?></p>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php endif; ?>
  <?php
  	$c++; endwhile; endif;
  ?>

<?php else: ?>
  <div class="pricing-promo--wrap">
    <div class="pricing-promo home-promo-banner" style="background: <?php the_field('promo_banner_bg', 'option'); ?>;">
      <?php if (get_field('promo_banner_desktop_image_bg', 'option')): ?>
        <img class="banner-bg desktop--bg" src="<?php the_field('promo_banner_desktop_image_bg', 'option'); ?>" alt="">
      <?php endif; ?>

      <?php if (get_field('promo_banner_mobile_image_bg', 'option')): ?>
        <img class="banner-bg mobile--bg" src="<?php the_field('promo_banner_mobile_image_bg', 'option'); ?>" alt="">
      <?php endif; ?>
      <div class="pricing-promo-copy">
        <p>
          <?php the_field('promo_banner_copy', 'option'); ?>
          <?php if (get_field('promo_banner_cta_text', 'option')): ?>
            <a class="pricing-promo-cta" href="<?php the_field('promo_banner_cta_url', 'option'); ?>" data-hex="<?php the_field('promo_banner_save_bg', 'option'); ?>"><?php the_field('promo_banner_cta_text', 'option'); ?></a></p>
          <?php endif; ?>
      </div>
      <div class="pricing-promo-save">
        <p style="background: <?php the_field('promo_banner_save_bg', 'option'); ?>;"><?php the_field('promo_banner_save', 'option'); ?></p>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php endif; ?>

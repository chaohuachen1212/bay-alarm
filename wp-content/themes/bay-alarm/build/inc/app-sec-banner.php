<?php 
if ( get_field('show_app_section') === 'yes'  ) :
?>
<!-- =========================================================
                App Banner 
========================================================= -->
<section class="prod-app-section">
  <?php  
    if ( get_field('app_section_layout') === "left" ) {
      $reverseClass = "is-reverse";
    } else {
      $reverseClass = "";
    }
  ?>
  <div class="wrap <?php echo $reverseClass ?>">
    <article class="col col-text">
      <div class="text-wrap">
        <h3><?php the_field('app_section_heading') ?></h3>
        <p><?php the_field('app_section_subtext') ?></p>

        <?php if ( get_field('app_badge_buttons') === 'show' ) : ?>
        <div class="badge-wrap">
          <a href="<?php the_field('app_apple_store_url') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/app/app_store.png" alt="Apple App Store" target="_blank"></a>
          <a href="<?php the_field('app_google_store_url') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/app/google-play-button.png" alt="Google Play Store" target="_blank"></a>
        </div>
        <?php endif; ?>

      </div>
    </article>

    <article class="col col-img">
      <img itemprop="image" class="prod-img" src="<?php the_field('app_section_image') ?>">
    </article>
  </div>
</section>
<?php  
  endif;
?>
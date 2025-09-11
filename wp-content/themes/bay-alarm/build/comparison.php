<?php
  // Template Name: Comparison
  update_option('current_page_template', 'comparison');
  get_header();
  $hero_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
?>

<section class="compare-hero" style="background-image: url(<?php echo $hero_image; ?>);">
  <div class="center-all">
    <?php the_field('comparison_hero_copy'); ?>
  </div>
</section>

<section class="pricing-compare">

  <div class="inner-max-container">
    <article class="table-outer-wrap">
      <span class="frame-border"></span>

      <section class="cols-container">
        <span class="border-right"></span>
        <div class="col-title-wrap">
          <article class="col-title">
            <div class="cell">
              <!-- Empty cell -->
            </div>
            <?php
              if( have_rows('feature_name_column') ):
              while( have_rows('feature_name_column') ): the_row();
            ?>
            <div class="cell">
              <article class="text-wrap">
                <div class="text-box"><span class="text"><?php the_sub_field("name") ?></span></div>
              </article>
            </div>
            <?php
              endwhile; endif;
            ?>
          </article>
        </div>

        <article class="col-view-box">
          <span class="border-box">
            <a href="<?php the_field("order_button_link_comparison") ?>" class="table-order-btn">
              <span class="btn-outline blue">Order now</span>
            </a>
          </span>

          <div class="col-brands-wrap">
            <?php
              if( have_rows('brand_column') ):
              while( have_rows('brand_column') ): the_row();
            ?>
            <article class="col col-brand">

              <div class="cell cell-logo">
                <?php if (get_sub_field("logo_type") == "BayAlarmLogo") { ?>
                  <span class="logo1"><?php include 'inc/vectors/logo.svg' ?></span>
                  <span class="logo2"><?php include 'inc/vectors/logo2.svg' ?></span>
                <?php } else { ?>
                  <p><?php the_sub_field("logo_text") ?><span class="superscript">®</span></p>
                <?php } ?>
              </div>

              <?php
                if( have_rows('feature_input') ):
                while( have_rows('feature_input') ): the_row();
              ?>
              <div class="cell cell-content">
                <article class="text-wrap">
                  <div class="icon-box">
                     <?php if (get_sub_field("icon") == "checkIcon") { ?>
                    <span class="check-icon icon"><?php include "inc/vectors/checker.svg" ?></span>
                    <?php } elseif (get_sub_field("icon") == "crossIcon") { ?>
                    <span class="cross-icon icon"><?php include "inc/vectors/cross.svg" ?></span>
                    <?php } ?>
                  </div>
                  <div class="text-box">
                    <span class="text"><?php the_sub_field("text") ?></span>
                  </div>
                </article>
              </div>
              <?php endwhile; endif; ?>

            </article>
            <?php endwhile; endif; ?>

          </div> <!-- col-brands-wrap -->
        </article> <!-- col-view-box -->
      </section>

    </article>
  </div> <!-- inner-max-container -->
</section>

<?php if (get_field('show_lead_form')): ?>
<section class="fquote-sec-wrap" style="background-image: url(<?php the_field('fquote_image'); ?>)">
  <h1><?php the_field('fquote_heading'); ?></h1>
  <div class="box-wrap"<?php if(get_field('box_background_color')){?>style="background-color: <?php echo get_field('box_background_color'); ?>"<?php } ?>>

    <div class="step-wrap">

      <article class="step-panel is-active">
        <p class="step-q"><?php the_field('step_1_text'); ?></p>
        <ul>
          <li class="q-choice btn-outline blue" tabindex="0"><span>myself</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>spouse</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>parent</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>friend</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>other</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
        </ul>
      </article>

      <article class="step-panel">
        <p class="step-q"><?php the_field('step_2_text'); ?></p>
        <ul>
          <li class="q-choice btn-outline blue" tabindex="0"><span>Inside the home</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>On the go</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>Both</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
        </ul>
      </article>

      <article class="step-panel">
        <p class="step-q"><?php the_field('step_3_text'); ?></p>
        <ul>
          <li class="q-choice btn-outline blue" tabindex="0"><span>As soon as possible</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>within a week</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>within a month</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
          <li class="q-choice btn-outline blue" tabindex="0"><span>just researching</span><?php include 'inc/vectors/slider-nav-rightarrow-blk.svg' ?></li>
        </ul>
      </article>

      <article class="step-panel">
        <?php include 'inc/form-free-quote.php'; ?>
      </article>
    </div>

    <div class="back-wrap">
      <p class="back-btn" tabindex="0"><?php include 'inc/vectors/arrow.svg'; ?>Back</p>
    </div>

    <div class="fquote-steps-current">
      <div class="is-active"></div>
      <div></div>
      <div></div>
      <div></div>
    </div>

    <div class="bottom<?php echo ($path === 'get-started') ? ' gs-no-bg' : ''; ?>">
      <article class="col col-contact">
        <?php
          if ($path !== 'get-started'):
          $phoneNum = get_field("fquote_call_button_number");
          $purePhoneNum = preg_replace('/[^0-9]/', '', $phoneNum);
        ?>

        <p><?php the_field('fquote_call_button_text') ?></p>
        <span class="number"><a href="tel:<?php echo $purePhoneNum; ?>" class="promoNumber"><?php the_field('fquote_call_button_number') ?></a></span>
        <?php endif; ?>

      </article>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="compare-col">

  <?php if (have_rows('compare_copy_col')) : while (have_rows('compare_copy_col')) : the_row(); ?>

  <article>
    <?php the_sub_field('col_copy'); ?>
  </article>

  <?php endwhile; endif; ?>

</section>

<section class="compare-bottom" style="background-image: url(<?php the_field('comparison_footer_img'); ?>);">
  <article>
    <?php the_field('comparison_footer_copy'); ?>
    <?php if (have_rows('comparison_footer_btns')) : while (have_rows('comparison_footer_btns')) : the_row(); ?>
    <a href="<?php the_sub_field('comparison_footer_btn_url'); ?>" class="btn-outline white"><?php the_sub_field('comparison_footer_btn_text'); ?></a>
    <?php endwhile; endif; ?>
  </article>
</section>

<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>

<?php
  // Template Name: Pricing
  update_option('current_page_template', 'pricing-page');
  get_header();
  $show_customize_column = get_field('show_customize_column');
  $show_promo_banner = get_field('show_promo_banner', 'option');
?>

<?php //include 'inc/promo-banner.php' ?>

<div class="pricing-wrap<?php echo ($show_promo_banner) ? ' promo-on' : ''; ?>">
  <section class="pricing-hero">
    <div class="inner-max-container">
      <div class="pricing-step-heading first">
        <h2>1. Choose your service.</h2>
        <?php if (get_field('step_heading_node_copy')): ?>
          <p><?php the_field('step_heading_node_copy'); ?></p>
        <?php endif; ?>

        <?php
        $link = get_field('step_heading_node_copy_link');

        if( $link ):
        	$link_url = $link['url'];
        	$link_title = $link['title'];
        	$link_target = $link['target'] ? $link['target'] : '_self';
        	?>
        <a href="<?php echo esc_url($link_url); ?>"  target="<?php echo esc_attr($link_target); ?>">
          <?php echo esc_html($link_title); ?>
          <svg width="18" height="9" viewBox="0 0 18 9" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M16.9596 4.45957C17.2135 4.20573 17.2135 3.79417 16.9596 3.54033L12.823 -0.59624C12.5692 -0.850081 12.1576 -0.850081 11.9038 -0.59624C11.65 -0.342399 11.65 0.0691537 11.9038 0.322994L15.5808 3.99995L11.9038 7.67691C11.65 7.93075 11.65 8.3423 11.9038 8.59614C12.1576 8.84998 12.5692 8.84998 12.823 8.59614L16.9596 4.45957ZM0.5 4.64995H16.5V3.34995H0.5V4.64995Z" fill="#61A3B9"/>
          </svg>
        </a>
        <?php endif; ?>
      </div>

      <style>
      <?php
      	$n = 1;
      	if( have_rows('pricing_new_tab_colors') ):
      	while( have_rows('pricing_new_tab_colors') ): the_row();
      ?>
        a.pricing-nav-item:nth-of-type(<?php echo $n; ?>) .new-tab {background-color: <?php the_sub_field('tab_background') ?>; color:<?php the_sub_field('tab_text_color') ?>!important;}
        <?php
        	$n++; endwhile; endif;
        ?>
      </style>

      <div class="pricing-nav">
        <?php
          $a = 0;
          if( have_rows('product') ): while( have_rows('product') ): the_row();
          $activeClass = ($a === 0) ? ' is-active' : '';
          $hideCol = get_sub_field('hide_column');
        ?>
        <a class="pricing-nav-item<?php echo $activeClass; ?> <?php if(get_sub_field('turn_on_new_tab')): echo 'add-new-tab'; endif; ?>" href="#<?php the_sub_field('direct_url') ?>"
             data-step2title="<?php the_sub_field('step_2_title') ?>"
             data-stepnote="<?php the_sub_field('step_2_note') ?>"
             data-termname="<?php if( have_rows('plan') ): while( have_rows('plan') ): the_row(); echo get_sub_field('term_name') . ','; endwhile; endif; ?>"
             data-promoname="<?php if( have_rows('plan') ): while( have_rows('plan') ): the_row(); echo get_sub_field('promotion_text') . ','; endwhile; endif; ?>"
            <?php $c = 1; if( have_rows('plan') ): while( have_rows('plan') ): the_row(); ?>
             data-price-<?php echo $c; ?>="<?php the_sub_field('price') ?>"
             data-prodimg-<?php echo $c; ?>="<?php the_sub_field('plan_image') ?>"
             data-permonth-<?php echo $c; ?>="<?php the_sub_field('per_month_text') ?>"
             data-orderlink-<?php echo $c; ?>="<?php the_sub_field('order_button_url') ?>"
             data-ordertext-<?php echo $c; ?>="<?php the_sub_field('order_button_text') ?>"
             data-tagoption-<?php echo $c; ?>="<?php the_sub_field('tag_option') ?>"
             data-promoption-<?php echo $c; ?>="<?php the_sub_field('promo_tag_option') ?>"
             data-tagtext-<?php echo $c; ?>="<?php the_sub_field('tag_text') ?>"
             data-small-permonth-<?php echo $c; ?>="<?php the_sub_field('small_per_month_text') ?>"
             data-hidecol="<?php echo $hideCol ?>"

            <?php $c++; endwhile; endif; ?>
        >
          <span class="new-tab"><?php the_sub_field('new_tab_text') ?></span>
          <div class="pricing-nav-icon">
            <?php
              // $product_icon = get_sub_field('product_icon');
              // echo file_get_contents($product_icon);
              the_sub_field('product_icon');
            ?>
          </div>
          <span><?php the_sub_field('product_name'); ?></span>
        </a>
        <?php $a++; endwhile; endif; ?>
      </div>

      <div class="pricing-step-heading">
        <h2>2. Choose your package.</h2>
      </div>

      <div style="display: none" class="text-box-wrap">
        <article class="text-box">
          <div class="cell">
            <h1 class="heading"><?php the_field("heading") ?></h1>
          </div>
          <div class="cell">
            <p class="copy"><?php the_field("subtext") ?></span></p>
          </div>
        </article>
      </div>
    </div>
  </section>


  <!-- ================================================
              Desktop Pricing Table
  ================================================ -->
  <section class="p-pricetable-d inner-max-container">
    <div class="wrap">
      <article class="table-wrap">
        <div class="highlight-box<?php echo ($show_customize_column) ? ' custom-highlight' : ''; ?>"></div>
        <table>

          <!-- Table Head -->

          <thead>
            <tr>
              <td class="step2-cell">
                <h4>Choose Package</h4>
                <p class="plan-note">America's #1-rated medical alert system. Complete protection for inside the home. All packages include your choice of a necklace or wrist button. Easy plug & play installation.</p>
              </td>

              <?php
                $b=0;
                if( have_rows('product') ): while( have_rows('product') ): the_row();

                if ($b === 0) :
                  $k = 0;
                  if( have_rows('plan') ): while( have_rows('plan') ): the_row();
                    ($k === 0) ?  $term = 'annual' :
                    (($k === 1) ? $term = 'semi' : $term = 'monthly' );

              ?>
              <td class="thead-<?php echo $term ?>" >
                <?php
                  // NOTE: the 'most popular' tag element is created in pricing.js
                ?>


                <p class="term"><?php the_sub_field('term_name'); ?></p>





                <img class="prod-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8Xw8AAoMBgDTD2qgAAAAASUVORK5CYII=" alt="product image">

                <div>
                  <a class="btn-outline blue prod-img-btn" rel="noopener" href="#/">Order Now</a>
                </div>
                <p class="whole-price">
                  <span class="price"><!-- (text update with js) --></span><span class="small-permonth"></span>
                </p>
                <p class="whole-installment">
                  <span class="per-mo"><!-- (text update with js) --></span>
                </p>
              </td>
                <?php $k++; endwhile; endif; ?>

              <?php
                  endif;
                $b++; endwhile; endif;
              ?>

              <?php if ($show_customize_column): ?>
              <td class="customize-column">
                <p class="term"><?php the_field('custom_top_text'); ?></p>
                <p class="custom-heading"><?php the_field('custom_title'); ?></p>
                <p class="whole-installment">
                  <span class="per-mo"><?php the_field('custom_bottom_text'); ?></span>
                </p>
              </td>
              <?php endif; ?>

            </tr>
          </thead>


          <!-- Table BODY -->

          <?php
            $c = 0; if (have_rows('product')): while (have_rows('product')): the_row();
             $hideCol = (int)get_sub_field('hide_column') - 1;
          ?>
          <tbody class="pricing-table-body<?php echo ($c === 0) ? ' is-active' : ''; ?>"
            data-hide-col="<?php if ( $hideCol ) { echo $hideCol; } ?>">
            <?php
              $row_count = count(get_sub_field('feature_rows'));
              $r = 1;
              if (have_rows('feature_rows')): while (have_rows('feature_rows')): the_row();
                $has_info = get_sub_field('info_box');
            ?>
            <tr>
              <td>
                <div class="feature-name">
                  <p><?php the_sub_field('row_title'); ?></p>
                  <?php if ($has_info): ?>
                  <span class="exclamation-btn"><u>i</u></span>
                  <?php endif; ?>
                </div>
                <?php if ($has_info): ?>
                <div class="desc-box">
                  <div class="desc-box-inner">
                    <?php if (get_sub_field('info_image')): ?>
                    <img src="<?php echo esc_url(get_sub_field('info_image')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('info_image')['alt']); ?>">
                    <hr>
                    <?php endif; ?>
                    <p><?php the_sub_field('info_description'); ?></p>
                  </div>
                </div>
                <?php endif; ?>
              </td>
              <?php
                if (have_rows('row_columns')): while (have_rows('row_columns')): the_row();
                  $col_type = get_sub_field('col');
              ?>
              <td>
                <p>
                  <?php if ($col_type !== 'text'): ?>
                  <span class="check<?php echo ($col_type === 'no-check') ? ' is-disable' : ''; ?>"><?php include 'inc/vectors/check.svg'; ?></span>
                  <?php
                    else:
                      the_sub_field('col_text');
                    endif;
                  ?>
                </p>
              </td>
            <?php endwhile; endif; ?>

            <?php if ($show_customize_column): ?>
              <td>
                <p>
                  <?php if ($r < $row_count): ?>
                  <span><?php include 'inc/vectors/plus.svg'; ?></span>
                  <?php else: ?>
                  <?php the_field('custom_save_text'); ?>
                  <?php endif; ?>
                </p>
              </td>
            <?php endif; ?>

            </tr>

          <?php
            $r++;
            endwhile;
            endif; // end feature_rows
            echo '</tbody>';
            $c++;
            endwhile;
            endif; // end product
          ?>


          <!-- Table FOOT -->
          <tfoot>
            <tr>
              <td></td>
              <td><a class="o-btn-annual btn-outline blue" rel="noopener" href="#/">Order Now</a></td>
              <td><a class="o-btn-semi btn-outline blue" rel="noopener" href="#/">Order Now</a></td>
              <td><a class="o-btn-monthly btn-outline blue" rel="noopener" href="#/">Order Now</a></td>
              <?php if ($show_customize_column): ?>
              <td><a class="btn-outline blue" href="<?php the_field('custom_cta_url'); ?>"><?php the_field('custom_cta_text'); ?></a></td>
              <?php endif; ?>
            </tr>
          </tfoot>
        </table>
      </article>
      <p class="p-btm-note"><?php the_field('table_bottom_note') ?></p>
    </div>
  </section>
</div>

  <!-- ================================================
              Mobile Pricing Table
  ================================================ -->
<section class="p-pricetable-m inner-max-container">

  <div class="pricing-slider">

    <?php
      $c = 0;
      if( have_rows('product') ): while( have_rows('product') ): the_row();
      $hiddenPlan = get_sub_field('hide_column');
    ?>
    <div class="prod-container">
      <div class="img-sec dividing-sec mobile-price-table-top-wrap">
        <!-- <div class="prod-icon">
          <?php $product_icon = get_sub_field( 'product_icon' ); ?>
          <?php echo file_get_contents( $product_icon ); ?>
        </div> -->
        <p class="prod-name" data-hide-plan="">
          <span><?php the_sub_field('product_name') ?></span>
        </p>
        <p class="plan-note"><?php the_sub_field('step_2_note'); ?></p>

        <div class="mobile-plan-nav">
          <?php
            $k = 0;
            if (have_rows('plan')): while (have_rows('plan')): the_row();
              $id =  strtolower(str_replace([' ', '+'], '-', get_sub_field('term_name')));
          ?>
          <a href="#<?php echo $id . '-' . $c; ?>"<?php echo ($k === 0) ? ' class="is-active"' : ''; ?>><?php the_sub_field('term_name'); ?></a>
          <?php $k++; endwhile; endif; ?>
        </div>
      </div>

      <div class="plan-sec-wrap">
      <?php
        $k = 0;
        $anchor_offset = ($show_promo_banner) ? '-120px' : '-40px';
        if( have_rows('plan') ):
        while( have_rows('plan') ): the_row();
          $id =  strtolower(str_replace([' ', '+'], '-', get_sub_field('term_name')));
      ?>
        <div class="plan-sec dividing-sec<?php echo (get_sub_field('tag_option') === 'yes') ? ' sec-most-popular' : ''; ?>">
          <div id="<?php echo $id . '-' . $c; ?>" style="position: relative; top: <?php echo $anchor_offset; ?>;"></div>
          <div class="plan-sec-inner">
            <div class="plan-sec-toggle">
              <?php if ( get_sub_field('tag_option') === 'yes' ) : ?>
              <p class="tag"><?php the_sub_field('tag_text') ?></p>
              <?php endif; ?>

              <p class="term"><?php the_sub_field('term_name') ?></p>
              <!-- <?php
                $k = 1;
                if (have_rows('features_mobile')): while (have_rows('features_mobile')): the_row();
              ?>
              <?php if($k === 1):  ?>
                <p class="mobile-features-text"><?php the_sub_field('mobile_feature'); ?></p>
               <?php endif; ?>
              <?php $k++; endwhile; endif; ?> -->
              <img class="prod-img" src="<?php the_sub_field('plan_image'); ?>" alt="product image">

              <div class="prod-mobile-price">
                <p class="whole-price" data-price="<?php the_sub_field('price') ?>">
                  <span class="price">263</span><span class="small-permonth"><?php the_sub_field('small_per_month_text'); ?></span>
                </p>

                <?php if ( get_sub_field('show_per_month') === 'yes' ) : ?>
                <p class="whole-installment">
                  <span class="per-mo"><?php the_sub_field('per_month_text') ?></span>
                </p>
                <?php endif; ?>
              </div>
            </div>

            <div class="plan-sec-bottom">
              <div class="plan-features-wrap">
                <article class="plan-features">
                  <div class="feature-row">
                    <div class="feature-row-label">
                      <span class="check-icon icon"><?php include "inc/vectors/checker.svg" ?></span>
                      <?php
                        $k = 1;
                        if (have_rows('features_mobile')): while (have_rows('features_mobile')): the_row();
                      ?>
                      <?php if($k === 1):  ?>
                        <p class="feature-name"><?php the_sub_field('mobile_feature'); ?></p>
                      <?php endif; ?>
                      <?php $k++; endwhile; endif; ?>
                    </div>

                  </div>
                  <?php
                    $f = 0;
                    if (have_rows('features_mobile')): while (have_rows('features_mobile')): the_row();
                      $has_info = get_field('product')[$c]['feature_rows'][$f]['info_box'];
                      $info_img = get_field('product')[$c]['feature_rows'][$f]['info_image'];
                      $info_desc = get_field('product')[$c]['feature_rows'][$f]['info_description'];
                  ?>
                  <?php if($f > 0):  ?>
                  <div class="feature-row">
                    <div class="feature-row-label">
                      <span class="check-icon icon"><?php include "inc/vectors/checker.svg" ?></span>

                        <p class="feature-name"><?php the_sub_field('mobile_feature'); ?></p>

                      <?php if ($has_info): ?>
                      <span class="m-exclamation-btn"><u>i</u></span>
                      <?php endif; ?>
                    </div>
                    <?php if ($has_info): ?>
                    <div class="feature-row-info">
                      <img src="<?php echo esc_url($info_img['url']); ?>" alt="<?php echo esc_attr($info_img['alt']) ?>">
                      <p><?php echo $info_desc; ?></p>
                    </div>
                    <?php endif; ?>
                  </div>
                  <?php endif; ?>
                  <?php $f++; endwhile; endif; ?>
                </article>

                <?php if (get_sub_field('order_button_url')): ?>
                <article class="order-btn">
                  <a href="<?php the_sub_field('order_button_url'); ?>" rel="noopener" class="o-btn-annual btn-outline blue"><?php the_sub_field('order_button_text'); ?></a>
                </article>
                <?php endif; ?>


              </div>
            </div>
          </div>
        </div>
      <?php $k++; endwhile; endif; ?>
        <?php if ($show_customize_column): ?>
        <div class="plan-sec dividing-sec custom-sec">
          <div class="plan-sec-inner">
            <div class="plan-sec-toggle">
              <p class="term"><?php the_field('custom_top_text'); ?></p>

              <div class="prod-mobile-price">
                <p class="whole-price">
                  <span class="price-custom"><?php the_field('custom_save_text'); ?></span>
                </p>
              </div>
            </div>

            <div class="plan-sec-bottom">
              <div class="plan-features-wrap">
                <article class="order-btn">
                  <a href="#!" rel="noopener" class="btn-outline blue"><?php the_field('custom_cta_text'); ?></a>
                </article>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <?php $c++; endwhile; endif; ?>
  </div>

  <p class="mobile-p-btm-note"><?php the_field('table_bottom_note') ?></p>

</section>


<?php include 'inc/price-compare.php' ?>

<!-- ================================================
          Three  Articles
================================================ -->
<?php if (get_field('turn_on_three_sections_article')): ?>
<section class="pricing-articles <?php if(get_field('turn_on_price_compare')==='on'): echo 'no-border-top'; endif; ?>">

  <div class="inner-max-container">
    <div class="article-container">

      <article class="cell-wrap right">
        <?php
          $count = 1;
          if( have_rows('article') ):
          while( have_rows('article') ): the_row();
          if ($count === 1) :
        ?>
        <section class="cell-content">
          <div class="img-box">
            <img class="article-img" src="<?php echo esc_url(get_sub_field("image")['url']) ?>" alt="<?php echo esc_attr(get_sub_field("image")['alt']) ?>">
          </div>
          <div class="text-box">
            <?php if (get_sub_field("type") === "save") { ?>
            <p class="tag save"><?php the_sub_field('label_text') ?></p>
            <?php } else if (get_sub_field("type") === "free") { ?>
            <p class="tag free"><?php the_sub_field('label_text') ?></p>
            <?php } ?>
            <h3 class="heading"><?php the_sub_field("title") ?></h3>
            <p class="copy"><?php the_sub_field("copy") ?></p>
          </div>
        </section>
        <?php
          endif; $count++; endwhile; endif;
        ?>
      </article>

      <article class="cell-wrap left">
        <?php
          $count = 1;
          if( have_rows('article') ):
          while( have_rows('article') ): the_row();
          if ($count > 1) :
        ?>
        <section class="cell-content">
          <div class="img-box">
            <img class="article-img" src="<?php echo esc_url(get_sub_field("image")['url']) ?>" alt="<?php echo esc_attr(get_sub_field("image")['alt']) ?>">
          </div>
          <div class="text-box">
            <?php if (get_sub_field("type") === "save") { ?>
            <p class="tag save"><?php the_sub_field('label_text') ?></p>
            <?php } else if (get_sub_field("type") === "free") { ?>
            <p class="tag free"><?php the_sub_field('label_text') ?></p>
            <?php } ?>
            <h3 class="heading"><?php the_sub_field("title") ?></h3>
            <p class="copy number"><?php the_sub_field("copy") ?></p>
          </div>
        </section>
        <?php
          endif; $count++; endwhile; endif;
        ?>
      </article>

    </div>
  </div>
</section>
<?php endif; ?>

<!-- ================================================
          Four  Articles
================================================ -->
<?php if (get_field('turn_on_four_sections_article')): ?>
<section class="pricing--articles-four">
  <div class="inner-max-container">
    <div class="article-container">
      <?php
      	if( have_rows('four_articles') ):
      	while( have_rows('four_articles') ): the_row();
      ?>
      <div class="article">
        <div class="img-wrap">
          <img src="<?php echo esc_url(get_sub_field('image')['url']) ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']) ?>">
        </div>
        <div class="copy">
          <h3><?php the_sub_field('title') ?></h3>
          <p><?php the_sub_field('copy') ?></p>
        </div>
      </div>
      <?php
      	endwhile; endif;
      ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (get_field('turn_on_comparison_section')): ?>
<!-- ================================================
            Comparable Table
================================================ -->
<section class="pricing-compare">

  <div class="inner-max-container">
    <article class="intro-wrap">
      <h2 class="heading"><?php the_field("comparison_heading") ?></h2>
      <p><?php the_field("comparison_subtext") ?></p>
    </article>

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
              <span class="btn-outline blue"><?php the_field('order_button_text_comparison') ?></span>
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
                  <p><?php the_sub_field("logo_text") ?></p>
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
<?php endif; ?>




<section class="pricing-faq">
  <div class="inner-max-container">
    <div class="col-container">
      <article class="col-left">
        <?php
          if( have_rows('left_column_faq') ):
          while( have_rows('left_column_faq') ): the_row();
        ?>
        <div class="text-wrap">
          <p class="question"><?php the_sub_field("question") ?></p>
          <div class="answer"><p><?php the_sub_field("answer") ?></p></div>
        </div>
        <?php endwhile; endif; ?>
      </article>

      <article class="col-right">
        <?php
          if( have_rows('right_column_faq') ):
          while( have_rows('right_column_faq') ): the_row();
        ?>
        <div class="text-wrap">
          <p class="question"><?php the_sub_field("question") ?></p>
          <div class="answer"><p><?php the_sub_field("answer") ?></p></div>
        </div>
        <?php endwhile; endif; ?>
      </article>
    </div>
  </div>
</section>

<?php include 'inc/rating-section.php'; ?>
<?php include 'inc/bottom-get-started.php'; ?>

<?php get_footer(); ?>

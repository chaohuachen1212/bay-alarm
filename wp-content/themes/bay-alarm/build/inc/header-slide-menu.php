<div class="header-menu-overlay"></div>

<section class="header-slide-menu">

  <div class="header-menu-close">
    <?php include GET_DIR . '/img/ui/x-circle-fill.svg' ?>
  </div>
  
  <div class="header-slide-menu-inner">
    
    <!-- Slider menu: Call Now -->
    <a href="tel:<?php echo $purePhoneNum; ?>"  class="call-contact" tabindex="0" role="button">
      <p class="call-info-text">
        <span class="phone-icon"><?php include GET_DIR . '/img/ui/telephone-fill.svg'; ?></span>
        <span>
          <span class="phone-text">Call Now -</span>
          <span class="phone-num"><?php echo $phoneNum; ?></span>
        </span>
      </p>
    </a>

    <!-- Slider menu: Free Trial -->
    <a href="<?php echo home_url(); ?>/free-quote"  class="mobile-btn-free-trial">
        <?php include GET_DIR . '/img/ui/bookmark-heart.svg'; ?>
        <span><?php the_field('mobile_risk_free_text'); ?></span>
      </a>


    <article class="mobile-menu-item-wrap">
      <ul>
        <?php
          $count = 1;
          if( have_rows('nav_items') ):
          while( have_rows('nav_items') ): the_row();
          $hasSubmenu = get_sub_field('has_subnav');
          $SubnavType = get_sub_field('subnav_type');
          $addClass = get_sub_field('add_class');
          $textColor = get_sub_field('text_color');

          if ( $addClass === "yes") {
            $itemClassName = get_sub_field('class_name');
          } else {
            $itemClassName = '';
          }

          if ( $textColor === "yes") {
            $pickedTextColor = get_sub_field('choose_text_color');
          } else {
            $pickedTextColor = '';
          }

          $urlType = get_sub_field('url_type');
          if ( $urlType === "internal") {
            $rootItemURL = get_sub_field("internal_link");
          } else if ( $urlType === "external") {
            $rootItemURL = get_sub_field("external_link");
          } else {
            $rootItemURL = "";
          }

          if ( $SubnavType === "products" || $SubnavType === "text") {
            $parentClass = 'is-parent';
          } else {
            $parentClass = '';
          }
        ?>
        <li>
          <a href="<?php echo $rootItemURL; ?>" class="m-menu-item <?php echo $itemClassName; ?> <?php echo $parentClass; ?>">
            <span class="m-menu-item-text" style="color: <?php echo $pickedTextColor; ?>"><?php the_sub_field("nav_item"); ?></span>
            <?php if ($parentClass === 'is-parent') { include GET_DIR . '/img/ui/menu-arrow-down.svg'; } ?>
          </a>

            <?php
              if ( $SubnavType === "products") {
                if( have_rows('products_subnav') ): ?>
                <ul>
                <?php while( have_rows('products_subnav') ): the_row(); ?>

            <li class="image-nav">
              <a href="<?php the_sub_field('link'); ?>" class="m-menu-item <?php echo $itemClassName; ?>">
                <figure>
                  <img src="<?php the_sub_field('product_image'); ?>">
                </figure>
                <span class="m-menu-item-text"><?php the_sub_field("product_name"); ?></span>
              </a>
            </li>

            <?php endwhile; ?>
            <div class="right-col <?php if(get_sub_field('turn_off_subnav_right')): echo 'turn-off-subnav-right'; endif; ?>">
              <?php
                if( have_rows('products_subnav_right') ):
                while( have_rows('products_subnav_right') ): the_row();
              ?>

              <?php

              $link = get_sub_field('link');

              if( $link ):
                $link_url = $link['url'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
              <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                <img src="<?php the_sub_field('image'); ?>">
                <h5>
                  <?php the_sub_field('title'); ?>
                  <svg width="8" height="11" viewBox="0 0 8 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1.67139 10.1715L6.3429 5.5L1.67139 0.828491" stroke="#61A3B9" stroke-width="2"/>
                  </svg>
                </h5>
              </a>
              <?php endif; ?>
              <?php
                endwhile; endif;
              ?>

            </div>
                </ul>
            <?php
                endif;
              } else {
                if( have_rows('plain_text_subnav') ):?>
                  <ul>
                  <?php
                    while( have_rows('plain_text_subnav') ): the_row();
                      $subItemLink        = (get_sub_field('link_type') === 'internal') ? get_sub_field("link") : get_sub_field("external");
                  ?>
            <li>
              <a href="<?php echo $subItemLink; ?>" class="m-menu-item"<?php echo (get_sub_field('link_type') === 'external') ? ' rel="noopener" target="_blank"' : ''; ?>>
                <span class="m-menu-item-text"><?php the_sub_field("sub_item_name"); ?></span>
              </a>
            </li>
            <?php endwhile; ?>
                </ul>
            <?php endif;
              } // end if
            ?>
        </li>
        <?php $count++; endwhile; endif; ?>



        <?php
          $count = 1;
          if( have_rows('mini_nav_items') ):
          while( have_rows('mini_nav_items') ): the_row();
          $hasSubmenu = get_sub_field('has_subnav');
          $SubnavType = get_sub_field('subnav_type');
          $addClass = get_sub_field('add_class');
          $textColor = get_sub_field('text_color');

          if ( $addClass === "yes") {
            $itemClassName = get_sub_field('class_name');
          } else {
            $itemClassName = '';
          }

          if ( $textColor === "yes") {
            $pickedTextColor = get_sub_field('choose_text_color');
          } else {
            $pickedTextColor = '';
          }

          $urlType = get_sub_field('url_type');
          if ( $urlType === "internal") {
            $rootItemURL = get_sub_field("internal_link");
          } else if ( $urlType === "external") {
            $rootItemURL = get_sub_field("external_link");
          } else {
            $rootItemURL = "";
          }

          if ( $hasSubmenu ) {
            $parentClass = 'is-parent';
          } else {
            $parentClass = '';
          }

          if($count> 1) {
        ?>
        <li>
          <a href="<?php echo $rootItemURL; ?>" class="m-menu-item <?php echo $itemClassName; echo $parentClass; ?>">
            <span class="m-menu-item-text" style="color: <?php echo $pickedTextColor; ?>"><?php the_sub_field("nav_item"); ?></span>
            <?php if ($parentClass === 'is-parent') { include GET_DIR . '/img/ui/menu-arrow-down.svg'; } ?>
          </a>
            <?php
              if( have_rows('plain_text_subnav') ):?>
                <ul>
                  <?php
                    while( have_rows('plain_text_subnav') ): the_row();
                      $subItemLink        = (get_sub_field('link_type') === 'internal') ? get_sub_field("link") : get_sub_field("external");
                  ?>
                  <li>
                    <a href="<?php echo $subItemLink; ?>" class="m-menu-item"<?php echo (get_sub_field('link_type') === 'external') ? ' rel="noopener" target="_blank"' : ''; ?>>
                      <span class="m-menu-item-text"><?php the_sub_field("sub_item_name"); ?></span>
                    </a>
                  </li>
                  <?php endwhile; ?>
                </ul>
            <?php endif;?>
        </li>
        <?php } $count++; endwhile; endif; ?>


        <!-- Slider menu: Sign in -->
      <a href="<?php the_field('account_button_link') ?>" class="mobile-btn-link mobile-btn-signin">
        <div class="icon"><?php include GET_DIR . '/img/ui/person-circle.svg'; ?></div>
        <p><?php the_field('account_mobile_text') ?></p>
        <div class="arrow"><?php include GET_DIR . '/img/ui/menu-arrow-right.svg'; ?></div>
      </a>
      

      <!-- Slider menu: Search -->
      <div class="header-mobile-search">
        <div class="mobile-search-wrap">
          <form role="search" method="get" action="<?php echo home_url('/'); ?>">
          <label class="search-label" for="header-search" aria-labelledby="searchTitle"><span>Search this site</span></label>
          <input  id="header-search" type="search" class="search-input" name="s" placeholder="Search"/>
          <button title="Search this site" type="submit" class="header-search-btn">
            <?php include GET_DIR . '/img/ui/search.svg'; ?>
          </button>
          </form>
        </div>
      </div>

      <?php
          $count = 1;
          if( have_rows('mini_nav_items') ):
          while( have_rows('mini_nav_items') ): the_row();
          $hasSubmenu = get_sub_field('has_subnav');
          $SubnavType = get_sub_field('subnav_type');
          $addClass = get_sub_field('add_class');
          $textColor = get_sub_field('text_color');

          if ( $addClass === "yes") {
            $itemClassName = get_sub_field('class_name');
          } else {
            $itemClassName = '';
          }

          if ( $textColor === "yes") {
            $pickedTextColor = get_sub_field('choose_text_color');
          } else {
            $pickedTextColor = '';
          }

          $urlType = get_sub_field('url_type');
          if ( $urlType === "internal") {
            $rootItemURL = get_sub_field("internal_link");
          } else if ( $urlType === "external") {
            $rootItemURL = get_sub_field("external_link");
          } else {
            $rootItemURL = "";
          }

          if ( $hasSubmenu ) {
            $parentClass = 'is-parent';
          } else {
            $parentClass = '';
          }

          if($count==1) {
        ?>
        <li>
          <a href="<?php echo $rootItemURL; ?>" class="m-menu-item <?php echo $itemClassName; echo $parentClass; ?>">
            <span class="m-menu-item-text" style="color: <?php echo $pickedTextColor; ?>"><?php the_sub_field("nav_item"); ?></span>
            <?php if ($parentClass === 'is-parent') { include GET_DIR . '/img/ui/menu-arrow-down.svg'; } ?>
          </a>
            <?php
              if( have_rows('plain_text_subnav') ):?>
                <ul>
                  <?php
                    while( have_rows('plain_text_subnav') ): the_row();
                      $subItemLink        = (get_sub_field('link_type') === 'internal') ? get_sub_field("link") : get_sub_field("external");
                  ?>
                  <li>
                    <a href="<?php echo $subItemLink; ?>" class="m-menu-item"<?php echo (get_sub_field('link_type') === 'external') ? ' rel="noopener" target="_blank"' : ''; ?>>
                      <span class="m-menu-item-text"><?php the_sub_field("sub_item_name"); ?></span>
                    </a>
                  </li>
                  <?php endwhile; ?>
                </ul>
            <?php endif;?>
        </li>
        <?php } $count++; endwhile; endif; ?>
        
      </ul>



    </article>


  </div>
</section>
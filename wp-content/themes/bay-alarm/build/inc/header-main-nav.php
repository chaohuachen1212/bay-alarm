<div class="header-wrap">
  <div class="content-wrap">
    <!-- Logo -->
    <?php $logo_url = ($page_temp !== 'pricing-pla.php') ? get_home_url() : '#!'; ?>
    <a href="<?php echo $logo_url; ?>" class="header-logo" aria-current="page" aria-label="Bay Alarm Medical" tabindex="0">
      <span class="logo-desk">
      <?php include GET_DIR . '/inc/vectors/logo-new.svg'; ?>
      </span>
      <span class="logo-mobile">
      <?php include GET_DIR . '/inc/vectors/logo-new-white.svg'; ?>
      </span>
    </a>

    <style>
      .header-nav a.prod-sub-url .new-tab {background-color: <?php the_field('new_tab_background') ?>; color:<?php the_field('new_tab_text_color') ?>;}
    </style>

    <!-- Navigation -->
    <nav class="header-nav">
      <ul class="nav-root" role="nav">

        <?php
          if( have_rows('nav_items') ):
          while( have_rows('nav_items') ): the_row();
          $hasSubmenu = get_sub_field('has_subnav');
          $SubnavType = get_sub_field('subnav_type');

          if ( $SubnavType === "products") {
            $subnavTypeClass = "has-submenu has-prod-submenu";
          } else if ( $SubnavType === "text") {
            $subnavTypeClass = "has-submenu";
          } else {
            $subnavTypeClass = "";
          }

          $urlType = get_sub_field('url_type');
          if ( $urlType === "internal") {
            $rootItemURL = get_sub_field("internal_link");
          } else if ( $urlType === "external") {
            $rootItemURL = get_sub_field("external_link");
          } else {
            $rootItemURL = "";
          }

          $itemPathName        = basename($rootItemURL);
          if ( $currentPathName === $itemPathName ) {
            $itemActiveClass = "is-active";
          } else {
            $itemActiveClass = "";
          }
        ?>
        <li class="menu-item <?php echo $subnavTypeClass ?> <?php echo $itemActiveClass ?> ">
          <a role="button" href="<?php echo $rootItemURL; ?>" <?php echo (get_sub_field('open_new_tab') === 'yes') ? 'target="_blank"' : '';  ?> class="menu-item-link">
            <span class="menu-item-text"><?php the_sub_field("nav_item"); ?></span>
          </a>

          <!-- Products Submenu -->
          <?php if ( $SubnavType === "products") { ?>
          <div class="submenu-wrap <?php if(get_sub_field('turn_off_subnav_right')): echo 'turn-off-subnav-right'; endif; ?> <?php the_sub_field('class_name'); ?> ">
            <div class="submenu-uparrow"></div>

            <ul class="prod-submenu">
              <?php
                if( have_rows('products_subnav') ):
                while( have_rows('products_subnav') ): the_row();

                $currentPathName    = basename($currentPath);
                $subItemLink        = get_sub_field("link");
                $subItemPathName    = basename($subItemLink);
                if ( $currentPathName === $subItemPathName ) {
                  $subItemActiveClass = "is-active";
                } else {
                  $subItemActiveClass = "";
                }
              ?>
              <li class="prod-sub-col <?php echo $subItemActiveClass; ?>">
                <a class="prod-sub-url <?php if(get_sub_field('turn_on_new_tab')): echo 'add-new-tab'; endif; ?>" href="<?php the_sub_field('link'); ?>">
                  
                  <figure>
                    <img class="col-prod-img" src="<?php the_sub_field('product_image'); ?>">
                  </figure>
                  <div class="card-text-wrap">
                    <p class="new-tab"><?php the_sub_field('new_tab_text'); ?></p>
                    <h5 class="col-prod-title">
                      <span>
                        <?php the_sub_field("product_name"); ?>
                      </span>
                    </h5>
                    <p class="col-prod-text"><?php the_sub_field("text"); ?></p>
                    <p class="col-prod-price">
                      <?php the_sub_field("price"); ?>
                      <?php include GET_DIR . '/img/ui/arrow-right-red.svg' ?>
                    </p>
                  </div>
                </a>
              </li>
              <?php endwhile; endif; ?>
            </ul>

            <div class="right-col">
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
                <p><?php the_sub_field('copy'); ?></p>
              </a>
              <?php endif; ?>
              <?php
                endwhile; endif;
              ?>

            </div>
          </div>
          <!-- / Products Submenu  -->

        <?php } else { ?>

          <!-- Submenu -->
          <div class="submenu-wrap">
            <div class="submenu-uparrow"></div>
            <ul class="submenu">
              <?php
                if( have_rows('plain_text_subnav') ):
                while( have_rows('plain_text_subnav') ): the_row();

                $currentPathName    = basename($currentPath);
                $subItemLink        = (get_sub_field('link_type') === 'internal') ? get_sub_field("link") : get_sub_field("external");
                $subItemPathName    = basename($subItemLink);
                if ( $currentPathName === $subItemPathName && !empty($currentPathName) ) {
                  $subItemActiveClass = "is-active";
                } else {
                  $subItemActiveClass = "";
                }
              ?>
              <li class="submenu-item <?php echo $subItemActiveClass; ?>">
                <a href="<?php echo $subItemLink; ?>" class="submenu-item-link"<?php echo (get_sub_field('link_type') === 'external') ? ' rel="noopener" target="_blank"' : ''; ?>>
                  <span class="submenu-item-text"><?php the_sub_field("sub_item_name"); ?></span>
                </a>
              </li>
              <?php endwhile; endif; ?>
            </ul>
          </div>
          <!-- / .Submenu -->
        </li>
        <?php } ?>

        <?php endwhile; endif; ?>
      </ul>
    </nav>
    


    <!-- Contact Info -->
    <section class="header-info">

      <?php if (($currentPathName == 'free-quote') || ($currentPathName == 'money') ): ?>

        <style>
          header .header-info .call-number {background-color: <?php the_field('phone_button_background_color') ?>; color:<?php the_field('phone_button_text_color') ?>; border: 2px solid <?php the_field('phone_button_background_color') ?>; }
          header .header-info .call-number p {color:<?php the_field('phone_button_text_color') ?>; transition: all .25s ease; }
          header .header-info .call-number:hover {background-color: <?php the_field('phone_button_text_color') ?>; color:<?php the_field('phone_button_background_color') ?>; border: 2px solid <?php the_field('phone_button_background_color') ?>; }
          header .header-info .call-number:hover p { color:<?php the_field('phone_button_background_color') ?>; }
          header .header-info .call-number:hover svg path { fill:<?php the_field('phone_button_background_color') ?>; }
          header .header-info .call-number svg path { fill:<?php the_field('phone_button_text_color') ?>;}
          header .header-info .call-number.button-outline {background-color: <?php the_field('phone_button_background_color') ?>; color:<?php the_field('phone_button_text_color') ?>; border: 2px solid <?php the_field('phone_button_text_color') ?>; }
          header .header-info .call-number:hover {background-color: <?php the_field('phone_button_text_color') ?>; color:<?php the_field('phone_button_text_color') ?>; border: 2px solid <?php the_field('phone_button_text_color') ?>; }
        </style>
        <!-- Call Contact -->
        <article class="header-call">
          <?php
            $phoneNum = ($page_temp === 'fb-lander.php') ? '1-855-707-2225' : get_field("phone_number");
            $purePhoneNum = preg_replace('/[^0-9]/', '', $phoneNum);
          ?>
          <div class="number">
          <a aria-describedby="navPhone" href="tel:<?php echo $purePhoneNum; ?>" class="nav-btn call-number promoNumber <?php if(get_field('is_phone_button_outline')): echo 'button-outline'; endif; ?>">
            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_3277_297)">
            <path d="M12.9167 1.33334H6.25001C5.10001 1.33334 4.16667 2.26668 4.16667 3.41668V17.5833C4.16667 18.7333 5.10001 19.6667 6.25001 19.6667H12.9167C14.0667 19.6667 15 18.7333 15 17.5833V3.41668C15 2.26668 14.0667 1.33334 12.9167 1.33334ZM9.58334 18.8333C8.89167 18.8333 8.33334 18.275 8.33334 17.5833C8.33334 16.8917 8.89167 16.3333 9.58334 16.3333C10.275 16.3333 10.8333 16.8917 10.8333 17.5833C10.8333 18.275 10.275 18.8333 9.58334 18.8333ZM13.3333 15.5H5.83334V3.83334H13.3333V15.5Z" fill="#DD8500"/>
            </g>
            <defs>
            <clipPath id="clip0_3277_297">
            <rect width="20" height="20" fill="white" transform="translate(0 0.5)"/>
            </clipPath>
            </defs>
            </svg>
          <p id="navPhone"><?php the_field('phone_tagline') ?> </p>
          <p class="number"><?php echo $phoneNum; ?></p>
          </a>
        </div>
        </article>

      <?php else: ?>

        <!-- Order Button -->
        <article class="header-order">
          <a href="<?php the_field('order_button_url'); ?>" class="header-order-btn font-700">
            <?php the_field("order_button_text"); ?>
          </a>
        </article>


      <?php endif; ?>

      <div class="my-account-wrap">
        <div class="submenue-wrap">
          <div class="submenu-uparrow"> </div>
          <ul class="submenu">
            <?php
              if( have_rows('my_account_items') ):
              while( have_rows('my_account_items') ): the_row();
            ?>
              <li><a href="<?php the_sub_field('url') ?>"><?php the_sub_field('copy') ?></a></li>
            <?php
              endwhile; endif;
            ?>
          </ul>
        </div>
      </div>

      <!-- Overlay Search -->
      <article class="search-overlay">
        <div class="search-content">
          <p class="search-title">Search this site:</p>
          <div class="search-input-wrap">
            <form role="search" method="get" action="<?php echo home_url('/'); ?>">
              <label class="search-label" for="overlay-search" aria-labelledby="searchTitle"><span>Search this site</span></label>
              <input  id="overlay-search" type="search" class="search-input" name="s"/>
              <button title="Search this site" type="submit" class="overlay-search-btn header-search-btn"><?php include GET_DIR . '/inc/vectors/magnifier-glass.svg'; ?></button>
            </form>
          </div>
          <button class="search-cancel-btn btn-outline blue">cancel</button>
        </div>
      </article>
    </section>

    <section class="mobile-btn-group">
      <!-- Mobile Call Button -->
      <span class="number">
        <a href="tel:<?php echo $purePhoneNum; ?>" class="header-call-btn promoNumber">
          <div class="m-btn-wrap">
            <article class="phone-icon icon">
              <?php include GET_DIR . '/img/ui/telephone-fill.svg'; ?>
            </article>
            <article class="menu-text">
              <span>Call Us</span>
            </article>
          </div>
        </a>
      </span>


      <!-- Mobile Menu Button -->
      <article class="header-menu-btn">
        <div class="m-btn-wrap">
          <article class="hamburger-icon icon" tabindex="0" role="button">
            <span></span><span></span><span></span>
          </article>
          <article class="menu-text">
            <span>Menu</span>
          </article>
        </div>
      </article>

    </section>

  </div>
</div>
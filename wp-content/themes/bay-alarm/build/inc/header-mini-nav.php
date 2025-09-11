<div class="header-stick--tabs">
  <div class="header-stick--overlay"></div>
  <div class="container relative">
    <div class="header-stick--cols <?php if(!get_field('turn_on_header_tabs')): echo 'flex-end'; endif; ?>">
      <?php if (get_field('turn_on_header_tabs')): ?>
      <div class="header-stick--leftcol">
        <ul class="row">
          <li class="is-active" >
            <a href="/" class="font-600">
              Bay Alarm Medical
            </a>
          </li>

          <li>
            <a class="font-600" href="https://www.getsafe.com/" target="_blank">
              GetSafe
            </a>
          </li>
        </ul>
      </div>
      <?php endif; ?>

      <div class="header-stick--rightcol">
        <?php
          $phoneNum = ($page_temp === 'fb-lander.php') ? '1-855-707-2225' : get_field("phone_number");
          $purePhoneNum = preg_replace('/[^0-9]/', '', $phoneNum);
        ?>
        <p class="header-stick--call font-700"><?php the_field('phone_tagline') ?> <span class="number"><a class="promoNumber font-700" href="tel:<?php echo $purePhoneNum; ?>" aria-describedby="navPhone"><?php echo $phoneNum; ?></a></span></p>

        <div class="header-stick--nav">
          <ul>
            <li class="menu-item">
              <a class="menu-item-link" href="<?php the_field('account_button_link') ?>" target="_blank">
                <span><?php the_field('account_desktop_text') ?></span>
              </a>
            </li>
            <?php
              if( have_rows('mini_nav_items') ):
              while( have_rows('mini_nav_items') ): the_row();
              $hasSubmenu = get_sub_field('has_subnav');

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

              $miniMenu_item_name = get_sub_field("nav_item");
            ?>
            <li class="menu-item has-submenu <?php echo $itemActiveClass ?>">
              <a role="button" href="<?php echo $rootItemURL; ?>" <?php echo (get_sub_field('open_new_tab') === 'yes') ? 'target="_blank"' : '';  ?> class="menu-item-link">
                <span><?php echo $miniMenu_item_name ?></span>                      
              </a>
              <?php if( have_rows('plain_text_subnav') ): ?>
                <div class="submenu-wrap">
                  <div class="submenu-uparrow"></div>
                  <ul class="submenu">
                    <li class="submenu-item pointer-events-none <?php echo $subItemActiveClass; ?>">
                      <p class="submenu-item-link">
                        <span class="submenu-item-text font-700"><?php echo $miniMenu_item_name ?></span>
                      </p>
                    </li>
                    <?php
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
                    <?php endwhile; ?>
                  </ul>
                </div>
              <?php endif; ?>
            </li>
            <?php endwhile; endif; ?>
          </ul>

          <article class="header-search-icon" tabindex="0" aria-label="Search Bay Alarm Site">
            <?php include  GET_DIR . '/img/ui/search.svg'; ?>
          </article>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  // Template Name: Pricing New
  update_option('current_page_template', 'pricing-page-new');
  get_header();
  $show_customize_column = get_field('show_customize_column');
  $show_promo_banner = get_field('show_promo_banner', 'option');
?>

<section class="new-pricing--hero">
  <div class="container">
    <div class="top-wrap">
        <div class="subhead-wrap">
          <span class="subhead"><?php the_field('subtext'); ?></span>
          <?php if (get_field('hero_top_logo')): ?>
          <div class="top-logo">
            <?php if (get_field('hero_top_logo_link')): ?>
              <a href="<?php the_field('hero_top_logo_link') ?>">
                <img src="<?php the_field('hero_top_logo') ?>" alt="Hero Top Logo">
              </a>
            <?php else: ?>
              <img src="<?php the_field('hero_top_logo') ?>" alt="Hero Top Logo">
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>
        <h1><?php the_field('heading'); ?></h1>
        <?php the_field('hero_copy'); ?>
    </div>

    <div class="product-nav-list">
        <?php
          $c = 1;
          if( have_rows('hero_products_list') ):
          while( have_rows('hero_products_list') ): the_row();
        ?>
        <div class="nav-item <?php if($c===1): echo 'is-active'; endif; ?>" planid="<?php the_sub_field('plan_id'); ?>">
            <?php if (get_sub_field('new_tab')): ?>
              <span class="new-tab"><?php the_sub_field('new_tab'); ?></span>
            <?php endif; ?>
            <figure>
              <img src="<?php the_sub_field('image'); ?>" alt="Image">
            </figure>
            <h3><?php the_sub_field('title'); ?></h3>
        </div>
        <?php
          $c++; endwhile; endif;
        ?>
  
    </div>
  </div>
</section>


<section class="new-pricing--products-display" id="step-2">
  <div class="container">
      
      <div class="contents-display-wrap desktop">

        <?php
          $c = 1;
          if( have_rows('pricing_products_plans') ):
          while( have_rows('pricing_products_plans') ): the_row();
        ?>
        


        <div class="content <?php if($c===1): echo 'is-active'; endif; ?>">

          <div class="top-wrap">
              <span class="subhead"><?php the_sub_field('pricing_subhead'); ?></span>
              <h2><?php the_sub_field('pricing_title'); ?></h2>
              <?php the_sub_field('pricing_copy'); ?>
          </div>

          <div class="table-wrap">

          <?php
            if( have_rows('product') ):
            while( have_rows('product') ): the_row();
          ?>


          <a class="col <?php if(get_sub_field('is_recommended')): echo 'is-active'; endif; ?>" href="<?php the_sub_field('url'); ?>">
            <figure class="top-img">
              <img src="<?php the_sub_field('product_image'); ?>" alt="Image">
              <?php if (get_sub_field('new_tab_text')): ?>
                <span class="new-tab"><?php the_sub_field('new_tab_text'); ?></span>
              <?php endif; ?>
            </figure>

            <div class="col-wrap">
              <h3><?php the_sub_field('product_name'); ?></h3>
              <h4><?php the_sub_field('subhead'); ?></h4>
              <div class="pricing-tag">
                  <span class="money"><?php the_sub_field('price'); ?></span>
                  <div class="text-wrap">
                    <p><?php the_sub_field('cent'); ?></p>
                    <p><?php the_sub_field('month'); ?></p>
                  </div>
              </div>
              <div class="free-month">
                <p><?php the_sub_field('offer'); ?></p>
              </div>
              <span class="btn-p">Order Now</span>

              <div class="features-wrap">
                <h4>Features</h4>
                <div class="feature-wrap">
                  <p class="feature-copy"><?php the_sub_field('features_copy'); ?>
                    <?php if (get_sub_field('discount_price')): ?>
                  <span class="original"><?php the_sub_field('original_price'); ?></span>
                  <span class="discount"><?php the_sub_field('discount_price'); ?></span>
                  <?php endif; ?> 
                  </p>
                  
                   <?php if (get_sub_field('is_features_information_box_on')): ?>
                    <div class="info-wrap">
                      <div class="info-icon">
                          <svg class="nomal" width="24" height="24" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M12 23.1758C6.20101 23.1758 1.5 18.4748 1.5 12.6758C1.5 6.87679 6.20101 2.17578 12 2.17578C17.799 2.17578 22.5 6.87679 22.5 12.6758C22.5 18.4748 17.799 23.1758 12 23.1758ZM12 24.6758C18.6274 24.6758 24 19.3032 24 12.6758C24 6.04836 18.6274 0.675781 12 0.675781C5.37258 0.675781 0 6.04836 0 12.6758C0 19.3032 5.37258 24.6758 12 24.6758Z" fill="#AECBF4"/>
                          <path d="M10.5023 17.1758C10.5023 16.3474 11.1739 15.6758 12.0023 15.6758C12.8307 15.6758 13.5023 16.3474 13.5023 17.1758C13.5023 18.0042 12.8307 18.6758 12.0023 18.6758C11.1739 18.6758 10.5023 18.0042 10.5023 17.1758Z" fill="#AECBF4"/>
                          <path d="M10.6493 8.16834C10.5693 7.36921 11.1969 6.67578 12 6.67578C12.8031 6.67578 13.4307 7.36921 13.3507 8.16834L12.8246 13.4295C12.7823 13.8532 12.4258 14.1758 12 14.1758C11.5742 14.1758 11.2177 13.8532 11.1754 13.4295L10.6493 8.16834Z" fill="#AECBF4"/>
                          </svg>

                          <svg class="black-icon" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 23.1758C6.20101 23.1758 1.5 18.4748 1.5 12.6758C1.5 6.87679 6.20101 2.17578 12 2.17578C17.799 2.17578 22.5 6.87679 22.5 12.6758C22.5 18.4748 17.799 23.1758 12 23.1758ZM12 24.6758C18.6274 24.6758 24 19.3032 24 12.6758C24 6.04836 18.6274 0.675781 12 0.675781C5.37258 0.675781 0 6.04836 0 12.6758C0 19.3032 5.37258 24.6758 12 24.6758Z" fill="#3C3A42"/>
                            <path d="M10.5023 17.1758C10.5023 16.3474 11.1739 15.6758 12.0023 15.6758C12.8307 15.6758 13.5023 16.3474 13.5023 17.1758C13.5023 18.0042 12.8307 18.6758 12.0023 18.6758C11.1739 18.6758 10.5023 18.0042 10.5023 17.1758Z" fill="#3C3A42"/>
                            <path d="M10.6493 8.16834C10.5693 7.36921 11.1969 6.67578 12 6.67578C12.8031 6.67578 13.4307 7.36921 13.3507 8.16834L12.8246 13.4295C12.7823 13.8532 12.4258 14.1758 12 14.1758C11.5742 14.1758 11.2177 13.8532 11.1754 13.4295L10.6493 8.16834Z" fill="#3C3A42"/>
                            </svg>

                          <svg class="on-hover" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM12 6C11.1969 6 10.5693 6.69343 10.6493 7.49256L11.1754 12.7537C11.2177 13.1774 11.5742 13.5 12 13.5C12.4258 13.5 12.7823 13.1774 12.8246 12.7537L13.3507 7.49256C13.4307 6.69343 12.8031 6 12 6ZM12.0023 15C11.1739 15 10.5023 15.6716 10.5023 16.5C10.5023 17.3284 11.1739 18 12.0023 18C12.8307 18 13.5023 17.3284 13.5023 16.5C13.5023 15.6716 12.8307 15 12.0023 15Z" fill="#AECBF4"/>
                          </svg>

                      </div>

                      <div class="info-content">
                        <figure>
                          <img src="<?php the_sub_field('features_info_image'); ?>" alt="Image">
                        </figure>

                        <p><?php the_sub_field('features_info_description'); ?></p>
                      </div>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="list-items">
                  <?php
                    if( have_rows('feature_rows') ):
                    while( have_rows('feature_rows') ): the_row();
                  ?>

                  <div class="item">

                    <?php if (get_sub_field('turn_on_check_icon')): ?>
                    <div class="check-icon">
                      <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M20.2281 1.32294C21.0909 0.460061 22.49 0.460061 23.3528 1.32294C24.2051 2.17524 24.2156 3.5506 23.3842 4.41573L11.6229 19.1174C11.6059 19.1386 11.5878 19.1589 11.5686 19.1781C10.7057 20.041 9.30666 20.041 8.44378 19.1781L0.647163 11.3815C-0.215721 10.5186 -0.215721 9.11956 0.647163 8.25668C1.51005 7.39379 2.90906 7.39379 3.77194 8.25668L9.9396 14.4243L20.1695 1.38904C20.1876 1.36585 20.2072 1.34378 20.2281 1.32294Z" fill="#B8CD82"/>
                      </svg>
                    </div>
                    <?php endif; ?>
                   
                    <p><?php the_sub_field('row_title'); ?></p>
                   
                   <?php if (get_sub_field('info_box')): ?>
                    <div class="info-wrap">
                      <div class="info-icon">
                          <svg class="nomal" width="24" height="24" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M12 23.1758C6.20101 23.1758 1.5 18.4748 1.5 12.6758C1.5 6.87679 6.20101 2.17578 12 2.17578C17.799 2.17578 22.5 6.87679 22.5 12.6758C22.5 18.4748 17.799 23.1758 12 23.1758ZM12 24.6758C18.6274 24.6758 24 19.3032 24 12.6758C24 6.04836 18.6274 0.675781 12 0.675781C5.37258 0.675781 0 6.04836 0 12.6758C0 19.3032 5.37258 24.6758 12 24.6758Z" fill="#AECBF4"/>
                          <path d="M10.5023 17.1758C10.5023 16.3474 11.1739 15.6758 12.0023 15.6758C12.8307 15.6758 13.5023 16.3474 13.5023 17.1758C13.5023 18.0042 12.8307 18.6758 12.0023 18.6758C11.1739 18.6758 10.5023 18.0042 10.5023 17.1758Z" fill="#AECBF4"/>
                          <path d="M10.6493 8.16834C10.5693 7.36921 11.1969 6.67578 12 6.67578C12.8031 6.67578 13.4307 7.36921 13.3507 8.16834L12.8246 13.4295C12.7823 13.8532 12.4258 14.1758 12 14.1758C11.5742 14.1758 11.2177 13.8532 11.1754 13.4295L10.6493 8.16834Z" fill="#AECBF4"/>
                          </svg>

                          <svg class="black-icon" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 23.1758C6.20101 23.1758 1.5 18.4748 1.5 12.6758C1.5 6.87679 6.20101 2.17578 12 2.17578C17.799 2.17578 22.5 6.87679 22.5 12.6758C22.5 18.4748 17.799 23.1758 12 23.1758ZM12 24.6758C18.6274 24.6758 24 19.3032 24 12.6758C24 6.04836 18.6274 0.675781 12 0.675781C5.37258 0.675781 0 6.04836 0 12.6758C0 19.3032 5.37258 24.6758 12 24.6758Z" fill="#3C3A42"/>
                            <path d="M10.5023 17.1758C10.5023 16.3474 11.1739 15.6758 12.0023 15.6758C12.8307 15.6758 13.5023 16.3474 13.5023 17.1758C13.5023 18.0042 12.8307 18.6758 12.0023 18.6758C11.1739 18.6758 10.5023 18.0042 10.5023 17.1758Z" fill="#3C3A42"/>
                            <path d="M10.6493 8.16834C10.5693 7.36921 11.1969 6.67578 12 6.67578C12.8031 6.67578 13.4307 7.36921 13.3507 8.16834L12.8246 13.4295C12.7823 13.8532 12.4258 14.1758 12 14.1758C11.5742 14.1758 11.2177 13.8532 11.1754 13.4295L10.6493 8.16834Z" fill="#3C3A42"/>
                            </svg>


                          <svg class="on-hover" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM12 6C11.1969 6 10.5693 6.69343 10.6493 7.49256L11.1754 12.7537C11.2177 13.1774 11.5742 13.5 12 13.5C12.4258 13.5 12.7823 13.1774 12.8246 12.7537L13.3507 7.49256C13.4307 6.69343 12.8031 6 12 6ZM12.0023 15C11.1739 15 10.5023 15.6716 10.5023 16.5C10.5023 17.3284 11.1739 18 12.0023 18C12.8307 18 13.5023 17.3284 13.5023 16.5C13.5023 15.6716 12.8307 15 12.0023 15Z" fill="#AECBF4"/>
                          </svg>

                      </div>

                      <div class="info-content">
                        <figure>
                          <img src="<?php the_sub_field('info_image'); ?>" alt="Image">
                        </figure>

                        <p><?php the_sub_field('info_description'); ?></p>
                      </div>
                    </div>
                    <?php endif; ?>

                  </div>
                  <?php
                    endwhile; endif;
                  ?>


                </div>
                <span class="btn-p second-btn">Order Now</span>

              </div>
            </div>
          </a>

          <?php
            endwhile; endif;
          ?>
        </div>


        </div>
        <?php
          $c++; endwhile; endif;
        ?>
        
      </div>


      <div class="contents-display-wrap mobile">

        <?php
          $c = 1;
          if( have_rows('pricing_products_plans') ):
          while( have_rows('pricing_products_plans') ): the_row();
        ?>
        


        <div class="content <?php if($c===1): echo 'is-active'; endif; ?>">

          <div class="top-wrap">
              <span class="subhead"><?php the_sub_field('pricing_subhead'); ?></span>
              <h2><?php the_sub_field('pricing_title'); ?></h2>
              <?php the_sub_field('pricing_copy'); ?>
          </div>

          <div class="table-wrap">

          <?php
            if( have_rows('product') ):
            while( have_rows('product') ): the_row();
          ?>


          <a class="col" href="<?php the_sub_field('url'); ?>">
            <figure class="top-img">
              <img src="<?php the_sub_field('product_image'); ?>" alt="Image">
              <?php if (get_sub_field('new_tab_text')): ?>
                <span class="new-tab"><?php the_sub_field('new_tab_text'); ?></span>
              <?php endif; ?>
            </figure>

            <div class="col-wrap">
              <h3><?php the_sub_field('product_name'); ?></h3>
              <h4><?php the_sub_field('subhead'); ?></h4>
              <div class="pricing-tag">
                  <span class="money"><?php the_sub_field('price'); ?></span>
                  <div class="text-wrap">
                    <p><?php the_sub_field('cent'); ?></p>
                    <p><?php the_sub_field('month'); ?></p>
                  </div>
              </div>
              <div class="free-month">
                <p><?php the_sub_field('offer'); ?></p>
              </div>
              <span class="btn-p">Order Now</span>

              <div class="features-wrap">
                <h4>Features</h4>
                <div class="feature-wrap">
                  <p class="feature-copy"><?php the_sub_field('features_copy'); ?>
                    <?php if (get_sub_field('discount_price')): ?>
                  <span class="original"><?php the_sub_field('original_price'); ?></span>
                  <span class="discount"><?php the_sub_field('discount_price'); ?></span>
                  <?php endif; ?>
                  </p>
                  
                   <?php if (get_sub_field('is_features_information_box_on')): ?>
                    <div class="info-wrap">
                      <div class="info-icon">
                          <svg class="nomal" width="24" height="24" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M12 23.1758C6.20101 23.1758 1.5 18.4748 1.5 12.6758C1.5 6.87679 6.20101 2.17578 12 2.17578C17.799 2.17578 22.5 6.87679 22.5 12.6758C22.5 18.4748 17.799 23.1758 12 23.1758ZM12 24.6758C18.6274 24.6758 24 19.3032 24 12.6758C24 6.04836 18.6274 0.675781 12 0.675781C5.37258 0.675781 0 6.04836 0 12.6758C0 19.3032 5.37258 24.6758 12 24.6758Z" fill="#AECBF4"/>
                          <path d="M10.5023 17.1758C10.5023 16.3474 11.1739 15.6758 12.0023 15.6758C12.8307 15.6758 13.5023 16.3474 13.5023 17.1758C13.5023 18.0042 12.8307 18.6758 12.0023 18.6758C11.1739 18.6758 10.5023 18.0042 10.5023 17.1758Z" fill="#AECBF4"/>
                          <path d="M10.6493 8.16834C10.5693 7.36921 11.1969 6.67578 12 6.67578C12.8031 6.67578 13.4307 7.36921 13.3507 8.16834L12.8246 13.4295C12.7823 13.8532 12.4258 14.1758 12 14.1758C11.5742 14.1758 11.2177 13.8532 11.1754 13.4295L10.6493 8.16834Z" fill="#AECBF4"/>
                          </svg>

                          <svg class="black-icon" width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 23.1758C6.20101 23.1758 1.5 18.4748 1.5 12.6758C1.5 6.87679 6.20101 2.17578 12 2.17578C17.799 2.17578 22.5 6.87679 22.5 12.6758C22.5 18.4748 17.799 23.1758 12 23.1758ZM12 24.6758C18.6274 24.6758 24 19.3032 24 12.6758C24 6.04836 18.6274 0.675781 12 0.675781C5.37258 0.675781 0 6.04836 0 12.6758C0 19.3032 5.37258 24.6758 12 24.6758Z" fill="#3C3A42"/>
                            <path d="M10.5023 17.1758C10.5023 16.3474 11.1739 15.6758 12.0023 15.6758C12.8307 15.6758 13.5023 16.3474 13.5023 17.1758C13.5023 18.0042 12.8307 18.6758 12.0023 18.6758C11.1739 18.6758 10.5023 18.0042 10.5023 17.1758Z" fill="#3C3A42"/>
                            <path d="M10.6493 8.16834C10.5693 7.36921 11.1969 6.67578 12 6.67578C12.8031 6.67578 13.4307 7.36921 13.3507 8.16834L12.8246 13.4295C12.7823 13.8532 12.4258 14.1758 12 14.1758C11.5742 14.1758 11.2177 13.8532 11.1754 13.4295L10.6493 8.16834Z" fill="#3C3A42"/>
                            </svg>

                          <svg class="on-hover" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM12 6C11.1969 6 10.5693 6.69343 10.6493 7.49256L11.1754 12.7537C11.2177 13.1774 11.5742 13.5 12 13.5C12.4258 13.5 12.7823 13.1774 12.8246 12.7537L13.3507 7.49256C13.4307 6.69343 12.8031 6 12 6ZM12.0023 15C11.1739 15 10.5023 15.6716 10.5023 16.5C10.5023 17.3284 11.1739 18 12.0023 18C12.8307 18 13.5023 17.3284 13.5023 16.5C13.5023 15.6716 12.8307 15 12.0023 15Z" fill="#AECBF4"/>
                          </svg>

                      </div>

                      <div class="info-content">
                        <figure>
                          <img src="<?php the_sub_field('features_info_image'); ?>" alt="Image">
                        </figure>

                        <p><?php the_sub_field('features_info_description'); ?></p>
                      </div>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="list-items">
                  <?php
                    if( have_rows('feature_rows') ):
                    while( have_rows('feature_rows') ): the_row();
                  ?>

                  <div class="item">

                    <?php if (get_sub_field('turn_on_check_icon')): ?>
                    <div class="check-icon">
                      <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M20.2281 1.32294C21.0909 0.460061 22.49 0.460061 23.3528 1.32294C24.2051 2.17524 24.2156 3.5506 23.3842 4.41573L11.6229 19.1174C11.6059 19.1386 11.5878 19.1589 11.5686 19.1781C10.7057 20.041 9.30666 20.041 8.44378 19.1781L0.647163 11.3815C-0.215721 10.5186 -0.215721 9.11956 0.647163 8.25668C1.51005 7.39379 2.90906 7.39379 3.77194 8.25668L9.9396 14.4243L20.1695 1.38904C20.1876 1.36585 20.2072 1.34378 20.2281 1.32294Z" fill="#B8CD82"/>
                      </svg>
                    </div>
                    <?php endif; ?>
                   
                    <p><?php the_sub_field('row_title'); ?></p>
                   
                   <?php if (get_sub_field('info_box')): ?>
                    <div class="info-wrap">
                      <div class="info-icon">
                          <svg class="nomal" width="24" height="24" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M12 23.1758C6.20101 23.1758 1.5 18.4748 1.5 12.6758C1.5 6.87679 6.20101 2.17578 12 2.17578C17.799 2.17578 22.5 6.87679 22.5 12.6758C22.5 18.4748 17.799 23.1758 12 23.1758ZM12 24.6758C18.6274 24.6758 24 19.3032 24 12.6758C24 6.04836 18.6274 0.675781 12 0.675781C5.37258 0.675781 0 6.04836 0 12.6758C0 19.3032 5.37258 24.6758 12 24.6758Z" fill="#AECBF4"/>
                          <path d="M10.5023 17.1758C10.5023 16.3474 11.1739 15.6758 12.0023 15.6758C12.8307 15.6758 13.5023 16.3474 13.5023 17.1758C13.5023 18.0042 12.8307 18.6758 12.0023 18.6758C11.1739 18.6758 10.5023 18.0042 10.5023 17.1758Z" fill="#AECBF4"/>
                          <path d="M10.6493 8.16834C10.5693 7.36921 11.1969 6.67578 12 6.67578C12.8031 6.67578 13.4307 7.36921 13.3507 8.16834L12.8246 13.4295C12.7823 13.8532 12.4258 14.1758 12 14.1758C11.5742 14.1758 11.2177 13.8532 11.1754 13.4295L10.6493 8.16834Z" fill="#AECBF4"/>
                          </svg>

                          <svg class="on-hover" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM12 6C11.1969 6 10.5693 6.69343 10.6493 7.49256L11.1754 12.7537C11.2177 13.1774 11.5742 13.5 12 13.5C12.4258 13.5 12.7823 13.1774 12.8246 12.7537L13.3507 7.49256C13.4307 6.69343 12.8031 6 12 6ZM12.0023 15C11.1739 15 10.5023 15.6716 10.5023 16.5C10.5023 17.3284 11.1739 18 12.0023 18C12.8307 18 13.5023 17.3284 13.5023 16.5C13.5023 15.6716 12.8307 15 12.0023 15Z" fill="#AECBF4"/>
                          </svg>

                      </div>

                      <div class="info-content">
                        <figure>
                          <img src="<?php the_sub_field('info_image'); ?>" alt="Image">
                        </figure>

                        <p><?php the_sub_field('info_description'); ?></p>
                      </div>
                    </div>
                    <?php endif; ?>

                  </div>
                  <?php
                    endwhile; endif;
                  ?>


                </div>
                <span class="btn-p second-btn">Order Now</span>

              </div>
            </div>
          </a>

          <?php
            endwhile; endif;
          ?>
        </div>


        </div>
        <?php
          $c++; endwhile; endif;
        ?>
        
      </div>


      <div class="note-wrap">
        <p><?php the_field('table_bottom_note'); ?></p>
      </div>


  </div>
</section>

<div id="comparison-chart">
  <?php include 'inc/price-compare.php' ?>
</div>

<!-- ================================================
          Three  Articles
================================================ -->
<?php if (get_field('turn_on_three_sections_article')): ?>
<section class="new-pricing-particles <?php if(get_field('turn_on_price_compare')==='on'): echo 'no-border-top'; endif; ?>">

  <div class="inner-max-container">
    <div class="article-container">

      
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
            
            <h3 class="heading"><?php the_sub_field("title") ?></h3>
            <p class="copy number"><?php the_sub_field("copy") ?></p>
          </div>
        </section>
        <?php
          endif; $count++; endwhile; endif;
        ?>
      </article>


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
            
            <h3 class="heading"><?php the_sub_field("title") ?></h3>
            <p class="copy"><?php the_sub_field("copy") ?></p>
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


<?php include 'inc/rating-section.php'; ?>

<section class="pricing-faq">
  <div class="inner-max-container">
    <h2><?php the_field('faq_title'); ?></h2>
    <div class="col-container">
 
        <?php
          if( have_rows('faq_questions_list') ):
          while( have_rows('faq_questions_list') ): the_row();
        ?>
        <div class="text-wrap">
          <p class="question"><?php the_sub_field("question") ?></p>
          <div class="answer"><p><?php the_sub_field("answer") ?></p></div>
        </div>
        <?php endwhile; endif; ?>
      

    </div>
  </div>
</section>
<?php include 'inc/bottom-get-started.php'; ?>

<?php get_footer(); ?>
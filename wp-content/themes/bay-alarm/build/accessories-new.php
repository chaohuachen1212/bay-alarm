<?php
  // Template Name: Accessories New
  update_option('current_page_template', 'accessories-new');
  get_header();
?>


<section class='accessories--hero'>
  <div class="container">
    <div class="row">
      <div class="col copy">
        <span class="eyebrows"><?php the_field('hero_subhead'); ?></span>
        <h1><?php the_field('hero_title'); ?></h1>
        <p><?php the_field('hero_copy'); ?></p>
      </div>

      <div class="col center">
        <span class="eyebrows"><?php the_field('hero_image_title'); ?></span>
        <div class="accessory-cards">
            <?php
              if( have_rows('hero_items_list') ):
              while( have_rows('hero_items_list') ): the_row();
            ?>
            <a class="card" href="<?php the_sub_field('link'); ?>" alt="Image">
              <img src="<?php the_sub_field('image'); ?>">
              <p><?php the_sub_field('text'); ?></p>
            </a>
            <?php
              endwhile; endif;
            ?>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="accessories--compare">
  <div class="container">
    <h2><?php the_field('main_title'); ?></h2>
    <div class="item-sec-wrap">
      <?php
        if( have_rows('main_content_list') ):
        while( have_rows('main_content_list') ): the_row();
        $id = str_replace(' ', '-', strtolower(get_sub_field('title')));
      ?>
      <div id="<?php echo $id; ?>" class="item-sec <?php if(get_sub_field('is_main_image_on_right')): echo 'img-right'; endif; ?>">
        <div class="row">
          <div class="col-l">
              <img class="bg-img" src="<?php the_sub_field('main_image'); ?>">

              <?php if (get_sub_field('main_video_url')): ?>
              <div class="video-wrap video-modal-call" data-videosrc="<?php the_sub_field('main_video_url'); ?>">
                  <figure>
                    <img src="<?php the_sub_field('main_video_image'); ?>" alt="Video Image">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="9" cy="9" r="9" fill="#DB4E3B"/>
                    <path d="M12 9L7.5 12.2476L7.5 5.7524L12 9Z" fill="white"/>
                    </svg>
                  </figure>
                  <div class="text-wrap">
                    <span><?php the_sub_field('main_video_subhead'); ?></span>
                    <h3><?php the_sub_field('main_video_title'); ?></h3>
                  </div>
              </div>
              <?php endif; ?>

          </div>

          <div class="col-r">
            <div class="top-wrap">
              <h3><?php the_sub_field('title'); ?></h3>
               <?php
                $link = get_sub_field('button');

              if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
              <?php endif; ?>
              <?php if ( empty($link) ): ?>
                <?php if ( !empty(get_sub_field('main_video_url')) ): ?>
                <a class="btn video-modal-call" data-videosrc="<?php the_sub_field('main_video_url'); ?>">Learn More</a>
                <?php endif; ?>
              <?php endif; ?>
            </div>
            <?php the_sub_field('copy'); ?>

            <?php if (get_sub_field('turn_on_product_list')): ?>
            <div class="product-wrap">
              <?php
                if( have_rows('products_list') ):
                while( have_rows('products_list') ): the_row();
              ?>
              <div class="product">
                <figure>
                  <img src="<?php the_sub_field('image'); ?>" alt="Image">
                </figure>
                <h4><?php the_sub_field('text'); ?></h4>
              </div>
              <?php
                endwhile; endif;
              ?>
            </div>
             <?php endif; ?>

             <?php if (get_sub_field('is_main_icons_list_in_a_column')): ?>
            <div class="icons-row <?php the_sub_field('icons_list_background'); ?> <?php if(get_sub_field('is_larger_icon')): echo 'larger-icon'; endif; ?>">
              <?php
                if( have_rows('main_icons_list') ):
                while( have_rows('main_icons_list') ): the_row();
              ?>
              <div class="col">
                  <img src="<?php the_sub_field('icon'); ?>" alt="Icon">
                  <p><?php the_sub_field('text'); ?></p>
              </div>
              <?php
                endwhile; endif;
              ?>
            </div>
            <?php endif; ?>

          </div>
        </div>
        <?php if (!get_sub_field('is_main_icons_list_in_a_column')): ?>
        <div class="icons-row <?php the_sub_field('icons_list_background'); ?> <?php if(get_sub_field('is_larger_icon')): echo 'larger-icon'; endif; ?>">
          <?php
            if( have_rows('main_icons_list') ):
            while( have_rows('main_icons_list') ): the_row();
          ?>
          <div class="col">
              <img src="<?php the_sub_field('icon'); ?>" alt="Icon">
              <p><?php the_sub_field('text'); ?></p>
          </div>
          <?php
            endwhile; endif;
          ?>
        </div>
        <?php endif; ?>

      </div>
      <?php
        endwhile; endif;
      ?>
    </div>


  </div>
</section>




<?php include 'inc/bottom-get-started.php' ?>

<?php get_footer(); ?>

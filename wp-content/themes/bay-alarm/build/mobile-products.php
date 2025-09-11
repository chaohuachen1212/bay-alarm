<?php
  // Template Name: Mobile Products
  update_option('current_page_template','mobile-products');
  get_header();
?>

<!-- =========================================================
                Top Subnav
========================================================= -->
<section class="prod-new--topnav">
  <?php include 'inc/hiw-subnav.php' ?>
</section>

<!-- =========================================================
                Hero Section
========================================================= -->

<section class="mobile-products--hero" style="background-image: url('<?php the_field('hero_background') ?>');">
  <article>
    <span><?php the_field('hero_subtitle') ?></span>
    <h1><?php the_field('hero_title') ?></h1>
    <p><?php the_field('hero_copy') ?></p>
  </article>
</section>

<section class="mobile--products--content">
  <div class="container">
    <div class="products-wrap">
      <?php
      	if( have_rows('products_list') ):
      	while( have_rows('products_list') ): the_row();
      ?>
        <div class="product">
          <div class="top-wrap">
            <?php $buttons = get_sub_field('buttons') ?>
            <h3>
              <a href="<?php echo $buttons[0]['url']; ?>">
                <?php the_sub_field('title') ?>
              </a>
            </h3>
            <a class="img-wrap" href="<?php echo $buttons[0]['url']; ?>" aria-label="<?php echo get_sub_field('title'); ?>">
              <?php
                if( have_rows('images') ):
                while( have_rows('images') ): the_row();
              ?>
                <img src="<?php echo esc_url(get_sub_field('image')['url']) ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']) ?>">
              <?php
              	endwhile; endif;
              ?>
            </a>
            <p><?php the_sub_field('copy') ?></p>
          </div>
          <div class="item-wrap">
            <?php
            	if( have_rows('items') ):
            	while( have_rows('items') ): the_row();
            ?>

              <?php if (get_sub_field('which_options')==='price'): ?>
                <div class="item">
                  <h2><?php the_sub_field('price') ?></h2>
                  <p><?php the_sub_field('title') ?></p>
                </div>
              <?php elseif (get_sub_field('which_options')==='image'): ?>
                <div class="item">
                  <img src="<?php echo esc_url(get_sub_field('image')['url']) ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']) ?>">
                  <p><?php the_sub_field('title') ?></p>
                </div>
              <?php else: ?>
                <div class="item empty">

                </div>
              <?php endif; ?>

            <?php
            	endwhile; endif;
            ?>

          </div>
          <div class="btn-wrap">
            <?php
              $c = 1;
              if( have_rows('buttons') ):
              while( have_rows('buttons') ): the_row();
            ?>
              <a href="<?php the_sub_field('url') ?>" class="blue <?php
              if($c===1): echo 'btn'; else: echo 'btn-outline'; endif;
             ?>">
            <?php the_sub_field('text') ?></a>
            <?php
              $c++;  endwhile; endif;
            ?>
          </div>
        </div>
      <?php
      	 endwhile; endif;
      ?>
    </div>

    <div class="mobile-product-wrap">
      <div class="nav-wrap">
        <?php
          $k = 1;
          if( have_rows('products_list') ):
          while( have_rows('products_list') ): the_row();
        ?>
        <a class="nav-item <?php if($k===1): echo 'is-active'; endif; ?>">
          <h4><?php the_sub_field('title') ?></h4>
          <div class="img-wrap">
            <?php
              if( have_rows('images') ):
              while( have_rows('images') ): the_row();
            ?>
              <img src="<?php echo esc_url(get_sub_field('image')['url']) ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']) ?>">
            <?php
              endwhile; endif;
            ?>
          </div>
        </a>
        <?php
          $k++;  endwhile; endif;
        ?>

      </div>

      <div class="mobile-products">
        <?php
          $n = 1;
          if( have_rows('products_list') ):
          while( have_rows('products_list') ): the_row();
        ?>
        <div class="mobile-product <?php if($n===1): echo 'is-active'; endif; ?>">
          <article>
            <?php $buttons = get_sub_field('buttons') ?>
            <h3><a href="<?php echo $buttons[0]['url']; ?>"><?php the_sub_field('title') ?></a></h3>
            <p><?php the_sub_field('copy') ?></p>
            <a class="img-wrap" href="<?php echo $buttons[0]['url']; ?>">
              <?php
                if( have_rows('images') ):
                while( have_rows('images') ): the_row();
              ?>
                <img src="<?php echo esc_url(get_sub_field('image')['url']) ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']) ?>">
              <?php
                endwhile; endif;
              ?>
            </a>
          </article>
          <div class="mobile-item-wrap">
            <?php
              if( have_rows('items') ):
              while( have_rows('items') ): the_row();
            ?>

              <?php if (get_sub_field('which_options')==='price'): ?>
                <div class="mobile-item">
                  <h2><?php the_sub_field('price') ?></h2>
                  <p><?php the_sub_field('title') ?></p>
                </div>
              <?php elseif (get_sub_field('which_options')==='image'): ?>
                <div class="mobile-item">
                  <img src="<?php echo esc_url(get_sub_field('image')['url']) ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']) ?>">
                  <p><?php the_sub_field('title') ?></p>
                </div>
              <?php else: ?>
                <!-- <div class="mobile-item empty">

                </div> -->
              <?php endif; ?>

            <?php
              endwhile; endif;
            ?>

             <div class="btn-wrap">
               <?php
                 $c = 1;
                 if( have_rows('buttons') ):
                 while( have_rows('buttons') ): the_row();
               ?>
                 <a href="<?php the_sub_field('url') ?>" class="blue <?php
                 if($c===1): echo 'btn'; else: echo 'btn-outline'; endif;
                ?>">
               <?php the_sub_field('text') ?></a>
               <?php
                 $c++;  endwhile; endif;
               ?>
             </div>
          </div>
        </div>
        <?php
          $n++;  endwhile; endif;
        ?>

      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>

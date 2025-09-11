<section class="bottom-get-started">
  <article class="inner-max-container">

    <?php
      $path = basename($_SERVER['REQUEST_URI']);
      $args = array('post_type' => 'get-started');
      $the_query = new WP_Query($args);
      while ($the_query->have_posts()): $the_query->the_post();
    ?>

    <div class="heading-wrap">
      <h4 class="heading"><?php the_field('get_started_title'); ?></h4>
    </div>

    <div class="modules-wrap">

   

      <?php
        if (have_rows('get_started_column')) : while (have_rows('get_started_column')) : the_row();
        $url = (get_sub_field('column_link_custom_url')) ? get_sub_field('column_link_custom_url') : get_sub_field('column_link_url');
      ?>

      <a href="<?php echo $url; ?>" class="col col-shop" aria-labelledby="bottom-start-<?php echo $c; ?>">
        <span class="col-icon icon-shopping-cart">
          <img src="<?php the_sub_field('column_icon_path'); ?>" alt="">

        </span>
        <div class="col-text-wrap">
          <h5 class="col-title"><?php the_sub_field('column_title'); ?></h5>
          <p class="col-copy" id="bottom-start-<?php echo $c; ?>"><?php the_sub_field('column_copy'); ?></p>
        </div>
        <div class="btn-outline cta-btn"><?php the_sub_field('column_link_text'); ?></div>
      </a>

      <?php  endwhile; endif; ?>

      <!-- Characters -->
      <!-- <div class="char-wrap char-main">
        <div class="char-box">
          <img class="chars" src="<?php echo get_template_directory_uri(); ?>/img/grumpygrandpa-main.png" alt="">
        </div>
      </div>
      <div class="char-wrap char-hand">
        <img class="chars" src="<?php echo get_template_directory_uri(); ?>/img/grumpygrandpa-arm.png" alt="">
      </div> -->

    </div>  <!-- modules-wrap -->

    <?php
      endwhile;
      wp_reset_query();
    ?>

  </article>
</section>

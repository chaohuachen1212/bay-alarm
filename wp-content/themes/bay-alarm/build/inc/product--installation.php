<?php
  $args = array('post_type' => 'product-detail');
  $the_query = new WP_Query($args);
  if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
?>


<!-- =========================================================
                Product Installation 
========================================================= -->
<section class="prod-videos-sec">
  <article class="inner-max-container">
    <div class="prod-sec-heading">
      <h3 class="heading"><?php the_field('installation_heading'); ?></h3>
      <div class="copy">
        <p><?php the_field('installation_subheading'); ?></p>
      </div>
    </div>
    <div class="videos-container">

      <?php if (have_rows('installation_video')) : while (have_rows('installation_video')) : the_row(); ?>

      <section class="cell">
        <div class="v-wrap video-modal-call" data-videosrc="<?php the_sub_field('installation_video_url'); ?>">
          <figure class="v-img" style="background-image: url(<?php the_sub_field('installation_video_image'); ?>);">
            <span class="play-icon"><?php include 'vectors/play-icon.svg'; ?></span>
            <span class="icon-circle"></span>
          </figure>
          <p class="v-name"><?php the_sub_field('installation_video_title'); ?></p>
        </div>
      </section>

      <?php endwhile; endif; ?>

    </div>
  </article>
</section>

<?php
  endwhile;
  endif;
  wp_reset_query();
?>
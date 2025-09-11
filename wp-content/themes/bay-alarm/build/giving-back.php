<?php
  // Template Name: Giving Back
  update_option('current_page_template', 'giving-back');
  get_header();
?>

<section class="giving-back-hero" style="background-image: url(<?php the_field('giving_back_hero_image'); ?>);">
  <div class="center-all">
    <?php the_field('giving_back_heading_copy'); ?>
  </div>
</section>

<section class="giving-back-video">

  <?php if (have_rows('giving_back_videos')) : while (have_rows('giving_back_videos')) : the_row(); ?>

  <div>
    <figure class="video-modal-call" data-videosrc="<?php the_sub_field('giving_back_video_url'); ?>?autoplay=1&rel=0" style="background-image: url(<?php the_sub_field('giving_back_video_image'); ?>);" tabindex="0" role="button">
      <?php include 'inc/vectors/play-icon.svg' ?>
      <span><?php the_sub_field('giving_back_video_title'); ?></span>
    </figure>
    <div class="giving-video-copy">
      <span><?php the_sub_field('giving_back_video_partner_name'); ?></span>
      <a href="<?php the_sub_field('giving_back_video_partner_url'); ?>" target="_blank"><?php the_sub_field('giving_back_video_partner_link_text'); ?></a>
    </div>
  </div>

  <?php endwhile; endif; ?>

</section>

<section class="giving-back-orgs inner-max-container">
  <h3><?php the_field('organizations_heading') ?></h3>

  <?php $c; if (have_rows('organizations')) : while (have_rows('organizations')) : the_row(); $c++; ?>

  <div class="giving-org-wrap">
    <div>
      <figure style="background-image: url(<?php the_sub_field('org_image'); ?>);"></figure>
    </div>
    <div>
      <span><?php the_sub_field('org_type'); ?></span>
      <div id="orgDescrip-<?php echo $c; ?>">
        <?php the_sub_field('org_copy'); ?>
      </div>
      <a href="<?php the_sub_field('org_learn_more_url'); ?>" class="btn btn-outline" aria-describedby="orgDescrip-<?php echo $c; ?>">learn more</a>
    </div>
  </div>

  <?php endwhile; endif; ?>

</section>

<?php include 'inc/bottom-get-started.php' ?>


<?php get_footer(); ?>

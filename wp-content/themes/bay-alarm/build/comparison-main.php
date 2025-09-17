<?php
  // Template Name: Comparison Main
  update_option('current_page_template', 'comparison-main');
  get_header();
  $hero_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
?>

<section class="comparison-main--hero">
  <div class="container">
    <div class="row">
      <figure>
        <img alt="<?php echo esc_attr(get_field("hero_image")['alt']) ?>" src="<?php echo esc_url(get_field("hero_image")['url']) ?>">
      </figure>

      <article>
        <span class="eyebrows"><?php the_field('hero_subhead'); ?></span>
        <h1><?php the_field('hero_title'); ?></h1>
        <p><?php the_field('hero_copy'); ?></p>
      </article>
    </div>
  </div>
</section>

<section class="comparison-main--brand">
  <div class="container">
    <div class="content-nav-wrap">
      <h2><?php the_field('brand_title'); ?></h2>
      <div class="nav-wrap">
        <?php 
        if( have_rows('brand_buttons') ):
        while( have_rows('brand_buttons') ): the_row();
        $link = get_sub_field('link');

        if( $link ): 
          $link_url = $link['url'];
          $link_title = $link['title'];
          $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
          <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
        <?php
          endif; endwhile; endif;
        ?>
      </div>
    </div>
  </div>
</section>

<section class="comparison-main--table">
  <div class="container">
    <h2><?php the_field('table_title'); ?></h2>
    <div class="table">
      <div class="top-row">
        <?php include 'img/comparison/bam-logo-white.svg'; ?>
      </div>
      <div class="rows-wrap">

        <?php
          if( have_rows('table_rows') ):
          while( have_rows('table_rows') ): the_row();
        ?>
        <div class="row">
          <div class="col">
            <p><?php the_sub_field('title'); ?></p>

            <?php if (get_sub_field('popup_copy')): ?>
            <div class="info-box">
              <div class="icon">
                <svg class="non-active" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 22.4999C6.20101 22.4999 1.5 17.7989 1.5 11.9999C1.5 6.20089 6.20101 1.49988 12 1.49988C17.799 1.49988 22.5 6.20089 22.5 11.9999C22.5 17.7989 17.799 22.4999 12 22.4999ZM12 23.9999C18.6274 23.9999 24 18.6273 24 11.9999C24 5.37246 18.6274 -0.00012207 12 -0.00012207C5.37258 -0.00012207 0 5.37246 0 11.9999C0 18.6273 5.37258 23.9999 12 23.9999Z" fill="#AECBF4"/>
                <path d="M10.5023 16.4999C10.5023 15.6715 11.1739 14.9999 12.0023 14.9999C12.8307 14.9999 13.5023 15.6715 13.5023 16.4999C13.5023 17.3283 12.8307 17.9999 12.0023 17.9999C11.1739 17.9999 10.5023 17.3283 10.5023 16.4999Z" fill="#AECBF4"/>
                <path d="M10.6493 7.49243C10.5693 6.69331 11.1969 5.99988 12 5.99988C12.8031 5.99988 13.4307 6.6933 13.3507 7.49243L12.8246 12.7536C12.7823 13.1773 12.4258 13.4999 12 13.4999C11.5742 13.4999 11.2177 13.1773 11.1754 12.7536L10.6493 7.49243Z" fill="#AECBF4"/>
                </svg>
                <svg class="active-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM12 6C11.1969 6 10.5693 6.69343 10.6493 7.49256L11.1754 12.7537C11.2177 13.1774 11.5742 13.5 12 13.5C12.4258 13.5 12.7823 13.1774 12.8246 12.7537L13.3507 7.49256C13.4307 6.69343 12.8031 6 12 6ZM12.0023 15C11.1739 15 10.5023 15.6716 10.5023 16.5C10.5023 17.3284 11.1739 18 12.0023 18C12.8307 18 13.5023 17.3284 13.5023 16.5C13.5023 15.6716 12.8307 15 12.0023 15Z" fill="#AECBF4"/>
                </svg>
              </div>
              <div class="info-copy">
                <div class="inner-wrap">
                  <h3><?php the_sub_field('title'); ?></h3>
                  <p><?php the_sub_field('popup_copy'); ?></p>
                </div>
              </div>
            </div>
            <?php endif; ?>

          </div>

          <div class="col">
            <p><?php the_sub_field('text'); ?></p>

            <?php if (get_sub_field('stars_image')): ?>
            <img src="<?php the_sub_field('stars_image'); ?>" alt="start">
            <p><?php the_sub_field('stars_text'); ?></p>
            <?php endif; ?>
          </div>
        </div>
        <?php
          endwhile; endif;
        ?>

      </div>
    </div>
  </div>
</section>

<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>
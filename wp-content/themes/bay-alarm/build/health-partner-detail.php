<?php
  // Template Name: Health Partner Detail
  update_option('current_page_template', 'health-partner-detail');
  get_header();
?>

  <section class="health-partner--hero">
    <div class="container">
        <div class="row">
          <figure>
              <img src="<?php the_field('hero_image'); ?>" alt="Hero Image">
          </figure>

          <article>
            <h1><?php the_field('hero_title'); ?></h1>
            <p><?php the_field('hero_copy'); ?></p>

          <?php
          $link = get_field('hero_button');

          if( $link ):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
          <a href="<?php echo esc_url($link_url); ?>" class="btn call-btn number" target="<?php echo esc_attr($link_target); ?>">
            <span class="small-text promoNumber"><?php echo esc_html($link_title); ?></span>
          </a>
          <?php endif; ?>
          </article>
        </div>
    </div>
  </section>

   <?php
    include 'inc/logos-block.php';
  ?>

  <section class="health-partner--main" id="health-partner-contact">
    <div class="container">
      <div class="top-wrap">
        <h2><?php the_field('main_title'); ?></h2>
        <?php the_field('main_copy'); ?>
      </div>

      <div class="content-wrap">
        <?php
          if( have_rows('main_content_list') ):
          while( have_rows('main_content_list') ): the_row();
        ?>
        <div class="row">
          <figure>
            <img src="<?php the_sub_field('image'); ?>" alt="Image">
          </figure>
          <article>
            <h2><?php the_sub_field('title'); ?></h2>
            <p><?php the_sub_field('copy'); ?></p>
          </article>
        </div>
        <?php
            endwhile; endif;
          ?>
      </div>
    </div>
  </section>

<section class="health-partner--form" id="b2b-contact">
  <div class="container">
    <div class="row">
      <div class="col copy">
        <img src="<?php echo GET_TEMP ?>/img/form-icons.png" alt="Image">
        <h2>Become a Bay Alarm Health Partner Today!</h2>
        <p>Talk to someone in partnerships today or call us toll free <a class="“number" href="tel:18775229633"><span class="promoNumber">1-877-522-9633</span></a></p>
      </div>

      <div class="col form-wrap">
        <?php include 'inc/b2b-interest-form.php'; ?>
      </div>
    </div>
  </div>
</section>

<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>

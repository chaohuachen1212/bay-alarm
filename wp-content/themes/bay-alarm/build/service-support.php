<?php
  // Template Name: Service Support
  update_option('current_page_template', 'service-support');
  get_header();
?>
  <section class="service-support--hero">
    <div class="container">
      <div class="row">
          <?php
          $hero_text = get_field('hero_title');
          $hero_copy = get_field('hero_copy');
          ?>
          <div class="col-l">
          <article>
          <span class="sub-head"><?php the_field('hero_subhead'); ?></span>
          <?php if ($hero_text): ?>
              <h1><?php echo $hero_text; ?></h1>
          <?php endif; ?>
          <?php if ($hero_copy): ?>
              <?php echo $hero_copy; ?>
          <?php endif; ?>

          <?php
          $desktop_hero_image = get_field('hero_image');
          ?>
        </article>
      </div>
        <figure>
          <img class="hero-image" src="<?php echo $desktop_hero_image; ?>">
        </figure>
      </div>
    </div>
  </section>


  <section class="sevice-support--intro">
    <div class="container">
      <h2><?php the_field('intro_title'); ?></h2>
      <div class="row">
        <?php
          if( have_rows('intro_cards') ):
          while( have_rows('intro_cards') ): the_row();
        ?>
        <div class="col">
          <span class="icon-wrap">
            <img src="<?php the_sub_field('icon'); ?>" alt="Icon">
          </span>
          <h3><?php the_sub_field('title'); ?></h3>
          <?php the_sub_field('copy'); ?>
        </div>
        <?php
          endwhile; endif;
        ?>
      </div>
    </div>
  </section>

  <section class="sevice-support--holidays">
    <div class="container">
      <div class="row">
        <div class="col">
          <?php the_field('holidays_left_content'); ?>
        </div>
        <div class="col">
          <?php the_field('holidays_right_content'); ?>
        </div>
      </div>

      <div class="node-copy">
        <?php the_field('holidays_note_copy'); ?>
      </div>
    </div>
  </section>

  <section class="sevice-support--blog">
    <div class="container">
        <div class="row">
          <article>
            <div class="inner-wrap">
              <h2><?php the_field('blog_title'); ?></h2>
              <?php the_field('blog_copy'); ?>
              <?php
                $link = get_field('blog_button');

                if( $link ):
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
              <?php endif; ?>
          </div>
          </article>

          <figure>
            <img src="<?php the_field('blog_image'); ?>" alt="Image">
          </figure>
        </div>
    </div>
  </section>

  <section class="sevice-support--cards">
      <div class="row">

        <?php
          if( have_rows('cards_list') ):
          while( have_rows('cards_list') ): the_row();
        ?>
        <div class="card">
          <img src="<?php the_sub_field('background_image'); ?>" alt="Image">
          <div class="wrap">
            <h2><?php the_sub_field('title'); ?></h2>
            <?php
              $link = get_sub_field('link');

              if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
              <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
          </div>
        </div>
        <?php
          endwhile; endif;
        ?>
      </div>

      <div class="large-card">
        <img src="<?php the_field('large_card_image'); ?>" alt="Image">
        <div class="wrap">
            <h2><?php the_field('large_card_title'); ?></h2>
            <?php
              $link = get_field('large_card_button');

              if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
              <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
          </div>
      </div>
  </section>

<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>
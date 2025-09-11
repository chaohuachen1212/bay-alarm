<?php
  // Template Name: Resources Documents
  update_option('current_page_template', 'resources-documents');
  get_header();
?>
<section class="help-guides--hero">
    <div class="container">
      <div class="row">
          <?php
          $hero_text = get_field('hero_title');
          $hero_copy = get_field('hero_copy');
          ?>
          <div class="col-l">
          <article>
          <?php if (get_field('hero_subhead')): ?>
            <span class="sub-head"><?php the_field('hero_subhead'); ?></span>
          <?php endif; ?>
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
        <div class="btn-wrap">
          <?php
            $nav_arr = [];
            if( have_rows('hero_buttons') ):
            while( have_rows('hero_buttons') ): the_row();
          ?>
            <?php
             $link = get_sub_field('button');

              if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';

                $text = strtolower(str_replace(' ', '-', $link_title));
            array_push($nav_arr, $text);
                ?>
                <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
              <?php endif; ?>
          <?php
            endwhile; endif;
          ?>
        </div>
      </div>
        <figure>
          <img class="hero-image" src="<?php echo $desktop_hero_image; ?>">
        </figure>
      </div>
    </div>
  </section>


<section class="resources-documents-main">
  <div class="container">

    <?php
      $c = 0;
    	if( have_rows('main_content_list') ):
    	while( have_rows('main_content_list') ): the_row();
    ?>
    <div class="files is-active" id="<?php echo $nav_arr[$c] ?>">
      <h2><?php the_sub_field('title') ?></h2>
      <p><?php the_sub_field('copy') ?></p>
      <div class="box">
        <div class="cards-wrap">
          <?php
            if( have_rows('cards') ):
            while( have_rows('cards') ): the_row();
          ?>
          <div class="card">
            <h3><?php the_sub_field('title') ?></h3>
            <article>
              <img src="<?php echo esc_url(get_sub_field('image')['url']) ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']) ?>">
              <div class="btn-wrap">
              <?php
                if( have_rows('buttons') ):
                while( have_rows('buttons') ): the_row();
              ?>
              <?php if (get_sub_field('which_type_of_button')==='link'): ?>
                <a href="<?php the_sub_field('link') ?>">View</a>
              <?php else: ?>
                <a href="<?php the_sub_field('file') ?>" download>Download</a>
              <?php endif; ?>

              <?php
                endwhile; endif;
              ?>
            </div>
            </article>
          </div>

          <?php
          	endwhile; endif;
          ?>
        </div>

      </div>
    </div>

    <?php
      $c++;
    	endwhile; endif;
    ?>

  </div>
</section>

<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>

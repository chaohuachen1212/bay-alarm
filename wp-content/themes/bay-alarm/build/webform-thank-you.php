<?php
  // Template Name: Webform Thanks
  update_option('current_page_template','webform-thanks'); // <----- this adds a body class
  get_header();
?>

  <section class="webform-thanks--main">
    <div class="container">
      <article>
        <div class="icon-wrap">
          <img src="<?php the_field('hero_icon'); ?>" alt="Hero Icon">
        </div>
        <h1><?php the_field('hero_title'); ?></h1>
        <?php the_field('hero_copy'); ?>
      </article>

      <div class="row">
        <div class="col">
           <img src="<?php the_field('main_image'); ?>" alt="Image">
        </div>
        <div class="col">
          <h2><?php the_field('main_title'); ?></h2>
          <?php the_field('main_content'); ?>
           <?php
            $link = get_field('main_button');

          if( $link ):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="circle-1"> </div>
    <div class="circle-2"> </div>
    <div class="circle-3"> </div>
    <div class="circle-4"> </div>
  </section>

<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>

<?php
  // Template Name: Thanks
  update_option('current_page_template','thanks'); // <----- this adds a body class
  get_header();
?>

<section class="home-hero">
  <figure class="hero-img hero-img-1" style="background-image: url(<?php echo GET_TEMP ?>/img/home-hero.jpg);"></figure>
  <figure class="hero-img hero-img-2" style="background-image: url(<?php echo GET_TEMP ?>/img/home-hero-2.jpg);"></figure>
  <article class="text-box">
    <h1><?php the_field('title'); ?></h1>
    <h6><?php the_field('sub_info'); ?></h6>
    <div class="buttons-wrap">
      <a href="<?php echo home_url(); ?>" class="btn">
        <span class="big-text">GO HOME</span>
      </a>
    </div>
  </article>
</section>

<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>

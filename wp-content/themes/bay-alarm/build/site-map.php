<?php
  // Template Name: Site Map
  update_option('current_page_template', 'sitemap-page');
  get_header();
?>

<section class="sitemap--hero">
  <div class="container">
    <div class="center-all">
      <h1><?php the_field('hero_heading') ?></h1>
      <p><?php the_field('hero_subtext') ?></p>
    </div>
  </div>
</section>


<section class="container sitemap--main">

  <article class="sitemap-wrap">
    
    <div class="col">

      <?php
        if( have_rows('column_left') ): while( have_rows('column_left') ): the_row();
      ?>
      <h6><a href="<?php the_sub_field('title_link') ?>"><?php the_sub_field('title') ?></a></h6>
      <ul>
        <?php
          if( have_rows('sub_links') ): while( have_rows('sub_links') ): the_row();
        ?>
        <li><a href="<?php the_sub_field('link') ?>"><?php the_sub_field('name') ?></a></li>
        <?php
          endwhile; endif;
        ?>
      </ul>
      <?php
        endwhile; endif;
      ?>

    </div>

    <div class="col">

      <?php
        if( have_rows('column_center') ): while( have_rows('column_center') ): the_row();
      ?>
      <h6><a href="<?php the_sub_field('title_link') ?>"><?php the_sub_field('title') ?></a></h6>
      <ul>
        <?php
          if( have_rows('sub_links') ): while( have_rows('sub_links') ): the_row();
        ?>
        <li><a href="<?php the_sub_field('link') ?>"><?php the_sub_field('name') ?></a></li>
        <?php
          endwhile; endif;
        ?>
      </ul>
      <?php
        endwhile; endif;
      ?>

    </div>

    <div class="col">
      <?php
        if( have_rows('column_right') ): while( have_rows('column_right') ): the_row();
      ?>
      <h6><a href="<?php the_sub_field('title_link') ?>"><?php the_sub_field('title') ?></a></h6>
      <ul>
        <?php
          if( have_rows('sub_links') ): while( have_rows('sub_links') ): the_row();
        ?>
        <li><a href="<?php the_sub_field('link') ?>"><?php the_sub_field('name') ?></a></li>
        <?php
          endwhile; endif;
        ?>
      </ul>
      <?php
        endwhile; endif;
      ?>
    </div>
  </article>
  
</section>

<?php include 'inc/bottom-get-started.php' ?>


<?php get_footer(); ?>

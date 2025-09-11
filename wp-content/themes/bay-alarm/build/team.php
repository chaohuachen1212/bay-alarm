<?php
  //Template Name:  Team
  update_option('current_page_template','team-page'); // <----- this adds a body class
  get_header();
?>

<!-- Team Container -->
<section class="team-container">

  <!-- Team rail -->

  <div class="team-rail">
    <article class="team-nav">
      <h1><?php the_field('rail_heading') ?></h1>

      <ul>
        <?php
          $count = 1;
          if( have_rows('rail_subnav') ): while( have_rows('rail_subnav') ): the_row();
        ?>
        <a href="<?php the_sub_field('anchor_id') ?>">
          <li id="#team-<?php echo $count; ?>">
            <span><?php the_sub_field('item_name') ?></span>
          </li>
        </a>
        <?php
          $count++; endwhile; endif;
        ?>
      </ul>

      <div class="team-nav-dropdown">
        <select>
          <option>Select</option>
          <?php
            if( have_rows('rail_subnav') ): while( have_rows('rail_subnav') ): the_row();
          ?>
          <option><?php the_sub_field('item_name') ?></option>
          <?php
            endwhile; endif;
          ?>
        </select>
      </div>
    </article>


    <article class="team-nav-image">
      <?php if (get_field('default_rail_image')): ?>
        <figure id="tr-img-1" style="background-image: url(<?php the_field('default_rail_image') ?>);"></figure>
      <?php endif; ?>
      <?php
        $count = 2;
        if( have_rows('rail_subnav') ): while( have_rows('rail_subnav') ): the_row();
      ?>
      <?php if (get_sub_field('rail_image')): ?>
        <figure id="tr-img-<?php echo $count ?>" style="background-image: url(<?php the_sub_field('rail_image') ?>);"></figure>
      <?php endif; ?>
      <?php
        $count++; endwhile; endif;
      ?>
    </article>

  </div>

  <!-- Team Main -->
  <div class="team-main">
    <?php include 'inc/team/lander.php' ?>
    <?php include 'inc/team/social.php' ?>
    <?php include 'inc/team/feedback.php' ?>
    <?php include 'inc/team/contact.php' ?>
  </div>

</section>

<?php include 'inc/bottom-get-started.php' ?>

<?php get_footer(); ?>

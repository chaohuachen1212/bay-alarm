<?php
  // Template Name: Thanks New
  update_option('current_page_template','thanks-new'); // <----- this adds a body class
  get_header();
?>

<style>
  .thanks-new .btn {background-color: <?php the_field('thanks_button_bg_color') ?>; color:<?php the_field('button_copy_color') ?>; border: 2px solid <?php the_field('button_border_color') ?>; }
  .thanks-new .btn:hover {background-color: <?php the_field('hover_thanks_button_bg_color') ?>; color:<?php the_field('hover_copy_color') ?>; border: 2px solid <?php the_field('hover_thanks_button_bg_color') ?>; }
  .thanks-new h1 {color:<?php the_field('thanks_copy_color') ?>;}
  .thanks-new .thanks-new-main p {color:<?php the_field('thanks_copy_color') ?>;}
  .thanks-new .thanks-new-main ul li {color:<?php the_field('thanks_copy_color') ?>;}
  .thanks-new .thanks-new-main ol li {color:<?php the_field('thanks_copy_color') ?>;}

  @media screen and (max-width: 960px){
    .thanks-new h1 {color:<?php the_field('thanks_copy_mobile_color') ?>;}
    .thanks-new .thanks-new-main p {color:<?php the_field('thanks_copy_mobile_color') ?>;}
    .thanks-new .thanks-new-main ul li {color:<?php the_field('thanks_copy_mobile_color') ?>;}
    .thanks-new .thanks-new-main ol li {color:<?php the_field('thanks_copy_mobile_color') ?>;}
    .thanks-new .thanks-new-main article {color:<?php the_field('thanks_mobile_container_color') ?>;}
    .thanks-new .btn { color:<?php the_field('thanks_copy_mobile_color') ?> }
    }
  }
</style>

<section class="thanks-new-main">
 <figure style="background-image: url('<?php the_field('thanks_background_image') ?>')"> </figure>
 <article>
   <h1><?php the_field('thanks_title') ?></h1>
   <?php the_field('thanks_copy') ?>

   <div class="btn-wrap">
     <a href="<?php the_field('thanks_button_url') ?>" class="btn"><?php the_field('thanks_button_copy') ?></a>
   </div>
 </article>
</section>

<?php
  if (get_field('affiliate_scripts')) {
    the_field('affiliate_scripts');
  }

  get_footer();
?>

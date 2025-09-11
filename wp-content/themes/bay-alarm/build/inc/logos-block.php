<section class="new-home--logo-block">
    <div class="container">
      <span class="eyebrows"><?php the_field('logo_title'); ?></span>
      <div class="logo-wrap">
        <?php
          if( have_rows('logos_list') ):
          while( have_rows('logos_list') ): the_row();
        ?>
          <div class="logo-box">
            <img class="logo" src="<?php the_sub_field('logo'); ?>" alt="Logo">
          </div>
        <?php
          endwhile; endif;
        ?>
      </div>
    </div>
  </section>
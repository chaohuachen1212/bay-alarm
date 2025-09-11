<!--
  Attached to team.php
  Live inside a col(2/10)
  Observe deck for layout changes
-->

    <!-- Begin -->
    <section id="team-grid-1" class="team-lander">
      <figure class="team-hero" style="background-image: url(<?php the_field("lander_hero") ?>);">
        <a href="#team-mission" class="btn-outline blue">
          <?php the_field("lander_button") ?>
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-6 7.5 13.4 18.1" style="enable-background:new -6 7.5 13.4 18.1;" xml:space="preserve">
            <polygon points="-6,18.9 0.7,25.6 7.4,18.9 6,17.5 1.7,21.8 1.7,7.5 -0.3,7.5 -0.3,21.8 -4.6,17.5 "/>
          </svg>
        </a>
      </figure>
    </section>



    <section id="team-mission" class="team-mission">
      <article class="split-col">
        <?php if (get_field('mission_heading')): ?>
          <h4><?php the_field("mission_heading") ?></h4>
        <?php endif; ?>
        <?php the_field("mission_copy") ?>
      </article>
      <article class="split-col">
        <div class="top-grid">
          <?php
            $count = 1;
            if( have_rows('mission_grid_images') ):
            while( have_rows('mission_grid_images') ): the_row();
            if ($count < 3):
          ?>
          <figure style="background-image: url(<?php the_sub_field('image') ?>);"></figure>
          <?php
            endif; $count++; endwhile; endif;
          ?>
        </div>
        <div class="btm-grid">
          <?php
            $count = 1;
            if( have_rows('mission_grid_images') ):
            while( have_rows('mission_grid_images') ): the_row();
            if ($count === 3):
          ?>
          <figure style="background-image: url(<?php the_sub_field('image') ?>);"></figure>
          <?php
            endif; $count++; endwhile; endif;
          ?>
        </div>
      </article>
    </section>

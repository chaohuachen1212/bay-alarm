<!--
  Attached to team.php
  Live inside a col(2/10)
  Observe deck for layout changes
-->

    <!-- Begin -->
    <section id="team-grid-3" class="team-social">

      <article class="split-col">
      <h4><?php the_field("social_heading") ?></h4>
        <?php the_field("social_copy") ?>

        <ul class="social-links">
          <?php
            if( have_rows('social_media') ):
            while( have_rows('social_media') ): the_row();
          ?>
          <a href="<?php (get_sub_field("url_type") === "internal") ? the_sub_field("internal_link"): the_sub_field("external_link") ?>" 
          <?php the_sub_field("new_window") ?>>
            <li>
              <span class="social-icon"><?php include get_sub_field("icon").'.svg' ?></span>
              <p><?php the_sub_field("social_name") ?></p>
              <small><?php the_sub_field("subtext") ?></small>
            </li>
          </a>
          <?php
            endwhile; endif;
          ?>
        </ul>
      </article>

      <article class="split-col">
        <div class="top-grid">
          <?php
            $count = 1;
            if( have_rows('social_grid_image') ):
            while( have_rows('social_grid_image') ): the_row();
            if ( $count < 4 ) :
          ?>
          <figure style="background-image: url(<?php the_sub_field("image") ?>);"></figure>
          <?php
            endif; $count++; endwhile; endif;
          ?>
        </div>

        <div class="btm-grid">
          <?php
            $counter = 1;
            if( have_rows('social_grid_image') ):
            while( have_rows('social_grid_image') ): the_row();
            if ( $counter === 4 ) :
          ?>
          <figure style="background-image: url(<?php the_sub_field("image") ?>);"></figure>
          <?php
            endif; $counter++; endwhile; endif;
          ?>
        </div>
      </article>

    </section>


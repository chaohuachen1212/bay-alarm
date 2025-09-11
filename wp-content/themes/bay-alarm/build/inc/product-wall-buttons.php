<section class="prod-wall-buttons">
  <figure class="wall-buttons-bg" style="background-image: url(<?php the_field('wall_buttons_bg'); ?>);"></figure>
  <article>
    <?php the_field('wall_buttons_copy'); ?>
    <div class="wall-button-features">
      <ul>
        <?php if (have_rows('wall_buttons_features')): while (have_rows('wall_buttons_features')): the_row(); ?>
        <li>
          <figure style="background-image: url(<?php the_sub_field('feature_icon'); ?>);"></figure>
          <span><?php the_sub_field('feature_copy'); ?></span>
        </li>
        <?php endwhile; endif; ?>
      </ul>
    </div>
  </article>
</section>
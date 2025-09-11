
<section class="prod-module-cellular">
  <article class="container-wrap">
    <div class="col col-img">
      <img class="prod-img" src="<?php the_field('image_pmc'); ?>">
    </div>

    <div class="col col-text">
      <h3><?php the_field('heading_pmc'); ?></h3>
      <ul>
        <?php if (have_rows('listing_pmc')) : while (have_rows('listing_pmc')) : the_row(); ?>
        <li><?php the_sub_field('item'); ?></li>
        <?php endwhile; endif; ?>
      </ul>
      
      <?php if ( get_field('button_option_pmc') === 'yes'  ) : ?>
      <a href="<?php the_field('button_link_pmc'); ?>" class="lm-btn btn-outline blue"><?php the_field('button_text_pmc'); ?></a>
      <?php endif; ?>

      <div class="map-coverage">
        <div class="map-col">
          <img src="<?php the_field('map_image_pmc'); ?>">
        </div>
        <div class="map-text-col">
          <div class="text-wrap">
            <p><?php the_field('map_copy_pmc'); ?></p>
            <a href="<?php the_field('map_link_pmc'); ?>" target="_blank"><?php the_field('map_link_text_pmc'); ?></a>
          </div>
        </div>
      </div>
    </div>
  </article>
</section>


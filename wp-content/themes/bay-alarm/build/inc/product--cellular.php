<?php
  $args = array('post_type' => 'product-detail');
  $the_query = new WP_Query($args);
  if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
?>

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


      <?php if ($page_temp === 'in-home.php'): ?>
      <h3 class="cellular-graph-heading"><?php the_field('cell_coverage_headline'); ?></h3>
      <div class="cellular-graph">
        <div class="cellular-graph-detail">

          <div class="bar bar-left" style="height: 220px;">
            <p class="bar-total bar-left-total"></p>

            <?php $c = 1; if (have_rows('landline_bars')) : while (have_rows('landline_bars')) : the_row(); ?>
              <?php $priceChunks = preg_split('/[.]/', get_sub_field('chunk_price')); ?>
              <?php $price = $priceChunks[0] . '<span>.' . $priceChunks[1] . '</span>'; ?>

              <div class="chunk chunk-<?php echo $c; ?>" style="height: 50%;">
                <?php if (get_sub_field('chunk_copy')): ?>
                  <p class="chunk-copy"><?php the_sub_field('chunk_copy'); ?></p>
                <?php endif; ?>
                <p class="chunk-price">$<?php echo $price; ?></p>
              </div>
            <?php $c++; endwhile; endif; ?>

            <p class="bar-bottom-copy"><?php the_field('landline_bar_bottom_copy'); ?></p>
          </div>

          <div class="bar bar-right" style="height: 139px;">
            <p class="bar-total bar-right-total"></p>

            <?php $c = 3; if (have_rows('cellular_bars')) : while (have_rows('cellular_bars')) : the_row(); ?>
              <?php $priceChunks = preg_split('/[.]/', get_sub_field('chunk_price')); ?>
              <?php $price = $priceChunks[0] . '<span>.' . $priceChunks[1] . '</span>'; ?>

              <div class="chunk chunk-<?php echo $c; ?>" style="height: 50%;">
                <?php if (get_sub_field('chunk_copy')): ?>
                  <p class="chunk-copy"><?php the_sub_field('chunk_copy'); ?></p>
                <?php endif; ?>
                <p class="chunk-price">$<?php echo $price; ?></p>
              </div>
            <?php $c++; endwhile; endif; ?>

            <p class="bar-bottom-copy"><?php the_field('cellular_bar_bottom_copy'); ?></a>
          </div>

        </div>
      </div>
      <?php endif; ?>

    </div>
  </article>
</section>


<?php
  endwhile;
  endif;
  wp_reset_query();
?>
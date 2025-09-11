<?php
  $path = basename($_SERVER['REQUEST_URI']);
  $page_temp = get_page_template_slug();
  $args = array('post_type' => 'smart_module');
  $the_query = new WP_Query($args);
  while ($the_query->have_posts()): $the_query->the_post();
?>

<section class="smartwatch--specifications">
  <h2><?php the_field('smartwatch_module_title') ?></h2>
  <div class="row">
    <div class="l-col">
      <?php
      	$c = 1;
      	if( have_rows('smartwatch_module_list') ):
      	while( have_rows('smartwatch_module_list') ): the_row();
      ?>
        <img class="<?php if($c===1): echo 'is-active'; endif; ?>" src="<?php the_sub_field('image') ?>">
      <?php
      	$c++; endwhile; endif;
      ?>
    </div>

    <div class="r-col">
      <div class="list-wrap">
        <?php
        	$n = 1;
        	if( have_rows('smartwatch_module_list') ):
        	while( have_rows('smartwatch_module_list') ): the_row();
        ?>
        <div class="item <?php if($n===1): echo 'is-active'; endif; ?>" tabindex="0" role="button">
          <span><?php echo $n ?></span>
          <div class="box">
            <p><?php the_sub_field('sub_title') ?></p><small><?php the_sub_field('small_text') ?></small>
          </div>
        </div>
        <?php
        	$n++; endwhile; endif;
        ?>
      </div>

      <div class="mobile-list-wrap">
        <?php
        	$n = 1;
        	if( have_rows('smartwatch_module_list') ):
        	while( have_rows('smartwatch_module_list') ): the_row();
        ?>
        <div class="item-wrap">
          <div class="item">
            <span><?php echo $n ?></span>
            <div class="box">
              <p><?php the_sub_field('sub_title') ?></p><small><?php the_sub_field('small_text') ?></small>
            </div>
          </div>
          <img class="<?php if($n===1): echo 'is-active'; endif; ?>" src="<?php the_sub_field('image') ?>">
        </div>
        <?php
        	$n++; endwhile; endif;
        ?>
      </div>
    </div>
  </div>
</section>

<?php
  endwhile;
  wp_reset_query();
?>

<?php
  $path = basename($_SERVER['REQUEST_URI']);
  $page_temp = get_page_template_slug();
  $args = array('post_type' => 'footer');
  $the_query = new WP_Query($args);
  while ($the_query->have_posts()): $the_query->the_post();
?>
<?php
  if (have_rows('footer_links')) : while (have_rows('footer_links')) : the_row();
?>
  <?php
    if (have_rows('footer_link')) : while (have_rows('footer_link')) : the_row();
  ?>
  <?php if (get_sub_field('is_popup_window')==='yes'): ?>
    <section class="compare-us-others">
      <div class="popup-compare">
        <div class="close"><img src="<?php echo GET_TEMP ?>/img/close.svg"></div>
        <h4><?php the_sub_field('popup_title'); ?></h4>
        <ul>
          <?php
          	if( have_rows('popup_links') ): while( have_rows('popup_links') ): the_row();
          ?>
          <li><a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('copy'); ?></a></li>
          <?php endwhile; endif; ?>
        </ul>
      </div>
    </section>
  <?php endif; ?>
  <?php endwhile; endif; ?>
<?php endwhile; endif; ?>
<?php
  endwhile;
  wp_reset_query();
?>

<?php
  $args = array('post_type' => 'hiw-subnav');
  $the_query = new WP_Query($args);
  if (have_posts()):
  while ($the_query->have_posts()): $the_query->the_post();
?>
<article class="hiw-top-nav">
  <div class="sub-nav-wrap">
    <ul id="hiw-subnav" class="items-wrap">
      <?php
        if( have_rows('hiw_subnav') ):
        while( have_rows('hiw_subnav') ): the_row();

        $path         = $_SERVER['REQUEST_URI'];
        $pathBaseName = basename($path);

        $itemName = get_sub_field("item_name");
        $itemURL = get_sub_field("item_url");
        $itemBaseName = basename($itemURL);
      ?>
      
      <li>
        <a href="<?php echo $itemURL ?>" class="nav-item <?php echo ($pathBaseName === $itemBaseName) ? 'is-active' : '' ?>">
          <span class="item-text"><?php echo $itemName ?></span>
        </a>
      </li>

      <?php
        endwhile; endif;
      ?>
    </ul>
  </div>
</article>
<?php
  endwhile;
  endif;
  wp_reset_query();
?>

<?php if (get_field('instagram_title')): ?>
  <section class="bay-ig-efforts">
    <article>
      <h2><?php the_field('instagram_title') ?></h2>
      <p><?php the_field('instagram_copy') ?></p>
    </article>
    <div class="instagram-wrap">
      <?php
          echo do_shortcode('[instagram-feed]');
      ?>
    </div>
  </section>
<?php endif; ?>

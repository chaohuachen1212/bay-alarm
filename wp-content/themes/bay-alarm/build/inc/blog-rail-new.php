
    <aside class="blog-rail">

      <!-- Blog Rail -->
      <?php
        $args = array('post_type' => 'blog-rail');
        $the_query = new WP_Query($args);
        if (have_posts()):
        while ($the_query->have_posts()): $the_query->the_post();
      ?>

      <?php if (get_field('feature_title')) : ?>
      <a class="rail-card" href="<?php the_field("feature_url") ?>" tabindex="0">
        <div class="rail-feature">
          
          <figure style="background-image: url(<?php the_field("feature_image") ?>);"></figure>
          <article>
          <h6><?php the_field("feature_title") ?></h6>
          <p><?php the_field("feature_text") ?></p>
          <button class="btn-outline blue" tabindex="-1"><?php the_field("feature_btn_title") ?></button>
          </article>
        </div>
      </a>
      <?php endif; ?>

      <?php if (get_field('highlight_title')) : ?>
      <div class="blog-rail--col">
        <a class="rail-card" href="<?php the_field("highlight_url") ?>" tabindex="0">
          <div class="rail-feature">
            <figure style="background-image: url(<?php the_field("highlight_image") ?>);"></figure>
            <article>
              <h6><?php the_field("highlight_title") ?></h6>
              <p><?php the_field("highlight_text") ?></p>
              <button class="btn-outline blue" tabindex="-1"><?php the_field("highlight_btn_title") ?></button>
            </article>
          </div>
        </a>
      </div>
      <?php endif; ?>

      <?php
        endwhile; endif;
        wp_reset_query();
      ?>

      <!-- <div class="rail-facebook">
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-page" data-href="https://www.facebook.com/bayalarmmedical" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
          <blockquote cite="https://www.facebook.com/bayaarmmedical" class="fb-xfbml-parse-ignore">
            <a href="https://www.facebook.com/bayalarmmedical">Facebook</a>
          </blockquote>
        </div>
      </div> -->

    </aside>

<!--
  Attached to team.php
  Live inside a col(2/10)
  Observe deck for layout changes
-->


    <!-- Begin -->
    <section id="team-grid-2" class="team--meet-sec">

      <div class="team-members-container">

        <article class="tm-member-list">
          <?php
            $currentYear = date("Y");
            $args = array(
                'post_type' => 'team-info',
                'posts_per_page' => -1);
            $the_query = new WP_Query($args);
            if (have_posts()):
            while ($the_query->have_posts()): $the_query->the_post();
              $firstN = strtolower(get_field('first_name'));
              $lastN = strtolower(get_field('last_name'));

              $serviceYear = get_field('years_of_service');
              if(is_numeric($serviceYear)){
                $theYears = $currentYear - $serviceYear;
              } else {
                $theYears = '';
              }
              

          ?>

          <?php if (!get_field('hide_headshot_on_about_page')): ?>
          <a class="tm-member-box is-shown" href="/author/<?php echo $firstN; ?>-<?php echo $lastN; ?>">
            <figure class="member-img">
              <img src="<?php the_field("image") ?>" alt="Image">
              <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16 32.9854C24.8366 32.9854 32 25.8219 32 16.9853C32 8.14879 24.8366 0.985341 16 0.985339C7.16345 0.985338 4.34256e-06 8.14878 2.79753e-06 16.9853C1.2525e-06 25.8219 7.16344 32.9854 16 32.9854ZM9 17.9853C8.44772 17.9853 8 17.5376 8 16.9853C8 16.4331 8.44772 15.9853 9 15.9853L20.5858 15.9853L16.2929 11.6925C15.9024 11.3019 15.9024 10.6688 16.2929 10.2782C16.6834 9.88771 17.3166 9.88771 17.7071 10.2782L23.7071 16.2782C24.0976 16.6688 24.0976 17.3019 23.7071 17.6925L17.7071 23.6925C17.3166 24.083 16.6834 24.083 16.2929 23.6925C15.9024 23.3019 15.9024 22.6688 16.2929 22.2782L20.5858 17.9853L9 17.9853Z" fill="white"/>
              </svg>
            </figure>
            <p class="mem-name"><?php the_field("first_name")?> <?php the_field("last_name")?></p>
            <p class="mem-cat" data-memcat="<?php the_field("Department") ?>"><?php the_field("title") ?></p>
            <?php if (get_field('years_of_service') && $theYears !== ''): ?>
              <p class="mem-year"><?php echo esc_html($theYears); ?> Years of Service</p>
            <?php endif; ?>
          </a>
          <?php endif; ?>
          <?php
            endwhile; endif;
            wp_reset_query();
          ?>
        </article>
      </div> <!-- .team-members-container -->

    </section>


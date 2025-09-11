<!--
  Attached to team.php
  Live inside a col(2/10)
  Observe deck for layout changes
-->

    <!-- Begin -->
    <section id="team-grid-2" class="team--meet-sec">

      <div class="team-members-container">
        <article class="tm-top-bar">
          <h1 class="tm-heading">Meet the Team</h1>
          <div class="tm-dep-dropdown">
            <select>
              <option value="all">All Departments</option>
              <option value="Senior Care Consultants">Senior Care Consultants</option>
              <option value="Customer Service">Customer Service</option>
              <option value="Warehouse Technicians">Warehouse Technicians</option>
              <option value="Accounting">Accounting</option>
              <option value="Marketing & Social Media">Marketing & Social Media</option>
              <option value="Operations">Operations</option>
            </select>
          </div>
        </article>

        <article class="tm-member-list">
          <?php
            $args = array(
                'post_type' => 'team-info',
                'posts_per_page' => -1);
            $the_query = new WP_Query($args);
            if (have_posts()):
            while ($the_query->have_posts()): $the_query->the_post();
          ?>
          <div class="tm-member-box is-shown">
            <figure class="member-img" style="background-image: url(<?php the_field("image") ?>);"></figure>
            <p class="mem-name"><?php the_field("first_name")?> <?php the_field("last_name")?></p>
            <p class="mem-cat" data-memcat="<?php the_field("Department") ?>"><?php the_field("title") ?></p>
          </div>
          <?php
            endwhile; endif;
            wp_reset_query();
          ?>
        </article>
      </div> <!-- .team-members-container -->


      <?php
        $args = array('post_type' => 'team-info', 'posts_per_page' => -1);
        $the_query = new WP_Query($args);
        if (have_posts()):
        while ($the_query->have_posts()): $the_query->the_post();
        $authorName = get_field("first_name") . "-" . get_field("last_name");
        $authorName = strtolower($authorName);
      ?>
      <div data-authorname="<?php echo $authorName; ?>" class="team-details-container">
        <article class="td-top-bar">
          <h1 class="td-backbtn">&larr; Back to All</h1>
        </article>
        <article class="td-profile-container">
          <span class="td-border-line"></span>
          <section class="td-content-col">
            <div class="td-heading-wrap">
              <div class="td-heading-col">
                <h2><?php the_field("first_name")?> <?php the_field("last_name")?></h2>
                <p><?php the_field('title') ?></p>
                <a href="mailto:<?php the_field('email') ?>"><?php the_field('email') ?></a>
              </div>
              <div class="td-headingimg-col">
                <figure style="background-image: url(<?php the_field('image') ?>);"></figure>
              </div>
            </div>
            <div class="td-maintext-wrap">
              <?php if ( get_field("about") !== "" ) : ?>
                <h6 class="td-par-title">About <?php the_field("first_name")?></h6>
                <?php the_field("about") ?>
              <?php endif ?>

              <?php if ( get_field("role") !== "" ) : ?>
                <h6 class="td-par-title"><?php the_field("first_name")?>'s Role at Bay Alarm Medical</h6>
                <?php the_field("role") ?>
              <?php endif ?>

              <?php if ( get_field("taught") !== "" ) : ?>
                <h6 class="td-par-title">What has the Medical Alert Industry Taught You?</h6>
                <?php the_field("taught") ?>
              <?php endif ?>

              <?php if ( get_field("helped") !== "" ) : ?>
                <h6 class="td-par-title">How has a Medical Alert System Helped You?</h6>
                <?php the_field("helped") ?>
              <?php endif ?>

              <?php if ( get_field("advice") !== "" ) : ?>
                <h6 class="td-par-title"><?php the_field("first_name")?>'s Advice For Customers</h6>
                <?php the_field("advice") ?>
              <?php endif ?>

              <?php if ( get_field("favorite") !== "" ) : ?>
                <h6 class="td-par-title"><?php the_field("first_name")?>'s Favorite Things</h6>
                <p><?php the_field("favorite") ?></p>
              <?php endif ?>

              <?php if ( get_field("customer_says") !== "" ) : ?>
                <h6 class="td-par-title">What Customers Are Saying About <?php the_field("first_name")?></h6>
                <blockquote><?php the_field("customer_says") ?></blockquote>
                <cite><?php the_field("customer_name") ?></cite>
              <?php endif ?>
            </div>
          </section>

          <section class="td-postlist-col">
            <h6 class="title"><?php the_field("first_name")?>'s posts</h6>


            <?php
              $login_name = get_field("user_name");
              $user = get_user_by('login', $login_name);

              if ($user) {
                $user = $user->ID;

                $args = array('post_type' => 'post',
                              'author__in'=> array($user),
                              'posts_per_page' => 5,
                              'order' => 'DESC');
                $my_query = new WP_Query($args);
                while ($my_query->have_posts()) : $my_query->the_post();
            ?>
                <div class="post-row">
                  <p class="post-date"><?php echo get_the_date('F j, Y'); ?></p>
                  <a class="post-name"><?php the_title(); ?></a>
                </div>
            <?php 
                endwhile; wp_reset_query(); 
              } 
              else {
            ?>
              <div class="post-row">
                <p class="post-date"><?php the_field("first_name")?> has no post.</p>
              </div>
            <?php
              }
            ?>

          </section>
        </article>
      </div> <!-- .team-details-container -->
      <?php
        endwhile; endif;
        wp_reset_query();
      ?>

    </section>


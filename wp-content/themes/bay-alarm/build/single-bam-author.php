<?php
  //Template Name:  Single
  update_option('current_page_template','single-author'); // <----- this adds a body class
  get_header();
  $thisAuthorName = get_the_title();
?>


<section class="single-author--sec team--meet-sec">
  <?php
    $args = array(
     'post_type' => 'team-info',
     'post_status' => array( 'publish', 'private'),
     'posts_per_page' => -1
   );
    $the_query = new WP_Query($args);
    if (have_posts()):
    while ($the_query->have_posts()): $the_query->the_post();
    $authorName = get_field("first_name") . "-" . get_field("last_name");
    $authorName = strtolower($authorName);
    $authorFullName = get_the_title();
    $authorImage =  get_field('image');
    $authorServiceYears =  get_field('years_of_service');
    $currentYear = date("Y");
    $serviceYear = get_field('years_of_service');
    if(is_numeric($serviceYear)){
      $theYears = $currentYear - $serviceYear;
    } else {
      $theYears = '';
    }
    
  ?>
  <?php if ($thisAuthorName === $authorFullName): ?>
  <div class="team-details-container is-active">

    <div class="new-team--hero">
      <div class="container">
        <a class="team-back--link" href="/about-us/">
          <img src="<?php echo GET_TEMP ?>/img/subtract.png" alt="Back Arrow">
         Back to Team Members
        </a>

        <div class="row">
          <figure>
            <img src="<?php echo esc_url($authorImage) ?>" alt="Image">
          </figure>

          <div class="copy-wrap">
            <span class="eyebrows">Meet The Team</span>
            <h1><?php the_field("first_name")?> <?php the_field("last_name")?></h1>
            <p class="job-title"><?php the_field('title'); ?> <?php if(get_field('years_of_service') && $theYears !== ''):  echo '- '. esc_html($theYears) .' Years of Service'; endif; ?></p>
            <p><?php the_field("about"); ?></p>
          </div>

        </div>
      </div>
    </div>
    <article class="td-profile-container">
      <span class="td-border-line"></span>
      <section class="td-content-col">
        <div class="td-heading-wrap">

        <div class="td-maintext-wrap">

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
              <a class="post-name" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
  <?php endif; ?>
  <?php
    endwhile; endif;
    wp_reset_query();
  ?>

</section>

<?php get_footer(); ?>

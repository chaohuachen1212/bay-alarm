<?php
  //Template Name:  Videos
  update_option('current_page_template','videos-page'); // <----- this adds a body class
  get_header();
?>

<section class="videos-page--hero">
    <div class="container">
      <div class="row">
          <?php
          $hero_text = get_field('hero_title');
          $hero_copy = get_field('hero_copy');
          ?>
          <div class="col-l">
          <article>
          <span class="eyebrows"><?php the_field('hero_subhead'); ?></span>
          <?php if ($hero_text): ?>
              <h1><?php echo $hero_text; ?></h1>
          <?php endif; ?>
          <?php if ($hero_copy): ?>
              <?php echo $hero_copy; ?>
          <?php endif; ?>

          <?php
          $desktop_hero_image = get_field('hero_image');
          ?>
        </article>
      </div>
        <figure>
          <img class="hero-image" src="<?php echo $desktop_hero_image; ?>">
        </figure>
      </div>
    </div>
  </section>



<section class="video-wrapper">
  <div class="featured-vid">
    <article>
      <a href="javascript:void(0)" class="video-modal-call" data-videosrc="<?php the_field("featured_video_link") ?>" aria-label='Watch <?php echo get_field('featured_video_title') ?>'>
        <figure class="video-large" style="background-image: url(<?php the_field("featured_video_image") ?>);">
            <?php include 'inc/vectors/new-play-icon.svg' ?>
          </figure>
      </a>
    </article>

    <article>
      <a href="<?php the_field("featured_video_post_link") ?>">
        <p class="eyebrows">FEATURED VIDEO</p>
        <h3><?php the_field("featured_video_title") ?></h3>
        <p><?php the_field("featured_video_copy") ?></p>
        <span class="btn red">Learn More</span>
      </a>
    </article>
  </div>

  <div class="para-hero videos-hero">

    <article class="sort-wrapper">
      <div id="vcat-select" class="select-wrap filters-button-group" role="group" aria-labelledby="videoCats">
        <select name="categories" aria-label="Categories">
          <option value="" data-filter="*" id="videoCats">All Videos</option>
          <option data-filter=".cat-technical">Technical Support</option>
          <option data-filter=".cat-community">Community</option>
          <option data-filter=".cat-health">Health</option>
          <option data-filter=".cat-holiday">Holiday</option>
          <option data-filter=".cat-faq">FAQ</option>
          <option data-filter=".cat-partnership">Partnership</option>
        </select>
      </div>

      <div id="vcat-sorting" class="select-wrap button-group sort-by-button-group" role="group" aria-labelledby="originalOrder">
        <select name="orders" aria-label="Sort by">
          <option value="" data-sort-value="original-order" id="originalOrder">Sorting</option>
          <option value="newest" data-sort-value="datedesc">Newest First</option>
          <option value="oldest" data-sort-value="dateasc">Oldest First</option>
          <option value="longest" data-sort-value="lengthdesc">Longest First</option>
          <option value="shortest" data-sort-value="lengthasc">Shortest First</option>
        </select>
      </div>
    </article>

    <article class="v-search-wrap">
      <input id="v-search-bar" class="v-search-bar" placeholder="Search Videos" type="text" title="Search Videos">
      <button type="submit" class="v-search-btn"><?php include 'inc/vectors/search.svg' ?></button>
    </article>

  </div>

  <div class="video-grid">

    <?php
      // $catID = get_cat_ID( "video" );

      $args = array('post_type' => 'post',
                    'category_name' => 'video-en',
                    'posts_per_page' => -1,
                    'order' => 'DESC');
      $my_query = new WP_Query($args);
      while ($my_query->have_posts()) : $my_query->the_post();

      $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    ?>

    <article class="video-item <?php the_field("category") ?>"
      data-category="<?php the_field("category") ?>"
      data-length="<?php
        $str_time = get_field("video_length");
        sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
        echo $time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes; ?>"
      data-date="<?php
        $date = get_the_date('m/d/Y');
        echo $timestamp = strtotime($date); ?>"
    >

      <a href="javascript:void(0)" class="video-modal-call" data-videosrc="<?php the_field("video_url") ?>">
        <figure class="vi-preview" style="background-image: url(<?php echo $feat_image; ?>);"><?php include 'inc/vectors/play-icon.svg' ?>
          <span class="thumb-border"></span>
          <span class="thumb-vlength"><?php the_field("video_length") ?></span>
        </figure>
      </a>

      <a href="<?php the_field("post_link") ?>">
        <div class="vi-info">
          <h5><?php the_title(); ?></h5>
          <p><?php echo get_the_excerpt(); ?></p>
          <span class="btn">Learn More</span>
        </div>
      </a>

    </article>

    <?php endwhile; wp_reset_query(); ?>
  </div>



</section>


<?php include 'inc/bottom-get-started.php' ?>

<?php get_footer(); ?>

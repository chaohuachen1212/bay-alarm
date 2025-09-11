<?php
  // Template Name: Blog Lander
  update_option('current_page_template','blog-lander');
  get_header();
?>

  
  <section class="blog-lander--hero">
    <div class="container">
      <div class="row">
      <article>
        <span class="eyebrows">Blog Posts</span>
        <h1 class="heading"><?php the_field('hero_title') ?></h1>
        <p><?php the_field('hero_subtext') ?></p>
      </article>

      <?php $thumbnailImage = get_field('hero_image'); ?>
        <?php if ($thumbnailImage): ?>
        <figure class="hero-img">
          <img src="<?php the_field('hero_image') ?>" alt="Hero Image">
        </figure>
        <?php endif; ?>

    </div>
    </div>
  </section>


  <section class="blog-content">
    <div class="blog-categories">
      <ul id="horizontal">
        <li><a class="is-active" href="#!">recent</a></li>
          <?php

            $path = basename($_SERVER['REQUEST_URI']);

            $categories = get_categories(array(
              'orderby' => 'id',
              'order'   => 'ASC',
              'exclude' => array(1)
            ));

            foreach( $categories as $category ) :
              $slug = $category->slug;
              $url = get_category_link($category->term_id);
              $cat = $category->name; ?>

              <li>
                <a href="<?php echo $url ?>" class="<?php echo ($path === $slug) ? 'is-active' : ''; ?>">
                  <?php echo $cat; ?>
                </a>
              </li>

          <?php
            endforeach;
          ?>
      </ul>
    </div>
    <div class="blog--posts">
      <?php
        // $options = array(
        //     'post_type' => 'post',
        //     'order' => 'DESC',
        //     'orderby' => 'date',
        //     'posts_per_page' => 10
        //   );
        //   $wp_query = new WP_Query( $options );
        //   while( $wp_query->have_posts() ) : $wp_query->the_post();
        //   $img = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_avatar_url(get_the_author_meta('ID'));
      ?>

      <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

        $args = array(
           'posts_per_page' => 9,
           'paged' => $paged
        );

        $custom_query = new WP_Query( $args );

        while($custom_query->have_posts()) : $custom_query->the_post();
          $img = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_avatar_url(get_the_author_meta('ID'));
      ?>

      <div class="blog-card">
        <a href="<?php the_permalink(); ?>">
          <figure>
            <img src="<?php echo $img; ?>" alt="Image">
          </figure>
          <article>
            <div class="top-box">
              <p class="cat-name"><?php the_author(); ?></p>
              <p class="blog-date"><?php the_time('F j, Y'); ?></p>
            </div>
            <h3><?php the_title(); ?></h3>
            <div class="author-wrap">
              <span class="author-name"><?php echo get_the_category()[0]->cat_name ?></span>
            </div>
            <p><?php echo substr(strip_tags(get_the_excerpt()), 0, 190); ?>...</p>
            
          </article>
          <span class="btn">Read More</span>
        </a>

      </div>

      <?php endwhile; wp_reset_query(); ?>


      <section class="blog-pagination">
        <?php if (function_exists("pagination")) {
            pagination($custom_query->max_num_pages);
        } ?>
      </section>
    </div>

  </section>



  <section class="related-posts">
  </section>


<?php include 'inc/bottom-get-started.php' ?>

<?php
  get_footer();
?>

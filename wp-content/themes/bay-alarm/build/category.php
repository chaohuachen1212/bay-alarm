<?php
  update_option('current_page_template','category');
  get_header();

  $category = get_category( get_query_var( 'cat' ) );
  $cat_id = $category->cat_ID;
?>

  <section class="blog--hero">
    <div class="container">
      <article>
        <h1>Welcome to our <span>Blog</span></h1>
      <p>Medical alert advice, tips, and how-to‘s for seniors, families, and caregivers</p>
      </article>
    </div>
  </section>

  <section class="blog-content">

    <div class="blog-categories">
      <ul id="horizontal">
        <li><a href="/medical-alert-blog">recent</a></li>
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
                <?php  echo $cat; ?>
              </a>
            </li>

        <?php endforeach; ?>
      </ul>
    </div>
    <div class="blog--posts">
      <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

        $options = array(
            'post_type' => 'post',
            'order' => 'DESC',
            'orderby' => 'date',
            'posts_per_page' => 9,
            'category__in' => array($cat_id),
            'paged' => $paged
          );
          $custom_query = new WP_Query( $options );
          while( $custom_query->have_posts() ) : $custom_query->the_post();
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

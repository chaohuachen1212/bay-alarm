<?php
  //Template Name:  Single
  update_option('current_page_template','single');
  get_header();
?>

  <section class="blog-detail--hero">
    <div class="container">
      <article>
        <span class="eyebrows">Blog Post</span>
        <h1 class="heading"><?php the_title(); ?></h1>

        <div class="blog-info-detail">
          <div class="blog--author-info">
          
          <?php $authors_ids = explode(",", do_shortcode('[publishpress_authors_data field="ID"]')); ?>
          <?php foreach ($authors_ids as $author_id) : ?>

            <?php 
              $fullName = strtolower(get_the_author_meta( 'user_firstname' , $author_id )) . '-' . strtolower(get_the_author_meta( 'user_lastname' , $author_id ));
            ?>
            <?php if (get_the_author_meta( 'user_lastname' , $author_id )): ?>
              <a class="author-box" href="/author/<?php echo $fullName; ?>">
            <?php else: ?>
              <a class="author-box" href="/author/<?php the_author_meta( 'user_nicename' , $author_id ); ?>">
            <?php endif; ?>
               <?php echo get_avatar( $author_id ); ?>
               <div class="author-copy">
                <?php if (get_the_author_meta( 'description' , $author_id )): ?>
                <p class="job-title"><?php echo the_author_meta( 'description' , $author_id ); ?> </p>
                <?php endif; ?>
                <p class="name">by: <strong><?php echo the_author_meta( 'display_name' , $author_id ); ?> </strong></p>
                <p class="date">Posted: <?php the_time('F j, Y'); ?></p>
              </div>
           </a>
          <?php endforeach; ?>

      </div>
        </div>
      </article>
    </div>
  </section>

  <section class="blog-content">
    <div class="blog-posts">
      <article class="blog-content-container">
        <div class="blog-content-main">
          <?php $thumbnailImage = get_the_post_thumbnail_url(); ?>
          <?php if ($thumbnailImage): ?>
          <figure class="content-top-img">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="Image">
          </figure>
          <?php endif; ?>

          <?php the_content(); ?>
        </div>
      </article>
    </div>

    <?php include 'inc/blog-rail-new.php' ?>

  </section>


<section class="blog-relative--posts">
  <div class="container">
    <h2>We thought you might also like:</h2>

    <div class="blog-posts">

      <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
          $post_id = get_the_ID();
        $args = array(
          'post_type'      => 'post',
           'posts_per_page' => 3,
           'post__not_in'   => array($post_id),
           'paged' => $paged
        );

        $custom_query = new WP_Query( $args );

        while($custom_query->have_posts()) : $custom_query->the_post();
          $img = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_avatar_url(get_the_author_meta('ID'));

           $cats = get_the_terms($post->ID, 'category' );
          if ($cats && ! is_wp_error($cats)) :
            foreach ($cats as $cat) {
              $newCatName = $cat->name;
            }
          endif;
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
              <span class="author-name"><?php echo $newCatName; ?></span>
            </div>
            <p><?php echo substr(strip_tags(get_the_excerpt()), 0, 190); ?>...</p>
            
          </article>
          <span class="btn">Read More</span>
        </a>

      </div>

      <?php endwhile; wp_reset_query(); ?>

    </div>
  </div>
</section>



<?php include 'inc/bottom-get-started.php' ?>

<?php get_footer(); ?>

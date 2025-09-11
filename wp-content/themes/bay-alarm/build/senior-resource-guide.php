<?php
  // Template Name: Senior Resource Guide
  update_option('current_page_template','senior-resource-guide');
  get_header();
?>

<section class="senior-resource-guide--hero">
  <div class="container">
    <div class="row">
        <?php
        $hero_text = get_field('hero_text');
        $hero_copy = get_field('hero_copy');
        ?>
        <div class="col-l">
        <article>
        <span class="sub-head"><?php the_field('hero_subhead'); ?></span>
        <?php if ($hero_text): ?>
            <h1><?php echo $hero_text; ?></h1>
        <?php endif; ?>
        <?php if ($hero_copy): ?>
            <h1><?php echo $hero_copy; ?></h1>
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

<div class="max-width-1600">
<section class="senior-resource-guide--guide">
  <div class="container">
    <h2><?php the_field('products_title'); ?></h2>
    <div class="guide-wrap">
    <?php
    $products = get_field('products');
    ?>

    <?php if ($products): ?>
      <?php while (have_rows('products')): the_row(); ?>
        <?php
        $icon = get_sub_field('icon');
        $title = get_sub_field('title');
        $description = get_sub_field('description');
        $compare = get_sub_field('compare_button');
        $compare_url = !empty($compare) ? $compare['url'] : '';
        $compare_text = !empty($compare) ? $compare['title'] : '';
        $guide = get_sub_field('guide_button');
        $guide_url = !empty($guide) ? $guide['url'] : '';
        $guide_text = !empty($guide) ? $guide['title'] : '';
        if (!empty($compare) && !empty($compare_text)) {
          $guideLink = $compare_url;
        }

        if (!empty($guide_url) && !empty($guide_text)) {
          $guideLink = $guide_url;
        }
        ?>
        <a class="product-card" href="<?php echo esc_url($guideLink); ?>">
          <figure>
            <img src="<?php echo $icon; ?>" alt="image">
          </figure>

          <article>
            <h3><?php echo $title; ?></h3>
            <p><?php echo $description; ?></p>
          </article>
          <?php
            if (!empty($compare) && !empty($compare_text)) {
                echo '<span class="btn">' . $compare['title'] . '</span>';
            }
          ?>
          <?php
            if (!empty($guide_url) && !empty($guide_text)) {
                echo '<span class="btn">' . $guide_text . '</span>';
            }
          ?>
        </a>
      <?php endwhile; ?>
    <?php endif; ?>
    </div>
  </div>
</section>

<div class="senior-resource-guide--main-content">

   <section class="blog-content">
    <div class="top-wrap">
      <h2><?php the_field('resource_title'); ?></h2>
      <p><?php the_field('resource_copy'); ?></p>
    </div>

    <div class="blog-posts">

      <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

        $args = array(
          'post_type'      => 'post',
           'posts_per_page' => -1,
           'category_name' => 'senior-resource-guide',
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

  </section>

</div>

<div class="guide--pagination">
    <div class="container">
      <nav class="pagination-page" id="pagination-page" aria-label="pagination">
        
      </nav>
    </div>
  </div>


</div>

<?php include 'inc/bottom-get-started.php' ?>
<?php get_footer(); ?>

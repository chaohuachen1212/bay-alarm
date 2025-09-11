<?php
  get_header();
  update_option('current_page_template', 'search');
?>

<?php
  $i = 2;

  if (have_posts() ) : ?>

    <div class='show-results'>
      <p>Showing search results for:
        <span>
          <?php echo get_query_var('s'); include 'inc/vectors/close.svg'; ?></span>
      </p>
      <div class="search-input-wrap">
        <form role="search" method="get" action="<?php echo home_url('/'); ?>">
          <input type="search" class="search-input" name="s" />
          <button type="submit" class="overlay-search-btn header-search-btn"><?php include 'inc/vectors/magnifier-glass.svg' ?></button>
        </form>
      </div>
    </div>

    <div class="search-wrap">
      <section class='search-results'>

      <?php
        while (have_posts()) : the_post();
        $post_type = get_post_type(get_the_ID());
      ?>

        <a href="<?php the_permalink(); ?>" class="result animated fade-in-up delay-<?php echo $i; ?>">
          <h4><?php the_title(); ?></h4>
          <?php if ($post_type === 'post'): ?>
            <div class="result-post">
              <span><?php the_time('F j, Y'); ?></span>
              <span><?php the_author(); ?></span>
            </div>
            <?php the_excerpt(); ?>
          <?php endif; ?>
        </a>

    <?php
        $i++;
        endwhile;
      echo "</section>";
      include 'inc/blog-rail.php';
      else :
    ?>

  <section class='search-results no-results'>
    <h2>Nothing Found</h2>
    <div class="alert alert-info">
      <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
    </div>
    <a class="search-back btn" href="<?php echo home_url(); ?>">return to home</a>
  </section>

<?php endif; ?>

</div>

<?php get_footer(); ?>

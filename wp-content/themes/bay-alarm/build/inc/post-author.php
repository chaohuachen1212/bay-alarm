<div class="blog--author-info">
    <p class="blog-date"><?php the_time('F j, Y'); ?></p>
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
          <p class="name"><?php echo the_author_meta( 'display_name' , $author_id ); ?> </p>
        </div>
     </a>
    <?php endforeach; ?>

</div>
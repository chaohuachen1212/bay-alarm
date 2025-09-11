<?php
  //Template Name:  Reviews New
  update_option('current_page_template','reviews-new-page'); // <----- this adds a body class
  get_header();
?>

<section class="reviews-new--hero">
    <div class="container">
        <div class="row">
            <article>
                <span class="eyebrows"><?php the_field('hero_eyebrow'); ?></span>
                <h1><?php the_field('hero_title'); ?></h1>
                <?php the_field('hero_copy'); ?>
            </article>
            <div class="video-wrap">
                <div class="hero-img-bg"></div>
                <div class="video-box video-modal-call" data-videosrc="<?php the_field('hero_video_url'); ?>">
                    <figure>    
                        <img src="<?php the_field('hero_video_image'); ?>" alt="Reviews Hero Image" class="video-image">
                    </figure>
                    <span class="icon">
                        <svg width="71" height="72" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse opacity="0.2" cx="35.3404" cy="36.1996" rx="35.3238" ry="35.4036" fill="#3C3A42"/>
                        <path d="M35.7246 3.4137C54.0095 3.41384 68.8242 18.2694 68.8242 36.5846C68.824 54.8997 54.0094 69.7544 35.7246 69.7545C17.4397 69.7545 2.62423 54.8997 2.62402 36.5846C2.62402 18.2693 17.4396 3.4137 35.7246 3.4137Z" stroke="white" stroke-width="4"/>
                        <path d="M50.699 36.5842L28.2376 51.5812L28.2376 21.5873L50.699 36.5842Z" fill="white"/>
                        </svg>
                    </span>               
                </div>
            </div>
        </div>
    </div>
</section>

<section class="reviews-new--videos">
    <div class="container">
        <h2><?php the_field('videos_title'); ?></h2>
        <div class="row">
            <?php
                if( have_rows('videos_cards') ):
                while( have_rows('videos_cards') ): the_row();
            ?>
            <div class="col video-modal-call" data-videosrc="<?php the_sub_field('video_url'); ?>">  
                <figure>
                     <img src="<?php the_sub_field('image'); ?>" alt="Reviews Card Image">
                    <span class="icon">
                        <svg width="71" height="72" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse opacity="0.2" cx="35.3404" cy="36.1996" rx="35.3238" ry="35.4036" fill="#3C3A42"/>
                        <path d="M35.7246 3.4137C54.0095 3.41384 68.8242 18.2694 68.8242 36.5846C68.824 54.8997 54.0094 69.7544 35.7246 69.7545C17.4397 69.7545 2.62423 54.8997 2.62402 36.5846C2.62402 18.2693 17.4396 3.4137 35.7246 3.4137Z" stroke="white" stroke-width="4"/>
                        <path d="M50.699 36.5842L28.2376 51.5812L28.2376 21.5873L50.699 36.5842Z" fill="white"/>
                        </svg>
                    </span>  
                </figure>
                <h4><?php the_sub_field('title'); ?></h4>
                <p><?php the_sub_field('text'); ?></p>
            </div>
            <?php
                endwhile; endif;
            ?>

        </div>
    </div>
</section>

<section class="company--reviews-sec">
    <div class="container">
        <?php
            if( have_rows('company_reviews_contents') ):
            while( have_rows('company_reviews_contents') ): the_row();
        ?>
        <div class="review-content">
            <div class="top-wrap">
                <h2><?php the_sub_field('title'); ?></h2>
                <?php the_sub_field('copy'); ?>
            </div>
            <div class="rows-wrap">
                <?php
                    if( have_rows('company_reviews_rows') ):
                    while( have_rows('company_reviews_rows') ): the_row();
                ?>
                <div class="row">
                    <?php
                        if( have_rows('cards') ):
                        while( have_rows('cards') ): the_row();
                    ?>
                    <div class="col <?php if(get_sub_field('turn_on_mobile_image')): echo 'has--mobile-img'; endif; ?>">
                        <img class="desktop-image" src="<?php the_sub_field('image'); ?>" alt="Reviews Card Image">
                        <?php if (get_sub_field('turn_on_mobile_image')): ?>
                        <img class="mobile-img" src="<?php the_sub_field('mobile_image'); ?>" alt="Reviews Card Image">
                        <?php endif; ?>
                        <h3><?php the_sub_field('title'); ?></h3>

                        <div class="reviews-copy-wrap">
                            <div class="copy-wrap less--copy">
                                <div class="review-copy">
                                    <?php the_sub_field('copy'); ?>
                                </div>

                                <span class="btn-link">View More</span>
                            </div>

                            <div class="copy-wrap more--copy">
                                <div class="review-copy">
                                    <?php the_sub_field('copy'); ?>
                                </div>

                                <span class="btn-link">View Less</span>
                            </div>
                        </div>
                      
                    </div>
                    <?php
                        endwhile; endif;
                    ?>
                </div>
                <?php
                    endwhile; endif;
                ?>
            </div>
        </div>
        <?php
            endwhile; endif;
        ?>
    </div>
</section>

<?php include 'inc/rating-section.php' ?>
<?php include 'inc/bottom-get-started.php' ?>


<?php get_footer(); ?>
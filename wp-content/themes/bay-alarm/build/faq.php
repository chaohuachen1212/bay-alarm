<?php
  // Template Name: FAQ
  update_option('current_page_template', 'faq-page');
  get_header();
?>

<section class="faq-hero">
  <div class="container">
    <h1><?php the_field('hero_title'); ?></h1>
    <div class="faq-nav">
      <?php if (have_rows('faq_sections')) : while (have_rows('faq_sections')) : the_row(); ?>
        <a href="#<?php echo kni_slugify(get_sub_field('section_title')); ?>"><?php the_sub_field('section_title'); ?></a>
      <?php endwhile; endif; ?>
    </div>
    <div class="faq-hero-icon icon-left">
      <?php include 'inc/vectors/faq-cog-left.svg'; ?>
    </div>

    <div class="faq-hero-icon icon-right">
      <?php include 'inc/vectors/faq-cog-right.svg'; ?>
    </div>
  </div>
</section>

<section class="faq-container">
  <?php if (have_rows('faq_sections')) : while (have_rows('faq_sections')) : the_row(); ?>
    <div class="faq-block" id="<?php echo kni_slugify(get_sub_field('section_title')); ?>">
      <h4 class="faq-block-title"><?php the_sub_field('section_title'); ?></h4>
      <?php if (get_sub_field('intro_copy')) : ?>
        <div class="faq-block-intro"><?php the_sub_field('intro_copy'); ?></div>
      <?php endif; ?>
      <?php if (have_rows('faq_items')) : while (have_rows('faq_items')) : the_row(); ?>
        <div class="faq-item">
          <div class="faq-toggle">
            <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.1322 14.1236C5.64888 13.6396 5.64888 12.8548 6.1322 12.3708L10.504 7.99255L6.1322 3.61435C5.64888 3.13032 5.64888 2.34555 6.1322 1.86152C6.61552 1.37749 7.39913 1.37749 7.88245 1.86152L14.0044 7.99255L7.88245 14.1236C7.39913 14.6076 6.61552 14.6076 6.1322 14.1236Z" fill="#3C3A42"/>
            </svg>
            <?php the_sub_field('question_text'); ?>
            </div>
          <div class="faq-content">
            <?php if (get_sub_field('answer_copy')) : ?>
              <div class="faq-content-copy"><?php the_sub_field('answer_copy'); ?></div>
            <?php endif; ?>

            <?php if (get_sub_field('resources')) : ?>
              <div class="faq-resources">
                <p><strong>Additional Resources</strong></p>
                <div class="faq-resources-list">
                  <?php if (have_rows('resources')) : while (have_rows('resources')) : the_row(); ?>
                    <?php $resource_type = get_sub_field('resource_type'); ?>
                    <?php $resource_title = get_sub_field('resource_title') ? ': ' . get_sub_field('resource_title') : ''; ?>

                    <?php if ($resource_type === 'video') : ?>
                      <div class="faq-resource-item">
                        <p>VIDEO<?php echo $resource_title; ?></p>
                        <div class="faq-resource-item-content resource-video" style="background-image: url(<?php the_sub_field('resource_image'); ?>)">
                          <a href="javascript:void(0)" class="video-modal-call" data-videosrc="<?php the_sub_field('embed_url'); ?>">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36.2 36.2" enable-background="new 0 0 36.2 36.2" xml:space="preserve">
                              <circle fill="none" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" cx="18.1" cy="18.1" r="17.3"></circle>
                              <polygon points="26.2,18.1 12.6,8.9 12.6,27.3 "></polygon>
                            </svg>
                            <div class="video-length"><?php the_sub_field('video_length'); ?></div>
                          </a>
                        </div>
                      </div>
                    <?php elseif ($resource_type === 'document') : ?>
                      <div class="faq-resource-item">
                        <p>GUIDE<?php echo $resource_title; ?></p>
                        <div class="faq-resource-item-content resource-document">
                          <div class="resource-doc-img">
                            <img src="<?php the_sub_field('resource_image'); ?>" alt="">
                          </div>
                          <div class="resource-btns">
                            <a href="<?php the_sub_field('pdf'); ?>" target="_blank" rel="noopener"><strong>View</strong></a>
                            <a href="<?php the_sub_field('pdf'); ?>" download><strong>Download</strong></a>
                          </div>
                        </div>
                      </div>
                    <?php elseif ($resource_type === 'post') : ?>
                      <div class="faq-resource-item">
                        <p>BLOG<?php echo $resource_title; ?></p>
                        <div class="faq-resource-item-content resource-post" style="background-image: url(<?php the_sub_field('resource_image'); ?>)">
                          <a href="<?php the_sub_field('blog_post')['url']; ?>" target="_blank" rel="noopener">
                            <svg width="225" height="285" viewBox="0 0 225 285" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <line x1="73" y1="40" x2="152" y2="40" stroke="white" stroke-width="7"/>
                              <line x1="17" y1="65" x2="208" y2="65" stroke="white" stroke-width="7"/>
                              <line x1="17" y1="90" x2="208" y2="90" stroke="white" stroke-width="7"/>
                              <line x1="17" y1="115" x2="208" y2="115" stroke="white" stroke-width="7"/>
                              <line x1="17" y1="140" x2="208" y2="140" stroke="white" stroke-width="7"/>
                              <line x1="17" y1="165" x2="208" y2="165" stroke="white" stroke-width="7"/>
                              <line x1="17" y1="190" x2="208" y2="190" stroke="white" stroke-width="7"/>
                              <line x1="17" y1="215" x2="208" y2="215" stroke="white" stroke-width="7"/>
                              <line x1="17" y1="240" x2="208" y2="240" stroke="white" stroke-width="7"/>
                            </svg>
                          </a>
                        </div>
                      </div>
                    <?php endif; ?>
                  <?php endwhile; endif; ?>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endwhile; endif; ?>
    </div>
  <?php endwhile; endif; ?>
</section>

<?php include 'inc/bottom-get-started.php' ?>

<?php get_footer(); ?>

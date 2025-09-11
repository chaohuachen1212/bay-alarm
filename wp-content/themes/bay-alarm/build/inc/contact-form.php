<!-- Contact Form -->

<?php
  $args = array('post_type' => 'contact_info');
  $the_query = new WP_Query($args);
  while ($the_query->have_posts()): $the_query->the_post();
?>

<section class="contact-form-wrapper">

  <article>
    <h2><?php the_title(); ?></h2>
    <h4><?php the_field('sub_title'); ?></h4>
    <?php the_field('information'); ?>

    <div class="contact-btn">
      <?php if (have_rows('buttons')) : while (have_rows('buttons')) : the_row(); ?>
      <a href="<?php the_sub_field('link'); ?>" class="btn-outline blue" <?php the_sub_field('new_tab'); ?>><?php the_sub_field('label'); ?></a>
      <?php endwhile; endif; ?>
    </div>
  </article>

  <article>

    <form class="contact-form">
      <input type=hidden name="orgid" value="00D410000014jPN">

      <!-- Name -->
      <div class="input-wrap has-label field-row half">
        <input type="text" id="name" name="name" class="input-required" placeholder="Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Name*'" />
        <label data-content="Name*" for="name">Contact Name*</label>
      </div>

      <!-- Email -->
      <div class="input-wrap has-label field-row half last">
        <input type="text" id="email" name="email" class="input-required" placeholder="Email Address*" onfocus="this.placeholder=''" onblur="this.placeholder='Email*'" />
        <label data-content="Email*" for="email">Email</label>
      </div>

      <!-- Phone -->
      <div class="input-wrap has-label field-row half">
        <input type="text" id="phone" name="phone" placeholder="Phone Number" onfocus="this.placeholder=''" onblur="this.placeholder='Phone Number'" />
        <label data-content="Phone Number" for="phone">Phone Number</label>
      </div>

      <!-- Subject -->
      <div class="input-wrap has-label field-row half last">
        <input type="text" id="subject" name="subject" placeholder="Subject" onfocus="this.placeholder=''" onblur="this.placeholder='Subject'" />
        <label data-content="Subject" for="subject">Subject</label>
      </div>

      <!-- Description -->
      <div class="input-wrap has-label field-row">
        <textarea name="description" class="input-required" placeholder="Description*" onfocus="this.placeholder=''" onblur="this.placeholder='Description*'"></textarea>
        <label data-content="Description" for="description">Description</label>
      </div>

      <div class="small"><p>* Required</p></div>

      <input type="submit" id="contact-submit" name="submit" class="btn-outline blue submit salesforce-btn">
    </form>

  </article>

</section>

<?php
  endwhile;
  wp_reset_query();
?>

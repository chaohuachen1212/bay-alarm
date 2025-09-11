<?php
  // Template Name: Brochure
  update_option('current_page_template','brochure');
  get_header();

  $hero_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
?>

<section class="brochure-hero" style="background-image: url(<?php echo $hero_image; ?>);">
  <div class="center-all">
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </div>
</section>

<section class="brochure-form">

  <form id="#brochure-form" class="brochure-form">
    <input type=hidden name="oid" value="00D80000000JxsC">
    <input type=hidden name="retURL">

    <!-- First Name -->
    <div class="input-wrap has-label field-row">
      <input type="text" id="first_name" name="first_name" class="input-required" placeholder="First Name*" onfocus="this.placeholder=''" onblur="this.placeholder='First Name*'" />
      <label data-content="First Name*" for="first_name">First Name*</label>
    </div>

    <!-- Last Name -->
    <div class="input-wrap has-label field-row">
      <input type="text" id="last_name" name="last_name" class="input-required" placeholder="Last Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Last Name*'" />
      <label data-content="Last Name*" for="first_name">Last Name*</label>
    </div>

    <!-- Email -->
    <div class="input-wrap has-label field-row">
      <input type="text" id="email" name="email" class="input-required" placeholder="Email Address*" onfocus="this.placeholder=''" onblur="this.placeholder='Email Address*'" />
      <label data-content="Email Address*" for="email">Email Address*</label>
    </div>

    <!-- Phone -->
    <div class="input-wrap has-label field-row">
      <input type="text" id="phone" name="phone" class="input-required" placeholder="Phone Number*" onfocus="this.placeholder=''" onblur="this.placeholder='Phone Number*'" />
      <label data-content="Phone Number*" for="phone">Phone Number*</label>
    </div>

    <!-- Select Wrapper -->
    <div class="brochure-selects">

      <!-- Which system are you interested in -->
      <div class="input-wrap select-wrapper">
        <select
          type="text"
          id="00N80000002WU1U"
          name="00N80000002WU1U"
          class="input-required"
          placeholder="Which system are you interested in?"
          onblur="this.placeholder='Which system are you interested in?'"
          onfocus="this.placeholder=''"
          value=""
        >
          <option value="">Which system are you interested in?</option>
          <option value="In-Home">In-Home</option>
          <option value="In-Home Cellular">In-Home Cellular</option>
          <option value="Mobile GPS Help Button">Mobile GPS Help Button</option>
          <option value="All Of The Above">All Of The Above</option>
        </select>
      </div>

      <!-- Who will the system be for? -->
      <div class="input-wrap select-wrapper">
        <select
        type="text"
          id="00N34000005X4P4"
          name="00N34000005X4P4"
          class="input-required"
          placeholder="Who will the system be for?"
          onblur="this.placeholder='Who will the system be for?'"
          onfocus="this.placeholder=''"
          value=""
        >
          <option value="">Who will the system be for?</option>
          <option value="Myself">Myself</option>
          <option value="Spouse">Spouse</option>
          <option value="Parent">Parent</option>
          <option value="Relative">Relative</option>
          <option value="Friend">Friend</option>
          <option value="Other">Other</option>
        </select>
      </div>

      <!-- How did you find out about us? -->
      <div class="input-wrap select-wrapper">
        <select
        type="text"
          id="lead_source"
          name="lead_source"
          class="input-required"
          placeholder="How did you find out about us?"
          onblur="this.placeholder='How did you find out about us?'"
          onfocus="this.placeholder=''"
          value=""
        >
          <option value="">How did you find out about us?</option>
          <option value="Search Engine - Google">Search Engine - Google</option>
          <option value="Search Engine - Other">Search Engine - Other</option>
          <option value="Website - Reviews Website">Website - Reviews Website</option>
          <option value="Website - Facebook">Website - Facebook</option>
          <option value="Website - Youtube">Website - Youtube</option>
          <option value="Website - Other">Website - Other</option>
          <option value="Word of Mouth - Friend or Family">Word of Mouth - Friend or Family</option>
          <option value="Word of Mouth - Health Professional">Word of Mouth - Health Professional</option>
          <option value="Radio">Radio</option>
          <option value="TV">TV</option>
          <option value="Other">Other</option>
        </select>
      </div>

    </div>

    <!-- Message -->
    <div class="input-wrap has-label textarea-wrap">
      <textarea id="00N80000004MVJY"
                name="00N80000004MVJY"
                placeholder="Comments"
                onfocus="this.placeholder=''"
                onblur="this.placeholder='Comments'" ></textarea>
      <label data-content="Comments" for="00N80000004MVJY">Comments</label>
    </div>

    <div class="small">
      <p>* Required Field</p>
    </div>

    <input id="brochure-submit" type="submit" name="submit" class="salesforce-btn" value="Send Brochure!">
  </form>

</section>

<?php include 'inc/bottom-get-started.php' ?>


<?php get_footer(); ?>

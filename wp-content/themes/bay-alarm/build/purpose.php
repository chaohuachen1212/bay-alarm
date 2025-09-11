<?php

// Template Name: Purpose
update_option('current_page_template', 'purpose');
get_header();
$hero_image = get_field('purpose_hero_background');
$heroTtl = get_field('hero_heading');
$heroTag = get_field('hero_tagline');

// Button Vars
$heroBut = get_field('hero_button'); // Button
if($heroBut) {
  $link = esc_attr($heroBut['url']); // link
  $target = esc_attr($heroBut['target'] ? $heroBut['target'] : '_self'); // target
  $title = esc_html($heroBut['title']); // title
}

?>

<header class="b2b-hero" style="background-image: url(<?php echo $hero_image; ?>);">
    <div class="hero-info">
        <h1><?php echo $heroTtl; ?></h1>
        <h2><?php echo $heroTag; ?></h2>
        <a class="btn" href="<?php echo $link; ?>" title="<?php echo $title; ?>"
            target="<?php echo $target; ?>"><?php echo $title; ?></a>
    </div>
</header>

<?php


//================
// Content Loop
//================

// Begin page content loop
if( have_rows('page_content') ):
  while ( have_rows('page_content') ) : the_row();

  //------------
  // Partners
  //------------

  if( get_row_layout() == 'partners' ) {

    $title = get_sub_field('section_title');
    $sub = get_sub_field('section_sub_title');
    $border = get_sub_field('border_top');

    echo '<section class="our-partners b2b-section';

    if($border === 'yes') {
      echo ' border-top';
    }

    echo '">';

    if($title) {
      echo '<header>';
      echo '<h1 class="b2b-section-title">';
      esc_html_e($title);
      echo '</h1>';

    if($sub) {
        echo '<h2 class="b2b-section-sub">';
        esc_html_e($sub);
        echo '</h2>';
      }
      echo '</header>';
    }

    if( have_rows('partner') ):

      echo '<div class="partner-logos">';

      while ( have_rows('partner') ) : the_row();

        $logoOG = get_sub_field('logo');
        $logo = wp_get_attachment_image( $logoOG, 'full' );

        if($logo) {
          echo '<figure>';
          echo $logo;
          echo '</figure>';
        }

      endwhile;

      echo '</div>'; // .partner-logos

    endif;

    echo '</section>';

  //----------------
  // Opportunities
  //----------------

  } elseif( get_row_layout() == 'opportunities' ) {

    $title = get_sub_field('section_title');
    $sub = get_sub_field('section_sub_title');

    echo '<section class="our-opportunities b2b-section">';
    if($title) {
      echo '<header>';
      echo '<h1 class="b2b-section-title">';
      esc_html_e($title);
      echo '</h1>';

      if($sub) {
        echo '<h2 class="b2b-section-sub">';
        esc_html_e($sub);
        echo '</h2>';
      }
      echo '</header>';
    }

    if( have_rows('opportunities') ):

      echo '<div class="b2b-opportunities">';

      while ( have_rows('opportunities') ) : the_row();

        $titleS = get_sub_field('title');
        $desc = get_sub_field('description');
        $button = get_sub_field('link');

        if($button) {
          $link = esc_attr($button['url']); // link
          $target = esc_attr($button['target'] ? $button['target'] : '_self'); // target
          $title = esc_html($button['title']); // title
        }

        echo '<aside class="b2b-opportunity">';

        if($title) {
          echo '<div class="b2b-opportunity-info">';
          echo '<h3>';
          esc_html_e($titleS);
          echo '</h3>';

          if($desc) {
            echo '<p>';
            esc_html_e($desc);
            echo '</p>';
          }
          echo '</div>'; // .b2b-opportunity-info

          if($button) {
            echo '<a class="btn" href="' .$link. '" title="' .$title. '" target="' .$target. '">' .$title.'</a>';
          }
        }

        echo '</aside>'; // .b2b-opportunity

      endwhile;

      echo '</div>'; //.b2b-opportunities

    endif;

    echo '</section>'; // .our-opportunities

  //--------------
  // Contact Us
  //--------------

  } elseif( get_row_layout() == 'contact_us' ) {

    $tag = get_sub_field('tagline');
    $button = get_sub_field('link');

    if($button) {
      $link = esc_attr($button['url']); // link
      $target = esc_attr($button['target'] ? $button['target'] : '_self'); // target
      $title = esc_html($button['title']); // title
    }

    if($tag) {
      echo '<section class="b2b-contact-us b2b-section">';
      echo '<h2>';
      esc_html_e($tag);
      echo '</h2>';
      if($button) {
        echo '<a class="btn "href="' .$link. '" title="' .$title. '" target="' .$target. '">' .$title.'</a>';
      }

      echo '</section>'; // .b2b-contact-us
    }

  //--------------
  // Our Products
  //--------------

  } elseif( get_row_layout() == 'our_products' ) {

    $title = get_sub_field('section_title');
    $sub = get_sub_field('section_sub_title');

    echo '<section class="our-b2b-products b2b-section">';
    if($title) {
      echo '<header>';
      echo '<h1 class="b2b-section-title">';
      esc_html_e($title);
      echo '</h1>';

      if($sub) {
        echo '<h2 class="b2b-section-sub">';
        esc_html_e($sub);
        echo '</h2>';
      }
      echo '</header>';
    }

    if( have_rows('products') ):

      echo '<div class="b2b-products-container">';

      while ( have_rows('products') ) : the_row();

        $imgOG = get_sub_field('image');
        $img = wp_get_attachment_image( $imgOG, 'full' );

        $titleS = get_sub_field('title');
        $desc = get_sub_field('description');

        $button = get_sub_field('link');

        if($button) {
          $link = esc_attr($button['url']); // link
          $target = esc_attr($button['target'] ? $button['target'] : '_self'); // target
          $title = esc_html($button['title']); // title
        }

        echo '<aside class="b2b-product-card">';

        echo '<div class="b2b-prodiuct-info">';
        if($img) {
          echo $img;
        }

        if($titleS) {
          echo '<h3>';
          esc_html_e($titleS);
          echo '</h3>';
        }

        if($desc) {
          echo '<p>';
          esc_html_e($desc);
          echo '</p>';
        }
        echo '</div>'; // .b2b-prodiuct-info

        if($button) {
          echo '<a class="btn "href="' .$link. '" title="' .$title. '" target="' .$target. '">' .$title.'</a>';
        }

        echo '</aside>'; // .b2b-product-card

      endwhile;
    endif;

    echo '</section>'; // .our-b2b-products

  //-------------------
  // Why Lifestation?
  //-------------------

  } elseif( get_row_layout() == 'why_lifestation' ) {

    $title = get_sub_field('section_title');
    $sub = get_sub_field('section_sub_title');
    $border = get_sub_field('border_bottom');

    echo '<section class="b2b-why-lifestation b2b-section';

    if($border === 'yes') {
      echo ' border-bottom';
    }

    echo '">';

    if($title) {
      echo '<header>';
      echo '<h1 class="b2b-section-title">';
      esc_html_e($title);
      echo '</h1>';

      if($sub) {
        echo '<h2 class="b2b-section-sub">';
        esc_html_e($sub);
        echo '</h2>';
      }
      echo '</header>';
    }

    if( have_rows('why') ):

      echo '<div class="why-lifestation-container">';

      while ( have_rows('why') ) : the_row();

      $imgOG = get_sub_field('image');
      $img = wp_get_attachment_image( $imgOG, 'full' );
      $desc = get_sub_field('description');

      echo '<div class="why-lifestation-card">';

      if($img) {
        echo '<figure>';
        echo $img;
        echo '</figure>';
      }

      if($desc) {
        echo '<div class="why-lifestation-info">';
        echo wp_kses_post($desc);
        echo '</div>'; // .why-lifestation-info
      }

      echo '</div>'; // .why-lifestation-card

      endwhile;

      echo '</div>'; // .why-lifestation-container

    endif;

    echo '</section>'; // .b2b-why-lifestation

  //----------------
  // Our Innovations
  //----------------

  } elseif( get_row_layout() == 'our_innovations' ) {

    $title = get_sub_field('section_title');
    $sub = get_sub_field('section_sub_title');

    echo '<section class="b2b-our-innovations b2b-section">';

    if($title) {
      echo '<header>';
      echo '<h1 class="b2b-section-title">';
      esc_html_e($title);
      echo '</h1>';

      if($sub) {
        echo '<h2 class="b2b-section-sub">';
        esc_html_e($sub);
        echo '</h2>';
      }
      echo '</header>';
    }

    if( have_rows('cards') ):

      echo '<div class="our-innovations-container">';

      while ( have_rows('cards') ) : the_row();

        $icon = get_sub_field('icon');
        $title = get_sub_field('title');
        $desc = get_sub_field('description');

        echo '<div class="b2b-innovation">';


        if($icon) {
          bam_acf_svg_helper($icon);
        }
        if($title) {
          echo '<h3>';
          esc_html_e($title);
          echo '</h3>';
        }

        if($desc) {
          echo '<p>';
          esc_html_e($desc);
          echo '</p>';
        }


        echo '</div>'; // .b2b-innovation

      endwhile;

      echo '</div>'; // .our-innovations-container

    endif;

    echo '</section>'; // .b2b-our-innovations

  //----------
  // Leading
  //----------

  } elseif( get_row_layout() == 'leading' ) {

    $title = get_sub_field('section_title');
    $sub = get_sub_field('section_sub_title');

    echo '<section class="b2b-leading-where-it-matters b2b-section">';

    if($title) {
      echo '<header>';
      echo '<h1 class="b2b-section-title">';
      esc_html_e($title);
      echo '</h1>';

      if($sub) {
        echo '<h2 class="b2b-section-sub">';
        esc_html_e($sub);
        echo '</h2>';
      }
      echo '</header>';
    }

    if( have_rows('cards') ):

      echo '<div class="leading-where-it-matters-container">';

      while ( have_rows('cards') ) : the_row();

        $icon = get_sub_field('icon');
        $title = get_sub_field('title');

        echo '<div class="b2b-leading">';

        if($icon) {
          bam_acf_svg_helper($icon);
        }
        if($title) {
          echo '<h3>';
          esc_html_e($title);
          echo '</h3>';
        }

        echo '</div>'; // .b2b-leading

      endwhile;

      echo '</div>'; // .leading-where-it-matters-container

    endif;

    echo '</section>'; // .b2b-leading-where-it-matters

  //----------
  // Stats
  //----------

  } elseif( get_row_layout() == 'stats' ) {

    $title = get_sub_field('section_title');
    $sub = get_sub_field('section_sub_title');

    echo '<section class="b2b-stats b2b-section">';

    if($title) {
      echo '<header>';
      echo '<h1 class="b2b-section-title">';
      esc_html_e($title);
      echo '</h1>';

      if($sub) {
        echo '<h2 class="b2b-section-sub">';
        esc_html_e($sub);
        echo '</h2>';
      }
      echo '</header>';
    }

    if( have_rows('statistics') ):

      echo '<div class="b2b-stats-container">';

      while ( have_rows('statistics') ) : the_row();

        $num = get_sub_field('number');
        $desc = get_sub_field('description');

        echo '<div class="b2b-stat">';

        if($num) {
          echo '<h3 class="single-stat" data-count="' .$num. '">';
          echo '</h3>';
        }
        if($desc) {
          echo '<p>';
          esc_html_e($desc);
          echo '</p>';
        }

        echo '</div>'; // .b2b-stat

      endwhile;

      echo '</div>'; // .b2b-stats-container

    endif;

    echo '</section>'; // .b2b-stats

  } // End Content Types

  endwhile; // End flexible content loop
endif;

//------------------
// Footer Contact
//------------------

  $contact = get_field('contact_content');
  if($contact) {
  echo '<section id="b2b-contact" class="b2b-interest-form b2b-section">';

    echo '<div class="b2b-interest-form-content">';
    echo wp_kses_post($contact);
    echo '</div>'; // .b2b-interest-form-content

  echo '<div class="b2b-interest-form-container">';
  include 'inc/b2b-interest-form.php';
  echo '</div>'; // .b2b-interest-form-container

  echo '</section>'; // .b2b-interest-form
  }

  ?>

  <?php include 'inc/bottom-get-started.php' ?>

<?php get_footer(); ?>

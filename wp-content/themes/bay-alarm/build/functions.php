<?php // ==== FUNCTIONS ==== //

// Switch for WP AJAX Page Loader; true/false
defined( 'VOIDX_SCRIPTS_PAGELOAD' ) || define( 'VOIDX_SCRIPTS_PAGELOAD', true );

// toggle admin bar
show_admin_bar(false);

// allows for featured image.
add_theme_support( 'post-thumbnails' );

// increases field limit
add_filter( 'postmeta_form_limit' , 'customfield_limit_increase' );
function customfield_limit_increase( $limit ) {
  $limit = 250;
  return $limit;
}

// remove default jquery script wordpress adds into footer
if (!is_admin()) add_action('wp_enqueue_scripts', 'my_jquery_enqueue', 11);
function my_jquery_enqueue() {
  wp_deregister_script('jquery');
  wp_register_script('jquery', '', '', '', true);
}

// An example of how to manage loading front-end assets (scripts, styles, and fonts)
require_once( trailingslashit( get_stylesheet_directory() ) . 'inc/assets.php' );

// Only the bare minimum to get the theme up and running
function voidx_setup() {

  // Language loading
  load_theme_textdomain( 'voidx', trailingslashit( get_template_directory() ) . 'languages' );

  // HTML5 support; mainly here to get rid of some nasty default styling that WordPress used to inject
  add_theme_support( 'html5', array( 'search-form', 'gallery' ) );

  // $content_width limits the size of the largest image size available via the media uploader
  // It should be set once and left alone apart from that; don't do anything fancy with it; it is part of WordPress core
  global $content_width;
  if ( !isset( $content_width ) || !is_int( $content_width ) )
    $content_width = (int) 960;

  // Register header and footer menus
  register_nav_menu( 'header', __( 'Header menu', 'voidx' ) );
  register_nav_menu( 'footer', __( 'Footer menu', 'voidx' ) );

}
add_action( 'after_setup_theme', 'voidx_setup', 11 );

// Sidebar declaration
function voidx_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Main sidebar', 'voidx' ),
    'id'            => 'sidebar-main',
    'description'   => __( 'Appears to the right side of most posts and pages.', 'voidx' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
  ) );
}
add_action( 'widgets_init', 'voidx_widgets_init' );



// Allow SVG new hack
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {


 $filetype = wp_check_filetype( $filename, $mimes );

 return [
     'ext'             => $filetype['ext'],
     'type'            => $filetype['type'],
     'proper_filename' => $data['proper_filename']
 ];

}, 10, 4 );

// allow svg upload to media library
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  $mimes['eps'] = 'application/postscript';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// use for includes
define('GET_DIR', get_template_directory());

define('GET_TEMP', get_template_directory_uri());

wp_deregister_script('jquery');
wp_register_script('jquery', '', '', '', true);

// remove generated yoast schema added in <head>
function bybe_remove_yoast_json($data){
  $data = array();
  return $data;
}
add_filter('wpseo_json_ld_output', 'bybe_remove_yoast_json', 10, 1);

// Post Type
// ==============================================================
register_post_type( 'navigation',
  array(
    'supports' => array('title','post-formats'),
    'labels' => array(
      'name' => __( 'Navigation' ),
      'singular_name' => __( 'Navigation' )
    ),
    'public' => true,
    'has_archive' => 'navigation',
  )
);

register_post_type( 'footer',
  array(
    'supports' => array('title','post-formats'),
    'labels' => array(
      'name' => __( 'Footer' ),
      'singular_name' => __( 'Footer' )
    ),
    'public' => true,
    'has_archive' => 'footer',
  )
);

register_post_type( 'hiw-subnav',
  array(
    'supports' => array('title','post-formats'),
    'labels' => array(
      'name' => __( 'HIW Subnav' ),
      'singular_name' => __( 'HIW Subnav' )
    ),
    'public' => true,
    'has_archive' => 'hiw-subnav',
  )
);

register_post_type( 'team-info',
  array(
    'supports' => array('title','post-formats'),
    'labels' => array(
      'name' => __( 'Team Info' ),
      'singular_name' => __( 'Team Info' )
    ),
    'public' => true,
    'has_archive' => 'team-info',
  )
);

register_post_type( 'blog-rail',
  array(
    'supports' => array('title','post-formats'),
    'labels' => array(
      'name' => __( 'Blog Rail' ),
      'singular_name' => __( 'Blog Rail' )
    ),
    'public' => true,
    'has_archive' => 'blog-rail',
  )
);

register_post_type( 'get-started',
  array(
    'supports' => array('title','post-formats'),
    'labels' => array(
      'name' => __( 'Get Started' ),
      'singular_name' => __( 'Get Started' )
    ),
    'public' => true,
    'has_archive' => 'get-started',
  )
);

register_post_type( 'product-detail',
  array(
    'supports' => array('title','post-formats'),
    'labels' => array(
      'name' => __( 'Product Detail' ),
      'singular_name' => __( 'Product Detail' )
    ),
    'public' => true,
    'has_archive' => 'product-detail',
  )
);


register_post_type( 'contact_info',
  array(
    'supports' => array('title','post-formats'),
    'labels' => array(
      'name' => __( 'Contact Info' ),
      'singular_name' => __( 'Contact Info' )
    ),
    'public' => true,
    'has_archive' => 'contact_info',
  )
);

register_post_type( 'form_submissions',
  array(
    'supports' => array('title','post-formats'),
    'labels' => array(
      'name' => __( 'Form Submissions' ),
      'singular_name' => __( 'Form Submissions' )
    ),
    'public' => true,
    'has_archive' => false,
    'show_in_rest' => false,
  )
);

register_post_type( 'aging_submissions',
  array(
    'supports' => array('title','post-formats'),
    'labels' => array(
      'name' => __( 'AgingInPlace Submissions' ),
      'singular_name' => __( 'AgingInPlace Submissions' )
    ),
    'public' => true,
    'has_archive' => false,
    'show_in_rest' => false,
  )
);

register_taxonomy(
  'aging_submissions_interest',
  'aging_submissions',
  array(
    'label' => __('Interest'),
    'public' => true,
    'hierarchical' => true,
    'show_admin_column' => true,
    'show_ui' => true,
  )
);

function create_authors() {

  register_post_type(
    'bam-author',
    array(
      'labels' => array
      (
        'name' => _x('Authors', 'post type general name'),
        'singular_name' => _x('Author', 'post type singular name')
      ),
      'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
      'public' => true,
      'hierarchical'=>  true,
      'menu_icon' => 'dashicons-edit',
      'publicly_queryable'  => true,
      'rewrite' => array(
        'slug' => 'author',
    		'with_front' => false,
    		'hierarchical' => true
      ),
    )
  );
}
add_action('init', 'create_authors');


if (function_exists('acf_add_options_sub_page')) {
  acf_add_options_sub_page(array(
    'page_title' => 'Edit Reviews Module',
    'menu_title' => 'Reviews Module'
  ));
}



// Short Codes
// ==============================================================
function twocolimg_shortcode( $atts, $content = null ) {
  return '<div class="sc-2col-img">' . $content . '</div>';
}
add_shortcode( 'twocolimg', 'twocolimg_shortcode' );


// format text for id/class/href
function kni_slugify( $string, $remove_numbers = false ) {
  // replace non letter or digits by -
  $string = preg_replace('~[^\pL\d]+~u', '-', $string);

  // transliterate
  $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);

  // remove unwanted characters
  $string = preg_replace('~[^-\w]+~', '', $string);

  // trim
  $string = trim($string, '-');

  // remove duplicated - symbols
  $string = preg_replace('~-+~', '-', $string);

  // lowercase
  $string = strtolower($string);

  // remove numbers

  if ($remove_numbers) {
    $string = preg_replace('/[0-9]+/', '', $string);
  }

  if (empty($string)) {
    return 'n-a';
  }

  return $string;
}


// numbered Pagination
// ==============================================================
function pagination($pages = '', $range = 4)
{
  $showitems = ($range * 2)+1;

  global $paged;
  if(empty($paged)) $paged = 1;

  if($pages == '')
  {
     global $wp_query;
     $pages = $wp_query->max_num_pages;
     if(!$pages)
     {
         $pages = 1;
     }
  }

  if(1 != $pages)
  {
     echo "<div class=\"pagination\">";
     if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a class=\"pagin-first\" href='".get_pagenum_link(1)."'>&laquo; 1</a>";
     //if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

     for ($i=1; $i <= $pages; $i++)
     {
         if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
         {
             echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
         }
     }

     //if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";

     if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a class=\"pagin-last\" href='".get_pagenum_link($pages)."'>" . $pages ." &raquo;</a>";
     echo "</div>\n";
  }
}

function get_the_user_ip() {
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    // check ip from share internet
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    // to check ip is pass from proxy
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }

  return apply_filters('wpb_get_ip', $ip);
}

/**
 * validates DNS for email
 */
function has_valid_DNS($email) {
  $domain_name = substr(strrchr($email, '@'), 1);
  if ($domain_name) {
    $mxhosts = array();
    $checkDomain = getmxrr($domain_name, $mxhosts);
    if ($checkDomain) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

add_action('add_meta_boxes', 'form_meta_box');
function form_meta_box() {
  add_meta_box('form-data', 'Submission Data', 'get_form_meta_box_data', 'form_submissions', 'normal', 'high');
  add_meta_box('form-data', 'Submission Data', 'get_form_meta_box_data', 'aging_submissions', 'normal', 'high');
}

function get_form_meta_box_data($post) {
  $raw_data = get_post_meta($post->ID, 'submission_data', true);
  $data = json_decode($raw_data, true);

  if (json_last_error() === JSON_ERROR_NONE) {
    echo '<pre>' . esc_html(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)) . '</pre>';
  } else {
    // If it’s not valid JSON, just print the raw data
    echo esc_html($raw_data);
  }
}

function free_quote_submission() {

  if (isset($_POST['token'])) {
    define("RECAPTCHA_V3_SECRET_KEY", '6Ld5mp8mAAAAANi0ZIn7vt6P5nNynu7GmzBga34y');

    $token = $_POST['token'];
    $action = $_POST['action'];

    if (isset($_POST['free_quote_redirect']) && !empty($_POST['free_quote_redirect'])) {
      $redirect = esc_url_raw($_POST['free_quote_redirect']);
    } else {
      $redirect = '/thank-you-quote';
    }

    // call curl to POST request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $arrResponse = json_decode($response, true);

    // verify the response
    if ($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
      $success = false;
      $data = array();

      if (isset($_POST['first_name'])) {
        $data['first_name'] = sanitize_text_field($_POST['first_name']);
      }

      if (isset($_POST['last_name'])) {
        $data['last_name'] = sanitize_text_field($_POST['last_name']);
      }

      if (isset($_POST['email'])) {
        $sanitized_email = sanitize_email($_POST['email']);

        if (is_email($sanitized_email)) {
          $data['email'] = $sanitized_email;
        } else {
          $redirect = get_home_url();
          wp_safe_redirect($redirect);
          exit;
        }
      }

      if (isset($_POST['phone'])) {
        $data['phone'] = sanitize_text_field($_POST['phone']);
      }

      if (isset($_POST['protection_for'])) {
        $data['protection_for'] = sanitize_text_field($_POST['protection_for']);
      }

      if (isset($_POST['interested_in'])) {
        $data['interested_in'] = sanitize_text_field($_POST['interested_in']);
      }

      if (isset($_POST['inquiring'])) {
        $data['inquiring'] = sanitize_text_field($_POST['inquiring']);
      }

      if (isset($_POST['urgency'])) {
        $data['urgency'] = sanitize_text_field($_POST['urgency']);
      }

      if (isset($_POST['callback_time'])) {
        $data['callback_time'] = sanitize_text_field($_POST['callback_time']);
      }

      if (isset($_POST['referral_url'])) {
        $data['referral_url'] = sanitize_text_field($_POST['referral_url']);
      }

      if (isset($_POST['store_name'])) {
        $data['store_name'] = sanitize_text_field($_POST['store_name']);
      }

      if (isset($_POST['company_name'])) {
        $data['company_name'] = sanitize_text_field($_POST['company_name']);
      }

      if (isset($_POST['company_website'])) {
        $data['company_website'] = sanitize_text_field($_POST['company_website']);
      }

      if (isset($_POST['lead_source'])) {
        $data['lead_source'] = sanitize_text_field($_POST['lead_source']);
      }

      if (isset($_POST['webform_tracking'])) {
        $data['webform_tracking'] = sanitize_text_field($_POST['webform_tracking']);
      }

      if (isset($_POST['contact_method'])) {
        $data['contact_method'] = sanitize_text_field($_POST['contact_method']);
      }

      if (isset($_POST['marketing_sms_opt_in']) && $_POST['marketing_sms_opt_in'] === '1') {
        $data['marketing_sms_opt_in'] = '1';
        $data['marketing_sms_info'] = get_the_user_ip();
      }

      // community specific form
      if (isset($_POST['community_type'])) {
        $data['community_type'] = sanitize_text_field($_POST['community_type']);
      }

      if (isset($_POST['resident_count'])) {
        $data['resident_count'] = sanitize_text_field($_POST['resident_count']);
      }

      if (isset($_POST['main_objective'])) {
        $data['main_objective'] = sanitize_text_field($_POST['main_objective']);
      }

      if (isset($_POST['community_name'])) {
        $data['community_name'] = sanitize_text_field($_POST['community_name']);
      }

      $url = 'https://access.bayalarmmedical.com/api/crm/create_lead/new';
      $postdata = json_encode($data);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: wp_webform_token_0c7c25e1f6287ac1e15f05c9b2b59978bdb6d5cd'
      ));
      $result = curl_exec($ch);
      $resultStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      if ($resultStatus == 200) {
        $success = true;
      }

      curl_close($ch);

      if (!$success) {
        $post_arr = array(
          'post_title' => $data['first_name'] . ' ' . $data['last_name'],
          'post_status' => 'private',
          'post_type' => 'form_submissions',
          'meta_input' => array(
            'submission_data' => json_encode($data),
          )
        );

        $post_id = wp_insert_post($post_arr, true, true);
      }
    }

    wp_safe_redirect($redirect);
    exit;

  } else {
    wp_safe_redirect(get_home_url());
    exit;
  }
}

add_action( 'admin_post_nopriv_free_quote_submission', 'free_quote_submission' );
add_action( 'admin_post_free_quote_submission', 'free_quote_submission' );

function aging_form_submission() {

  if (isset($_POST['token'])) {
    define("RECAPTCHA_V3_SECRET_KEY", '6Ld5mp8mAAAAANi0ZIn7vt6P5nNynu7GmzBga34y');

    $token = $_POST['token'];
    $action = $_POST['action'];

    if (isset($_POST['aging_form_redirect']) && !empty($_POST['aging_form_redirect'])) {
      $redirect = esc_url_raw($_POST['aging_form_redirect']);
    } else {
      $redirect = '/aging-in-place/thank-you/';
    }

    // call curl to POST request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $arrResponse = json_decode($response, true);

    // verify the response
    if ($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
      $success = false;
      $data = array();

      if (isset($_POST['name'])) {
        $data['name'] = sanitize_text_field($_POST['name']);
      }

      if (isset($_POST['email'])) {
        $sanitized_email = sanitize_email($_POST['email']);

        if (is_email($sanitized_email)) {
          $data['email'] = $sanitized_email;
        } else {
          $redirect = get_home_url();
          wp_safe_redirect($redirect);
          exit;
        }
      }

      if (isset($_POST['phone'])) {
        $data['phone'] = sanitize_text_field($_POST['phone']);
      }

      if (isset($_POST['interest'])) {
        $data['interest'] = sanitize_text_field($_POST['interest']);
      }

      if (isset($_POST['referral_url'])) {
        $data['referral_url'] = sanitize_text_field($_POST['referral_url']);
      }

      if (isset($_POST['store_name'])) {
        $data['store_name'] = sanitize_text_field($_POST['store_name']);
      }

      $post_arr = array(
        'post_title' => $data['name'],
        'post_status' => 'private',
        'post_type' => 'aging_submissions',
        'meta_input' => array(
          'submission_data' => json_encode($data),
        )
      );

      $post_id = wp_insert_post($post_arr, true, true);

      if (!is_wp_error($post_id) && $post_id !== 0) {
        $interest_terms = get_terms(array(
          'taxonomy' => 'aging_submissions_interest',
          'hide_empty' => false
        ));

        if (!empty($interest_terms)) {
          $term_names = wp_list_pluck($interest_terms, 'name');

          if (in_array($data['interest'], $term_names, true)) {
            wp_set_object_terms($post_id, $data['interest'], 'aging_submissions_interest');
          }
        }
      }
    }

    wp_safe_redirect($redirect);
    exit;

  } else {
    wp_safe_redirect(get_home_url());
    exit;
  }
}

add_action( 'admin_post_nopriv_aging_form_submission', 'aging_form_submission' );
add_action( 'admin_post_aging_form_submission', 'aging_form_submission' );

// Senior Resource Guide Search
function my_theme_enqueue_scripts() {
  wp_enqueue_script( 'my-theme-script', get_template_directory_uri() . '/dev/js/modules/senior-resource-guide.js', array( 'jquery' ), '1.0', true );
  wp_localize_script( 'my-theme-script', 'myThemeAjax', array(
      'ajaxurl' => admin_url( 'admin-ajax.php' ),
  ));
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_scripts' );


function search_articles() {
  $search_term = sanitize_text_field($_POST['term']);

  $args = array(
      'post_type' => 'post',
      'posts_per_page' => 5,
      's' => $search_term,
  );

  $query = new WP_Query($args);

  ob_start();

  function highlight_search_term($title, $search_term) {
    $highlighted_term = '<span class="search-highlight">' . $search_term . '</span>';
    $highlighted_title = str_ireplace($search_term, $highlighted_term, $title);
    return $highlighted_title;
}

  if ($query->have_posts()) {
      while ($query->have_posts()) {
          $query->the_post();
          $post_title = get_the_title();
          $highlighted_title = highlight_search_term($post_title, $search_term);
          $post_permalink = get_permalink();
          $post_image = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
          ?>
          <div class="search-result">
            <?php if ($post_image): ?>
              <img class="post-image" src="<?php echo esc_url($post_image); ?>" alt="<?php echo esc_attr($post_title); ?>">
            <?php endif; ?>
            <a class="post-content" href="<?php echo esc_url($post_permalink); ?>">
              <?php
              $highlighted_title = highlight_search_term($post_title, $search_term);
              echo $highlighted_title;
              ?>
            </a>
          </div>

          <?php
      }
      wp_reset_postdata();
  } else {
      echo '<p>No articles found.</p>';
  }

  $results_html = ob_get_clean();

  echo $results_html;
  wp_die();
}
add_action('wp_ajax_search_articles', 'search_articles');
add_action('wp_ajax_nopriv_search_articles', 'search_articles');

// Check if the post belongs to the "senior-resource-guide" category
function custom_category_permalink($permalink, $post, $leavename) {
    if ($post->post_type == 'post' && $post->post_status == 'publish') {
        if (has_category('senior-resource-guide', $post)) {
            $permalink = home_url('/senior-resource-guide/' . $post->post_name . '/');
        }
    }
    return $permalink;
}
add_filter('post_link', 'custom_category_permalink', 10, 3);
add_filter('post_type_link', 'custom_category_permalink', 10, 3);

function custom_category_rewrite_rule() {
    add_rewrite_rule('^senior-resource-guide/([^/]+)/?', 'index.php?category_name=senior-resource-guide&name=$matches[1]', 'top');
}
add_action('init', 'custom_category_rewrite_rule', 10, 0);



/**
 *
 *---------------------------------------------
 * ACF SVG & Image Fallback
 *---------------------------------------------
 *
 * Thi little function will allow ACF image
 * fields to display inline SVGs and fallback
 * to traditional image formats if necessary
 *
 */


function bam_acf_svg_helper($field)
{

    // Store file's Path info for conditional checks
    $file_parts = pathinfo($field);


    if ($field) {

        // Is the uploaded file an SVG? Do this.
        if ($file_parts['extension'] == 'svg') {
            echo file_get_contents($field);
        } else { ?>

<!-- Fallback Old School Images -->
<img src="<?php esc_attr_e($field); ?>" />

<?php

            }
    }
}


// remove "Private: " from titles
function remove_private_prefix($title) {
	$title = str_replace('Private: ', '', $title);
	return $title;
}
add_filter('the_title', 'remove_private_prefix');

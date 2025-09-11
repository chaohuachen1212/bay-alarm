<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Imagetoolbar" content="No"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php esc_html_e('Preview AzonPress', 'azonpress') ?></title>
    <?php
    wp_head();
    ?>
    <style type="text/css">

    </style>
</head>
<body>
<div id="azp_preview_top">
    <div id="azp_preview_header">
        <div class="azp_preview_title">
            <ul>
                <li class="azp_form_name">
                    <?php echo $table->id . ' - ' . $table->title; ?>
                </li>
                <li>
                    <a href="<?php echo $edit_url; ?>">Edit</a>
                </li>
            </ul>
        </div>
        <div class="azp_preview_action">
            <?php echo $shortcode; ?>
        </div>
    </div>
    <div class="azp_preview_body">
        <div class="azp_form_preview_wrapper">
            <?php echo do_shortcode($shortcode); ?>
        </div>
    </div>
    <div class="azp_preview_footer">
        <p>You are seeing preview of AzonPress. This form is only accessible for Admin users. Other users
            may not access this page. To use this for in a page please use the following
            shortcode: <?php echo $shortcode; ?></p>
    </div>
</div>
<?php
wp_footer();
?>
</body>
</html>
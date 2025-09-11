<?php
namespace Azonpress\Classes\Shortcode;

use Azonpress\Classes\Model;
use Azonpress\Classes\View;

class ShortcodePreview
{
    public function handleExteriorPages()
    {
        if (isset($_GET['azonpress_preview']) && $_GET['azonpress_preview']) {
            if (!current_user_can(azonpressCurrentAccessPermission())) {
                return;
            }
            $show_review = true;
            if ($show_review) {
                if (isset($_REQUEST['azon_type'])) {
                    $type = sanitize_text_field($_REQUEST['azon_type']);
                } else {
                    $type = 'comparison';
                }
                $tableId = intval($_GET['azonpress_preview']);
                $table = (new Model('azonpress_lists'))
                    ->where('type', $type)
                    ->find($tableId, 'id');

                if (!$table) {
                    return;
                }

                if ($table->type == 'product_table') {
                    $content = '[azonpress_tables id="' . $table->id . '"]';
                    $editUrl = admin_url('admin.php?page=azonpress#/product_tables/edit/'.$table->id);
                } else {
                    $content = '[azonpress_comparison id="' . $table->id . '"]';
                    $editUrl = admin_url('admin.php?page=azonpress#/comparison_tables/edit/'.$table->id);
                }

                add_action('wp_enqueue_scripts', function () {
                    wp_enqueue_style('azonpress_preview', AZONPRESS_PLUGIN_URL.'public/css/preview.css');
                });

                View::render('preview', [
                    'shortcode' => $content,
                    'table' => $table,
                    'edit_url' => $editUrl
                ]);
                exit();
            }
        }
    }
}

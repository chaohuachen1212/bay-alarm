<?php

namespace Azonpress\Classes\Products;

class Templates
{
    public static function getTemplates()
    {
        $templates = [
            [
                'name' => 'grid',
                'title' => 'Grid',
                'preview' => ''
            ],
            [
                'name' => 'box',
                'title' => 'Box',
                'preview' => ''
            ],
            [
                'name' => 'list',
                'title' => 'List',
                'preview' => ''
            ],
            [
                'name' => 'table',
                'title' => 'Table',
                'preview' => ''
            ],
            [
                'name' => 'widget',
                'title' => 'Widget',
                'preview' => ''
            ],
            [
                'name' => 'widget_small',
                'title' => 'Widget Small',
                'preview' => ''
            ],
        ];

        $all = apply_filters('azonpress_templates', $templates);
        wp_send_json_success($all, 200);
    }
}

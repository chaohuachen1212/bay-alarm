<?php
namespace Azonpress\Classes\Products;

class HTMLHelper
{
    public static function ribbonMeta($attributes, $number, $extra_class = '')
    {
        if (empty($attributes['ribbon_prefix']) && empty($attributes['ribbon_suffix'])) {
            return '';
        }
        return '<div class="azp-product-meta '.$extra_class.'">
                <div  class="azp-best"><span>'.$attributes['ribbon_prefix'].' '.$number.' '.$attributes['ribbon_suffix'].'</span></div>
            </div>';
    }
}

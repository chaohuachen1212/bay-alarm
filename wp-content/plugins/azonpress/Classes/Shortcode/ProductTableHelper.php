<?php namespace Azonpress\Classes\Shortcode;

use Azonpress\Classes\ArrayHelper;

class ProductTableHelper
{
    public function getCell($row, $column, $settings)
    {
        if ($this->isOriginalColumn($column, $row)) {
            return $this->getProductCell($row, $column);
        } else {
            return do_shortcode($this->getCustomCellData($row, $column));
        }
    }

    public function getTableWrapperCssClass($settings)
    {
        $classes = '';
        $features = ArrayHelper::get($settings, 'table_features');
        if (in_array('mobile_stackable', $features) || in_array('tablet_stackable', $features)) {
            $classes .= 'azp_stackable ';
        }
        $classes .= 'azp_table_wrapper ' . ArrayHelper::get($settings, 'style_library', 'semantic_ui') . '_wrapper';
        return $classes;
    }

    public function getTableCssClass($settings)
    {
        $styleLibrary = ArrayHelper::get($settings, 'style_library');
        $tableClasses = array();
        if ($styleLibrary == 'semantic_ui') {
            $tableClasses = array('table', 'ui');
        } else {
            $tableClasses = array('table');
        }
        $tableColor = ArrayHelper::get($settings, 'table_color');
        if ($tableColor && $tableColor != 'default_color') {
            $tableClasses[] = 'inverted '.$tableColor;
        }

        $tableClasses = array_merge($tableClasses, ArrayHelper::get($settings, 'table_features', array()));
        return implode(' ', array_unique($tableClasses));
    }

    public function getColumnTheadClass($column)
    {
        $classes = array(
            'azp_align_' . ArrayHelper::get($column, "header_alignment"),
            'azp_column_' . ArrayHelper::get($column, "type"),
            ArrayHelper::get($column, 'css_class')
        );
        return implode(' ', $classes);
    }

    public function getColumnTbodyClass($column)
    {
        $classes = array(
            'azp_align_' . ArrayHelper::get($column, "content_alignment"),
            'azp_column_' . ArrayHelper::get($column, "type"),
            ArrayHelper::get($column, 'css_class')
        );
        return implode(' ', $classes);
    }

    private function getCustomCellData($row, $column)
    {
        $value = ArrayHelper::get($row->overrides, $column['key']);
        $linkable = false;

        $linkables = array(
            'custom_rating',
            'text'
        );
        if (in_array($column['type'], $linkables)) {
            $linkable = ArrayHelper::get($column, 'link_to_product') == 'yes';
        }

        if ($column['type'] == 'custom_rating') {
            $value = intval($value);
            $value = '<span class="star-rating"><span class="azp_star_ratings" style="width:' . ($value * 20) . '%"></span></span>';
        } elseif ($column['type'] == 'yes_no') {
            return $this->getYesNoHtml($value);
        } else {
            $value = $this->parseShortcodes($value, $row);
        }

        if ($linkable) {
            $value = $row->item->getItemLink($value);
        }

        return $value;
    }

    public function getYesNoHtml($type = 'yes')
    {
        if ($type == 'yes') {
            return '<span class="azp-yes"></span>';
        }
        return '<span class="azp-no"></span>';
    }


    private function parseShortcodes($value, $row)
    {
        if (!$value) {
            return $value;
        }
        $parsables = array(
            '{product.title}',
            '{product.image}',
            '{product.asin}',
            '{product.permalink}',
            '{product.add_to_cart}',
            '{product.price}'
        );

        preg_match_all('/{product.([^\}]*)}/', $value, $matches);
        if (count($matches) >= 2) {
            $matches = $matches[0];
        } else {
            return $value;
        }
        $matches = array_intersect($matches, $parsables);

        if (!$matches) {
            return $value;
        }
        $replaces = array();
        foreach ($matches as $match) {
            if ($match == '{product.title}') {
                $replaces[$match] = $row->item->title();
            } elseif ($match == '{product.image}') {
                $itemSize = $row->item->images();
                $replaces[$match] = $itemSize['small'];
            } elseif ($match == '{product.asin}') {
                $replaces[$match] = $row->item->asin();
            } elseif ($match == '{product.permalink}') {
                $replaces[$match] = $row->item->productUrl();
            } elseif ($match == '{product.add_to_cart}') {
                $replaces[$match] = $row->item->productUrl();
            } elseif ($match == '{product.price}') {
                $replaces[$match] = $row->item->priceHTML('minimal');
            }
        }
        return str_replace(array_keys($replaces), array_values($replaces), $value);
    }

    private function getProductCell($row, $column)
    {
        $type = ArrayHelper::get($column, 'type');
        $linkable = ArrayHelper::get($column, 'link_to_product') == 'yes';

        $overWrite = ArrayHelper::get($row->overrides, ArrayHelper::get($column, 'key'));

        if ($type == 'product_image') {
            return $row->item->getImageHtml('medium', $linkable);
        } elseif ($type == 'title') {
            if ($overWrite && $linkable) {
                return $row->item->getItemLink($overWrite);
            } elseif ($overWrite) {
                return $overWrite;
            } else {
                return $row->item->titleHtml($linkable);
            }
        } elseif ($type == 'asin') {
            if ($linkable) {
                return $row->item->getItemLink($row->item->asin());
            } else {
                return $row->item->asin();
            }
        } elseif ($type == 'buy_now_button') {
            if (!$overWrite) {
                $overWrite = ArrayHelper::get($column, 'default');
            }
            return $row->item->buyButton($overWrite);
        } elseif ($type == 'add_to_cart_button') {
            if (!$overWrite) {
                $overWrite = ArrayHelper::get($column, 'default');
            }
            return $row->item->addToCartButton($overWrite);
        } elseif ($type == 'price') {
            if ($linkable) {
                return $row->item->getItemLink($row->item->priceHTML('minimal'));
            }
            return $row->item->priceHTML('minimal');
        } else {
            return '';
        }
    }

    protected function isOriginalColumn($column, $row)
    {
        if (ArrayHelper::get($column, 'is_custom') == 'no') {
            return true;
        }
        return false;
    }
}

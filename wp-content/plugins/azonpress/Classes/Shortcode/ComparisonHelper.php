<?php namespace Azonpress\Classes\Shortcode;

use Azonpress\Classes\ArrayHelper;

class ComparisonHelper
{
    private $item;
    private $rows;
    private $highlight;
    private $dataCellClass = null;
    public $inlineCss;

    public function __construct($product)
    {
        $this->rows = $product->rows;
        $this->item = $product->item;
        $this->highlight = $product->highlight;
        //$this->setInlineCss();
    }

    public function getCellData($index, $cellSettings)
    {
        if ($cell = ArrayHelper::get($this->rows, $index)) {
            $cellSettings = $cell;
        }
        if (isset($cellSettings['overwrite_type']) &&  $cellSettings['overwrite_type']) {
            if ($cellSettings['overwrite_type'] == 'custom_star_rating') {
                return $this->getRatingHtml($cellSettings['custom_value']);
            } elseif ($cellSettings['overwrite_type'] == 'yes_no') {
                return $this->getYesNoHtml($cellSettings['custom_value']);
            } elseif ($cellSettings['overwrite_type'] == 'shortcode') {
                return do_shortcode($cellSettings['custom_value']);
            }
            return $cellSettings['custom_value'];
        }

        return $this->getProductValue($cellSettings);
    }

    private function getProductValue($cellSettings)
    {
        $type = $cellSettings['table_row_type'];
        if ($type == 'title') {
            return $this->item->titleHtml();
        }
        if ($type == 'price') {
            return $this->item->getPrice();
        }
        if ($type == 'prime_status') {
            return $this->item->getPrimeHtml();
        }
        if ($type == 'star_rating') {
            return $this->item->ratingStarsHtml();
        }
        if ($type == 'reviews') {
            return $this->item->ratingStarsHtml();
        }
        if ($type == 'buy_now_button') {
            return $this->item->buyButton();
        }
        if ($type == 'add_to_cart_button') {
            return $this->item->addToCartButton();
        }

        if ($type == 'image') {
            return $this->item->getImageHtml();
        }

        if ($type == 'yes_no') {
            return $this->getYesNoHtml($cellSettings['custom_value']);
        }
        if ($type == 'custom_star_rating') {
            return $this->getRatingHtml($cellSettings['custom_value']);
        }
        //print_r($cellSettings);
        return do_shortcode($cellSettings['custom_value']);
    }

    public function getYesNoHtml($type = 'Yes')
    {
        if ($type == 'Yes') {
            return '<span class="azp-yes"></span>';
        }
        return '<span class="azp-no"></span>';
    }

    public function getRatingHtml($rating = 0)
    {
        return '<div class="star-rating"><span class="azp_star_ratings" style="width:'. ($rating*20) .'%"></span></div>';
    }

    public function getHighlightText()
    {
        return $this->highlight->featured_text;
    }

    public function getHighLightHtml()
    {
        if ($text = $this->getHighlightText()) {
            return '<div style="background: '.$this->getColumnPrimaryColor().'; color: '.$this->getColumnSecondaryColor().';" class="azp_ribbon">'.$text.'</div>';
        }
        return '';
    }

    public function getColumnPrimaryColor()
    {
        return $this->highlight->primary_color;
    }

    public function getColumnSecondaryColor()
    {
        return $this->highlight->secondary_color;
    }

    public function getDataCellClass()
    {
        if ($this->dataCellClass == null) {
            if ($this->getHighlightText() || $this->getColumnPrimaryColor()) {
                $css_class = 'azp_data_highlight';
                $this->dataCellClass = $css_class;
            }
        }
        return $this->dataCellClass;
    }
}

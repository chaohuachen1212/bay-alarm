<?php
namespace Azonpress\Classes\Products;

trait ProductTransformerTrait
{
    public function getImageHtml($size = 'medium', $link = true)
    {
        $acceptedSizes = array(
            'large',
            'medium',
            'small'
        );
        if (!in_array($size, $acceptedSizes)) {
            $size = 'medium';
        }
        ob_start();
        include AZONPRESS_PLUGIN_PATH.'resources/views/product_parts/image.php';
        return ob_get_clean();
    }

    public function titleHtml($link = true)
    {
        ob_start();
        include AZONPRESS_PLUGIN_PATH.'resources/views/product_parts/title.php';
        return ob_get_clean();
    }

    public function featuresHtml()
    {
        $features = $this->features();

        if (!$features || !is_array($features)) {
            return '';
        }

        $features = apply_filters('azonpress_item_features', $features, $this);

        ob_start();
        include AZONPRESS_PLUGIN_PATH.'resources/views/product_parts/features.php';
        return ob_get_clean();
    }

    public function priceHTML($type = 'extended')
    {
        ob_start();
        include AZONPRESS_PLUGIN_PATH.'resources/views/product_parts/price.php';
        return ob_get_clean();
    }

    public function buyButton($buttonText = '')
    {
        if (!$buttonText) {
            $buttonText = __('Buy on amazon', 'azonpress');
        }
        ob_start();
        include AZONPRESS_PLUGIN_PATH.'resources/views/product_parts/button.php';
        return ob_get_clean();
    }

    public function addToCartButton($buttonText = '')
    {
        if (!$buttonText) {
            $buttonText = __('Add To Cart', 'azonpress');
        }
        ob_start();
        include AZONPRESS_PLUGIN_PATH.'resources/views/product_parts/add_to_cart.php';
        return ob_get_clean();
    }

    public function ratingStarsHtml()
    {
        ob_start();
        include AZONPRESS_PLUGIN_PATH.'resources/views/product_parts/rating_stars.php';
        return ob_get_clean();
    }

    public function getReviewsHTML()
    {
        ob_start();
        include AZONPRESS_PLUGIN_PATH.'resources/views/product_parts/reviews_html.php';
        return ob_get_clean();
    }

    public function getPrimeHtml()
    {
        ob_start();
        include AZONPRESS_PLUGIN_PATH.'resources/views/product_parts/prime.php';
        return ob_get_clean();
    }

    public function getItemLink($text)
    {
        ob_start();
        include AZONPRESS_PLUGIN_PATH.'resources/views/product_parts/item_link.php';
        return ob_get_clean();
    }
}

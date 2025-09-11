<?php

namespace Azonpress\Classes\Products;

use Azonpress\Classes\ArrayHelper as Arr;

class ProductTransformer
{
    use ProductTransformerTrait;

    protected $data = array();
    protected $original;

    protected $reviewCount = false;
    protected $averageRating = false;
    protected $reviewCralErrorCounter = 0;

    protected $storeBase = '';

    public function __construct($product)
    {
        $this->original = $product;
        $this->setUpData();
    }

    protected function setUpData()
    {
        $product = $this->original;

        if (!Arr::get($product, 'ASIN')) {
            return false;
        }

        // setup basic data
        $this->data = array(
            'asin' => Arr::get($product, 'ASIN'),
            'productUrl' => Arr::get($product, 'DetailPageURL'),
            'images' => array(
                'small' => Arr::get($product, 'Images.Primary.Small.URL'),
                'medium' => Arr::get($product, 'Images.Primary.Medium.URL'),
                'large' => Arr::get($product, 'Images.Primary.Large.URL')
            ),
            'image' => Arr::get($product, 'Images.Primary.Medium.URL'),
            'price' => $this->getPrice(),
            'title' => Arr::get($product, 'ItemInfo.Title.DisplayValue'),
            'last_updated' => isset($product['dbObject']->updated_at) ? $product['dbObject']->updated_at : date('Y-m-d H:i:s')
        );
        $this->data['addToCartUrl'] = $this->addToCartUrl();
    }

    public function getPrice()
    {
        return Arr::get($this->original, 'Offers.Listings.0.Price.DisplayAmount', '');
    }

    public function getCurrency()
    {
        $CurrencyCode = Arr::get($this->original, 'Offers.Listings.0.Price.Currency', 'USD');
        return $this->getCurrencySign($CurrencyCode);
    }

    public function features()
    {
        return Arr::get($this->original, 'ItemInfo.Features.DisplayValues', []);
    }

    public function brand()
    {
        return Arr::get($this->original, 'ItemInfo.ByLineInfo.Brand.DisplayValue', '');
    }

    public function isPrime()
    {
        return !!Arr::get($this->original, 'Offers.Listings.0.DeliveryInfo.IsPrimeEligible');
    }

    public function getPrimeUrl()
    {
        $store = Amazon::getCurrentStore();
        if (!$store['prime']) {
            return false;
        }
        $associateTag = Amazon::getAssociateTag();
        return $store['prime'] . '?tag=' . $associateTag;
    }

    public function getLowestPrice()
    {
        if (isset($this->original['Offers'])) {
            return Arr::get($this->original['Offers']['Summaries']['0'], 'LowestPrice.DisplayAmount');
        }
    }

    public function getLowestPriceInCents()
    {
        if (isset($this->original['Offers'])) {
            return Arr::get($this->original['Offers']['Summaries']['0'], 'LowestPrice.Amount');
        }
    }

    public function getPriceInCents()
    {
        return Arr::get($this->original, 'Offers.Listings.0.Price.Amount', 0) * 100;
    }

    public function percentSaved()
    {
        if ($savedAMount = $this->getSavedAmountInCents()) {
            return round($savedAMount / $this->getPriceInCents() * 100);
        }
    }

    public function getSavedAmountInCents()
    {
        $normalPrice = $this->getPriceInCents();
        $offerPrice = $this->getLowestPriceInCents();
        if ($normalPrice && $offerPrice) {
            return $normalPrice - $offerPrice;
        }
        return false;
    }

    public function getEditorialReview()
    {
        return '';
    }

    public function getImageSets()
    {
        return array();
    }

    public function getImageSetLength()
    {
        return count($this->getImageSets());
    }

    public function getReviewData($type = 'reviewCount')
    {
        return false;
    }

    private function setUpRatingData()
    {
    }

    private function hasRatingsValue()
    {
        return $this->averageRating && $this->reviewCount;
    }

    private function getDBObject()
    {
        if (!empty($this->original['dbObject'])) {
            return $this->original['dbObject'];
        } else {
            $dbObject = azonPressDBModel('azonpress_product_cache')
                ->find($this->asin(), 'asin');
            $this->original['dbObject'] = $dbObject;
        }
        return $this->original['dbObject'];
    }

    public function setDbObject($dbObject)
    {
        if (is_array($dbObject)) {
            $dbObject = (object) $dbObject;
        }
        $this->original['dbObject'] = $dbObject;
    }

    public function getData()
    {
        return $this->data;
    }

    public function __call($method, $parameters)
    {
        if (isset($this->data[$method])) {
            return $this->data[$method];
        }
        return false;
    }

    public function getDiscountAmount()
    {
        if ($cents = $this->getSavedAmountInCents()) {
            return number_format($cents / 100, 2);
        }
        return false;
    }

    public function addToCartUrl()
    {
        $associateTag = Amazon::getAssociateTag();
        $store = Amazon::getPrimaryStore();
        return $store['base_url'] . '/gp/aws/cart/add.html?ASIN.1=' . $this->asin() . '&Quantity.1=1&AssociateTag=' . $associateTag;
    }

    private function getCurrencySign($currency = '')
    {
        $store = Amazon::getPrimaryStore();
        return apply_filters('azp_currency_sign', $store['currency'], $store);
    }
}

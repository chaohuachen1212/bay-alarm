<?php
/**
 *  Amazon Product API Library
 *
 */

namespace AzonPressAmazonAPI;

use Azonpress\Classes\ArrayHelper;
use Azonpress\Classes\Products\Amazon;
use AzonPressAmazonAPI\CurlHttpRequest;
use AzonPressAmazonAPI\AmazonUrlBuilder;

class AmazonAPI
{
    private $urlBuilder = NULL;

    private $mErrors = array();

    /**
     * AmazonAPI constructor.
     * @param $urlBuilder AmazonUrlBuilder
     * @param $outputType
     */
    public function __construct($urlBuilder, $outputType)
    {
        $this->urlBuilder = $urlBuilder;
    }

    public function getValidSearchNames()
    {
        return Amazon::getStoreSearchIndexes($this->urlBuilder->locale);
    }

    /**
     * Search for items
     *
     * @param string keywords           Keywords which we're requesting
     * @param string searchIndex            Name of search index (category) requested. NULL if searching all.
     * @param string sortBy                Category to sort by, only used if searchIndex is not 'All'
     * @param string condition            Condition of item. Valid conditions : Used, Collectible, Refurbished, All, New
     *
     * @return    mixed                SimpleXML object, array of data or false if failure.
     */
    public function ItemSearch($keywords, $itemPage = 1, $searchIndex = NULL, $sortBy = 'Relevance', $condition = 'New')
    {
        $resources = [
            "Images.Primary.Small",
            "Images.Primary.Medium",
            "Images.Primary.Large",
            "ItemInfo.ByLineInfo",
            "ItemInfo.ContentInfo",
            "ItemInfo.ContentRating",
            "ItemInfo.Title",
            "Offers.Listings.Availability.Message",
            "Offers.Listings.Availability.Type",
            "Offers.Listings.Condition",
            "Offers.Listings.Price"
        ];

        $payload = [
            'Keywords' => $keywords,
            'Resources' => $resources,
            'Availability' => 'Available',
            'PartnerTag' => $this->urlBuilder->trackingId,
            'PartnerType' => 'Associates',
            'Marketplace' => $this->urlBuilder->shopDefinition['marketplace'],
            'Operation' => 'SearchItems',
            'Condition' => $condition,
            'SortBy' => $sortBy
        ];

        if ($searchIndex) {
            $validIndexes = $this->getValidSearchNames();
            if(isset($validIndexes[$searchIndex])) {
                $payload['SearchIndex'] = $searchIndex;
            }
        }
        if($itemPage) {
            $payload['ItemPage'] = $itemPage;
        }
        
        
        $payload = apply_filters('azonpress_search_payload', $payload);

        try {
            $response = $this->makeAndParseRequest('SearchItems', $payload);
        } catch (\Exception $exception) {
            return new \WP_Error('API_ERROR', $exception->getMessage());
        }

        return $response;
    }

    /**
     * Lookup items from ASINs
     *
     * @param string|array asinList            Either a single ASIN or an array of ASINs
     * @param bool onlyFromAmazon        True if only requesting items from Amazon and not 3rd party vendors
     *
     * @return    mixed                SimpleXML object, array of data or false if failure.
     */
    public function ItemLookup($asinList, $onlyFromAmazon = false, $condition = 'Any')
    {
        if (!is_array($asinList)) {
            $asinList = explode(',', $asinList);
        }

        $asinList = array_unique($asinList);

        $asinList = array_values($asinList);

        $resources = [
            "CustomerReviews.Count",
            "CustomerReviews.StarRating",
            "Images.Primary.Small",
            "Images.Primary.Medium",
            "Images.Primary.Large",
            "Images.Variants.Small",
            "Images.Variants.Medium",
            "Images.Variants.Large",
            "ItemInfo.ByLineInfo",
            "ItemInfo.ContentInfo",
            "ItemInfo.ContentRating",
            "ItemInfo.Classifications",
            "ItemInfo.ExternalIds",
            "ItemInfo.Features",
            "ItemInfo.ManufactureInfo",
            "ItemInfo.ProductInfo",
            "ItemInfo.Title",
            "Offers.Listings.Availability.Message",
            "Offers.Listings.Availability.MinOrderQuantity",
            "Offers.Listings.Availability.Type",
            "Offers.Listings.Condition",
            "Offers.Listings.DeliveryInfo.IsFreeShippingEligible",
            "Offers.Listings.DeliveryInfo.IsPrimeEligible",
            "Offers.Listings.MerchantInfo",
            "Offers.Listings.Price",
            "Offers.Listings.ProgramEligibility.IsPrimeExclusive",
            "Offers.Listings.ProgramEligibility.IsPrimePantry",
            "Offers.Listings.Promotions",
            "Offers.Listings.SavingBasis",
            "Offers.Summaries.HighestPrice",
            "Offers.Summaries.LowestPrice",
            "Offers.Summaries.OfferCount"
        ];

        $payload = [
            'ItemIds' => $asinList,
            'Resources' => $resources,
            'Availability' => 'Available',
            'PartnerTag' => $this->urlBuilder->trackingId,
            'PartnerType' => 'Associates',
            'Marketplace' => $this->urlBuilder->shopDefinition['marketplace'],
            'Operation' => 'GetItems',
            'Condition' => $condition
        ];

        $payload = apply_filters('azonpress_search_payload', $payload);

        try {
            $response = $this->makeAndParseRequest('GetItems', $payload);
        } catch (\Exception $exception) {
            return new \WP_Error('API_ERROR', $exception->getMessage());
        }

        return $response;
    }

    private function makeAndParseRequest($path, $payload)
    {
        $this->urlBuilder->setPath('/paapi5/' . strtolower($path));
        $this->urlBuilder->setPayload(json_encode($payload));
        $this->urlBuilder->setRequestMethod("POST");
        $this->urlBuilder->addHeader('content-encoding', 'amz-1.0');
        $this->urlBuilder->addHeader('content-type', 'application/json; charset=utf-8');
        $this->urlBuilder->addHeader('host', $this->urlBuilder->host);
        $this->urlBuilder->addHeader('x-amz-target', 'com.amazon.paapi5.v1.ProductAdvertisingAPIv1.' . $path);
        $headers = $this->urlBuilder->getHeaders();


        $request = wp_remote_post($this->urlBuilder->getRequestUrl(), [
            'timeout'     => 45,
            'redirection' => 5,
            'httpversion' => '1.0',
            'sslverify' => false,
            'blocking'    => true,
            'headers' => $headers,
            'body' => json_encode($payload),
            'cookies'     => array()
        ]);

        if (is_wp_error($request)) {
            // error
            throw new \Exception($request->get_error_message());
        }

        if(ArrayHelper::get($request, 'response.code') != 200) {
            $response = json_decode(wp_remote_retrieve_body($request), true);

            if(!empty($response['Errors'][0]['Message'])) {
                $message = $response['Errors'][0]['Message'];
            } else {
                $message = 'API Error from amazon. Please try again';
            }

            throw new \Exception($message);
        }

        $response = wp_remote_retrieve_body($request);

        return json_decode($response, true);
    }
}

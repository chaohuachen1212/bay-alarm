<?php

namespace Azonpress\Classes\Products;

use AzonPressAmazonAPI\AmazonAPI;
use Azonpress\Classes\ArrayHelper;

class ProductApi
{
    public static function handleAjax()
    {
        $route = sanitize_text_field($_REQUEST['route']);
        if ($route == 'search_products') {
            $search = sanitize_text_field($_REQUEST['search_text']);
            $itemPage = 1;
            if (isset($_REQUEST['item_page'])) {
                $itemPage = intval($_REQUEST['item_page']);
            }
            $searchResults = static::searchProducts($search, $itemPage);
            $products = ArrayHelper::get($searchResults, 'formattedItems', []);

            $formattedProducts = array();
            foreach ($products as $asin => $product) {
                $formattedProducts[] = $product->getData();
            }
            wp_send_json_success(array(
                'products' => $formattedProducts,
                'total'    => ArrayHelper::get($searchResults, 'TotalResultCount')
            ));
        }
        die();
    }

    public static function searchProducts($search, $itemPage = 1, $limit = 0, $searchIndex = null, $sortBy = 'Relevance', $condition = 'New', $throwType = 'ajax')
    {
        $API = azonPressGetAmazonAPI($throwType);
        if (!$API) {
            return array();
        }
        $items = $API->ItemSearch($search, $itemPage, $searchIndex, $sortBy, $condition);

        if (is_wp_error($items)) {
            if ($throwType == 'ajax') {
                wp_send_json_error([
                    'message' => $items->get_error_message()
                ], 423);
            } else {
                return [];
            }
        }

        if (!$items) {
            return array();
        }

        $formattedItems = array();

        $products = ArrayHelper::get($items, 'SearchResult.Items', []);
        $TotalResultCount = ArrayHelper::get($items, 'SearchResult.TotalResultCount', []);

        $counter = 1;
        foreach ($products as $index => $product) {
            try {
                if ($limit && $counter > $limit) {
                    continue;
                } else {
                    $item = new ProductTransformer($product);
                    if ($item->asin()) {
                        $formattedItems[$item->asin()] = $item;
                    }
                }
            } catch (\Exception $exception) {
                // ...
            }
            $counter++;
        }

        if (!$formattedItems) {
            $products = self::getProducts($search);
            if ($products) {
                return $products;
            }
        }
        return [
           'formattedItems' => $formattedItems,
           'TotalResultCount' => $TotalResultCount
        ];
    }

    /**
     * Get Products by ASIN ids
     * @param $asins array
     * @return array
     */
    public static function getProducts($asins)
    {
        if (!is_array($asins)) {
            $asins = explode(',', $asins);
        }

        // we should validate this asins


        // Get the products from memory cache if available any
        $inMemoryProducts = static::getProductsFromMemoryCache($asins);

        // Find out the missing products in memory cache if any
        $missing = static::hasMissingProducts($asins, $inMemoryProducts);

        // If no missing products then we are done here, return the result
        if (!$missing) {
            return $inMemoryProducts;
        }

        // Get the products from database cache if available any
        $dbCachedProducts = static::getProductsFromDBCache($missing);


        // Find out the missing products in database cache if any
        $missing = static::hasMissingProducts($asins, array_merge(
            $inMemoryProducts,
            $dbCachedProducts
        ));


        // If no missing products then update the memory cache and return the result
        if (!$missing) {
            $result = static::orderByAsin($asins, array_merge(
                $inMemoryProducts,
                $dbCachedProducts
            ));
            return static::updateAndServeInMemoryCache($result);
        }


        // Get the missing items from API service and then merge the result
        $result = static::getMissingItemsFromCloud($missing) + $dbCachedProducts + $inMemoryProducts;

        // Update asins if any asin id is not available in the
        // result, it could be occured if any asin is invalid.
        $asins = array_intersect(array_keys($result), $asins);

        // Update the memory cache and return the result
        return static::updateAndServeInMemoryCache(
            static::orderByAsin($asins, $result)
        );
    }

    /**
     * Get cached items from memory by asins
     * @param  array $asins
     * @return array
     */
    protected static function getProductsFromMemoryCache($asins)
    {
        return InMemoryProductCache::getItemsByAsin($asins);
    }

    /**
     * Get cached items from database by asins
     * @param  array $asins
     * @return array
     */
    protected static function getProductsFromDBCache($asins)
    {
        $formattedAsins = array();
        foreach ($asins as $asin) {
            $formattedAsins[] = str_replace(array("'", '"', ','), array('', '', ''), $asin);
        }
        $asins = $formattedAsins;
        $formattedProducts = array();
        $cachingInterval = static::getCacheInterval();
        if (!$cachingInterval) {
            return $formattedProducts;
        }
        $dbProducts = azonPressDBModel('azonpress_product_cache')
            ->whereIn('asin', $asins)
            ->where('updated_at', '>', $cachingInterval)
            ->get();

        foreach ($dbProducts as $db_product) {
            if ($db_product->response) {
                $product = json_decode($db_product->response, true);

                if (ArrayHelper::get($product, 'api_version') != AZONPRESS_AMAZON_API_VERSION) {
                    continue;
                }

                $product['dbObject'] = $db_product;
                $formattedProducts[$db_product->asin] = new ProductTransformer($product);
            }
        }

        return $formattedProducts;
    }

    /**
     * Compute the last updated time to update the cache
     * @return string
     */
    protected static function getCacheInterval()
    {
        $credential = Amazon::getAmazonCredentials();
        $interval = ArrayHelper::get($credential, 'caching_hours');
        if (!$interval) {
            return false;
        }
        $interval = '-' . $interval . ' hours';
        return date('Y-m-d H:i:s', strtotime($interval));
    }

    /**
     * Find out missing products
     * @param  array $asins
     * @param  array $formattedProducts
     * @return array
     */
    protected static function hasMissingProducts($asins, $formattedProducts)
    {
        return array_diff($asins, array_keys($formattedProducts));
    }

    /**
     * Get missing items from API Service by asins
     * @param  array $asins
     * @return array
     */
    public static function getMissingItemsFromCloud($asins)
    {
        $missingProducts = array();


        if (count($asins) > 10) {
            $asinsArray = array_chunk($asins, 10);
        } else {
            $asinsArray = [$asins];
        }
        foreach ($asinsArray as $asins) {
            $API = azonPressGetAmazonAPI();
            if (!$API) {
                return $missingProducts;
            }

            $products = $API->ItemLookup($asins);

            if (is_wp_error($products) || !isset($products['ItemsResult']['Items'])) {
                return $missingProducts;
            }

            $products = $products['ItemsResult']['Items'];
            $products = is_array($products) ? $products : array($products);

            foreach ($products as $product) {
                $formattedProduct = new ProductTransformer($product);
                if ($formattedProduct->asin()) {
                    $dbObject = static::updateProductCache($product);
                    if ($dbObject) {
                        $formattedProduct->setDbObject($dbObject);
                    }
                    $missingProducts[$formattedProduct->asin()] = $formattedProduct;
                }
            }
        }

        return $missingProducts;
    }

    /**
     * Store products in memory cache for same request
     * @param  array $result
     * @return array
     */
    protected static function updateAndServeInMemoryCache($result)
    {
        foreach ($result as $asin => $item) {
            InMemoryProductCache::set($asin, $item);
        }

        return $result;
    }

    /**
     * Order result by order of asins in the array
     * @param  array $asins
     * @param  array $products
     * @return array
     */
    protected static function orderByAsin($asins, $products)
    {
        $sortedResult = array();
        foreach ($asins as $asin) {
            $sortedResult[$asin] = ArrayHelper::get($products, $asin);
        }
        return $sortedResult;
    }

    /**
     * Get Product by ASIN id
     *
     * @param $asin string
     *
     * @return object | false
     */
    public static function getProduct($asin)
    {
        $product = static::getProducts(array($asin));
        if (isset($product[$asin]) && $product[$asin]) {
            return $product[$asin];
        }
        return false;
    }

    private static function updateProductCache($product)
    {
        try {
            if (empty($product['ASIN'])) {
                return false;
            }

            azonPressDBModel(
                'azonpress_product_cache'
            )->where('asin', $product['ASIN'])->delete();

            $product['api_version'] = AZONPRESS_AMAZON_API_VERSION;

            $data = array(
                'asin' => $product['ASIN'],
                'response' => json_encode($product),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            azonPressDBModel('azonpress_product_cache')->insert($data);

            return $data;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public static function getErrorCounter($asin)
    {
        $errorCounter = 0;
        $existingProduct = azonPressDBModel('azonpress_product_cache')
            ->where('asin', $asin)
            ->first();
        if ($existingProduct) {
            $errorCounter = $existingProduct->rating_crawl_error_counter + 1;
        }

        return $errorCounter;
    }
}

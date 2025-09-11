<?php namespace Azonpress\Classes\Products;

use Azonpress\Classes\ArrayHelper;

class InMemoryProductCache
{
    protected static $store = array();

    /**
     * Set an item in memory cache by asin
     * @param string $key
     * @param array $value
     */
    public static function set($key, $value)
    {
        static::$store[$key] = $value;
    }

    /**
     * Get an item from in-memory cache by asin
     * @param string $asin
     * @param array $value
     */
    public static function get($asin)
    {
        return ArrayHelper::get(static::$store, $asin);
    }

    /**
     * Get items from memory cache by asins
     * @param  string|array $asins
     * @return array
     */
    public static function getItemsByAsin($asins)
    {
        $result = array();
        foreach ((array) $asins as $asin) {
            $result[$asin] = ArrayHelper::get(static::$store, $asin);
        }

        return array_filter($result);
    }
}

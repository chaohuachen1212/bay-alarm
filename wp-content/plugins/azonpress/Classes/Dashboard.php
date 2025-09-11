<?php namespace Azonpress\Classes;

use Azonpress\Classes\Products\Amazon;
use Azonpress\Classes\Shortcode\ComparisonTable;
use Azonpress\Classes\Shortcode\ProductTable;

class Dashboard
{
    public function getStats()
    {
        $credentials = Amazon::getAmazonCredentials();
        $apiStatus = $credentials['status'];
        $totalComparisonTables = (new ComparisonTable())->getTotal();
        $totalProductTables = (new ProductTable())->getTotal();

        wp_send_json_success(array(
            'stats' => array(
                'api_status'              => $apiStatus,
                'license_status'          => get_option('_azonpress_license_status'),
                'total_comparison_tables' => $totalComparisonTables,
                'total_product_tables'    => $totalProductTables
            )
        ));
    }

    private function apiStatus()
    {
        $apiStatus = 'no';
        try {
            $apiStatus = Amazon::verifyAmazonApiStatus(Amazon::getAmazonCredentials());
        } catch (\Exception $exception) {
            $apiStatus = 'no';
        }
        return $apiStatus == 'yes';
    }
}

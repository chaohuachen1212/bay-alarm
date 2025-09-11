<?php namespace Azonpress\Classes\Shortcode;

use Azonpress\Classes\ArrayHelper;
use Azonpress\Classes\Products\Amazon;
use Azonpress\Classes\Products\ProductApi;
use Azonpress\Classes\View;

class ProductTable extends TableList
{
    public function __construct($type = 'product_table')
    {
        parent::__construct($type);
    }

    public function registerAjaxRoutes()
    {
        $route = sanitize_text_field($_REQUEST['route']);
        $routeMaps = array(
            'create_table' => 'createTable',
            'get_tables' => 'getTables',
            'update_table' => 'updateTable',
            'get_table' => 'find',
            'get_formated_products'  => 'handlePagination',
            'delete_table' => 'delete',
            'duplicate_table' => 'duplicate'
        );

        if (isset($routeMaps[$route])) {
            $this->{$routeMaps[$route]}();
            die();
        }
    }

    public function find()
    {
        $id = intval($_REQUEST['table_id']);
        $perPage = isset($_GET['perPage']) ? $_GET['perPage'] : 10;
        $page = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;

        $table = azonPressDBModel('azonpress_lists')
            ->where('type', $this->type)
            ->find($id);

        if (!$table) {
            wp_send_json_error(array(
                'message' => __('Table does not exists', 'azonpress')
            ), 404);
        }
        $rows = json_decode($table->rows, true);
        $total = count($rows);

        $validProducts = array();
        $itemIsns = [];

        foreach ($rows as $row) {
            $itemIsns[] = ArrayHelper::get($row, 'asin');
        }

        $items = ProductApi::getProducts($itemIsns);

        if (empty($items)) {
            wp_send_json_error(array(
                'message' => __('No products found!', 'azonpress')
            ), 404);
        }

        foreach ($rows as $row) {
            $asin = ArrayHelper::get($row, 'asin');
            if (empty($items[$asin])) {
                continue;
            }
            if (!isset($row['overrides'])) {
                $row['overrides'] = (object) array();
            }
            $product = $items[$asin];
            $row['product'] = $product->getData();
            $validProducts[] = $row;
        }

        $formatedRows = [];

        for ($x=(($page - 1) * $perPage); $x <($perPage * $page); $x++) {
            if ($x >= $total) {
                break;
            }
            if (isset($validProducts[$x])) {
                $formatedRows[] = $validProducts[$x];
            }
        }

        $table->rows = $formatedRows;
        $table->column_configuration = json_decode($table->column_configuration, true);
        $table->table_settings = json_decode($table->table_settings, true);

        $table->loadingUrl = AZONPRESS_PLUGIN_URL . 'public/images/load.gif';

        $table->preview_url = home_url() . '?azonpress_preview=' . $table->id . '&azon_type=' . $table->type;

        $table->status = wp_kses_post(true);

        wp_send_json_success([
            'table' => $table,
            'total' => $total,
            'allProducts' => $validProducts,
            'buy_button_html' => $this->getButtonHTML('buy'),
            'cart_button_html' => $this->getButtonHTML('cart')
        ], 200);
    }

    public function handlePagination()
    {
        $page = isset($_GET['currentPage']) ? $_GET['currentPage'] : 1;
        $tableID = $_GET['tableID'];
        $atts = [ 'id' => $tableID];
        $data = $this-> handleRender($atts, $page);
        wp_send_json_success([
            'page' => $page,
            'data' =>$data
        ], 200);
    }

    public function handleRender($atts, $page)
    {
        global $azonpress;
        $azonpress['current_module'] = 'products';
        $appearanceSettings = $this->getAppearanceSettings('public');

        $atts = shortcode_atts(array(
            'id' => null
        ), $atts);

        extract($atts);

        $table = azonPressDBModel('azonpress_lists')->find($id);

        if (!$table || $table->type != $this->type) {
            return;
        }

        $products = json_decode($table->rows, true);

        $total = count($products);

        $validProducts = array();
        $lastUpdateTime = date('Y-m-d H:i:s', time() - 1209600);

        $itemIsns = [];

        foreach ($products as $product) {
            $itemIsns[] = ArrayHelper::get($product, 'asin');
        }

        $items = ProductApi::getProducts($itemIsns);

        if (!$items || is_wp_error($items)) {
            return '';
        }

        foreach ($products as $product) {
            $asin = ArrayHelper::get($product, 'asin');
            $item = ArrayHelper::get($items, $asin);
            if ($item) {
                $validProducts[] = (object)array(
                    'asin' => ArrayHelper::get($product, 'asin'),
                    'overrides' => ArrayHelper::get($product, 'overrides'),
                    'item' => $item,
                );
                if ($item->last_updated() > $lastUpdateTime) {
                    $lastUpdateTime = $item->last_updated();
                }
            }
        }

        if (!$validProducts) {
            return '';
        }

        $settings = json_decode($table->table_settings, true);
        $perPage = (int)ArrayHelper::get($settings, 'inputed_perPageNumber');
        $columns = json_decode($table->column_configuration, true);


        $formatedRows = [];

        for ($x = (($page - 1) * $perPage); $x <($perPage * $page); $x++) {
            if ($x >= $total) {
                break;
            }
            if (isset($validProducts[$x])) {
                $formatedRows[] = $validProducts[$x];
            }
        }

        $custom_css = '';
        $table_selector = '.azp_table_' . $table->id . ' .azp_column_item_';
        foreach ($columns as $column_index => $column) {
            if ($minWidth = ArrayHelper::get($column, 'min_width')) {
                $custom_css .= $table_selector . $column_index . ' { min-width: ' . $minWidth . 'px; }';
            }
        }

        $custom_css .= $table->custom_css;

        $showTitle = isset($settings['showTitle']) && ($settings['showTitle'] == 'yes');
        $showDescription = isset($settings['showDescription']) && ($settings['showDescription'] == 'yes');


        if (isset($appearanceSettings['hide_price']) && $appearanceSettings['hide_price'] == 'yes') {
            foreach ($columns as $key => $value) {
                if ($value['type'] == 'price') {
                    unset($columns[$key]);
                }
            }
        }


        $productTable = (object)array(
            'table_id' => $table->id,
            'totalProducts' => $total,
            'activePage'=> $page,
            'title' => $table->title,
            'description' => $table->description,
            'settings' => $settings,
            'products' => $formatedRows ? $formatedRows : $validProducts,
            'columns' => $columns,
            'showTitle' => $showTitle,
            'showDescription' => $showDescription
        );

        $productTable = apply_filters('azonpress_product_tables_data', $productTable);

        do_action('azonpress_enqueue_table_assets');

        $productTableHelper = new ProductTableHelper();

        return View::make('product_table', array(
            'table_id' => $table->id,
            'table' => $productTable,
            'settings' => $settings,
            'custom_css' => $custom_css,
            'last_updated_at' => $lastUpdateTime,
            'wrapper_css_class' => $productTableHelper->getTableWrapperCssClass($settings),
            'table_css_class' => $productTableHelper->getTableCssClass($settings)
        ));
    }

    public function getAppearanceSettings($scope = 'public')
    {
        $settings = get_option('azonpress_appearance_settings', array());

        $globalDefaults = array(
            'disclaimer_visibility' => false,
            'disclaimer_text' => "",
        );

        if (isset($settings["global"])) {
            $settings = wp_parse_args($settings["global"]);
        }

        return apply_filters('azonpress_appearance_settings', $settings);
    }

    public function getButtonHTML($type = 'buy')
    {
        global $azonpress;
        $azonpress['current_module'] = 'products';

        $button = Amazon::getButtonStyle($type);
        ob_start(); ?>
        <a href="#" <?php echo $button['atts']; ?>>
            <?php if ($button['type'] == 'custom') : ?>
                <span><?php echo $button['btn_text']; ?></span>
            <?php else : ?>
                <img src="<?php echo $button['url']; ?>" title="<?php _e('Buy On Amazon', 'azonpress'); ?>"/>
            <?php endif; ?>
        </a>
        <?php
        return ob_get_clean();
    }
}

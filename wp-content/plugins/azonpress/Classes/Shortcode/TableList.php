<?php namespace Azonpress\Classes\Shortcode;

use Azonpress\Classes\ArrayHelper;

class TableList
{
    protected $type;

    public function __construct($type = 'comparison')
    {
        $this->type = $type;
    }
    /**
     * Create a New Comparison Table
     */
    public function createTable()
    {
        $table = ArrayHelper::get($_REQUEST, 'table');
        $title = sanitize_text_field(ArrayHelper::get($table, 'title'));
        $description = wp_kses_post(ArrayHelper::get($table, 'description'));
        if (! $title) {
            wp_send_json_error(array(
                'message' => __('Please provide Table title so you can identify later', 'azonpress')
            ), 423);
        }

        $tableData = array(
            'title'       => $title,
            'type'        => $this->type,
            'description' => $description,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
        );

        if (isset($_REQUEST['rows'])) {
            $tableData['rows'] = json_encode(wp_unslash($_REQUEST['rows']));
        }

        if (isset($_REQUEST['column_configuration'])) {
            $configuration = json_encode(wp_unslash($_REQUEST['column_configuration']));
            $tableData['column_configuration'] = $configuration;
        }

        if (isset($_REQUEST['table_settings'])) {
            $tableData['table_settings'] = json_encode(wp_unslash($_REQUEST['table_settings']));
        }

        $tableData = apply_filters('azonpress_insert_'.$this->type.'_table_data', $tableData);

        do_action('azonpress_'.$this->type.'_table_before_insert', $tableData);

        $tableId = azonPressDBModel('azonpress_lists')
            ->insert($tableData);

        do_action('azonpress_'.$this->type.'_table_added', $tableId, $tableData);

        wp_send_json_success(array(
            'message'  => __('Table successfully added', 'azonpress'),
            'table_id' => $tableId
        ), 200);
    }

    /**
     * Update a Table
     */
    public function updateTable()
    {
        $attributes = array(
            'updated_at' => date('Y-m-d H:i:s')
        );

        if (isset($_REQUEST['title'])) {
            $attributes['title'] = sanitize_text_field($_REQUEST['title']);
        }

        if (isset($_REQUEST['description'])) {
            $attributes['description'] = wp_kses_post(wp_unslash($_REQUEST['description']));
        }

        if (isset($_REQUEST['table_settings'])) {
            $attributes['table_settings'] = json_encode(wp_unslash($_REQUEST['table_settings']));
        }


        if (isset($_REQUEST['has_configs'])) {
            if (isset($_REQUEST['rows'])) {
                $attributes['rows'] = json_encode(wp_unslash($_REQUEST['rows']));
            } else {
                $attributes['rows'] = null;
            }
            if (isset($_REQUEST['column_configuration'])) {
                $configuration = json_encode(wp_unslash($_REQUEST['column_configuration']));
                $attributes['column_configuration'] = $configuration;
            } else {
                $attributes['column_configuration'] = null;
            }
        }

        $tableId = intval($_REQUEST['table_id']);
        $attributes = apply_filters('azonpress_'.$this->type.'_tables_update', $attributes, $tableId);
        do_action('azonpress_'.$this->type.'_table_before_update', $tableId, $attributes);

        azonPressDBModel('azonpress_lists')
            ->where('id', $tableId)
            ->update($attributes);

        do_action('azonpress_'.$this->type.'_table_after_update', $tableId, $attributes);

        wp_send_json_success(array(
            'message'  => __('Successfully updated the table', 'azonpress'),
            'table_id' => $tableId
        ), 200);
    }

    /**
     * Get all of the product tables.
     *
     * @return void
     */
    public function getTables()
    {
        $search = isset($_GET['search']) ? $_GET['search'] : null;
        $perPage = isset($_GET['perPage']) ? $_GET['perPage'] : 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $query = azonPressDBModel('azonpress_lists')
            ->where('type', $this->type)
            ->limit($perPage)
            ->orderBy('id', 'DESC')
            ->offset(($page - 1) * $perPage)
            ->select(array('id', 'title', 'type', 'description', 'created_at'));


        $totalQuery = azonPressDBModel('azonpress_lists')
            ->where('type', $this->type);

        $countQuery = azonPressDBModel('azonpress_lists')
            ->where('type', $this->type);

        if ($search) {
            $query->where("title", "LIKE", "%$search%");
            $countQuery->where("title", "LIKE", "%$search%");
        }

        $tables = $query->get();

        foreach ($tables as $table) {
            $table->preview_url = home_url().'?azonpress_preview='.$table->id.'&azon_type='.$table->type;
        }

        $tables = apply_filters('azonpress_all_'.$this->type.'_tables', $tables);


        wp_send_json_success([
            'tables' => $tables,
            'total' => $countQuery->getCount(),
            'has_no_table' => ! (bool) $totalQuery->getCount()
        ], 200);
    }

    /**
     * Get table by id.
     *
     * @return void
     */
    public function find()
    {
        $id = intval($_REQUEST['table_id']);

        $table = azonPressDBModel('azonpress_lists')
            ->where('type', $this->type)
            ->find($id);
        if (! $table) {
            wp_send_json_error(array(
                'message' => __('Table does not exists', 'azonpress')
            ), 404);
        }
        $table->rows = json_decode($table->rows, true);
        $table->column_configuration = json_decode($table->column_configuration, true);
        $table->table_settings = json_decode($table->table_settings, true);

        $table->loadingUrl = AZONPRESS_PLUGIN_URL.'public/images/load.gif';

        $table->preview_url = home_url().'?azonpress_preview='.$table->id.'&azon_type='.$table->type;

        wp_send_json_success([
            'table' => $table
        ], 200);
    }


    /**
     * Delete a product table.
     *
     * @return void
     */
    public function delete()
    {
        $id = intval($_REQUEST['table_id']);

        do_action('azonpress_'.$this->type.'_table_before_deleted', $id);

        azonPressDBModel('azonpress_lists')
            ->where('type', $this->type)
            ->where('id', $id)
            ->delete();

        do_action('azonpress_'.$this->type.'_after_before_deleted', $id);

        wp_send_json_success([
            'message' => __('Successfully deleted the table', 'azonpress')
        ], 200);
    }

    public function duplicate()
    {
        $id = intval($_REQUEST['table_id']);
        do_action('azonpress_'.$this->type.'_table_before_duplicate', $id);
        $oldTable = azonPressDBModel('azonpress_lists')
            ->where('type', $this->type)
            ->find($id);

        if (!$oldTable) {
            wp_send_json_error(array(
                'message' => __('Table does not exists', 'azonpress')
            ), 404);
        }

        $newTable = [
                "description" => $oldTable->description,
                "type" => $oldTable->type,
                "rows" => $oldTable->rows,
                "column_configuration" => $oldTable->column_configuration,
                "table_settings" => $oldTable->table_settings,
                "custom_css" => $oldTable->custom_css,
                "total_view" => $oldTable->total_view,
        ];
        $newTable["title"] = '(Duplicate) ' . $oldTable->title;

        $newId = azonPressDBModel('azonpress_lists')
                ->insert($newTable);

        do_action('azonpress_'.$this->type.'_after_before_duplicate', $id);

        wp_send_json_success([
            'message' => __('Successfully table duplicated', 'azonpress'),
            'id'      => $newId
        ], 200);
    }


    public function updateCSS()
    {
        $customCSS = esc_attr($_REQUEST['custom_css']);
        $tableId = intval($_REQUEST['table_id']);
        azonPressDBModel('azonpress_lists')
            ->where('id', $tableId)
            ->update(array(
                'custom_css' => $customCSS
            ));

        wp_send_json_success(array(
            'message' => __('CSS successfully updated', 'azonpress')
        ));
    }

    public function getTotal()
    {
        return azonPressDBModel('azonpress_lists')
            ->where('type', $this->type)->getCount();
    }
}

<?php
use Azonpress\Classes\ArrayHelper;

$formattedProducts = array();
foreach ($table->products as $product) {
    $formattedProducts[] = new \Azonpress\Classes\Shortcode\ComparisonHelper($product);
}
$settings_for_label = get_option('azonpress_appearance_settings', array());
?>
<!-- Start: azonpress-table-wrapper -->
<div class="azp-table-wrapper">
    <?php  if ($table->showTitle || $table->showDescription) : ?>
    <div class="azp_comp_table_header">
        <?php if ($table->showTitle) : ?>
            <h3><?php echo $table->title; ?></h3>
        <?php endif; ?>
        <?php if ($table->showDescription) : ?>
            <div class="azp_comp_description"><?php echo $table->description; ?></div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <!-- Start: Inner table wrapper -->
    <div class="azp_comp_table_wrapper">
        <div class="azp_comp_wrapper azp_has_featured azp_comp_col_<?php echo count($table->products) + 1; ?>">
            <!-- Title -->
            <?php foreach ($table->rows as $row_index => $row) : ?>
                <div class="azp_comp_row">
                    <div class="azp_comp_thead"> <?php echo ArrayHelper::get($row, 'table_row_title'); ?></div>
                    <?php foreach ($formattedProducts as $product_index => $formatted_product) : ?>
                        <div style="border-color: <?php echo $formatted_product->getColumnPrimaryColor(); ?>" class="azp_com_data azp_com_product_<?php echo $product_index; ?> <?php echo $formatted_product->getDataCellClass(); ?>  azp_data_<?php echo $row['table_row_type']; ?>">
                            <?php if ($row_index == 0) : ?>
                                <?php echo $formatted_product->getHighLightHtml(); ?>
                            <?php endif; ?>
                            <?php echo $formatted_product->getCellData($row_index, $row); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- End: azonpress-table-wrapper -->


<!-- Comparison table mobile version -->
<div class="azp_com_mobile azp_has_featured">
    <?php foreach ($formattedProducts as $formattedProduct) : ?>
    <div class="azp_com_mobile_each">
        <?php foreach ($table->rows as $row_index => $row) : ?>
            <div class="azp_comp_mobile_row">
                <div class="<?php if (ArrayHelper::get($settings_for_label, 'global.hide_label') == 'yes') {
                                echo 'azp_comp_mobile_thead hide_on_mob';
                            } else {
                                echo 'azp_comp_mobile_thead';
                            }?>">
                <?php echo ArrayHelper::get($row, 'table_row_title'); ?>
                </div>
                <div style="border-color: <?php echo $formattedProduct->getColumnPrimaryColor(); ?>" class="azp_comp_mobile_product <?php echo $formattedProduct->getDataCellClass(); ?>">
                <?php if ($row_index == 0) : ?>
                    <?php echo $formattedProduct->getHighLightHtml(); ?>
                <?php endif; ?>
                    <?php echo $formattedProduct->getCellData($row_index, $row); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
</div>

<?php do_action('azonpress_after_product_content', $last_updated_at); ?>

<?php if ($custom_css) : ?>
    <style type="text/css">
        <?php echo $custom_css; ?>
    </style>
<?php endif; ?>


<?php
$pageIndex = \Azonpress\Classes\Products\Amazon::getPageIndex(); // yes, no

if ($pageIndex === 'yes') {
    ?>
        <script type="text/javascript">
        jQuery( document ).ready(function($) {
            if($('meta[name=robots]')) {
                $('meta[name=robots]').attr('content', "noindex, nofollow");
            } else {
                var m = document.createElement('meta');
                m.name = 'robots';
                m.content = "noindex, nofollow";
                document.head.appendChild(m);
            }
        }, jQuery);
        </script>

    <?php
}
?>
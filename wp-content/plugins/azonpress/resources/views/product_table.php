<?php use Azonpress\Classes\ArrayHelper;

$tableHelper = new \Azonpress\Classes\Shortcode\ProductTableHelper();
$settings = $table->settings;
$activePage = $table->activePage;
$loading = false;
$perPage = (int)ArrayHelper::get($settings, "inputed_perPageNumber");
$totalProducts = $table->totalProducts;
$activeClass = 'active';
$isProductCount = ArrayHelper::get($settings, "table_features", false);
$pageIndex = \Azonpress\Classes\Products\Amazon::getPageIndex();


if ($perPage === 0) {
    $pageNumber = 0;
} else {
    $pageNumber = ceil($totalProducts / $perPage);
}

$isBorder = ArrayHelper::get($settings, "table_features");

$borderStyle = in_array('table-bordered', $isBorder) || in_array('celled', $isBorder) ? '1px solid #767676' : 'none';
?>
<div id="azp_table_wrap_<?php echo $table_id; ?>"
     class="<?php echo $wrapper_css_class; ?> azp_table_wrapper_<?php echo $table_id; ?>">
    <table id="azp_product_table_<?php echo $table_id; ?>"
           class="<?php echo $table_css_class; ?> azp_table_<?php echo $table_id; ?>"
           style='border : <?php echo $borderStyle ?>'>
        <thead>
        <tr>
            <?php foreach ($table->columns as $index => $column) : ?>
                <th style='border : <?php echo $borderStyle ?>'
                    class="azp_column_item_<?php echo $index; ?> <?php echo $tableHelper->getColumnTheadClass($column); ?>">
                    <?php echo ArrayHelper::get($column, 'title'); ?>
                </th>
            <?php endforeach; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($table->products as $productIndex => $product) : ?>
            <tr class="azp_product_index_<?php echo $productIndex; ?>">
                <?php foreach ($table->columns as $index => $column) :
                    ?>
                    <td class="azp_column_item_<?php echo $index; ?> <?php echo $tableHelper->getColumnTbodyClass($column); ?>"
                        style='border : <?php echo $borderStyle ?>'>
                        <?php echo $tableHelper->getCell($product, $column, $settings); ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    if ($perPage && !($perPage >= $totalProducts)) : ?>
        <div class='azp_pagiantion_container'>
            <?php
            if (!in_array('Hide_Total_Product', $isProductCount)) :?>
                <p class="azp_totalProduct">Total : <?php echo $totalProducts ?> products </p>
            <?php endif; ?>
            <div class="pagination">
                <?php for ($x = $pageNumber; $x >= 1; $x--) {
                    ?> <a class="<?php if ($activePage == $x) {
                        echo "active";
                    } ?>" onclick="myFunc(<?php echo $x ?>,<?php echo $table_id; ?>)"> <?php echo $x ?> </a> <?php
                } ?>
            </div>
        </div>
    <?php
    endif;
    ?>
    <?php
    do_action('azonpress_after_product_content', $last_updated_at); ?>

</div>
<?php
if ($custom_css) : ?>
    <style type="text/css">
        <?php echo $custom_css; ?>
    </style>
<?php endif;?>


<!-- ajax request for frontend pagination -->

<script type="text/javascript">
    function myFunc(currentPage, tableId) {
        let loading = true;
        let data = {
            action: 'azp_product_table_user_pagination_ajax',
            route: 'get_formated_products',
            currentPage: currentPage,
            tableID: tableId
        }

        let loader = document.createElement("div");
        loader.className = "lds-roller";
        if (loading) {
            document.getElementById('azp_product_table_' + tableId).innerHTML = loader;
        }

        jQuery.get(azp_ajax.ajaxurl, data)
            .success(res => {
                jQuery('#azp_table_wrap_' + tableId).html(res.data.data)
                loading = false
            })
            .fail(error => {
                console.log(error);
            })
    }

    <?php
    if ($pageIndex === 'yes') {
        ?>
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
        <?php
    }
    ?>
</script>


<style>

    /* pagination style */

    .azp_totalProduct {
        width: 100%;
        margin-top: 30px;
    }

    .azp_pagiantion_container {
        width: 100%;
        border-top: .5px solid #6e7070;
        display: flex;
        align-items: center;
        margin-top: 30px;
        padding-top: 10px;
    }

    .pagination {
        border-top: none;
        margin-bottom: 0px;
        float: right;
        width: 100%;
        margin: 0px;
    }

    .pagination a {
        color: black;
        float: right;
        padding: 2px 14px;
        margin: 2px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color .3s;
    }

    .pagination a.active {
        background-color: dodgerblue;
        color: white;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }

    /* Loader Style */

    .lds-roller {
        display: inline-block;
        position: relative;
        margin: 50%;
    }

    .lds-roller div {
        animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        transform-origin: 40px 40px;
    }

    .lds-roller div:after {
        content: " ";
        display: block;
        position: absolute;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #35393b;
        margin: -4px 0 0 -4px;
    }

    .lds-roller div:nth-child(1) {
        animation-delay: -0.036s;
    }

    .lds-roller div:nth-child(1):after {
        top: 63px;
        left: 63px;
    }

    .lds-roller div:nth-child(2) {
        animation-delay: -0.072s;
    }

    .lds-roller div:nth-child(2):after {
        top: 68px;
        left: 56px;
    }

    .lds-roller div:nth-child(3) {
        animation-delay: -0.108s;
    }

    .lds-roller div:nth-child(3):after {
        top: 71px;
        left: 48px;
    }

    .lds-roller div:nth-child(4) {
        animation-delay: -0.144s;
    }

    .lds-roller div:nth-child(4):after {
        top: 72px;
        left: 40px;
    }

    .lds-roller div:nth-child(5) {
        animation-delay: -0.18s;
    }

    .lds-roller div:nth-child(5):after {
        top: 71px;
        left: 32px;
    }

    .lds-roller div:nth-child(6) {
        animation-delay: -0.216s;
    }

    .lds-roller div:nth-child(6):after {
        top: 68px;
        left: 24px;
    }

    .lds-roller div:nth-child(7) {
        animation-delay: -0.252s;
    }

    .lds-roller div:nth-child(7):after {
        top: 63px;
        left: 17px;
    }

    .lds-roller div:nth-child(8) {
        animation-delay: -0.288s;
    }

    .lds-roller div:nth-child(8):after {
        top: 56px;
        left: 12px;
    }

    @keyframes lds-roller {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

</style>
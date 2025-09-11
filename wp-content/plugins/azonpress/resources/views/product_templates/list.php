<div class="azp-product-area azp-list-style <?php echo $wrapper_class; ?>">
    <?php
    include '_header.php';
    $counter = 1;
    foreach ($products as $index => $product): ?>
        <!-- azp-each-product -->
        <div class="azp-each-product azp-each-list azp_list_item_<?php echo $counter; ?>">
            <!-- azp--product-content -->
            <div class="azp-product-content">
                <!-- azp-visual-part -->
                <div class="azp-visual-part">
                    <div class="azp-img-wrapper">
                        <?php echo $product->getImageHtml($atts['size']); ?>
                    </div>
                </div>
                <!-- /.azp-visual-part -->
                <!-- description -->
                <div class="azp-info-part">
                    <div class="azp-title">
                        <?php echo $product->titleHtml(); ?>
                    </div>
                    <div class="azp-feature-list">
                        <?php echo $product->getEditorialReview(); ?>
                    </div>
                    <div class="azp-info-footer">
                        <?php echo $product->ratingStarsHtml(); ?>
                        <?php if(!$hide_price): ?>
                        <?php echo $product->priceHTML('extended'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- description -->
            </div>
            <!-- /.azp-product-content -->
        </div>
        <!-- /.azp-each--product -->
        <?php $counter++; ?>
    <?php endforeach; ?>
    <?php do_action('azonpress_after_product_content', $last_updated_at); ?>
</div>
<!-- /.azp-product-area -->

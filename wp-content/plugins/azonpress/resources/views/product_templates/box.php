<div class="azp-product-area azp-box-style <?php echo $wrapper_class; ?>">
    <?php
    include '_header.php';
     ?>
    <?php
        $counter = 1;
        foreach ($products as $index => $product): ?>
        <!-- azp-each-product -->
        <div class="azp-each-product azp-each-box azp_box_item_<?php echo $counter; ?>">

            <!-- azp-product-meta -->
            <?php echo \Azonpress\Classes\Products\HTMLHelper::ribbonMeta($atts, $counter); ?>
            <!-- /.azp-product-meta -->

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
			            <?php echo $product->featuresHtml(); ?>
                    </div>
                    <div class="box-footer">
                        <?php if (!$hide_price): ?>
	                    <?php echo $product->priceHTML('extended'); ?>
                        <?php endif; ?>
                        <div class="azp-buy-button">
		                    <?php echo $product->buyButton(); ?>
                        </div>
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

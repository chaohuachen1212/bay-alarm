<div class="azp-product-area azp-grids-style azp-grid-col-<?php echo esc_attr( $columns ); ?> <?php echo $wrapper_class; ?>">
	<?php
    include '_header.php';
    $counter = 1;
	foreach ( $products as $index => $product ): ?>
        <!-- azp-each-product -->
        <div class="azp-each-product azp_grid_item_<?php echo $counter; ?>">

            <!-- azp-product-meta -->
			<?php echo \Azonpress\Classes\Products\HTMLHelper::ribbonMeta( $atts, $counter ); ?>
            <!-- /.azp-product-meta -->

            <!-- azp--product-content -->
            <div class="azp-product-content">

                <!-- azp-visual-part -->
                <div class="azp-visual-part">
                    <div class="azp-img-wrapper">
						<?php echo $product->getImageHtml(); ?>
                    </div>
					<?php echo $product->ratingStarsHtml(); ?>
					<?php echo $product->getReviewsHTML(); ?>
                </div>
                <!-- /.azp-visual-part -->

                <!-- description -->
                <div class="azp-info-part">
                    <div class="azp-title">
						<?php echo $product->titleHtml(); ?>
                    </div>
                    <?php if(!$hide_price): ?>
					<?php echo $product->priceHTML( 'extended' ); ?>
                    <?php endif; ?>
                    <div class="azp-buy-button">
						<?php echo $product->buyButton(); ?>
                    </div>
                </div>
                <!-- description -->

            </div>
            <!-- /.azp-product-content -->

        </div>
        <!-- /.azp-each--product -->
		<?php $counter ++; ?>
	<?php endforeach; ?>
</div>
<!-- /.azp-product-area -->

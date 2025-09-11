<div class="azonpress-admin-inline azonpress-admin-searchbox">
    <span class="azonpress-admin-editor-tooltip azonpress-admin-hide-display"></span>
    <img
        src="<?php echo azonPressAsset('images/amazon_icon.png'); ?>"
        class="azonpress-admin-searchbox-amzlogo">
    <input
        type="text"
        class="azonpress-admin-input-search"
        name="azonpress-admin-input-search"
        placeholder="Enter keyword(s)" ,=""
        onkeypress="">
    <a
        class="button azonpress-admin-button-create-amazon-shortcode"
        data-modal="#azonpress-modal"
        title="Add Amazon Associates Link Builder Shortcode" > <?php _e('Search', 'azonpress');?> </a>
</div>



<div class="azonpress-modal">
    <!-- Modal content -->
    <div class="azonpress-pro-modal-content">
        <div class="azonpress-modal-title">
            <span>Add Amazon Associates Link Builder Shortcode</span>
            <span class="azonpress-modal-close">X</span>
        </div>

        <div class="azonpress-wrapping-panel">
            <div class="azonpress-add-template">
                <label class="azonpress-templates-label" title="To configure templates, go to Associates Link Builder plugin's Templates page">Add Template</label>
                <select id="azonpress_template_names_list" name="azonpress_template_names_list">
                    <option value="box">Product Box</option>
                    <option value="widget">Product Widget</option>
                    <option value="carousel">Product Carousel</option>
                    <option value="shop">Product Grid</option>
                </select>
            </div>


            <div class="azonpress-modal-inner_content">
                <div class="search_area">
                    <input type="text" id="azonpress_search-box">
                    <button class="azp-search-btn">Search</button>
                </div>


                <div class="azonpress_searchProducts">
                    <fieldset class="azonpress-admin-popup-search-result">
                        <legend class="azonpress-admin-popup-legend">Click to select product(s) to advertise</legend>

                        <div class="azonpress-admin-item-search-loading">
                            <div class="azonpress-admin-icon"><i class="fa fa-spinner fa-pulse"></i></div>
                            Searching relevant products from Amazon
                        </div>

                        <div class="azonpress-row" id="insertProd"></div>
                    </fieldset>


                    <fieldset class="azonpress-selected azonpress-admin-popup-fieldset">
                        <legend class="azonpress-admin-popup-legend">List of Selected Products(Maximum: 10)</legend>

                        <div class="azonpress-admin-alert-info">Please select some products from above.</div>

                    </fieldset>
                </div>
            </div>
        </div>



        <div class="azonpress-modal-footer">
            <button
            class="azonpress-btn-primary"
            id="azonpress-add-shortcode-button"
            type="button">Add Shortcode</button>
        </div>
    </div>
</div>

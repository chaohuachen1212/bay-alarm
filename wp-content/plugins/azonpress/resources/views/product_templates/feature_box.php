<div class="azp-feature_box <?php echo $wrapper_class; ?>">
    <div class="azp_feature_header"><?php echo $title; ?></div>
    <div class="azp_feature_body">
        <?php if($features): ?>
        <ul class="azp_features">
            <?php foreach ($features as $feature): ?>
            <li><?php echo $feature; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <?php if($button): ?>
        <div class="azp_feature_action">
            <a <?php if(!empty($button['target_blank'])) : ?>target="_blank"<?php endif; ?> <?php if(empty($button['nofollow'])) : ?>rel="nofollow"<?php endif; ?> href="<?php echo $btn_url; ?>" class="azp-url azp_button_url azp_button_type_custom azp_custom_btn_3">
                <span><?php echo $button['btn_text'];?></span>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>
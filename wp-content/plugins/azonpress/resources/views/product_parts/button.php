<?php
    $button = \Azonpress\Classes\Products\Amazon::getButtonStyle('buy');
?>
<a  href="<?php echo $this->productUrl(); ?>" <?php echo $button['atts']; ?>>
    <?php if($button['type'] == 'custom'): ?>
        <span><?php echo $button['btn_text'];?></span>
    <?php else: ?>
        <img src="<?php echo $button['url'];?>" title="<?php _e('Buy On Amazon', 'azonpress'); ?>" />
    <?php endif; ?>
</a>
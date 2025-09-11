<?php if ($link): ?>
<a  class="azp-url azp_image_link" rel="noopener nofollow" target="_blank" href="<?php echo $this->productUrl();?>">
    <img alt="<?php echo(wp_trim_words($this->title(), 3, '...image')); ?>" src="<?php echo($this->images())[$size];?>"/>
</a>
<?php else: ?>
    <img alt="<?php echo(wp_trim_words($this->title(), 3, '...image')); ?>" class="azp_product_image" src="<?php echo($this->images())[$size];?>"/>
<?php endif; ?>

<?php
	$reviewCount = $this->getReviewData('reviewCount');
	if(!$reviewCount) {
	    return;
    }
	$willItShow = (bool) $reviewCount;
	$willItShow = apply_filters('azonpress_show_review_count', $willItShow, $reviewCount);
	if(!$willItShow) {
		return;
	}
?>

<div class="azp-total-reviews">
	<p><?php echo $this->getReviewData('reviewCount'); ?> Reviews</p>
</div>

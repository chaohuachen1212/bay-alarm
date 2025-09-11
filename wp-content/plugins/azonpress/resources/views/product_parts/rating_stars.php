<?php
$rating = $this->getReviewData('averageRating');
if(!$rating) {
    return '';
}
$showRating = $rating && $rating != '0.00';

$showRating = apply_filters('azonpress_show_rating', $showRating, $this);

if($showRating) {
	$ratings = '<div class="star-rating"><a target="_blank" href="'. $this->productUrl() .'"><span class="azp_star_ratings" style="width:'. ($rating*20) .'%"></span></a></div>';
	echo $ratings;
}

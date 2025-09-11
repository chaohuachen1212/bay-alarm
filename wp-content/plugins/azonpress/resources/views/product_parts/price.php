<?php
$lowestPrice = $this->getLowestPrice();

$discountAmount = $this->getDiscountAmount();
$price = $this->getPrice();

$activeStore = \Azonpress\Classes\Products\Amazon::getCurrentStore();
?>
<?php if ($type == 'extended') : ?>
    <?php
    $lowestPriceStr = preg_replace('/[^0-9.,]/', '', $lowestPrice);
    $normalPriceStr = preg_replace('/[^0-9.,]/', '', $price);
    $lowestPriceNumber = floatval(str_replace(',', '.', $lowestPriceStr));
    $normalPriceNumber = floatval(str_replace(',', '.', $normalPriceStr));

    if ($normalPriceNumber > $lowestPriceNumber) {
        $discountAmount = round($normalPriceNumber - $lowestPriceNumber, 2);
    } else {
        $discountAmount = 0;
    }
    ?>

<div class="azp-price">
    <?php if ($discountAmount) : ?>
        <span class="azp-real-price">
        <?php echo $this->getPrice(); ?></span>
        <span class="azp-off">-<?php echo $activeStore['currency']; ?><?php echo $discountAmount; ?></span>
        <span class="azp-recent-price"><?php echo $lowestPrice; ?></span>
    <?php else : ?>
        <span class="azp-recent-price">
            <?php echo $price; ?>
        </span>
    <?php endif; ?>
</div>
<?php else : ?>
    <span class="azp-recent-price"><?php echo $price; ?></span>
<?php endif; ?>

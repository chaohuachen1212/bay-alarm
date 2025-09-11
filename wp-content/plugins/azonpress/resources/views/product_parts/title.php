<?php if ($link): ?>
<a target="_blank" rel="noopener nofollow" class="azp-url" href="<?php echo $this->productUrl(); ?>" title="<?php echo htmlentities($this->title()); ?>">
    <?php echo $this->title(); ?>
</a>
<?php else: ?>
<?php echo $this->title(); ?>
<?php endif; ?>

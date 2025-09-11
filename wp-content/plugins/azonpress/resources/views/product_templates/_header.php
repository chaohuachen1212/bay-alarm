<?php if ($atts['title'] || $atts['content']) : ?>
<div class="azp_component_header">
    <?php if ($atts['title']) : ?>
    <h3><?php echo $atts['title']; ?></h3>
    <?php endif; ?>
    <?php if ($atts['content']) : ?>
        <div class="azp_component_description">
            <?php echo $atts['content']; ?>
        </div>
    <?php endif; ?>
</div>
<?php endif;

$pageIndex = \Azonpress\Classes\Products\Amazon::getPageIndex(); // yes, no

if ($pageIndex === 'yes') {
    ?>
        <script type="text/javascript">
        jQuery( document ).ready(function($) {
            if($('meta[name=robots]')) {
                $('meta[name=robots]').attr('content', "noindex, nofollow");
            } else {
                var m = document.createElement('meta');
                m.name = 'robots';
                m.content = "noindex, nofollow";
                document.head.appendChild(m);
            }
        }, jQuery);
        </script>

    <?php
}
?>



<div class="azp_stackable azp_inline_table azp_table_wrapper semantic_ui_wrapper <?php echo $wrapper_class; ?>">
    <?php include '_header.php'; ?>
    <table class="table ui vertical_centered mobile_stackable striped">
        <thead>
            <tr>
                <?php foreach ($headings as $heading): ?>
                <th style="width: 100px;"><?php echo $heading; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $index => $row):?>
            <tr>
                <?php foreach ($headings as $key => $heading): ?>
                <td  class="<?php echo $key; ?>"><?php echo $row[$key]; ?></td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php do_action('azonpress_after_product_content', $last_updated_at); ?>
</div>

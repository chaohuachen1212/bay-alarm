<!-- Start: Azonpress table -->
<?php 
    $rows = $table->rows;
    $columns = $table->column_configration;
    $defaultBorder = 'rgba(0,0,0,0.2)';
?>
<div class="azonpress-table-wrapper">
    <div class="azonpress-table__inner-wrapper">
        <!-- Title -->
        <div class="azp-table-column title">
        <?php foreach ($rows as $row) :?>
            <?php if($row['activeTableRow']): ?>
                <div class="azp-row azp-<?=$row['table_row_type']?>">
                    <p class="azp-label"><?=$row['table_row_title']?></p>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        </div>

        <!-- Column -->
        <?php foreach ($columns as $column) :?>
            <div 
            class="azp-table-column details" 
            style="border:1px solid <?=$column['custom_color'] ? $column['custom_color'] : $defaultBorder; ?>; 
            background: <?= substr($column['custom_color'], 0, -2) . '.1)'; ?>";
            >

                <!-- ROW -->
                <?php foreach ($column['rows'] as $row) :?>
                    <?php if($row['activeTableRow']): ?>
                        <div 
                            class="azp-row azp-<?=$row['table_row_type']?>" 
                            style="background: <?= $row['custom_row_color'] ? $row['custom_row_color'] : 'transparent' ?>">
                            <!-- Image part-->
                            <?php if($row['table_row_type'] == 'image'): ?>
                                <div class="azp-container image-container">

                                    <!-- Upper title -->
                                    <?php if($column['column_header_text']): ?>
                                    <div 
                                    class="upper-title"
                                    style="background: <?= $column['custom_color'] ? $column['custom_color'] : 'transparent' ?>">
                                        <?= $column['column_header_text'] ;?> 
                                    </div>
                                    <?php endif;?>

                                    <!-- Image -->
                                    <div class="image-part">
                                        <img src="<?php echo $column[$row['table_row_type']]; ?>" alt="">
                                    </div>
                                    
                                </div>
                            
                            <!-- Have feature -->
                            <?php elseif($row['table_row_type'] == 'yes_no') :?>
                                <div class="azp-container">
                                    <i 
                                    class="fa fa-<?= $row['isHaveFeature'] ? 'check ' : 'close' ?>"></i>
                                </div>

                            <!-- Star Rating -->
                            <?php elseif($row['table_row_type'] == 'star_rating') :?>
                                <div class="azp-container">
                                    <div class="azonpress-star-rating">
                                        <span 
                                        style="width:<?=  $column['star_rating'] ? 20 * intval($column['star_rating']) : 20 * 5 ?>%"></span>
                                    </div>
                                </div>
                            

                            <!-- Price status -->
                            <?php elseif($row['table_row_type'] == 'Price_status'):?>
                                <div class="azp-container">
                                    <img src="./images/prime.png" alt="">
                                </div>

                            <!-- Buy now button -->
                            <?php elseif($row['table_row_type'] == 'buy_now_button'):?>
                                <div class="azp-container">
                                    <a href="#" class="azonpress-buy-form-amazon">
                                        <i class="fa fa-amazon"></i>
                                        <span>Buy on amazon</span>
                                    </a>
                                </div>
                            
                            <?php else: ?>
                                <div class="azp-container">
                                    <?php echo $column[$row['table_row_type']] ?: $row['custom_value']; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<!-- End: Azonpress table -->
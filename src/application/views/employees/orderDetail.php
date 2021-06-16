<?php echo $html->includeCss("common"); ?>
<?php echo $html->includeCss("admin"); ?>
<?php echo $html->includeCss("orders"); ?>
<?php
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

?>


<?php console_log($items); ?>
<div class="body-container p-base">
    <div class="order-container">
        <div class="row text-center">
            <h2>Order detail</h2>
            <p class="long-copy">
                Let see our Order detail
            </p>
        </div>
        <table class="orders-table" class="plr-15 mt-15 shadow-box">
            <tr>
                <th>Order ID</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>

            <?php
            $order_id = null;
            foreach ($items as $item) {
                $order_id = $item['Order_detail']['order_id'];
                $total_price = ($item['Order_detail']['quantity'] * $item['Order_detail']['price']);
                echo "<tr>";
                echo "<td>{$item['Order_detail']['order_id']}</td>";
                echo "<td>{$item['Order_detail']['product_id']}</td>";
                echo "<td>{$item['Order_detail']['name']}</td>";
                echo "<td>{$item['Order_detail']['quantity']}</td>";
                echo "<td>{$item['Order_detail']['price']}</td>";
                echo "<td>{$total_price}</td>";
                echo "</tr>";
            }
            ?>

        </table>
        <div class="row text-center" style="margin-top: 2%;">
            <h2>Ingredients detail</h2>
            <p class="long-copy">
                Let see our needed ingredients detail
            </p>
        </div>
        <form method='POST' action='/employees/processOrder'>
            <table class="orders-table" class="plr-15 mt-15 shadow-box">
                <tr>
                    <th>Ingredient Name</th>
                    <th>Quantity</th>
                    <th>Stock quantity</th>
                    <th>Status</th>
                </tr>

                <?php
                $is_valid = true;
                echo "<input type='hidden' name='order' value='$order_id' />";
                foreach ($ingredients as $item) {
                    echo "<input type='hidden' name='ingredient_id[]' value='{$item['Order_ingredient']['ingredient_id']}' />";
                    echo "<input type='hidden' name='ingredient_quantity[]' value='{$item['Order_ingredient']['quantity']}' />";
                    echo "<tr>";
                    echo "<td>{$item['Order_ingredient']['name']}</td>";
                    echo "<td>{$item['Order_ingredient']['quantity']}</td>";
                    echo "<td>{$item['Order_ingredient']['stock_quantity']}</td>";
                    if ($item['Order_ingredient']['quantity'] < $item['Order_ingredient']['stock_quantity'])
                        echo "<td>OK</td>";
                    else {
                        $is_valid = false;
                        echo "<td>Not enough. <a href='/employees/import'>Request</a></td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
            <?php
            if ($is_valid)
                echo "<input type='submit' value='Process' style='margin-top: 2%'/>"; ?>
        </form>
    </div>
</div>
<?php echo $html->includeCss("common"); ?>
<?php echo $html->includeCss("admin"); ?>
<?php echo $html->includeCss("orders"); ?>
<?php
function console_log($output, $with_script_tags = true) {
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
    <table id="orders" class="plr-15 mt-15 shadow-box">
        <tr>
            <th>Order ID</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Stock Qty</th>
            <th>Unit Price</th>
            <th>Total</th>
        </tr>

        <?php
        foreach ($items as $item) {
            $total_price = ($item['Order_detail']['quantity'] * $item['Order_detail']['price']);
            $stock = $item['Order_detail']['quantity'] + 15;
            echo "<tr>";
            echo "<td>{$item['Order_detail']['order_id']}</td>";
            echo "<td>{$item['Order_detail']['product_id']}</td>";
            echo "<td>{$item['Order_detail']['name']}</td>";
            echo "<td>{$item['Order_detail']['quantity']}</td>";
            echo "<td>$stock</td>";
            echo "<td>{$item['Order_detail']['price']}</td>";
            echo "<td>{$total_price}</td>";
            echo "</tr>";
        }
        ?>

    </table>

    </form>
</div>
    </div>
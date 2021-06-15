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


<?php console_log($orders); ?>
<div class="body-container p-base">
    <div class="order-container">
        <div class="row text-center">
            <h2>Order List</h2>
            <p class="long-copy">
                Let see your order list
            </p>
        </div>
        <table id="orders" class="plr-15 mt-15 shadow-box">
            <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Status</th>
                <th>Details</th>
            </tr>
            <?php
            
            foreach ($orders as $order) {
                echo "<tr>";
                echo "<td>{$order['Order']['order_id']}</td>";
                echo "<td>{$order['Order']['created_at']}</td>";
                if($order['Order']['status']==1)
                echo "<td>Done</td>";
                else echo"<td>Undone</td>";
                echo "<td class='see-more'>";
                echo "<a href='/customer/orderDetail/{$order['Order']['order_id']}'>";
                echo "See more";
                echo "</a>";
                echo "</td>";
                echo "</tr>";
            }
        ?>
        </table>

        

        </form>
    </div>
</div>
    
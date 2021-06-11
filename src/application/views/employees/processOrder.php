<?php echo $html->includeCss("orders"); ?>
<div class="body-container p-base">
    <div class="order-container">
        <div class="row text-center">
            <h2>All orders you've not processed</h2>
            <p>
                Let check the orders and accept if all the products are available.
            </p>
        </div>
        <div>
            <?php if (isset($message)) ?>
            <p style="color: orange;"><?php echo $message; ?></p>
            <form method="POST">
                <table id="orders" class="plr-15 mt-15 shadow-box">
                    <tr>
                        <th>OK</th>
                        <th>OrderID</th>
                        <th>CustomerID</th>
                        <th>Created at</th>
                        <th>Details</th>
                    </tr>
                    <?
                    if ($orders) {
                        foreach ($orders as $order) :

                            $current = $order['Order'];
                            echo "<tr>";
                            echo "<td><input type='checkbox' value='{$current["order_id"]}' name='orders[]'></td>";
                            echo "<td>{$current['order_id']}</td>";
                            echo "<td>{$current['customer_id']}</td>";
                            echo "<td>{$current['created_at']}</td>";
                            echo "<td class='see-more'>";
                            echo "<a href='/employees/orderDetail/{$current['order_id']}'>";
                            echo "See more";
                            echo "</a>";
                            echo "</td>";
                            echo "</tr>";
                            // echo "id: " . $current['order_id'] . " cus_id: " . $current['customer_id'] . " time: " .
                    ?>
                        <?php endforeach ?>

                    <? } else {
                        echo "You currently have no order assigned!\n";
                    } ?>
                </table>
                <br><input type="submit" value="Process">
                <input type="reset" value="Reset" class="btn btn-secondary">
            </form>
        </div>
        <div class="mt-15">Want to request manager to import more ingredients <a href="/employees/import">Click here!</a></div>
    </div>
</div>
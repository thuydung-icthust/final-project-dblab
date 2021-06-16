<div id="shopping-cart" class="body-container">
    <div>
        <h2>Your Cart</h2>
    </div>

    <a id="btnEmpty" href="/products/order?action=empty">Empty Cart</a>
    <?php
    if (count($products) > 0) {
        $total_quantity = 0;
        $total_price = 0;
    ?>
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
                <tr>
                    <th style="text-align:left;">Name</th>
                    <th style="text-align:right;" width="5%">Quantity</th>
                    <th style="text-align:right;" width="10%">Unit Price</th>
                    <th style="text-align:right;" width="10%">Price</th>
                    <th style="text-align:center;" width="5%">Remove</th>
                </tr>
                <?php
                foreach ($products as $k => $item) {
                    $item_price = $item["quantity"] * $item["price"];
                ?>
                    <tr>
                        <td style="text-align:left;" class="plr-5"><img src="<?php echo $item["image_url"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?>
                        </td>
                        <td style="text-align:right;" class="plr-5"><?php echo $item["quantity"]; ?></td>
                        <td style="text-align:right;" class="plr-5"><?php echo number_format($item["price"], 0) . "đ"; ?></td>
                        <td style="text-align:right;" class="plr-5"><?php echo number_format($item_price, 0) . "đ"; ?></td>
                        <td style="text-align:center;" class="plr-5"><a href="/products/order?action=remove&id=<?php echo $k; ?>" class="btnRemoveAction"><i class="fas fa-trash"></i></a></td>
                    </tr>
                <?php
                    $total_quantity += $item["quantity"];
                    $total_price += ($item["price"] * $item["quantity"]);
                }
                ?>

                <tr>
                    <td colspan="2" align="right" class="plr-5">Total:</td>
                    <td align="right" class="plr-5"><?php echo $total_quantity; ?></td>
                    <td align="right" colspan="2" class="plr-5">
                        <strong><?php echo number_format($total_price, 0) . "đ"; ?></strong>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <a id="btn-submit" href="/products/order?action=submit">Place order</a>
    <?php
    } else {
    ?>
        <div class="no-records">Your Cart is Empty</div>
    <?php
    }
    ?>

    <a href="/customer/orderList">Check your previous orders</a>
</div>
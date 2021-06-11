<div class="body-container p-base">
    <div class="row">
        <h2>Importment Request</h2>
        <p>
            Click at any ingredient you want to request importing
        </p>
    </div>
    <table id="customers" class="plr-15 mt-15 shadow-box">
        <tr>
            <th>Ingredient</th>
            <th>Unit price</th>
            <th>Quantity</th>
        </tr>

        <? if (isset($complete)) {
            echo $complete;
        } ?>

        <?php foreach ($ingredients as $ingredient):
    $current = $ingredient['Ingredient'];
    ?>
        <tr>
            <form method="post">
                <td><?php echo $current["name"]; ?></td>
                <td><?php echo "$" . $current["price_unit"]; ?></td>
                <td><input type="number" name="quantity[]" value="0" min="0" step="1" size="2" /></td>
                <input type="hidden" name="price[]" value="<?php echo '{$current[" price_unit"]}' ?>" />
                <?php endforeach?>
                <br>

            </form>
        </tr>
    </table>
    <input type="submit" value="Request" class="mt-15" />
</div>
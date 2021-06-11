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
            <h2>Ingredients list</h2>
        </div>
        <table id="orders" class="plr-15 mt-15 shadow-box">
            <tr>
                <th>Ingredient ID</th>
                <th>Ingredient name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
            </tr>

            <?php
            foreach ($items as $item) {
                echo "<tr>";
                echo "<td>{$item['Ingredient']['ingredient_id']}</td>";
                echo "<td>{$item['Ingredient']['name']}</td>";
                if ($item['Ingredient']['quantity'] < 5) {
                    echo "<td style='color:red;'>{$item['Ingredient']['quantity']}</td>";
                } else {
                    echo "<td>{$item['Ingredient']['quantity']}</td>";
                }
                echo "<td>{$item['Ingredient']['price_unit']}</td>";
                echo "</tr>";
            }
            ?>

        </table>

        </form>
    </div>
</div>
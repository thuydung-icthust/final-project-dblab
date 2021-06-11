<div class="content body-container">
    <div style="padding-top: 5%">
        <?php
for ($i = 0; $i < count($products); $i += 3) {
    echo "<div class='row card-container'>";
    for ($j = 1; $j <= 3; $j++) {
        $idx = $i + $j - 1;
        if ($idx < count($products)) {

            echo "<div class='col span-1-of-3 box card-home card-5'>";
            echo "<a href='/products/view/{$products[$idx]['Product']['product_id']}' style='color:white;'>";
            echo "<img src='{$products[$idx]['Product']['image_url']}' alt='Product image' />";
            echo "<h3><strong>{$products[$idx]['Product']['NAME']}</strong></h3>";
            echo "<div>Price: " . number_format($products[$idx]['Product']['price'], 0) . "đ</div>";
            echo "</a>";
            echo "</div>";

        }
    }
    echo "</div>";
}
?>

    </div>
</div>
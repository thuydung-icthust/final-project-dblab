<?php echo $html->includeCss("admin"); ?>
<div id="best-sellers-session" class="row best-sellers">
    <h2>BEST-SELLERS</h2>
    <p class="long-copy">
        Let see our best-sellers this week
    </p>
</div>

<div class="row best-sellers">
    <?php foreach ($admindata->best_sellers as $key => $best_seller): ?>
    <?php
if ($key % 3 == 0) {
    echo "<div class = row>";}
?>
    <div class="col span-1-of-3 box">
        <div class="product-card shadow-box">
            <div class="product-link">
                <?php echo $html->link($best_seller['Product']['NAME'], "/products/view/{$best_seller['Product']['product_id']}") ?>
                <?php echo "<div class='sold-count'>{$best_seller['A']['purchase_count']} sold!</div>" ?>
            </div>

            <div class="row center-inline-block">

                <img src="<?php echo $best_seller['Product']['image_url'] ?>" alt="Product image" class="product-img" />

            </div>
        </div>
    </div>
    <?php
if ($key % 3 == 2) {
    echo "</div>";
}

?>
    <?php endforeach?>
</div>
</div>
</header>

<section class="section-features js--section-features" id="revenue-session">
    <div class="row">
        <h2>REVENUE STATISTICS</h2>
        <p class="long-copy">
            Let see our revenue statistic of our restaurent, make some modification on strategy if needed
        </p>
    </div>
    <div class="row card-container">
        <div class="col span-1-of-3 box card card-1">
            <i class="ion-ios-infinite-outline icon-big"></i>
            <h3>DAILY REVENUE</h3>
            <?php
echo "<p class='money-amount'>{$admindata->revenues[0]} </p>";
echo "<div><i class='fas fa-level-up-alt inline-element '></i> {$admindata->increasing_amount[0]} %";
echo "<i class='fas fa-level-down-alt inline-element ml-15'></i> {$admindata->decreasing_amount[1]} %</div>";
?>
        </div>
        <div class="col span-1-of-3 box card card-2">
            <i class="ion-ios-stopwatch-outline icon-big"></i>
            <h3>WEEKLY REVENUE</h3>
            <?php
echo "<p class='money-amount'> {$admindata->revenues[1]} </p>";
echo "<div><i class='fas fa-level-up-alt inline-element'></i> {$admindata->increasing_amount[1]} %";
echo "<i class='fas fa-level-down-alt inline-element ml-15'></i> {$admindata->decreasing_amount[1]} %</div>";
?>
        </div>
        <div class="col span-1-of-3 box card card-3">
            <i class="ion-ios-nutrition-outline icon-big"></i>
            <h3>MONTHLY REVENUE</h3>
            <?php
echo "<p class='money-amount'> {$admindata->revenues[2]} </p>";
echo "<div><i class='fas fa-level-up-alt inline-element'></i> {$admindata->increasing_amount[2]} %";
echo "<i class='fas fa-level-down-alt inline-element ml-15'></i> {$admindata->decreasing_amount[1]} %</div>";
?>
        </div>
    </div>
</section>

<section class="section-testimonials js--section-features p-base" id="customer-sesion">
    <div class="row">
        <h2>FAVOURITE CUSTOMERS</h2>
        <p class="long-copy">
            Let see our favourite customers, great power comes with grear responsibility
        </p>
    </div>
    <table id="customers" class="plr-15 mt-15 shadow-box">
        <tr>
            <th>Username</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Total money</th>
        </tr>
        <?php foreach ($admindata->favourite_customers as $customer): ?>
        <?php
$cust = $customer['Favo_customer'];
echo "<tr>";
foreach ($cust as $attr):
    echo " <td>{$attr}</td>";
endforeach;
echo "</tr>";
?>
        <?php endforeach?>
    </table>

</section>
</body>

</html>
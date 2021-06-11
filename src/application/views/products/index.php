<div class="content body-container">
    <div style="display: flex; justify-content: center">
        <h2>BEST SELLERS</h2>
    </div>


    <div>
        <div>
            <?php foreach ($best_sellers as $key => $bs) : ?>
                <?php if ($key % 3 == 0) {
                    echo "<div class = 'row'>";
                }
                ?>
                <div class="col span-1-of-3 box card card-5 shadow-box">
                    <a style="color: white; font-size: 24px" href="<?php echo "/products/view/{$bs['Product']['product_id']}" ?>">
                        <div>
                            <p><?php echo $bs['Product']['NAME'] ?></p>
                            <img class="bestseller-img" src="<?php echo $bs['Product']['image_url'] ?>" alt="<?php echo $bs['Product']['NAME'] ?>" />

                        </div>
                    </a>
                </div>
                <?php if ($key % 3 == 2) {
                    echo "</div>";
                }
                ?>
            <?php endforeach ?>
        </div>
    </div>
    <?php if (isset($history)) { ?>
        <div style="display: flex; justify-content: center" class="mt-15">
            <h2>YOUR HISTORY</h2>
        </div>
        <div class="w-100">
            <div class="row">
                <?php foreach ($history as $key => $his) : ?>
                    <?php if ($key % 3 == 0) {
                        echo "<div class = 'row'>";
                    }
                    ?>
                    <div class="col span-1-of-3 box card card-6 shadow-box">
                        <a style="color: black; font-size: 24px;" href="<?php echo "/products/view/{$his['Product']['product_id']}" ?>">
                            <div>
                                <p><?php echo $his['Product']['NAME'] ?></p>
                                <img class="bestseller-img" src="<?php echo $his['Product']['image_url'] ?>" alt="<?php echo $his['Product']['NAME'] ?>" />

                            </div>
                        </a>
                    </div>
                    <?php if ($key % 3 == 2) {
                        echo "</div>";
                    }
                    ?>
                <?php endforeach ?>
            </div>
        </div>
    <?php } ?>
    <div id="menu" style="display: flex; justify-content: center" class="mt-15 p-base">
        <h2>MENU</h2>
    </div>
    <div>
        <div class="row">
            <?php foreach ($categories as $key => $value) : ?>
                <?php if ($value % 3 == 1) {
                    echo "<div class='row'>";
                }
                ?>
                <div class="col span-1-of-3 box card card-5 shadow-box">
                    <a style="color: white; font-size: 24px" href="<?php echo "/products/category/{$value}" ?>">
                        <div>
                            <p><?php echo $key ?></p>
                            <img class="bestseller-img" src="<?php echo $imgs[$key] ?>" alt="<?php echo $key ?>" />

                        </div>
                    </a>
                </div>
                <?php if ($value % 3 == 3) {
                    echo "</div>";
                }
                ?>
            <?php endforeach ?>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
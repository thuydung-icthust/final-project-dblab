<div class="body-container large-p-base" style="text-align: center">
    <div class="row shadow-box p-base bg-blur round-border">
        <img style="max-width: 25vw;" src="<?php echo $product['Product']['image_url'] ?>" alt="Product image" />
        <h2><strong><?php echo $product['Product']['NAME'] ?></strong></h2>
        <h3>Price: <?php echo number_format($product['Product']['price'], 0) ?>đ</h3>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $product['Product']['product_id'] ?>" />
            <input type="number" name="quantity" class="txt-input" placeholder="Quantity" min=1 />
            <input type="submit" name="submitBtn" class="btn-home" value="Add to Cart" />
        </form>
    </div>
</div>
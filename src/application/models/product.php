<?php

class Product extends VanillaModel
{
    public $categories = array(
        "CHICKEN" => 1,
        "DESSERT" => 2,
        "DRINKS" => 3,
        "RICE DISKS" => 4,
        "LIGHT FOOD" => 5,
        "BURGERS" => 6
    );

    public function getCategoryImg()
    {
        $imgs = array();
        foreach ($this->categories as $k => $v) {
            $pic = $this->custom("SELECT `image_url` FROM `products` WHERE `category`=$v LIMIT 1");
            if ($pic)
                $imgs[$k] = $pic[0]['Product']['image_url'];
            else
                $imgs[$k] = '';
        }

        return $imgs;
    }

    public function submitOrder($customer_id, $carts)
    {
        if ($customer_id) {
            $query = "CALL add_new_order($customer_id, @em_id, @ord_id);";
            $result = $this->custom($query);
            if (!$result)
                return false;

            $ord_result = $this->custom2("SELECT @ord_id as order_id;");
            if (!$ord_result)
                return false;

            $row = $ord_result->fetch_assoc();
            $ord_id = $row['order_id'];

            foreach ($carts as $k => $v) {
                $cart_item_query = "INSERT INTO `order_items`(
                    `product_id`,
                    `order_id`,
                    `quantity`,
                    `unit_price`
                )
                VALUES(
                    $k,
                    $ord_id,
                    {$v['quantity']},
                    {$v['price']}
                );";

                // echo $cart_item_query . "<br />";
                $res = $this->custom($cart_item_query);
                if (!$res)
                    return false;
            }
            return true;
        }

        return false;
    }

    public function get_best_sellers()
    {
        //return the best sellers of restaurant for the last 7 days
        $best_sellers_query = "SELECT * FROM `products`
                                INNER JOIN( 
                                    SELECT oi.product_id AS product_id,
                                           SUM(oi.quantity) AS purchase_count
                                    FROM
                                        order_items AS oi
                                    INNER JOIN `orders` AS o
                                    ON oi.order_id = o.order_id
                                    WHERE TIMESTAMPDIFF(DAY, o.created_at, NOW()) <= 7
                                    GROUP BY oi.product_id) AS a
                                    ON products.product_id = a.product_id
                                    ORDER BY a.purchase_count DESC
                                    LIMIT 6;";

        $best_sellers = $this->custom($best_sellers_query);
        // console_log($best_sellers);
        if ($best_sellers)
            return $best_sellers;
        else
            return false;
    }

    public function get_history($cus_id)
    {
        //return the mostly bought items of a customer
        $history_query = "SELECT * FROM `products`
                            INNER JOIN( 
                                SELECT oi.product_id AS product_id,
                                    SUM(oi.quantity) AS purchase_count
                                FROM
                                    order_items AS oi
                                INNER JOIN `orders` AS o
                                ON oi.order_id = o.order_id
                                WHERE TIMESTAMPDIFF(DAY, o.created_at, NOW()) <= 7
                                AND o.customer_id = $cus_id
                                GROUP BY oi.product_id) AS a
                                ON products.product_id = a.product_id
                                ORDER BY a.purchase_count DESC
                                LIMIT 6;";

        $history = $this->custom($history_query);

        if ($history)
            return $history;
        else
            return false;
    }
}

<?php

class Employee extends VanillaModel
{
    public function importRequest($employee_id, $items, $prices)
    {
        $query = "CALL add_new_import($employee_id, @req_id);";
        $result = $this->custom($query);
        if (!$result) {
            return false;
        }
        $req_result = $this->custom2("SELECT @req_id as req_id;");
        if (!$req_result) {
            return false;
        }

        $row = $req_result->fetch_assoc();
        $req_id = $row['req_id'];
        $count = count($items);
        for ($i = 1; $i <= $count; $i++) {
            $item = $items[$i - 1];
            $price = $prices[$i - 1];
            if ($item <= 0) {
                continue;
            }
            $import_item_query = "INSERT INTO `import_items`(
                `request_id`,
                `ingredient_id`,
                `quantity`,
                `unit_price`
            )
            VALUES(
                $req_id,
                $i,
                $item,
                $price
            );";

            $res = $this->custom($import_item_query);
            if (!$res) {
                return false;
            }
        }
        return true;
    }


    public function getOrderDetail($id)
    {
        $id = $this->sanitize($id);
        $items = $this->custom("SELECT * FROM
        (SELECT products.product_id as `product_id`, `order_id`, `quantity`, `price`, `name`  FROM `order_items`
            INNER JOIN `products` ON (order_items.product_id = products.product_id)
            WHERE `order_id` = $id) AS order_detail;");
        return $items;
    }

    public function getOrderIngredients($id)
    {
        $id = $this->sanitize($id);
        $query = "SELECT * FROM (SELECT ing.ingredient_id, ing.name, SUM(pi.ingredient_quantity * ord.quantity) AS `quantity`, ing.stock_quantity FROM 
        (SELECT product_id, order_id, quantity FROM order_items WHERE order_id=$id) ord
        INNER JOIN 
        (SELECT product_id, ingredient_id, quantity AS `ingredient_quantity` FROM product_include) pi
        ON pi.product_id = ord.product_id 
        INNER JOIN (SELECT `name`, quantity AS `stock_quantity`, ingredient_id FROM ingredients) ing 
        ON pi.ingredient_id = ing.ingredient_id 
        GROUP BY pi.ingredient_id) AS order_ingredient;";
        // echo $query;
        $ingres = $this->custom($query);
        return $ingres;
    }
}

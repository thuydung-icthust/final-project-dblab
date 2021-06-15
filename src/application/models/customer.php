<?php

class Customer extends VanillaModel {
    public function addCustomer($username, $password, $name, $address, $phone) {
        $query = "INSERT INTO `customers` (
            `username`,
            `password`,
            `name`,
            `phone`,
            `address`
        )
        VALUES(
            '$username',
            '$password',
            '$name',
            '$phone',
            '$address'
        )";
        $result = $this->custom($query);
        return $result;
    }

    //return true if exist
    public function checkExistUsername($username) {
        $query = "SELECT * FROM `customers` WHERE `username` = '$username'";
        $result = $this->custom($query);
        return $result;
    }

    public function getOrderList($id) {
        $id = $this->sanitize($id);
        $query = "SELECT * FROM `orders`
        WHERE  `customer_id` = $id";
        echo $query;
        $orders = $this->custom($query);
        return $orders;
    }

    public function getOrderDetail($id) {
        $id = $this->sanitize($id);
        $items = $this->custom("SELECT * FROM
        (SELECT products.product_id as `product_id`, `order_id`, `quantity`, `price`, `name`  FROM `order_items`
            INNER JOIN `products` ON (order_items.product_id = products.product_id)
            WHERE `order_id` = $id) AS order_detail;");
        return $items;
    }
}

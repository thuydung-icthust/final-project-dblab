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
}

<?php

class adminData
{
    public $revenues = array();
    public $increasing_amount = array();
    public $decreasing_amount = array();
    public $best_sellers;
    public $favourite_customers;

    public function __construct($revenue, $increasing_amount, $decreasing_amount, $best_sellers, $favourite_customers)
    {
        $this->revenues = $revenue;
        $this->increasing_amount = $increasing_amount;
        $this->decreasing_amount = $decreasing_amount;
        $this->best_sellers = $best_sellers;
        $this->favourite_customers = $favourite_customers;
        // $this->increasing = $increasing;
    }
}

class Admin extends VanillaModel
{
    public $abstract = true;

    public function getBestSeller()
    {
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
            LIMIT 5;";

        $best_sellers = $this->custom($best_sellers_query);
        // console_log($best_sellers);
        return $best_sellers;
    }

    public function getFavouriteCustomers()
    {
        $query = "SELECT
        *
        from
        (SELECT
                cust.username,
                cust.name,
                cust.phone,
                cust.address,
                SUM(oi.unit_price * oi.quantity) as total_money
            FROM
                customers AS cust
            INNER JOIN orders AS o
            ON
                cust.customer_id = o.customer_id
            INNER JOIN order_items AS oi
            ON
                o.order_id = oi.order_id
            GROUP BY
                cust.customer_id
            ORDER BY
                SUM(oi.unit_price * oi.quantity)
            DESC
            LIMIT 10) as favo_customer";
        $cust = $this->custom($query);
        // console_log($best_sellers);
        return $cust;
    }

    public function getRevenue()
    {
        $query_week = "SELECT
        week_revenue
    FROM
        (
        SELECT
            SUM(unit_price * quantity) AS week_revenue
        FROM
            order_items
        WHERE
            order_id IN(
            SELECT
                order_id
            FROM
                orders
            WHERE
                TIMESTAMPDIFF(DAY, orders.created_at, NOW()) <= 7)
        ) AS week_report";

        $query_day = "SELECT
        day_revenue
    FROM
        (
        SELECT
            SUM(unit_price * quantity) AS day_revenue
        FROM
            order_items
        WHERE
            order_id IN(
            SELECT
                order_id
            FROM
                orders
            WHERE
                TIMESTAMPDIFF(DAY, orders.created_at, NOW()) <= 1)
        ) AS day_report";

        $query_month = "SELECT
        month_revenue
    FROM
        (
        SELECT
            SUM(unit_price * quantity) AS month_revenue
        FROM
            order_items
        WHERE
            order_id IN(
            SELECT
                order_id
            FROM
                orders
            WHERE
                TIMESTAMPDIFF(MONTH, orders.created_at, NOW()) <= 1)
        ) AS month_report";

        $day_rev = $this->custom($query_day);
        $month_rev = $this->custom($query_month);
        $week_rev = $this->custom($query_week);
        return [$day_rev[0]['Day_report']['day_revenue'], $week_rev[0]['Week_report']['week_revenue'], $month_rev[0]['Month_report']['month_revenue']];
    }

    public function getPrevRevenue()
    {
        $query_week = "SELECT
        week_revenue
    FROM
        (
        SELECT
            SUM(unit_price * quantity) AS week_revenue
        FROM
            order_items
        WHERE
            order_id IN(
            SELECT
                order_id
            FROM
                orders
            WHERE
                TIMESTAMPDIFF(DAY, orders.created_at, NOW()) <= 14) AND TIMESTAMPDIFF(DAY, orders.created_at, NOW()) >7 )
        ) AS week_report";

        $query_day = "SELECT
        day_revenue
    FROM
        (
        SELECT
            SUM(unit_price * quantity) AS day_revenue
        FROM
            order_items
        WHERE
            order_id IN(
            SELECT
                order_id
            FROM
                orders
            WHERE
                TIMESTAMPDIFF(DAY, orders.created_at, NOW()) > 1) AND TIMESTAMPDIFF(DAY, orders.created_at, NOW()) <= 2)
        ) AS day_report";

        $query_month = "SELECT
        month_revenue
    FROM
        (
        SELECT
            SUM(unit_price * quantity) AS month_revenue
        FROM
            order_items
        WHERE
            order_id IN(
            SELECT
                order_id
            FROM
                orders
            WHERE
                TIMESTAMPDIFF(MONTH, orders.created_at, NOW()) > 1) AND TIMESTAMPDIFF(MONTH, orders.created_at, NOW()) <= 2)
        ) AS month_report";

        $day_rev = $this->custom($query_day);
        if (!$day_rev) {
            $day_rev = 0;
        } else {
            $day_rev = $day_rev[0]['Day_report']['day_revenue'];
        }

        $week_rev = $this->custom($query_week);
        if (!$week_rev) {
            $week_rev = 0;
        } else {
            $week_rev = $week_rev[0]['Week_report']['week_revenue'];
        }

        $month_rev = $this->custom($query_month);
        if (!$month_rev) {
            $month_rev = 0;
        } else {
            $month_rev = $month_rev[0]['Month_report']['month_revenue'];
        }

        return [$day_rev, $week_rev, $month_rev];

        // return [$day_rev[0]['Day_report']['day_revenue']?$day_rev[0]['Day_report']['day_revenue']: 0, $week_rev[0]['Week_report']['week_revenue']? $week_rev[0]['Week_report']['week_revenue'] :0 , $month_rev[0]['Month_report']['month_revenue']? $month_rev[0]['Month_report']['month_revenue']: 0];
    }

    public function getDifference()
    {
        $reves = $this->getRevenue();
        $prev_reves = $this->getPrevRevenue();
        $retval_inc = array();
        $retval_dec = array();
        foreach ($reves as $key => $rev) {
            $diff = $rev - $prev_reves[$key];
            if ($diff > 0) {
                if ($prev_reves[$key] == 0) {
                    $retval_inc[$key] = 100;
                    $retval_dec[$key] = 0;
                } else {
                    $retval_inc[$key] = ($diff) / $prev_reves[$key] * 100;
                    $retval_dec[$key] = 0;
                }
            } else {
                $retval_inc[$key] = 0;
                $retval_dec[$key] = ($diff) / $prev_reves[$key] * 100;
            }
        }

        return [$retval_inc, $retval_dec];
    }

    public function getData()
    {
        $revenues_ = $this->getRevenue();
        $best_sellers_ = $this->getBestSeller();
        $favourite_customers_ = $this->getFavouriteCustomers();
        $difference = $this->getDifference();
        return new adminData($revenues_, $difference[0], $difference[1], $best_sellers_, $favourite_customers_);
    }

    public function getRequests()
    {
        $query = "SELECT * from importment_requests where `status` = 0";
        return $this->custom($query);
    }

    public function getRequestDetail($id)
    {
        $request_id = $this->sanitize($id);
        $items = $this->custom("SELECT * FROM
        (SELECT
            import_items.request_id as `request_id`, ingredients.ingredient_id as `id`, ingredients.name as `name`, import_items.unit_price as `unit_price`, import_items.quantity as `qty_request`, ingredients.quantity as `qty_remain`
        FROM
            ingredients
        INNER JOIN `import_items` ON ingredients.ingredient_id = import_items.ingredient_id
        WHERE
            `request_id` = {$id}) as request_detail");
        return $items;
    }

    public function processRequest($type, $list, $request_id)
    {
        if ($type == 0) {
            $this->custom("UPDATE `importment_requests` SET `status` = 1 where `request_id` = {$request_id}");

        } else {
            foreach ($list as $item) {
                $this->custom("UPDATE `ingredients` SET `quantity` = `quantity` + {$item[1]} where `ingredient_id` = {$item[0]}");
            }
            $this->custom("UPDATE `importment_requests` SET `status` = 1 where `request_id` = {$request_id}");
        }
    }

    // public function import($id, $qty) {
    //     if($type == 0) {
    //         $this->update("UPDATE `importment_requests` SET `status` = 1 where `request_id` = {$request_id}");

    //     }
    //     else {
    //         foreach($list as $item) {
    //             $this->update("UPDATE `ingredients` SET `quantity` = `quantity` + {$item['qty']} where `ingredient_id` = {$item['id']}");
    //         }
    //         $this->update("UPDATE `importment_requests` SET `status` = 1 where `request_id` = {$request_id}");
    //     }
    // }

    public function checkAdmin()
    {
        if (isset($_SESSION["isManager"]) && $_SESSION["isManager"] === true) {
            return true;
        }
        return false;
    }
}
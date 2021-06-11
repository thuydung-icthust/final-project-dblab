<?php

class ProductsController extends VanillaController
{
    function index()
    {
        session_start();
        // echo "Login status: " . $_SESSION['loggedIn'];
        // echo "Boolean echo: " . true;
        $best_sellers = $this->Product->get_best_sellers();
        if ($best_sellers)
            $this->setTemplateVariable('best_sellers', $best_sellers);

        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
            $history = $this->Product->get_history($_SESSION['id']);
            if ($history)
                $this->setTemplateVariable('history', $history);
        }
        // $products = $this->Product->custom("SELECT `product_id`, `NAME` FROM `products`");
        $categories = $this->Product->categories;
        $imgs = $this->Product->getCategoryImg();
        if (!$categories) {
            return false;
        }

        $this->setTemplateVariable('categories', $categories);
        $this->setTemplateVariable('imgs', $imgs);

        $this->registerCustomCssFiles('home');
        return true;
    }

    function view($id = null)
    {
        session_start();
        // session_destroy();
        if (!empty($_POST["submitBtn"])) {

            $itemArray = array($_POST["id"] => $_POST["quantity"]);

            if (!isset($_SESSION["cart_item"])) {
                $_SESSION["cart_item"] = $itemArray;
            } else {
                // echo "session already have <br/>";
                if (in_array($_POST['id'], array_keys($_SESSION["cart_item"]))) {
                    // echo "session has this id <br/>";
                    $_SESSION["cart_item"][$_POST['id']] += $_POST["quantity"];
                } else {
                    // echo "merge w array item<br/>";
                    $_SESSION["cart_item"] = $_SESSION["cart_item"] + $itemArray;
                }
            }
            if (!isset($_SESSION["item_count"]))
                $_SESSION["item_count"]  = $_POST["quantity"];
            else
                $_SESSION["item_count"]  += $_POST["quantity"];

            // foreach ($_SESSION["cart_item"] as $k => $v) {
            //     echo "key: " . $k . "<br/>";
            //     echo "val: " . $v . "<br/>";
            // }
            // echo $_SESSION["cart_item"][$_POST["id"]];
            // echo $_POST["id"];
        }

        $product_id = $this->Product->sanitize($id);
        $products = $this->Product->custom("SELECT * FROM `products` WHERE `product_id` = {$product_id}");

        if (!$products) {
            return false;
        }

        if (count($products) > 0) {
            $this->setTemplateVariable('product', $products[0]);
        } else {
            return false;
        }

        $this->registerCustomCssFiles('home');
        return true;
    }

    function category($id = null)
    {
        session_start();

        $cate_id = $this->Product->sanitize($id);
        $products = $this->Product->custom("SELECT * FROM `products` WHERE `category` = {$cate_id}");

        if (!$products) {
            return false;
        }

        if (count($products) > 0) {
            $this->setTemplateVariable('products', $products);
        } else {
            return false;
        }

        $this->registerCustomCssFiles('home');
        return true;
    }

    function order()
    {
        session_start();

        $products = array();
        if (isset($_SESSION['item_count'])) {
            foreach ($_SESSION['cart_item'] as $k => $v) {
                $prod = $this->Product->custom("SELECT * FROM `products` WHERE `product_id` = {$k} LIMIT 1");
                // echo $v . "<br/>";
                if ($prod) {
                    $cart_item = array($k => array('name' => $prod[0]['Product']['NAME'], 'image_url' => $prod[0]['Product']['image_url'], 'price' => $prod[0]['Product']['price'], 'quantity' => $v));
                    $products = $products + $cart_item;
                }
            }
        }

        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts = parse_url($actual_link);
        if (array_key_exists('query', $parts)) {
            parse_str($parts['query'], $params);
            switch ($params['action']) {
                case 'empty':
                    unset($_SESSION["cart_item"]);
                    unset($_SESSION["item_count"]);
                    break;

                case 'remove':
                    $id = $params['id'];
                    if (isset($_SESSION['cart_item'])) {
                        $_SESSION['item_count'] -= $_SESSION['cart_item'][$id];
                        unset($_SESSION['cart_item'][$id]);
                        unset($products[$id]);
                        if (empty($_SESSION['cart_item']))
                            unset($_SESSION['cart_item']);
                    }
                    break;

                case 'submit':
                    //add to database
                    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] = false || (isset($_SESSION['isEmployee']) && $_SESSION['isEmployee'])) {
                        header('Location: /customer/login');
                        //redirect to prom user login
                        break;
                    } else {
                        if (!isset($_SESSION['cart_item'])) {
                            http_response_code(403);
                            exit();
                        }
                        if ($this->Product->submitOrder($_SESSION["id"], $products)) {
                            // echo "hehe enter here <br/>";
                            $msg = "Order successfully!";
                            echo "<script type='text/javascript'>alert('$msg');</script>";
                            unset($products);
                            unset($_SESSION["cart_item"]);
                            unset($_SESSION["item_count"]);
                            $_SESSION["loggedIn"] = true;
                        } else
                            http_response_code(500);
                    }
                    break;
            }
        }

        if (!isset($_SESSION['item_count']))
            $products = array();

        $this->setTemplateVariable('products', $products);
        $this->registerCustomCssFiles('order');
        return true;
    }
}

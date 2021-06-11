<?php

class EmployeesController extends VanillaController
{
    function beforeAction()
    {
    }

    function login()
    {
        session_start();

        // Check if the user is logged in, otherwise redirect to login page
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
            if (isset($_SESSION["isEmployee"]) && $_SESSION["isEmployee"] === true) {

                if (isset($_SESSION["isManager"]) && $_SESSION["isManager"] === true) {
                    header("location: /admin");
                    exit();
                }
                header("location: /employees/processOrder");
                exit();
            } else {
                header("location: /");
                exit;
            }
        }
        // Define variables and initialize with empty values
        $username = $password = "";
        $err = $login_err = "";

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Check if username is empty
            if (empty(trim($_POST["username"])) || empty(trim($_POST["password"]))) {
                $err = "Username and password must not be blank";
                $this->setTemplateVariable('err', $err);
            } else {
                $username = trim($_POST["username"]);
                $password = trim($_POST["password"]);
            }

            if (empty($err)) {
                //login
                $username = $this->Employee->sanitize($username);
                $password = $this->Employee->sanitize($password);
                $sql = "SELECT * FROM `employees` WHERE `username` = '{$username}' AND `password` = '{$password}'";
                $query = $this->Employee->custom($sql);
                if (!$query) {
                    $login_err = "Invalid username or password.";
                    // echo "$login_err";
                    $this->setTemplateVariable('err', $login_err);
                } else {
                    $_SESSION["loggedIn"] = true;
                    $_SESSION["isEmployee"] = true;
                    $_SESSION["id"] = $query[0]['Employee']['employee_id'];
                    $_SESSION["username"] = $username;
                    $msg = 'Login succeeded!';
                    echo "<script type='text/javascript'>alert('$msg');</script>";

                    if ($query[0]['Employee']['is_manager']) {
                        $_SESSION["isManager"] = true;
                        header("Refresh: 2 url=/admin", true);

                        exit();
                    } else {
                        $_SESSION["isManager"] = false;
                        header("Refresh: 2 url=/employees/processOrder", true);

                        exit();
                    }
                }
            }
        }
        return true;
    }

    function index()
    {
        session_start();
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
            if (isset($_SESSION["isEmployee"]) && $_SESSION["isEmployee"] === true) {
                //do work
                return true;
            } else {
                //now unset the value of customer session
                //redirect to employee login
                unset($_SESSION["loggedIn"]);
                header("Location: /employees/login");
                exit();
            }
        } else {
            header("Location: /employees/login");
            exit();
        }
    }

    function import()
    {
        session_start();

        if (isset($_SESSION['isEmployee']) && $_SESSION['isEmployee'] === true) {
            $complete = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $items = $_POST['quantity'];
                $flag = 0;
                foreach ($items as $item) {
                    if ($item > 0) {
                        $flag = 1;
                        break;
                    }
                }
                if ($flag == 0) {
                    $complete = "You can't order nothing!\n";
                    $this->setTemplateVariable('complete', $complete);
                } else {
                    $prices = $_POST['price'];
                    if ($this->Employee->importRequest($_SESSION["id"], $items, $prices)) {
                        $complete = "Order completed!";
                        $this->setTemplateVariable('complete', $complete);
                    } else {
                        http_response_code(500);
                    }
                }
            }
            $ingredients = $this->Employee->custom("SELECT * FROM `ingredients`");

            $this->setTemplateVariable('ingredients', $ingredients);

            return true;
        } else {
            header("location: /employees/login");
            exit();
        }
    }

    function processOrder()
    {
        session_start();
        // echo $_SESSION['isManager'];

        // Check if the user is logged in, otherwise redirect to login page
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
            if (isset($_SESSION["isEmployee"]) && $_SESSION["isEmployee"] === true) {

                // header("location: /employees/index.php");
                // exit;
                // echo "is employee!\n";
            } else {
                header("location: /");
                exit;
            }
        } else {
            header("location: /employees/login");
            exit();
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['orders'])) {
                $orders = $_POST['orders'];
                foreach ($orders as $order) {
                    // echo "$order";
                    $query = "UPDATE `orders` SET `status` = 1 WHERE `order_id` = {$order}";
                    // echo "$query";
                    $update = $this->Employee->custom($query);
                    $message = '';
                    if ($update) {
                        $message = 'Order processing completed!';
                    } else {
                        $message = 'Order processing failed';
                    }
                    $this->setTemplateVariable('message', $message);
                }
            }
        }
        $id = $_SESSION['id'];
        $products = array();
        $orders = $this->Employee->custom("SELECT * FROM `orders` WHERE `status` = 0 AND `employee_id` = $id");
        if ($orders) {
            // do stuff here
        }
        $this->setTemplateVariable('orders', $orders);

        return true;
    }


    function orderDetail($id = null)
    {
        session_start();
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
            if (isset($_SESSION["isEmployee"]) && $_SESSION["isEmployee"] === true) {
                // do work
                $items = $this->Employee->getOrderDetail($id);
                $this->setTemplateVariable('items', $items);
                return true;
            } else {
                header("Location: /");
                exit();
            }
        } else {
            header("Location: /employees/login");
            exit();
        }
    }

    function logOut()
    {
        session_start();
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
            $_SESSION["loggedIn"] = false;
            $_SESSION["isEmployee"] = false;
            $_SESSION["isManager"] = false;
            $_SESSION["id"] = "";
            $_SESSION["username"] = "";
        }
        header("location: /employees/login");
        exit();
    }

    function view($id = null)
    {
    }


    function afterAction()
    {
    }

    function viewstock()
    {
        session_start();
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
            if (isset($_SESSION["isEmployee"]) && $_SESSION["isEmployee"] === true) {
                // do work
                $result = $this->Employee->custom("SELECT * FROM `ingredients`");
                if (!$result) {
                    http_response_code(403);
                    exit();
                }
                $this->setTemplateVariable('items', $result);
                return true;
            } else {
                header("Location: /");
                exit();
            }
        } else {
            header("Location: /employees/login");
            exit();
        }
    }
}

<?php
class CustomerController extends VanillaController {
    function login() {
        session_start();

        // Define variables and initialize with empty values
        $username = $password = "";
        $err = $login_err = "";

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Check if username is empty
            if (empty(trim($_POST["username"])) || empty(trim($_POST["password"]))) {
                $err = "Username and password must not be left blank.";
                $this->setTemplateVariable('err', $err);
            } else {
                $username = trim($_POST["username"]);
                $password = trim($_POST["password"]);
            }

            if (empty($username_err) && empty($password_err)) {
                //login
                $username = $this->Customer->sanitize($username);
                $password = $this->Customer->sanitize($password);
                $sql = "SELECT * FROM `customers` WHERE `username` = '{$username}' AND `password` = '{$password}'";
                $query = $this->Customer->custom($sql);
                if (!$query) {
                    $login_err = "Invalid username or password.";
                    $this->setTemplateVariable('err', $login_err);
                } else {
                    $_SESSION["loggedIn"] = true;
                    $_SESSION["isCustomer"] = true;
                    $_SESSION["id"] = $query[0]['Customer']['customer_id'];
                    $_SESSION["username"] = $username;
                    $msg = "Login succeeded!";
                    echo "<script type='text/javascript'>alert('$msg');</script>";

                    header("Refresh: 2 url=/", true);

                    exit;
                }
            }
        }
        return true;
    }

    function logOut() {
        session_start();
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
            unset($_SESSION["loggedIn"]);
            unset($_SESSION["isCustomer"]);
            unset($_SESSION["isEmployee"]);
            unset($_SESSION["isManager"]);
            unset($_SESSION["id"]);
            unset($_SESSION["username"]);
        }
        header("location: /customer/login");
        exit();
    }

    function register() {
        session_start();
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
            header("location: /");
            exit();
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $err = "";
            if (empty(trim($_POST["username"])) || empty(trim($_POST["password"])) || empty(trim($_POST["name"])) || empty(trim($_POST["address"])) || empty(trim($_POST["phone"]))) {
                $err = "No field should be left blank!";
                $this->setTemplateVariable('err', $err);
            } else {
                $username = $this->Customer->sanitize(trim($_POST["username"]));
                $password = $this->Customer->sanitize(trim($_POST["password"]));
                $name = $this->Customer->sanitize(trim($_POST["name"]));
                $address = $this->Customer->sanitize(trim($_POST["address"]));
                $phone = $this->Customer->sanitize(trim($_POST["phone"]));
                if ($this->Customer->checkExistUsername($username)) {
                    $err = "Username already existed! Please try another one!";
                    $this->setTemplateVariable('err', $err);
                } else {
                    if ($this->Customer->addCustomer($username, $password, $name, $address, $phone)) {
                        $msg = "Register succeeded!";
                        echo "<script type='text/javascript'>alert('$msg');</script>";
                        header("Refresh: 2 url=/customer/login", true);
                        exit();
                    } else {
                        $err = "Something went wrong! Please try again later";
                        $this->setTemplateVariable('err', $err);
                    }
                }
            }
        }
        return true;
    }
}

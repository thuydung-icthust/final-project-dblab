
<?php

class AdminController extends VanillaController
{
    function beforeAction()
    {
    }

    function index()
    {
        session_start();
        if (!$this->Admin->checkAdmin()) {
            header("Location: /employees/login");
            exit();
        }
        // $this->doNotRenderHeader = true;

        // $products = $this->Product->custom("SELECT `product_id`, `NAME` FROM `products`");

        // $this->set_template_variable('admin', );
        $admindata = $this->Admin->getData();
        $this->setTemplateVariable('admindata', $admindata);
        return true;
    }

    function view($id = null)
    {
        $product_id = $this->Product->sanitize($id);
        $products = $this->Product->custom("SELECT * FROM `products` WHERE `product_id` = {$product_id}");
        // if (count($products) > 0) {
        //     $this->set_template_variable('', $products[0]);
        // } else {
            
        // }
        
    }

    function requests() {
        session_start();
        if (!$this->Admin->checkAdmin()) {
            header("Location: /employees/login");
            exit();
        }
        $requests = $this->Admin->getRequests();
       
        $this->setTemplateVariable('requests', $requests);
        return true;
    }

    function requestDetail($id = null) {
        session_start();
        if (!$this->Admin->checkAdmin()) {
            header("Location: /employees/login");
            exit();
        }

        $request_detail = $this->Admin->getRequestDetail($id);
        $this->setTemplateVariable('request_detail', $request_detail);
        return true;

    }

    function logOut() {
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

    function processRequest() {
        function console_log_($output, $with_script_tags = true)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
            ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }
        echo "This handle the form <br/>";
        console_log_($_POST['id']);
        $request_id = $_POST['id'];
        $param_list = [];
        if(isset($_POST['cat'])) {
            $params = $_POST['cat'];
            console_log_($params);
            foreach($params as $param) {
                $parts = [];
                $tok = strtok($param, ",");
                while ($tok !== false) {
                    $parts[] = $tok;
                    $tok = strtok(",");
                    }
                console_log_($parts);
                $param_list[] = $parts;
            }
            $this->Admin->processRequest(1, $param_list, $request_id);
            // $param = strtok($params[0], ",");
            // console_log_($param);
        }
        else {
            $this->Admin->processRequest(0, null, $request_id);
        }
        // $this->Admin->processRequest($type, $list, $request_id);
        header("location: /admin/requests");
        exit();
    }


   
    function afterAction()
    {
    }
}

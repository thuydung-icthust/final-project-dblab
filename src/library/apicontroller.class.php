<?php

class ApiController
{
    protected $_controllerName;
    protected $_action;
    protected $_queryString;

    protected $_requestData;

    function __construct($controllerName, $action, $queryString)
    {
        global $inflect;

        $this->_controllerName = $controllerName;
        $this->_action = $action;
        $this->_queryString = $queryString;

        $modelClassName = ucfirst($inflect->singularize($controllerName));
        $this->$modelClassName = new $modelClassName;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->_requestData = $_POST;
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $requestUri = $_SERVER['REQUEST_URI'];
            $queryString = parse_url($requestUri, PHP_URL_QUERY);
            parse_str($queryString, $this->_requestData);
        } else {
            $this->_requestData = array();
        }
    }

    protected function beforeAction()
    {
    }

    protected function afterAction()
    {
    }

    function execute()
    {
        $this->beforeAction();

        $result = call_user_func_array(array($this, $this->_action), $this->_queryString);
        if ($result) {
            header("Content-Type: application/json; charset=UTF-8");
            echo json_encode($result);
        } else {
            http_response_code(400);
        }

        $this->afterAction();
    }
}

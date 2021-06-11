<?php

/** Check if environment is development and display errors **/

function setReporting()
{
    if (DEVELOPMENT_ENVIRONMENT == true) {
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors', 'Off');
        ini_set('log_errors', 'On');
        ini_set('error_log', MACHINE_PHP_TMP . DS . 'logs' . DS . 'error.log');
    }
}

/** Check for Magic Quotes and remove them **/

function stripSlashesDeep($value)
{
    $value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
    return $value;
}

function removeMagicQuotes()
{
    $_GET    = stripSlashesDeep($_GET);
    $_POST   = stripSlashesDeep($_POST);
    $_COOKIE = stripSlashesDeep($_COOKIE);
}

/** Check register globals and remove them **/

function unregisterGlobals()
{
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}

/** Routing **/

function routeURL($url)
{
    global $routing;

    foreach ($routing as $pattern => $result) {
        if (preg_match($pattern, $url)) {
            return preg_replace($pattern, $result, $url);
        }
    }

    return ($url);
}

/** Main Call Function **/

function callHook()
{
    global $url;
    global $default;

    // $queryString = array();

    // if (!isset($url)) {
    //     $controllerName = $default['controller'];
    //     $action = $default['action'];
    // } else {
    //     $url = routeURL($url);
    //     $urlArray = explode("/", $url);

    //     if ($urlArray[0] === 'api') {
    //         $isApi = true;
    //         array_shift($urlArray);
    //     }

    //     // Try to extract controller name
    //     if (isset($urlArray[0])) {
    //         $controllerName = $urlArray[0];

    //         array_shift($urlArray);

    //         // Try to extract action
    //         if (isset($urlArray[0])) {
    //             $action = $urlArray[0];

    //             array_shift($urlArray);
    //         } else {
    //             $action = 'index'; // Default Action
    //         }
    //         $queryString = $urlArray;
    //     } else {
    //         exitWithError();
    //     }
    // }
    $urlComponents = parseUrl($url, $default);
    if (!$urlComponents) {
        exitWithError();
    }

    $controllerName = $urlComponents['controllerName'];
    $action = $urlComponents['action'];
    $queryString = $urlComponents['queryString'];
    $isApi = $urlComponents['isApi'];

    if (!checkControllerName($controllerName, $isApi)) {
        exitWithError();
    }

    if ($isApi) {
        $controllerClassName = ucfirst($controllerName) . 'ApiController';
    } else {
        $controllerClassName = ucfirst($controllerName) . 'Controller';
    }

    if (method_exists($controllerClassName, $action)) {
        $controller = new $controllerClassName($controllerName, $action, $queryString);
        call_user_func_array(array($controller, 'execute'), array());
    } else {
        exitWithError();
    }
}

function parseUrl($url, array $default)
{
    $components = array(
        'controllerName' => $default['controller'],
        'action' => $default['action'],
        'queryString' => array(),
        'isApi' => false
    );

    if (!isset($url)) {
        return $components;
    }

    $url = routeURL($url);
    $urlArray = explode("/", $url);

    if ($urlArray[0] === 'api') {
        $components['isApi'] = true;
        array_shift($urlArray);

        // Check for empty controller name
        if (!isset($urlArray[0])) {
            return false;
        }

        $components['controllerName'] = $urlArray[0];
        array_shift($urlArray);

        // Check for empty action
        if (!isset($urlArray[0])) {
            return false;
        }

        $components['action'] = $urlArray[0];
        array_shift($urlArray);

        $components['queryString'] = $urlArray;
    } else {

        // Check for controller name
        if (isset($urlArray[0])) {
            $components['controllerName'] = $urlArray[0];
            array_shift($urlArray);

            // Check for action
            if (isset($urlArray[0])) {
                $components['action'] = $urlArray[0];
                array_shift($urlArray);

                $components['queryString'] = $urlArray;
            }
        }
    }

    return $components;
}

function checkControllerName($controllerName, $isApi)
{
    if ($isApi) {
        return file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . "{$controllerName}apicontroller" . '.php');
    } else {
        return file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . "{$controllerName}controller" . '.php');
    }
}

function exitWithError()
{
    http_response_code(404);
    die();
}


/** Autoload any classes that are required **/

spl_autoload_register(function ($className) {
    if (file_exists(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php')) {
        // library/*.class.php
        require_once(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php');
    } else if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
        // application/controllers/*.php
        require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php');
    } else if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php')) {
        // application/models/*.php
        require_once(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php');
    } else {
        exitWithError();
    }
});


/** GZip Output **/

function gzipOutput()
{
    $ua = $_SERVER['HTTP_USER_AGENT'];

    if (
        0 !== strpos($ua, 'Mozilla/4.0 (compatible; MSIE ')
        || false !== strpos($ua, 'Opera')
    ) {
        return false;
    }

    $version = (float)substr($ua, 30);
    return ($version < 6
        || ($version == 6  && false === strpos($ua, 'SV1')));
}

/** Get Required Files **/

gzipOutput() || ob_start("ob_gzhandler");


$cache = new Cache();
$inflect = new Inflection();

setReporting();
removeMagicQuotes();
unregisterGlobals();
callHook();

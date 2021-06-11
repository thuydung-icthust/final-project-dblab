<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('MACHINE_PHP_TMP', '/tmp' . DS . 'php');

if (isset($_GET['url'])) {
    $url = $_GET['url'];
}

require_once(ROOT . DS . 'library' . DS . 'bootstrap.php');

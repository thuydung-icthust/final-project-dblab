<?php
class Template
{
    const CUSTOM_CSS_FILES = "_customCssFiles";

    protected $variables = array();
    protected $_controller;
    protected $_action;

    function __construct($controller, $action)
    {
        $this->_controller = $controller;
        $this->_action = $action;

        $this->set(Template::CUSTOM_CSS_FILES, array());
    }

    /** Set Variables **/

    function set($name, $value)
    {
        $this->variables[$name] = $value;
    }

    function registerCustomCssFiles(string ...$filePaths) {
        array_push($this->variables[Template::CUSTOM_CSS_FILES], ...$filePaths);
    }

    /** Display Template **/

    function render($doNotRenderHeader = false)
    {
        $html = new HTML;
        extract($this->variables);

        if ($doNotRenderHeader === false) {

            if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'header.php')) {
                include(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'header.php');
            } else {
                include(ROOT . DS . 'application' . DS . 'views' . DS . 'header.php');
            }
        }

        if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.php')) {
            include(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.php');
        }

        if ($doNotRenderHeader === false) {
            if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'footer.php')) {
                include(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'footer.php');
            } else {
                include(ROOT . DS . 'application' . DS . 'views' . DS . 'footer.php');
            }
        }
    }

    function renderError($doNotRenderHeader = false)
    {
        $html = new HTML;

        if ($doNotRenderHeader === false) {

            if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'header.php')) {
                include(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'header.php');
            } else {
                include(ROOT . DS . 'application' . DS . 'views' . DS . 'header.php');
            }
        }

        if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'error.php')) {
            include(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'error.php');
        }
        else {
            include(ROOT . DS . 'application' . DS . 'views' . DS . 'error.php');
        }

        if ($doNotRenderHeader === false) {
            if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'footer.php')) {
                include(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'footer.php');
            } else {
                include(ROOT . DS . 'application' . DS . 'views' . DS . 'footer.php');
            }
        }
    }
}

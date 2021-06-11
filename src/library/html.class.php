<?php
include_once(ROOT . DS . 'library' . DS . 'sqlconnection.class.php');

class HTML
{
    private $js = array();

    // Some input santitizing functions require a valid db connection
    private $_dbHandle;

    function __construct()
    {
        $this->_dbHandle = SQLConnection::open_connection();
    }

    function __destruct()
    {
        SQLConnection::close_connection($this->_dbHandle);
    }

    function shortenUrls($data)
    {
        $data = preg_replace_callback('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@', array(get_class($this), '_fetchTinyUrl'), $data);
        return $data;
    }

    private function _fetchTinyUrl($url)
    {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, 'http://tinyurl.com/api-create.php?url=' . $url[0]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return '<a href="' . $data . '" target = "_blank" >' . $data . '</a>';
    }

    function sanitize($data)
    {
        return mysqli_real_escape_string($this->_dbHandle, $data);
    }

    function link($text, $path)
    {
        $path = str_replace(' ', '-', $path);

        $data = "<a href=\"{$path}\"> {$text} </a>";
        return $data;
    }

    function includeJs($fileName)
    {
        $data = "<script src=\"/js/{$fileName}.js\"></script>";
        return $data;
    }

    function includeJsDeffered($fileName)
    {
        $data = "<script src=\"/js/{$fileName}.js\" defer></script>";
        return $data;
    }

    function includeCss($fileName)
    {
        $data = "<link rel=\"stylesheet\" href=\"/css/{$fileName}.css\"></link>";
        return $data;
    }
}

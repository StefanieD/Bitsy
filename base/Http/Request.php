<?php
/**
 * Singleton class for request object.
 * 
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Http
 * @version 0.1.0
 * @todo customize class
 */
class Bitsy_Http_Request
{
    /*
     * private variables
     */
    private $_post;
    private $_get;
    private $_cookie;
    private $_file;
    private $_header;
    private $_auth;
    private $_MVC_Controller;
    private $_MVC_Action;
    private static $_instance = null;

    private function __construct() {
        $this->_post = &$_POST;
        $this->_get = &$_GET;
        $this->_cookie = &$_COOKIE;
        $this->_file = &$_FILES;

        foreach ($_SERVER as $key => $value) {
            //cut http
            if (substr($key, 0, 5) == "HTTP_") {
                $key = strtolower($key);
                $this->_header[substr($key, 5)] = $value;
            }
        }

        if (isset($_SERVER["PHP_AUTH_USER"])) {
            $this->_auth["user"] = $_SERVER["PHP_AUTH_USER"];
            $this->_auth["pass"] = $_SERVER["PHP_AUTH_PW"];
        } else {
            $this->_auth = null;
        }
    }

    private function __clone() {}

    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new Bitsy_Http_Request();
        }
        return self::$_instance;
    }

    public function setControllerName($name) {
        $this->_MVC_Controller = $name;
    }

    public function getControllerName() {
        return $this->_MVC_Controller;
    }

    public function setActionName($name) {
        $this->_MVC_Action = $name;
    }

    public function getActionName() {
        return $this->_MVC_Action;
    }

    public function getAuthData() {
        return $this->_auth;
    }

    public function issetHeader($key) {
        $key = strtolower($key);
        return (isset($this->_header[$key]));
    }

    public function getHeader($key) {
        $key = strtolower($key);
        if ($this->issetHeader($key)) {
            return $this->_header[$key];
        }
        return null;
    }

    public function issetGet($key) {
        return (isset($this->_get[$key]));
    }

    public function getGet($key) {
        if ($this->issetGet($key)) {
            return $this->_get[$key];
        }
        return null;
    }

    public function issetPost($key) {
        return (isset($this->_post[$key]));
    }

    public function getPost($key) {
        if ($this->issetPost($key)) {
            return $this->_post[$key];
        }
        return null;
    }

    public function issetFile($key) {
        return (isset($this->_file[$key]));
    }

    public function getFile($key) {
        if ($this->issetFile($key)) {
            return $this->_file[$key];
        }
        return null;
    }

    public function issetCookie($key) {
        return (isset($this->_cookie[$key]));
    }

    public function getCookie($key) {
        if ($this->issetCookie($key)) {
            return $this->_cookie[$key];
        }
        return null;
    }
    
    public function getPostValues()
    {
        return $this->_post;
    }
    
    public function getGetValues()
    {
        return $this->_get;
    }
}
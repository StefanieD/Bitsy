<?php
/**
 * Singleton class for response object.
 * 
 * @author Stefanie Drost (2012)
 * @package Http
 * @version 0.1.0
 */
class Bitsy_Http_Response {

    /*
     * private variables
     */
    private $_headers = array();
    private $_content = "";
    private $_status = "200 OK";
    private static $_instance = null;

    private function __clone() {}

    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new Bitsy_Http_Response();
        }
        return self::$_instance;
    }

    public function addHeader($name, $content) {
        $this->_headers[$name] = $content;
    }

    public function setStatus($status) {
        $this->_status = $status;
    }

    public function addContent($content) {
        $this->_content .= $content;
    }

    public function getContent() {
        return $this->_content;
    }

    public function replaceContent($newContent) {
        $this->_content = $newContent;
    }

    public function send() {
        header("HTTP/1.0 " . $this->_status);
        foreach ($this->_headers as $name => $content) {
            header($name . ": " . $content);
        }
        echo $this->_content;

        //resetten
        $this->_content = "";
        $this->_headers = null;
    }
}
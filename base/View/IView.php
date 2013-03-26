<?php
/**
 * View interface.
 * 
 * @author Stefanie Drost (2012)
 * @package View
 * @version 0.1.0
 */
interface Bitsy_View_IView {

    public function display(Bitsy_Http_Response $response);
    public function addContent($content);
    public function includeContent();
    public static function getInstance();
}
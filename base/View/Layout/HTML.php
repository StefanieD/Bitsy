<?php
/**
 * Layout class for standard HTML output.
 * 
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Layout
 * @version 0.1.0
 * 
 * @todo exceptions einbinden
 */
class Bitsy_View_Layout_HTML extends Bitsy_View_Abstract 
{

    /*
     * protected variables
     */
    protected $_layout = 'standard';
    
    public function __construct() {}

    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}
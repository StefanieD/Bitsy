<?php
/**
 * Layout class for mobile output.
 * 
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Layout
 * @version 0.1.0
 * 
 * @todo customize, comments, exceptions einbinden
 */
class Bitsy_View_Layout_Mobile extends Bitsy_View_Abstract 
{

    /*
     * protected variables
     */
    protected $_layout = 'mobile';
    
    public function __construct() {}

    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

}
<?php
/**
 * Abstract class for templates.
 * 
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Template
 * @version 0.1.0
 */
abstract class Bitsy_View_Template_Abstract 
{

    function __construct() {}
    
    /**
     * Magic method for read variables called with $this->var in template.
     * @param type $var 
     */
    public function __get($var) {
        if (isset($this->_content[$var])) {
            echo $this->_content[$var];
        } else {
            Bitsy_Debugger::log("No data with name " . $var . "in view.");
        }
    }

}

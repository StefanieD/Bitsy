<?php
/**
 * Template class for creating formatted blocks.
 * 
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package View
 * @version 0.1.0
 */
class Bitsy_View_Template extends Bitsy_View_Template_Abstract 
{

    /*
     * protected variables
     */
    protected $_rawContent;
    protected $_content = array();
    
    function __construct() {}
    
    /**
     * Include template with arguments.
     * This function is called in the abstract class of view.
     * 
     * @param String $template
     * @param array $var
     * @return String 
     */
    public function createTemplateContent($template, $var) 
    {
        // read arguments
        foreach($var as $key => $val) {
            $this->_content[$key] = $val;
        }
        ob_start();
        include(Bitsy_Config::getProjectRoot() . "/templates" . '/' . 
                    $template . '.phtml');
        return ob_get_clean();
    }
    
}

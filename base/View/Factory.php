<?php
/**
 * Final class used as factory for instancing view.
 * 
 * @author Stefanie Drost (2012)
 * @package View
 * @version 0.1.0
 */
final class Bitsy_View_Factory 
{

    function __construct() {}
    
    protected function __clone() {}
    
    /**
     * Get the view layout class based on defined layout in controller.
     * The layout can be defined in controller with $this->setLayout('name');
     * 
     * @param String $layout
     * @return Bitsy_View_Abstract $view the defined layout
     */
    public static function getInstance($layout=null) 
    {
        switch($layout) {
            case 'standard':
                $view =  new Bitsy_View_Layout_HTML();
                break;
            case 'mobile':
                $view =  new Bitsy_View_Layout_Mobile();
                break;
            default:
                $view =  new Bitsy_View_Layout_HTML();
                break;
        }
        return $view;
    }

}

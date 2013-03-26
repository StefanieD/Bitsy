<?php
/**
 * Abstract class for views. Each Layout include this class.
 * 
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package View
 * @version 0.1.0
 */
abstract class Bitsy_View_Abstract implements Bitsy_View_IView
{
    
    /*
     * protected variables
     */
    protected static $_instance = null;
    protected $_viewContents = array();
    protected $_viewPath = null;

    /*
     * functions for singleton pattern
     */
    protected function __clone() {}
    protected function __construct() {}
    
    /**
     * Render layout for view.
     * Is called by FrontController.
     * 
     * @param Bitsy_Http_Response $response 
     */
    public function display(Bitsy_Http_Response $response) 
    {
        ob_start();
        $path = Bitsy_Config::getProjectRoot() . "/layouts" . '/' . 
                $this->_layout . ".phtml";

        if (file_exists($path)) {
            include($path);
            $content = ob_get_clean();
            $response->addContent($content);
        } else {
            echo 'Layout wurde nicht gefunden';
        }
    }
    
    /**
     * Add content to view. This function can be called from the controller with
     * $this->view->addContent(array('variable' => 'content');
     * 
     * @param array $content
     */
    public function addContent($content) 
    {
        foreach($content as $key => $val) {
            $this->_viewContents[$key] = $val;
        }
        return $this;
    }

    /**
     * Magic method of views for getting variables defined in controllers.
     * @param type $key
     * @return type 
     */
    public function __get($key) 
    {
        if (isset($this->_viewContents[$key])) {
            return $this->_viewContents[$key];
        }
        return $this;
    }
    
    /**
     * Include content of view page.
     * This function is called in layout page.
     */
    public function includeContent() 
    {
        if (isset($this->_viewPath)) {
            include(Bitsy_Config::getProjectClasses() . "/views". '/' . 
                    $this->_viewPath . '.phtml');
        } else {
            echo "Die View wurde von keinem Controller mit Daten gefuettert!";
        }
    }
    
    public function setViewPath($path) 
    {
        $this->_viewPath = $path;
        return $this;
    }
    
    /**
     * Use a template for parameters.
     * This function can be called from the controller with
     * $this->view->useTemplate('template', array('variable' => 'content'));
     * 
     * @param String $template template name
     * @param array $var
     * @return String   content of the template 
     */
    public function useTemplate($template, $var) 
    {
        $temp = new Bitsy_View_Template();
        return $temp->createTemplateContent($template, $var);
    }

}
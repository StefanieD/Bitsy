<?php
/**
 * Abstract controller class. This class must be included by
 * every project contoller.
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Controller
 * @version 0.1.0
 */
abstract class Bitsy_Controller_Abstract
{
    /*
     * protected variables
     */
    protected $view;
    protected $layout = "standard";
    
    /*
     * private variables
     */
    private $request;
    
    /**
     *
     * @param Bitsy_Http_Request $request
     */
    public function __construct(Bitsy_Http_Request $request)
    {
        $this->request = $request;
    }

    /**
     * Check if controller has index-action and is an
     * instance of Bitsy_Controller_Abstract.
     *
     * @param Bitsy_Controller_Abstract $controller
     * @return boolean
     */
    public static function isValid($controller) {
        return ($controller instanceof Bitsy_Controller_Abstract
                && is_callable(array($controller, 'index_Action')));
    }
    
    public function redirect($path, $params = null)
    {
    	header('Location: '. Bitsy_Config::getBaseUrl() . '' . $path);
    	exit;
    }

    /**
     * Has to be included in every controller.
     */
    abstract function index_Action();
    
    /**
     * Set layout for view.
     * This function is called by controller with $this->setLayout('name');
     *
     * @param String $layout
     */
    public function setLayout($layout) {
        $this->layout = $layout;
        self::renderLayout();
    }
    
    /**
     * Get instance of layout.
     */
    public function renderLayout() {
        if($this->layout !== 'standard') {
            $this->view = Bitsy_View_Factory::getInstance($this->layout);
        }
        return $this;
    }
    
    protected function dump($var) {
        $conf = Bitsy_Config::getInstance();
        if($conf->get('debugger_on')) {
            var_dump($var);
        }
        else {
            throw new Exception("Debugger in conf.ini nicht aktiviert");
        }
    }
    
    public function setView(Bitsy_View_IView $view)
    {
        $this->view = $view;
        return $this;
    }
    
    public function getView()
    {
        return $this->view;
    }
    
    /**
     * Returns array with all post-values.
     * @return array
     */
    public function getPost()
    {
        return $this->request->getPostValues();
    }
    
    /**
     * Returns array with all get params.
     * @return array
     */
    public function getGet()
    {
        return $this->request->getGetValues();
    }
    
    /**
     * Returns the value of a specific key in post data.
     * @param type String
     * @return type
     */
    public function getPostValue($key)
    {
        return $this->request->getPost($key);
    }
    
    /**
     * Returns the value of a specific key in gat data.
     * @param type String
     * @return type
     */
    public function getGetValue($key)
    {
        return $this->request->getGet($key);
    }
}
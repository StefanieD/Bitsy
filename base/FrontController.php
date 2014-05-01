<?php
/**
 * FrontController of Bitsy.
 * Route to controller with action and set layouts, views, or templates.
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package base
 * @version 0.1.0
 *
 */
class Bitsy_FrontController
{

    /*
     * public variables
     */
    public $view = null;
    
    /*
     * private variables
     */
    private static $controllerPath;
    private static $calledController;
    private static $calledAction;
    private static $controller;
    private static $action;

    /**
     * Handles url parameters. Checking for controller, action or arguments.
     *
     * @param Bitsy_Http_Request $request An request object initialized in application index.php.
     * @param Bitsy_Http_Response $response An response object initialized in application index.php.
     */
    public static function call(Bitsy_Http_Request $request, Bitsy_Http_Response $response)
    {
        if ($request->issetGet("controller") && $request->getGet("controller") != "") {
            $calledController = htmlentities($request->getGet("controller"));
        } else {
            $calledController = "index";
        }

        if ($request->issetGet("action") && $request->getGet("action") != "") {
            $action = htmlentities($request->getGet("action"));
        } else {
            $action = "index";
        }
        
        // set the requested controller and action
        $request->setControllerName($calledController);
        $request->setActionName($action);
        
        //call requested url
        self::run($request, $response);
    }

    /**
     * Execute requested url.
     *
     * @param Bitsy_Http_Request $request
     * @param Bitsy_Http_Response $response
     */
    public static function run(Bitsy_Http_Request $request, Bitsy_Http_Response $response)
    {
		//require 'Controller/Error.php
        self::initRouteValues($request);
        
        // get controller class
        if (file_exists(self::$controllerPath)) {
            if (class_exists(self::$controller, true)) {
                self::callControllerWithView($request, $response);
            } else {
                 new Bitsy_Controller_Error('kein Controller');
            }
        } else {
            new Bitsy_Controller_Error('Controller existiert nicht');
            die();
        }
        $response->send();
    }
    
    private static function initRouteValues(Bitsy_Http_Request $request)
    {
        self::$calledController = $request->getControllerName();
        self::$calledAction = $request->getActionName();
        self::$action = self::$calledAction . '_Action';
        self::$controllerPath = self::getControllerPath() . "/" . self::$calledController . ".php";
        self::$controller = "Controller_" . self::$calledController;
    }
    
    /**
     * Calls the routed action of the controller. Adds a view instance to controller.
     *
     * @param Bitsy_Http_Request $request
     * @param Bitsy_Http_Response $response
     */
    private static function callControllerWithView(Bitsy_Http_Request $request, Bitsy_Http_Response $response)
    {
        $controller = new self::$controller($request);
        if (Bitsy_Controller_Abstract::isValid($controller)) {
            try {
                $controller->setView(Bitsy_View_Factory::getInstance());
                
                if (is_callable(array(self::$controller, self::$action))) {
                    $action = self::$action;
                    $controller->$action();
                } else {
                    new Bitsy_Controller_Error('action nicht gefunden');
                }
                
                $controller->getView()->setViewPath(self::$calledController . '/' . self::$calledAction);
                $controller->getView()->display($response);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            new Bitsy_Controller_Error('ungültiger Controller');
        }
    }
    
    private static function getControllerPath()
    {
        return Bitsy_Config::getProjectClasses() . "/controller";
    }
}

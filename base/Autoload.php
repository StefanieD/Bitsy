<?php
/**
 * Bitsy autoloader class. 
 * 
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package base
 * @version 0.1.0
 */
class Bitsy_Autoload 
{

    /**
     * Load classes with Bitsy_ namespace.
     * 
     * @param String $className 
     */
    public static function load($className) 
    {
        if (substr($className, 0, 6) == "Bitsy_") {
            $classFile = Bitsy_Config::getBitsyBasePath() . "/" . 
                    str_replace("_", "/", substr($className, 6)) . ".php";
            if (file_exists($classFile)) {
                require_once($classFile);
            }
        }
    }

    private function __construct() {}
    private function __clone() {}
    
    /**
     * Register new autoloader. 
     * An autoloader for each project is recommended.
     * 
     * @param type $autoloader 
     */
    public static function register($autoloader = null) 
    {
        if ($autoloader === null) {
            spl_autoload_register(array('Bitsy_Autoload', 'load'));
        } else {
            spl_autoload_register($autoloader);
        }
    }

}

?>
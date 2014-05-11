<?php
/**
 * Config class for Bitsy.
 * Stores important settings of project.
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package base
 * @version 0.1.0
 */
class Bitsy_Config
{

    /*
     * private variables
     */
    private static $iniGroups = array();
    private static $iniGroupSettings = array();
    private static $currentSettings;
    private static $environments = array("development", "production");

    /**
     * Read config ini-file of project, store groups and their settings.
     *
     * @param String $path path of ini
     */
    public static function readINI($path)
    {
        if (file_exists($path)) {
            self::$iniGroupSettings = parse_ini_file($path, TRUE);
            self::readIniGroups();
            self::checkForProjectRoot();
            self::initEnvironment();
            //self::initDebugger();
        } else {
            throw new Exception("Die ini-Datei existiert nicht!");
        }
    }
    
    /**
     * Reads groups defined in ini-file.
     */
    private static function readIniGroups()
    {
        foreach (self::$iniGroupSettings as $group => $groupSettings) {
            self::$iniGroups[] = $group;
        }
    }
    
    /**
     * Reads the defined debugger from ini-file and create instance.
     */
    private static function initDebugger()
    {
        if(array_key_exists("debugger", self::$currentSettings)) {
            Bitsy_Debugger::getLoggerInstance(self::$currentSettings["debugger"]);
        }
    }
    
    /**
     * Checks if project root is defined in ini-file. Otherwise throw Exception.
     */
    private static function checkForProjectRoot()
    {
        if(array_search("main", self::$iniGroups) === false) {
            if(!array_key_exists("project_root", self::$iniGroupSettings["main"])) {
                throw new Exception("Projekt-Root wurde in Ini-Datei nicht angegeben!");
            }
            throw new Exception("Ini-Datei enthält keine main-Sektion!");
        }
    }
    
    /**
     * Gets the environment of project. Possible values are development and production.
     *
     * The settings of the environment are used for the project.
     */
    private static function initEnvironment()
    {
        if(array_search("main", self::$iniGroups) !== false) {
            if(array_key_exists("environment", self::$iniGroupSettings["main"])) {
                self::setEnvironmentSettings(self::$iniGroupSettings["main"]["environment"]);
            } else {
                throw new Exception("Attrinbut Environment wurde in Ini-Datei nicht angegeben!");
            }
        } else {
            throw new Exception("Ini-Datei enthält keine main-Sektion!");
        }
    }
    
    private static function setEnvironmentSettings($environment)
    {
        if(array_search($environment, self::$environments) !== false ||
                array_search($environment, self::$environments) !== false) {
            self::$currentSettings = self::$iniGroupSettings[$environment];
        } else {
            throw new Exception("Gesetzte Umgebung in Ini-Datei nicht gültig!");
        }
    }
    
    public static function getIniGroups()
    {
        return self::$iniGroups;
    }
    
    public static function getBitsyRoot()
    {
    	return dirname(dirname(__FILE__));
    }
    
    public static function getBaseUrl()
    {
    	return 'http://' . $_SERVER['HTTP_HOST'];
    }
    
    public static function getBitsyBasePath()
    {
        return dirname(__FILE__);
    }
    
    public static function getBitsyPluginPath()
    {
    	return self::getBitsyRoot() . "/plugins";
    }
    
    public static function getProjectRoot()
    {
        return self::$iniGroupSettings["main"]["project_root"];
    }
    
    public static function getProjectClasses()
    {
        return self::getProjectRoot() . "application";
    }
    
    public static function getEnvironment()
    {
        return self::$iniGroupSettings["main"]["environment"];
    }
    
    public static function getLogFile()
    {
        return self::$currentSettings["log_file"];
    }
    
    public static function getDatabaseSettingByName($setting)
    {
        if(isset(self::$currentSettings[$setting])) {
            return self::$currentSettings[$setting];
        } else {
            throw new Exception("Das Attribut <b>" . $setting .
                    "</b> wurde in der Ini-Datei nicht angegeben.");
        }
    }
}
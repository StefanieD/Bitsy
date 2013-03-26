<?php

/**
 * Description of Debugger
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package base
 * @version 0.1.0
 */
class Bitsy_Debugger
{
    private static $debugger;
    
    public static function getLoggerInstance($type)
    {
        switch($type) {
            case "error":
                self::$debugger = new Bitsy_Debugger_ErrorDebugger();
                break;
            case "log":
                self::$debugger = new Bitsy_Debugger_LogDebugger();
                break;
            default:
                self::$debugger = new Bitsy_Debugger_ErrorDebugger();
                break;
        }
    }
    
    public static function log($message, $level)
    {
        self::$debugger->log($message, $level);
    }
}

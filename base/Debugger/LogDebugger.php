<?php
/**
 * Class for debugger which logs messages in file.
 * 
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Debugger
 * @version 0.1.0
 */
class Bitsy_Debugger_LogDebugger implements Bitsy_Debugger_IDebugger
{
    public function __construct()
    {
    }
    
    public function log($message, $level)
    {
        var_dump(Bitsy_Config::getLogFile());
        error_log($message, 3, Bitsy_Config::getLogFile());
    }    
}
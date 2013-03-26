<?php

/**
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Debugger
 * @version 0.1.0
 */
interface Bitsy_Debugger_IDebugger
{
    const LEVEL_ERROR   = 1;
    const LEVEL_WARNING = 2;
    const LEVEL_INFO    = 3;
    
    public function log($message, $level);
}

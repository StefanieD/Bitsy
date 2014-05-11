<?php

/**
 * Facade for view functions.
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package base
 * @version 0.1.0
 */
class Bitsy_ViewFacade
{
    
    public static function getSuccessMessages()
    {
        return Bitsy_Model_Session::getFeedback()->getSuccessMessages();
    }
    
    public static function getNotifyMessages()
    {
        return Bitsy_Model_Session::getFeedback()->getNotifyMessages();
    }
    
    public static function getErrorMessages()
    {
    	return Bitsy_Model_Session::getFeedback()->getErrorMessages();
    }
}

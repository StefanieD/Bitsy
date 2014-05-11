<?php
/**
 * Bitsy feedback messenger class.
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package base
 * @version 0.1.0
 */
class Bitsy_Model_Feedback_Messages
{
	private $messages = array(
		'notify' => array(),
		'success' => array(),
		'error' => array(),
	);

    public function addNotify($notifyMessage)
    {
        $this->messages['notify'][] = $notifyMessage;
    }
    
    public function addSuccess($successMessage)
    {
    	$this->messages['success'][] = $successMessage;
    }
    
    public function addError($errorMessage)
    {
    	$this->messages['error'][] = $errorMessage;
    }
    
    public function getNotifyMessages()
    {
    	return $this->messages['notify'];
    }
    
    public function getSuccessMessages()
    {
    	return $this->messages['success'];
    }
    
    public function getErrorMessages()
    {
    	return $this->messages['error'];
    }
    
    public function clearMessages()
    {
    	$this->messages = array(
			'notify' => array(),
			'success' => array(),
			'error' => array(),
		);
    }
}
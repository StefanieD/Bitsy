<?php
/**
 * Class for session handling.
 *
 * @author Stefanie Drost <stefanie.drost@web.de>
 * @package Model
 * @version 0.1.0
 */
class Bitsy_Model_Session
{
	/**
	 *
	 * @return Bitsy_Model_Feedback_Messages
	 */
	public static function getFeedback()
	{
		if ( !isset($_SESSION['feedback']) ) {
			$_SESSION['feedback'] = new Bitsy_Model_Feedback_Messages();
		}
		
		return $_SESSION['feedback'];
	}
	
	/**
	 * Sets the value for a session key.
	 *
	 * @param string $key
	 * @param mixed $value
	 */
	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}
	
	/**
	 * Returns the value of the requested session element.
	 *
	 * @param string $key
	 * @return boolean|unknown
	 */
	public static function get($key)
	{
		if ( !isset($_SESSION[$key]) ) {
			return false;
		}
		
		return $_SESSION[$key];
	}
}

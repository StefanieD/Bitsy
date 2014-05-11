<?php
/**
 * Class for session handling.
 *
 * @author Stefanie Drost <stefanie.drost@web.de>
 * @package Model
 * @version 0.1.0
 */
class Bitsy_Model_Session //extends Bitsy_Model_Session_Abstract
{

	public static function getFeedback()
	{
		if ( !isset($_SESSION['bitsy']) ) {
			$_SESSION['bitsy']['feedback'] = new Bitsy_Model_Feedback_Messages();
		}
		
		return $_SESSION['bitsy']['feedback'];
	}
}

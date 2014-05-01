<?php

/**
 *
 * @author Stefanie Drost <stefanie.drost@web.de>
 */
class Bitsy_Navigation_Model_Interface
{
	public function getElementByName($name);
	public function addElement(Bitsy_Navigation_Model_Element_Abstract $element);
	public function getElements();
	protected function setFlow($flow);
	protected function getFlow();
}
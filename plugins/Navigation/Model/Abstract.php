<?php

/**
 *
 * @author Stefanie Drost <stefanie.drost@web.de>
 */
class Bitsy_Navigation_Model_Abstract
{
	protected $flow;
	protected $elements = array();
	
	const VERTICAL = "VERTICAL";
	const HORIZONTAL = "HORIZONTAL";
	
	public function __construct()
	{
		echo 'in model';
	}
	
	protected function init()
	{
		
	}
	
	/**
	 * Adds a new element to the navigation.
	 *
	 * @param Bitsy_Plugin_Navigation_Model_Element_Abstract $element
	 * @return Bitsy_Plugin_Navigation_Model_Element_Abstract
	*/
	public function addElement(Bitsy_Navigation_Model_Element_Abstract $element)
	{
		var_dump('add element');
		array_push($this->elements, $element);
		return $this;
	}
	
	/**
	 * Gets all main elements of this navigation.
	 *
	 * @return array:
	 */
	public function getElements()
	{
		return $this->elements;
	}
	
	protected function setFlow($flow)
	{
		$this->flow = $flow;
		return $this;
	}
	
	protected function getFlow()
	{
		return $this->flow;
	}
}
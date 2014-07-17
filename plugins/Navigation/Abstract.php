<?php

/**
 *
 * @author Stefanie Drost <stefanie.drost@web.de>
 */
class Bitsy_Navigation_Abstract
{
	protected $flow;
	protected $elements = array();
	
	const VERTICAL = "VERTICAL";
	const HORIZONTAL = "HORIZONTAL";
	
	public function __construct()
	{
		
	}
	
	protected function init()
	{
		
	}
	
	/**
	 * Adds a new element to the navigation.
	 *
	 * @param Bitsy_Plugin_Navigation_Element_Abstract $element
	 * @return Bitsy_Plugin_Navigation_Element_Abstract
	*/
	public function addElement(Bitsy_Navigation_Element_Abstract $element)
	{
		array_push($this->elements, $element);
		
		return $this;
	}
	
	public function addElements($elements)
	{
		foreach ($elements as $element) {
			$this->addElement($element);
		}
	
		return $this;
	}
	
	public function createElements($elementTitles)
	{
		foreach ($elementTitles as $title) {
			$element = new Bitsy_Navigation_Element($title);
			$this->addElement($element);
		}
	
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
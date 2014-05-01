<?php
/**
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 */
class Bitsy_Navigation_Model_Element_Abstract implements Bitsy_Navigation_Model_Element_Interface
{
	protected $hasSubelements;
	protected $title;
	protected $name;
	protected $url;
	protected $subelements = array();
	
	/**
	 * Adds a new element to the navigation element.
	 *
	 * @param Bitsy_Plugin_Navigation_Model_Element_Abstract $element
	 * @return Bitsy_Plugin_Navigation_Model_Element_Abstract
	 */
	public function addSubelement(Bitsy_Navigation_Model_Element_Abstract $element)
	{
		array_push($this->subelements, $element);
		return $this;
	}
	
	/**
	 * Gets all subelements of this navigation element.
	 *
	 * @return array:
	 */
	public function getSubelements()
	{
		return $this->subelements;
	}
	
	public function setTitle($tilte)
	{
		$this->title =$tilte;
		return $this;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function setName($name)
	{
		$this->name =$name;
		return $this;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setUrl($url)
	{
		$this->url =$url;
		return $this;
	}
	
	public function getUrl()
	{
		return $this->url;
	}
	
	public function setHasSubelements($hasSubelements)
	{
		$this->hasSubelements = $hasSubelements;
		return $this;
	}
	
	public function getHasSubelements()
	{
		return $this->hasSubelements;
	}
}
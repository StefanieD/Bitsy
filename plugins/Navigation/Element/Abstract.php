<?php
/**
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 */
class Bitsy_Navigation_Element_Abstract implements Bitsy_Navigation_Element_Interface
{
	protected $title;
	protected $name;
	protected $url;
	protected $html;
	protected $subelements = array();
	
	/**
	 * Adds a new element to the navigation element.
	 *
	 * @param Bitsy_Plugin_Navigation_Model_Element_Abstract $element
	 * @return Bitsy_Plugin_Navigation_Model_Element_Abstract
	 */
	public function addSubelement(Bitsy_Navigation_Element_Abstract $element)
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
	
	public function setHtml($html)
	{
		$this->html =$html;
		return $this;
	}
	
	public function getHtml()
	{
		return $this->html;
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
	
	public function hasSubelements()
	{
		if (count($this->subelements) > 0) {
			return true;
		}
		
		return false;
	}
}
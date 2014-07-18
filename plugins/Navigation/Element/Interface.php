<?php
/**
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 */
interface Bitsy_Navigation_Element_Interface
{
	public function setTitle($title);
	public function setName($name);
	public function setUrl($url);
	public function addSubelement(Bitsy_Navigation_Element_Abstract $element);
	public function getSubelements();
	public function hasSubelements();
}
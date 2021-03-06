<?php
/**
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 */
class Bitsy_Navigation_Element extends Bitsy_Navigation_Element_Abstract
{
	public function __construct($title = 'Navigation Element')
	{
		$this->setTitle($title);
		$this->init();
	}
	
	protected function init()
	{
		$html = '<a href="#"><span>' . $this->getTitle() . '</span></a>';
		$this->setHtml($html);
	}
}
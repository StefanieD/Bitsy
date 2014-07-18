<?php
/**
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 */
class Bitsy_Navigation_HorizontalNavigation extends Bitsy_Navigation_Abstract
{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	protected function init()
	{
		parent::init();
		$this->setFlow(self::HORIZONTAL);
	}
	
	public function __toString()
	{
		$html = '<div class="bitsy_navigation_horizontal" id="bitsy_navigation_horizontal" style="color: blue;">';
		$html .= '<ul>';
		foreach ($this->elements as $element) {
			if ($element->hasSubelements()) {
				$html .= '<li>';
				$html .= $element->getHtml() . $this->renderSubelements($element->getSubelements());
				$html .= '</li>';
			}
			else {
				$html .= '<li>' . $element->getHtml() . '</li>';
			}
			
		}
		
		$html .= '</ul>';
		$html .= '</div>';
		
		return $html;
	}
	
	private function renderSubelements($subelements)
	{
		$html = '<ul>';
		
		foreach ($subelements as $element) {
			$html .= $element->getHtml();
		}
		
		$html .= '</ul>';
		
		return $html;
	}
}
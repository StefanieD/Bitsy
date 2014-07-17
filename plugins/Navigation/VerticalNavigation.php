<?php
/**
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 */
class Bitsy_Navigation_VerticalNavigation extends Bitsy_Navigation_Abstract
{
	protected function init()
	{
		parent::init();
		$this->setFlow(self::VERTICAL);
	}
}
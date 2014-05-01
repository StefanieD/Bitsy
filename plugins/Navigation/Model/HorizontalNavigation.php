<?php
/**
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 */
class Bitsy_Navigation_Model_HorizontalNavigation extends Bitsy_Navigation_Model_Abstract
{
	
	public function __construct()
	{
		parent::__construct();
		echo 'in model';
	}
	
	protected function init()
	{
		parent::init();
		$this->setFlow(self::HORIZONTAL);
	}
}
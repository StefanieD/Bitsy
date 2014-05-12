<?php
/**
 * Interface for all plugins.
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 *
 */
class Bitsy_AbstractPlugin {
	
	protected $pluginName;
	protected $config;
	
	public function __construct()
	{
		$this->config = Bitsy_Config::getPluginConfig($this->pluginName);
	}
}

?>
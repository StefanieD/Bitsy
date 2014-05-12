<?php
/**
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 */
class Bitsy_Couchbase_Model_Couchbase extends Bitsy_AbstractPlugin
{
	public $pluginName = 'couchbase';
	
	protected $host;
	protected $user;
	protected $password;
	protected $bucket;
	
	/*
	 * instance of Couchbase Object
	 */
	protected $model;
	
	public function __construct($host = null, $user = null, $password = null, $bucket = null)
	{
		parent::__construct();
		
		//$couchbaseConfig = Bitsy_Config::getPluginConfig($this->pluginName);
		$this->user = $this->config['couchbase_user'];
		$this->password = $this->config['couchbase_password'];
		$this->host = $this->config['couchbase_host'] . ':' . $this->config['couchbase_port'];
		$this->bucket = $this->config['couchbase_bucket'];
		
		if ( $host ) $this->host = $host;
		if ( $user ) $this->user = $user;
		if ( $password ) $this->password = $password;
		if ( $bucket ) $this->bucket = $bucket;
		
		$this->model = new Couchbase($this->host, $this->user, $this->password, $this->bucket);
		
		return $this;
		
	}
	
	public function getItems()
	{
		$itemNumbers = array();
		
		foreach ( $this->model->getStats() as $host => $data ) {
			$itemNumbers[$host] = $data['curr_items'];
		}
		
		return $itemNumbers;
	}
	
	public function getBucketInfo()
	{
		$manager = new CouchbaseClusterManager(array($this->host), 'Administrator', 'password');
		return json_decode($manager->getBucketInfo($this->bucket));
	}
}
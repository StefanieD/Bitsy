<?php
/**
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 */
class Bitsy_Couchbase_Model_Couchbase
{
	protected $host;
	protected $user;
	protected $password;
	protected $bucket;
	
	public function __construct()
	{
		$this->host = '127.0.0.1:8091';
		$this->user = '';
		$this->password = '';
		$this->bucket = 'default';
	}
	
	public function connect($host, $user, $password, $bucket)
	{
		return new Couchbase($host, "", "", $bucket);
	}
	
	public function setBucket($bucket)
	{
		$this->bucket = $bucket;
		return $this;
	}
	
	public function getBucket()
	{
		return $this->bucket;
	}
	
	
}
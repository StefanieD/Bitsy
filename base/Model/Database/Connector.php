<?php
/**
 * Class for connecting to database.
 * 
 * The required information are set in the config-file of the project.
 * 
 * @author Stefanie Drost (2012)
 * @package Database
 * @version 0.1.0
 * 
 * @todo alternative class if PDO is not enabled
 */
class Bitsy_Model_Database_Connector extends PDO
{

    /*
     * protected variables
     */
    protected $_database;
    protected $_host;
    protected $_user;
    protected $_password;
    
    
    function __construct() 
    {
        $this->_database = Bitsy_Config::getDatabaseSettingByName('db_name');
        $this->_host = Bitsy_Config::getDatabaseSettingByName('db_host');
        $this->_user = Bitsy_Config::getDatabaseSettingByName('db_user');
        $this->_password = Bitsy_Config::getDatabaseSettingByName('db_password');
        
        $dns = 'mysql:dbname='. $this->_database . ';host=' . $this->_host;
        parent::__construct($dns, $this->_user, $this->_password);
    }
}

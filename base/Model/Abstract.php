<?php
/**
 * Class for models. This class contains essential functions for retrieving data
 * from the database.
 *
 * @author Stefanie Drost (2012)
 * @package Model
 * @version 0.1.0
 */
class Bitsy_Model_Abstract extends Bitsy_Model_Database_Connector
{

    /*
     * protected variables
     */
    protected $_table;
    
    public function __construct()
    {
        parent::__construct();
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    /**
     * Get rows from DB-Table.
     * If column is set, only data of column will be returned.
     *
     * @param String $column
     * @return array
     */
    public function getData($column = null)
    {
        if($column === null) {
            $data = array();
            $sql = $this->prepare('SELECT * FROM '. $this->_table);
            $sql->execute();
            foreach ($sql->fetchAll(PDO::FETCH_ASSOC) as $row) {
                $data[] = $row;
            }
        }
        else {
            $sql = $this->prepare('SELECT '. $column .' FROM '. $this->_table);
            $sql->execute();
            $data = $sql->fetchAll(PDO::FETCH_COLUMN);
        }
        
        return $data;
    }
    
    /**
     * Gets the data for one row filtered by id.
     *
     * @param int $id
     * @return array The result row. Return false, if now row with given
     * id has been found.
     */
    public function getDataById($id)
    {
        $sql = $this->prepare('SELECT * FROM '. $this->_table .
                ' WHERE id = ' . $id);
        $sql->execute();
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        
        return $data;
    }
    
    /**
     * Inserts a new row to the table.
     *
     * @param array $rowData An associated array with column and value.
     * @return int The id of the new row.
     */
    public function insertRow($rowData)
    {
        if (count($rowData) == 1) {
            $statement = "INSERT INTO " . $this->_table . " (";
            foreach ($rowData as $key => $value) {
                $statement .= $key . ") VALUES ('" . $value . "')";
            }
        } else {
            foreach($rowData as $column => $value) {
                $colums[] = $column;
                $values[] = $value;
            }
            $statement = "INSERT INTO " . $this->_table . " (" .
            implode(",", $colums) . ") VALUES ('" .
            implode("','", $values) . "')";
        }
        $this->exec($statement);
       
        return $this->lastInsertId();
    }
    
    public function getTable()
    {
        return $this->_table;
    }
    
    public function setTable($table)
    {
        $this->_table = $table;
    }
}

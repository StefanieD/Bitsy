<?php
/**
 * Interface for forms of Bitsy.
 * 
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Form
 */
interface Bitsy_Form_IForm 
{
    public function setId($id);
    public function setName($name);
    public function setClass($class);
    public function setAction($action);
    public function setMethod($method);
}

<?php

/**
 * Basic class for form.
 * 
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Form
 * @version 0.1.0
 * 
 * @todo check inputs for attributes
 */
abstract class Bitsy_Form_Abstract implements Bitsy_Form_IForm
{
    /*default values for form*/
    private $attributes = array(
        "name"      =>  "bitsy-form",
        "class"     =>  "bitsy-form",
        "id"        =>  "bitsy-form",
        "method"    =>  "post",
        "action"    =>  ""
    );
    private $elements = array();
    
    public function setName($name)
    {
        $this->attributes["name"] = $name;
        return $this;
    }
    
    public function setClass($class)
    {
        $this->attributes["class"] = $class;
        return $this;
    }
    
    public function setId($id)
    {
        $this->attributes["id"] = $id;
        return $this;
    }
    
    public function setMethod($method)
    {
        $this->attributes["method"] = $method;
        return $this;
    }
    
    public function setAction($action)
    {
        $this->attributes["action"] = $action;
        return $this;
    }
    
    public function setFileEnctype()
    {
        $this->attributes["enctype"] = "multipart/form-data";
        return $this;
    }

    public function addElement($element)
    {
        array_push($this->elements, $element);
    }
    
    public function __toString()
    {
        $html = "<form";
        if (isset($this->attributes["id"])) {
            $html .= ' id="' . $this->attributes["id"] . '" ';
        }
        if (isset($this->attributes["class"])) {
            $html .= ' class="' . $this->attributes["class"] . '" ';
        }
        if (isset($this->attributes["method"])) {
            $html .= ' method="' . $this->attributes["method"] . '" ';
        }
        if (isset($this->attributes["action"])) {
            $html .= ' action="' . $this->attributes["action"] . '" ';
        }
        if (isset($this->attributes["enctype"])) {
            $html .= ' enctype="' . $this->attributes["enctype"] . '" ';
        }
        $html .= ">";
        
        foreach($this->elements as $element) {
            $html .= $element->__toString();
        }
        $html .= "</form>";

        return $html;
    }
}

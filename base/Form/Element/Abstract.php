<?php

/**
 * Base class for elements of form.
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Element
 * @version 0.1.0
 */
class Bitsy_Form_Element_Abstract implements Bitsy_Form_Element_IElement
{
    /*
     * protected variables
     */
    protected $html = "";
    protected $attributes = array(
        "class"     =>  "bitsy-form-element",
        "id"        =>  "bitsy-form-element"
    );
    
    public function validate(){}
    
    public function __toString() 
    {
        $this->getHTML();
        return "<div>" . $this->html . "</div>";
    }
    
    protected function getHTML()
    {
        $this->setAttributes();
        $this->addWrapper();
    }
    
    protected function setAttributes()
    {
        if (isset($this->attributes["class"])) {
            $this->html .= ' class="' . $this->attributes["class"] . '" ';
        }
        if (isset($this->attributes["id"])) {
            $this->html .= ' id="' . $this->attributes["id"] . '" ';
        }
    }
    
    public function setClass(string $class)
    {
        $this->attributes["class"] = $class;
        return $this;
    }
    
    public function setId(string $id)
    {
        $this->attributes["id"] = $id;
        return $this;
    }
    
}

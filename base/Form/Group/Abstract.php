<?php

/**
 * Abstract class for group elements of forms.
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Group
 * @version 0.1.0
 */
class Bitsy_Form_Group_Abstract 
{
    /*
     * protected variables
     */
    protected $html = "";
    protected $elements = array();
    protected $attributes = array(
        "class"     =>  "bitsy-form-element",
        "id"        =>  "bitsy-form-element",
        "name"        =>  "bitsy-radio-button-group"
    );
    
    /**
     * Adds an element to the group.
     * 
     * @param type $element
     * @return \Bitsy_Form_Group_Abstract
     */
    public function addElement($element)
    {
        $this->elements[] = $element;
        return $this;
    }
    
    public function __toString() 
    {
        $this->getHTML();
        return "<div>" . $this->html . "</div>";
    }
    
    protected function getHTML()
    {
        $this->getElements();
        $this->addWrapper();
    }
    
    /**
     * Wrapps html with label.
     */
    protected function addWrapper()
    {
        if (isset($this->attributes["label"])) {
            $this->html = '<span class="bitsy-form-label">' . 
                    $this->attributes["label"] . "</span>" . $this->html;
        }
    }
    
    /**
     * Gets html of all elements.
     */
    protected function getElements()
    {
        $this->html .= "<p>";
        foreach($this->elements as $element) {
            $this->html .= $element->__toString();
        }
        $this->html .= "</p>";
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
    
    public function setLabel($label)
    {
        $this->attributes["label"] = $label;
        return $this;
    }
}

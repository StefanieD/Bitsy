<?php

/**
 * Base class for number input elements for forms.
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Number
 */
class Bitsy_Form_Element_Input_Number_Base extends Bitsy_Form_Element_Abstract
{
    /**
     * Wrapps html with tags of element.
     */
    protected function addWrapper()
    {
        if (isset($this->attributes["label"])) {
            $this->html = '<span class="bitsy-form-label">' . 
                    $this->attributes["label"] . "</span>" . $this->html;
        }
    }
    
    public function setSize($size)
    {
        $this->attributes["size"] = $size;
        return $this;
    }
    
    public function setName($name)
    {
        $this->attributes["name"] = $name;
        return $this;
    }
    
    public function setRange($min, $max)
    {
        $this->attributes["min"] = $min;
        $this->attributes["max"] = $max;
        return $this;
    }
    
    public function setValue($value)
    {
        $this->attributes["value"] = $value;
        return $this;
    }
    
    public function setLabel($label)
    {
        $this->attributes["label"] = $label;
        return $this;
    }
    
    /**
     * Gets html string with attributes of form element.
     * @return string
     */
    protected function setAttributes()
    {
        //get basic attributes
        $this->html .= parent::setAttributes();
        
        //getAttributes of button
        if (isset($this->attributes["name"])) {
            $this->html .= ' name="' . $this->attributes["name"] . '" ';
        }
        if (isset($this->attributes["size"])) {
            $this->html .= ' size="' . $this->attributes["size"] . '" ';
        }
        if (isset($this->attributes["min"])) {
            $this->html .= ' min="' . $this->attributes["min"] . '" ';
        }
        if (isset($this->attributes["max"])) {
            $this->html .= ' max="' . $this->attributes["max"] . '" ';
        }
        if (isset($this->attributes["value"])) {
            $this->html .= ' value="' . $this->attributes["value"] . '" ';
        }
    }
}

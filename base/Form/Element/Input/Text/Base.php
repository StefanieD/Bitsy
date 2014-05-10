<?php

/**
 * Base class for input text elements for forms.
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Text
 * @version 0.1.0
 */
class Bitsy_Form_Element_Input_Text_Base extends Bitsy_Form_Element_Abstract
{
	const ELEMENT_NAME = 'bitsy-text-element';
	
	private $attributes = array(
			"name"     =>  self::ELEMENT_NAME
	);
	
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
    
    public function setPlaceholder($placeholder)
    {
        $this->attributes["placeholder"] = $placeholder;
        return $this;
    }
    
    public function setRequired()
    {
        $this->attributes["required"] = true;
        return $this;
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
    
    public function setLabel($label)
    {
        $this->attributes["label"] = $label;
        return $this;
    }
    
    public function setValue($value)
    {
        $this->attributes["value"] = $value;
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
        if (isset($this->attributes["required"])) {
            $this->html .= ' required';
        }
        if (isset($this->attributes["placeholder"])) {
            $this->html .= ' placeholder="' . $this->attributes["placeholder"] . '" ';
        }
        if (isset($this->attributes["value"])) {
            $this->html .= ' value="' . $this->attributes["value"] . '" ';
        }
    }
}

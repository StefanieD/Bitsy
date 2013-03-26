<?php

/**
 * Description of Abstract
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package File
 * @version 0.1.0
 */
class Bitsy_Form_Element_File_Abstract extends Bitsy_Form_Element_Abstract
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
    
    public function setName($name)
    {
        $this->attributes["name"] = $name;
        return $this;
    }
    
    public function setSize($size)
    {
        $this->attributes["size"] = $size;
        return $this;
    }
    
    public function setMaxLength($length)
    {
        $this->attributes["maxLength"] = $length;
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
        if (isset($this->attributes["maxlength"])) {
            $this->html .= ' maxlength="' . $this->attributes["maxlength"] . '" ';
        }
    }
}

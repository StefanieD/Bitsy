<?php
/**
 * Class for form element with type button
 * 
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Element
 * @version 0.1.0
 * 
 */
class Bitsy_Form_Element_Button extends Bitsy_Form_Element_Abstract
{

    /**
     * Wrapps html with tags of element.
     */
    protected function addWrapper()
    {
        $this->html = "<input" . $this->html . ">";
    }
    
    public function setValue($value)
    {
        $this->attributes["value"] = $value;
        return $this;
    }
    
    public function setType($type)
    {
        $this->attributes["type"] = $type;
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
        if (isset($this->attributes["type"])) {
            $this->html .= ' type="' . $this->attributes["type"] . '" ';
        }
        if (isset($this->attributes["value"])) {
            $this->html .= ' value="' . $this->attributes["value"] . '" ';
        }
    }
}

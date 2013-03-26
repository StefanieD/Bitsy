<?php

/**
 * Class for form element with type textfield.
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Input
 * @version 0.1.0
 */
class Bitsy_Form_Element_Input_Textfield extends Bitsy_Form_Element_Input_Text_Base
{
    /**
     * Wrapps html with tags of element.
     */
    protected function addWrapper()
    {
        $this->html = '<input type="text"' . $this->html . ">";
        parent::addWrapper();
    }
    
    public function setMaxLength($length)
    {
        $this->attributes["maxLength"] = $length;
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
        if (isset($this->attributes["maxlength"])) {
            $this->html .= ' maxlength="' . $this->attributes["maxlength"] . '" ';
        }
    }
}

<?php

/**
 * Description of Checkbox
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Group
 * @version 0.1.0
 */
class Bitsy_Form_Group_Checkbox extends Bitsy_Form_Group_Abstract
{
    /**
     * Adds a new checkbox instance to group.
     * 
     * @param String $buttonValue
     * @param String $displayValue
     * @return \Bitsy_Form_Group_Radio
     */
    public function addCheckbox($checkboxValue, $displayValue)
    {
        $checkbox = new Bitsy_Form_Group_Button_Checkbox($checkboxValue, $displayValue);
        $checkbox->setName($this->attributes["name"]);
        $this->addElement($checkbox);
        return $this;
    }
    
    /**
     * Sets the name for all checkboxes.
     * 
     * @param String $name
     * @return \Bitsy_Form_Group_Checkbox
     */
    public function setName($name)
    {
        $this->attributes["name"] = $name;
        return $this;
    }
    
    /**
     * Gets a checkbox instance of group.
     * 
     * @param String $checkboxValue
     * @return \Bitsy_Form_Group_Button_Checkbox if exists, otherwise null
     */
    public function getCheckbox($checkboxValue)
    {
        foreach($this->elements as $element) {
            if($element->getValue() == $checkboxValue) {
                return $element;
            }
        }
        return null;
    }
}

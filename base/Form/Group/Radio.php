<?php

/**
 * Class for radio button group.
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Group
 * @version 0.1.0
 */
class Bitsy_Form_Group_Radio extends Bitsy_Form_Group_Abstract
{
    /**
     * Adds a new radio button instance to group.
     * 
     * @param String $buttonValue
     * @param String $displayValue
     * @return \Bitsy_Form_Group_Radio
     */
    public function addButton($buttonValue, $displayValue)
    {
        $radioButton = new Bitsy_Form_Group_Button_Radio($buttonValue, $displayValue);
        $radioButton->setName($this->attributes["name"]);
        $this->addElement($radioButton);
        return $this;
    }
    
    /**
     * Sets the name for all radio buttons.
     * 
     * @param String $name
     * @return \Bitsy_Form_Group_Radio
     */
    public function setName($name)
    {
        $this->attributes["name"] = $name;
        return $this;
    }
    
    /**
     * Gets a button instance of group.
     * 
     * @param String $buttonValue
     * @return \Bitsy_Form_Group_Button_Radio if exists, otherwise null
     */
    public function getButton($buttonValue)
    {
        foreach($this->elements as $element) {
            if($element->getValue() == $buttonValue) {
                return $element;
            }
        }
        return null;
    }
}

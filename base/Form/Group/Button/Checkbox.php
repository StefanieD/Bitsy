<?php

/**
 * Description of Checkbox
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Button
 * @version 0.1.0
 */
class Bitsy_Form_Group_Button_Checkbox
{
    /*
     * protected variables
     */
    protected $html = "";
    protected $attributes = array(
        "class"     =>  "bitsy-form-element",
        "id"        =>  "bitsy-form-element"
    );
    
    /*
     * private variables
     */
    private $value = "checkbox";
    private $displayValue = "checkbox";
    private $name;
    
    /**
     * Creates an instance of checkbox.
     * 
     * @param String $checkboxValue
     * @param String $displayValue
     */
    public function __construct($checkboxValue, $displayValue)
    {
        $this->value = $checkboxValue;
        $this->displayValue = $displayValue;
    }
    
    public function __toString() 
    {
        $this->setAttributes();
        $this->addWrapper();
        return $this->html;
    }
    
    /**
     * Wrapps html with tags of element.
     */
    protected function addWrapper()
    {
        $this->html = '<input type="checkbox"' . $this->html . "> " . 
                $this->displayValue . "</br>";
    }
    
    protected function setAttributes()
    {
        if (isset($this->attributes["class"])) {
            $this->html .= ' class="' . $this->attributes["class"] . '" ';
        }
        if (isset($this->attributes["id"])) {
            $this->html .= ' id="' . $this->attributes["id"] . '" ';
        }
        if (isset($this->attributes["checked"])) {
            $this->html .= ' checked="checked" ';
        }
        $this->html .= ' name="' . $this->name . '" ';
        $this->html .= ' value="' . $this->value . '" ';
    }
    
    public function getValue()
    {
        return $this->value;
    }
    
    public function getDisplayValue()
    {
        return $this->displayValue;
    }
    
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    public function setChecked()
    {
        $this->attributes["checked"] = true;
        return $this;
    }
}

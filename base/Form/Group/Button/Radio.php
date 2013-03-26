<?php

/**
 * Class for radio button instance.
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Button
 * @version 0.1.0
 */
class Bitsy_Form_Group_Button_Radio
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
    private $value = "radio";
    private $displayValue = "radio";
    private $name;
    
    /**
     * Creates an instance of radio button.
     * 
     * @param String $buttonValue
     * @param String $displayValue
     */
    public function __construct($buttonValue, $displayValue)
    {
        $this->value = $buttonValue;
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
        $this->html = '<input type="radio"' . $this->html . "> " . 
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

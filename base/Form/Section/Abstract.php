<?php

/**
 * Description of Abstract
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Section
 * @version 0.1.0
 */
class Bitsy_Form_Section_Abstract implements Bitsy_Form_Section_ISection
{
    protected $html = "";
    protected $elements = array();
    protected $attributes = array(
        "class"     =>  "bitsy-fieldset",
        "id"        =>  "bitsy-fieldset"
    );
    
    public function addElement(Bitsy_Form_Element_Abstract $element)
    {
        array_push($this->elements, $element);
    }

    public function __toString() 
    {
        $this->getHTML();
        return "<div>" . $this->html . "</div>";
    }
    
    protected function getHTML()
    {
        $this->setAttributes();
        $this->addWrapper();
    }
    
    protected function setAttributes()
    {
        if (isset($this->attributes["class"])) {
            $this->html .= ' class="' . $this->attributes["class"] . '" ';
        }
        if (isset($this->attributes["id"])) {
            $this->html .= ' id="' . $this->attributes["id"] . '" ';
        }
    }
    
}

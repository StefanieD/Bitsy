<?php

/**
 * Class for fieldsets of forms.
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @version 0.1.0
 * @package Section
 */
class Bitsy_Form_Section_Fieldset extends Bitsy_Form_Section_Abstract
{
    /**
     * Wrapps html with tags of element.
     */
    protected function addWrapper()
    {
        $this->html = "<fieldset " . $this->html . ">"; 
        
        if(isset($this->attributes["legend"])) {
            $this->html .= "<legend>" . $this->attributes["legend"] . "</legend>";
        }
        
        foreach($this->elements as $element) {
            $this->html .= $element->__toString();
        }
        
        $this->html . "</fieldset>";
    }
    
    public function setLegend($legend)
    {
        $this->attributes["legend"] = $legend;
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
    }
}

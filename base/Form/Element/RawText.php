<?php

/**
 * Class for Element RawText in Bitsy_Forms.
 * 
 * This type of element enables to include raw text sections into forms.
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Element
 * @version 0.1.0
 */
class Bitsy_Form_Element_RawText extends Bitsy_Form_Element_Abstract
{
    protected $content = "";
    
    /**
     * Wrapps html with tags of element.
     */
    protected function addWrapper()
    {
        $this->html = "<p" . $this->html . ">" . $this->content . "</p>";
    }
    
    public function setContent($content)
    {
        $this->content = $content;
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
        if (isset($this->attributes["content"])) {
            $this->html .= $this->attributes["content"];
        }
    }
}

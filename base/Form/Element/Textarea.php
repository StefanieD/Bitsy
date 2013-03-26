<?php

/**
 * Description of Textarea
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Element
 */
class Bitsy_Form_Element_Textarea extends Bitsy_Form_Element_Abstract
{
    /**
     * Wrapps html with tags of element.
     */
    protected function addWrapper()
    {
        $this->html = "<textarea " . $this->html . ">";
        
        if (isset($this->attributes["value"])) {
            $this->html .= $this->attributes["value"];
        }        
        
        $this->html .= "</textarea>";
        
        if (isset($this->attributes["label"])) {
            $this->html = '<span class="bitsy-form-label">' . 
                    $this->attributes["label"] . "</span>" . $this->html;
        }
    }
    
    public function setPlaceholder($placeholder)
    {
        $this->attributes["placeholder"] = $placeholder;
        return $this;
    }
    
    public function setValue($value)
    {
        $this->attributes["value"] = $value;
        return $this;
    }
    
    public function setLabel($label)
    {
        $this->attributes["label"] = $label;
        return $this;
    }
    
    public function setName($name)
    {
        $this->attributes["name"] = $name;
        return $this;
    }
    
    public function setCols($cols)
    {
        $this->attributes["cols"] = $cols;
        return $this;
    }
    
    public function setRows($rows)
    {
        $this->attributes["rows"] = $rows;
        return $this;
    }
    
    public function setReadonly()
    {
        $this->attributes["readonly"] = true;
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
        
        //getAttributes of textarea
        if (isset($this->attributes["name"])) {
            $this->html .= ' name="' . $this->attributes["name"] . '" ';
        }
        if (isset($this->attributes["cols"])) {
            $this->html .= ' cols="' . $this->attributes["cols"] . '" ';
        }
        if (isset($this->attributes["rows"])) {
            $this->html .= ' rows="' . $this->attributes["rows"] . '" ';
        }
        if (isset($this->attributes["placeholder"])) {
            $this->html .= ' placeholder="' . $this->attributes["placeholder"] . '" ';
        }
        if (isset($this->attributes["readonly"])) {
            $this->html .= ' readonly';
        }
    }
}

<?php

/**
 * Description of MultipleUpload
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package File
 * @version 0.1.0
 */
class Bitsy_Form_Element_File_MultipleUpload extends Bitsy_Form_Element_File_Abstract
{
    /**
     * Wrapps html with tags of element.
     */
    protected function addWrapper()
    {
        $this->html = '<input type="file"' . $this->html . " multiple>";
        parent::addWrapper();
    }
    
    public function setName($name)
    {
        $this->attributes["name"] = $name . "[]";
        return $this;
    }
}

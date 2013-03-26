<?php

/**
 * Description of Url
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Input
 * @version 0.1.0
 */
class Bitsy_Form_Element_Input_Url extends Bitsy_Form_Element_Input_Text_Base
{
    /**
     * Wrapps html with tags of element.
     */
    protected function addWrapper()
    {
        $this->html = '<input type="url"' . $this->html . ">";
        parent::addWrapper();
    }
}

<?php

/**
 * Class for email textfiled in forms.
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Input
 * @version 0.1.0
 */
class Bitsy_Form_Element_Input_Email extends Bitsy_Form_Element_Input_Text_Base
{
    /**
     * Wrapps html with tags of element.
     */
    protected function addWrapper()
    {
        $this->html = '<input type="email"' . $this->html . ">";
        parent::addWrapper();
    }
}

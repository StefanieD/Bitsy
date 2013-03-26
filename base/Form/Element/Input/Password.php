<?php

/**
 * Description of Password
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Input
 */
class Bitsy_Form_Element_Input_Password extends Bitsy_Form_Element_Input_Text_Base
{
    /**
     * Wrapps html with tags of element.
     */
    protected function addWrapper()
    {
        $this->html = '<input type="password"' . $this->html . ">";
        parent::addWrapper();
    }
}

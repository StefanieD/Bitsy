<?php

/**
 * Description of Number
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Input
 * @version 0.1.0
 */
class Bitsy_Form_Element_Input_Number extends Bitsy_Form_Element_Input_Number_Base
{
    /**
     * Wrapps html with tags of element.
     */
    protected function addWrapper()
    {
        $this->html = '<input type="number"' . $this->html . ">";
        parent::addWrapper();
    }
}

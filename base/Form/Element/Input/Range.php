<?php

/**
 * Description of Range
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Input
 * @version 0.1.0
 */
class Bitsy_Form_Element_Input_Range extends Bitsy_Form_Element_Input_Number_Base
{
    /**
     * Wrapps html with tags of element.
     */
    protected function addWrapper()
    {
        $this->html = '<input type="range"' . $this->html . ">";
        parent::addWrapper();
    }
}

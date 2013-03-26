<?php

/**
 * Interface for sections within Bitsy_Forms.
 * 
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @version 0.1.0
 * @package Section
 */
interface Bitsy_Form_Section_ISection
{
    public function addElement(Bitsy_Form_Element_Abstract $element);
    public function __toString();
}

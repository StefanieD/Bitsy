<?php

/**
 * Interface for all form-elements.
 * 
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package Element
 * @version 0.1.0
 */
interface Bitsy_Form_Element_IElement
{
    public function validate();
    public function __toString();
    
}

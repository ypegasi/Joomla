<?php

/**
-------------------------------------------------------------------------
lovefactory - Love Factory 4.4.7
-------------------------------------------------------------------------
 * @author thePHPfactory
 * @copyright Copyright (C) 2011 SKEPSIS Consult SRL. All Rights Reserved.
 * @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * Websites: http://www.thePHPfactory.com
 * Technical Support: Forum - http://www.thePHPfactory.com/forum/
-------------------------------------------------------------------------
*/

namespace ThePhpFactory\LoveFactory\Renderer;

defined('_JEXEC') or die;

use LoveFactoryField as Field;

abstract class FieldRendererInterface
{
    protected $mode;

    public abstract function render(Field $field);

    protected function getClasses(Field $field, $mode)
    {
        $classes = array();

        if (!$field->hasLabel($mode)) {
            $classes[] = 'no-label';
        }

        if (false !== $field->getCustomCss($mode)) {
            $classes[] = $field->getContainerHtmlClass();
        }

        return $classes;
    }
}

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

namespace ThePhpFactory\LoveFactory\Security\Rules;

defined('_JEXEC') or die;

use ThePhpFactory\LoveFactory\Security\Exceptions\Redirect;
use ThePhpFactory\LoveFactory\Security\Rule;

class InteractionsEnabled extends Rule
{
    public function authorize(\JUser $user)
    {
        $settings = \LoveFactoryApplication::getInstance()->getSettings();

        if (!$settings->enable_interactions) {
            $exception = new Redirect(
                \FactoryText::_('restriction_interactionsenabled_error_message')
            );

            throw $exception;
        }
    }
}

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

namespace ThePhpFactory\LoveFactory\Restrictions\Type;

defined('_JEXEC') or die;

use ThePhpFactory\LoveFactory\Restrictions\BooleanRestriction;
use ThePhpFactory\LoveFactory\Restrictions\Restriction;

class AvatarAccess extends Restriction implements BooleanRestriction
{
    protected $restrictionName = 'avatar_access';
    protected $restrictionMessage = 'membership_restriction_error_avatar_access';

    public function isAllowed($userId, $photoUserId)
    {
        if (\JFactory::getApplication()->isAdmin()) {
            return true;
        }

        if ($userId == $photoUserId) {
            return true;
        }

        $restriction = $this->getCurrentMembershipRestriction($userId);

        if (!$restriction) {
            throw new \Exception(\FactoryText::_($this->getRestrictionMessage()));
        }

        return true;
    }
}

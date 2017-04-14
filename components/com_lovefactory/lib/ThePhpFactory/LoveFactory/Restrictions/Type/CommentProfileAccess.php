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

class CommentProfileAccess extends Restriction implements BooleanRestriction
{
    protected $restrictionName = 'comment_profile_access';
    protected $restrictionMessage = 'membership_restriction_error_comment_profile_access';

    public function isAllowed($userId)
    {
        $restriction = $this->getCurrentMembershipRestriction($userId);

        if (!$restriction) {
            throw new \Exception(\FactoryText::_($this->getRestrictionMessage()));
        }

        return true;
    }
}
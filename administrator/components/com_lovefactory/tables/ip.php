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

defined('_JEXEC') or die;

class TableIp extends JTable
{
    public function __construct(&$db)
    {
        parent::__construct('#__lovefactory_ips', 'id', $db);
    }

    public function check()
    {
        if (!parent::check()) {
            return false;
        }

        $this->updated_at = JFactory::getDate()->toSql();

        if (is_null($this->id)) {
            $this->created_at = JFactory::getDate()->toSql();
        }

        return true;
    }
}

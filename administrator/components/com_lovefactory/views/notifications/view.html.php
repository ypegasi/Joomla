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

class BackendViewNotifications extends FactoryView
{
    protected
        $get = array('items', 'pagination', 'state'),
        $buttons = array('add', 'edit', '', 'publish', 'unpublish', 'delete'),
        $css = array('admin/main');
}

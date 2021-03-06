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

class BackendViewReport extends FactoryView
{
    protected
        $get = array('item', 'form', 'state'),
        $buttons = array('apply', 'save', array('save2next', 'save2next', 'save', false), 'close'),
        $behaviors = array('tooltip'),
        $title = 'id',
        $css = array('admin/main');
}

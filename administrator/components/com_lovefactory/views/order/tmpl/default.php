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

?>

<form action="<?php echo JRoute::_('index.php?option=com_lovefactory&layout=edit&id=' . (int)$this->item->id); ?>"
      method="post" name="adminForm" id="adminForm" class="form-validate">

    <div class="width-50 fltlft">
        <fieldset class="adminform">
            <legend><?php echo JText::sprintf('JDETAILS', $this->item->id); ?></legend>

            <ul class="adminformlist">
                <?php foreach ($this->form->getFieldset('details') as $field): ?>
                    <li><?php echo $field->label; ?>
                        <?php echo $field->input; ?></li>
                <?php endforeach; ?>
            </ul>

            <div class="clr"></div>
        </fieldset>
    </div>

    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="controller" value=""/>
    <?php echo JHtml::_('form.token'); ?>

    <div class="clr"></div>
</form>

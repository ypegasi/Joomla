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

jimport('joomla.application.component.controlleradmin');

class BackendControllerOrders extends JControllerAdmin
{
    protected $option = 'com_lovefactory';

    public function __construct($config = array())
    {
        parent::__construct($config);

        $this->registerTask('fail', 'changeStatus');
        $this->registerTask('complete', 'changeStatus');
        $this->registerTask('paid', 'changePaid');
        $this->registerTask('unpaid', 'changePaid');
    }

    public function getModel($name = 'Order', $prefix = 'BackendModel', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);;
    }

    public function changeStatus()
    {
        // Check for request forgeries
        JSession::checkToken() or die(JText::_('JINVALID_TOKEN'));

        $session = JFactory::getSession();
        $registry = $session->get('registry');

        // Get items to publish from the request.
        $cid = JFactory::getApplication()->input->get('cid', array(), 'array');
        $data = array('complete' => 20, 'fail' => 30);
        $task = $this->getTask();
        $value = JArrayHelper::getValue($data, $task, 0, 'int');
        $msg = null;

        if (empty($cid)) {
            throw new Exception(JText::_($this->text_prefix . '_NO_ITEM_SELECTED'), 500);
        } else {
            // Get the model.
            $model = $this->getModel();

            // Make sure the item ids are integers
            JArrayHelper::toInteger($cid);

            // Publish the items.
            $return = $model->changeStatus($cid, $value);
            $completed = $model->getState('completed', 0);

            if (!$completed || !$return) {
                throw new Exception($model->getError(), 500);
            }

            if ($completed) {
                if ($value == 20) {
                    $ntext = $this->text_prefix . '_N_ITEMS_MARKED_AS_COMPLETED';
                } else {
                    $ntext = $this->text_prefix . '_N_ITEMS_MARKED_AS_FAILED';
                }

                $msg = JText::plural($ntext, $completed);
            }
        }

        $this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=orders', false), $msg);
    }

    public function changePaid()
    {
        // Check for request forgeries
        JSession::checkToken() or die(JText::_('JINVALID_TOKEN'));

        $session = JFactory::getSession();
        $registry = $session->get('registry');

        // Get items to publish from the request.
        $cid = JFactory::getApplication()->input->get('cid', array(), 'array');
        $data = array('paid' => 1, 'unpaid' => 0);
        $task = $this->getTask();
        $value = JArrayHelper::getValue($data, $task, 0, 'int');
        $msg = null;

        if (empty($cid)) {
            throw new Exception(JText::_($this->text_prefix . '_NO_ITEM_SELECTED'), 500);
        } else {
            // Get the model.
            $model = $this->getModel();

            // Make sure the item ids are integers
            JArrayHelper::toInteger($cid);

            // Publish the items.
            $return = $model->changePaid($cid, $value);
            $completed = $model->getState('completed', 0);

            if (!$completed || !$return) {
                throw new Exception($model->getError(), 500);
            }

            if ($completed) {
                if ($value == 20) {
                    $ntext = $this->text_prefix . '_N_ITEMS_MARKED_AS_PAID';
                } else {
                    $ntext = $this->text_prefix . '_N_ITEMS_MARKED_AS_NOT_PAID';
                }

                $msg = JText::plural($ntext, $completed);
            }
        }

        $this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=orders', false), $msg);
    }
}

<?php
/**
 * SAGIPL
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * 
 * @category   	SAGIPL
 * @package	Lavi_News
 * @copyright  	Copyright (c) 2014 SAGIPL. (http://www.sagipl.com/)
 * @license	http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Free Shipping Offer Message
 *
 * @category	SAGIPL
 * @package	Lavi_News
 * @author	Navneet <navneet.kshk@gmail.com>
 */
 
class Lavi_News_Block_Adminhtml_News_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Initialize edit form container
     *
     */
    public function __construct()
    {
        $this->_objectId   = 'id';
        $this->_blockGroup = 'lavi_news';
        $this->_controller = 'adminhtml_news';

        parent::__construct();

        if (Mage::helper('lavi_news/admin')->isActionAllowed('save')) {
            $this->_updateButton('save', 'label', Mage::helper('lavi_news')->__('Save News Item'));
            $this->_addButton('saveandcontinue', array(
                'label'   => Mage::helper('adminhtml')->__('Save and Continue Edit'),
                'onclick' => 'saveAndContinueEdit()',
                'class'   => 'save',
            ), -100);
        } else {
            $this->_removeButton('save');
        }

        if (Mage::helper('lavi_news/admin')->isActionAllowed('delete')) {
            $this->_updateButton('delete', 'label', Mage::helper('lavi_news')->__('Delete News Item'));
        } else {
            $this->_removeButton('delete');
        }

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('page_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'page_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'page_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    /**
     * Retrieve text for header element depending on loaded page
     *
     * @return string
     */
    public function getHeaderText()
    {
        $model = Mage::helper('lavi_news')->getNewsItemInstance();
        if ($model->getId()) {
            return Mage::helper('lavi_news')->__("Edit News Item '%s'",
                 $this->escapeHtml($model->getTitle()));
        } else {
            return Mage::helper('lavi_news')->__('New News Item');
        }
    }
}
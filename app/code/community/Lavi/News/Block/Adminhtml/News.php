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
 
class Lavi_News_Block_Adminhtml_News extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Block constructor
     */
    public function __construct()
    {
        $this->_blockGroup = 'lavi_news';
        $this->_controller = 'adminhtml_news';
        $this->_headerText = Mage::helper('lavi_news')->__('Manage News');

        parent::__construct();

        if (Mage::helper('lavi_news/admin')->isActionAllowed('save')) {
            $this->_updateButton('add', 'label', Mage::helper('lavi_news')->__('Add New News'));
        } else {
            $this->_removeButton('add');
        }
        $this->addButton(
            'news_flush_images_cache',
            array(
                'label'      => Mage::helper('lavi_news')->__('Flush Images Cache'),
                'onclick'    => 'setLocation(\'' . $this->getUrl('*/*/flush') . '\')',
            )
        );

    }
}
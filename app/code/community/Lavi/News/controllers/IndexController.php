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
 
class Lavi_News_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * Pre dispatch action that allows to redirect to no route page in case of disabled extension through admin panel
     */
    public function preDispatch()
    {
        parent::preDispatch();
        
        if (!Mage::helper('lavi_news')->isEnabled()) {
            $this->setFlag('', 'no-dispatch', true);
            $this->_redirect('noRoute');
        }        
    }
    
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->loadLayout();

        $listBlock = $this->getLayout()->getBlock('news.list');

        if ($listBlock) {
            $currentPage = abs(intval($this->getRequest()->getParam('p')));
            if ($currentPage < 1) {
                $currentPage = 1;
            }
            $listBlock->setCurrentPage($currentPage);
        }

        $this->renderLayout();
    }

    /**
     * News view action
     */
    public function viewAction()
    {
        $newsId = $this->getRequest()->getParam('id');
        if (!$newsId) {
            return $this->_forward('noRoute');
        }

        /** @var $model Lavi_News_Model_News */
        $model = Mage::getModel('lavi_news/news');
        $model->load($newsId);

        if (!$model->getId()) {
            return $this->_forward('noRoute');
        }

        Mage::register('news_item', $model);
        
        Mage::dispatchEvent('before_news_item_display', array('news_item' => $model));

        $this->loadLayout();
        $itemBlock = $this->getLayout()->getBlock('news.item');
        if ($itemBlock) {
            $listBlock = $this->getLayout()->getBlock('news.list');
            if ($listBlock) {
                $page = (int)$listBlock->getCurrentPage() ? (int)$listBlock->getCurrentPage() : 1;
            } else {
                $page = 1;
            }
            $itemBlock->setPage($page);
        }
        $this->renderLayout();
    }
}
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
 
class Lavi_News_Model_Observer
{
    /**
     * Event before show news item on frontend
     * If specified new post was added recently (term is defined in config) we'll see message about this on front-end.
     *
     * @param Varien_Event_Observer $observer
     */
    public function beforeNewsDisplayed(Varien_Event_Observer $observer)
    {
        $newsItem = $observer->getEvent()->getNewsItem();
        $currentDate = Mage::app()->getLocale()->date();
        $newsCreatedAt = Mage::app()->getLocale()->date(strtotime($newsItem->getCreatedAt()));
        $daysDifference = $currentDate->sub($newsCreatedAt)->getTimestamp() / (60 * 60 * 24);
        if ($daysDifference < Mage::helper('lavi_news')->getDaysDifference()) {
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('lavi_news')->__('Recently added'));
        }
    }
}
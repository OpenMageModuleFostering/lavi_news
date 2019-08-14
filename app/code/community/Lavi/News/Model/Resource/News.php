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
 
class Lavi_News_Model_Resource_News extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Initialize connection and define main table and primary key
     */
    protected function _construct()
    {
        $this->_init('lavi_news/news', 'news_id');
    }
}
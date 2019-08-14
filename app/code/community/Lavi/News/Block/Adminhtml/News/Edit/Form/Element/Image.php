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
 
class Lavi_News_Block_Adminhtml_News_Edit_Form_Element_Image extends Varien_Data_Form_Element_Image
{
    /**
     * Get image preview url
     *
     * @return string
     */
    protected function _getUrl()
    {
        $url = false;
        if ($this->getValue()) {
            $url = Mage::helper('lavi_news/image')->getBaseUrl() . '/' . $this->getValue();
        }
        return $url;
    }
}
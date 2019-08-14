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
 
$installer = $this;

/**
 * Creating table lavi_news
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('lavi_news/news'))
    ->addColumn('news_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned' => true,
        'identity' => true,
        'nullable' => false,
        'primary'  => true,
    ), 'Entity id')
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable' => true,
    ), 'Title')
    ->addColumn('author', Varien_Db_Ddl_Table::TYPE_TEXT, 63, array(
        'nullable' => true,
        'default'  => null,
    ), 'Author')
    ->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        'nullable' => true,
        'default'  => null,
    ), 'Content')
    ->addColumn('image', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => true,
        'default'  => null,
    ), 'News image media path')
    ->addColumn('published_at', Varien_Db_Ddl_Table::TYPE_DATE, null, array(
        'nullable' => true,
        'default'  => null,
    ), 'World publish date')
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable' => true,
        'default'  => null,
    ), 'Creation Time')
    ->addIndex($installer->getIdxName(
            $installer->getTable('lavi_news/news'),
            array('published_at'),
            Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX
        ),
        array('published_at'),
        array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX)
    )
    ->setComment('News item');

$installer->getConnection()->createTable($table);

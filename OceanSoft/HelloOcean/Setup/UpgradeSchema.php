<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/13/2018
 * Time: 11:05 PM
 */

namespace OceanSoft\HelloOcean\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{


    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */
    public function upgrade(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    )
    {
        $installer = $setup;
        $installer->startSetup();


        if (version_compare($context->getVersion(), '1.1.2', '<')) {

            $installer->getConnection()->addColumn(
                $installer->getTable('posts'),
                'observer',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'unsigned' => true,
                    'comment' => 'Observer'
                ]
            );
            $table = $installer->getConnection()->newTable(
                $installer->getTable('storeview')
            )->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Store View ID'
            )->addColumn(
                'post_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true,],
                'Post ID'
            )->addColumn(
                'store_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true,],
                'Store ID'
            )->addForeignKey(
                    $installer->getFkName(
                        'storeview',
                        'post_id',
                        'posts',
                        'id'
                    ),
                    'post_id', $installer->getTable('posts'), 'id',
                    \Magento\Framework\Db\Ddl\Table::ACTION_SET_NULL
                )
                ->addForeignKey(
                    $installer->getFkName(
                        'storeview',
                        'store_id',
                        'store',
                        'store_id'
                    ),
                    'store_id', $installer->getTable('store'), 'store_id',
                    \Magento\Framework\Db\Ddl\Table::ACTION_SET_NULL
                );
            $installer->getConnection()->createTable($table);
            $installer->endSetup();
        }
    }
}
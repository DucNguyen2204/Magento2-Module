<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Created By : Rohan Hapani
 */
namespace Rh\Blog\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {

        $installer = $setup;

        $installer->startSetup();
        /**
         * Create table 'faq_manage'
         */
        if (!$installer->tableExists('faq_manage')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('faq_manage')
            )->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'nullable' => false,
                    'primary' => true,
                    'unsigned' => true,
                ],
                'ID'
            )->addColumn(
                'title',
                Table::TYPE_VARCHAR,
                255,
                [
                    'nullable => false',
                ],
                'Title'
            )->addColumn(
                'description',
                Table::TYPE_TEXT,
                '255',
                [
                    'nullable => false',
                ],
                'Description'
            )->addColumn(
                'image',
                Table::TYPE_VARCHAR,
                '2M',
                [],
                'Image'
            )->addColumn(
                'status',
                Table::TYPE_SMALLINT,
                null,
                [
                    'nullable' => false,
                ],
                'Status'
            )->addColumn(
                'updated_at',
                Table::TYPE_DATETIME,
                null,
                [
                    'nullable' => false,
                    'default' => Table::TIMESTAMP_INIT,
                ],
                'Updated At'
            )->addColumn(
                'created_at',
                Table::TYPE_DATETIME,
                null,
                [
                    'nullable' => false,
                    'default' => Table::TIMESTAMP_INIT,
                ],
                'Created At'
            )->setComment('Blog Table');
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}

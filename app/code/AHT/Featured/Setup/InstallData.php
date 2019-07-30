<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AHT\Featured\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
* @codeCoverageIgnore
*/
class InstallData implements InstallDataInterface
{
    /**
     * Eav setup factory
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Init
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(\Magento\Eav\Setup\EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create();
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'is_featured',
            [
                'group' => 'General',
                'type' => 'int',               
                'backend' => '',                
                'frontend' => '',                
                'label' => 'Featured Product',                
                'input' => 'boolean',                
                'class' => '',                
                'source' => '',               
                'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_GLOBAL,                
                'visible' => true,                
                'required' => false,                
                'user_defined' => true,                
                'default' => '',               
                'searchable' => false,               
                'filterable' => false,               
                'comparable' => false,                
                'visible_on_front' => false,               
                'used_in_product_listing' => true,                
                'unique' => false,               
                'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
            ]
        );
    }
}

<?php
namespace AHT\Featured\Model\ResourceModel\Product;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';

    protected function _construct()
    {
        $this->_init('AHT\Featured\Model\Product','AHT\Featured\Model\ResourceModel\Product');
    }
}
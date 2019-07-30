<?php
namespace Blog\Post\Model\ResourceModel\Contact;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'contact_id';

    protected function _construct()
    {
        $this->_init('Blog\Post\Model\Contact','Blog\Post\Model\ResourceModel\Contact');
    }
}
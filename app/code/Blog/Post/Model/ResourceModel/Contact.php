<?php
namespace Blog\Post\Model\ResourceModel;

class Contact extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('aht_blog_contact','contact_id');
    }
}

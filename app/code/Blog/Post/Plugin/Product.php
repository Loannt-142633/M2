<?php
 
namespace Blog\Post\Plugin;
 
class Product
{
    public function getPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        return $result;
    }
    
}
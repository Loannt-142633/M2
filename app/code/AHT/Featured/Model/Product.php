<?php
namespace AHT\Featured\Model;

use AHT\Featured\Api\Data\ProductInterface;

class Product extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, ProductInterface
{
	const CACHE_TAG = 'catalog_product_entity';

	protected $_cacheTag = 'catalog_product_entity';

	protected $_eventPrefix = 'catalog_product_entity';

	protected function _construct()
	{
		$this->_init('AHT\Featured\Model\ResourceModel\Product');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}

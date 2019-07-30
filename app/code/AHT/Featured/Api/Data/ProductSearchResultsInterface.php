<?php


namespace AHT\Featured\Api\Data;

interface ProductSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Post list.
     * @return \AHT\AHT\Api\Data\PostInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \AHT\AHT\Api\Data\PostInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

<?php

namespace AHT\Featured\Model;

use AHT\Featured\Api\Data;
use AHT\Featured\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use AHT\Featured\Model\ResourceModel\Product as ResourceProduct;
use AHT\Featured\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;
/**
 * Class PostRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var ResourcePost
     */
    protected $resource;

    /**
     * @var PostFactory
     */
    protected $ProductFactory;

    /**
     * @var PostCollectionFactory
     */
    protected $ProductCollectionFactory;

    /**
     * @var Data\PostSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;
    /**
     * @param ResourcePost $resource
     * @param PostFactory $PostFactory
     * @param Data\PostInterfaceFactory $dataPostFactory
     * @param PostCollectionFactory $PostCollectionFactory
     * @param Data\PostSearchResultsInterfaceFactory $searchResultsFactory
     */
    private $collectionProcessor;

    public function __construct(
        ResourceProduct $resource,
        ProductFactory $ProductFactory,
        Data\ProductInterfaceFactory $dataProductFactory,
        ProductCollectionFactory $ProductCollectionFactory
    ) {
        $this->resource = $resource;
        $this->ProductFactory = $ProductFactory;
        $this->ProductCollectionFactory = $ProductCollectionFactory;
        // $this->searchResultsFactory = $searchResultsFactory;
        // $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();
    }

    /**
     * Save Post data
     *
     * @param \AHT\Blog\Api\Data\PostInterface $Post
     * @return Post
     * @throws CouldNotSaveException
     */
    public function save(\AHT\Featured\Api\Data\ProductInterface $Product)
    {
       
        try {
            $this->resource->save($Product);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Post: %1', $exception->getMessage()),
                $exception
            );
        }
        return $Product;
    }

    /**
     * Load Post data by given Post Identity
     *
     * @param string $PostId
     * @return Post
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($ProductId)
    {
        $Product = $this->ProductFactory->create();
        $Product->load($ProductId);
        if (!$Product->getId()) {
            throw new NoSuchEntityException(__('The CMS Post with the "%1" ID doesn\'t exist.', $ProductId));
        }
        return $Product;
    }

    /**
     * Load Post data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \AHT\Blog\Api\Data\PostSearchResultsInterface
     */
    public function getList()
    {
        /** @var \AHT\Blog\Model\ResourceModel\Post\Collection $collection */
        $collection = $this->ProductCollectionFactory->create();
        return $collection;
    }

    /**
     * Delete Post
     *
     * @param \AHT\Blog\Api\Data\PostInterface $Post
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(\AHT\Featured\Api\Data\ProductInterface $Product)
    {
        try {
            $this->resource->delete($Product);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Post: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete Post by given Post Identity
     *
     * @param string $PostId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($ProductId)
    {
        return $this->delete($this->getById($ProductId));
    }
}

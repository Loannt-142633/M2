<?php

namespace Blog\Post\Model;

use Blog\Post\Api\Data;
use Blog\Post\Api\ContactRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Blog\Post\Model\ResourceModel\Contact as ResourceContact;
use Blog\Post\Model\ResourceModel\Contact\CollectionFactory as ContactCollectionFactory;
/**
 * Class PostRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ContactRepository implements ContactRepositoryInterface
{
    /**
     * @var ResourcePost
     */
    protected $resource;

    /**
     * @var PostFactory
     */
    protected $ContactFactory;

    /**
     * @var PostCollectionFactory
     */
    protected $ContactCollectionFactory;

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
        ResourceContact $resource,
        ContactFactory $ContactFactory,
        Data\ContactInterfaceFactory $dataContactFactory,
        ContactCollectionFactory $ContactCollectionFactory
    ) {
        $this->resource = $resource;
        $this->ContactFactory = $ContactFactory;
        $this->ContactCollectionFactory = $ContactCollectionFactory;
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
    public function save(\Blog\Post\Api\Data\ContactInterface $Contact)
    {
       
        try {
            $this->resource->save($Contact);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Post: %1', $exception->getMessage()),
                $exception
            );
        }
        return $Contact;
    }

    /**
     * Load Post data by given Post Identity
     *
     * @param string $PostId
     * @return Post
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($ContactId)
    {
        $Contact = $this->ContactFactory->create();
        $Contact->load($ContactId);
        if (!$Contact->getId()) {
            throw new NoSuchEntityException(__('The CMS Post with the "%1" ID doesn\'t exist.', $ContactId));
        }
        return $Contact;
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
        $collection = $this->ContactCollectionFactory->create();
        return $collection;
    }

    /**
     * Delete Post
     *
     * @param \AHT\Blog\Api\Data\PostInterface $Post
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(\Blog\Post\Api\Data\ContactInterface $Contact)
    {
        try {
            $this->resource->delete($Contact);
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
    public function deleteById($ContactId)
    {
        return $this->delete($this->getById($ContactId));
    }
}

<?php

namespace Blog\Post\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ContactRepositoryInterface
{
    /**
     * Save Post.
     *
     * @param \AHT\Blog\Api\Data\PostInterface $Post
     * @return \AHT\Blog\Api\Data\PostInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Blog\Post\Api\Data\ContactInterface $Contact);

    /**
     * Retrieve Post.
     *
     * @param int $PostId
     * @return \AHT\Blog\Api\Data\PostInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($ContactId);

    /**
     * Retrieve Posts matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \AHT\Blog\Api\Data\PostSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    // public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Post.
     *
     * @param \AHT\Blog\Api\Data\PostInterface $Post
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\Blog\Post\Api\Data\ContactInterface $Contact);

    /**
     * Delete Post by ID.
     *
     * @param int $PostId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($ContactId);
}

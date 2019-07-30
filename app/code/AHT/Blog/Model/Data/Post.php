<?php


namespace AHT\Blog\Model\Data;

use AHT\Blog\Api\Data\PostInterface;

class Post extends \Magento\Framework\Api\AbstractExtensibleObject implements PostInterface
{

    /**
     * Get post_id
     * @return string|null
     */
    public function getPostId()
    {
        return $this->_get(self::POST_ID);
    }

    /**
     * Set post_id
     * @param string $postId
     * @return \AHT\Blog\Api\Data\PostInterface
     */
    public function setPostId($postId)
    {
        return $this->setData(self::POST_ID, $postId);
    }

    /**
     * Get name
     * @return string|null
     */
    public function getName()
    {
        return $this->_get(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \AHT\Blog\Api\Data\PostInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \AHT\Blog\Api\Data\PostExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \AHT\Blog\Api\Data\PostExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \AHT\Blog\Api\Data\PostExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get content
     * @return string|null
     */
    public function getContent()
    {
        return $this->_get(self::CONTENT);
    }

    /**
     * Set content
     * @param string $content
     * @return \AHT\Blog\Api\Data\PostInterface
     */
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }
}

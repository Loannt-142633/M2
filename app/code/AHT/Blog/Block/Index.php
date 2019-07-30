<?php
namespace AHT\Blog\Block;
class Index extends \Magento\Framework\View\Element\Template
{
	private $postFactory;
	private $postRepository;
	private $_product;
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
								 \AHT\Blog\Model\PostFactory $postFactory, 
								 \AHT\Blog\Model\PostRepository $postRepository,
								 \Magento\Catalog\Model\ProductFactory $product)
	{
		parent::__construct($context);
		$this->postFactory = $postFactory;
		$this->postRepository = $postRepository;
		$this->_product = $product;
	}

	public function getBlogInfo()
	{
		return __('AHT Blog module');
	}
	public function getPosts()
	{
		//
		$producName = $this->_product->create()->load(1);
		echo $producName->getName();
		exit();
		$collection = $this->postRepository->getList();
		return $collection;
	}

}

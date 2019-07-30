<?php
namespace AHT\Featured\Controller\Adminhtml\Index;

use Magento\Catalog\Model\ProductRepository;

class Index extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Index';

    protected $resultPageFactory;
    protected $_productRepository;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $   ,
        \Magento\Catalog\Model\ProductRepository $productRepository)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
        $this->_productRepository = $productRepository;
    }

    public function execute()
    {
        return $this->resultPageFactory->create();
        $collection = $this->_productRepository->create();
        $collection->addAttributeToFilter('is_featured', array('eq' => 1));
        return $collection;
    }
}
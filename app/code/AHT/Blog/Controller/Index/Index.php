<?php
namespace AHT\Blog\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	protected $_postFactory;
    private $_cacheTypeList;
	private $_cacheFrontendPool;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\AHT\Blog\Model\PostFactory $postFactory, 
		\Magento\Framework\App\Cache\TypeListInterface $cacheTypeList, 
		\Magento\Framework\App\Cache\Frontend\Pool $cacheFrontendPool
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_postFactory = $postFactory;
		$this->_cacheTypeList = $cacheTypeList;
        $this->_cacheFrontendPool = $cacheFrontendPool;
		return parent::__construct($context);
	}

	public function execute()
	{
		$types = array('config','layout','block_html','collections','reflection','db_ddl','eav','config_integration','config_integration_api','full_page','translate','config_webservice');
		foreach ($types as $type) {
			if (!$type) {
                $this->_cacheTypeList->cleanType($type);
			}
		}
		foreach ($this->_cacheFrontendPool as $cacheFrontend) {
		    $cacheFrontend->getBackend()->clean();
		}
		return $this->_pageFactory->create();
	}
}

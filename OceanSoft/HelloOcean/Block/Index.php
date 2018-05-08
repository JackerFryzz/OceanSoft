<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/10/2018
 * Time: 11:59 AM
 */

namespace OceanSoft\HelloOcean\Block;




use Magento\Framework\ObjectManager\ObjectManager;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $_config;
    protected $_gridFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \OceanSoft\HelloOcean\Model\PostsFactory $gridFactory,
        \OceanSoft\HelloOcean\Helper\getConfigution $config,
        array $data = []
    ) {
        $this->_config=$config;
        $this->_gridFactory = $gridFactory;
        parent::__construct($context, $data);
        //get collection of data
        $collection = $this->_gridFactory->create()->getCollection()->addFieldToFilter('status',1);
        $this->setCollection($collection);
        $this->pageConfig->getTitle()->set(__('List Post'));
    }

    protected function _prepareLayout()
    {
        $pagenum=(int)$this->_config->getConfig('pageconfig/setconfig/page_num');
//        $pagenum=(int)$config->getConfig('pageconfig/setconfig/page_num');

        parent::_prepareLayout();
        if ($this->getCollection()) {
            // create pager block for collection
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'webkul.grid.record.pager'
            )->setAvailableLimit(array($pagenum=>$pagenum,$pagenum*2=>$pagenum*2,$pagenum*3=>$pagenum*3,$pagenum*4=>$pagenum*4))->setShowPerPage(true)->setCollection(
                $this->getCollection()
            );
            $this->setChild('pager', $pager);// set pager block in layout
        }
        return $this;
    }

    /**
     * @return string
     */
    // method for get pager html
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}
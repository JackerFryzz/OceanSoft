<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/10/2018
 * Time: 11:11 AM
 */

namespace OceanSoft\HelloOcean\Controller\Hello;


use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
        protected $_pageFactory;
        protected $_postsFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \OceanSoft\HelloOcean\Model\PostsFactory $postsFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->_postsFactory=$postsFactory;
        return parent::__construct($context);
    }

    public function execute()
    {

          $resultpage=$this->_pageFactory->create();
          return $resultpage;
//          $result=$this->_objectManager->create('OceanSoft\HelloOcean\Model\Posts');
//        $data=$result->load(1);


//          var_dump(count($data));
//        return $this->_pageFactory->create();
    }
}
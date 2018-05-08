<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/11/2018
 * Time: 3:42 PM
 */

namespace OceanSoft\HelloOcean\Controller\Adminhtml\Posts;


class NewAction extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->_forward('edit');
    }

}
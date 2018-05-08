<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/11/2018
 * Time: 8:42 AM
 */

namespace OceanSoft\HelloOcean\Controller\Adminhtml\Posts;


use Magento\Backend\App\Action;

use OceanSoft\HelloOcean\Controller\Adminhtml\AbPosts;
class Edit extends AbPosts
{
    /**
     * Backend session
     *
     * @var \Magento\Backend\Model\Session
     */
    protected $_backendSession;
    /**
     * Page factory
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;
    /**
     * Result JSON factory
     *
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $_resultJsonFactory;
    /**
     * constructor
     *
     * @param \Magento\Backend\Model\Session $backendSession
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory

     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Backend\Model\View\Result\RedirectFactory $resultRedirectFactory
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
        \Magento\Backend\Model\Session $backendSession,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \OceanSoft\HelloOcean\Model\PostsFactory $postFactory,
        \Magento\Framework\Registry $registry,
        \Magento\Backend\Model\View\Result\RedirectFactory $resultRedirectFactory,
        \Magento\Backend\App\Action\Context $context
    )
    {
        $this->_backendSession    = $backendSession;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_resultJsonFactory = $resultJsonFactory;
        parent::__construct($postFactory, $registry, $resultRedirectFactory, $context);
    }
    /**
     * is action allowed
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('OceanSoft_HelloOcean::Manager');
    }


    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $post = $this->_initPost();
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('OceanSoft_HelloOcean::Manager');
        if($id){
            $resultPage->getConfig()->getTitle()->set(__('Edit'));
        }else{
            $resultPage->getConfig()->getTitle()->set(__('New'));

        }
        return $resultPage;
    }
}
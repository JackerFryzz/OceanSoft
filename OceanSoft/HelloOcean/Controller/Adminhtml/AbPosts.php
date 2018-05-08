<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/11/2018
 * Time: 10:12 AM
 */

namespace OceanSoft\HelloOcean\Controller\Adminhtml;


abstract class AbPosts extends \Magento\Backend\App\Action
{

    protected $_postFactory;

    protected $_coreRegistry;

    protected $_resultRedirectFactory;

    public function __construct(
        \OceanSoft\HelloOcean\Model\PostsFactory $postFactory,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Backend\Model\View\Result\RedirectFactory $resultRedirectFactory,
        \Magento\Backend\App\Action\Context $context
    )
    {
        $this->_postFactory           = $postFactory;
        $this->_coreRegistry          = $coreRegistry;
        $this->_resultRedirectFactory = $resultRedirectFactory;
        parent::__construct($context);
    }
    protected function _initPost()
    {
        $postId  = (int) $this->getRequest()->getParam('id');
        $post    = $this->_postFactory->create();
        if ($postId) {
            $post->load($postId);
        }
        $this->_coreRegistry->register('editpost', $post);
        return $post;
    }
}
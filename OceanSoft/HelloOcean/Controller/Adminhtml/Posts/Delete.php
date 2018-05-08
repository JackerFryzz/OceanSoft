<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/10/2018
 * Time: 10:59 PM
 */

namespace OceanSoft\HelloOcean\Controller\Adminhtml\Posts;


use Magento\Backend\App\Action;

class Delete extends \Magento\Backend\App\Action
{
       protected $_resultRedirectFactory;
        public function __construct(Action\Context $context)
        {

            parent::__construct($context);
        }
        public function execute()
        {
            $id=$this->getRequest()->getParam('id');
            $result=$this->_objectManager->create('OceanSoft\HelloOcean\Model\Posts');
            $result->load($id);
            if($result['id']!=null){
                $result->delete();
                $this->messageManager->addSuccess(__('The Post has been deleted.'));
                $redirect=$this->_objectManager->create('Magento\Backend\Model\View\Result\Redirect');
                $redirect->setPath('posts/*/');
                return $redirect;
            }else{
                $this->messageManager->addError(__('This Post no longer exists.'));
            }



        }
}
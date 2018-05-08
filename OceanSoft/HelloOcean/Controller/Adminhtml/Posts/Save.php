<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/11/2018
 * Time: 4:11 PM
 */

namespace OceanSoft\HelloOcean\Controller\Adminhtml\Posts;


use Magento\Framework\App\Action\Context;

class Save extends \Magento\Backend\App\Action
{
    protected $fileSystem;

    protected $uploaderFactory;

    protected $allowedExtensions = ['csv'];
    protected $fileId = 'image';
    protected $datetime;
    protected $_storeview;

    public function __construct(\OceanSoft\HelloOcean\Model\PostsFactory $postFactory,
                                \Magento\Framework\Filesystem $fileSystem,
                                \Magento\Backend\Model\View\Result\RedirectFactory $resultRedirectFactory,
                                \Magento\Framework\File\UploaderFactory $uploaderFactory,
                                \Magento\Framework\Stdlib\DateTime\DateTime $datetime,
                                \OceanSoft\HelloOcean\Model\StoreviewFactory $storeview,
                                \Magento\Backend\App\Action\Context  $context)
    {
        $this->_storeview=$storeview;
        $this->datetime = $datetime;
        $this->_postFactory=$postFactory;
        $this->fileSystem = $fileSystem;
        $this->uploaderFactory = $uploaderFactory;

        parent::__construct($context);
    }
    public function execute()
    {




        $model=$this->_postFactory->create();
        $data = $this->getRequest()->getPost('news');
        $newsId = $this->getRequest()->getParam('news_');

        if(isset($data['id'])){
            if($_FILES['image']['name']){
                $data['image']['value']=$_FILES['image']['name'];
            }
           if($data['store']==""){

                $textDisplay = new \Magento\Framework\DataObject(array('text' => 'edit'));
                $this->_eventManager->dispatch('mageplaza_helloworld_display_text', ['mp_text' => $textDisplay]);
                $model->load($data['id']);
                $model->setObserver($textDisplay->getText()." at ".$this->datetime->gmtDate());
                $model->setTitle($data['title']);
                $model->setStatus($data['status']);
                $model->setDescription($data['description']);
                $model->setImage($data['image']['value']);
                $model->save();
            $this->messageManager->addSuccess(__('The Post has been Saved.'));
                }else{
                    $model->load($data['id']);
                    $model->setStatus($data['status']);
                    $model->setDescription($data['description']);
                    $model->setImage($data['image']['value']);
                    $model->save();
                    $store_model=$this->_storeview->create();
                    $ex=$store_model->getCollection()->addFieldToFilter('post_id',$data['id'])
                                                        ->addFieldToFilter('store_id',$data['store']);
                    if(count($ex->getData())==0){
                        $store_model->setData(['post_id'=>$data['id'],'store_id'=>$data['store'],'title'=>$data['title']])->save();
                    }else{
                       $c=$ex->getData();
                       $store_model->load($c[0]['id']);
                       $store_model->setTitle($data['title']);
                       $store_model->setStore_Id($data['store']);
                       $store_model->setPost_Id($data['id']);
                       $store_model->save();
                    }
                }
//
        }else{
            $textDisplay = new \Magento\Framework\DataObject(array('text' => 'new'));
            $this->_eventManager->dispatch('mageplaza_helloworld_display_text', ['mp_text' => $textDisplay]);

            $model->setData(['title'=>$data['title'],'description'=>$data['description'],'status'=>$data['status'],'image'=>$_FILES['image']['name'],'observer'=>$textDisplay->getText()." at ".$this->datetime->gmtDate()])->save();
            $this->messageManager->addSuccess(__('The Post has been Saved.'));
        }



//            $data['image']['value']=$_FILES['image'];
//        var_dump($_FILES['image']);

        // Start upload image//

       if($_FILES['image']['name']!=""){
           $uploader = $this->uploaderFactory->create(array('fileId' =>'image' ));
           $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
           $uploader->setAllowRenameFiles(false);
           $uploader->setFilesDispersion(false);
           $uploader->setAllowCreateFolders(true);
           $result = $uploader->save('pub/media/images');
       }

        //end of upload image//


        $resultRedirect=$this->resultRedirectFactory->create();
        $resultRedirect->setPath('posts/*/');
        return $resultRedirect;

//        $value->setData(['title'=>$data['title'],'status'=>$data['status']])->save();

    }

}
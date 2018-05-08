<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/11/2018
 * Time: 10:55 PM
 */

namespace OceanSoft\HelloOcean\Controller\Adminhtml\Demo;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Backend\App\Action;

class upload
{
    protected $_fileUploaderFactory;

    public function __construct(
        \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory,
        Action\Context $context

    ) {

        $this->_fileUploaderFactory = $fileUploaderFactory;
        parent::__construct($context);
    }

    public function execute(){

        $uploader = $this->_fileUploaderFactory->create(['fileId' => 'image']);

        $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);

        $uploader->setAllowRenameFiles(false);

        $uploader->setFilesDispersion(false);

        $path = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)

            ->getAbsolutePath('images/');

        $uploader->save($path);

    }
}
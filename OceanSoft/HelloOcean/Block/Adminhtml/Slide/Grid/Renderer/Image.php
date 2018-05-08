<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/19/2018
 * Time: 10:00 AM
 */

namespace OceanSoft\HelloOcean\Block\Adminhtml\Slide\Grid\Renderer;


class Image extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    protected $_storeManager;


    public function __construct(
        \Magento\Backend\Block\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_storeManager = $storeManager;
    }


    public function render(\Magento\Framework\DataObject $row)
    {
         $img='<img src="'.'pub/media'.'images/logo.png'.'" width="100" height="100"/>';;
        $mediaDirectory = $this->_storeManager->getStore()->getBaseUrl(
            \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
        );
        var_dump("dfdfdfdfdfdfd");
//        if($this->_getValue($row)==''):
//            $imageUrl = $mediaDirectory.$this->_getValue($row);
//            $img='<img src="'.$imageUrl.'" width="100" height="100"/>';
//        else:
//            $img='<img src="'.'pub/media'.'images/logo.png'.'" width="100" height="100"/>';
//        endif;
        return $img;
    }
}
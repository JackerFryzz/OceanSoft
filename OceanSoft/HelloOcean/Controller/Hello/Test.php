<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/13/2018
 * Time: 12:07 AM
 */

namespace OceanSoft\HelloOcean\Controller\Hello;


use Magento\Framework\App\Action\Context;

class Test extends \Magento\Framework\App\Action\Action
{
    protected $_postFactory;
    public function __construct(Context $context,\OceanSoft\HelloOcean\Model\PostsFactory $postsFactory)
    {
        $this->_postFactory=$postsFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $config=$this->_postFactory->create();
        $config->getCollection()->setDataToAll('title','fgggggggggggggggggggggggggg');
        $config->load(5)->setTitle("dinhhongson");
        var_dump($config->load(5)->getData());
    }

}
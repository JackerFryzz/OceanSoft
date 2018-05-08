<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/13/2018
 * Time: 12:05 AM
 */

namespace OceanSoft\HelloOcean\Helper;


use Magento\Framework\App\Action\Context;

class getConfigution extends \Magento\Framework\App\Action\Action
{
    protected $_scopeConfig;
    public function __construct(Context $context,\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        $this->_scopeConfig=$scopeConfig;
        parent::__construct($context);
    }
    public function execute()
    {
        // TODO: Implement execute() method.
    }


    public function getConfig($path){
        $data=$this->_scopeConfig->getValue($path, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $data;
    }

}
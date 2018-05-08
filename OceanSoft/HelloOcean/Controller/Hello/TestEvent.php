<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/13/2018
 * Time: 11:48 AM
 */

namespace OceanSoft\HelloOcean\Controller\Hello;


use Magento\Framework\App\Action\Context;

class TestEvent extends \Magento\Framework\App\Action\Action
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }
    public function execute()
    {
        $textDisplay = new \Magento\Framework\DataObject(array('text' => 'new'));
        $this->_eventManager->dispatch('mageplaza_helloworld_display_text', ['mp_text' => $textDisplay]);
        echo $textDisplay->getText();
        exit;
    }
}
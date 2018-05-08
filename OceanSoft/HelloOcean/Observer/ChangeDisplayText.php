<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/13/2018
 * Time: 11:53 AM
 */

namespace OceanSoft\HelloOcean\Observer;


class ChangeDisplayText implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $displayText = $observer->getData('mp_text');
        $event= $displayText->getText();
        if($event=="new"){
            $displayText->setText('Created');
        }else{
            $displayText->setText('Edited');
        }
        return $this;
    }
}
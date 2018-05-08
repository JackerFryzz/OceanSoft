<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/18/2018
 * Time: 4:11 PM
 */

namespace OceanSoft\HelloOcean\Model;


class Storeview extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('OceanSoft\HelloOcean\Model\ResourceModel\Storeview');
    }
}
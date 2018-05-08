<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/18/2018
 * Time: 4:11 PM
 */

namespace OceanSoft\HelloOcean\Model\ResourceModel;


class Storeview extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('storeview','id');
    }
}
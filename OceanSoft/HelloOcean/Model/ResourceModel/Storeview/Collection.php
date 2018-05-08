<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/18/2018
 * Time: 4:42 PM
 */

namespace OceanSoft\HelloOcean\Model\ResourceModel\Storeview;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('OceanSoft\HelloOcean\Model\Storeview','OceanSoft\HelloOcean\Model\ResourceModel\Storeview');
    }


}
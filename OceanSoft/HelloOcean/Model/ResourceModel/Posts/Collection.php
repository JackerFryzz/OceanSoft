<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/10/2018
 * Time: 3:42 PM
 */

namespace OceanSoft\HelloOcean\Model\ResourceModel\Posts;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('OceanSoft\HelloOcean\Model\Posts','OceanSoft\HelloOcean\Model\ResourceModel\Posts');
    }


}
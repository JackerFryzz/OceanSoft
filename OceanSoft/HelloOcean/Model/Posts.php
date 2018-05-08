<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/10/2018
 * Time: 3:36 PM
 */

namespace OceanSoft\HelloOcean\Model;


class Posts extends \Magento\Framework\Model\AbstractModel
{
        protected function _construct()
        {
            $this->_init('OceanSoft\HelloOcean\Model\ResourceModel\Posts');
        }
}
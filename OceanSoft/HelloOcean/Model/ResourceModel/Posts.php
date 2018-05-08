<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/10/2018
 * Time: 3:38 PM
 */

namespace OceanSoft\HelloOcean\Model\ResourceModel;


class Posts extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
        protected function _construct()
        {
            $this->_init('posts','id');
        }
}
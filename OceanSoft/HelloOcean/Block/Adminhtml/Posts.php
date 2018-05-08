<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/10/2018
 * Time: 5:07 PM
 */

namespace OceanSoft\HelloOcean\Block\Adminhtml;


class Posts  extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_posts';
        $this->_blockGroup = 'OceanSoft_HelloOcean';
        $this->_headerText = __('Posts');
        $this->_addButtonLabel = __('Create New Post');
        parent::_construct();
    }
}
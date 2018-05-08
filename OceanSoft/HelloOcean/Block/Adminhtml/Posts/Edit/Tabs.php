<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/11/2018
 * Time: 2:32 PM
 */

namespace OceanSoft\HelloOcean\Block\Adminhtml\Posts\Edit;


use Magento\Backend\Block\Widget\Tabs as WidgetTabs;

class Tabs extends WidgetTabs
{

    protected function _construct()
    {
        parent::_construct();
        $this->setId('news_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Infomation'));
    }


    protected function _beforeToHtml()
    {
        $this->addTab(
            'news_info',
            [
                'label' => __('General'),
                'title' => __('General'),
                'content' => $this->getLayout()->createBlock(
                    'OceanSoft\HelloOcean\Block\Adminhtml\Posts\Edit\Tab\Info'
                )->toHtml(),
                'active' => true
            ]
        );

        return parent::_beforeToHtml();
    }
}

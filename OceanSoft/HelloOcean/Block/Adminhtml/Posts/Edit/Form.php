<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/11/2018
 * Time: 2:33 PM
 */

namespace OceanSoft\HelloOcean\Block\Adminhtml\Posts\Edit;


use Magento\Backend\Block\Widget\Form\Generic;

class Form extends Generic
{

    protected function _prepareForm()
    {

        $form = $this->_formFactory->create(
            [
                'data' => [
                    'id'    => 'edit_form',
                    'enctype'=>'multipart/form-data',
                    'action' => $this->getData('action'),
                    'method' => 'post'
                ]
            ]
        );
//        $form = $this->_formFactory->create(
//            ['data' => ['id' => 'edit_form', 'enctype'=>'multipart/form-data','action' => $this->getData('action'), 'method' => 'post']]
//        );
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}

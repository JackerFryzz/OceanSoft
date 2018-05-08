<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/12/2018
 * Time: 9:05 PM
 */

namespace OceanSoft\HelloOcean\Block\Adminhtml\Helper;


class Image extends \Magento\Framework\Data\Form\Element\Image
{

    public function _getUrl()
    {
        $url = false;
        if ($this->getValue()) {
            $url = $this->_urlBuilder->getBaseUrl(
                    ['_type' => \Magento\Framework\UrlInterface::URL_TYPE_MEDIA]
                ) . 'images/' . $this->getValue();
        }
        return $url;
    }


    public function _getDeleteCheckbox()
    {
        $html = '';
        if ($attribute = $this->getEntityAttribute()) {
            if (!$attribute->getIsRequired()) {
                $html .= parent::_getDeleteCheckbox();
            } else {
                $inputField = '<input value="%s" id="%s_hidden" type="hidden" class="required-entry" />';
                $html .= sprintf($inputField, $this->getValue(), $this->getHtmlId());
                $html .= '<script>require(["prototype"], function(){
                    syncOnchangeValue(\'' .
                    $this->getHtmlId() .
                    '\', \'' .
                    $this->getHtmlId() .
                    '_hidden\');
                });
                </script>';
            }
        } else {
            $html .= parent::_getDeleteCheckbox();
        }
        return $html;
    }
}
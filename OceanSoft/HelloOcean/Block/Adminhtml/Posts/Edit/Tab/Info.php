<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/11/2018
 * Time: 2:41 PM
 */

namespace OceanSoft\HelloOcean\Block\Adminhtml\Posts\Edit\Tab;


use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Cms\Model\Wysiwyg\Config;

class Info extends Generic implements TabInterface
{
    /**
     * @var \Magento\Cms\Model\Wysiwyg\Config
     */
    protected $_wysiwygConfig;

    /**

     */
    protected $_newsStatus;
    protected $_systemStore;
    protected $_storeManager;
    protected $_storeview;
    /**
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param Config $wysiwygConfig
     * @param Status $newsStatus
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \OceanSoft\HelloOcean\Model\StoreviewFactory $storeview,


        array $data = []
    ) {
        $this->_storeview=$storeview;
        $this->_storeManager = $storeManager;
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form fields
     *
     * @return \Magento\Backend\Block\Widget\Form
     */
    protected function _prepareForm()
    {

        $model = $this->_coreRegistry->registry('editpost');


        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('news_');
        $form->setFieldNameSuffix('news');
        $model->setStore($this->getRequest()->getParam('store'));

        if($this->getRequest()->getParam('store')!=""){
            $title=$this->_storeview->create()->getCollection()->addFieldToFilter('post_id',$model->getId())->addFieldToFilter('store_id',$this->getRequest()->getParam('store'))->getData();
            if($title){
                $model->setTitle($title[0]['title']);
            }
        }


        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General')]
        );
        $fieldset->addType('image', '\OceanSoft\HelloOcean\Block\Adminhtml\Helper\Image');
        if ($model->getId()) {
            $fieldset->addField(
                'id',
                'hidden',
                ['name' => 'id']
            );
            $fieldset->addField(
                'store',
                'hidden',
                ['name' => 'store']
            );
        }


        $fieldset->addField(
            'title',
            'text',
            [
                'name'        => 'title',
                'label'    => __('Title (StoreView)'),
                'required'     => true,
            ]
        );
        $fieldset->addField(
            'description',
            'textarea',
            [
                'name'      => 'description',
                'label'     => __('Description (global)'),
                'required'  => true,
                'style'     => 'height: 8em; width: 30em;'
            ]
        );
        $fieldset->addField(
            'status',
            'select',
            [
                'name'      => 'status',
                'label' => __('Status (global)'),
                'title' => __('Disable/Enable'),
                'required' => true,
                'options' => ['0' => __('Disable'), '1' => __('Enable')]
            ]
        );
        $fieldset->addField(
            'image',
            'image',
            [

                'name' => 'image',
                'label' => __('Background Image (global)'),
                'title' => __('Background Image'),
                'required' => true,
                'onchange' => 'imagechange(this)',

            ],'text'
        );




        $data = $model->getData();
//        var_dump($data);echo '<br>';
//        $this->setImage('');
//        var_dump($data);
        $form->setValues($data);
        $this->setForm($form);
//        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('Post Info');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('News Info');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }
}

?>
<script>
    function imagechange(input)
    {
        require(['jquery'], function($)
        {
            $('#preimage').remove();
            var table_html = "<img src='pub/media/images/logo.png' width='80' height='80' id='preimage' name='preimage'>";
            $('#page_image').before(table_html);
            if (input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e){
                    jQuery('#preimage').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    }
</script>

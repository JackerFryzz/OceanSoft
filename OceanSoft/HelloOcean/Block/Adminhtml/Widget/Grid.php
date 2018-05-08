<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/17/2018
 * Time: 3:09 PM
 */

namespace OceanSoft\HelloOcean\Block\Adminhtml\Widget;

use Magento\Framework\App\ObjectManager;

Class Grid extends \Magento\Backend\Block\Widget\Grid\Extended {

    public function __construct(\Magento\Backend\Block\Template\Context $context, \Magento\Backend\Helper\Data $backendHelper, array $data = [])
    {
        parent::__construct($context, $backendHelper, $data);
        $this->setId("homepageGrid");
        $this->setDefaultSort("order");
        $this->setDefaultDir("DESC");
        $this->setSaveParametersInSession(true);
    }

    public function initForm()
    {
        return $this;
    }

    protected function _prepareCollection()
    {
        $collection= ObjectManager::getInstance()->create('OceanSoft\HelloOcean\Model\Posts')->getCollection();
//        $collection = ;
//        foreach ($collection as $key =>$value){
//            var_dump($value) ;
//        }

//        var_dump($collection->[->getData());
//
//        $collection->getSelect();
//
//        foreach ($collection as $view) {
//            if ( $view->getStores() && $view->getStores() != 0 ) {
//                $view->setStores(explode(',',$view->getStores()));
//            } else {
//                $view->setStores(array('0'));
//            }
//        }

        $store=$this->getRequest()->getParams();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * @return $this
     * @throws \Exception
     */
    protected function _prepareColumns()
    {
        $this->addColumn("id", array(
            "header" => __("ID"),
            "align" => "right",
            "width" => "50px",
            "type" => "number",
            "index" => "id",
        ))

            ->addColumn("title", array(
                "header" => __("Title"),
                "align" => "left",
                "type" => "text",
                "index" => "title",
            ));


//
//        $this->addColumn('store_id', array(
//            'header'        => __('Store View'),
//            'index'         => 'store_id',
//            'type'          => 'store',
//            'store_all'     => true,
//            'store_view'    => true,
//            'sortable'      => false,
//            'filter_condition_callback' => array($this, '_filterStoreCondition'),
//
//        ));
        $this->addColumn(
            'edit',
            [
                'header' => __('Edit'),
                'type' => 'action',
                'getter' => 'getId',
                'actions' => [
                    [
                        'caption' => __('Edit'),
                        'url' => [
                            'base' => '*/*/edit'
                        ],
                        'field' => 'id'
                    ]
                ],
                'filter' => false,
                'sortable' => false,
                'index' => 'store',
                'header_css_class' => 'col-action',
                'column_css_class' => 'col-action'
            ]
        );
        $this->addColumn(
            'delete',
            [
                'header' => __('Delete'),
                'type' => 'action',
                'getter' => 'getId',
                'actions' => [
                    [
                        'caption' => __('Delete'),
                        'url' => [
                            'base' => '*/*/delete'
                        ],
                        'field' => 'id'
                    ]
                ],
                'filter' => false,
                'sortable' => false,
                'index' => 'store',
                'header_css_class' => 'col-action',
                'column_css_class' => 'col-action'
            ]
        );
        $this->addColumn("Observer", array(
        "header" => __("Observer"),
        "align" => "left",
        "type" => "text",
        "index" => "observer",
    ));
        $this->addColumn(
            'slide_status',
            [
                'header' => __('Status'),
                'index' => 'status',
                'type' => 'options',
                'options' => ['0' => __('Disable'), '1' => __('Enable')]
            ]
        );

        return parent::_prepareColumns();
    }



    protected function _filterStoreCondition($collection, $column)
    {
        if (!$value = $column->getFilter()->getValue()) {
            return;
        }

        $this->getCollection()->addFieldToFilter('store_id', array('finset' => $value));
    }



}

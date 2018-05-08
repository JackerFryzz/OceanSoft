<?php
/**
 * Created by PhpStorm.
 * User: Son
 * Date: 4/11/2018
 * Time: 12:49 AM
 */

namespace OceanSoft\HelloOcean\Model\System;
use Magento\Framework\Option\ArrayInterface;

class Status implements ArrayInterface
{
    const ENABLED  = 1;
    const DISABLED = 0;

    public function toOptionArray()
    {

        $options = [
            self::ENABLED => __('Enabled'),
            self::DISABLED => __('Disabled')
        ];

        return $options;
    }
}
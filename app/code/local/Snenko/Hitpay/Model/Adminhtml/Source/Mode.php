<?php

class Snenko_Hitpay_Model_Adminhtml_Source_Mode
{
    public function toOptionArray()
    {
        return [
            [
                'value' => 1,
                'label' => __('Live')
            ],
            [
                'value' => 0,
                'label' => __('Sandbox')
            ]
        ];
    }
}
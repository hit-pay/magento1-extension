<?php
class Hitpay_Pay_Model_System_Source_Checkoutmode
{
    public function toOptionArray()
    {
        return array(
            array(
                'value' => 1,
                'label' => Mage::helper('hitpay')->__('Drop-In (Popup)')
            ),
            array(
                'value' => 0,
                'label' => Mage::helper('hitpay')->__('Redirect')
            ),
        );
    }
}

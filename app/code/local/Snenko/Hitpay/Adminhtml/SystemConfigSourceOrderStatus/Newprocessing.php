<?php

class Snenko_Hitpay_Adminhtml_SystemConfigSourceOrderStatus_Newprocessing extends Mage_Adminhtml_Model_System_Config_Source_Order_Status
{
    protected $_stateStatuses = array(
        Mage_Sales_Model_Order::STATE_NEW,
        Mage_Sales_Model_Order::STATE_PROCESSING,
    );

}
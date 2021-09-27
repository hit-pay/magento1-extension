<?php
class Hitpay_Pay_Block_Adminhtml_Order_View extends Mage_Core_Block_Template
{
    public function _toHtml()
    {
        $order_id = Mage::app()->getRequest()->getParam('order_id');
        $order = Mage::getModel('sales/order')->load($order_id);
        $paymentMethod = $order->getPayment()->getMethodInstance()->getCode();
        if ($paymentMethod == 'hitpay') {
            $transaction = Mage::helper('hitpay')->getTransactionByOrderId($order_id);
            $this->setData('transaction', $transaction);
            $billingAddress = $order->getBillingAddress();
            
            $razon_social = $billingAddress->getTxtRazonSocial();
            if($razon_social == "") {
                $razon_social = Mage::helper('hitpay')->__('Not available');
            }

            $nit = $billingAddress->getTxtNit();
            if($nit == "") {
                $nit = Mage::helper('hitpay')->__('Not available');
            }

            $this->setData('social', $razon_social);
            $this->setData('nit', $nit);
            $this->setTemplate('hitpay/order/view.phtml');
            return parent::_toHtml();
        }
    }
}

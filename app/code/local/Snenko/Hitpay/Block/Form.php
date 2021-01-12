<?php

class Snenko_Hitpay_Block_Form extends Mage_Payment_Block_Form
{
    protected function _construct()
    {
        $mark = Mage::getConfig()->getBlockClassName('core/template');
        $mark = new $mark;
        $mark->setTemplate('hitpay/payment/mark.phtml')
//            ->setPaymentAcceptanceMarkHref($this->_config->getPaymentMarkWhatIsPaypalUrl($locale))
            ->setPaymentAcceptanceMethods($this->getPaymentImages())
        ;
        $this->setMethodLabelAfterHtml($mark->toHtml());
        parent::_construct();
    }

    protected function getPaymentImages()
    {
        /**
         * @var $hitpayService Snenko_Hitpay_Model_Service_Hitpay
         */
        $hitpayService = Mage::getModel('hitpay/service_hitpay');
        return $hitpayService->getPaymentMethods();
    }

}
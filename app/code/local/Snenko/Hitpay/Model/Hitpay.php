<?php

class Snenko_Hitpay_Model_Hitpay extends Mage_Payment_Model_Method_Abstract
{
    protected $_formBlockType = 'hitpay/form';

    const ALLOW_CURRENCY_CODE = 'SGD';

    protected $_code = 'hitpay';

    protected $_isInitializeNeeded      = true;
    protected $_canUseInternal          = false;
    protected $_canUseForMultishipping  = false;

    public function getOrderPlaceRedirectUrl()
    {
        return Mage::getUrl('hitpay/hitpay/redirect', array('_secure' => true));
    }

    public function validate()
    {
        return parent::validate();
    }

    public function canUseForCurrency($currencyCode)
    {
        return $currencyCode === self::ALLOW_CURRENCY_CODE;
    }

//    public function getCheckoutRedirectUrl(){
//        return Mage::getUrl('hitpay/hitpay/redirect', array('_secure' => true));
//    }

    /**
     * Get config payment action, do nothing if status is pending
     *
     * @return string|null
     */
    public function getConfigPaymentAction()
    {
        return $this->getConfigData('order_status') == 'pending' ? null : parent::getConfigPaymentAction();
    }
}
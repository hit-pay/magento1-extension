<?php
class Hitpay_Pay_Model_System_Source_Paymentlogos
{
    public function toOptionArray()
    {
        return array(
            array(
                'value' => 'visa',
                'label' => Mage::helper('hitpay')->__('Visa')
            ),
            array(
                'value' => 'master',
                'label' => Mage::helper('hitpay')->__('Mastercard')
            ),
            array(
                'value' => 'american_express',
                'label' => Mage::helper('hitpay')->__('American Express')
            ),
            array(
                'value' => 'apple_pay',
                'label' => Mage::helper('hitpay')->__('Apple Pay')
            ),
            array(
                'value' => 'google_pay',
                'label' => Mage::helper('hitpay')->__('Google Pay')
            ),
            array(
                'value' => 'paynow',
                'label' => Mage::helper('hitpay')->__('PayNow QR')
            ),
            array(
                'value' => 'grabpay',
                'label' => Mage::helper('hitpay')->__('GrabPay')
            ),
            array(
                'value' => 'wechatpay',
                'label' => Mage::helper('hitpay')->__('WeChatPay')
            ),
            array(
                'value' => 'alipay',
                'label' => Mage::helper('hitpay')->__('AliPay')
            ),
            array(
                'value' => 'shopeepay',
                'label' => Mage::helper('hitpay')->__('Shopee Pay')
            ),
            array(
                'value' => 'fpx',
                'label' => Mage::helper('hitpay')->__('FPX')
            ),
            array(
                'value' => 'zip',
                'label' => Mage::helper('hitpay')->__('Zip')
            ),
            array(
                'value' => 'atomeplus',
                'label' => Mage::helper('hitpay')->__('ATome+')
            ),
            array(
                'value' => 'unionbank',
                'label' => Mage::helper('hitpay')->__('Unionbank Online')
            ),
            array(
                'value' => 'qrph',
                'label' => Mage::helper('hitpay')->__('Instapay QR PH')
            ),
            array(
                'value' => 'pesonet',
                'label' => Mage::helper('hitpay')->__('PESONet')
            ),
            array(
                'value' => 'gcash',
                'label' => Mage::helper('hitpay')->__('GCash')
            ),
            array(
                'value' => 'billease',
                'label' => Mage::helper('hitpay')->__('Billease BNPL')
            ),
        );
    }
}

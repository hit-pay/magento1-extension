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
            			array(
                'value' => 'eftpos',
                'label' => Mage::helper('hitpay')->__('eftpos')
            ),
            array(
                'value' => 'maestro',
                'label' => Mage::helper('hitpay')->__('maestro')
            ),
            array(
                'value' => 'alfamart',
                'label' => Mage::helper('hitpay')->__('Alfamart')
            ),
            array(
                'value' => 'indomaret',
                'label' => Mage::helper('hitpay')->__('Indomaret')
            ),
            array(
                'value' => 'dana',
                'label' => Mage::helper('hitpay')->__('DANA')
            ),
            array(
                'value' => 'gopay',
                'label' => Mage::helper('hitpay')->__('gopay')
            ),
            array(
                'value' => 'linkaja',
                'label' => Mage::helper('hitpay')->__('Link Aja!')
            ),
            array(
                'value' => 'ovo',
                'label' => Mage::helper('hitpay')->__('OVO')
            ),
            array(
                'value' => 'qris',
                'label' => Mage::helper('hitpay')->__('QRIS')
            ),
            array(
                'value' => 'danamononline',
                'label' => Mage::helper('hitpay')->__('Bank Danamon')
            ),
            array(
                'value' => 'permata',
                'label' => Mage::helper('hitpay')->__('PermataBank')
            ),
            array(
                'value' => 'bsi',
                'label' => Mage::helper('hitpay')->__('Bank Syariah Indonesia')
            ),
            array(
                'value' => 'bca',
                'label' => Mage::helper('hitpay')->__('BCA')
            ),
            array(
                'value' => 'bni',
                'label' => Mage::helper('hitpay')->__('BNI')
            ),
            array(
                'value' => 'bri',
                'label' => Mage::helper('hitpay')->__('BRI')
            ),
            array(
                'value' => 'cimb',
                'label' => Mage::helper('hitpay')->__('CIMB Niaga')
            ),
            array(
                'value' => 'doku',
                'label' => Mage::helper('hitpay')->__('DOKU')
            ),
            array(
                'value' => 'mandiri',
                'label' => Mage::helper('hitpay')->__('Mandiri')
            ),
            array(
                'value' => 'akulaku',
                'label' => Mage::helper('hitpay')->__('AkuLaku BNPL')
            ),
            array(
                'value' => 'kredivo',
                'label' => Mage::helper('hitpay')->__('Kredivo BNPL')
            ),
            array(
                'value' => 'philtrustbank',
                'label' => Mage::helper('hitpay')->__('PHILTRUST BANK')
            ),
            array(
                'value' => 'allbank',
                'label' => Mage::helper('hitpay')->__('AllBank')
            ),
            array(
                'value' => 'aub',
                'label' => Mage::helper('hitpay')->__('ASIA UNITED BANK')
            ),
            array(
                'value' => 'chinabank',
                'label' => Mage::helper('hitpay')->__('CHINABANK')
            ),
            array(
                'value' => 'instapay',
                'label' => Mage::helper('hitpay')->__('instaPay')
            ),
            array(
                'value' => 'landbank',
                'label' => Mage::helper('hitpay')->__('LANDBANK')
            ),
            array(
                'value' => 'metrobank',
                'label' => Mage::helper('hitpay')->__('Metrobank')
            ),
            array(
                'value' => 'pnb',
                'label' => Mage::helper('hitpay')->__('PNB')
            ),
            array(
                'value' => 'queenbank',
                'label' => Mage::helper('hitpay')->__('QUEENBANK')
            ),
            array(
                'value' => 'rcbc',
                'label' => Mage::helper('hitpay')->__('RCBC')
            ),
            array(
                'value' => 'tayocash',
                'label' => Mage::helper('hitpay')->__('TayoCash')
            ),
            array(
                'value' => 'ussc',
                'label' => Mage::helper('hitpay')->__('USSC')
            ),
            array(
                'value' => 'bayad',
                'label' => Mage::helper('hitpay')->__('bayad')
            ),
            array(
                'value' => 'cebuanalhuillier',
                'label' => Mage::helper('hitpay')->__('CEBUANA LHUILLIER')
            ),
            array(
                'value' => 'ecpay',
                'label' => Mage::helper('hitpay')->__('ecPay')
            ),
            array(
                'value' => 'palawan',
                'label' => Mage::helper('hitpay')->__('PALAWAN PAWNSHOP')
            ),
            array(
                'value' => 'bpi',
                'label' => Mage::helper('hitpay')->__('BPI')
            ),
            array(
                'value' => 'psbank',
                'label' => Mage::helper('hitpay')->__('PSBank')
            ),
            array(
                'value' => 'robinsonsbank',
                'label' => Mage::helper('hitpay')->__('Robinsons Bank')
            ),
            array(
                'value' => 'diners_club',
                'label' => Mage::helper('hitpay')->__('Diners Club')
            ),
            array(
                'value' => 'discover',
                'label' => Mage::helper('hitpay')->__('Discover')
            ),
            array(
                'value' => 'doku_wallet',
                'label' => Mage::helper('hitpay')->__('DOKU Wallet')
            ),
            array(
                'value' => 'grab_paylater',
                'label' => Mage::helper('hitpay')->__('PayLater by Grab')
            ),
            array(
                'value' => 'favepay',
                'label' => Mage::helper('hitpay')->__('FavePay')
            ),
            array(
                'value' => 'shopback_paylater',
                'label' => Mage::helper('hitpay')->__('ShopBack PayLater')
            ),
        );
    }
}

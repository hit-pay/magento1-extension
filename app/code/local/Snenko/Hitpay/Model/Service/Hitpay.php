<?php

class Snenko_Hitpay_Model_Service_Hitpay
{
    const CONFIG_PATH_SALT = 'payment/hitpay/salt';
    const CHANNEL = 'api_magento';

    public function getHelper()
    {
        return Mage::helper('hitpay');
    }

    /**
     * @var Mage_Sales_Model_Order
     */
    private $order;

    /**
     * @return string
     * @throws Mage_Core_Model_Store_Exception
     */
    public function createRequest()
    {
        /**
         * @var $result Snenko_Hitpaysdk_Model_Response_CreatePayment
         */

        $hitPayClient = new Snenko_Hitpaysdk_Model_Client($this->_getConfigData('api_key'), $this->_getMode());

        $redirectUrl = Mage::app()->getStore()->getUrl(
            'hitpay/hitpay/confirmation',
            [
                '_query' => ['order_id' => $this->getLastOrder()->getIncrementId()]
            ]
        );

        $webhook = Mage::app()->getStore()->getUrl(
            'hitpay/hitpay/webhook',
            [
                'order_id' => $this->getLastOrder()->getIncrementId()
            ]
        );

        $paymentRequest = new Snenko_Hitpaysdk_Model_Request_CreatePayment();
        $paymentRequest->setAmount($this->getLastOrder()->getGrandTotal())
            ->setCurrency($this->getLastOrder()->getOrderCurrencyCode())
            ->setReferenceNumber($this->getLastOrder()->getIncrementId())
            ->setWebhook($webhook)
            ->setRedirectUrl($redirectUrl)
            ->setName($this->getLastOrder()->getCustomerName())
            ->setEmail($this->getLastOrder()->getCustomerEmail())
            ->setChannel(self::CHANNEL)//            ->setPaymentMethods($this->getPaymentMethods())
        ;

        $result = $hitPayClient->createPayment($paymentRequest);

        if ($result->getStatus() === 'pending') {
            $this->getOrder($result->getReferenceNumber())->addData(['hitpay_reference' => $result->getId()])->save();
            return $result->getUrl();
        }
    }

    /**
     * @return array
     */
    public function getPaymentMethods()
    {
        $paymentMethods = [];
        if ($this->_getConfigData('paynow')) {
            $paymentMethods[] = 'paynow_online';
        }
        if ($this->_getConfigData('cards')) {
            $paymentMethods[] = 'card';
        }
        if ($this->_getConfigData('wechat')) {
            $paymentMethods[] = 'wechat';
        }
        if ($this->_getConfigData('alipay')) {
            $paymentMethods[] = 'alipay';
        }

        return $paymentMethods;
    }

    /**
     * @param $field
     * @param null $storeId
     * @return mixed
     */
    protected function _getConfigData($field, $storeId = null)
    {
        if (null === $storeId) {
            $storeId = $this->_getStore();
        }
        $path = 'payment/hitpay/' . $field;
        return Mage::getStoreConfig($path, $storeId);
    }

    /**
     * @return mixed
     * @throws Mage_Core_Model_Store_Exception
     */
    protected function _getStore()
    {
        return Mage::app()->getStore()->getStoreId();
    }

    /**
     * @param $orderId string
     * @param $hmac string
     * @throws Mage_Core_Exception
     */
    public function checkData()
    {
        /**
         * @var $order Mage_Sales_Model_Order
         * @var $request Mage_Core_Controller_Request_Http
         * @var $payment Mage_Sales_Model_Order_Payment
         */
        $orderId = Mage::app()->getRequest()->getParam('order_id');
        $hmac = Mage::app()->getRequest()->getParam('hmac');

        $order = Mage::getModel('sales/order')->loadByIncrementId($orderId);
        $request = Mage::app()->getRequest();


        if (empty($order)) {
            Mage::throwException('HitPay: order not found');
        }

        try {
            $data = $_POST;
            unset($data['hmac']);
            $salt = $this->getSalt();
            if (Snenko_Hitpaysdk_Model_Client::generateSignatureArray($salt, $data) == $hmac) {
                $message = $this->getHelper()->__('Authorized amount of %s',
                    $order->getBaseCurrency()->formatTxt($request->getParam('amount')),
                    ['currency' => $request->getParam('currency')]
                );
                $payment = $order->getPayment();
                $payment->setTransactionId($request->getParam('payment_id'));
                $transaction = $payment->addTransaction(Mage_Sales_Model_Order_Payment_Transaction::TYPE_AUTH,
                    null,
                    false,
                    $message);
                $transaction->setAdditionalInformation(Mage_Sales_Model_Order_Payment_Transaction::RAW_DETAILS,
                    array('Context' => 'Payment',
                        'Amount' => $order->getGrandTotal(),
                        'Status' => $request->getParam('status'),
                    ));
                $transaction->setIsTransactionClosed(true); // Close the transaction on return?
                $transaction->save();
                $order->save();
            } else {
                throw new \Exception(sprintf('HitPay: hmac is not the same like generated'));
            }
        } catch (Exception $e) {
            Mage::logException($e);
        }
    }

    /**
     * @return bool
     * @throws Mage_Core_Model_Store_Exception
     */
    protected function _getMode()
    {
        return (boolean)$this->_getConfigData('mode');
    }

    protected function getSalt()
    {
        return Mage::app()->getStore()->getConfig(self::CONFIG_PATH_SALT);
    }

    /**
     * @return Mage_Sales_Model_Order
     */
    protected function getLastOrder()
    {
        if (!$this->order) {
            $this->order = Mage::getSingleton('checkout/session')->getLastRealOrder();
        }

        return $this->order;
    }

    /**
     * @param $orderId integer
     * @return Mage_Sales_Model_Order
     */
    protected function getOrder($orderId)
    {
        return Mage::getModel('sales/order')->loadByIncrementId($orderId);
    }

    /**
     * @return Mage_Checkout_Model_Session
     */
    protected function getCheckoutSession()
    {
        return Mage::getSingleton('checkout/session');
    }

    public function validateConfirmation()
    {
        /**
         * @var $order Mage_Sales_Model_Order
         * @var $request Mage_Core_Controller_Request_Http
         */
        $orderId = Mage::app()->getRequest()->getParam('order_id');

        $order = Mage::getModel('sales/order')->loadByIncrementId($orderId);
        $request = Mage::app()->getRequest();

        if (!$order->isEmpty()) {
            if ($order->getData('hitpay_reference') === $request->getParam('reference')) {
                return true;
            }
        }
        return false;
    }

    /**
     * @throws Exception
     */
    public function cancelOrder()
    {
        /**
         * @var $order Mage_Sales_Model_Order
         */
        $orderId = $this->getCheckoutSession()->getLastOrderId();
        $order = ($orderId) ? Mage::getModel('sales/order')->load($orderId) : false;
        if ($order && $order->getId() && $order->getQuoteId() == $this->getCheckoutSession()->getQuoteId()) {
            $order->cancel()->save();
            $this->getCheckoutSession()
                ->unsLastQuoteId()
                ->unsLastSuccessQuoteId()
                ->unsLastOrderId()
                ->unsLastRealOrderId()
                ->addSuccess($this->getHelper()->__('HitPay Checkout and Order have been canceled.'));
        } else {
            $this->getCheckoutSession()->addSuccess($this->getHelper()->__('Hitpay has been canceled.'));
        }
    }
}
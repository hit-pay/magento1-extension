<?php

class Snenko_Hitpay_HitpayController extends Mage_Core_Controller_Front_Action
{
    /**
     * @var Snenko_Hitpay_Model_Service_Hitpay
     */
    private $hitPayService;

    public function __construct(
        Zend_Controller_Request_Abstract $request,
        Zend_Controller_Response_Abstract $response,
        array $invokeArgs = array()
    )
    {
        $this->hitPayService = new Snenko_Hitpay_Model_Service_Hitpay();
        parent::__construct($request, $response, $invokeArgs);
    }

    public function _construct()
    {
        parent::_construct();
    }

    public function redirectAction()
    {
        Mage::log(json_encode(['controller' => 'redirect']), null, 'hitpay.log');
        try {
            if ($link = $this->hitPayService->createRequest()) {
                $this->_redirectUrl($link);
            }
        } catch (Exception $e) {
            $this->getCheckoutSession()->addError($e->getMessage());
            Mage::logException($e);
            $this->_redirect('checkout/cart/index', ['_secure' => true]);
        }
    }

    public function confirmationAction()
    {
        Mage::log(json_encode(['controller' => 'confirmation']), null, 'hitpay.log');

        if ($this->hitPayService->validateConfirmation()) {
            if ($this->_request->getParam('status') === 'canceled') {
                try {
                    $this->hitPayService->cancelOrder();
                } catch (Exception $e) {
                    $this->getCheckoutSession()->addError($e->getMessage());
                    Mage::logException($e);
                }
                $this->_redirect('checkout/cart/index');
            } elseif ($this->_request->getParam('status') === 'completed') {
                $this->_redirect('checkout/onepage/success', ['_secure' => true]);
            } else {
                $this->_redirect('checkout/cart/index', ['_secure' => true]);
            }
        } else {

            $this->_redirect('checkout/cart/index');
        }
    }

    /**
     * @return void
     */
    public function webhookAction()
    {
        Mage::log(json_encode(['controller' => 'webhook']), null, 'hitpay.log');
        Mage::log(json_encode($this->_request->getParams()), null, 'hitpay.log');

        try {
            if ($this->_request->getParam('order_id', false) && $this->_request->getParam('hmac', false)) {

                $this->hitPayService->checkData();
            }
        } catch (Exception $e) {
        }
    }

    /**
     * @return Mage_Checkout_Model_Session
     */
    protected function getCheckoutSession()
    {
        return Mage::getSingleton('checkout/session');
    }
}
<?php

/**
 * Class CreatePayment - https://staging.hit-pay.com/docs.html?shell#payment-requests
 *
 * @package HitPay\Request
 */
class Snenko_Hitpaysdk_Model_Request_CreatePayment
{
    /**
     * Amount related to the payment
     *
     * @var float
     */
    public $amount;

    /**
     * Currency related to the payment
     *
     * @var string
     */
    public $currency;

    /**
     * Choice of payment methods you want to offer the customer
     *
     * @var array
     */
    public $payment_methods;

    /**
     * Buyer’s email
     *
     * @var string
     */
    public $email;

    /**
     * Purpose of the Payment request FIFA 16
     *
     * @var
     */
    public $purpose;

    /**
     * Buyer’s name
     *
     * @var string
     */
    public $name;

    /**
     * Buyer’s phone number
     *
     * @var int
     */
    public $phone;

    /**
     * Arbitrary reference number that you can map to your internal reference number.
     * This value cannot be edited by the customer
     *
     * @var string
     */
    public $reference_number;

    /**
     * URL where we redirect the user after a payment.
     * Query arguments payment_request_id and status are sent along
     *
     * @var string
     */
    public $redirect_url;

    /**
     * URL where our server do POST request after a payment If done
     *
     * @var string
     */
    public $webhook;

    /**
     * If set is true, multiple payments can be paid on a payment request link. Default value is false
     *
     * @var bool
     */
    public $allow_repeated_payments;

    /**
     * Time after which the payment link will be expired.Applicable for repeated payments. Default is Null
     *
     * @var null
     */
    public $expiry_date;

    /**
     * @var string
     */
    protected $channel;

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return array
     */
    public function getPaymentMethods()
    {
        return $this->payment_methods;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getReferenceNumber()
    {
        return $this->reference_number;
    }

    /**
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->redirect_url;
    }

    /**
     * @return string
     */
    public function getWebhook()
    {
        return $this->webhook;
    }

    /**
     * @return bool
     */
    public function isAllowRepeatedPayments()
    {
        return $this->allow_repeated_payments;
    }

    /**
     * @return null
     */
    public function getExpiryDate()
    {
        return $this->expiry_date;
    }

    /**
     * @param float $amount
     * @return Snenko_Hitpaysdk_Model_Request_CreatePayment
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string $currency
     * @return Snenko_Hitpaysdk_Model_Request_CreatePayment
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @param array $payment_methods
     * @return Snenko_Hitpaysdk_Model_Request_CreatePayment
     */
    public function setPaymentMethods($payment_methods)
    {
        $this->payment_methods = $payment_methods;

        return $this;
    }

    /**
     * @param string $email
     * @return Snenko_Hitpaysdk_Model_Request_CreatePayment
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param mixed $purpose
     * @return Snenko_Hitpaysdk_Model_Request_CreatePayment
     */
    public function setPurpose($purpose)
    {
        $this->purpose = $purpose;

        return $this;
    }

    /**
     * @param string $name
     * @return Snenko_Hitpaysdk_Model_Request_CreatePayment
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param int $phone
     * @return Snenko_Hitpaysdk_Model_Request_CreatePayment
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @param string $reference_number
     * @return Snenko_Hitpaysdk_Model_Request_CreatePayment
     */
    public function setReferenceNumber($reference_number)
    {
        $this->reference_number = $reference_number;

        return $this;
    }

    /**
     * @param string $redirect_url
     * @return Snenko_Hitpaysdk_Model_Request_CreatePayment
     */
    public function setRedirectUrl($redirect_url)
    {
        $this->redirect_url = $redirect_url;

        return $this;
    }

    /**
     * @param string $webhook
     * @return Snenko_Hitpaysdk_Model_Request_CreatePayment
     */
    public function setWebhook($webhook)
    {
        $this->webhook = $webhook;

        return $this;
    }

    /**
     * @param bool $allow_repeated_payments
     * @return Snenko_Hitpaysdk_Model_Request_CreatePayment
     */
    public function setAllowRepeatedPayments($allow_repeated_payments)
    {
        $this->allow_repeated_payments = $allow_repeated_payments;

        return $this;
    }

    /**
     * @param null $expiry_date
     * @return Snenko_Hitpaysdk_Model_Request_CreatePayment
     */
    public function setExpiryDate($expiry_date)
    {
        $this->expiry_date = $expiry_date;

        return $this;
    }


    /**
     * @param string $channel
     * @return Snenko_Hitpaysdk_Model_Request_CreatePayment
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }
}
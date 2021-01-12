<?php

class Snenko_Hitpaysdk_Model_Response_PaymentStatus extends Snenko_Hitpaysdk_Model_Response_CreatePayment
{
    /**
     * array of payments made to this request ID. Will contain more than one if its a repeating payment link
     *
     * @var array
     */
    public $payments;

    /**
     * PaymentStatus constructor.
     * @param \stdClass $response
     */
    public function __construct(\stdClass $response)
    {
        parent::__construct($response);

        if (isset($response->payments)) {
            $this->setPayments($response->payments);
        }
    }

    /**
     * @return mixed
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @param mixed $payments
     * @return Snenko_Hitpaysdk_Model_Response_PaymentStatus
     */
    public function setPayments($payments)
    {
        $this->payments = $payments;

        return $this;
    }
}

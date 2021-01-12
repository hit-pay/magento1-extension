<?php

class Snenko_Hitpaysdk_Model_Response_Deletepaymentrequest
{
    /**
     * @var int
     */
    public $success;

    /**
     * DeletePaymentRequest constructor.
     * @param \stdClass $response
     */
    public function __construct(\stdClass $response)
    {
        $this->setSuccess($response->success);
    }

    /**
     * @return mixed
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * @param mixed $success
     * @return Snenko_Hitpaysdk_Model_Response_Deletepaymentrequest
     */
    public function setSuccess($success)
    {
        $this->success = $success;

        return $this;
    }
}

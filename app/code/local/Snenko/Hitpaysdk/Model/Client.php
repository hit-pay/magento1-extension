<?php
/**
 * Class Client
 * @package HitPay
 */
class Snenko_Hitpaysdk_Model_Client extends Snenko_Hitpaysdk_Model_Request
{
    const API_ENDPOINT = 'https://api.hit-pay.com/v1';

    const SANDBOX_API_ENDPOINT = 'https://api.sandbox.hit-pay.com/v1';

    const TYPE_CONTENT = 'application/x-www-form-urlencoded';

    protected $privateApiKey = '';

    /**
     * https://staging.hit-pay.com/docs.html?shell#create-payment-request
     *
     * @param Snenko_Hitpaysdk_Model_Request_CreatePayment $request
     * @return Snenko_Hitpaysdk_Model_Response_CreatePayment
     * @throws \Exception
     */
    public function createPayment($request)
    {
        $result = $this->request('POST', '/payment-requests', (array)$request);

        return new Snenko_Hitpaysdk_Model_Response_CreatePayment($result);
    }

    /**
     * https://staging.hit-pay.com/docs.html?shell#get-payment-status
     *
     * @param $id
     * @return Snenko_Hitpaysdk_Model_Response_PaymentStatus
     * @throws \Exception
     */
    public function getPaymentStatus($id)
    {
        $result = $this->request('GET', '/payment-requests/' . $id);

        return new Snenko_Hitpaysdk_Model_Response_PaymentStatus($result);
    }

    /**
     * https://staging.hit-pay.com/docs.html?shell#delete-payment-request
     *
     * @param $id
     * @return Snenko_Hitpaysdk_Model_Response_Deletepaymentrequest
     * @throws \Exception
     */
    public function deletePaymentRequest($id)
    {
        $result = $this->request('DELETE', '/payment-requests/' . $id);
        return new Snenko_Hitpaysdk_Model_Response_Deletepaymentrequest($result);
    }

    /**
     * @param $secret
     * @param array $args
     * @return string
     */
    public static function generateSignatureArray($secret, array $args)
    {
        $hmacSource = [];
        foreach ($args as $key => $val) {
            $hmacSource[$key] = "{$key}{$val}";
        }
        ksort($hmacSource);
        $sig = implode("", array_values($hmacSource));
        return hash_hmac('sha256', $sig, $secret);
    }
}

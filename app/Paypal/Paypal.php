<?php
namespace App\Paypal;


use PayPal\Api\Amount;
use PayPal\Api\Details;

class Paypal
{
    protected $apiContext;

    public function __construct()
    {
        $this->apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.id'), // client id
                config('services.paypal.secret')
            )
        );
    }

    /**
     * @return Details
     */
    protected function details()
    {
        $details = new Details();
        $details->setShipping(1.2)
            ->setTax(1.3)
            ->setSubtotal(17.50);
        return $details;
    }

    /**
     * @return Amount
     */
    protected function amount()
    {
        $amount = new Amount();
        $amount->setCurrency('USD');
        $amount->setTotal('9,99');
        $amount->setDetails($this->details());
        return $amount;
    }

}

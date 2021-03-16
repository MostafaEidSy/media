<?php

namespace App\Paypal;


use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\ShippingAddress;

class PaypalAgreement extends Paypal
{
    public function create($id)
    {
        return redirect($this->agreement($id));
    }

    /**
     * @param $id
     * @return string
     */
    protected function agreement($id)
    {
        $makeTimeNow = mktime(23,59,59,date('m'),date('d')+1,date('Y'));
        $timeNow = date('Y-m-d', $makeTimeNow) . 'T' . date('H:i:s', $makeTimeNow) . 'Z';
        $agreement = new Agreement();
        $agreement->setName('Base Agreement')
            ->setDescription('Basic Agreement')
            ->setStartDate($timeNow);

        $agreement->setPlan($this->plan($id));

        $agreement->setPayer($this->payer());

        $agreement->setShippingAddress($this->shippingAddress());

        $agreement = $agreement->create($this->apiContext);

        return $agreement->getApprovalLink();
    }

    /**
     * @param $id
     * @return Plan
     */
    protected function plan($id)
    {
        $plan = new Plan();
        $plan->setId($id);
        return $plan;
    }

    /**
     * @return Payer
     */
    protected function payer()
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        return $payer;
    }

    /**
     * @return ShippingAddress
     */
    protected function shippingAddress()
    {
        $shippingAddress = new ShippingAddress();
        $shippingAddress->setLine1('111 First Street')
            ->setCity('Saratoga')
            ->setPostalCode('95070')
            ->setCountryCode('DE');
        return $shippingAddress;
    }

    public function execute($token)
    {
        $agreement = new Agreement();
        $agreement->execute($token, $this->apiContext);
    }
}

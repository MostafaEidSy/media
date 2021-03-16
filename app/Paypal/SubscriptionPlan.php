<?php

namespace App\Paypal;


use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Common\PayPalModel;

class SubscriptionPlan extends Paypal
{
    public function create($name, $description, $price, $currency)
    {
        $plan = $this->Plan($name, $description);

        $paymentDefinition = $this->PaymentDefinition($name, $price, $currency);

        $chargeModel = $this->chargeModel($currency);

        $paymentDefinition->setChargeModels(array($chargeModel));

        $merchantPreferences = $this->merchantPreferences();

        $plan->setPaymentDefinitions(array($paymentDefinition));
        $plan->setMerchantPreferences($merchantPreferences);

        $output = $plan->create($this->apiContext);
        return $output;
    }

    protected function Plan($name, $description)
    {
        $plan = new Plan();
        $plan->setName($name)
            ->setDescription($description)
            ->setType('fixed');
        return $plan;
    }

    protected function PaymentDefinition($name, $price, $currency)
    {
        $paymentDefinition = new PaymentDefinition();
        $paymentDefinition->setName($name)
            ->setType('REGULAR')
            ->setFrequency('Month')
            ->setFrequencyInterval("1")
            ->setCycles("1")
            ->setAmount(new Currency(array('value' => $price, 'currency' => $currency)));
        return $paymentDefinition;
    }

    protected function chargeModel($currency)
    {
        $chargeModel = new ChargeModel();
        $chargeModel->setType('SHIPPING')
            ->setAmount(new Currency(array('value' => 0, 'currency' => $currency)));
        return $chargeModel;
    }

    /**
     * @return MerchantPreferences
     */
    protected function merchantPreferences()
    {
        $merchantPreferences = new MerchantPreferences();
        $merchantPreferences->setReturnUrl(config('services.paypal.url.executeAgreement.success'))
            ->setCancelUrl(config('services.paypal.url.executeAgreement.failure'))
            ->setAutoBillAmount("yes")
            ->setInitialFailAmountAction("CONTINUE")
            ->setMaxFailAttempts("0");
        return $merchantPreferences;
    }

    /**
     *
     */
    public function listPlan()
    {
        $params = array('page_size' => '10');
        return dd(Plan::all($params, $this->apiContext));
    }

    public function planDetails($id)
    {
        return Plan::get($id, $this->apiContext);
    }

    public function activate($id)
    {
        $createdPlan = $this->planDetails($id);
        $patch = new Patch();
        $value = new PayPalModel('{
	       "state":"ACTIVE"
	     }');

        $patch->setOp('replace')
            ->setPath('/')
            ->setValue($value);
        $patchRequest = new PatchRequest();
        $patchRequest->addPatch($patch);

        $createdPlan->update($patchRequest, $this->apiContext);

        return dd(Plan::get($createdPlan->getId(), $this->apiContext));
    }
}

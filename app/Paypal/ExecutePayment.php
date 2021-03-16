<?php
namespace App\Paypal;


use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class ExecutePayment extends Paypal
{
    public function execute()
    {
        $payment = $this->GetThePayment();
        $execution = $this->CreateExecution();
        $execution->addTransaction($this->transaction());
        return $payment->execute($execution, $this->apiContext);
    }

    /**
     * @return Payment
     */
    protected function GetThePayment()
    {
        $paymentId = request('paymentId');
        return Payment::get($paymentId, $this->apiContext);
    }

    /**
     * @return PaymentExecution
     */
    protected function CreateExecution()
    {
        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));
        return $execution;
    }

    /**
     * @return Transaction
     */
    protected function transaction()
    {
        $transaction = new Transaction();
        $transaction->setAmount($this->amount());
        return $transaction;
    }
}

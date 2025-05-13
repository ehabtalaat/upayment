<?php

namespace Ehabtalaat\Upayment;

class PaymentService
{
    protected PaymentGatewayInterface $gateway;

    public function __construct(PaymentGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function charge(array $data)
    {
        return $this->gateway->charge($data);
    }
}

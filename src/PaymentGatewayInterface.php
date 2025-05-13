<?php

namespace Ehabtalaat\Upayment;

interface PaymentGatewayInterface
{
    public function charge(array $payload);
}


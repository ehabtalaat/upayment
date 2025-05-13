<?php

namespace Ehabtalaat\Upayment;
use GuzzleHttp\Client;


class UPaymentGateway implements PaymentGatewayInterface
{
    protected $token;
    protected $url;
    protected $currency;
    protected $client;

    public function __construct(array $config)
    {
        $this->token = $config['token'] ?? '';
        $this->url = $config['url'] ?? '';
        $this->currency = $config['currency'] ?? 'KWD';
        $this->client = new Client(); // Instantiate Guzzle client
    }
    public function charge(array $payload)
    {
        $timestamp = date('YmdHis');
        $orderReference = 'ref_' . $timestamp;
        $referenceId = $orderReference . rand(1000, 9999);

        $data = [
            "order" => [
                "id" => $payload['orderId'] ?? "",
                "reference" => $orderReference,
                "description" => $payload['description'] ?? "",
                "currency" => $this->currency,
                "amount" => $payload['amount'] ?? 0
            ],
            "language" => $payload['language'] ?? 'en',
            "paymentGateway" => [
                "src" => "knet"
            ],
            "reference" => [
                "id" => $referenceId
            ],
            "customer" => [
                "uniqueId" => uniqid(),
                "name" => $payload['name'] ?? '',
                "email" => $payload['email'] ?? '',
                "mobile" => $payload['mobile'] ?? ''
            ],
            "returnUrl" => $payload['returnUrl'] ?? '',
            "cancelUrl" => $payload['cancelUrl'] ?? '',
            "notificationUrl" => $payload['notificationUrl'] ?? '',
        ];

        try {
            $response = $this->client->post("{$this->url}/charge", [
                'json' => $data,
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token,
                    'Content-Type' => 'application/json',
                ]
            ]);

            $body = $response->getBody();
            return json_decode($body, true);

        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }


}

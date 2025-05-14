# UPayment PHP Integration

A simple and lightweight package to integrate with the [UPayment](https://www.upayment.com/) payment gateway in PHP (Laravel compatible).

> ✅ Created for learning and experimenting with package development — feel free to use and contribute.

---

## 🚀 Installation

```bash
composer require ehabtalaat/upayment
```

## 📖 Usage

```php


use Ehabtalaat\Upayment\Gateway\UPaymentGateway;
use Ehabtalaat\Upayment\Services\PaymentService;

$config = [
    "token"    => "YOUR_TOKEN",
    "url"      => "https://secure.upayment.io/payment-request",
    "currency" => "KWD", // or any supported currency
];

$gateway = new UPaymentGateway($config);

$paymentService = new PaymentService($gateway);

$payload = [
    "name"           => "Company XYZ", // Example company name
    "email"          => "contact@companyxyz.com", // Example company email
    "mobile"         => "50000000", // Example phone number
    "description"    => "payment description", // Payment description
    "orderId"        => "123456789", // Example order ID
    "amount"         => 1000.00, // Example tender bond amount
    "returnUrl"      => "https://yourdomain.com/payment/success", // Replace with your actual success URL
    "cancelUrl"      => "https://yourdomain.com/payment/fail", // Replace with your actual fail URL
    "notificationUrl"=> "https://yourdomain.com/payment/notify", // Replace with your actual notification URL
];

$response = $paymentService->charge($payload);

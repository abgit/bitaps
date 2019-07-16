
This library provides an API to use bitaps.com services.

Install with Composer
------------
Add `abgit/bitaps` as a dependency and run composer update:

```
"require": {
    ...
    "abgit/bitaps" : "0.1.*"
    ...
}
```


Market API:

```php
<?php

// import dependencies
require 'vendor/autoload.php';

// get the bitaps class instance
$market = new bitaps\market();

// Tickers - Average price
$result = $market->averagePrice();

// Tickers - Ticker list
$result = $market->tickerList(); 
```

Payment Forwarding API:

```php
<?php

// import dependencies
require 'vendor/autoload.php';

// get the bitaps class instance
$pf = new bitaps\paymentforwarding();

// Payment forwarding API: Payment forwarding - Create forwarding address
$result = $pf->createForwardingAddress( $forwarding_address, $callback_link, $confirmations );

// Payment forwarding API: Payment forwarding - Payment address state
$result = $pf->paymentAddressState( $address, $PaymentCode, $AccessToken );

// Payment forwarding API: Payment forwarding - List of payment address transactions
$result = $pf->listOfPaymentAddressTransactions( $address, $PaymentCode, $AccessToken, $from, $to, $limit, $page );

// Payment forwarding API: Payment forwarding - Callback handler
$result = $pf->callbackHandler();

// Payment forwarding API: Payment forwarding - Callback log for payment address
$result = $pf->callbackLogForPaymentAddress( $address, $PaymentCode, $AccessToken, $limit, $page );

// Payment forwarding API: Payment forwarding - Callback log for payment
$result = $pf->callbackLogForPayment( $tx_hash, $output, $PaymentCode, $AccessToken, $limit, $page );

// Payment forwarding API: Domain authorization - Create domain authorization code
$result = $pf->createDomainAuthorizationCode( $callback_link );

// Payment forwarding API: Domain authorization - Create domain access token
$result = $pf->createDomainAccessToken( $callback_link );

// Payment forwarding API: Domain statistics - Domain statistics
$result = $pf->domainStatistics( $domainHash, $AccessToken );

// Payment forwarding API: Domain statistics - List of created addresses
$result = $pf->listOfCreatedAddresses( $domainHash, $AccessToken, $from, $to, $limit, $page );

// Payment forwarding API: Domain statistics - List of domain transactions
$result = $pf->listOfDomainTransactions( $domainHash, $AccessToken, $from, $to, $limit, $page, $type );

// Payment forwarding API: Domain statistics - Daily domain statistics
$result = $pf->dailyDomainStatistics( $domainHash, $AccessToken, $from, $to, $limit, $page);
```

Wallet API:

```php
<?php

// import dependencies
require 'vendor/autoload.php';

// create a new wallet
$wallet = new bitaps\wallet();
$result = $wallet->create( $callback_link, $password );

// or init a previous created wallet
$wallet = new bitaps\wallet( $wallet_id, $password );

// Wallet API: add Address to Wallet
$result = $wallet->addAddress( $callback_link, $confirmations );

// Wallet API: add and process payments
$result = $wallet->addPayment( $address_1, $amount_1 )->addPayment( $address_2, $amount_2 )->pay();

// Wallet API: Wallet state
$result = $wallet->state();

// Wallet API: Wallet transactions
$result = $wallet->transactions( $from, $to, $limit, $page );

// Wallet API: Wallet addresses
$result = $wallet->addresses( $from, $to, $limit, $page );

// Wallet API: Wallet transactions per Address
$result = $wallet->addressTransactions( $address, $from, $to, $limit, $page );

// Wallet API: Wallet daily statistics
$result = $wallet->statistics( $from, $to, $limit, $page );

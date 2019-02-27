
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
$bitaps = new bitaps\market();

// Tickers - Average price
$price = $bitaps->averagePrice();

// Tickers - Ticker list
$list = $bitaps->tickerList(); 
```

Payment Forwarding API:

```php
// Payment forwarding API: Payment forwarding - Create forwarding address
$bitaps->createForwardingAddress( $forwarding_address, $callback_link, $confirmations );

// Payment forwarding API: Payment forwarding - Payment address state
$bitaps->paymentAddressState( $address, $PaymentCode, $AccessToken );

// Payment forwarding API: Payment forwarding - List of payment address transactions
$bitaps->listOfPaymentAddressTransactions( $address, $PaymentCode, $AccessToken, $from, $to, $limit, $page );

// Payment forwarding API: Payment forwarding - Callback handler
$bitaps->callbackHandler(){

// Payment forwarding API: Payment forwarding - Callback log for payment address
$bitaps->callbackLogForPaymentAddress( $address, $PaymentCode, $AccessToken, $limit, $page );

// Payment forwarding API: Payment forwarding - Callback log for payment
$bitaps->callbackLogForPayment( $tx_hash, $output, $PaymentCode, $AccessToken, $limit, $page );

// Payment forwarding API: Domain authorization - Create domain authorization code
$bitaps->createDomainAuthorizationCode( $callback_link );

// Payment forwarding API: Domain authorization - Create domain access token
$bitaps->createDomainAccessToken( $callback_link );

// Payment forwarding API: Domain statistics - Domain statistics
$bitaps->domainStatistics( $domainHash, $AccessToken );

// Payment forwarding API: Domain statistics - List of created addresses
$bitaps->listOfCreatedAddresses( $domainHash, $AccessToken, $from, $to, $limit, $page );

// Payment forwarding API: Domain statistics - List of domain transactions
$bitaps->listOfDomainTransactions( $domainHash, $AccessToken, $from, $to, $limit, $page, $type ){

// Payment forwarding API: Domain statistics - Daily domain statistics
$bitaps->dailyDomainStatistics( $domainHash, $AccessToken, $from, $to, $limit, $page);
```

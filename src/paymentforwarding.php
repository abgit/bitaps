<?php

namespace bitaps;

class paymentforwarding extends request {

    public function __construct(){
        $this->setEndpoint( 'https://api.bitaps.com/btc/v1/' );
    }

    // Payment forwarding API: Payment forwarding - Create forwarding address
    public function createForwardingAddress( $forwarding_address, $callback_link = null, $confirmations = null ){
        return $this->post( $this->endpoint . '/create/payment/address',
            array( 'forwarding_address' => $forwarding_address,
                   'callback_link'      => $callback_link,
                   'confirmations'      => $confirmations )
        );
    }

    // Payment forwarding API: Payment forwarding - Payment address state
    public function paymentAddressState( $address, $PaymentCode, $AccessToken ){
        return $this->get( $this->endpoint . '/payment/address/state/' . $address,
            array( 'Payment-Code ' => $PaymentCode,
                   'Access-Token ' => $AccessToken )
        );
    }

    // Payment forwarding API: Payment forwarding - List of payment address transactions
    public function listOfPaymentAddressTransactions( $address, $PaymentCode, $AccessToken, $from = null, $to = null, $limit = null, $page = null ){
        return $this->get( $this->endpoint . '/payment/address/transactions/' . $address,
            array( 'Payment-Code ' => $PaymentCode,
                   'Access-Token ' => $AccessToken ),
            array( 'from'  => $from,
                   'to'    => $to,
                   'limit' => $limit,
                   'page'  => $page )
        );
    }

    // Payment forwarding API: Payment forwarding - Callback handler
    public function callbackHandler(){
        return $this->post( $this->endpoint . '/callback/handler/example' );
    }

    // Payment forwarding API: Payment forwarding - Callback log for payment address
    public function callbackLogForPaymentAddress( $address, $PaymentCode, $AccessToken, $limit = null, $page = null ){
        return $this->get( $this->endpoint . '/payment/address/callback/log/' . $address,
            array( 'Payment-Code ' => $PaymentCode,
                   'Access-Token ' => $AccessToken ),
            array( 'limit' => $limit,
                   'page'  => $page )
        );
    }

    // Payment forwarding API: Payment forwarding - Callback log for payment
    public function callbackLogForPayment( $tx_hash, $output, $PaymentCode, $AccessToken, $limit = null, $page = null ){
        return $this->get( $this->endpoint . ' /payment/callback/log/' . $tx_hash . '/' . $output,
            array( 'Payment-Code ' => $PaymentCode,
                   'Access-Token ' => $AccessToken ),
            array( 'limit' => $limit,
                   'page'  => $page )
        );
    }

    // Payment forwarding API: Domain authorization - Create domain authorization code
    public function createDomainAuthorizationCode( $callback_link ){
        return $this->post( $this->endpoint . '/create/domain/authorization/code',
            array( 'callback_link' => $callback_link )
        );
    }

    // Payment forwarding API: Domain authorization - Create domain access token
    public function createDomainAccessToken( $callback_link ){
        return $this->post( $this->endpoint . '/create/domain/access/token',
            array( 'callback_link' => $callback_link )
        );
    }

    // Payment forwarding API: Domain statistics - Domain statistics
    public function domainStatistics( $domainHash, $AccessToken ){
        return $this->get( $this->endpoint . '/domain/state/' . $domainHash,
            array( 'Access-Token ' => $AccessToken )
        );
    }

    // Payment forwarding API: Domain statistics - List of created addresses
    public function listOfCreatedAddresses( $domainHash, $AccessToken, $from = null, $to = null, $limit = null, $page = null ){
        return $this->get( $this->endpoint . '/domain/addresses/' . $domainHash,
            array( 'Access-Token ' => $AccessToken ),
            array( 'from'  => $from,
                   'to'    => $to,
                   'limit' => $limit,
                   'page'  => $page )

        );
    }

    // Payment forwarding API: Domain statistics - List of domain transactions
    public function listOfDomainTransactions( $domainHash, $AccessToken, $from = null, $to = null, $limit = null, $page = null, $type = null ){
        return $this->get( $this->endpoint . '/domain/transactions/' . $domainHash,
            array( 'Access-Token ' => $AccessToken ),
            array( 'from'  => $from,
                   'to'    => $to,
                   'limit' => $limit,
                   'page'  => $page,
                   'type'  => $type )
        );
    }

    // Payment forwarding API: Domain statistics - Daily domain statistics
    public function dailyDomainStatistics( $domainHash, $AccessToken, $from = null, $to = null, $limit = null, $page = null ){
        return $this->get( $this->endpoint . '/domain/daily/statistic/' . $domainHash,
            array( 'Access-Token ' => $AccessToken ),
            array( 'from'  => $from,
                   'to'    => $to,
                   'limit' => $limit,
                   'page'  => $page )
        );
    }

}
<?php

namespace bitaps;

class wallet extends request {

    private $wallet_id;
    private $password;
    private $receivers_list = array();

    public function __construct( $wallet_id = null, $password = null ){
        $this->setEndpoint( 'https://api.bitaps.com/btc/v1/' );

        $this->wallet_id      = $wallet_id;
        $this->password       = $password;
    }

    // Wallet API: Create Wallet
    public function create( $callback_link = null, $password = null ){
        $json = $this->post( $this->endpoint . '/create/wallet',
            array( 'callback_link'   => $callback_link,
                   'password'        => $password )
        );

        if( isset( $json[ 'wallet_id'] ) && isset( $json[ 'currency'] ) ){
            $this->wallet_id = $json[ 'wallet_id'];
            $this->password  = $password;
        }

        return $json;
    }

    // Wallet API: add Address to Wallet
    public function addAddress( $callback_link = null, $confirmations = null ){
        return $this->post( $this->endpoint . '/create/wallet/payment/address',
            array( 'wallet_id'     => $this->wallet_id,
                   'callback_link' => $callback_link,
                   'confirmations' => $confirmations )
        );
    }

    // Wallet API: add payments
    public function & addPayment( $address, $amount ){
        $this->receivers_list[] = array( 'address' => $address, 'amount' => $amount );

        return $this;
    }

    // Wallet API: Process payments
    public function pay(){

        list( $nonce, $signature ) = $this->getAccess();

        return $this->post( $this->endpoint . '/wallet/send/payment/' . $this->wallet_id,
            array( 'receivers_list'   => $this->receivers_list
                 ),
            array( 'Access-Nonce'     => $nonce,
                   'Access-Signature' => $signature )
        );
    }


    private function getAccess(){
        $nonce      = round(microtime(true) * 1000 );
        $key        = hash('sha256', hash('sha256', $this->wallet_id . $this->password, true ), true );
        $msg        = $this->wallet_id . $nonce;
        $signature  = hash_hmac ( 'sha256', $msg, $key );

        return array( $nonce, $signature );
    }

    // Wallet API: Wallet state
    public function state(){

        list( $nonce, $signature ) = $this->getAccess();

        return $this->get( $this->endpoint . '/wallet/state/' . $this->wallet_id,
            array( 'Access-Nonce'     => $nonce,
                   'Access-Signature' => $signature )
        );
    }

    // Wallet API: Wallet transactions
    public function transactions( $from = null, $to = null, $limit = null, $page = null ){

        list( $nonce, $signature ) = $this->getAccess();

        return $this->get( $this->endpoint . '/wallet/transactions/' . $this->wallet_id,
            array( 'Access-Nonce'     => $nonce,
                   'Access-Signature' => $signature ),
            array( 'from'  => $from,
                   'to'    => $to,
                   'limit' => $limit,
                   'page'  => $page )
        );
    }

    // Wallet API: Wallet addresses
    public function addresses( $from = null, $to = null, $limit = null, $page = null ){

        list( $nonce, $signature ) = $this->getAccess();

        return $this->get( $this->endpoint . '/wallet/addresses/' . $this->wallet_id,
            array( 'Access-Nonce'     => $nonce,
                   'Access-Signature' => $signature ),
            array( 'from'  => $from,
                   'to'    => $to,
                   'limit' => $limit,
                   'page'  => $page )
        );
    }


    // Wallet API: Wallet transactions per Address
    public function addressTransactions( $address, $from = null, $to = null, $limit = null, $page = null ){

        list( $nonce, $signature ) = $this->getAccess();

        return $this->get( $this->endpoint . '/wallet/address/transactions/' . $this->wallet_id . '/' . $address,
            array( 'Access-Nonce'     => $nonce,
                   'Access-Signature' => $signature ),
            array( 'from'  => $from,
                   'to'    => $to,
                   'limit' => $limit,
                   'page'  => $page )
        );
    }


    // Wallet API: Wallet daily statistics
    public function statistics( $from = null, $to = null, $limit = null, $page = null ){

        list( $nonce, $signature ) = $this->getAccess();

        return $this->get( $this->endpoint . '/wallet/daily/statistic/' . $this->wallet_id,
            array( 'Access-Nonce'     => $nonce,
                   'Access-Signature' => $signature ),
            array( 'from'  => $from,
                   'to'    => $to,
                   'limit' => $limit,
                   'page'  => $page )
        );
    }

}
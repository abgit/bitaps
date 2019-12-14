<?php

namespace bitaps;

class ledger extends request {

    public function __construct(){
        $this->setEndpoint( 'https://api.bitaps.com/btc/v1/blockchain/' );
    }

    // Ledger API: Transaction
    public function transaction( $hash ){

        return $this->get( $this->endpoint . '/transaction/' . $hash );
    }

}
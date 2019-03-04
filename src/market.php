<?php

namespace bitaps;

class market extends request{

    public function __construct(){
        $this->setEndpoint( 'https://api.bitaps.com/market/v1/' );
    }

    // Market API: Tickers - Average price
    public function averagePrice( $pair = 'btcusd' ){
        return $this->get( $this->endpoint . '/ticker/' . $pair );
    }

    // Market API: Tickers - Ticker list
    public function tickerList( $list = 'btcusd' ){
        return $this->get( $this->endpoint . '/tickers/' . $list );
    }

}

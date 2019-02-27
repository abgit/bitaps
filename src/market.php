<?php

namespace bitaps;

class market extends request{

    private $endpoint_market = 'https://api.bitaps.com/market/v1/';

    public function setmarket( $url ){
        $this->endpoint_market = $url;
    }

    // Market API: Tickers - Average price
    public function averagePrice( $pair = 'btcusd' ){
        return $this->get( $this->endpoint_market . '/ticker/' . $pair );
    }

    // Market API: Tickers - Ticker list
    public function tickerList( $list = 'btcusd' ){
        return $this->get( $this->endpoint_market . '/tickers/' . $list );
    }

}

<?php

namespace bitaps;

class request{

    private $json_assoc = true;

    public function setJsonObject(){
        $this->json_assoc = false;
    }

    protected function get( $url, $headers = array(), $getparams = array() ){

        $getparams = $this->clear( $getparams );
        $getparams = empty( $getparams ) ? '' : ( '?' . http_build_query( $getparams ) );

        $req = Requests::get($url . $getparams, $headers );
        return $req->success ? json_decode( $req->body, $this->json_assoc ) : null;
    }


    protected function post( $url, $data = array() ){

        $req = Requests::post( $url, array('Content-Type' => 'application/json'), json_encode( $this->clear( $data ) ) );
        return $req->success ? json_decode( $req->body, $this->json_assoc ) : null;
    }


    protected function clear( $arr ){

        // delete empty values
        foreach ( $arr as $k => $v ){
            if( empty( $v ) && $v !== 0 && $v !== '0' ) {
                unset( $arr[$k] );
            }
        }

        return $arr;
    }
}
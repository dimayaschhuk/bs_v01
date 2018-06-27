<?php

namespace App\Http\Controllers\Functional;

use App\Models\Market;

class FunctionalBirzha {

    protected $coinigy_api_key;   
    protected $coinigy_api_secret;   
    protected $endpoint;
    protected $marketName;
    protected $exch_name;

        

    public function orderGo($order_count, $exch_name, $exch_market) {
    	$this->marketName = $exch_market . '/BTC';
    	$this->exch_name = $exch_name;
    	$this->coinigy_api_key = 'be2d66575838a1abfbc3d08d617b2fcc';
        $this->coinigy_api_secret = 'dca80c63553fc0690ac18da25e6a66c7';
        $this->endpoint = 'https://api.coinigy.com/api/v1/'; //with trailing slash


    	$result = $this->accounts(); 
        $resultBalance = $this->balances($result->data[0]->auth_id);

        $needMarket = Market::where('mkt_name', 'like', '%' . $this->marketName . '%')->get();

        if(empty($needMarket)) {
            $this->db_marker_update();
            $needMarket = Market::where('mkt_name', 'like', '%' . $this->marketName . '%')->get();
        }
                
        $request['limit_price'] = $this->price($needMarket[0]['exch_code'], $needMarket[0]['mkt_name'])->data[0]->low_trade;
        $request['order_auth_id'] = $result->data[0]->auth_id;
        $request['order_exch_id'] = $needMarket[0]['exch_id'];
        $request['order_mkt_id'] = $needMarket[0]['mkt_id'];
        $request['order_type_id'] = 2;
        $request['price_type_id'] = 1;
        $request['order_quantity'] = $order_count;

        $resultOrder = $this->addOrder($request['order_auth_id'], $request['order_exch_id'], $request['order_mkt_id'], $request['order_type_id'], $request['price_type_id'], $request['limit_price'], $request['order_quantity']);           
        return $resultOrder;
    }

    public function searchCourseCoin($exch_name, $exch_market) {
    	$this->coinigy_api_key = 'be2d66575838a1abfbc3d08d617b2fcc';
        $this->coinigy_api_secret = 'dca80c63553fc0690ac18da25e6a66c7';
        $this->endpoint = 'https://api.coinigy.com/api/v1/'; //with trailing slash
    	$this->marketName = $exch_market . '/BTC';
    	$this->exch_name = $exch_name;

    	$needMarket = Market::where('mkt_name', 'like', '%' . $this->marketName . '%')->get();
        $resultPrice = $this->price($needMarket[0]['exch_code'], $needMarket[0]['mkt_name'])->data[0]->low_trade;

        return $resultPrice;
    }


    protected function db_marker_update() {
        $result = $this->exchanges();

        Market::where('exch_name', $this->exch_name)->delete();
        $result2 = $this->markets($result->data[23]->exch_code);
           
        foreach ($result2->data as $value) {
            $this->output_result($value);
            $market = new Market;

            $market->exch_id = $value->exch_id;
            $market->exch_name = $value->exch_name;
            $market->exch_code = $value->exch_code;
            $market->mkt_id = $value->mkt_id;
            $market->mkt_name = $value->mkt_name;
            $market->exchmkt_id = $value->exchmkt_id;

            $market->save();
        }
    }

    protected function accounts() {
        $post_arr = array();
        $result = $this->doWebRequest('accounts', $post_arr);        
        return $result;                  
    }
    
    protected function activity() {
        $post_arr = array();
        $result = $this->doWebRequest('activity', $post_arr);        
        return $result;                  
    }
  
    protected function balances($auth_ids) {
        $post_arr = array();
        $post_arr["auth_ids"] = $auth_ids;          
        
        $result = $this->doWebRequest('balances', $post_arr);        
        return $result;                  
    }

    protected function price($exchange_code, $exchange_market) {
        $post_arr = array();
        $post_arr["exchange_code"] = $exchange_code; 
        $post_arr["exchange_market"] = $exchange_market;          
        
        return $this->doWebRequest('ticker', $post_arr);  
    }
    
    protected function pushNotifications() {
        $post_arr = array();
        $result = $this->doWebRequest('pushNotifications', $post_arr);        
        return $result;                  
    }
    
    protected function user_orders() {
        $post_arr = array();
        $result = $this->doWebRequest('orders', $post_arr);        
        return $result;                  
    }
    
    protected function alerts() {
        $post_arr = array();
        $result = $this->doWebRequest('alerts', $post_arr);        
        return $result;                  
    }
    
    protected function exchanges() {
        $post_arr = array();
        $result = $this->doWebRequest('exchanges', $post_arr);        
        return $result;                  
    }
    
    protected function markets($exchange_code) {
        $post_arr = array();
        $post_arr["exchange_code"] = $exchange_code;  
        
        $result = $this->doWebRequest('markets', $post_arr);        
        return $result;                  
    }
  
    protected function history($exchange_code, $exchange_market) {
        $post_arr = array();        
        $post_arr["exchange_code"] = $exchange_code;  
        $post_arr["exchange_market"] = $exchange_market;
        $post_arr["type"] = "history";
        
        
        $result = $this->doWebRequest('data', $post_arr);        
        return $result;                  
    }
   
    protected function asks($exchange_code, $exchange_market) {
        $post_arr = array();
        $post_arr["exchange_code"] = $exchange_code;  
        $post_arr["exchange_market"] = $exchange_market;
        $post_arr["type"] = "asks";
        
        $result = $this->doWebRequest('data', $post_arr);        
        return $result;                  
    }
  
    protected function bids($exchange_code, $exchange_market) {
        $post_arr = array();
        $post_arr["exchange_code"] = $exchange_code;  
        $post_arr["exchange_market"] = $exchange_market;
        $post_arr["type"] = "bids";
        
        $result = $this->doWebRequest('data', $post_arr);        
        return $result;                  
    }
    
    //asks + bids + history
    protected function data($exchange_code, $exchange_market) {               
        $post_arr = array();
        $post_arr["exchange_code"] = $exchange_code;  
        $post_arr["exchange_market"] = $exchange_market;
        $post_arr["type"] = "all";
        
        $result = $this->doWebRequest('data', $post_arr);        
        return $result;                  
    }
    
    //asks + bids
    protected function orders($exchange_code, $exchange_market) {
        
        $post_arr = array();
        $post_arr["exchange_code"] = $exchange_code;  
        $post_arr["exchange_market"] = $exchange_market;
        $post_arr["type"] = "orders";
        
        $result = $this->doWebRequest('data', $post_arr);        
        
        return $result;                  
    } 
    
    protected function newsFeed() {
        $post_arr = array();        
        
        $result = $this->doWebRequest('newsFeed', $post_arr);        
        return $result;          
    }  
    
    protected function orderTypes() {
        $post_arr = array();
        $result = $this->doWebRequest('orderTypes', $post_arr);        
        return $result;          
    }
    
    
    ////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////
    //////////////////////                      ////////////////////////////////////////
    /////////////            ACTION METHODS         ////////////////////////////////////
    /////////////////////                       ////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////
    
    
    protected function refreshBalance($auth_id) {
        
        $post_arr = array();
        $post_arr["auth_id"] = $auth_id;  
        
        $result = $this->doWebRequest('refreshBalance', $post_arr);        
        return $result;                  
    }
    
    protected function addAlert($exchange_code, $exchange_market, $alert_price) {
        $post_arr = array();
        $post_arr["exch_code"] = $exchange_code;  
        $post_arr["market_name"] = $exchange_market;      
        $post_arr["alert_price"] = $alert_price;      
        
        $result = $this->doWebRequest('addAlert', $post_arr);        
        return $result;          
    }
    
    protected function deleteAlert($delete_alert_id) {
        $post_arr = array();
        $post_arr["alert_id"] = $delete_alert_id;
        
        $result = $this->doWebRequest('deleteAlert', $post_arr);        
        return $result;          
    }
    
    // То что нам нужно.
    protected function addOrder($order_auth_id, $order_exch_id, $order_mkt_id, $order_type_id, $price_type_id, $limit_price, $order_quantity) {
        $post_arr = array();
        $post_arr["auth_id"] = $order_auth_id;
        $post_arr["exch_id"] = $order_exch_id;
        $post_arr["mkt_id"] = $order_mkt_id;     
        $post_arr["order_type_id"] = $order_type_id;     
        $post_arr["price_type_id"] = $price_type_id;
        $post_arr["limit_price"] =$limit_price;        
        $post_arr["order_quantity"] = $order_quantity;           
        
        $result = $this->doWebRequest('addOrder', $post_arr);        
        /*return $result;*/
        return $result;          
        
    }

    protected function cancelOrder($cancel_order_id) {    
        $post_arr = array();
        $post_arr["internal_order_id"] = $cancel_order_id;           
        
        $result = $this->doWebRequest('cancelOrder', $post_arr);        
        return $result;          
        
    }
    
    
    private function doWebRequest($method, $post_arr) {
                        
        $url = $this->endpoint.$method;
        
        $headers = array('X-API-KEY: ' . $this->coinigy_api_key,
                         'X-API-SECRET: ' . $this->coinigy_api_secret);
            
        
        // our curl handle (initialize if required)
        static $ch = null;
        if (is_null($ch)) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; Coinigy App Client; '.php_uname('s').'; PHP/'.phpversion().')');
        }                
     
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_arr);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
        $res = curl_exec($ch);                
       
        if ($res === false)  {
            echo "CURL Failed - Check URL";
            return false;
        }        
        
        $dec = json_decode($res);
        
        if (!$dec) {
            
            echo "Invalid JSON returned - Redirect to Login";
            return false;   
        }                
        
        return $dec;
        
    }
        
    private function output_result($result) {        
        if($result) {
            if(isset($result->error))
                $this->pre($result->error);
            elseif(isset($result))
                $this->pre($result);
        }
    } 

    private function pre($array) {
        echo "<pre>".print_r($array, true)."</pre>";
    }

}
<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Payout;

class PayoutsController extends Controller {
    
    public function index() {
        return view('cabinet/payouts');
    }

    public function list(Request $request) {
        $payouts = Payout::query();

        $payouts = $payouts->where('user_id', Auth::id());
        $payouts = $payouts->where('sum', '>', 0);

        if($request->count !== 'all') {
            $payouts = $payouts->take($request->count);
        }

        $payouts = $payouts->orderBy('created_at', 'DESC');
        $payouts = $payouts->get();
                    
                    

        for ($i=0; $i < count($payouts); $i++) { 
            $payouts[$i]['day'] = date('d', strtotime($payouts[$i]['created_at']));
            $payouts[$i]['month'] = date('m', strtotime($payouts[$i]['created_at']));
            $payouts[$i]['year'] = date('Y', strtotime($payouts[$i]['created_at']));
            $payouts[$i]['hour'] = date('H', strtotime($payouts[$i]['created_at']));
            $payouts[$i]['minute'] = date('i', strtotime($payouts[$i]['created_at']));

            $ss = strrpos($payouts[$i]['sum'], '.');
            if($ss) {
                $payouts[$i]['sum'] = substr($payouts[$i]['sum'], 0, $ss + 1 + 8);
            }
        }
        
        return $payouts;
    }
}

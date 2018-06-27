<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Pages\MenuController;

use App\User;
use App\Models\Farm;
use App\Models\Payout;
use App\Models\Coin;
use App\Models\FarmsIncomes;
use App\Models\FarmAltcoinBalance;

class MainController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
//        $farmCountList['work'] = Farm::where(array('user_id' => Auth::id(), 'status_id' => 1))->count();
//        $farmCountList['problem'] = Farm::where(array('user_id' => Auth::id(), 'status_id' => 2))->count();
//        $farmCountList['unwork'] = Farm::where(array('user_id' => Auth::id(), 'status_id' => 3))->count();
//        $farmCountList['offline'] = Farm::where(array('user_id' => Auth::id(), 'status_id' => 4))->count();
//
//        $this->farm = Farm::where(array('status_id' => 1))->count();
//        $this->user = User::count() + 5;
//        $this->coin = Coin::count();
//        $this->paid = 0;
//
//
//        $payout = Payout::where('type', 'withdraw')
//                    ->where('status', 'verified')
//                    ->get();
//        foreach ($payout as $value) {
//            $this->paid += -(floor($value['sum'] * 100000000) / 100000000);
//        }
//
//
//        $farm = new Farm;
//        $farmList = $farm->getFarmList(Auth::id());
//        $sumHash = 0;
//
//        for($i=0; $i < count($farmList); $i++) {
//            $poolfarmhash = FarmsIncomes::where('farm_id', $farmList[$i]['id'])
//            ->take(24)
//            ->get();
//
//            if(!empty($poolfarmhash)) {
//                foreach($poolfarmhash as $value) {
//                    $ss = strrpos($value['per_hour'], '.');
//                    if($ss) {
//                        $number = substr($value['per_hour'], 0, $ss + 1 + 8);
//                    }
//                    $sumHash = $sumHash + $number;
//                }
//            }
//        }

        

        return view('main/index');
    }
}

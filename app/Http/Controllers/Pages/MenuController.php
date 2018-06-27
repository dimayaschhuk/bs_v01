<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Invite;
use App\Models\Farm;
use App\Models\Payout;
use App\Models\Status;
use App\Models\FarmsIncomes;
use App\Models\PoolFarmStatHash;
use App\Models\FarmAltcoinBalance;
use App\Models\CurrentHash;
use Illuminate\Notifications\Messages\SlackMessage;

class MenuController extends Controller {

    const MONTH = 1;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    static public function user() {
        return Auth::user();
    }

    public function dashboard(Request $request) {
        $type = $request->type;
        settype($type, "integer");
        $data = array();

        $timeStep[self::MONTH] = 86400;
        $countStep[self::MONTH] = 30;

        for ($i = $countStep[self::MONTH] * 24, $s = 0; $i >= 0; $i--, $s++) { 
            $data[$s][0] = mktime((0 - $i), 0, 0, date("m"), date("d"), date("Y"));  
            $data[$s][1] = 0;
        }

        $farm = new Farm;
        $farmList = $farm->getFarmList(Auth::id());
        foreach ($farmList as $value) {
            $farms[] = $value['id'];
        }
        $time = mktime(-1, 0, 0, date("m"), date("d") + 1, date("Y"));
 
        for ($i = $countStep[self::MONTH] * 24; $i >= 0; $i--, $time -= 3600) {
            $highTimeBorder = $time + 3600;
            $poolfarmincome = FarmAltcoinBalance::whereIn('farm_id', $farms)
            ->where('created_at', '>', $time)
            ->where('created_at', '<', $highTimeBorder)
            ->get();
            
            foreach ($poolfarmincome as $value) {
                $data[$i][1] += $value['paid_btc'];
            }
            $data[$i][1] = floor($data[$i][1] * 100000000) / 100000000;
            $data[$i][0] = $data[$i][0] * 1000;
        }

        return $data;
    }

    public function workers() {
        $farmCountList['work'] = Farm::where(array('user_id' => Auth::id(), 'status_id' => 1))->count();
        $farmCountList['problem'] = Farm::where(array('user_id' => Auth::id(), 'status_id' => 2))->count();
        $farmCountList['unwork'] = Farm::where(array('user_id' => Auth::id(), 'status_id' => 3))->count();
        $farmCountList['offline'] = Farm::where(array('user_id' => Auth::id(), 'status_id' => 4))->count();


        $farm = new Farm;
        $statusList = Status::all();
        $farmList = $farm->getFarmList(Auth::id());
        
        $sumHashrate = 0;
        $sumHash = 0;

        for($i=0; $i < count($farmList); $i++) { 
            $status_id = $farmList[$i]['status_id'] - 1;
            $farmList[$i]['status'] = $statusList[$status_id];
            $sum = 0;
            $hashrate = 0;

            $now = time();
            $lowTimeBorder = $now - 86400;
            $poolfarmhashSum = FarmAltcoinBalance::where('farm_id', $farmList[$i]['id'])
                ->where('created_at', '>', $lowTimeBorder)
                ->where('created_at', '<', $now)
                ->sum('paid_btc');

            $poolFarmStatHash = PoolFarmStatHash::where('farm_id', $farmList[$i]['id'])
                ->orderBy('created_at', 'DESC')
                ->take(1)
                ->get();


            $farmList[$i]['hash'] = floor($poolfarmhashSum * 100000000) / 100000000;

            $sumHash += $farmList[$i]['hash'];

            if(!empty($poolFarmStatHash)) {
                foreach ($poolFarmStatHash as $value) {
                    $hashrate = floor($value['hash'] * 100000000) / 100000000;
                    $sumHashrate += $hashrate;
                }
            }
            $farmList[$i]['hashrate'] = $hashrate;

        }

        $user = User::findOrFail(Auth::id());
        $user = $user->toArray();

        $user['balance'] = floor($user['balance'] * 100000000) / 100000000;
        $sumHashrate = floor($sumHashrate * 100000000) / 100000000;
        $sumHash = floor($sumHash * 100000000) / 100000000;

        $response = array(
            'data' => $farmList,
            'sumHash' => $sumHash,
            'sumHashrate' => $sumHashrate,
            'user' => $user,
            'farmCount' => $farmCountList
        );

        return $response;
    }

    public function delete($id) {
        $farm = Farm::findOrFail($id);

        $farm->status_id = 5;
        
        $farm->push();
    }

    public function payouts(Request $request) {
        $note = 'Request for payment';

        $user = User::findOrFail(Auth::id());
        $payoutSum = $request->payoutSum;

        if(!is_float($payoutSum) && !is_numeric($payoutSum)) {
            return 'Неверный формат суммы';
        } else if($payoutSum < 0.002) {
            return 'Слишком маленькая сумма к выплате. Мин 0.002';
        } else if($payoutSum > $user->balance) {
            return 'Недостаточно средств на аккаунте';
        }

        $payout = new Payout;

        $payout->user_id = Auth::id();
        $payout->sum = -($payoutSum);
        $payout->note = $note;
        $payout->wallet = $request->wallet;
        $payout->type = 'withdraw';

        $user->balance = $user->balance - $payoutSum;
        $user->save();

        $payout->save();
    }

    public function referals() {
        $referals = Invite::where('inviter_id', Auth::id())->get();

        for ($i = 0; $i < count($referals); $i++) { 
            if($referals[$i]['invitee_id'] == 0) {
                $referals[$i]['color'] = 'red';
                $referals[$i]['title'] = 'Unregister';
            } else {
                $referals[$i]['color'] = 'lime';
                $referals[$i]['title'] = 'Register';
            }
        }

        return $referals;
    }
}

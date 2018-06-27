<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Coin;
use App\Models\Pool;
use App\Models\Invite;
use App\Models\Farm;
use App\Models\Payout;
use App\Models\Status;
use App\Models\FarmsIncomes;
use App\Models\PoolStatBalance;
use App\Models\PoolFarmStatHash;
use App\Models\FarmAltcoinBalance;
use Illuminate\Notifications\Messages\SlackMessage;

class FinanceController extends Controller {

    const HOUR = 1;
    const SIX = 6;
    const TWELVE = 12;
    const DAY = 24;
    const SEVENDAYS = 7;
    const MONTH = 30;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function finance() {
        $farmCountList['work'] = Farm::where(array('user_id' => Auth::id(), 'status_id' => 1))->count();
        $farmCountList['problem'] = Farm::where(array('user_id' => Auth::id(), 'status_id' => 2))->count();
        $farmCountList['unwork'] = Farm::where(array('user_id' => Auth::id(), 'status_id' => 3))->count();
        $farmCountList['offline'] = Farm::where(array('user_id' => Auth::id(), 'status_id' => 4))->count();


        $farm = new Farm;
        $statusList = Status::all();
        $farmList = $farm->getFarmList(Auth::id());
        $time = time();

        $coins = Coin::all();
        $l = 0;

        $timeDownBorder = $time - (86400 * self::MONTH);
        $farmAltcoin = array();
        $farmsAltcoin = array();

        

        $times[self::HOUR] = $time - 3600 * self::HOUR;
        $times[self::SIX] = $time - (3600 * self::SIX);
        $times[self::TWELVE] = $time - (3600 * self::TWELVE); 
        $times[self::DAY] = $time - 3600 * self::DAY; 
        $times[self::SEVENDAYS] = $time - (86400 * self::SEVENDAYS); 
        $times[self::MONTH] = $time - (86400 * self::MONTH); 

        foreach ($coins as $coin) {

            $farmsAltcoin[$l]['h1'] = 0;
            $farmsAltcoin[$l]['h6'] = 0;
            $farmsAltcoin[$l]['h12'] = 0;
            $farmsAltcoin[$l]['h24'] = 0;
            $farmsAltcoin[$l]['d7'] = 0;
            $farmsAltcoin[$l]['d30'] = 0;
            
            for($i=0; $i < count($farmList); $i++) { 
                $status_id = $farmList[$i]['status_id'] - 1;
                $farmList[$i]['status'] = $statusList[$status_id];

                $poolfarmhash = FarmsIncomes::where('farm_id', $farmList[$i]['id'])
                ->where('coin', $coin['name'])
                ->where('created_at', '>', $timeDownBorder)
                ->where('per_hour', '>', 0)
                ->orderBy('id', 'ASC')
                ->get();
                $h1 = $h6 = $h12 = $h24 = $d7 = $d30 = 0;
                $poolfarmhash = $poolfarmhash->toArray();

                if($poolfarmhash) {
                    foreach ($poolfarmhash as $value) {
                        if($times[self::HOUR] < $value['created_at']) {
                            $h1 += $value['per_hour'];

                        } else if($times[self::SIX] < $value['created_at']) {
                            $h6 += $value['per_hour'];

                        } else if($times[self::TWELVE] < $value['created_at']) {
                            $h12 += $value['per_hour'];

                        } else if($times[self::DAY] < $value['created_at']) {
                            $h24 += $value['per_hour'];

                        } else if($times[self::SEVENDAYS] < $value['created_at']) {
                            $d7 += $value['per_hour'];

                        } else if($times[self::MONTH] < $value['created_at']) {
                            $d30 += $value['per_hour'];
                        }
                    }
                    $h6 += $h1;
                    $h12 += $h6;
                    $h24 += $h12;
                    $d7 += $h24;
                    $d30 += $d7;

                    $farmAltcoin[$i]['name'] = $farmList[$i]['name'];
                    $farmAltcoin[$i]['value'][$l]['coin'] = $coin['name'];
                    $farmAltcoin[$i]['value'][$l]['h1'] = floor($h1 * 100000000) / 100000000;
                    $farmAltcoin[$i]['value'][$l]['h6'] = floor($h6 * 100000000) / 100000000;
                    $farmAltcoin[$i]['value'][$l]['h12'] = floor($h12 * 100000000) / 100000000;
                    $farmAltcoin[$i]['value'][$l]['h24'] = floor($h24 * 100000000) / 100000000;
                    $farmAltcoin[$i]['value'][$l]['d7'] = floor($d7 * 100000000) / 100000000;
                    $farmAltcoin[$i]['value'][$l]['d30'] = floor($d30 * 100000000) / 100000000;

                    $farmsAltcoin[$l]['h1'] += $farmAltcoin[$i]['value'][$l]['h1'];
                    $farmsAltcoin[$l]['h6'] += $farmAltcoin[$i]['value'][$l]['h6'];
                    $farmsAltcoin[$l]['h12'] += $farmAltcoin[$i]['value'][$l]['h12'];
                    $farmsAltcoin[$l]['h24'] += $farmAltcoin[$i]['value'][$l]['h24'];
                    $farmsAltcoin[$l]['d7'] += $farmAltcoin[$i]['value'][$l]['d7'];
                    $farmsAltcoin[$l]['d30'] += $farmAltcoin[$i]['value'][$l]['d30'];
                }
            }

            $farmsAltcoin[$l]['coin'] = $coin['name'];
            $farmsAltcoin[$l]['h1'] = floor($farmsAltcoin[$l]['h1'] * 100000000) / 100000000;
            $farmsAltcoin[$l]['h6'] = floor($farmsAltcoin[$l]['h6'] * 100000000) / 100000000;
            $farmsAltcoin[$l]['h12'] = floor($farmsAltcoin[$l]['h12'] * 100000000) / 100000000;
            $farmsAltcoin[$l]['h24'] = floor($farmsAltcoin[$l]['h24'] * 100000000) / 100000000;
            $farmsAltcoin[$l]['d7'] = floor($farmsAltcoin[$l]['d7'] * 100000000) / 100000000;
            $farmsAltcoin[$l]['d30'] = floor($farmsAltcoin[$l]['d30'] * 100000000) / 100000000;

            if($farmsAltcoin[$l]['d30'] == 0) {
                unset($farmsAltcoin[$l]);
            }

            $l++;
        }

        $user = User::findOrFail(Auth::id());
        $user = $user->toArray();

        $user['balance'] = floor($user['balance'] * 100000000) / 100000000;

        $response = array(
            'user' => $user,
            'farmsAltcoin' => $farmsAltcoin,
            'farmAltcoin' => $farmAltcoin,
            'farmCount' => $farmCountList
        );

        return $response;
    }

    public function path($poolBalanceId) {
        $poolStatBalance = PoolStatBalance::findOrFail($poolBalanceId);
        $pool = Pool::findOrFail($poolStatBalance->pool_id);
        $coin = Coin::findOrFail($pool->coin_id);

        return $coin->name;
    }
}

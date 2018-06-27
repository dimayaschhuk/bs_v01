<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Models\Farm;
use App\Models\Status;
use App\Models\FarmsIncomes;
use App\Models\CurrentHash;
use App\Models\PoolFarmStatHash;
use App\Models\FarmAltcoinBalance;

class WorkersController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $farm = new Farm;
    	$farmList = $farm->getFarmList(Auth::id());

        for($i=0; $i < count($farmList); $i++) { 
            $sumHash = 0;
            $poolfarmhash = FarmsIncomes::where('farm_id', $farmList[$i]['id'])
            ->take(24)
            ->get();

            if(!empty($poolfarmhash)) {
                foreach($poolfarmhash as $value) {
                    $sumHash = $sumHash + $value['per_hour'];
                }
            } else {
                $sumHash = 0;
            }

            $farmList[$i]['hash'] = $sumHash;
        }
        
        return view('cabinet/workers', ['farmList' => $farmList]);
    }

    public function list() {
        $farm = new Farm;
        $statusList = Status::all();
        $farmList = $farm->getFarmList(Auth::id());
        

        for($i=0; $i < count($farmList); $i++) { 
            $status_id = $farmList[$i]['status_id'] - 1;
            $farmList[$i]['status'] = $statusList[$status_id];


            $sumHash = 0;
            $poolfarmhash = FarmsIncomes::where('farm_id', $farmList[$i]['id'])
            ->take(24)
            ->get();

            if(!empty($poolfarmhash)) {
                foreach($poolfarmhash as $value) {
                    $sumHash = $sumHash + $value['per_hour'];
                }
            } else {
                $sumHash = 0;
            }

            $farmList[$i]['hash'] = $sumHash;
        }

        $response = array(
            'data' => $farmList,
            'sumHash' => $sumHash,
        );

        return $response;
    }

    public function delete($id) {
        $farm = Farm::findOrFail($request->id);

        $farm->status_id = 5;
        
        $project->push();
    }

    public function addCurrentHash(Request $request) {
        $i = $sumCurrentHashrate = 0;

        foreach ($request->workers as $value) {
            $workers[$i] = $value;

            $currentHash = CurrentHash::where('farm_id', $workers[$i]['id'])
                ->orderBy('created_at', 'DESC')
                ->take(1)
                ->get();

            if(isset($currentHash) && !empty($currentHash[0]['hash'])) {
                $workers[$i]['currentHash'] = $currentHash[0]['hash'];
                $workers[$i]['cardHash'] = $currentHash[0]['cardhash'];
                $workers[$i]['cardTemp'] = $currentHash[0]['cardtemp'];
                $workers[$i]['cardFan'] = $currentHash[0]['cardfan'];
                $sumCurrentHashrate += $currentHash[0]['hash'];
            } else {
                $workers[$i]['currentHash'] = 0;
            }
            

            $i++;
        }

        $data = array(
                'workers'            => $workers,
                'sumCurrentHashrate' => $sumCurrentHashrate,
            );
        return $data;
    }

    public function info(Request $request) {
        $farm = Farm::find($request->id);

        $data = array(
            'id'         => $request->id,
            'name'       => $farm->name,
        );
        $now = time();
        $lowTimeBorder = $now - 86400;
        $sumHashrate = 0;
        $statusList = Status::all();
        $status_id = $farm->status_id - 1;
        $data['status'] = $statusList[$status_id];

        $farmCurrent = CurrentHash::where('farm_id', $request->id)
                        ->take(1)
                        ->get();

        $poolfarmhashSum = FarmAltcoinBalance::where('farm_id', $request->id)
                ->where('created_at', '>', $lowTimeBorder)
                ->where('created_at', '<', $now)
                ->sum('paid_btc');

        $poolFarmStatHash = PoolFarmStatHash::where('farm_id', $request->id)
                ->orderBy('created_at', 'DESC')
                ->take(1)
                ->get();

        if(isset($farmCurrent) && !empty($farmCurrent[0])) {
            $data['currentHash'] = $farmCurrent[0]['hash'];
            $data['cardHash'] = $farmCurrent[0]['cardhash'];
            $data['cardTemp'] = $farmCurrent[0]['cardtemp'];
            $data['cardFan'] = $farmCurrent[0]['cardfan'];
        } else {
            $data['currentHash'] = '';
            $data['cardHash'] = '';
            $data['cardTemp'] = '';
            $data['cardFan'] = '';
        }

        if(isset($poolfarmhashSum) && !empty($poolfarmhashSum[0])) {
            $data['hash'] = floor($poolfarmhashSum * 100000000) / 100000000;
        } else {
            $data['hash'] = 0;
        }

        if(isset($poolFarmStatHash) && !empty($poolFarmStatHash[0])) {
            $data['hashrate'] = floor($poolFarmStatHash[0]['hash'] * 100000000) / 100000000;
        } else {
            $data['hashrate'] = 0;
        }

        return $data;
    }
}
